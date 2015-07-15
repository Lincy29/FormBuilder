<div class="table-responsive">
<div class="roles index">
	<h2><?php echo __('Names'); ?></h2>
	
	<table cellpadding="0" cellspacing="0" class="table table-striped">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('form name'); ?></th>
			<th><?php echo $this->Paginator->sort('institution'); ?></th>	
			<th><?php echo $this->Paginator->sort('department'); ?></th>	
			<th><?php echo $this->Paginator->sort('close date'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($forms as $form): ?>
	<tr>
		<td><?php echo h($form['Form']['id']); ?>&nbsp;</td>
		<td><?php echo h($form['Form']['name']); ?>&nbsp;</td>
		<td><?php echo h($form['Institution']['name']); ?>&nbsp;</td>
		<td><?php echo h($form['Department']['name']); ?>&nbsp;</td> 	
		<td><?php echo h($form['Form']['close']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $form['Form']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>

</div>
</div>

