<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_group".
 *
 * @property int $IdGroup
 * @property string $NamaGroup
 *
 * @property MAccessgroup[] $mAccessgroups
 * @property MDocument[] $idDocs
 * @property MGroupuser[] $mGroupusers
 * @property MUser[] $idUsers
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'm_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdGroup', 'NamaGroup'], 'required'],
            [['IdGroup'], 'integer'],
            [['NamaGroup'], 'string', 'max' => 50],
            [['IdGroup'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdGroup' => 'Id Group',
            'NamaGroup' => 'Nama Group',
        ];
    }

    /**
     * Gets query for [[MAccessgroups]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMAccessgroups()
    {
        return $this->hasMany(MAccessgroup::className(), ['IdGroup' => 'IdGroup']);
    }

    /**
     * Gets query for [[IdDocs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdDocs()
    {
        return $this->hasMany(MDocument::className(), ['IdDoc' => 'IdDoc'])->viaTable('m_accessgroup', ['IdGroup' => 'IdGroup']);
    }

    /**
     * Gets query for [[MGroupusers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMGroupusers()
    {
        return $this->hasMany(MGroupuser::className(), ['IdGroup' => 'IdGroup']);
    }

    /**
     * Gets query for [[IdUsers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsers()
    {
        return $this->hasMany(MUser::className(), ['IdUser' => 'IdUser'])->viaTable('m_groupuser', ['IdGroup' => 'IdGroup']);
    }
}
