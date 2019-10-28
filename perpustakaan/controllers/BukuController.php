<?php

namespace app\controllers;

use Yii;
use app\models\Buku;
use app\models\BukuSearch;
use app\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;
use PhpOffice\PhpSpreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpWord\IOfactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\Converter;
use kartik\mpdf\Pdf;

/**
 * BukuController implements the CRUD actions for Buku model.
 */
class BukuController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }



    /**
     * Lists all Buku models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BukuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Buku model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Buku model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id_kategori=null, $id_penulis=null, $id_penerbit=null)
    {
        $model = new Buku();
        $model->id_kategori = $id_kategori;
        $model->id_penulis = $id_penulis;
        $model->id_penerbit = $id_penerbit;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $sampul = UploadedFile::getInstance($model, 'sampul');
            $berkas = UploadedFile::getInstance($model, 'berkas');

            $model->sampul = time() . '_' . $sampul->name;
            $model->berkas = time() . '_' . $berkas->name;

            $model->save(false);

            $sampul->saveAs(Yii::$app->basePath.'/web/upload/sampul/' . $model->sampul);
            $berkas->saveAs(Yii::$app->basePath.'/web/upload/berkas/' . $model->berkas);




            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Buku model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Buku model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Buku model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Buku the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Buku::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionExportExcel()
    {
        $spreadsheet = new PhpSpreadsheet\spreadsheet();
        $worksheet = $spreadsheet->getActiveSheet();


        $database =Buku::find()
        ->select('nama, tahun_terbit, id_penulis, id_penerbit, id_kategori, sinopsis ')
        ->all();

        $worksheet->setCellValue('A1', 'Judul Buku');
        $worksheet->setCellValue('B1', 'Tahun Terbit');
        $worksheet->setCellValue('C1', 'ID Penulis');
        $worksheet->setCellValue('D1', 'ID Penerbit');
        $worksheet->setCellValue('E1', 'ID Kategori');
        $worksheet->setCellValue('F1', 'Sinopsis');



        $database = \yii\helpers\ArrayHelper::toArray($database);
        $worksheet->fromArray($database, null, 'A2');


        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attechment;filename="buku.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }





    public function actionExportWord()
    {
       $phpWord = new phpWord();
       $phpWord->setDefaultFontSize(11);

       $section = $phpWord->addSection(
        [
            'marginTop' => Converter::cmTotwip(1.80),

            'marginBottom' => Converter::cmTotwip(1.80),
            'marginLeft' => Converter::cmTotwip(1.2),
            'marginRight' => Converter::cmTotwip(1.6),

        ]
       );

       $fontStyle = [
        'underline' => 'dash',
        'bold' => true,
        'italic' => true,
       ];

       $paragraphCenter = [
        'alignment'=>'center',

       ];

       $section->addText(
                'Data Buku',
                $fontStyle,
                $paragraphCenter
       );

       $judul = $section->addTextRun($paragraphCenter);

       $judul -> addText('Data Buku ', $fontStyle);
         $judul -> addText('Perpustakaan ', ['italic' =>true]);
          $judul -> addText('Sistem Informasi Perpustakaan BURGER', ['bold' =>true]);

       $section->addText(
        'teks 1 2 3',
        ['bold' => true],
        ['alignment' => 'center']
       );




$semuaBuku = Buku::find()->all();

foreach ($semuaBuku as $buku ) {



    $section->addText($buku->nama);
    $section->addText($buku->tahun_terbit);
    $section->addText($buku->penerbit->nama);

}










       $filename = time() . 'test.docx';
       $path = 'exportfile/'. $filename;
       $xmlWriter = IOfactory::createWriter($phpWord,'Word2007');
       $xmlWriter -> save($path);
       return $this -> redirect($path);
    }





    






}
