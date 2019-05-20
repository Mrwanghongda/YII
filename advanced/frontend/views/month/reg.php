<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin([
    'method' => 'post',
    'action' => ['month/add'],
]); ?>

<?= $form->field($model, 'username')->textInput() ?>

<?= $form->field($model, 'userpass')->passwordInput() ?>

<div class="form-group">
    <?= Html::submitButton('注册', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
