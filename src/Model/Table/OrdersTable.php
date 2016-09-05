<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Orders Model
 *
 * @method \App\Model\Entity\Orders get($primaryKey, $options = [])
 * @method \App\Model\Entity\Orders newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Orders[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Orders|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Orders patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Orders[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Orders findOrCreate($search, callable $callback = null)
 */
class OrdersTable extends Table
{

    /**
     * Initialize method
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('orders');
        $this->displayField('id');
        $this->primaryKey('id');
        
        $this->belongsTo('ProductStore', array(
            'foreignKey' => 'productStoreID',
            'joinType' => 'INNER',
        ));
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
    
    
    /**
     *Custom finder method for fetching all order 
     **/
    public function findOrderData(Query $query, array $options)
    {
        $user = $options['user']; 
        $count = $options['queryParams']['count'];
        $page = $options['queryParams']['page'];
       
        $query = $this
                    ->find()
                     ->contain(array(
                                'ProductStore.Store',
                                'ProductStore.Product')
                     )
                     ->where(array('Product.userID'=>$options['user']))
                     ->limit($count)
                     ->page($page);
 
      return $query; 
    } 

    
}
