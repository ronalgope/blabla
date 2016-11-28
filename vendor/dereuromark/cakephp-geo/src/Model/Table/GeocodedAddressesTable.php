<?php
namespace Geo\Model\Table;

use Cake\Database\Schema\Table as Schema;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Geocoder\Formatter\StringFormatter;
use Geo\Exception\InconclusiveException;
use Geo\Exception\NotAccurateEnoughException;
use Geo\Geocoder\Geocoder;

/**
 * GeocodedAddresses Model
 */
class GeocodedAddressesTable extends Table {

	/**
	 * Initialize method
	 *
	 * @param array $config The configuration for the Table.
	 * @return void
	 */
	public function initialize(array $config) {
		parent::initialize($config);

		$this->table('geocoded_addresses');
		$this->displayField('address');
		$this->primaryKey('id');
	}

	/**
	 * @param \Cake\Database\Schema\Table $schema
	 *
	 * @return \Cake\Database\Schema\Table
	 */
	protected function _initializeSchema(Schema $schema) {
		$schema->columnType('data', 'object');
		return $schema;
	}

	/**
	 * @param string $address
	 *
	 * @return bool|\Geo\Model\Entity\GeocodedAddress
	 */
	public function retrieve($address) {
		$entity = $this->find()->where(['address' => $address])->first();
		if ($entity) {
			return $entity;
		}

		$result = $this->_execute($address);
		$address = $this->newEntity([
			'address' => $address
		]);
		if ($result) {
			$address->lat = $result->getLatitude();
			$address->lng = $result->getLongitude();
			$address->country = $result->getCountry()->getCode();

			$formatter = new StringFormatter();
			$address->formatted_address = $formatter->format($result, '%S %n, %z %L');
			$address->data = $result;
		}

		return $this->save($address);
	}

	/**
	 * Default validation rules.
	 *
	 * @param \Cake\Validation\Validator $validator Validator instance.
	 * @return \Cake\Validation\Validator
	 */
	public function validationDefault(Validator $validator) {
		$validator
			->integer('id')
			->allowEmpty('id', 'create');

		$validator
			->requirePresence('address', 'create')
			->notEmpty('address')
			->add('address', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

		$validator
			->allowEmpty('formatted_address');

		$validator
			->allowEmpty('country');

		$validator
			->decimal('lat')
			->allowEmpty('lat');

		$validator
			->decimal('lng')
			->allowEmpty('lng');

		$validator
			->allowEmpty('data');

		return $validator;
	}

	/**
	 * Returns a rules checker object that will be used for validating
	 * application integrity.
	 *
	 * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
	 * @return \Cake\ORM\RulesChecker
	 */
	public function buildRules(RulesChecker $rules) {
		//$rules->add($rules->isUnique(['address']));
		return $rules;
	}

	/**
	 * @param string $address
	 *
	 * @return \Geocoder\Model\Address
	 */
	protected function _execute($address) {
		$this->_Geocoder = new Geocoder();
		try {
			$addresses = $this->_Geocoder->geocode($address);
		} catch (InconclusiveException $e) {
			return null;
		} catch (NotAccurateEnoughException $e) {
			return null;
		}

		if (!$addresses || $addresses->count() < 1) {
			return null;
		}
		$address = $addresses->first();
		return $address;
	}

}
