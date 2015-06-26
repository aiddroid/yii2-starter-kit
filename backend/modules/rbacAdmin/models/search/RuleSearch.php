<?php

namespace backend\modules\rbacAdmin\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\rbac\Rule;

/**
 * RuleSearch represents the model behind the search form about `common\models\User`.
 */
class RuleSearch extends Rule
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name','createdAt','updatedAt'], 'safe'],
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
        $rules = Yii::$app->authManager->getRules();

        $dataProvider = new \yii\data\ArrayDataProvider(['allModels'=>$rules]);

        return $dataProvider;
    }

    public function execute($user, $item, $params) {
        return true;
    }

}
