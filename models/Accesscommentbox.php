<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_accesscommentbox".
 *
 * @property string $IdComment
 * @property int $IdDoc
 * @property string $IdUser
 *
 * @property MCommentbox $idComment
 * @property MDocument $idDoc
 */
class AccessCommentBox extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'm_accesscommentbox';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdComment', 'IdDoc', 'IdUser'], 'required'],
            [['IdDoc'], 'integer'],
            [['IdComment'], 'string', 'max' => 10],
            [['IdUser'], 'string', 'max' => 50],
            [['IdComment', 'IdDoc', 'IdUser'], 'unique', 'targetAttribute' => ['IdComment', 'IdDoc', 'IdUser']],
            [['IdComment'], 'exist', 'skipOnError' => true, 'targetClass' => MCommentbox::className(), 'targetAttribute' => ['IdComment' => 'IdComment']],
            [['IdDoc'], 'exist', 'skipOnError' => true, 'targetClass' => MDocument::className(), 'targetAttribute' => ['IdDoc' => 'IdDoc']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdComment' => 'Id Comment',
            'IdDoc' => 'Id Doc',
            'IdUser' => 'Id User',
        ];
    }

    /**
     * Gets query for [[IdComment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdComment()
    {
        return $this->hasOne(MCommentbox::className(), ['IdComment' => 'IdComment']);
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
