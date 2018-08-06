<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Http\Exception\NotFoundException;

class CompaniesController extends AppController{
  
  public function initialize(){
    parent::initialize();
    $this->loadComponent('Paginator');
    $this->Auth->allow(['profile', 'add']);
  }

  public function index(){
    $companies = $this->Paginator->paginate($this->Companies->find());
    $this->set(compact('companies'));
  }

  public function profile($slug = null){
    $company = $this->Companies->findBySlug($slug)->firstOrFail();
    $jobs = $this->Companies->Jobs->findByCompanyId($company->id)->limit(5)->toList();
    $this->set(compact('company', 'jobs'));
  }

  public function add(){
    $company = $this->Companies->newEntity();
    if($this->request->is('POST')){
      $company = $this->Companies->patchEntity($company, $this->request->getData(), ['validate' => 'add']);
      $company->founded = intval($this->request->getData(['founded'])['year']);
      if($this->Companies->save($company)){
        $this->Flash->success(__('Your company has been saved.'));
        return $this->redirect(['action' => 'index']);
      }
      $this->Flash->error(__('Unable to add your company.'));
    }
    $this->set('company', $company);
  }

  public function edit(){
    $user = TableRegistry::get('Users')->findById($this->Auth->user('id'))->contain(['Companies'])->firstOrFail();
    $company = $this->Companies->findByUserId($this->Auth->user('id'))->firstOrFail();
    if($this->request->is(['POST', 'PUT'])){
      $this->Companies->patchEntity($company, $this->request->getData());
      if($this->Companies->save($company)){
        $this->Flash->success(__('You company has been updated.'));
        return $this->redirect(['action' => 'profile', $company->slug]);
      }
      $this->Flash->error(__('Error: There is a problem updating your company.'));
    }
    $this->set(compact('company', 'user'));
    $this->viewBuilder()->setLayout('dashboard');
  }

  public function delete($slug = null){
    if(empty($slug)){
      throw new NotFoundException;
    }
    $this->request->allowMethod(['POST', 'DELETE']);

    $company = $this->Companies->findBySlug($slug)->firstOrFail();
    if($this->Companies->delete($company)){
      $this->Flash->success(__('The {0} company has been deleted.', $company->name));
      return $this->redirect(['action' => 'index']);
    }
  }

  public function isAuthorized($user){
    $action = $this->request->getParam('action');
    if(in_array($action, ['edit']) && ($this->Auth->user('role_id') == 2)){
      return true;
    }
  }

}