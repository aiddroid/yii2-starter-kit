<?php

namespace backend\modules\rbacAdmin\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\rbac\Item;

/**
 * PermissionSearch represents the model behind the search form about `common\models\User`.
 */
class PermissionSearch extends Item
{
    public $type = Item::TYPE_PERMISSION;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','type', 'description'], 'required'],
            ['ruleName','string','max'=>64],
            ['data','string','max'=>512],
            [['type', 'name', 'description','ruleName','data','createdAt','updatedAt'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $permissions = Yii::$app->authManager->getPermissions();

        $dataProvider = new \yii\data\ArrayDataProvider(['allModels'=>$permissions]);

        return $dataProvider;
    }
}
