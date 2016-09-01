<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductStore Model
 *
 * @method \App\Model\Entity\ProductStore get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductStore newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProductStore[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductStore|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductStore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductStore[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductStore findOrCreate($search, callable $callback = null)
 */
class ProductStoreTable extends Table
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

        $this->table('product_store');
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
            ->requirePresence('productID', 'create')
            ->notEmpty('productID');

        $validator
            ->requirePresence('storeID', 'create')
            ->notEmpty('storeID');

        $validator
            ->boolean('active')
            ->requirePresence('active', 'create')
            ->notEmpty('active');

        $validator
            ->decimal('productStorePrice')
            ->requirePresence('productStorePrice', 'create')
            ->notEmpty('productStorePrice');

        $validator
            ->allowEmpty('id', 'create');

        return $validator;
    }
}
