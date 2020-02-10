<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_groupuser".
 *
 * @property string $IdUser
 * @property int $IdGroup
 *
 * @property MUser $idUser
 * @property MGroup $idGroup
 */
class GroupUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'm_groupuser';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdUser', 'IdGroup'], 'required'],
            [['IdGroup'], 'integer'],
            [['IdUser'], 'string', 'max' => 11],
            [['IdUser', 'IdGroup'], 'unique', 'targetAttribute' => ['IdUser', 'IdGroup']],
            [['IdUser'], 'exist', 'skipOnError' => true, 'targetClass' => MUser::className(), 'targetAttribute' => ['IdUser' => 'IdUser']],
            [['IdGroup'], 'exist', 'skipOnError' => true, 'targetClass' => MGroup::className(), 'targetAttribute' => ['IdGroup' => 'IdGroup']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdUser' => 'Id User',
            'IdGroup' => 'Id Group',
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
     * Gets query for [[IdGroup]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdGroup()
    {
        return $this->hasOne(MGroup::className(), ['IdGroup' => 'IdGroup']);
    }
}
