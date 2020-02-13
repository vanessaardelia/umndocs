<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_givennotes".
 *
 * @property int $IdNotes
 * @property int $IdDoc
 * @property string $IdUser
 * @property string $Content
 *
 * @property MDocument $idDoc
 * @property MUser $idUser
 */
class GivenNotes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'm_givennotes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdNotes', 'IdDoc', 'IdUser', 'Content'], 'required'],
            [['IdNotes', 'IdDoc'], 'integer'],
            [['IdUser'], 'string', 'max' => 11],
            [['Content'], 'string', 'max' => 255],
            [['IdNotes', 'IdDoc', 'IdUser'], 'unique', 'targetAttribute' => ['IdNotes', 'IdDoc', 'IdUser']],
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
            'IdNotes' => 'Id Notes',
            'IdDoc' => 'Id Doc',
            'IdUser' => 'Id User',
            'Content' => 'Content',
        ];
    }

    public function validateNotes($IdNotes)
    {
        $query = "SELECT COUNT(*) FROM M_GivenNotes WHERE IdNotes = '$IdNotes'";
        $boolCheck = Yii::$app->db->createCommand($query)->queryScalar();
        if ($boolCheck == 0) {
            return true;
        }
        return false;
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
        return $this->hasOne(MUser::className(), ['IdUser' => 'IdUser']);
    }
}
