<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Lists Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Posts'), ['controller' => 'Posts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Post'), ['controller' => 'Posts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="listsItems index large-9 medium-8 columns content">
    <h3><?= __('Lists Items') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('number') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('image') ?></th>
                <th><?= $this->Paginator->sort('source_link') ?></th>
                <th><?= $this->Paginator->sort('source_name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listsItems as $listsItem): ?>
            <tr>
                <td><?= $this->Number->format($listsItem->id) ?></td>
                <td><?= $this->Number->format($listsItem->number) ?></td>
                <td><?= h($listsItem->title) ?></td>
                <td><?= h($listsItem->image) ?></td>
                <td><?= h($listsItem->source_link) ?></td>
                <td><?= h($listsItem->source_name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $listsItem->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $listsItem->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $listsItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $listsItem->id)]) ?>
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
