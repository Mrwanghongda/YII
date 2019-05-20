<!-- main container -->
<div class="content">

    <div class="container-fluid">
            <!-- Users table -->
            <div class="row-fluid table">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="span4 sortable">
                            用户名
                        </th>
                        <th class="span3 sortable">
                            <span class="line"></span>真实姓名
                        </th>
                        <th class="span2 sortable">
                            <span class="line"></span>昵称
                        </th>
                        <th class="span3 sortable align-right">
                            <span class="line"></span>性别
                        </th>
                        <th class="span3 sortable align-right">
                            <span class="line"></span>年龄
                        </th>
                        <th class="span3 sortable align-right">
                            <span class="line"></span>生日
                        </th>
                        <th class="span3 sortable align-right">
                            <span class="line"></span>公司
                        </th>
                        <th class="span3 sortable align-right">
                            <span class="line"></span>操作
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- row -->
                    <?php foreach ($users as $k => $v){?>
                        <tr class="first">
                            <td>
                                <?php if(empty($v->profile->avatar)) {?>
                                    <img src="<?php echo Yii::$app->params['defaultValue']['avatar']?>" class="img-circle avatar hidden-phone" />
                                <?php }else{ ?>
                                    <img src="assets/uploads/<?php echo $v->profile->avatar?>" class="img-circle avatar hidden-phone" />
                                <?php } ?>
                                <a href="user-profile.html" class="name"><?php echo $v->username?></a>
                                <span class="subtext">Graphic Design</span>
                            </td>
                            <td>
                                <?php echo isset($v->porfile->truename) ? $v->porfile->truename : '未填写' ?>
                            </td>
                            <td>
                                <?php echo isset($v->porfile->nickname) ? $v->porfile->nickname : '未填写' ?>
                            </td>
                            <td class="align-right">
                                <?php echo isset($v->porfile->age) ? $v->porfile->age : '未填写' ?>
                            </td>
                            <td class="align-right">
                                <?php echo isset($v->porfile->sex) ? $v->porfile->sex : '未填写' ?>
                            </td>
                            <td class="align-right">
                                <?php echo isset($v->porfile->birthday) ? $v->porfile->birthday : '未填写' ?>
                            </td>
                            <td class="align-right">
                                <?php echo isset($v->porfile->company) ? $v->porfile->company : '未填写' ?>
                            </td>
                            <td class="align-right">
                                <?php echo isset($v->porfile->truename) ? $v->porfile->truename : '未填写' ?>
                            </td>
                            <td class="align-right">
                                <a href="?r=user/del&id=<?php echo $v->userid?>">删除</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <?php
                if(Yii::$app->session->hasFlash('info')){
                    echo Yii::$app->session->getFlash('info');
                }
                ?>
            </div>
            <div class="pagination pull-right">
                <?php echo \yii\widgets\LinkPager::widget(['pagination' => $pagination , 'prevPageLabel' => '&#8249;' , 'nextPageLabel' => '&#8250;'])?>
            </div>
            <!-- end users table -->
        </div>
    </div>
</div>
<!-- end main container -->