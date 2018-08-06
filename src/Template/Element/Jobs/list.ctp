<?php $applyLinkText = "Apply <i class=\"fas fa-chevron-right\"></i>"; ?>

<section id="job-listings">
  <?php if(!empty($jobs)): ?>
    <ul class="job-listings-list">
    <?php foreach($jobs as $job): ?>
      <li class="job-listing">
        <img src="" alt="PHP">
        <div class="job-details">
          <h3><?= $this->Html->link(h($job->title), 
          ['controller'=>'jobs',
          'action'=>'view',
            $job['id']], ['title'=>'Apply', 'escape'=>false])
          ?></h3>
          <div class="job-posted-by">
            By <?= $this->Html->link(h($job->company->name), [
              'controller' => 'Companies',
              'action' => 'profile',
              $job->company->slug], ['title' => 'View ' . $job->company->name])
              ?>
          <span class="job-date-tag"><?= $job->created->timeAgoInWords([
                'accuracy' => ['month' => 'month'],
                'end' => '1 week' ]) ?></span>
          <span class="job-type-tag"><?= h($job->type->name) ?></span>
        </div>
        </div>
        
        <?= $this->Html->link($applyLinkText, 
          ['controller'=>'jobs',
          'action'=>'apply',
            $job['id']], ['class'=>'job-listing-apply', 'title'=>'Apply', 'escape'=>false])
        ?>
      </li>
    <?php endforeach; ?>
    </ul>
  <?php else: ?>
    <p>Sorry, No Jobs For This Match :(</p>
  <?php endif; ?>
</section><!-- / job-listings -->