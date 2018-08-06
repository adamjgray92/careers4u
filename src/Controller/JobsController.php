<?php

namespace App\Controller;

use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Http\Exception\NotFoundException;
use Cake\Datasource\Exception\RecordNotFoundException;

class JobsController extends AppController{

  public function initialize(){
    parent::initialize();
    $this->Auth->allow(['browse', 'view', 'search']);
    $this->loadComponent('Paginator');
  }

  /*
   * Default Index Method /jobs/
   */
  public function index(){
    // Return Jobs/index.ctp
    $this->viewBuilder()->setLayout('landing');
  }

  /*
   *  Browse Method /jobs/browse
   */
  public function browse($type = null, $value = null){
    $jobs = $this->Paginator->paginate($this->Jobs->find('JobsByType', [
      'type' => $type,
      'value' => $value
    ])->contain(['Types', 'Contracts', 'Companies']))->toList();
    $categories = TableRegistry::get('categories')->find('all');
    $this->set(compact('jobs', 'categories', 'type', 'value'));
  }

  public function search(){

    // Search Browse
    if($this->request->is('GET')){
      $job = $this->request->getQuery('job');
      $location = $this->request->getQuery('location');
      if(empty($job) && empty($location)){
        $this->Flash->error(__('Sorry, search could not be complete. Showing most recent.'));
        return $this->redirect(['controller' => 'Jobs', 'action' => 'browse']);
      }else{
        $jobs = $this->Jobs->find('JobSearch', [
          'job' => $job,
          'location' => $location
        ]);
      }
      $browse_value = [
        'job'=>$job,
        'location'=>$location
      ];
      $this->set(compact('jobs', 'browse_value'));
    }
  }
  public function view($id = null){
    $job = $this->Jobs->findById($id)->contain([
      'Companies',
      'Types',
      'Contracts'])->firstOrFail();
    $related_jobs = $this->Jobs->find('CompanyRelatedJobs', [
      'job_id' => $job->id,
      'company_id' => $job->company_id,
      'num_to_return' => 5
    ])->toList();
    $this->set(compact('job', 'related_jobs'));
  }

  public function add(){
    $job = $this->Jobs->newEntity();
    $user = TableRegistry::get('Users')->findById($this->Auth->user('id'))->contain(['Companies'])->firstOrFail();
    $categories = TableRegistry::get('categories')->find('list', [
      'keyField' => 'id',
      'valueField' => 'name'
    ]);
    $contracts = TableRegistry::get('contracts')->find('list', [
      'keyField' => 'id',
      'valueField' => 'name'
    ]);
    $types = TableRegistry::get('types')->find('list', [
      'keyField' => 'id',
      'valueField' => 'name'
    ]);
    if($this->request->is('POST')){
      $job = $this->Jobs->patchEntity($job, $this->request->getData());
      $job->user_id = $this->Auth->user('id');
      $job->company_id = TableRegistry::get('companies')->findByUserId($this->Auth->user('id'))->firstOrFail()->id;
      debug($job->company_id);
      if($this->Jobs->save($job)){
        $this->Flash->success(__('Your job has been saved.'));
        return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('Unable to add your job.'));
    }
    $this->set(compact('job', 'categories', 'contracts', 'types', 'user'));
    $this->viewBuilder()->setLayout('dashboard');
  }

  public function edit($id = null){
    $user = TableRegistry::get('Users')->findById($this->Auth->user('id'))->contain(['Companies'])->firstOrFail();
    $job = $this->Jobs->findById($id)->firstOrFail();
    if($job->user_id != $this->Auth->user('id')){
      $this->Flash->error(__('You are not authorized to view this!'));
      return $this->redirect(['controller' => 'Users', 'action' => 'profile']);
    }
    if($this->request->is(['POST', 'PUT'])){
      $this->Jobs->patchEntity($job, $this->request->getData());
      if($this->Jobs->save($job)){
        $this->Flash->success(__('You job has been updated'));
        return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('Unable to update your article'));
    }
    $this->viewBuilder()->setLayout('dashboard');
    $this->set(compact('job', 'user'));
  }

  public function save($id = null){
    $job = $this->Jobs->findById($id)->firstOrFail();
    $savedJobs = TableRegistry::get('saved_jobs');
    
  }

  public function apply($id = null){
    // Handles null and non-existing job id
    if(!$this->Jobs->exists(['id' => $id])){
      throw new RecordNotFoundException(__('Can\'t find job'));
    }
    $job = $this->Jobs->findById($id)->contain([
      'Companies', 'Types', 'Contracts', 'Categories'
    ])->firstOrFail();

    $this->set(compact('job'));
  }

  public function sendEmailToFriend($id = null, $email = null){
    
  }

  public function isAuthorized($user){
    $action = $this->request->getParam('action');
    if(in_array($action, ['add', 'edit'])  && ($this->Auth->user('role_id') === 2)){
      return true;
    }
    if(in_array($action, ['apply']) && ($this->Auth->user('role_id') === 3)){
      return true;
    }
  }
}