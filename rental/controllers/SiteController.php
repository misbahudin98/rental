<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Penyewaan;
use app\models\Mobil;

use app\models\Customer;
use app\models\Bukti;
use app\models\ContactForm;

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
                'rules' => [
                [
                        'actions' => ['login', 'index', 'error'],
                        'allow' => true,
                        'roles'=>['?'],
                    ],
                    [

                        'allow' => true,
                        'roles'=>['@'],
                    
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
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
     //   $this->layout='no_nav';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

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

    /**v
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function  actionNotifikasi()
    {       
     
      date_default_timezone_set("Asia/Bangkok");//set you countary name from below timezone list
      $tgl =date('Y-m-d');

//      joinWith('fans')->joinWith(['comments', 'comments.fan'])->all();
      $penyewaan = penyewaan::find()
      ->where(['tanggal_pemesanan' => $tgl])
      ->all();

    foreach ($penyewaan as $key ) {
        $id[] =  $key->id_sewa;

}

      $bukti = bukti::find()->all();
var_dump($bukti) or die;
     return $this->render('notif',
        ['p' => $penyewaan,
        'b' => $bukti]);
    }

      

            public function actionRegister()
    {

        //var_dump(yii::$app->security->generatePasswordHash(''))or die;

        $model = new \app\models\User();

    if ($model->load(Yii::$app->request->post())) {
        
         $user = new \app\models\user();
        
         $user->username =  Yii::$app->request->post()['User']['username'];
         $user->setPassword( Yii::$app->request->post()['User']['password']);
         $user->generateAuthKey();
         $user->save();
         return $this->redirect(['login']);
        
    }

    return $this->render('register', [
        'model' => $model,
    ]);
    }

    public function actionDelete($id){
        $model = Penyewaan::findOne($id);
        $model->delete();
        $this->redirect('notifikasi');
    }
        public function actionUpdate($id,$tgl){
        $model = Mobil::findOne($id);
        $model->status = 'tidak tersedia';
        $model->hingga = $tgl;
        $model->save();
        $this->redirect('notifikasi');
    }

}
