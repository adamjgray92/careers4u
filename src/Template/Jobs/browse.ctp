<?php $this->start('sidebar'); ?>

<?= $this->element('jobs/searchbar') ?>

<?php $this->end(); ?>

<?php 
  $alphabet = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j',
                  'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't',
                  'u', 'v', 'w', 'x', 'y', 'z'];
  function header_strings($type = null, $value = null){
    $outString = '';
    $value = !is_null($value)? ucwords(h($value)) : null;
    if(!is_null($value)){
      switch ($type) {
        case 'title':
          $outString = 'Showing Job Titles for "' . $value . '"';
          break;
        case 'company':
          $outString = 'Showing Companies for "' . $value . '"';
          break;
        case 'location':
          $outString = 'Showing Jobs in "' . $value . '"';
          break;
        case 'category':
          $outString = 'Showing Job Titles for "' . $value . '"';
          break;
        default:
          $outString = 'Recent Job Listings';
          break;
      }
    }else{
      $outString = "Recently Added";
    }
    return $outString;
  }
?>


<?= $this->element('jobs/header', [
  'browse_string'=>header_strings($type, $value),
  'browse_value'=>$value]) ?>
<?= $this->element('jobs/list') ?>

<section id="browse-jobs">
  <div class="container">
    <h2>Browse Jobs</h2>
    <div class="row">
      <div class="col-md-6 col-sm-12">
          <div class="jobs-by-title">
            <h3>Jobs By Title</h3>
            <ul>
              <?php foreach($alphabet as $letter): ?>
                <li><?= $this->Html->link($letter, 'jobs/browse/title/' . $letter, ['title'=>'Browse Jobs Starting with the Letter ' . strtoupper($letter)]); ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
      </div>
      <div class="col-md-6 col-sm-12">
          <div class="jobs-by-company">
            <h3>Jobs By Company</h3>
            <ul>
              <?php foreach($alphabet as $letter): ?>
                <li><?= $this->Html->link($letter, 'jobs/browse/company/' . $letter, ['title'=>'Browse Jobs from Companies Starting with ' . strtoupper($letter)]); ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-sm-12">
          <div class="jobs-by-location">
            <h3>Jobs By Location</h3>
            <ul>
              <li><?= $this->Html->link('London', 'jobs/browse/location/london', ['title'=>'Browse London Jobs']); ?></li>
              <li><?= $this->Html->link('Manchester', 'jobs/browse/location/manchester', ['title'=>'Browse Manchester Jobs']); ?></li>
              <li><?= $this->Html->link('Liverpool', 'jobs/browse/location/liverpool', ['title'=>'Browse Liverpool Jobs']); ?></li>
            </ul>
          </div>
      </div>
      <div class="col-md-6 col-sm-12">
          <div class="jobs-by-category">
            <h3>Jobs By Category</h3>
            <ul>
              <?php foreach($categories as $category): ?>
                <li><?= $this->Html->link($category->name, 'jobs/browse/category/' . urlencode(strtolower($category->name)), ['title'=>'Browse ' . $category->name . ' Jobs']); ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
      </div>
    </div>
  </div>
  
</section>