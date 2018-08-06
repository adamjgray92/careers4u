<?php

  use Cake\I18n\Time;

  $this->assign('title', '$job->title');

  // Created to words
  $createdDate = new Time(h($job->created));
?>

<?php $this->start('sidebar'); ?>

<?= $this->element('jobs/searchbar') ?>

<?php $this->end(); ?>

<article id="job-view">

<div class="container">

  <div class="row">

    <div class="col-sm-12">

      <header class="job-view--header">
        <img src="https://picsum.photos/100/100/?random" width="100px" height="100px" alt="Job Image">
        <hgroup>
          <h2><?= h($job->title) ?></h2>
          <h3><?= h($job->city) ?>, <?= h($job->area) ?></h3>
        </hgroup>
      </header>

      <section class="job-view--body">

        <section class="job-view--about">
          <h3>About This Job</h3>
          <p><?= nl2br(h($job->description)) ?></p>
        </section>

        <section class="job-view--summary">
          <div class="job-summary">
            <h3>Job Summary</h3>
            <h4>Location</h4>
            <p><?= h($job->city) ?>, <?= h($job->area) ?></p>
            <h4>Job Type</h4>
            <p><?= h($job->type->name) ?>, <?= h($job->contract->name) ?></p>
            <h4>Salary</h4>
            <p><?= h($job->salary) ?></p>
            <h4>Posted</h4>
            <p><?= $job->created->timeAgoInWords([
                'accuracy' => ['month' => 'month'],
                'end' => '1 week' ]) ?></p>
          </div>

          <?php if($job->contact_name || $job->contact_info): ?>
            <div class="contact-summary">
              <?php if($job->contact_name): ?>
                <h3>Contact Information</h3>
                <h5>Contact Name</h5>
                <p><?= h($job->contact_name) ?></p>
              <?php endif; ?>
              <?php if($job->contact_info): ?>
                <h5>Contact Number</h5>
                <p><?= h($job->contact_info) ?></p>
              <?php endif; ?>
            </div>
          <?php endif; ?>

          <div class="company-summary">
            <h3>About This Company</h3>
            
            <h4><?=  h($job->company->name) ?></h4>
            <img src="" alt="">
            <p><?= $this->Text->truncate(h($job->company->description), 100, ['ellipsis' => '...', 'exact' => false]) ?></p>
            <?= $this->Html->link('View Company Profile', ['controller' => 'Companies', 'action' => 'profile', $job->company->slug]); ?>
          </div>
          <?php if($related_jobs): ?>
            <div class="company-jobs-summary">
              <h3>Jobs From Company</h3>
              <ul>
                <?php foreach($related_jobs as $job): ?>
                <li><?= $this->Html->link($job->title, ['controller' => 'Jobs', 'action' => 'view', $job->id], ['title' => 'View ' . $job->title]) ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>
        </section>

      </section>

      <section class="job-view--actions">
        <?= $this->Html->link('Apply', ['action' => 'apply', h($job->id)], ['class' => 'btn btn-primary', 'title' => 'Apply now']) ?>
        <button class="job-view--mobile-btn">
          <i class="fas fa-ellipsis-v"></i>
        </button>
        <div class="job-view--actions-menu">
          <?= $this->Html->link('Save', ['action' => 'save'], ['class' => 'job-view-action-save']) ?>
          <a href="#" class="job-view-action-email">Email</a>
        </div>
      </section>

    </div>

  </div>

</div>

</article>