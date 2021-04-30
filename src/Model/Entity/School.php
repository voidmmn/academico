<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * School Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $address
 * @property string|null $phone
 * @property string $website
 * @property string $title
 * @property string $subtitle
 * @property string $description_1
 * @property string $description_2
 * @property string $background
 * @property string $logo_1
 * @property string $logo_2
 * @property string $icon
 * @property int $users_id
 * @property string $chairman_description
 * @property string $chairman_signature
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 */
class School extends Entity
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
        'address' => true,
        'phone' => true,
        'website' => true,
        'title' => true,
        'subtitle' => true,
        'description_1' => true,
        'description_2' => true,
        'background' => true,
        'logo_1' => true,
        'logo_2' => true,
        'icon' => true,
        'users_id' => true,
        'chairman_description' => true,
        'chairman_signature' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
    ];
}
