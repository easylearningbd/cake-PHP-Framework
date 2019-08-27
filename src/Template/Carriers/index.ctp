<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Carrier[]|\Cake\Collection\CollectionInterface $carriers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
   <?= $this->Element('actions', array('type' => 'Carrier', 'types' => 'Carriers')); ?> 
</nav>
<div class="carriers index large-9 medium-8 columns content">
    <h3><?= __('Carriers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('carrier_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($carriers as $carrier): ?>
            <tr>
                <td><?= $this->Number->format($carrier->id) ?></td>
                <td><?= h($carrier->name) ?></td>
                <td><?= h($carrier->carrier_code) ?></td>
                <td><?= h($carrier->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $carrier->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $carrier->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $carrier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $carrier->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
