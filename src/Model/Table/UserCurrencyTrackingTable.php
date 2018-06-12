<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserCurrencyTracking Model
 *
 * @property \App\Model\Table\UserTable|\Cake\ORM\Association\BelongsTo $User
 * @property \App\Model\Table\CurrencyTable|\Cake\ORM\Association\BelongsTo $Currency
 *
 * @method \App\Model\Entity\UserCurrencyTracking get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserCurrencyTracking newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UserCurrencyTracking[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserCurrencyTracking|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserCurrencyTracking patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserCurrencyTracking[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserCurrencyTracking findOrCreate($search, callable $callback = null, $options = [])
 */
class UserCurrencyTrackingTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('user_currency_tracking');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('User', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Currency', [
            'foreignKey' => 'currency_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->numeric('threshold')
            ->allowEmpty('threshold');

        $validator
            ->boolean('direction')
            ->allowEmpty('direction');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'User'));
        $rules->add($rules->existsIn(['currency_id'], 'Currency'));

        return $rules;
    }
}
