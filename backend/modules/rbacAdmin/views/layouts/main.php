<?php
use yii\helpers\Html;
use backend\widgets\Menu;
use yii\widgets\Breadcrumbs;

?>
<?php $this->beginContent('@backend/views/layouts/main.php') ?>
    <div>
            <section class="sidebar">
            <?php
            echo Menu::widget([
                        'items'=>[
                            [
                                'label'=>'Assignment',
                                'icon'=>'<i class="fa fa-database"></i>',
                                'url'=>['/rbacAdmin/assignment/index'],
                                'badge'=> 10,
                                'badgeBgClass'=>'label-success',
                            ],
                            [
                                'label'=>'Role',
                                'icon'=>'<i class="fa fa-users"></i>',
                                'url'=>['/rbacAdmin/role/index'],
                                'visible'=>Yii::$app->user->can('administrator')
                            ],
                            [
                                'label'=>'Permission',
                                'icon'=>'<i class="fa fa-key"></i>',
                                'url'=>['/rbacAdmin/permission/index'],
                                'visible'=>Yii::$app->user->can('administrator')
                            ],
                            [
                                'label'=>'Rule',
                                'icon'=>'<i class="fa fa-book"></i>',
                                'url'=>['/rbacAdmin/rule/index'],
                                'visible'=>Yii::$app->user->can('administrator')
                            ]
                        ]
                    ]);

            ?>
            </section>

            <section class="content">
            <!-- <div class="container"> -->
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>

                <?= $content ?>
            <!-- </div> -->
            </section>
    </div>

<?php $this->endContent() ?>