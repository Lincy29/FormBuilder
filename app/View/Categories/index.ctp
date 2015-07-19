<div class="table-responsive">
<div class="roles index">
	<h2><?php echo __('Names'); ?></h2>
	<table cellpadding="0" cellspacing="0" class="table table-striped">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('category'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($categories as $category): ?>
	<tr>
		<td><?php echo h($category['Category']['id']); ?>&nbsp;</td>
		<td><?php echo h($category['Category']['category_name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $category['Category']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>

</div>
</div>

