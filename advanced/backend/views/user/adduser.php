<!-- main container -->
<div class="content">

    <div class="container-fluid">
        <div id="pad-wrapper" class="new-user">
            <div class="row-fluid header">
                <h3>Create a new user</h3>
            </div>

            <div class="row-fluid form-wrapper">
                <!-- left column -->
                <div class="span9 with-sidebar">
                    <div class="container">
                        <?php
                        use yii\helpers\Html;
                        use yii\widgets\ActiveForm;
                        if(Yii::$app->session->hasFlash('info')){
                            echo Yii::$app->session->getFlash('info');
                        }
                        $form = ActiveForm::begin([
                            'options' => ['new_user_form inline-input'],
                            'method' => 'post',
                            'fieldConfig' => [
                                'template' => "<div class='span12 field-box'>{error}{label}{input}</div>",
                            ],
                        ])
                        ?>
                        <?php echo $form->field($model,'username')->textInput(['class' => 'span9','placeholder' => '请输入用户名称'])?>
                        <?php echo $form->field($model,'useremail')->textInput(['class' => 'span9','placeholder' => '请输入用户邮箱'])?>
                        <?php echo $form->field($model,'userpass')->passwordInput(['class' => 'span9','placeholder' => '请输入用户密码'])?>
                        <?php echo $form->field($model,'repass')->passwordInput(['class' => 'span9','placeholder' => '请确认密码'])?>
                        <div class="span11 field-box actions">
                            <?= Html::submitButton('添加管理', ['class' => 'btn-glow primary', 'name' => 'submit-button']) ?>
                            <?= Html::resetButton('重置操作', ['class' => 'reset', 'name' => 'submit-button']) ?>
                        </div>
                        <?php ActiveForm::end();?>
                    </div>
                </div>

                <!-- side right column -->
                <div class="span3 form-sidebar pull-right">
                    <div class="btn-group toggle-inputs hidden-tablet">
                        <button class="glow left active" data-input="inline">INLINE INPUTS</button>
                        <button class="glow right" data-input="normal">NORMAL INPUTS</button>
                    </div>
                    <div class="alert alert-info hidden-tablet">
                        <i class="icon-lightbulb pull-left"></i>
                        Click above to see difference between inline and normal inputs on a form
                    </div>
                    <h6>Sidebar text for instructions</h6>
                    <p>Add multiple users at once</p>
                    <p>Choose one of the following file types:</p>
                    <ul>
                        <li><a href="#">Upload a vCard file</a></li>
                        <li><a href="#">Import from a CSV file</a></li>
                        <li><a href="#">Import from an Excel file</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end main container -->