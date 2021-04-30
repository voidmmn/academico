<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $name
 * @property string $cpf
 * @property string $username
 * @property string $email
 * @property string $password
 * @property int|null $courses_id
 * @property int|null $schools_id
 * @property string|null $registration
 * @property string|null $avatar
 * @property int $roles_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Course $course
 * @property \App\Model\Entity\School $school
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\Activity[] $activities
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
        'name' => true,
        'cpf' => true,
        'username' => true,
        'email' => true,
        'password' => true,
        'courses_id' => true,
        'schools_id' => true,
        'registration' => true,
        'avatar' => true,
        'roles_id' => true,
        'created' => true,
        'modified' => true,
        'course' => true,
        'school' => true,
        'role' => true,
        'activities' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];
}
