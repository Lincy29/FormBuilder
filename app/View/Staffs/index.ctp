<div class="table-responsive">
<div class="staffs index">
	<h2><?php echo __('Staffs'); ?></h2>
	<table cellpadding="0" cellspacing="0" class="table table-striped">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>			
			<th><?php echo $this->Paginator->sort('firstname'); ?></th>
			<th><?php echo $this->Paginator->sort('lastname'); ?></th>
			<th><?php echo $this->Paginator->sort('username'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>			
			<th><?php echo $this->Paginator->sort('institution_id'); ?></th>
			<th><?php echo $this->Paginator->sort('department_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($staffs as $staff):?>
	<tr>
		<td><?php echo h($staff['Staff']['id']); ?>&nbsp;</td>	
		<td><?php echo h($staff['Staff']['firstname']); ?>&nbsp;</td>
		<td><?php echo h($staff['Staff']['lastname']); ?>&nbsp;</td>
		<td><?php echo h($staff['User']['username']); ?>&nbsp;</td>
		<td><?php echo h($staff['User']['email']); ?>&nbsp;</td>
		<td><?php echo h($staff['Staff']['Institution']['name']); ?>&nbsp;</td>
		<td><?php echo h($staff['Staff']['Department']['name']); ?>&nbsp;</td>
		
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $staff['Staff']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
</div>	