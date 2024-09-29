<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ServiceItem> $serviceItems
 */
?>
<div class="serviceItems index content">
    <?= $this->Html->link(__('New Service Item'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Service Items') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('code') ?></th>
                    <th><?= $this->Paginator->sort('service_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($serviceItems as $serviceItem): ?>
                <tr>
                    <td><?= h($serviceItem->id) ?></td>
                    <td><?= h($serviceItem->name) ?></td>
                    <td><?= h($serviceItem->code) ?></td>
                    <td><?= $serviceItem->hasValue('service') ? $this->Html->link($serviceItem->service->name, ['controller' => 'Services', 'action' => 'view', $serviceItem->service->id]) : '' ?></td>
                    <td><?= h($serviceItem->created) ?></td>
                    <td><?= h($serviceItem->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $serviceItem->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $serviceItem->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $serviceItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $serviceItem->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>