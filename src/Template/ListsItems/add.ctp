<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Lists Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Posts'), ['controller' => 'Posts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Post'), ['controller' => 'Posts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="listsItems form large-9 medium-8 columns content">
    <?= $this->Form->create($listsItem) ?>
    <fieldset>
        <legend><?= __('Add Lists Item') ?></legend>
        <?php
            echo $this->Form->input('number');
            echo $this->Form->input('title');
            echo $this->Form->input('image');
            echo $this->Form->input('source_link');
            echo $this->Form->input('source_name');
            echo $this->Form->input('posts._ids', ['options' => $posts]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
