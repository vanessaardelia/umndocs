<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_accessgroup".
 *
 * @property int $IdDoc
 * @property int $IdGroup
 *
 * @property MDocument $idDoc
 * @property MGroup $idGroup
 */
class Accessgroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'm_accessgroup';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdDoc', 'IdGroup'], 'required'],
            [['IdDoc', 'IdGroup'], 'integer'],
            [['IdDoc', 'IdGroup'], 'unique', 'targetAttribute' => ['IdDoc', 'IdGroup']],
            [['IdDoc'], 'exist', 'skipOnError' => true, 'targetClass' => MDocument::className(), 'targetAttribute' => ['IdDoc' => 'IdDoc']],
            [['IdGroup'], 'exist', 'skipOnError' => true, 'targetClass' => MGroup::className(), 'targetAttribute' => ['IdGroup' => 'IdGroup']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdDoc' => 'Id Doc',
            'IdGroup' => 'Id Group',
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
     * Gets query for [[IdGroup]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdGroup()
    {
        return $this->hasOne(MGroup::className(), ['IdGroup' => 'IdGroup']);
    }
}
