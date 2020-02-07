<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_mengetahui".
 *
 * @property int $IdDoc
 * @property string $IdUser
 * @property int $TemporaryApproval
 * @property int $Signed
 * @property string $KodeJabatan
 *
 * @property MDocument $idDoc
 * @property MUser $idUser
 */
class Mengetahui extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'm_mengetahui';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdDoc', 'IdUser', 'TemporaryApproval', 'Signed', 'KodeJabatan'], 'required'],
            [['IdDoc', 'TemporaryApproval', 'Signed'], 'integer'],
            [['IdUser'], 'string', 'max' => 11],
            [['KodeJabatan'], 'string', 'max' => 5],
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
            'TemporaryApproval' => 'Temporary Approval',
            'Signed' => 'Signed',
            'KodeJabatan' => 'Kode Jabatan',
        ];
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
