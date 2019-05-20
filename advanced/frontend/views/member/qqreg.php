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
                    <h2 class="bordered">
                        Improve your information
                        <img src="<?php echo Yii::$app->session['userinfo']['figureurl_1']?>">
                    </h2>
                    <p>Please fill in your account number and password!</p>
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
                    <input type="text" value="<?php echo Yii::$app->session['userinfo']['nickname']?Yii::$app->session['userinfo']['nickname']:'abstract.' ?>" class="le-input" disabled>
                    <?php echo $form->field($model , 'username')->textInput(['class' => 'le-input'])?>
                    <?php echo $form->field($model , 'userpass')->passwordInput(['class' => 'le-input'])?>
                    <?php echo $form->field($model , 'repass')->passwordInput(['class' => 'le-input'])?>
                    <div class="buttons-holder">
                        <?=Html::submitButton('Improve Information' , ['class' => 'le-button huge'])?>
                    </div><!-- /.buttons-holder -->
                    <?php ActiveForm::end(); ?>
                </section><!-- /.sign-in -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</main><!-- /.authentication -->
<!-- ========================================= MAIN : END ========================================= -->