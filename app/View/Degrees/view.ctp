<div class="degrees view">
<h2><?php echo __('Degree'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($degree['Degree']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Institution'); ?></dt>
		<dd>
			<?php echo h($degree['Institution']['name']);?>
			&nbsp;
		</dd>
		<dt><?php echo __('Department'); ?></dt>
		<dd>
			<?php echo h($degree['Department']['name']);?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($degree['Degree']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>