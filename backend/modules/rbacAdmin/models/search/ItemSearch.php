<?php

namespace backend\modules\rbacAdmin\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\User;

/**
 * ItemSearch represents the model behind the search form about `common\models\User`.
 */
class ItemSearch extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'uploaded_size', 'uploaded_limit_size', 'status', 'created_at', 'updated_at', 'logged_at'], 'integer'],
            [['username', 'auth_key', 'password_hash', 'password_reset_token', 'oauth_client', 'oauth_client_user_id', 'nickname', 'email'], 'safe'],
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
        $query = User::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'uploaded_size' => $this->uploaded_size,
            'uploaded_limit_size' => $this->uploaded_limit_size,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'logged_at' => $this->logged_at,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'oauth_client', $this->oauth_client])
            ->andFilterWhere(['like', 'oauth_client_user_id', $this->oauth_client_user_id])
            ->andFilterWhere(['like', 'nickname', $this->nickname])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
