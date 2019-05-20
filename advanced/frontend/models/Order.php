<?php
namespace frontend\models;

use yii\base\Model;
use Yii;

class Orders extends Model{

    //添加订单
    public function add($gid,$uid){
        Yii::$app->db->createCommand()->insert('orders', [
            'uid' => $uid,
            'gid' => $gid,
        ])->execute();
        return true;
    }

    //展示订单
    public function all(){
        $sql = "select * from goods as g inner join orders as o on o.gid = g.id";
        $orders = Yii::$app->db->createCommand($sql)
            ->queryAll();
        return $orders;
    }
}