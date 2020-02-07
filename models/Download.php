<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_download".
 *
 * @property int $CountDownload
 * @property int $IdDoc
 * @property string $IdUser
 * @property string $DownloadTime
 *
 * @property MDocument $idDoc
 */
class Download extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'm_download';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CountDownload', 'IdDoc', 'IdUser'], 'required'],
            [['CountDownload', 'IdDoc'], 'integer'],
            [['DownloadTime'], 'safe'],
            [['IdUser'], 'string', 'max' => 11],
            [['CountDownload', 'IdDoc', 'IdUser'], 'unique', 'targetAttribute' => ['CountDownload', 'IdDoc', 'IdUser']],
            [['IdDoc'], 'exist', 'skipOnError' => true, 'targetClass' => MDocument::className(), 'targetAttribute' => ['IdDoc' => 'IdDoc']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'CountDownload' => 'Count Download',
            'IdDoc' => 'Id Doc',
            'IdUser' => 'Id User',
            'DownloadTime' => 'Download Time',
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
