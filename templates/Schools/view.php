<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\School $school
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit School'), ['action' => 'edit', $school->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete School'), ['action' => 'delete', $school->id], ['confirm' => __('Are you sure you want to delete # {0}?', $school->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Schools'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New School'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="schools view content">
            <h3><?= h($school->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($school->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($school->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone') ?></th>
                    <td><?= h($school->phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Website') ?></th>
                    <td><?= h($school->website) ?></td>
                </tr>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($school->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Subtitle') ?></th>
                    <td><?= h($school->subtitle) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description 1') ?></th>
                    <td><?= h($school->description_1) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description 2') ?></th>
                    <td><?= h($school->description_2) ?></td>
                </tr>
                <tr>
                    <th><?= __('Background') ?></th>
                    <td><?= h($school->background) ?></td>
                </tr>
                <tr>
                    <th><?= __('Logo 1') ?></th>
                    <td><?= h($school->logo_1) ?></td>
                </tr>
                <tr>
                    <th><?= __('Logo 2') ?></th>
                    <td><?= h($school->logo_2) ?></td>
                </tr>
                <tr>
                    <th><?= __('Icon') ?></th>
                    <td><?= h($school->icon) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $school->has('user') ? $this->Html->link($school->user->name, ['controller' => 'Users', 'action' => 'view', $school->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Chairman Description') ?></th>
                    <td><?= h($school->chairman_description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Chairman Signature') ?></th>
                    <td><?= h($school->chairman_signature) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($school->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($school->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($school->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
