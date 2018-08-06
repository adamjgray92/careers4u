
<?php $this->start('sidebar'); ?>

<?= $this->element('jobs/searchbar') ?>

<?php $this->end(); ?>

<?php 

  $search_string = '';

  if(($browse_value['job'] != '' || $browse_value['job'] != null ) && 
  ($browse_value['location'] != '' || $browse_value['location'] != null )){
    $search_string = 'Results Show "' . ucwords($browse_value['job']) . '" Jobs in ' . ucwords($browse_value['location']);
  }elseif(($browse_value['job'] != '' || $browse_value['job'] != null ) && 
  ($browse_value['location'] == '' || $browse_value['location'] == null )){
    $search_string = 'Results Show "' . ucwords($browse_value['job']) . '" Jobs';
  }elseif(($browse_value['job'] == '' || $browse_value['job'] == null ) && 
  ($browse_value['location'] != '' || ucwords($browse_value['location']) != null )){
    $search_string = 'Results Show Jobs in ' . $browse_value['location'];
  }

?>

<?= $this->element('jobs/header', [
  'browse_string' => $search_string
]) ?>

<?= $this->element('jobs/list') ?>