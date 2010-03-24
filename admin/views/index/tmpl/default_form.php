<h1>Form</h1>

<?php if( $this->data ): ?>
	<table class="adminlist">
		<tr>
			<td class="title" style="width: 50%;">Name</td>
			<td class="title">Value</td>
		</tr>
	<?php foreach( $this->data as $field ): ?>
		<tr>
			<th><?php echo $field['text']; ?></th>
			<td><?php echo $field['data']; ?></td>
		</tr>	
	<?php endforeach; ?>
	</table>
<?php endif; ?>

<a href="<?php echo JRoute::_( "index.php?option=com_forms&task=form_data_csv&id={$this->form->id}" ); ?>">Export as CSV</a>
