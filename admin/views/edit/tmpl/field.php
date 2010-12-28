<?php
	JRequest::setVar( 'hidemainmenu', 1 );
?>
<form action="index.php" method="post" name="adminForm">

	<table cellspacing="0" cellpadding="0" border="0" width="100%">
		<tr>
			<td valign="top">
				<input type="hidden" name="form_id" value="<?php echo is_object( $this->field->form->id ) ? $this->field->form->id : $this->field->form; ?>" />
				<table class="adminform">
				
				<tr>
					<th>
						<?php echo JText::_( 'FIELD NAME' ); ?>
					</th>
					<td>
						<input type="text" name="name" value="<?php echo $this->form->name; ?>" />
					</td>
				</tr>
				
				<tr>
					<th>
						<?php echo JText::_( 'FIELD TYPE' ); ?>
					</th>
					<td>
						<select name="type">
							<option value="text"<?php if( $this->form->type == 'text' ): ?> selected="selected"<?php endif; ?>><?php echo JText::_( 'TEXT' ); ?></option>
							<option value="select"<?php if( $this->form->type == 'select' ): ?> selected="selected"<?php endif; ?>><?php echo JText::_( 'SELECT' ); ?></option>
							<option value="radio"<?php if( $this->form->type == 'radio' ): ?> selected="selected"<?php endif; ?>><?php echo JText::_( 'RADIO' ); ?></option>
							<option value="checkbox"<?php if( $this->form->type == 'checkbox' ): ?> selected="selected"<?php endif; ?>><?php echo JText::_( 'CHECKBOX' ); ?></option>
						</select>
					</td>
				</tr>

				<tr>
					<th>
						<?php echo JText::_( 'FIELD DESCRIPTION' ); ?>
					</th>
					<td>
						<textarea name="description" cols="80" rows="5"><?php echo $this->form->description; ?></textarea>
					</td>
				</tr>

				<tr>
					<th>
						<?php echo JText::_( 'LENGTH' ); ?>
					</th>
					<td>
						<input type="text" name="name" value="<?php echo $this->form->length; ?>" />
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

	<input type="hidden" name="id" value="<?php echo $row->id; ?>" />
	<input type="hidden" name="cid[]" value="<?php echo $row->id; ?>" />
	<input type="hidden" name="version" value="<?php echo $row->version; ?>" />
	<input type="hidden" name="mask" value="0" />
	<input type="hidden" name="option" value="<?php echo $option;?>" />
	<input type="hidden" name="task" value="" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>
