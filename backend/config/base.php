<?php
return [
    'id' => 'backend',
    'basePath' => dirname(__DIR__),
    'components' => [
<<<<<<< HEAD
        'urlManager'=>require(__DIR__.'/_urlManager.php'),
        'request' => [
          'parsers' => [ // 因为模块中有使用angular.js  所以该设置是为正常解析angular提交post数据
              'application/json' => 'yii\web\JsonParser'
          ]
        ],
=======
        'urlManager' => require(__DIR__.'/_urlManager.php'),
        'frontendCache' => require(Yii::getAlias('@frontend/config/_cache.php'))
>>>>>>> upstream/master
    ],
];
