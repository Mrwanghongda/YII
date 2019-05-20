<?php
namespace frontend\models;

use  yii\db\ActiveRecord;
use Yii;

class Goods extends ActiveRecord{

    public function rules(){
        return [
            ['goods_name' , 'required' , 'message' => '搜索值不能为空'],
        ];
    }

    public function all(){
        $goods = Goods::find()->orderBy('id')->all();
        return $goods;
    }

    public function search($search){
        $good = Goods::find()->where(['like', 'goods_name', $search])->all();
        return $good;
    }
}