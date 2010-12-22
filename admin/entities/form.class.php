<?php

class Form extends Entity
{
	protected $table_name = '#__form';
	protected $schema = array( 'id', 'name' );
	
	public static function retrieve( $id )
	{
		$object = parent::retrieve( $id, __CLASS__ );

		if ( !$object )
		{
			return false;
		}

		$object->fields = Field::formCollection( $object->id );
		
		return $object;
	}

	public function assignData( Form_Field_Data $field_data )
	{
		if( $this->fields ) foreach( $this->fields as $field )
		{
			if( $field_data->field == $field->id )
			{
				$field->data = $field_data;
			}
		}
	} 
}
