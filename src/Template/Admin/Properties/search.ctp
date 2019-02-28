		<table class="table table-bordered">
		<thead><tr>
		<th>Id</th>
		<th>Name</th>
		<th>Date</th>
		<th>Status</th>
		<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
        </thead>
		<tbody>
		<?php
		
		 foreach ($property as $data): ?>
		<tr>
		<td><?php echo h($data->id); ?>&nbsp;</td>
		<td><?php echo h($data->name); ?>&nbsp;</td>
		<td><?php echo h($data->posted_date); ?>&nbsp;</td>
		<td><?php echo h($data->status); ?>&nbsp;</td>
		<td class="actions">
		<?php echo $this->Html->link(__('View'), array('action' => 'view', $data->id)); ?>
		<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $data->id)); ?>
		 <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $data->id], ['confirm' => __('Are you sure you want to delete # {0}?', $data->id)]) ?>
		</td>
		</tr>
		<?php endforeach; ?>
        </tbody>
		</table>
