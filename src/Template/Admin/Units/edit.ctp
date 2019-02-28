<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?=SITE_PATH?>admin/users/welcome/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Unit Edit</li>
          </ol>
<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $unit->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $unit->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Units'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="form-group container">
    <?= $this->Form->create($unit); ?>
    <fieldset>
        <legend><?= __('Edit Unit') ?></legend>
        <?php
		    echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
            echo "<tr><td>name<td>".$this->Form->input('name',array('label'=>false));
            echo "<tr><td>Url<td>".$this->Form->input('url',array('label'=>false));
            echo "<tr><td>Priority<td>".$this->Form->input('priority',array('label'=>false));
			echo '</table>';
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
