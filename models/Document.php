<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_document".
 *
 * @property int $IdDoc
 * @property int $Parentid
 * @property int $DocumentStatus
 * @property string $JenisDoc
 * @property string $CreatedBy
 * @property string $Owner
 * @property string $NoDoc
 *
 * @property MAccesscommentbox[] $mAccesscommentboxes
 * @property MAccessgroup[] $mAccessgroups
 * @property MGroup[] $idGroups
 * @property MAccessuser[] $mAccessusers
 * @property MUser[] $idUsers
 * @property Document $parent
 * @property Document[] $documents
 * @property MDownload[] $mDownloads
 * @property MGivennotes[] $mGivennotes
 * @property MMengetahui[] $mMengetahuis
 * @property MUser[] $idUsers0
 * @property MMenyetujui[] $mMenyetujuis
 * @property MUser[] $idUsers1
 * @property MRequestaccess[] $mRequestaccesses
 * @property MUser[] $idUsers2
 * @property MRevisi[] $mRevisis
 * @property MTags[] $mTags
 */
class Document extends \yii\db\ActiveRecord
{
    public $namaDoc;
    public $file;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'm_document';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdDoc', 'Parentid', 'DocumentStatus', 'JenisDoc', 'CreatedBy', 'Owner', 'NoDoc'], 'required'],
            [['IdDoc', 'Parentid', 'DocumentStatus'], 'integer'],
            [['JenisDoc', 'namaDoc'], 'string', 'max' => 30],
            [['CreatedBy', 'Owner'], 'string', 'max' => 11],
            [['NoDoc'], 'string', 'max' => 255],
            [['file'], 'file', 'extensions' => 'doc, docx'],
            [['IdDoc'], 'unique'],
            [['Parentid'], 'exist', 'skipOnError' => true, 'targetClass' => Document::className(), 'targetAttribute' => ['Parentid' => 'IdDoc']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdDoc' => 'Id Doc',
            'Parentid' => 'Parentid',
            'DocumentStatus' => 'Document Status',
            'JenisDoc' => 'Jenis Doc',
            'CreatedBy' => 'Created By',
            'Owner' => 'Owner',
            'NoDoc' => 'No Doc',
        ];
    }

    /**
     * Gets query for [[MAccesscommentboxes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMAccesscommentboxes()
    {
        return $this->hasMany(MAccesscommentbox::className(), ['IdDoc' => 'IdDoc']);
    }

    /**
     * Gets query for [[MAccessgroups]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMAccessgroups()
    {
        return $this->hasMany(MAccessgroup::className(), ['IdDoc' => 'IdDoc']);
    }

    /**
     * Gets query for [[IdGroups]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdGroups()
    {
        return $this->hasMany(MGroup::className(), ['IdGroup' => 'IdGroup'])->viaTable('m_accessgroup', ['IdDoc' => 'IdDoc']);
    }

    /**
     * Gets query for [[MAccessusers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMAccessusers()
    {
        return $this->hasMany(MAccessuser::className(), ['IdDoc' => 'IdDoc']);
    }

    /**
     * Gets query for [[IdUsers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsers()
    {
        return $this->hasMany(MUser::className(), ['IdUser' => 'IdUser'])->viaTable('m_accessuser', ['IdDoc' => 'IdDoc']);
    }

    /**
     * Gets query for [[Parent]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Document::className(), ['IdDoc' => 'Parentid']);
    }

    /**
     * Gets query for [[Documents]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDocuments()
    {
        return $this->hasMany(Document::className(), ['Parentid' => 'IdDoc']);
    }

    /**
     * Gets query for [[MDownloads]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMDownloads()
    {
        return $this->hasMany(MDownload::className(), ['IdDoc' => 'IdDoc']);
    }

    /**
     * Gets query for [[MGivennotes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMGivennotes()
    {
        return $this->hasMany(MGivennotes::className(), ['IdDoc' => 'IdDoc']);
    }

    /**
     * Gets query for [[MMengetahuis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMMengetahuis()
    {
        return $this->hasMany(MMengetahui::className(), ['IdDoc' => 'IdDoc']);
    }

    /**
     * Gets query for [[IdUsers0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsers0()
    {
        return $this->hasMany(MUser::className(), ['IdUser' => 'IdUser'])->viaTable('m_mengetahui', ['IdDoc' => 'IdDoc']);
    }

    /**
     * Gets query for [[MMenyetujuis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMMenyetujuis()
    {
        return $this->hasMany(MMenyetujui::className(), ['IdDoc' => 'IdDoc']);
    }

    /**
     * Gets query for [[IdUsers1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsers1()
    {
        return $this->hasMany(MUser::className(), ['IdUser' => 'IdUser'])->viaTable('m_menyetujui', ['IdDoc' => 'IdDoc']);
    }

    /**
     * Gets query for [[MRequestaccesses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMRequestaccesses()
    {
        return $this->hasMany(MRequestaccess::className(), ['IdDoc' => 'IdDoc']);
    }

    /**
     * Gets query for [[IdUsers2]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsers2()
    {
        return $this->hasMany(MUser::className(), ['IdUser' => 'IdUser'])->viaTable('m_requestaccess', ['IdDoc' => 'IdDoc']);
    }

    /**
     * Gets query for [[MRevisis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMRevisis()
    {
        return $this->hasMany(MRevisi::className(), ['IdDoc' => 'IdDoc']);
    }

    /**
     * Gets query for [[MTags]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMTags()
    {
        return $this->hasMany(MTags::className(), ['IdDoc' => 'IdDoc']);
    }
}
