
<h2>Groups</h2>
<?php if( $this->groups ): ?>
	<ul>
	<?php foreach( $this->groups as $form ): ?>
		<li>
			<a href="<?php echo JRoute::_( "index.php?option=com_forms&form_name={$form->name}" ); ?>" <?php if( $form->name == $this->selected_form ) echo ' style="color: red; font-weight: bold;"'; ?>>
				<?php echo $form->name ? $form->name : '(no name)'; ?>
			</a>
		</li>
	<?php endforeach; ?>
	</ul>

	<p><a href="<?php echo JRoute::_( "index.php?option=com_forms&task=all_csv" ); ?>">Download CSV for all forms</a></p>

<?php endif; ?>

<h2>Forms</h2>
<?php if( $this->forms ): ?>
	
	<p><a href="<?php echo JRoute::_( "index.php?option=com_forms&task=group_csv&group=". urlencode( $this->selected_form ) ); ?>">Download CSV for group "<?php echo $this->selected_form; ?>"</a></p>
	
	<table class="adminform">
		<th>Created</th>
		<th>IP</th>
		<th>Email</th>
		<th></th>
	<?php foreach( $this->forms as $form ): ?>
		<tr>
			<td><?php echo date( "Y-m-d H:i:s", $form->created ); ?></td>
			<td><?php echo $form->ip; ?></td>
			<td><?php echo $form->GetData( 'email' ); ?></td>
			<td><a href="<?php echo JRoute::_( "index.php?option=com_forms&task=form_data&id={$form->id}" ); ?>">View</a></td>
			<td><a href="<?php echo JRoute::_( "index.php?option=com_forms&form_name={$this->selected_form}&delete={$form->id}" ); ?>">Delete</a></td>
		</tr>	
	<?php endforeach; ?>
	</table>
<?php endif; ?>
