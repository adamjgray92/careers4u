<?php 
  use Cake\I18n\Time;
?>

<section class="profile--user-body">

<h3 class="block-heading">Edit Company: <?= h($company->name) ?></h3>

<?php

  $now = Time::now();
  $sizes = ['1 - 5 Employees' => '1 -5',
          '6 - 10 Employees' => '6 - 10',
          '11 - 20 Employees' => '11 - 20',
          '21 - 50 Employees' => '21 - 50',
          '51 - 100 Employees' => '51 - 100',
          '100+ Employees' => '100+'];

  echo $this->Form->create($company, ['type' => 'file', 'class' => 'form-control', 'context' => ['validator' => 'add'], 'novalidate' => true]);
  echo $this->Form->hidden('user_id', ['value' => 1]);
  echo $this->Form->control('name', ['label' => 'Company Name']);
  echo "<div class='input-row'>";
  echo $this->Form->control('size', ['label' => 'Company Size', 'type' => 'select', 'options' => $sizes]);
  echo $this->Form->control('founded', [ 'label' => 'Founded', 'type' => 'date',
    'minYear' => 1900,
    'maxYear' => $now->year,
    'empty' => [
      'year' => false,
    ],
    'day' => false,
    'month' => false
  ]);
  echo "</div>";
  echo $this->Form->control('website', ['type' => 'url']);
  echo $this->Form->control('headquarters');
  echo $this->Form->control('industry');
  echo $this->Form->control('description', ['rows' => '10']);
  echo $this->Form->control('image_path', ['type' => 'file']);
  echo $this->Form->button(__('Save'), ['class' => 'btn btn-primary']);
  echo $this->Form->end();
?>



</section>

