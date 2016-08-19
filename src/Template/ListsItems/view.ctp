<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Lists Item'), ['action' => 'edit', $listsItem->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Lists Item'), ['action' => 'delete', $listsItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $listsItem->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Lists Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lists Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Posts'), ['controller' => 'Posts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Post'), ['controller' => 'Posts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="listsItems view large-9 medium-8 columns content">
    <h3><?= h($listsItem->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($listsItem->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Image') ?></th>
            <td><?= h($listsItem->image) ?></td>
        </tr>
        <tr>
            <th><?= __('Source Link') ?></th>
            <td><?= h($listsItem->source_link) ?></td>
        </tr>
        <tr>
            <th><?= __('Source Name') ?></th>
            <td><?= h($listsItem->source_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($listsItem->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Number') ?></th>
            <td><?= $this->Number->format($listsItem->number) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Posts') ?></h4>
        <?php if (!empty($listsItem->posts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Body') ?></th>
                <th><?= __('Timestamp') ?></th>
                <th><?= __('Tags') ?></th>
                <th><?= __('Image') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($listsItem->posts as $posts): ?>
            <tr>
                <td><?= h($posts->id) ?></td>
                <td><?= h($posts->title) ?></td>
                <td><?= h($posts->body) ?></td>
                <td><?= h($posts->timestamp) ?></td>
                <td><?= h($posts->tags) ?></td>
                <td><?= h($posts->image) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Posts', 'action' => 'view', $posts->Id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Posts', 'action' => 'edit', $posts->Id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Posts', 'action' => 'delete', $posts->Id], ['confirm' => __('Are you sure you want to delete # {0}?', $posts->Id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
