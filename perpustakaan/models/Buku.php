<?php

namespace app\models;
use yii\base\Model;
use yii\helpers\Html;



use Yii;

/**
 * This is the model class for table "buku".
 *
 * @property int $id
 * @property string $nama
 * @property string $tahun_terbit
 * @property int $id_penulis
 * @property int $id_penerbit
 * @property int $id_kategori
 * @property string $sinopsis
 * @property string $sampul
 * @property string $berkas
 */
class Buku extends \yii\db\ActiveRecord
{








    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'buku';
    }

    /**
     * {@inheritdoc}
     */

    public static function getList()
    {
        return \yii\helpers\ArrayHelper::map(self::find()->all(), 'id', 'nama');
    }
    



    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['tahun_terbit'], 'safe'],
            [['id_penulis', 'id_penerbit', 'id_kategori'], 'integer'],
            [['sinopsis'], 'string'],
            [['nama'], 'string'],
            [['sampul'], 'file', 'extensions'=>'jpg, gif, png', 'maxSize'=>5218288, 'tooBig' => 'batas limit upload gambar 5mb'
            ],
            [['berkas'], 'file', 'extensions'=>'doc, docx, pdf', 'maxSize'=>5218288, 'tooBig' => 'batas limit upload berkas 5mb'
            ],
           
            //[['sampul'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'tahun_terbit' => 'Tahun Terbit',
            'id_penulis' => 'Penulis',
            'id_penerbit' => 'Penerbit',
            'id_kategori' => 'Kategori',
            'sinopsis' => 'Sinopsis',
            'sampul' => 'Sampul',
            'berkas' => 'Berkas',
        ];
    }



     public function getPenulis()
    {
        return $this->hasOne(Penulis::className(), ['id'=> 'id_penulis']);
    }


    public function getPenerbit()
    {
        return $this->hasOne(Penerbit::className(), ['id'=> 'id_penerbit']);
    }

    public function getKategori()
    {
        return $this->hasOne(Kategori::className(), ['id'=> 'id_kategori']);
    }



    public function getCaritahun() {
       $yearNow = date("Y");
       $yearFrom = $yearNow - 15;
       $yearTo = $yearNow;
 
       $arrYears = array();
       foreach (range($yearFrom, $yearTo) as $number) {
              $arrYears[$number] = $number; 
       }
       $arrYears2 = array_reverse($arrYears, true);
 
       return $arrYears2;
}



public function getBukuCount()
    {
        return static::find()->count();
    }


   public function getLinkIconBerkas()
    {
        if ($this->berkas != '') {
            $url = Yii::getAlias('@web') . '/upload/berkas/' . $this->berkas;
            return Html::a('<i class="glyphicon glyphicon-download-alt"></i>',$url,[
                'data-toggle'=>'tooltip',
                'title'=>'Unduh Berkas'
            ]);
        } 
        
        return '<i class="glyphicon glyphicon-remove" data-toggle="tooltip" title="Berkas Tidak Tersedia"></i>';
        
    }


}

  

