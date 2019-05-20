<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
?>
<div class="form-group">
    <h3>商城首页</h3>
    <hr>
    <p>欢迎<?php echo $user['username']?>登陆,积分为：<?php echo $user['integral']?></p>
    <?= Html::button('点击签到', ['class' => 'btn btn-primary']) ?>
</div>
<hr>

<?php $form = ActiveForm::begin([
    'method' => 'post',
    'action' => ['month/search'],
]); ?>

<?= $form->field($model, 'goods_name')->textInput() ?>
<?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end(); ?>
<br>
<table width="500px">
    <tr>
        <td align="content">商品名称</td>
        <td align="content">商品单价</td>
        <td align="content">商品库存</td>
        <td align="content">操作</td>
    </tr>
    <?php
    foreach ($goods as $k => $v){
        ?>
        <tr>
            <td><?php echo $v['goods_name']?></td>
            <td><?php echo $v['goods_price']?></td>
            <td><?php echo $v['goods_stock']?></td>
            <td><a href="?r=month/buy&id=<?php echo $v['id']?>">点击购买</a></td>
        </tr>
    <?php }?>
</table>
<hr>





