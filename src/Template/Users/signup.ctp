<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

 $this->assign('title', 'Sign up today');
 $this->assign('heading', 'Create your account');
 $this->assign('subheading', 'Post Jobs & Find Talent');
?>

<?php $this->start('sidebar'); ?>

<h1><?= $this->fetch('heading') ?></h1>
<p><?= $this->fetch('subheading') ?></p>

<?php $this->end(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <?= $this->Form->create($user, ['class' => 'form-control']) ?>
                <?php
                    echo $this->Form->control('first_name');
                    echo $this->Form->control('last_name');
                    echo $this->Form->control('email');
                    echo $this->Form->control('password');
                    echo $this->Form->control('password_again', ['type' => 'password']);
                    echo $this->Form->control('roles', ['type' => 'select', 'options' => $roles,
                    'disabled' => array(1),
                    'empty' => '-- Account Role --'
                    ]);
                ?>
            <?= $this->Form->button(__('Register'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>


