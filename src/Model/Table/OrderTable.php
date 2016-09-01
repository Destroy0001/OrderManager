<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Order Model
 *
 * @method \App\Model\Entity\Order get($primaryKey, $options = [])
 * @method \App\Model\Entity\Order newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Order[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Order|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Order patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Order[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Order findOrCreate($search, callable $callback = null)
 */
class OrderTable extends Table
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

        $this->table('order');
        $this->displayField('id');
        $this->primaryKey('id');
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
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('productStoreID', 'create')
            ->notEmpty('productStoreID');

        $validator
            ->dateTime('orderDate')
            ->requirePresence('orderDate', 'create')
            ->notEmpty('orderDate');

        $validator
            ->requirePresence('orderCustomerName', 'create')
            ->notEmpty('orderCustomerName');

        $validator
            ->dateTime('orderLastUpdated')
            ->requirePresence('orderLastUpdated', 'create')
            ->notEmpty('orderLastUpdated');

        $validator
            ->dateTime('orderShippingDate')
            ->requirePresence('orderShippingDate', 'create')
            ->notEmpty('orderShippingDate');

        $validator
            ->requirePresence('orderCustomerAddress', 'create')
            ->notEmpty('orderCustomerAddress');

        $validator
            ->boolean('orderActive')
            ->requirePresence('orderActive', 'create')
            ->notEmpty('orderActive');

        $validator
            ->boolean('isOrderShipped')
            ->requirePresence('isOrderShipped', 'create')
            ->notEmpty('isOrderShipped');

        $validator
            ->allowEmpty('orderDescription');

        return $validator;
    }
}
