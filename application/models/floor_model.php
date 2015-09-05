<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Floor_model extends CI_Model
{
	public function createfloor($floor)
	{
		$data  = array(
			'floorno' => $floor
		);
        
		$query=$this->db->insert( 'floor', $data );
		
		return  1;
	}
    
	function viewfloor()
	{
		$query=$this->db->query("SELECT `id`, `floorno` FROM `floor`")->result();
		return $query;
	}
	
	
	public function beforeeditfloor( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'floor' )->row();
		return $query;
	}
	
	
	public function editfloor($id,$floor)
	{
		$data = array(
			'floorno' => $floor
		);
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'floor', $data );
		
		return 1;
	}
	
	function deletefloor($id)
	{
		$query=$this->db->query("DELETE FROM `floor` WHERE `id`='$id'");
		
	}
}
?>