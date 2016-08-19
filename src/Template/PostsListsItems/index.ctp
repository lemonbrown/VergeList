<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Posts Lists Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Posts'), ['controller' => 'Posts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Post'), ['controller' => 'Posts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Lists Items'), ['controller' => 'ListsItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lists Item'), ['controller' => 'ListsItems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="postsListsItems index large-9 medium-8 columns content">
    <h3><?= __('Posts Lists Items') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('post_id') ?></th>
                <th><?= $this->Paginator->sort('lists_item_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($postsListsItems as $postsListsItem): ?>
            <tr>
                <td><?= $postsListsItem->has('post') ? $this->Html->link($postsListsItem->post->Id, ['controller' => 'Posts', 'action' => 'view', $postsListsItem->post->Id]) : '' ?></td>
                <td><?= $postsListsItem->has('lists_item') ? $this->Html->link($postsListsItem->lists_item->title, ['controller' => 'ListsItems', 'action' => 'view', $postsListsItem->lists_item->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $postsListsItem->post_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $postsListsItem->post_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $postsListsItem->post_id], ['confirm' => __('Are you sure you want to delete # {0}?', $postsListsItem->post_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
