<!-- main container .wide-content is used for this layout without sidebar :)  -->
<div class="content wide-content">
    <div class="container-fluid">
        <div class="settings-wrapper" id="pad-wrapper">
            <!-- avatar column -->
            <div class="span3 avatar-box">
                <div class="personal-image">
                    <img src="assets/admin/img/personal-info.png" class="avatar img-circle" />
                    <p>上传您的头像...</p>

                    <input type="file" />
                </div>
            </div>

            <!-- edit form column -->
            <div class="span7 personal-info">
                <div class="alert alert-info">
                    <i class="icon-lightbulb"></i>您可以在这里编辑您的个人邮箱
                </div>
                <hr>

                <?php
                if(Yii::$app->session->hasFlash('info')){
                    echo Yii::$app->session->getFlash('info');
                }
                $form = \yii\widgets\ActiveForm::begin([
                    'fieldConfig' => [
                        'template' => '<div class="field-box">{label}{input}</div>{error}',
                    ],
                    'method' => 'post',
                ]);
                ?>
                <?php echo $form->field($model,'adminuser')->textInput(['class' => 'span5 inline-input' , 'disabled' => true])?>
                <?php echo $form->field($model,'adminpass')->passwordInput(['class' => 'span5 inline-input'])?>
                <?php echo $form->field($model,'adminemail')->textInput(['class' => 'span5 inline-input'])?>

                <div class="span6 field-box actions">
                    <?php echo \yii\helpers\Html::submitButton('保存修改',['class'=> 'btn-glow primary'])?>
                    <span>或者</span>
                    <?php echo \yii\helpers\Html::resetButton('取消',['class'=>'reset'])?>
                </div>
                <?php \yii\widgets\ActiveForm::end();?>
            </div>
        </div>
    </div>
</div>
<!-- end main container -->