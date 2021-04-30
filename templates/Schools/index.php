<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\School[]|\Cake\Collection\CollectionInterface $schools
 */
?>
<div class="schools index content">
    <?= $this->Html->link(__('New School'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Schools') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('phone') ?></th>
                    <th><?= $this->Paginator->sort('website') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('subtitle') ?></th>
                    <th><?= $this->Paginator->sort('description_1') ?></th>
                    <th><?= $this->Paginator->sort('description_2') ?></th>
                    <th><?= $this->Paginator->sort('background') ?></th>
                    <th><?= $this->Paginator->sort('logo_1') ?></th>
                    <th><?= $this->Paginator->sort('logo_2') ?></th>
                    <th><?= $this->Paginator->sort('icon') ?></th>
                    <th><?= $this->Paginator->sort('users_id') ?></th>
                    <th><?= $this->Paginator->sort('chairman_description') ?></th>
                    <th><?= $this->Paginator->sort('chairman_signature') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($schools as $school): ?>
                <tr>
                    <td><?= $this->Number->format($school->id) ?></td>
                    <td><?= h($school->name) ?></td>
                    <td><?= h($school->address) ?></td>
                    <td><?= h($school->phone) ?></td>
                    <td><?= h($school->website) ?></td>
                    <td><?= h($school->title) ?></td>
                    <td><?= h($school->subtitle) ?></td>
                    <td><?= h($school->description_1) ?></td>
                    <td><?= h($school->description_2) ?></td>
                    <td><?= h($school->background) ?></td>
                    <td><?= h($school->logo_1) ?></td>
                    <td><?= h($school->logo_2) ?></td>
                    <td><?= h($school->icon) ?></td>
                    <td><?= $school->has('user') ? $this->Html->link($school->user->name, ['controller' => 'Users', 'action' => 'view', $school->user->id]) : '' ?></td>
                    <td><?= h($school->chairman_description) ?></td>
                    <td><?= h($school->chairman_signature) ?></td>
                    <td><?= h($school->created) ?></td>
                    <td><?= h($school->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $school->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $school->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $school->id], ['confirm' => __('Are you sure you want to delete # {0}?', $school->id)]) ?>
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
