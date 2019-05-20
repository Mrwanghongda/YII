<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<!-- ========================================= MAIN ========================================= -->
<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <section class="section register inner-left-xs">
                    <h2 class="bordered">Create New Account</h2>
                    <p>Create your own Media Center account</p>
                    <?php
                    if(Yii::$app->session->hasFlash('info')){
                        echo Yii::$app->session->getFlash('info');
                        echo '<br>'.'<a href="?r=login/index">Whether to go to login？</a>';
                    }
                    ?>
                    <?php $form = ActiveForm::begin([
                        'id' => 'form1',
                        'method' => 'post',
                        'options' => ['class'=>'login-form cf-style-1' , 'role' => 'form'],
                        'fieldConfig' => [
                            'template' => '<div class="field-row">{error}{label}{input}</div>',
                        ]
                    ])?>
                    <?php echo $form->field($model , 'useremail')->textInput(['class' => 'le-input'])?>
                    <div class="buttons-holder">
                        <?=Html::submitButton('Sign Up' , ['class' => 'le-button huge']) ?>
                    </div>
                    <?php ActiveForm::end();?>


                    <h2 class="semi-bold">Sign up today and you'll be able to :</h2>

                    <ul class="list-unstyled list-benefits">
                        <li><i class="fa fa-check primary-color"></i> Speed your way through the checkout</li>
                        <li><i class="fa fa-check primary-color"></i> Track your orders easily</li>
                        <li><i class="fa fa-check primary-color"></i> Keep a record of all your purchases</li>
                    </ul>

                </section><!-- /.register -->

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</main><!-- /.authentication -->
<!-- ========================================= MAIN : END ========================================= -->