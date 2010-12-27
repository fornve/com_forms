<h2>Forms</h2>

<?php if( $this->forms ): ?>
	<?php 

		//Ordering allowed ?
//		$ordering = ($lists['order'] == 'section_name' || $lists['order'] == 'cc.title' || $lists['order'] == 'c.ordering');
//		JHTML::_('behavior.tooltip');
		?>
		<form action="index.php?option=com_forms" method="post" name="adminForm">

			<table class="adminlist" cellspacing="1">
				<thead>
					<tr>
						<th width="5">
							<?php echo JText::_( 'Num' ); ?>
						</th>
						<th width="5">
							<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->forms ); ?>);" />
						</th>
						<th class="title" width="200px">
							<?php echo JHTML::_('grid.sort',   JText::_( 'NAME' ), 'name', $lists['name'] ); ?>
						</th>
						<th nowrap="nowrap">
							<?php echo JText::_( 'DESCRIPTION' ); ?>
						</th>
						<th width="10%"></th>
						<th width="1%" class="title">
							<?php echo JHTML::_('grid.sort',   'ID', 'c.id', @$lists['order_Dir'], @$lists['order'] ); ?>
						</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach( $this->forms as $i => $form ): ?>
						<?php
							$checked    = JHTML::_('grid.checkedout',   $form, $i );
						?>
						<tr>
							<td><?php echo $form->id; ?></td>
							<td><?php echo $checked; ?></td>	
							<td><?php echo $form->name; ?></td>
							<td><?php echo $form->description; ?></td>
							<td>
								<a href="index.php?option=com_forms&task=edit_form&id=<?php echo $form->id; ?>"><?php echo JText::_( 'EDIT' ); ?></a>
								<a href="index.php?option=com_forms&task=delete_form&id=<?php echo $form->id; ?>"><?php echo JText::_( 'DELETE' ); ?></a>
							</td>
							<td><?php echo $form->id; ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>

			<input type="hidden" name="option" value="com_forms" />
			<input type="hidden" name="task" value="" />
			<input type="hidden" name="boxchecked" value="0" />
			<input type="hidden" name="redirect" value="<?php echo $redirect;?>" />
			<?php echo JHTML::_( 'form.token' ); ?>
		</form>

<?php endif; ?>
