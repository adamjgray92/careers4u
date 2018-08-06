<h2>Find qualified &amp; talented workers near you.</h2>
<p>Careers4U is the best place to start your new career. With over 1000 opportunties posted every day.
</p>
<?= $this->Form->create(null, [
  'url' => [
    'controller' => 'Jobs',
    'action' => 'search'
  ],
  'type' => 'get',
  'class' => 'job-search']) ?>
  <div class="form-field">
    <div class="form-input">
      <i class="fas fa-search"></i>
      <?= $this->Form->text('job', ['placeholder' => 'Job Keyword']) ?>
    </div>

    <div class="form-input">
      <i class="fas fa-building"></i>
      <?= $this->Form->text('location', ['placeholder' => 'City or Area']) ?>
    </div>

    <div class="form-button">
      <?= $this->Form->button('Search', ['class' => 'btn btn-outline', 'role' => 'search']) ?>    
    </div>

    <?= $this->Form->end() ?>
  </div>