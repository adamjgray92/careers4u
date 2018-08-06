<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Application Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $job_id
 * @property string $email
 * @property string $contact_number
 * @property string $cv_path
 * @property string $cover_letter_path
 * @property string $first_name
 * @property string $last_name
 * @property int $eligible_uk
 * @property int $eligible_eu
 * @property string $education
 * @property string $current_job
 * @property string $expected_salary
 * @property string $status
 * @property string $notes
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Job $job
 */
class Application extends Entity
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
        'user_id' => true,
        'job_id' => true,
        'email' => true,
        'contact_number' => true,
        'cv_path' => true,
        'cover_letter_path' => true,
        'first_name' => true,
        'last_name' => true,
        'eligible_uk' => true,
        'eligible_eu' => true,
        'education' => true,
        'current_job' => true,
        'expected_salary' => true,
        'status' => true,
        'notes' => true,
        'modified' => true,
        'created' => true,
        'user' => true,
        'job' => true
    ];
}
