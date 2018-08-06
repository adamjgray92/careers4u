<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<?php

$this->assign('title', $user->first_name . '\'s Profile');
$this->assign('heading', 'My Account');

?>

<?php $this->start('sidebar'); ?>

    <h1><?= $this->fetch('heading') ?></h1>
    <p><?= $this->fetch('subheading') ?></p>

<?php $this->end(); ?>

      
  <section class="profile--user-body">

    <h3 class="block-heading">My Dashboard</h3>

  </section>
