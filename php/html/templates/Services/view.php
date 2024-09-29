<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Service $service
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Service'), ['action' => 'edit', $service->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Service'), ['action' => 'delete', $service->id], ['confirm' => __('Are you sure you want to delete # {0}?', $service->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Services'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Service'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="services view content">
            <h3><?= h($service->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($service->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($service->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Code') ?></th>
                    <td><?= h($service->code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($service->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($service->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Service Items') ?></h4>
                <?php if (!empty($service->service_items)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Code') ?></th>
                            <th><?= __('Service Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($service->service_items as $serviceItem) : ?>
                        <tr>
                            <td><?= h($serviceItem->id) ?></td>
                            <td><?= h($serviceItem->name) ?></td>
                            <td><?= h($serviceItem->code) ?></td>
                            <td><?= h($serviceItem->service_id) ?></td>
                            <td><?= h($serviceItem->created) ?></td>
                            <td><?= h($serviceItem->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ServiceItems', 'action' => 'view', $serviceItem->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ServiceItems', 'action' => 'edit', $serviceItem->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ServiceItems', 'action' => 'delete', $serviceItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $serviceItem->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>