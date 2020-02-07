<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_notification".
 *
 * @property int $IdNotif
 * @property string $IdUser
 * @property int $IdContentNotif
 *
 * @property MUser $idUser
 * @property MNotificationstatus $idContentNotif
 */
class Notification extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'm_notification';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdNotif', 'IdUser', 'IdContentNotif'], 'required'],
            [['IdNotif', 'IdContentNotif'], 'integer'],
            [['IdUser'], 'string', 'max' => 11],
            [['IdNotif'], 'unique'],
            [['IdUser'], 'exist', 'skipOnError' => true, 'targetClass' => MUser::className(), 'targetAttribute' => ['IdUser' => 'IdUser']],
            [['IdContentNotif'], 'exist', 'skipOnError' => true, 'targetClass' => MNotificationstatus::className(), 'targetAttribute' => ['IdContentNotif' => 'IdContentNotif']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdNotif' => 'Id Notif',
            'IdUser' => 'Id User',
            'IdContentNotif' => 'Id Content Notif',
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

    /**
     * Gets query for [[IdContentNotif]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdContentNotif()
    {
        return $this->hasOne(MNotificationstatus::className(), ['IdContentNotif' => 'IdContentNotif']);
    }
}
