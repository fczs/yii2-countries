<?php

namespace app\controllers;

use Yii;
use yii\web\Response;
use yii\web\Controller;
use app\models\Country;
use app\models\City;

class SiteController extends Controller
{
    /**
     * Фильтр задает кеширование для действия index
     */
    public function behaviors()
    {
        return [
            [
                'class' => 'yii\filters\PageCache',
                'only' => ['index'],
                'duration' => Yii::$app->params['cacheTimeout']
            ],
        ];
    }

    /**
     * Выводит главную страницу со списком всех стран
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index', ['countries' => Country::find()->all()]);
    }

    /**
     * Обрабатывает Ajax запрос с id страны, по которому делается выборка городов
     *
     * @return string JSON
     */
    public function actionCities()
    {
        $return = [];

        if (Yii::$app->request->isAjax) {
            $id = Yii::$app->request->get("id");

            /**
             * Возьмем результаты запроса из кеша
             */
            $cities = City::getDb()->cache(function () use($id) {
                return City::find()->where(['country_id' => $id])->all();
            }, Yii::$app->params['cacheTimeout']);

            foreach ($cities as $city) {
                $return["cities"][] = $city["name"];
            }

            /**
             * Можно не доставать страну из БД, а взять ее из ссылки на стороне клиента, но пусть будет так
             */
            $return["country"] = Country::getDb()->cache(function () use($id) {
                return Country::findOne($id)->name;
            }, Yii::$app->params['cacheTimeout']);
        }

        return Yii::createObject([
            'class' => 'yii\web\Response',
            'format' => Response::FORMAT_JSON,
            'data' => $return
        ]);
    }
}
