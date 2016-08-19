<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ListsItems Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Posts
 *
 * @method \App\Model\Entity\ListsItem get($primaryKey, $options = [])
 * @method \App\Model\Entity\ListsItem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ListsItem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ListsItem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ListsItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ListsItem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ListsItem findOrCreate($search, callable $callback = null)
 */
class ListsItemsTable extends Table
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

        $this->table('lists_items');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->belongsToMany('Posts', [
            'foreignKey' => 'lists_item_id',
            'targetForeignKey' => 'post_id',
            'joinTable' => 'posts_lists_items'
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
            ->integer('number')
            ->requirePresence('number', 'create')
            ->notEmpty('number');

        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->requirePresence('image', 'create')
            ->notEmpty('image');

        $validator
            ->requirePresence('source_link', 'create')
            ->notEmpty('source_link');

        $validator
            ->requirePresence('source_name', 'create')
            ->notEmpty('source_name');

        return $validator;
    }
}
