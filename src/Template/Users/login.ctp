<?php
/**
 * @var \App\View\AppView $this
 */

 $this->assign('title', 'Log in');
 $this->assign('heading', 'Sign In With Careers4U Account');
 $this->assign('subheading', 'Start your career journey now.');
?>

<?php $this->start('sidebar'); ?>

<h1><?= $this->fetch('heading') ?></h1>
<p><?= $this->fetch('subheading') ?></p>

<?php $this->end(); ?>

<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <?= $this->Form->create(null, ['class' => 'form-control']) ?>
      <?= $this->Form->control('email') ?>
      <?= $this->Form->control('password') ?>
      <?= $this->Form->control('remember_me', ['type'=>'radio', 'options'=>[
        [1=>'Yes'], [0=>'No']
      ]]) ?>
      <div class="input">
      <?= $this->Html->link('Forgot password?', ['action' => 'forgot_password']) ?>
      </div>
      <?= $this->Form->button('Login', ['class' => 'btn btn-primary']) ?>
      <?= $this->Form->end() ?>
    </div>
  </div>
</div>

