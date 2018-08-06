<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class CategoriesTable extends Table{
  
  /*
   *  Initialise 
   */
  public function initialize(array $config){
    $this->hasMany('Jobs');

    $this->displayField('name');
  }
}
