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
