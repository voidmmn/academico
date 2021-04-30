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
            <?= $this->Html->link(__('List Schools'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="schools form content">
            <?= $this->Form->create($school) ?>
            <fieldset>
                <legend><?= __('Add School') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('address');
                    echo $this->Form->control('phone');
                    echo $this->Form->control('website');
                    echo $this->Form->control('title');
                    echo $this->Form->control('subtitle');
                    echo $this->Form->control('description_1');
                    echo $this->Form->control('description_2');
                    echo $this->Form->control('background');
                    echo $this->Form->control('logo_1');
                    echo $this->Form->control('logo_2');
                    echo $this->Form->control('icon');
                    echo $this->Form->control('users_id', ['options' => $users]);
                    echo $this->Form->control('chairman_description');
                    echo $this->Form->control('chairman_signature');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
