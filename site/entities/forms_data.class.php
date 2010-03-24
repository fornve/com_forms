<?php
	class Forms_Data extends Entity
	{
		protected $table_name = '#__forms_data';
		
		public static function Retrieve( $id )
		{
			return parent::Retrieve( $id, __CLASS__ );
		}
	}
