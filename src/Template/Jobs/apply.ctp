<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Application $application
 */
?>

<?php

$this->assign('title', 'Apply');
$this->assign('heading', 'Job Application');
$this->assign('subheading', h($job->title) . ' - ' . h($job->city) . ' - ' . h($job->salary));

?>

<?php $this->start('sidebar'); ?>

  <h1><?= $this->fetch('heading') ?></h1>
  <p><?= $this->fetch('subheading') ?></p>

<?php $this->end(); ?>

<div class="container">
  <div class="row">
    <div class="col-sm-12">
    <?= $this->Form->create(null, ['url' => ['controller' => 'Applications', 'action' => 'add'], 'class' => 'form-control']) ?>
    <?= $this->Form->control('user_id', ['type' => 'hidden']) ?>
    <?= $this->Form->control('job_id', ['type' => 'hidden']) ?>

  <fieldset>
    <legend>1. Enter Contact Information</legend>
      <?= $this->Form->control('email') ?>
      <?= $this->Form->control('contact_number') ?>
  </fieldset>

  <fieldset>
    <legend>2. Add CV &amp; Cover Letter</legend>
    <?= $this->Form->control('cv_path', ['type' => 'file']) ?>
    <?= $this->Form->control('cover_letter_path', ['type' => 'file']) ?>
  </fieldset>

  <fieldset>
    <legend>3. Enter Your Details</legend>
    <?= $this->Form->control('first_name') ?>
    <?= $this->Form->control('last_name') ?>
    <?= $this->Form->control('eligible_uk', ['type' => 'radio', 'options' => [1 => 'Yes', 0 => 'No']]) ?>
    <?= $this->Form->control('eligible_eu', ['type' => 'radio', 'options' => [1 => 'Yes', 0 => 'No']]) ?>
    <?= $this->Form->control('education') ?>
    <?= $this->Form->control('current_job') ?>
    <?= $this->Form->control('expected_salary') ?>
  </fieldset>

  <?= $this->Form->control('status', ['type' => 'hidden', 'value' => 'Applied']) ?>
  <?= $this->Form->button(__('Send Application'), ['class' => 'btn btn-primary']) ?>
  <?= $this->Form->end() ?>
    </div>
  </div>
</div>


