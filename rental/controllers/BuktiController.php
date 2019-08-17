<?php

namespace app\controllers;

use Yii;
use app\models\Bukti;
use app\models\Penyewaan;

use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BuktiController implements the CRUD actions for Bukti model.
 */
class BuktiController extends Controller
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
     * Lists all Bukti models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Bukti::find(),
        ]);
        $bukti = Bukti::find()->all();
        $penyewaan =
        new ActiveDataProvider([
            'query' =>  Penyewaan::find(),
        ]);
             date_default_timezone_set("Asia/Bangkok");//set you countary name from below timezone list
      $tgl =date('Y-m-d');

//      joinWith('fans')->joinWith(['comments', 'comments.fan'])->all();
      $penyewaan =(new \yii\db\Query())

    ->select(['*'])

    ->from('penyewaan')
      ->where(['tanggal_pemesanan' => $tgl])
      ->all();
     
          var_dump($penyewaan) or die;
    
        return $this->render('index', [
            'dataProvider' => $dataProvider,'bukti' =>$rows,'p' =>$penyewaan 
        ]);
    }

    /**
     * Displays a single Bukti model.
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
     * Creates a new Bukti model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Bukti();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $bukti= $this->Bukti::find()->all();

        return $this->render('create', [
            'model' => $model,'bukti' => $bukti,
        ]);
    }

    /**
     * Updates an existing Bukti model.
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
     * Deletes an existing Bukti model.
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
     * Finds the Bukti model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bukti the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bukti::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
