<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_documentstatus".
 *
 * @property int $IdDocStatus
 * @property string $DocumentStatus
 */
class DocumentStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'm_documentstatus';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdDocStatus', 'DocumentStatus'], 'required'],
            [['IdDocStatus'], 'integer'],
            [['DocumentStatus'], 'string', 'max' => 50],
            [['IdDocStatus'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdDocStatus' => 'Id Doc Status',
            'DocumentStatus' => 'Document Status',
        ];
    }
}
