<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class RolesTable extends Table{
  
  /*
   *  Initialise 
   */
  public function initialize(array $config){

    parent::initialize($config);

    $this->setTable('roles');
    $this->setPrimaryKey('id');
    $this->hasMany('Users', [
      'foreignKey' => 'role_id'
    ]);
  }
}
