
<h2>Form edit</h2>

<?php
		JRequest::setVar( 'hidemainmenu', 1 );



		?>
		<form action="index.php" method="post" name="adminForm">

		<table cellspacing="0" cellpadding="0" border="0" width="100%">
		<tr>
			<td valign="top">
				<table class="adminform">
				<tr>
					<td>test text
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
