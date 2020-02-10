<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_commentbox".
 *
 * @property string $IdComment
 * @property string $Comments
 * @property string $TimeChat
 *
 * @property MAccesscommentbox[] $mAccesscommentboxes
 */
class CommentBox extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'm_commentbox';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdComment', 'Comments'], 'required'],
            [['TimeChat'], 'safe'],
            [['IdComment'], 'string', 'max' => 10],
            [['Comments'], 'string', 'max' => 255],
            [['IdComment'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdComment' => 'Id Comment',
            'Comments' => 'Comments',
            'TimeChat' => 'Time Chat',
        ];
    }

    /**
     * Gets query for [[MAccesscommentboxes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMAccesscommentboxes()
    {
        return $this->hasMany(MAccesscommentbox::className(), ['IdComment' => 'IdComment']);
    }
}
