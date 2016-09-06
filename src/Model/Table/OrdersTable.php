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
    
    public static $updateKeys = array(
            'orderDescription'=>'orderDescription',
            'orderCustomerAddress'=>'orderCustomerAddress',
            'orderCustomerName'=>'orderCustomerName',
            'isOrderShipped'=>'isOrderShipped',
            'orderShippingDate'=>'orderShippingDate'
    );
    
    public static $sortKeys = array(
            'orderID' => 'Orders.id',
            'orderDate'=> 'Orders.orderDate',
            'orderShippingDate'=>'Orders.orderShippingDate',
            'isOrderShipped'=>'Orders.isOrderShipped',
            'customerName'=>'Orders.orderCustomerName',
            'productStoreName'=>'Store.storename',
            'productName'=>'Product.productName',
            'productStorePrice'=>'ProductStore.productStorePrice'
    );

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
     * Custom finder method to get all orders
     * @param Query $query
     * @param array $options
     * @return unknown
     */
     
    public function findOrderData(Query $query, array $options)
    {
        $user = $options['user']; 
        $count = $options['queryParams']['count'];
        $page = $options['queryParams']['page'];
        $sortingData = $options['queryParams']['sorting'];
        $sortingKey =  $sortingData?array_keys($sortingData)[0]:'orderID'; 
        $sortingDir = $sortingData[$sortingKey]?$sortingData[$sortingKey]:'asc'; 
        $sortKeyList = self::$sortKeys;
        $sortingColumn = $sortKeyList[$sortingKey]?$sortKeyList[$sortingKey]:'Orders.id';
         
        $query = $this
                    ->find()
                     ->contain(array(
                                'ProductStore.Store',
                                'ProductStore.Product')
                     )
                     ->where(array('Product.userID'=>$options['user']))
                     ->order(array($sortingColumn => $sortingDir))
                     ->limit($count)
                     ->page($page);
 
      return $query; 
    } 

    /**
     * Custom finder method to get total order for each day
     * @param Query $query
     * @param array $options
     * @return $query
     */
    public function findOrderReport(Query $query, array $options){
        $user = $options['user']; 
        $query = $this->find()
                      ->select(array('orderDate'=>'CAST(orderDate As DATE)','totalOrders'=>'count(Orders.id)'))
                      ->contain(array('ProductStore.Product'))
                      ->where(array('Product.userID'=>$user))
                      ->group('CAST(orderDate As DATE)')
                      ->order(array('orderDate' => 'asc'));
        return $query; 
    }
    
    /**
     * Custom finder method to get total order for each product
     * @param Query $query
     * @param array $options
     * @return $query
     */
    public function findProductReport(Query $query, array $options){
        $user = $options['user'];
        $query = $this->find()
        ->select(array('productName'=>'Product.productName','totalOrders'=>'count(Orders.id)'))
        ->contain(array('ProductStore.Product'))
        ->where(array('Product.userID'=>$user))
        ->group('Product.productName')
        ->order(array('productName' => 'asc'));
        return $query;
    }
    
}
