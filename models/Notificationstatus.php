<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_notificationstatus".
 *
 * @property int $IdContentNotif
 * @property string $ContentNotif
 *
 * @property MNotification[] $mNotifications
 */
class Notificationstatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'm_notificationstatus';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdContentNotif', 'ContentNotif'], 'required'],
            [['IdContentNotif'], 'integer'],
            [['ContentNotif'], 'string', 'max' => 100],
            [['IdContentNotif'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdContentNotif' => 'Id Content Notif',
            'ContentNotif' => 'Content Notif',
        ];
    }

    /**
     * Gets query for [[MNotifications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMNotifications()
    {
        return $this->hasMany(MNotification::className(), ['IdContentNotif' => 'IdContentNotif']);
    }
}
