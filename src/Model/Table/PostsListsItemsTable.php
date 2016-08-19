<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PostsListsItems Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Posts
 * @property \Cake\ORM\Association\BelongsTo $ListsItems
 *
 * @method \App\Model\Entity\PostsListsItem get($primaryKey, $options = [])
 * @method \App\Model\Entity\PostsListsItem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PostsListsItem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PostsListsItem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PostsListsItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PostsListsItem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PostsListsItem findOrCreate($search, callable $callback = null)
 */
class PostsListsItemsTable extends Table
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

        $this->table('posts_lists_items');
        $this->displayField('post_id');
        $this->primaryKey(['post_id', 'list_items_id']);

        $this->belongsTo('Posts', [
            'foreignKey' => 'post_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ListsItems', [
            'foreignKey' => 'lists_item_id',
            'joinType' => 'INNER'
        ]);
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
        $rules->add($rules->existsIn(['post_id'], 'Posts'));
        $rules->add($rules->existsIn(['lists_item_id'], 'ListsItems'));

        return $rules;
    }
}
