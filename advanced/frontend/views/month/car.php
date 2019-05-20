<table width="500px">
    <tr>
        <td align="content">商品名称</td>
        <td align="content">商品单价</td>
        <td align="content">商品库存</td>
        <td align="content">操作</td>
    </tr>
    <?php
    foreach ($order as $k => $v){
        ?>
        <tr>
            <td><?php echo $v['goods_name']?></td>
            <td><?php echo $v['goods_price']?></td>
            <td><?php echo $v['goods_stock']?></td>
            <td><a href="?r=month/pay&id=<?php echo $v['id']?>">点击付款</a></td>
        </tr>
    <?php }?>
</table>