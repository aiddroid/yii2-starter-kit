<?php

namespace backend\modules\rbacAdmin\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\rbac\Item;

/**
 * RoleSearch represents the model behind the search form about `common\models\User`.
 */
class RoleSearch extends Item
{
    public $type = Item::TYPE_ROLE;
    
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
        $roles = Yii::$app->authManager->getRoles();

        $dataProvider = new \yii\data\ArrayDataProvider(['allModels'=>$roles]);

        return $dataProvider;
    }
}
