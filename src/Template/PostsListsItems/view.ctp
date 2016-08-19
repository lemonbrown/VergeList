<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Posts Lists Item'), ['action' => 'edit', $postsListsItem->post_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Posts Lists Item'), ['action' => 'delete', $postsListsItem->post_id], ['confirm' => __('Are you sure you want to delete # {0}?', $postsListsItem->post_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Posts Lists Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Posts Lists Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Posts'), ['controller' => 'Posts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Post'), ['controller' => 'Posts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Lists Items'), ['controller' => 'ListsItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lists Item'), ['controller' => 'ListsItems', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="postsListsItems view large-9 medium-8 columns content">
    <h3><?= h($postsListsItem->post_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Post') ?></th>
            <td><?= $postsListsItem->has('post') ? $this->Html->link($postsListsItem->post->Id, ['controller' => 'Posts', 'action' => 'view', $postsListsItem->post->Id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Lists Item') ?></th>
            <td><?= $postsListsItem->has('lists_item') ? $this->Html->link($postsListsItem->lists_item->title, ['controller' => 'ListsItems', 'action' => 'view', $postsListsItem->lists_item->id]) : '' ?></td>
        </tr>
    </table>
</div>
