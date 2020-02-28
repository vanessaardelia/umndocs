<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_accessuser".
 *
 * @property int $IdDoc
 * @property string $IdUser
 *
 * @property MDocument $idDoc
 * @property MUser $idUser
 */
class AccessUser extends \yii\db\ActiveRecord
{
    public $EmailUser;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'm_accessuser';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdDoc', 'IdUser'], 'required'],
            [['IdDoc'], 'integer'],
            [['IdUser'], 'string', 'max' => 11],
            [['IdDoc', 'IdUser'], 'unique', 'targetAttribute' => ['IdDoc', 'IdUser']],
            [['IdDoc'], 'exist', 'skipOnError' => true, 'targetClass' => Document::className(), 'targetAttribute' => ['IdDoc' => 'IdDoc']],
            [['IdUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['IdUser' => 'IdUser']],
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
        return $this->hasOne(User::className(), ['IdUser' => 'IdUser']);
    }
}
