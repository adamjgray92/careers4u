<?= $this->Form->create(null, [
  'url' => [
    'controller' => 'Jobs',
    'action' => 'search'
  ],
  'type' => 'get',
  'class' => 'job-search-small']) ?>

<div class="form-input">
  <i class="fas fa-search"></i>
  <?= $this->Form->text('job', ['placeholder' => 'Job Keyword']) ?>
</div>

<div class="form-input">
  <i class="fas fa-building"></i>
  <?= $this->Form->text('location', ['placeholder' => 'City or Area']) ?>
</div>

<div class="form-button">
  <?= $this->Form->button('Search', ['class' => 'btn btn-outline']) ?>    
</div>

<?= $this->Form->end() ?>