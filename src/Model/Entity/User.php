<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * User Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $username
 * @property string $password
 * @property string $role
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Company[] $companies
 * @property \App\Model\Entity\Job[] $jobs
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'first_name' => true,
        'last_name' => true,
        'email' => true,
        'password' => true,
        'password_again' => true,
        'roles' => true,
        'created' => true,
        'modified' => true,
        'companies' => true,
        'jobs' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    protected function _setPassword($value){
        if(strlen($value)){
            $hasher = new DefaultPasswordHasher();
            return $hasher->hash($value);
        }
    }

    protected function _getRole(){
        return $this->_properties['role_id'];
    }

    public function isAdmin(){
        if($this->get('role') === 1) return true;
    }

    public function isEmployer(){
        if($this->get('role') === 2) return true;
    }

    public function isSeeker(){
        if($this->get('role') === 3) return true;
    }
    

}
