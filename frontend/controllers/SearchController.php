<?php

namespace frontend\controllers;

use Yii;
use common\models\Page;
use yii\web\Controller;

class SearchController extends Controller
{
    public function actionIndex()
    {
        $page = max(1,(int)Yii::$app->request->get('page'));
        $pageSize = 5;
        
        $q = Yii::$app->request->get('q');
        $q = !$q ? 'android' : $q;
        
        $time = microtime(true);
        $search = Yii::$app->xunsearch->getDatabase('article')->getSearch();
        $search->setFuzzy();
        $search->setLimit($pageSize,($page-1)*$pageSize);
        $search->setSort('published_at');
        $docs = $search->setQuery($q)->search();
        $count = $search->count();
        $allCount = $search->dbTotal;
        
        $pagination = new \yii\data\Pagination();
        $pagination->setPageSize($pageSize);
        $pagination->totalCount = $count;
        
        $costTime = microtime(true)-$time;
        return $this->renderPartial('index',['q'=>$q,'search'=>$search,'docs'=>$docs,'pagination'=>$pagination,'costTime'=>$costTime,'count'=>$count,'allCount'=>$allCount]);
    }
}
