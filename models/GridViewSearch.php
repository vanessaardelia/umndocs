<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\debug\models\timeline\DataProvider;


class GridViewSearch extends Document{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
          [['namaDoc', 'JenisDoc', 'CreatedBy'], 'string']
        ];
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */

    public function search($params){
        $query = Document::find() ->select(['JenisDoc', 'DocumentStatus', 'CreatedBy', 'M_Revisi.NamaDoc AS namaDoc'])
            ->from('M_Document')
            ->join('join', 'M_Revisi', 'M_Revisi.IdDoc = M_Document.IdDoc');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $this->load($params);

        if(!$this->validate()){
            return $dataProvider;
        }

        $query  ->andFilterWhere(['like', 'namaDoc', $this->namaDoc])
                ->andFilterWhere(['like', 'JenisDoc', $this->JenisDoc])
                ->andFilterWhere(['like', 'CreatedBy', $this->CreatedBy]);

        return $dataProvider;
    }
}