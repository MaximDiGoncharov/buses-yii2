<?php

namespace frontend\controllers;

use app\models\RouteStops;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RouteStopsController implements the CRUD actions for RouteStops model.
 */
class RouteStopsController extends Controller
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
     * Lists all RouteStops models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => RouteStops::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'route_stop_id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RouteStops model.
     * @param int $route_stop_id Route Stop ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($route_stop_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($route_stop_id),
        ]);
    }

    /**
     * Creates a new RouteStops model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new RouteStops();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'route_stop_id' => $model->route_stop_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RouteStops model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $route_stop_id Route Stop ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($route_stop_id)
    {
        $model = $this->findModel($route_stop_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'route_stop_id' => $model->route_stop_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RouteStops model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $route_stop_id Route Stop ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($route_stop_id)
    {
        $this->findModel($route_stop_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RouteStops model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $route_stop_id Route Stop ID
     * @return RouteStops the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($route_stop_id)
    {
        if (($model = RouteStops::findOne(['route_stop_id' => $route_stop_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
