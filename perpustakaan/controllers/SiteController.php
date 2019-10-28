<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Buku;
use app\models\Anggota;
use app\models\Penulis;
use app\models\Penerbit;
use app\models\Petugas;
use app\models\Peminjaman;
use app\models\User;
use Mpdf\Mpdf;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'main';

        if (User::isAdmin() || User::isAnggota() || User::isPetugas()) {
            return $this->render('index');
        }else {
            return $this->redirect(['site/login']);

        }
        

        /**if (User::isPetugas()){
            $this->redirect(['site/petugas']);
        }

        if (User::isAdmin()){
            //$this->redirect(['site/anggota']);

        }*/
        

      
        /**if (!Yii::$app->user->isGuest)
        {
            return $this->redirect(['site/dashboard']);
        } else {
            return $this->redirect(['site/login']);
        }*/

          //return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if (User::isAdmin()){
                return $this->redirect(['site/index']);
            }
            
            elseif (User::isAnggota()){
                return $this->redirect(['site/index']);
            }

            elseif (User::isPetugas()){
                return $this->redirect(['site/index']);
            }
        }

        /**if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }*/

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }


    // Custom Sendiri untuk dashboard
   /* public function actionDashboard()
    {
        if (User::isAdmin() || User::isAnggota() || User::isPetugas()) {

          //Membuat pagination di dahsboard anggota
          $provider = new ActiveDataProvider([
            'query' => \app\models\Buku::find(),
            'pagination' => [
                'pageSize' => 6
            ],
          ]);
          return $this->render('dashboard', ['provider' => $provider]);
        } else {
          return $this->redirect('site/login');
        }
        //  if (User::isAdmin()) {
        //     return $this->render('dashboard');

        // } elseif (User::isAnggota()) {
        //     return $this->render('dashboard');
            
        // } elseif (User::isPetugas()) {
        //     return $this->render('dashboard');
        // }
        // else
        // {
        //     return $this->redirect(['site/login']);
        // }
        // return $this->render('dashboard');
    }*/




     public function actionExportPdfBuku()
   {
         $this->layout='main1';
         $model = Buku::find()->All();
         $mpdf  = new mPDF();
         $mpdf->WriteHTML($this->renderPartial('template\buku',['model'=>$model]));
         $mpdf->Output('DataBuku.pdf', 'D');
         exit;
   }

    public function actionExportPdfSuratKunjunganLapangan()
   {
         $this->layout='main1';
         
         $mpdf  = new mPDF();
         $mpdf->WriteHTML($this->renderPartial('template\surat-kunjungan-lapangan'));
         $mpdf->Output('surat-kunjungan-lapangan.pdf', 'D');
         exit;
   }


   public function actionExportPdfa()
   {
         $this->layout='main1';
         $model = Anggota::find()->All();
         $mpdf  = new mPDF();
         $mpdf->WriteHTML($this->renderPartial('template\anggota',['model'=>$model]));
         $mpdf->Output('DataAnggota.pdf', 'D');
         exit;
   }


   public function actionExportPdflis()
   {
         $this->layout='main1';
         $model = Penulis::find()->All();
         $mpdf  = new mPDF();
         $mpdf->WriteHTML($this->renderPartial('template\penulis',['model'=>$model]));
         $mpdf->Output('DataPenulis.pdf', 'D');
         exit;
   }


   public function actionExportPdfbit()
   {
         $this->layout='main1';
         $model = Penerbit::find()->All();
         $mpdf  = new mPDF();
         $mpdf->WriteHTML($this->renderPartial('template\penerbit',['model'=>$model]));
         $mpdf->Output('DataPenerbit.pdf', 'D');
         exit;
   }


   public function actionExportPdfgas()
   {
         $this->layout='main1';
         $model = Petugas::find()->All();
         $mpdf  = new mPDF();
         $mpdf->WriteHTML($this->renderPartial('template\petugas',['model'=>$model]));
         $mpdf->Output('DataPetugas.pdf', 'D');
         exit;
   }


   public function actionExportPdfjam()
   {
         $this->layout='main1';
         $model = Peminjaman::find()->All();
         $mpdf  = new mPDF();
         $mpdf->WriteHTML($this->renderPartial('template\peminjaman',['model'=>$model]));
         $mpdf->Output('DataPeminjaman.pdf', 'D');
         exit;
   }



    
}
