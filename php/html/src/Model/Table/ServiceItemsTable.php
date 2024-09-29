<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ServiceItems Model
 *
 * @property \App\Model\Table\ServicesTable&\Cake\ORM\Association\BelongsTo $Services
 *
 * @method \App\Model\Entity\ServiceItem newEmptyEntity()
 * @method \App\Model\Entity\ServiceItem newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\ServiceItem> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ServiceItem get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\ServiceItem findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\ServiceItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\ServiceItem> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ServiceItem|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\ServiceItem saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\ServiceItem>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ServiceItem>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ServiceItem>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ServiceItem> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ServiceItem>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ServiceItem>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ServiceItem>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ServiceItem> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ServiceItemsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('service_items');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Services', [
            'foreignKey' => 'service_id',
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
            ->scalar('name')
            ->maxLength('name', 200)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('code')
            ->maxLength('code', 40)
            ->requirePresence('code', 'create')
            ->notEmptyString('code')
            ->add('code', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->uuid('service_id')
            ->notEmptyString('service_id');

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
        $rules->add($rules->isUnique(['code']), ['errorField' => 'code']);
        $rules->add($rules->existsIn(['service_id'], 'Services'), ['errorField' => 'service_id']);

        return $rules;
    }
}
