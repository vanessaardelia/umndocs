<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_revisi".
 *
 * @property int $NoRev
 * @property int $IdDoc
 * @property string $NamaDoc
 * @property string|null $LinkDoc
 * @property int $RevisionStatus
 * @property string $LinkCover
 *
 * @property MDocument $idDoc
 */
class Revisi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'm_revisi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NoRev', 'IdDoc', 'NamaDoc', 'RevisionStatus', 'LinkCover'], 'required'],
            [['NoRev', 'IdDoc', 'RevisionStatus'], 'integer'],
            [['NamaDoc', 'LinkDoc', 'LinkCover'], 'string', 'max' => 100],
            [['NoRev', 'IdDoc'], 'unique', 'targetAttribute' => ['NoRev', 'IdDoc']],
            [['IdDoc'], 'exist', 'skipOnError' => true, 'targetClass' => MDocument::className(), 'targetAttribute' => ['IdDoc' => 'IdDoc']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'NoRev' => 'No Rev',
            'IdDoc' => 'Id Doc',
            'NamaDoc' => 'Nama Doc',
            'LinkDoc' => 'Link Doc',
            'RevisionStatus' => 'Revision Status',
            'LinkCover' => 'Link Cover',
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
