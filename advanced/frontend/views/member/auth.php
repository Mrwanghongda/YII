<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<!-- ========================================= MAIN ========================================= -->
<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <section class="section sign-in inner-right-xs">
                    <h2 class="bordered">Sign In</h2>
                    <p>Hello, Welcome to your account</p>

                    <div class="social-auth-buttons">
                        <div class="row">
                            <div class="col-md-6">
                                <button id='login_qq' class="btn-block btn-lg btn btn-facebook"><i class="fa fa-qq"></i> 使用QQ账号登录</button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn-block btn-lg btn btn-twitter"><i class="fa fa-twitter"></i> Sign In with Twitter</button>
                            </div>
                        </div>
                    </div>
                    <?php $form = ActiveForm::begin([
                        'method' => 'post',
                        'options' => [
                            'class' => 'login-form cf-style-1'
                        ],
                        'fieldConfig' => [
                            'template' => ' <div class="field-row">{error}{label}{input}</div>',
                        ],
                        'action' => ['member/auth'],
                    ])?>
                    <?php echo $form->field($model , 'loginname')->textInput(['class' => 'le-input'])?>
                    <?php echo $form->field($model , 'userpass')->passwordInput(['class' => 'le-input'])?>
                    <div class="buttons-holder">
                        <?=Html::submitButton('Secure Sign In' , ['class' => 'le-button huge'])?>
                    </div><!-- /.buttons-holder -->
                    <?php ActiveForm::end(); ?>
                </section><!-- /.sign-in -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</main><!-- /.authentication -->
<!-- ========================================= MAIN : END ========================================= -->