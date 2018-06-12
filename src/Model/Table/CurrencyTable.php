<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Currency Model
 *
 * @property \App\Model\Table\CurrencyValuesTable|\Cake\ORM\Association\HasMany $CurrencyValues
 * @property \App\Model\Table\UserCurrencyTrackingTable|\Cake\ORM\Association\HasMany $UserCurrencyTracking
 *
 * @method \App\Model\Entity\Currency get($primaryKey, $options = [])
 * @method \App\Model\Entity\Currency newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Currency[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Currency|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Currency patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Currency[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Currency findOrCreate($search, callable $callback = null, $options = [])
 */
class CurrencyTable extends Table
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

        $this->setTable('currency');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('CurrencyValues', [
            'foreignKey' => 'currency_id'
        ]);
        $this->hasMany('UserCurrencyTracking', [
            'foreignKey' => 'currency_id'
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
            ->scalar('name')
            ->maxLength('name', 126)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('abbreviation')
            ->maxLength('abbreviation', 16)
            ->requirePresence('abbreviation', 'create')
            ->notEmpty('abbreviation');

        return $validator;
    }
}
