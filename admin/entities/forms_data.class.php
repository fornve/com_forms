<?php

	class Forms_Data extends Entity
	{
		protected $table_name = '#__forms_data';
		
		public static function Retrieve( $id )
		{
			return parent::Retrieve( $id, __CLASS__ );
		}
		
		public static function FormGroupsCollection()
		{
			$entity = new Entity();
			$query = "SELECT * FROM #__forms_data GROUP BY `name` ORDER BY created DESC";
			return $entity->Collection( $query, null, __CLASS__ );
		}
		
		public static function FormGroupCollection( $form_name = '' )
		{
			$entity = new Entity();
			$query = "SELECT * FROM #__forms_data WHERE `name` = ? ORDER BY id DESC";
			return $entity->Collection( $query, $form_name, __CLASS__ );
		}
		
		public function GetData( $field )
		{
			$data = unserialize( $this->data );
			return $data[ $field ][ 'data' ];
		}
	}
