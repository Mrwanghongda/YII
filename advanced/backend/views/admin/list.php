<!-- main container -->
<div class="content">

    <div class="container-fluid">
        <div id="pad-wrapper" class="users-list">
            <div class="row-fluid header">
                <h3>Users</h3>
                <div class="span10 pull-right">
                    <input type="text" class="span5 search" placeholder="Type a user's name..." />

                    <!-- custom popup filter -->
                    <!-- styles are located in css/elements.css -->
                    <!-- script that enables this dropdown is located in js/theme.js -->
                    <div class="ui-dropdown">
                        <div class="head" data-toggle="tooltip" title="Click me!">
                            Filter users
                            <i class="arrow-down"></i>
                        </div>
                        <div class="dialog">
                            <div class="pointer">
                                <div class="arrow"></div>
                                <div class="arrow_border"></div>
                            </div>
                            <div class="body">
                                <p class="title">
                                    Show users where:
                                </p>
                                <div class="form">
                                    <select>
                                        <option />Name
                                        <option />Email
                                        <option />Number of orders
                                        <option />Signed up
                                        <option />Last seen
                                    </select>
                                    <select>
                                        <option />is equal to
                                        <option />is not equal to
                                        <option />is greater than
                                        <option />starts with
                                        <option />contains
                                    </select>
                                    <input type="text" />
                                    <a class="btn-flat small">Add filter</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="new-user.html" class="btn-flat success pull-right">
                        <span>&#43;</span>
                        NEW USER
                    </a>
                </div>
            </div>

            <!-- Users table -->
            <div class="row-fluid table">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="span4 sortable">
                            管理员姓名
                        </th>
                        <th class="span3 sortable">
                            <span class="line"></span>登录时间
                        </th>
                        <th class="span2 sortable">
                            <span class="line"></span>登录IP
                        </th>
                        <th class="span3 sortable align-right">
                            <span class="line"></span>管理员Email
                        </th>
                        <th class="span3 sortable align-right">
                            <span class="line"></span>操作
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        <!-- row -->
                        <?php foreach ($admin as $k => $v){?>
                            <tr class="first">
                                <td>
                                    <img src="assets/admin/img/contact-img2.png" class="img-circle avatar hidden-phone" />
                                    <a href="user-profile.html" class="name"><?php echo $v->adminuser?></a>
                                    <span class="subtext">Graphic Design</span>
                                </td>
                                <td>
                                    <?php echo date('Y-m-d H:i:s',$v->logintime)?>
                                </td>
                                <td>
                                    <?php echo long2ip($v->loginip);?>
                                </td>
                                <td class="align-right">
                                    <a href="javascript:void(0)"> <?php echo $v->adminemail?></a>
                                </td>
                                <td class="align-right">
                                    <a href="?r=admin/del&id=<?php echo $v->adminid?>">删除</a>
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