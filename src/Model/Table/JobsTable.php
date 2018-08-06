<?php
// src/Model/Table/JobsTable.php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\Query;
use Cake\Validation\Validator;

class JobsTable extends Table{
  
  /*
   *  Initialise 
   */
  public function initialize(array $config){
    // Associations
    $this->belongsTo('Types');
    $this->belongsTo('Categories');
    $this->belongsTo('Users');
    $this->belongsTo('Contracts');
    $this->belongsTo('Companies');
    $this->belongsToMany('Jobs', [
      'through' => 'SavedJobs',
  ]);

    // Adds timestamp to created and modified columns
    $this->addBehavior('Timestamp');
  }

  public function validationDefault(Validator $validator){

    $validator
      ->scalar('category_id')
      ->requirePresence('category_id')
      ->notEmpty('category_id');

    $validator
      ->scalar('user_id')
      ->requirePresence('user_id')
      ->notEmpty('user_id');

    $validator
      ->scalar('type_id')
      ->requirePresence('type_id')
      ->notEmpty('type_id');

    $validator
      ->scalar('contract_id')
      ->requirePresence('contract_id')
      ->notEmpty('contract_id');

    $validator
      ->scalar('title')
      ->maxLength('title', 255)
      ->requirePresence('title')
      ->notEmpty('title');
    
    $validator
      ->scalar('description')
      ->requirePresence('description')
      ->notEmpty('description');

    $validator
      ->scalar('salary')
      ->maxLength('salary', 50)
      ->requirePresence('salary')
      ->notEmpty('salary');
    
    $validator
      ->scalar('city')
      ->maxLength('city', 255)
      ->requirePresence('city')
      ->notEmpty('city');
    
    $validator
      ->scalar('area')
      ->maxLength('area', 255)
      ->requirePresence('area')
      ->notEmpty('area');

    
    return $validator;
  }

  public function findCompanyRelatedJobs(Query $query, array $options){

    $columns = [
      'Jobs.id', 'Jobs.category_id', 'Jobs.type_id', 'Jobs.contract_id',
      'Jobs.company_id', 'Jobs.title', 'Jobs.description', 'Jobs.salary',
      'Jobs.city', 'Jobs.area', 'Jobs.contact_name', 'Jobs.contact_info',
      'Jobs.created'
    ];

    $query = $query
      ->select($columns)
      ->distinct($columns);
    
    // Check Company_id is passed through
    if(!empty($options['company_id'])){
      $query->innerJoinWith('Companies')
        ->where(['Jobs.company_id IN ' => $options['company_id']]);
    }
    // Removes viewed job from query
    if(!empty($options['job_id'])){
        $query->where(['Jobs.id NOT IN ' => $options['job_id']]);
    }
    return $query->order(['Jobs.created' => 'DESC'])
      ->limit($options['num_to_return']);
  }

  public function findJobsByType(Query $query, array $options){

    $columns = [
      'Jobs.id', 'Jobs.category_id', 'Jobs.type_id', 'Jobs.contract_id',
      'Jobs.company_id', 'Jobs.user_id', 'Jobs.title', 'Jobs.description', 'Jobs.salary',
      'Jobs.city', 'Jobs.area', 'Jobs.contact_name', 'Jobs.contact_info',
      'Jobs.created', 'Companies.name', 'Companies.slug', 'Types.name'
    ];

    $query = $query
      ->select($columns);
    
    $type = $options['type'];
    $value = $options['value'];
    $conditions = [];

    if(!empty($type)){
      switch ($type) {
        case 'title':
          $query->where([
            'Jobs.title LIKE' => $value . "%"
          ]);
          break;
        case 'company':
          $query->innerJoinWith('Companies', function($q) use ($value){
            return $q->where([
              'Companies.name LIKE ' => $value . "%"
            ]);
          });
          break;
        case 'location':
          $query->where([
            'Jobs.area LIKE ' => "%" . $value . "%"
          ]);
          break;
        case 'category':
          $query->innerJoinWith('Categories', function($q) use ($value){
            return $q->where([
              'Categories.name LIKE ' => $value . "%"
            ]);
          });
        default:
          # code...
          break;
      }
    }

    return $query->order(['Jobs.created' => 'DESC']);
  }

  public function findJobSearch(Query $query, array $options){

    $columns = [
      'Jobs.id', 'Jobs.category_id', 'Jobs.type_id', 'Jobs.contract_id',
      'Jobs.company_id', 'Jobs.user_id', 'Jobs.title', 'Jobs.description', 'Jobs.salary',
      'Jobs.city', 'Jobs.area', 'Jobs.contact_name', 'Jobs.contact_info',
      'Jobs.created', 'Companies.name', 'Companies.slug', 'Types.name'
    ];

    $job = $options['job'];
    $location = $options['location'];

    $query = $query
      ->select($columns)
      ->distinct($columns);
    
    if(!empty($job) && !empty($location)){
      $query->where([
        'Jobs.title LIKE' => '%' . $job . '%'])
        ->where(['OR' => [
          'Jobs.area LIKE' => '%' . $location . '%',
          'Jobs.city LIKE' => '%' . $location . '%'
        ]
      ]);
    }else if(!empty($job) && empty($location)){
      $query->where([
        'Jobs.title LIKE' => '%' . $job . '%'
      ]);
    }else if(empty($job) && !empty($location)){
      $query->where(['OR' => [
        'Jobs.area LIKE' => '%' . $location . '%',
        'Jobs.city LIKE' => '%' . $location . '%'
        ]
      ]);
    }
    return $query->order(['Jobs.created' => 'DESC'])->contain(['Types', 'Companies', 'Contracts', 'Categories']);
  }
}
