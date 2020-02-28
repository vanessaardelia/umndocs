<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\debug\models\timeline\DataProvider;


class GridViewAllDocument extends Document{
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

        $query = Document::find() -> select(['M_Document.IdDoc AS IdDoc', 'M_Revisi.NamaDoc AS namaDoc', 
                                    '(CASE WHEN DocumentStatus = "1" THEN 1 ELSE 0 END) AS statusrevised',                                                                       'JenisDoc', 'DocumentStatus', 'CreatedBy', 'M_Revisi.NamaDoc AS namaDoc', '                                 (CASE WHEN DocumentStatus = "1" THEN 1 ELSE 0 END) AS statusdraf', 
                                    '(CASE WHEN DocumentStatus = "2" THEN 1 ELSE 0 END) AS statusapproved',
                                    '(CASE WHEN DocumentStatus = "3" THEN 1 ELSE 0 END) AS statuswaitingfortag',
                                    '(CASE WHEN DocumentStatus = "4" THEN 1 ELSE 0 END) AS statusuploadcover',
                                    '(CASE WHEN DocumentStatus = "5" THEN 1 ELSE 0 END) AS statussubmitted',
                                    '(CASE WHEN DocumentStatus = "6" THEN 1 ELSE 0 END) AS statusdraf'])
                                    ->from('M_Document')
                                    ->join('Join', 'M_Revisi', 'M_Revisi.IdDoc = M_Document.IdDoc')
                                    ->where('M_Document.Owner = "' . $idUser . '"');
                                    // ->leftjoin('M_AccessUser', 'M_AccessUser.IdDoc = M_Document.IdDoc');

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

