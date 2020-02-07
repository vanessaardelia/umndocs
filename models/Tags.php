<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_tags".
 *
 * @property string $Tags
 * @property int $IdDoc
 *
 * @property MDocument $idDoc
 */
class Tags extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'm_tags';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Tags', 'IdDoc'], 'required'],
            [['IdDoc'], 'integer'],
            [['Tags'], 'string', 'max' => 50],
            [['Tags', 'IdDoc'], 'unique', 'targetAttribute' => ['Tags', 'IdDoc']],
            [['IdDoc'], 'exist', 'skipOnError' => true, 'targetClass' => MDocument::className(), 'targetAttribute' => ['IdDoc' => 'IdDoc']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Tags' => 'Tags',
            'IdDoc' => 'Id Doc',
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
}
