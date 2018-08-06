<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Application $application
 */
?>

<section class="profile--user-body">
    <h3 class="block-heading"><?= h($application->first_name) . '\'s ' . ' application - ' . h($application->job->title) . ' REF: #' . h($application->job_id) ?></h3>
    <?= $this->Form->create($application, ['url' => ['action' => 'edit'], 'class' => 'form-control']) ?>
    <?= $this->Form->control('first_name', ['readonly' => 'readonly']) ?>
    <?= $this->Form->control('last_name', ['readonly' => 'readonly']) ?>
    <?= $this->Form->control('email', ['readonly' => 'readonly']) ?>
    <?= $this->Form->control('contact_number', ['readonly' => 'readonly']) ?>
    <?php if(isset($application->education)): ?>
        <?= $this->Form->control('education', ['readonly' => 'readonly']) ?>
    <?php endif; ?>
    <?php if(isset($application->current_job)): ?>
        <?= $this->Form->control('current_job', ['readonly' => 'readonly']) ?>
    <?php endif; ?>
    <?php if(isset($application->expected_salary)): ?>
        <?= $this->Form->control('expected_salary', ['readonly' => 'readonly']) ?>
    <?php endif; ?>
    <?= $this->Form->control('status', ['type' => 'select', 'options' =>[
        'Applied',
        'Contacted',
        'Rejected',
        'Success'
    ], 'disabled' => 'disabled']) ?>
    <?php if(isset($application->eligible_uk)): ?>
    <div class="input radio">
    <?= $this->Form->label('Eligible to work in the UK') ?>
    <?= $this->Form->radio('eligible_uk', [
        ['value' => 1, 'text' => 'Yes'],
        ['value' => 0, 'text' => 'No']], ['disabled' => 'disabled']) ?>
    </div>
    <?php endif; ?>
    <?php if(isset($application->eligible_eu)): ?>
    <div class="input radio">
    <?= $this->Form->label('Eligible to work in the EU') ?>
    <?= $this->Form->radio('eligible_eu', [
        ['value' => 1, 'text' => 'Yes'],
        ['value' => 0, 'text' => 'No']], ['disabled' => 'disabled']) ?>
    </div>   
    <?php endif; ?>
    <?= $this->Form->control('notes') ?>
    <?= $this->Form->button(__('Update Application'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</section>

<div class="applications view large-9 medium-8 columns content">
    <h3><?= h($application->id) ?></h3>

        <tr>
            <th scope="row"><?= __('Cv Path') ?></th>
            <td><?= h($application->cv_path) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cover Letter Path') ?></th>
            <td><?= h($application->cover_letter_path) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($application->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($application->created) ?></td>
        </tr>
    </table>
</div>
