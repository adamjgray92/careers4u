<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Utility\Text;
use Cake\Validation\Validator;

class CompaniesTable extends Table{
  
  /*
   *  Initialise 
   */
  public function initialize(array $config){
    $this->hasMany('Jobs');

    // Adds timestamp to created and modified columns
    $this->addBehavior('Timestamp');
  }

  public function beforeSave($event, $entity, $options){
    if($entity->isNew() && !$entity->slug){
      $sluggedName = Text::slug($entity->name);
      $entity->slug = substr($sluggedName, 0, 255);
    }
  }

  /*
   *  Validate Fields
   */
  public function validationAdd($validator){
    $validator
      ->notEmpty('name', 'You need to provide a company name.')
      ->notEmpty('size', 'You need to provide a company size.')
      ->allowEmpty('founded')
      ->allowEmpty('website')
      ->notEmpty('headquarters', 'You need to provide a location for your company.')
      ->notEmpty('industry', 'You need to provide an industry for your company.')
      ->requirePresence('description')
      ->notEmpty('description', 'You need to provide a description')
      ->add('description', 'length', [
        'rule' => ['minLength', 50],
        'message' => 'Descriptions must have a substantial length.'
      ])
      ->allowEmpty('image_path');
    
    return $validator;
  }

}
