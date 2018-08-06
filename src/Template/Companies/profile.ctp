<!-- <?= $this->Form->postLink(
  'Delete',
  ['action' => 'delete', $company->slug],
  ['confirm' => 'Are you sure?']) 
?> -->

<?php

  $this->assign('title', $company->name .  ' Profile');
  $this->assign('heading', $company->name . ' Profile');
  $this->assign('subheading', 'Discover the right company for you!');
  
?>

<?php $this->start('sidebar'); ?>

<h1><?= $this->fetch('heading') ?></h1>
<p><?= $this->fetch('subheading') ?></p>

<?php $this->end(); ?>

<article id="company-profile">

<div class="container">

  <div class="row">

    <div class="col-sm-12">

      <header class="profile--header">
        <div class="profile--title">
          <img src="<?= $this->request->webroot . 'img/company/' . $company->slug . '/' . $company->image_path ?>" width="200px" height="100px" alt="<?= h($company->name) ?> logo">
          <hgroup>
            <h2><?= h($company->name) ?></h2>
            <h3><?= h($company->city), h($company->area) ?></h3>
          </hgroup>
        </div>
        
        <div class="profile--details">
          <ul>
            <?php if($company->website): ?>
              <li><h4>Website</h4> <?= $this->Text->truncate(h($company->website), 25, ['ellipsis' => '...', 'exact' => false]) ?></li>
            <?php endif; ?>
            <?php if($company->headquarters): ?>
              <li><h4>Headquarters</h4> <?= h($company->headquarters) ?></li>
            <?php endif; ?>
            <?php if($company->size): ?>
              <li><h4>Size</h4> <?= h($company->size) ?></li>
            <?php endif; ?>
            <?php if($company->industry): ?>
              <li><h4>Industry</h4> <?= h($company->industry) ?></li>
            <?php endif; ?>
          </ul>
        </div>
      </header>

      <div class="profile--body">

        <section class="profile--about">
          <h3>Company Overview</h3>
          <p><?= $this->Text->autoParagraph(h($company->description)) ?></p>
        </section>

        <section class="profile--jobs">
          <h3><?= h($company->name) ?> Jobs</h3>
          <?php if(!$jobs): ?>
            <p>No jobs at this company at the moment.</p>
          <?php else: ?>
            <ul>
              <?php foreach($jobs as $job): ?>
              <li>
                <h4><a href="#"><?= $job->title ?></a></h4>
                <span><?= $job->city ?>, <?= $job->area ?></span>
                <p><?= $this->Text->truncate(h($job->description), 250, [
                  'ellipsis' => '...',
                  'exact' => false
                ]) ?></p>
              </li>
              <?php endforeach; ?>
            </ul>
            <?= $this->Html->link('View All ' . h($company->name) . ' Jobs',
              ['controller' => 'Company', 'action' => 'Jobs', h($company->slug)],
              ['title' => 'Browse all ' . h($company->name) . ' jobs',
              'class' => 'profile--jobs-all']) ?>
            <?php endif; ?>
        </section>

      </div>

    </div>

  </div>

</div>

</article>