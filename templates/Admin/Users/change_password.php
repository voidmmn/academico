<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="column-responsive column-80">
    <div class="users form content">
        <?= $this->Form->create() ?>
        <fieldset>
                <legend><?= __('Alterar a senha') ?></legend>
                <?php
                    echo $this->Form->control('id', ['type' => 'hidden', 'value' => $id]);
                    echo $this->Form->control('password');
                    echo $this->Form->control('confirm_password', ['type' => 'password']);
                ?>
        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
