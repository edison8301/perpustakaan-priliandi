<?php

namespace app\models;


use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int $id_anggota
 * @property int $id_petugas
 * @property int $id_user_role
 * @property int $status
 */
class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['id_anggota', 'id_petugas', 'id_user_role', 'status'], 'integer'],
            [['username'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'id_anggota' => 'Anggota',
            'id_petugas' => 'Petugas',
            'id_user_role' => 'User Role',
            'status' => 'Status',
        ];
    }




    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $Type = null)
    {
        return static::findOne(['access_token' => $token]);
    }
    public function getId()
    {
        return $this->id;
    }
    public function getAuthKey()
    {
        return null;
    }
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }


    public function findByUsername($username)
    {
        return self::findOne(['username' => $username]);
    }
    public function validatePassword($password)
    {
         //return Yii::$app->getSecurity()->validatePassword($password, $this->password);


        return self::findOne(['password' => $password]);
    }


    public function getAnggota()
    {
        return $this->hasOne(Anggota::className(), ['id' => 'id_anggota']);
    }
     public function getPetugas()
    {
        return $this->hasOne(Petugas::className(), ['id' => 'id_petugas']);
    }
     public function getUserRole()
    {
        return $this->hasOne(UserRole::className(), ['id' => 'id_user_role']);
    }
    public function getStatus()
    {
        return array (
        0 => 'Aktif',
        1 => 'Tidak Aktif',

        );
    }




    public function getUsersCount()
    {
        return static::find()->count();
    }






}
