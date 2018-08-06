<?php 

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;

class SavedJobsTable extends Table{
  public function initialize(array $config){
    $this->belongsTo('Users');
    $this->belongsTo('Jobs');
  }
}