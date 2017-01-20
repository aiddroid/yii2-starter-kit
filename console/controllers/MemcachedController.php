<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;
use yii\helpers\Console;

class MemcachedController extends Controller{
    
    public function actionAdd($flag = 'A'){
        $counter = (int) Yii::$app->mcache->get('counter');
        Console::output($flag.' counter:'.$counter);
        
        for($i=0;$i<20;$i++){
            sleep(1);
            
            Yii::$app->mcache->set('counter',++$counter);
            Console::output($flag.' Add');
        }
        
        $counter = Yii::$app->mcache->get('counter');
        Console::output($flag.' Current counter:'.$counter);
    }
    
    public function actionCas($sleep = 5){
        $cas = null;
        //Yii::$app->mcache->getMemcache()->set('counter',100);die;
        for($i=0;$i<20;$i++){
            $counter = (int) Yii::$app->mcache->getMemcache()->get('counter',null,$cas);
            Console::output(' counter:'.$counter);
            sleep($sleep);
            
            //Yii::$app->mcache->cas($cas,'counter',--$counter);
            Yii::$app->mcache->getMemcache()->cas($cas,'counter',--$counter);
            Console::output("Code: ".Yii::$app->mcache->getMemcache()->getResultCode()." Msg:".Yii::$app->mcache->getMemcache()->getResultMessage()." Cas:{$cas}");
        }
        
        $counter = Yii::$app->mcache->getMemcache()->get('counter');
        Console::output('Current counter:'.$counter);
    }
    
    public function actionGet(){
        $counter = Yii::$app->mcache->get('counter');
        Console::output(' Current counter:'.$counter);
    }
    
    public function actionSet(){
        Yii::$app->mcache->set('counter',100);
        $counter = Yii::$app->mcache->get('counter');
        Console::output(' Current counter:'.$counter);
    }
    
    public function actionHeap(){
        $heap = new \SplMinHeap();
        
        for($i=0;$i<1000000;$i++){
            $heap->insert($i);
            if(count($heap) == 10){
                $heap->extract();
            }
        }
        
        foreach($heap as $item){
            echo $item.PHP_EOL;
        }
    }
}