<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_user_signature".
 *
 * @property string $IdUser
 * @property string $Signature
 *
 * @property MUser $idUser
 */
class UserSignature extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'm_user_signature';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdUser', 'Signature'], 'required'],
            [['IdUser'], 'string', 'max' => 11],
            [['Signature'], 'string', 'max' => 150],
            [['IdUser'], 'unique'],
            [['IdUser'], 'exist', 'skipOnError' => true, 'targetClass' => MUser::className(), 'targetAttribute' => ['IdUser' => 'IdUser']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdUser' => 'Id User',
            'Signature' => 'Signature',
        ];
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
