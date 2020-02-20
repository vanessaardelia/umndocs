<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_commentbox".
 *
 * @property string $IdComment
 * @property string $Comments
 * @property int $IdDoc
 * @property int $NoRev
 * @property string $IdUser
 * @property string $TimeChat
 *
 * @property MAccesscommentbox[] $mAccesscommentboxes
 * @property MDocument $idDoc
 * @property MRevisi $noRev
 * @property MUser $idUser
 */
class Commentbox extends \yii\db\ActiveRecord
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
            [['IdComment', 'Comments', 'IdDoc', 'NoRev', 'IdUser'], 'required'],
            [['IdDoc', 'NoRev'], 'integer'],
            [['TimeChat'], 'safe'],
            [['IdComment'], 'string', 'max' => 10],
            [['Comments'], 'string', 'max' => 255],
            [['IdUser'], 'string', 'max' => 11],
            [['IdComment'], 'unique'],
            [['IdDoc'], 'exist', 'skipOnError' => true, 'targetClass' => Document::className(), 'targetAttribute' => ['IdDoc' => 'IdDoc']],
            [['NoRev'], 'exist', 'skipOnError' => true, 'targetClass' => Revisi::className(), 'targetAttribute' => ['NoRev' => 'NoRev']],
            [['IdUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['IdUser' => 'IdUser']],
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
            'IdDoc' => 'Id Doc',
            'NoRev' => 'No Rev',
            'IdUser' => 'Id User',
            'TimeChat' => 'Time Chat',
        ];
    }

    public function validateComment($IdComment)
    {
        $query = "SELECT COUNT(*) FROM M_Commentbox WHERE IdComment = '$IdComment'";
        $boolCheck = Yii::$app->db->createCommand($query)->queryScalar();
        if ($boolCheck == 0) {
            return true;
        }
        return false;
    }

    /**
     * Gets query for [[MAccesscommentboxes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMAccesscommentboxes()
    {
        return $this->hasMany(Accesscommentbox::className(), ['IdComment' => 'IdComment']);
    }

    /**
     * Gets query for [[IdDoc]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdDoc()
    {
        return $this->hasOne(Document::className(), ['IdDoc' => 'IdDoc']);
    }

    /**
     * Gets query for [[NoRev]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNoRev()
    {
        return $this->hasOne(Revisi::className(), ['NoRev' => 'NoRev']);
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
