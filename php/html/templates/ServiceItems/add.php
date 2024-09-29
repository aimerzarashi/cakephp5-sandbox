<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ServiceItem $serviceItem
 * @var \Cake\Collection\CollectionInterface|string[] $services
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Service Items'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="serviceItems form content">
            <?= $this->Form->create($serviceItem) ?>
            <fieldset>
                <legend><?= __('Add Service Item') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('code');
                    echo $this->Form->control('service_id', ['options' => $services]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
