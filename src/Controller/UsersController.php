<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Http\Exception\NotFoundException;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function initialize(){
        parent::initialize();
        $this->Auth->allow(['logout', 'login', 'signup']);
        $this->viewBuilder()->setLayout('dashboard');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $users = $this->paginate($this->Users);
        $user = $this->Users->get($this->Auth->user('id'));

        $this->set(compact('users', 'user'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function profile()
    {
        if(!$this->Auth){
            $this->redirect(['action' => 'login']);
        }
    }

    /**
     * Signup method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function signup()
    {
        $user = $this->Users->newEntity();
        $roles = TableRegistry::get('roles')->find('list', [
            'keyField' => 'id',
            'valueField' => 'name'
          ])->where(['roles.id !='=> '1']);
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->role_id = $this->request->getData(['roles']);
            debug($user);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Registration completed. Check your email for confirmation.'));

                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user', 'roles'));
        $this->viewBuilder()->setLayout('default');
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit()
    {
        $user = $this->Users->get($this->Auth->user('id'), [
            'contain' => ['Companies']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'profile']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     *  Login method
     * 
     *  @return \Cake\Http\Response|null Redirects to index.
     *   
     */
    public function login(){
        if($this->request->is('post')){
            $user = $this->Auth->identify();
            if($user){
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Your username or password is incorrect.');
        }
        $this->viewBuilder()->setLayout('default');
    }

    /**
     * Logout method
     * 
     */
    public function logout(){
        $this->Flash->success('You are now loggged out.');
        return $this->redirect($this->Auth->logout());
    }

    public function viewJobs(){
        $jobs = $this->Users->Jobs->findByUserId($this->Auth->user('id'));
        $this->set(compact('jobs'));
    }

    public function viewApplicants(){
        $jobsQuery = TableRegistry::get('Jobs')->find()
                        ->select(['id'])
                        ->where(['user_id' => $this->Auth->user('id')]);
        $applications = TableRegistry::get('Applications')
                            ->find()
                            ->where(['Applications.job_id IN' => $jobsQuery])
                            ->contain(['Jobs']);
        $this->set(compact('applications'));
    }

    /**
     *
     */

    public function beforeFilter(Event $e){
        $action = $this->request->getParam('action');
        if(!in_array($action, ['login', 'signup'])){
            if(!$this->Auth->user()){
                throw new NotFoundException;
            }
            $user = $this->Users->get($this->Auth->user('id'), [
                'contain' => ['Companies', 'Jobs']
            ]);
            $this->set(compact('user'));
        }
        
    }

    public function isAuthorized($user){
        $action = $this->request->getParam('action');

        if(in_array($action, ['viewJobs', 'viewApplicants']) && ($this->Auth->user('role_id') == 2)){
            return true;
        }

        if(in_array($action, ['profile', 'edit'])){
            return true;
        }
    }
}
