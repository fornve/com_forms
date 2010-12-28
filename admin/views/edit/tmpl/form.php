<?php
	JRequest::setVar( 'hidemainmenu', 1 );
?>
<form action="index.php" method="post" name="adminForm">

	<table cellspacing="0" cellpadding="0" border="0" width="100%">
		<tr>
			<td valign="top">
				<table class="adminform">
				<tr>
					<th>
						<?php echo JText::_( 'FORM NAME' ); ?>
					</th>
					<td>
						<input type="text" name="name" value="<?php echo $this->form->name; ?>" />
					</td>
				</tr>
				<tr>
					<th>
						<?php echo JText::_( 'FORM DESCRIPTION' ); ?>
					</th>
					<td>
						<textarea name="description" cols="80" rows="5"><?php echo $this->form->description; ?></textarea>
					</td>
				</tr>

				<tr>
					<th><?php echo JText::_( 'FORM FIELDS' ); ?></th>
					<td>
						<a href="<?php echo JRoute::_( 'index.php?option=com_forms&task=edit_field&form_id='. $this->form->id ); ?>"><?php echo JText::_( 'ADD FIELD' ); ?></a>

						<?php if( $this->form->fields ): ?>
						<table class="adminform">
								<tr>
									<th></th>
									<th><?php echo JText::_( 'NAME' ); ?></th>
									<th><?php echo JText::_( 'TYPE' ); ?></th>
									<th><?php echo JText::_( 'SORT ORDER' ); ?></th>
									<th></th>
								</tr>
							<?php foreach( $this->form->fields as $i => $field ): ?>
								<tr>
									<td><?php echo $i + 1; ?></td>
									<td><?php echo $field->name; ?></td>
									<td><?php echo $field->type; ?></td>
									<td><input type="text" name="field_<?php echo $field->id; ?>" value="<?php echo $field->sort_order; ?>" /></td>
									<td>
										<a href="<?php echo JRoute::_( 'index.php?option=com_forms&task=edit_field&id='. $field->id ); ?>"><?php echo JText::_( 'EDIT' ); ?></a>
										|
										<a href="<?php echo JRoute::_( 'index.php?option=com_forms&task=delete_field&id='. $field->id ); ?>"><?php echo JText::_( 'DELETE' ); ?></a>
									</td>
								</tr>
							<?php endforeach; ?>
						</table>
						<?php endif; ?>
					</td>
				</tr>

				</table>
			</td>
			<td valign="top" width="320" style="padding: 7px 0 0 5px">
			<?php
				$title = JText::_( 'Parameters - Article' );
				echo $this->pane->startPane("content-pane");
				echo $this->pane->startPanel( $title, "detail-page" );

				$title = JText::_( 'Parameters - Advanced' );
				echo $this->pane->endPanel();
				echo $this->pane->startPanel( $title, "params-page" );

				$title = JText::_( 'Metadata Information' );
				echo $this->pane->endPanel();
				echo $this->pane->startPanel( $title, "metadata-page" );

				echo $this->pane->endPanel();
				echo $this->pane->endPane();
			?>
			</td>
		</tr>
	</table>

	<input type="hidden" name="id" value="<?php echo $this->form->id; ?>" />
	<input type="hidden" name="mask" value="0" />
	<input type="hidden" name="option" value="<?php echo $option;?>" />
	<input type="hidden" name="task" value="" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>
