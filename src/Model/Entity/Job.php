<?php
// src/Model/Entity/Job.php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Job extends Entity{
  protected $_accessible = [
    '*' => true,
    'id' => false
  ];
}