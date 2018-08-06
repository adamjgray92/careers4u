<?php

  $this->assign('title', 'Careers4U | Welcome');

?>

<section id="job-categories">
  <ul class="job-fields">
    <li><?= $this->Html->link('Recent Jobs', 'jobs/browse/', ['title'=>'Browse recent jobs']) ?></li>
    <li><?= $this->Html->link('Technology', ['action'=>'browse', 'category', 'technology'], ['title' => 'Browse technology jobs']) ?></li>
    <li><?= $this->Html->link('Consulting', ['action'=>'browse', 'category', 'consulting'], ['title' => 'Browse consulting jobs']) ?></li>
    <li><?= $this->Html->link('Engineering', ['action'=>'browse', 'category', 'engineering'], ['title' => 'Browse engineering jobs']) ?></li>
    <li><?= $this->Html->link('Construction', ['action'=>'browse', 'category', 'construction'], ['title' => 'Browse construction jobs']) ?></li>
  </ul>
</section> <!-- /job-field -->