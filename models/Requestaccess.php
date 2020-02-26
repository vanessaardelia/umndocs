<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_requestaccess".
 *
 * @property int $IdDoc
 * @property string $IdUser
 *
 * @property MDocument $idDoc
 * @property MUser $idUser
 */
class RequestAccess extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'm_requestaccess';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdDoc', 'IdUser'], 'required'],
            [['IdDoc'], 'integer'],
            [['IdUser'], 'string', 'max' => 11],
            [['IdDoc', 'IdUser'], 'unique', 'targetAttribute' => ['IdDoc', 'IdUser']],
            [['IdDoc'], 'exist', 'skipOnError' => true, 'targetClass' => MDocument::className(), 'targetAttribute' => ['IdDoc' => 'IdDoc']],
            [['IdUser'], 'exist', 'skipOnError' => true, 'targetClass' => MUser::className(), 'targetAttribute' => ['IdUser' => 'IdUser']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdDoc' => 'Id Doc',
            'IdUser' => 'Id User',
        ];
    }

    public function validateRequest($IdDoc)
    {
        $emailUser = Yii::$app->getRequest()->getCookies()->getValue('emailUser');

        $queryuser = "SELECT M_User.IdUser AS IdUser
                            FROM M_User
                            WHERE M_User.EmailUser = '$emailUser'";
        $idUser = Yii::$app->db->createCommand($queryuser)->queryOne();
        $idUser = $idUser['IdUser'];

        $query = "SELECT COUNT(*) FROM M_RequestAccess WHERE (M_RequestAccess.IdDoc = $IdDoc) AND (M_RequestAccess.IdUser = '$idUser')";
        $boolCheck = Yii::$app->db->createCommand($query)->queryScalar();
        if ($boolCheck == 0) {
            return true;
        }
        return false;
    } 

    /**
     * Gets query for [[IdDoc]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdDoc()
    {
        return $this->hasOne(MDocument::className(), ['IdDoc' => 'IdDoc']);
    }

    /**
     * Gets query for [[IdUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(MUser::className(), ['IdUser' => 'IdUser']);
    }
}
