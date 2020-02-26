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
          [['idUser','namaDoc', 'JenisDoc', 'CreatedBy'], 'string']
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
        $emailUser = Yii::$app->getRequest()->getCookies()->getValue('emailUser');

        $queryuser = "SELECT M_User.IdUser AS IdUser
                            FROM M_User
                            WHERE M_User.EmailUser = '$emailUser'";
        $idUser = Yii::$app->db->createCommand($queryuser)->queryOne();
        $idUser = $idUser['IdUser'];

        $query = Document::find() -> select(['M_Document.IdDoc AS IdDoc', 'M_AccessUser.IdUser AS idUser',                                      'JenisDoc', 'DocumentStatus', 'CreatedBy', 'M_Revisi.NamaDoc AS namaDoc', '                                 (CASE WHEN M_AccessUser.IdUser = "' . $idUser . '" THEN 1 ELSE 0 END) AS sama'])
                                    ->from('M_Document')
                                    ->leftjoin('M_Revisi', 'M_Revisi.IdDoc = M_Document.IdDoc')
                                    ->leftjoin('M_AccessUser', 'M_AccessUser.IdDoc = M_Document.IdDoc');

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

