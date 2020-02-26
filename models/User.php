<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_user".
 *
 * @property string $EmailUser
 * @property string $Password
 * @property string $Jabatan
 * @property string $KodeJabatan
 * @property string $IdUser
 * @property string|null $Departemen
 * @property string $Nama
 *
 * @property Accessuser[] $mAccessusers
 * @property MDocument[] $idDocs
 * @property MGivennotes[] $mGivennotes
 * @property MGroupuser[] $mGroupusers
 * @property MGroup[] $idGroups
 * @property MMengetahui[] $mMengetahuis
 * @property MDocument[] $idDocs0
 * @property MMenyetujui[] $mMenyetujuis
 * @property MDocument[] $idDocs1
 * @property MNotification[] $mNotifications
 * @property MRequestaccess[] $mRequestaccesses
 * @property MDocument[] $idDocs2
 * @property MUserSignature $mUserSignature
 */
class User extends \yii\db\ActiveRecord
{
    public $username;
    public $password;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'm_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['EmailUser', 'Password', 'Jabatan', 'KodeJabatan', 'IdUser', 'Nama'], 'required'],
            [['EmailUser', 'Departemen'], 'string', 'max' => 50],
            [['Password'], 'string', 'max' => 30],
            [['Jabatan'], 'string', 'max' => 20],
            [['KodeJabatan'], 'string', 'max' => 10],
            [['IdUser'], 'string', 'max' => 11],
            [['Nama'], 'string', 'max' => 80],
            [['IdUser'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'EmailUser' => 'Email User',
            'Password' => 'Password',
            'Jabatan' => 'Jabatan',
            'KodeJabatan' => 'Kode Jabatan',
            'IdUser' => 'Id User',
            'Departemen' => 'Departemen',
            'Nama' => 'Nama',
        ];
    }

    public function validateLogin($username, $password){
        $query = "SELECT COUNT(*) FROM M_User WHERE EmailUser = '$username' AND Password = '$password'";
        $boolCheck = Yii::$app->db->createCommand($query)->queryScalar();
        if($boolCheck == 1){
            return true;
        }
        return false;
    }

    /**
     * Gets query for [[MAccessusers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAccessusers()
    {
        return $this->hasMany(Accessuser::className(), ['IdUser' => 'IdUser']);
    }

    /**
     * Gets query for [[IdDocs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdDocs()
    {
        return $this->hasMany(Document::className(), ['IdDoc' => 'IdDoc'])->viaTable('m_accessuser', ['IdUser' => 'IdUser']);
    }

    /**
     * Gets query for [[MGivennotes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMGivennotes()
    {
        return $this->hasMany(MGivennotes::className(), ['IdUser' => 'IdUser']);
    }

    /**
     * Gets query for [[MGroupusers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMGroupusers()
    {
        return $this->hasMany(MGroupuser::className(), ['IdUser' => 'IdUser']);
    }

    /**
     * Gets query for [[IdGroups]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdGroups()
    {
        return $this->hasMany(MGroup::className(), ['IdGroup' => 'IdGroup'])->viaTable('m_groupuser', ['IdUser' => 'IdUser']);
    }

    /**
     * Gets query for [[MMengetahuis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMMengetahuis()
    {
        return $this->hasMany(MMengetahui::className(), ['IdUser' => 'IdUser']);
    }

    /**
     * Gets query for [[IdDocs0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdDocs0()
    {
        return $this->hasMany(MDocument::className(), ['IdDoc' => 'IdDoc'])->viaTable('m_mengetahui', ['IdUser' => 'IdUser']);
    }

    /**
     * Gets query for [[MMenyetujuis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMMenyetujuis()
    {
        return $this->hasMany(MMenyetujui::className(), ['IdUser' => 'IdUser']);
    }

    /**
     * Gets query for [[IdDocs1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdDocs1()
    {
        return $this->hasMany(MDocument::className(), ['IdDoc' => 'IdDoc'])->viaTable('m_menyetujui', ['IdUser' => 'IdUser']);
    }

    /**
     * Gets query for [[MNotifications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMNotifications()
    {
        return $this->hasMany(MNotification::className(), ['IdUser' => 'IdUser']);
    }

    /**
     * Gets query for [[MRequestaccesses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMRequestaccesses()
    {
        return $this->hasMany(MRequestaccess::className(), ['IdUser' => 'IdUser']);
    }

    /**
     * Gets query for [[IdDocs2]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdDocs2()
    {
        return $this->hasMany(MDocument::className(), ['IdDoc' => 'IdDoc'])->viaTable('m_requestaccess', ['IdUser' => 'IdUser']);
    }

    /**
     * Gets query for [[MUserSignature]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMUserSignature()
    {
        return $this->hasOne(MUserSignature::className(), ['IdUser' => 'IdUser']);
    }
}
