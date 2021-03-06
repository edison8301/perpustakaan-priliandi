<?php

namespace app\controllers;

use Yii;
use app\models\Peminjaman;
use app\models\User;
use app\models\PeminjamanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use PhpOffice\PhpSpreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

/**
 * PeminjamanController implements the CRUD actions for Peminjaman model.
 */
class PeminjamanController extends Controller
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
     * Lists all Peminjaman models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PeminjamanSearch();


        //baru
        if (User::isAnggota()) {
            $searchModel->id_anggota = Yii::$app->user->identity->id_anggota;
        }



        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Peminjaman model.
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
     * Creates a new Peminjaman model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id_buku = null)
    {
        $model = new Peminjaman();

        $model->id_buku = $id_buku;
        $model->tanggal_kembali = date('Y-m-d', strtotime('+7 days'));

        // Jika anggota meminjam buku maka auto crud
        if (Yii::$app->user->identity->id_user_role == 2) {
            $model->id_anggota = Yii::$app->user->identity->id_anggota;
            $model->tanggal_pinjam = date('Y-m-d');
            $model->tanggal_kembali = date('Y-m-d', strtotime('+7 days'));

            $model->save();
            return $this->redirect(['index']); 
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);

        /*8if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);*/
    }

    /**
     * Updates an existing Peminjaman model.
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
     * Deletes an existing Peminjaman model.
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
     * Finds the Peminjaman model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Peminjaman the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Peminjaman::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionExportExcel()
    {
        $spreadsheet = new PhpSpreadsheet\spreadsheet();
        $worksheet = $spreadsheet->getActiveSheet();


        $database =Peminjaman::find()
        ->select('id_buku, id_anggota, tanggal_pinjam, tanggal_kembali ')
        ->all();

        $worksheet->setCellValue('A1', 'ID Buku');
        $worksheet->setCellValue('B1', 'ID Anggota');
        $worksheet->setCellValue('C1', 'Tanggal Pinjam');
        $worksheet->setCellValue('D1', 'Tanggal Kembali');



        $database = \yii\helpers\ArrayHelper::toArray($database);
        $worksheet->fromArray($database, null, 'A2');


        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attechment;filename="datapeminjaman.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }


}
