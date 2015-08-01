<div class="table-responsive">
<div class="admins view">
<h2><?php echo __('Form Coordinator'); ?></h2>
	<table class="table table-striped">
		
		<tr>
		<th><?php echo __('User'); ?></th>
		<td>
			<?php echo h($formcoordinator['Staff']['firstname']." ".$formcoordinator['Staff']['lastname']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<th><?php echo __('Institution'); ?></th>
		<td>
			<?php echo h($formcoordinator['Institution']['name']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<th><?php echo __('Department'); ?></th>
		<td>
			<?php echo h($formcoordinator['Department']['name']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<th><?php echo __('Role'); ?></th>
		<td>
			<?php echo h($formcoordinator['Role']['alias']); ?>
			&nbsp;
		</td>
		</tr>
		</table>
</div>
</div>
