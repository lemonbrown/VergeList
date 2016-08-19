<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $postsListsItem->post_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $postsListsItem->post_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Posts Lists Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Posts'), ['controller' => 'Posts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Post'), ['controller' => 'Posts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Lists Items'), ['controller' => 'ListsItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lists Item'), ['controller' => 'ListsItems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="postsListsItems form large-9 medium-8 columns content">
    <?= $this->Form->create($postsListsItem) ?>
    <fieldset>
        <legend><?= __('Edit Posts Lists Item') ?></legend>
        <?php
            echo $this->Form->input('lists_item_id', ['options' => $listsItems]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
