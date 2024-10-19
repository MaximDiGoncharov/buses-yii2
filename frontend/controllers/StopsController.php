<?php

namespace frontend\controllers;

use app\models\Stops;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StopsController implements the CRUD actions for Stops model.
 */
class StopsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Stops models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Stops::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'stop_id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Stops model.
     * @param int $stop_id Stop ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($stop_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($stop_id),
        ]);
    }

    /**
     * Creates a new Stops model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Stops();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'stop_id' => $model->stop_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Stops model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $stop_id Stop ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($stop_id)
    {
        $model = $this->findModel($stop_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'stop_id' => $model->stop_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Stops model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $stop_id Stop ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($stop_id)
    {
        $this->findModel($stop_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Stops model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $stop_id Stop ID
     * @return Stops the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($stop_id)
    {
        if (($model = Stops::findOne(['stop_id' => $stop_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
