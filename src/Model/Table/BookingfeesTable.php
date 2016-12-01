<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bookingfees Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Orders
 *
 * @method \App\Model\Entity\Bookingfee get($primaryKey, $options = [])
 * @method \App\Model\Entity\Bookingfee newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Bookingfee[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Bookingfee|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bookingfee patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Bookingfee[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Bookingfee findOrCreate($search, callable $callback = null)
 */
class BookingfeesTable extends Table
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

        $this->table('bookingfees');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Orders', [
            'foreignKey' => 'orders_id',
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
            ->requirePresence('statement', 'create')
            ->notEmpty('statement');

        $validator
            ->requirePresence('project', 'create')
            ->notEmpty('project');

        $validator
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        $validator
            ->integer('price')
            ->requirePresence('price', 'create')
            ->notEmpty('price');

        $validator
            ->integer('dp')
            ->requirePresence('dp', 'create')
            ->notEmpty('dp');

        $validator
            ->requirePresence('hp', 'create')
            ->notEmpty('hp');

        $validator
            ->requirePresence('otherhp', 'create')
            ->notEmpty('otherhp');

        $validator
            ->integer('total')
            ->requirePresence('total', 'create')
            ->notEmpty('total');

        $validator
            ->requirePresence('date', 'create')
            ->notEmpty('date');

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
        $rules->add($rules->existsIn(['orders_id'], 'Orders'));

        return $rules;
    }
}
