<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Schools Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\School newEmptyEntity()
 * @method \App\Model\Entity\School newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\School[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\School get($primaryKey, $options = [])
 * @method \App\Model\Entity\School findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\School patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\School[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\School|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\School saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\School[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\School[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\School[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\School[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SchoolsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('schools');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 200)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('address')
            ->maxLength('address', 200)
            ->allowEmptyString('address');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 20)
            ->allowEmptyString('phone');

        $validator
            ->scalar('website')
            ->maxLength('website', 200)
            ->requirePresence('website', 'create')
            ->notEmptyString('website');

        $validator
            ->scalar('title')
            ->maxLength('title', 200)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('subtitle')
            ->maxLength('subtitle', 200)
            ->requirePresence('subtitle', 'create')
            ->notEmptyString('subtitle');

        $validator
            ->scalar('description_1')
            ->maxLength('description_1', 200)
            ->requirePresence('description_1', 'create')
            ->notEmptyString('description_1');

        $validator
            ->scalar('description_2')
            ->maxLength('description_2', 200)
            ->requirePresence('description_2', 'create')
            ->notEmptyString('description_2');

        $validator
            ->scalar('background')
            ->maxLength('background', 200)
            ->requirePresence('background', 'create')
            ->notEmptyString('background');

        $validator
            ->scalar('logo_1')
            ->maxLength('logo_1', 200)
            ->requirePresence('logo_1', 'create')
            ->notEmptyString('logo_1');

        $validator
            ->scalar('logo_2')
            ->maxLength('logo_2', 200)
            ->requirePresence('logo_2', 'create')
            ->notEmptyString('logo_2');

        $validator
            ->scalar('icon')
            ->maxLength('icon', 200)
            ->requirePresence('icon', 'create')
            ->notEmptyString('icon');

        $validator
            ->scalar('chairman_description')
            ->maxLength('chairman_description', 200)
            ->requirePresence('chairman_description', 'create')
            ->notEmptyString('chairman_description');

        $validator
            ->scalar('chairman_signature')
            ->maxLength('chairman_signature', 200)
            ->requirePresence('chairman_signature', 'create')
            ->notEmptyString('chairman_signature');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['users_id'], 'Users'), ['errorField' => 'users_id']);

        return $rules;
    }
}
