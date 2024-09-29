<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ServiceItem $serviceItem
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Service Item'), ['action' => 'edit', $serviceItem->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Service Item'), ['action' => 'delete', $serviceItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $serviceItem->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Service Items'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Service Item'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="serviceItems view content">
            <h3><?= h($serviceItem->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($serviceItem->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($serviceItem->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Code') ?></th>
                    <td><?= h($serviceItem->code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Service') ?></th>
                    <td><?= $serviceItem->hasValue('service') ? $this->Html->link($serviceItem->service->name, ['controller' => 'Services', 'action' => 'view', $serviceItem->service->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($serviceItem->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($serviceItem->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>