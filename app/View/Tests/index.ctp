<div class="table-responsive">
<div class="roles index">
	<h2><?php echo __('Names'); ?></h2>
	<table cellpadding="0" cellspacing="0" class="table table-striped">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>

			<th><?php echo $this->Paginator->sort('names'); ?></th>

			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($tests as $test): ?>
	<tr>
		<td><?php echo h($test['Test']['id']); ?>&nbsp;</td>
		<td><?php echo h($test['Test']['name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $test['Test']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>

</div>
</div>

