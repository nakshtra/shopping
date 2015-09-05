<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Imagegallery_model extends CI_Model
{
	//topic
	public function create($image,$description,$brand,$storeid)
	{
		$data  = array(
			'image' => $image,
			'description' => $description,
			'brandid' => $brand
		);
        
		$query=$this->db->insert( 'imagegallery', $data );
		$imagegalleryid=$this->db->insert_id();
        foreach($storeid AS $key=>$value)
            {
                $this->imagegallery_model->createimagegallerybystore($value,$imagegalleryid);
        }
		return  1;
	}
    
    public function createimagegallerybystore($value,$imagegalleryid)
	{
		$data  = array(
			'storeid' => $value,
			'imagegalleryid' => $imagegalleryid
		);
		$query=$this->db->insert( 'storeimagegallery', $data );
		return  1;
	}
	public function createnewin($image,$description,$brand,$storeid)
	{
		$data  = array(
			'image' => $image,
			'description' => $description,
            'brandid'=>$brand
		);
		$query=$this->db->insert( 'newin', $data );
		$newinid=$this->db->insert_id();
        foreach($storeid AS $key=>$value)
            {
                $this->imagegallery_model->createnewinbystore($value,$newinid);
        }
		return  1;
	}
    
    public function createnewinbystore($value,$newinid)
	{
		$data  = array(
			'storeid' => $value,
			'newinid' => $newinid
		);
		$query=$this->db->insert( 'storenewin', $data );
		return  1;
	}
	function viewgallery()
	{
		$query=$this->db->query("SELECT `imagegallery`.`id`, `imagegallery`.`image`, `imagegallery`.`description`, `imagegallery`.`brandid`, `imagegallery`.`storeid`, `imagegallery`.`like`,`brand`.`name` AS `brandname`,`store`.`name` AS `storename` FROM `imagegallery`
        LEFT OUTER JOIN `brand` ON `brand`.`id`=`imagegallery`.`brandid`
        LEFT OUTER JOIN `store` ON `store`.`id`=`imagegallery`.`storeid`")->result();
		return $query;
	}
	function viewnewin()
	{
		$query=$this->db->query("SELECT `newin`.`id`, `newin`.`image`, `newin`.`description`, `newin`.`like`,`brand`.`name` AS `brandname` FROM `newin` LEFT OUTER JOIN `brand` ON `newin`.`brandid`=`brand`.`id` ")->result();
		return $query;
	}
	function viewnewinforbrand()
	{
        $brandid=$this->session->userdata('brand');
		$query=$this->db->query("SELECT `id`, `image`, `description`, `like` FROM `newin` WHERE `brandid`='$brandid' ")->result();
		return $query;
	}
    
	
	public function beforeedit( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'imagegallery' )->row();
		return $query;
	}
	public function beforeeditnewin( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'newin' )->row();
		return $query;
	}
	public function beforeeditnewinforstore( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'newin' )->row();
		return $query;
	}
	
	public function edit($id,$image,$description,$brand,$storeid)
	{
		$data = array(
			'image' => $image,
			'description' => $description,
			'brandid' => $brand
		);
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'imagegallery', $data );
		$querydelete=$this->db->query("DELETE FROM `storeimagegallery` WHERE `imagegalleryid`='$id'");
        foreach($storeid AS $key=>$value)
            {
                $this->imagegallery_model->createsstoreimagegallery($value,$id);
        }
		return 1;
	}
	 public function createsstoreimagegallery($storeid,$imagegalleryid)
	{
		$data  = array(
			'storeid' => $storeid,
			'imagegalleryid' => $imagegalleryid
		);
       // print_r($data);
        $this->db->where($data);
      
          $query=$this->db->insert( 'storeimagegallery', $data );
        
        
        //$id = $this->db->insert_id();
//		if($query)
//		{
//			$this->savelog($id,'Event Created');
//		}
//		if(!$query)
//			return  0;
//		else
			return  1;
	}
    
    
	public function editnewin($id,$image,$description,$brand,$storeid)
	{
		$data  = array(
			'image' => $image,
			'description' => $description,
            'brandid'=>$brand
		);
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'newin', $data );
		$querydelete=$this->db->query("DELETE FROM `storenewin` WHERE `newinid`='$id'");
        foreach($storeid AS $key=>$value)
            {
                $this->imagegallery_model->createsstorenewin($value,$id);
        }
		return 1;
	}
    
     public function createsstorenewin($storeid,$newinid)
	{
		$data  = array(
			'storeid' => $storeid,
			'newinid' => $newinid
		);
       // print_r($data);
        $this->db->where($data);
      
          $query=$this->db->insert( 'storenewin', $data );
        
        
        //$id = $this->db->insert_id();
//		if($query)
//		{
//			$this->savelog($id,'Event Created');
//		}
//		if(!$query)
//			return  0;
//		else
			return  1;
	}
	function deletegallery($id)
	{
		$query=$this->db->query("DELETE FROM `imagegallery` WHERE `id`='$id'");
		
	}
	function deletenewin($id)
	{
		$query=$this->db->query("DELETE FROM `newin` WHERE `id`='$id'");
		
	}
	function deleteallnewin()
	{
		$query=$this->db->query("DELETE FROM `newin`");
		
	}
	function deleteallnewinforbrand()
	{
        $brandid=$this->session->userdata('brand');
		$query=$this->db->query("DELETE FROM `newin` WHERE `brandid`='$brandid'");
		
	}
	function deleteallgallery()
	{
		$query=$this->db->query("DELETE FROM `imagegallery`");
		
	}
	public function getofferdropdown()
	{
		$query=$this->db->query("SELECT * FROM `offers`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->header;
		}
		
		return $return;
	}
	public function getoffer()
	{
		$query=$this->db->query("SELECT * FROM `offers`  ORDER BY `header` ASC")->result();
		
		
		return $query;
	}
	public function getimagebyid($id)
	{
		$query=$this->db->query("SELECT `image` FROM `imagegallery` WHERE `id`='$id'")->row();
		
		
		return $query;
	}
	public function getnewinimagebyid($id)
	{
		$query=$this->db->query("SELECT `image` FROM `newin` WHERE `id`='$id'")->row();
		
		
		return $query;
	}
	public function getstatusdropdown()
	{
		$status= array(
			 "1" => "Enabled",
			 "0" => "Disabled",
			);
		return $status;
	}
    
	function viewnewinforstore()
	{
        $storeid=$this->session->userdata('store');
		$query=$this->db->query("SELECT `newin`.`id`,`newin`.`image`,`newin`.`description`,`newin`.`like`,`storenewin`.`id`AS `storenewinid`, `storenewin`.`storeid`, `storenewin`.`newinid` 
FROM `storenewin`
INNER JOIN `newin` ON `newin`.`id`=`storenewin`.`newinid`
WHERE `storenewin`.`storeid`='$storeid' ")->result();
		return $query;
	}
    
	public function createnewinforstore($image,$description,$brand,$store)
	{
        
		$data  = array(
			'image' => $image,
			'description' => $description,
            'brandid'=>$brand
		);
		$query=$this->db->insert( 'newin', $data );
		$newinid=$this->db->insert_id();
        $data  = array(
			'storeid' => $store,
			'newinid' => $newinid
		);
		$query=$this->db->insert( 'storenewin', $data );
		return  1;
	}
    
	public function editnewinforstore($id,$image,$description,$brand,$store)
	{
		$data  = array(
			'image' => $image,
			'description' => $description,
            'brandid'=>$brand
		);
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'newin', $data );
//		$querydelete=$this->db->query("DELETE FROM `storenewin` WHERE `newinid`='$id'");
//        foreach($storeid AS $key=>$value)
//            {
//                $this->imagegallery_model->createsstorenewin($value,$id);
//        }
		return 1;
	}
    
	function deletenewinforstore($id,$storenewinid)
	{
		$query=$this->db->query("DELETE FROM `newin` WHERE `id`='$id'");
		$query=$this->db->query("DELETE FROM `storenewin` WHERE `id`='$storenewinid'");
		
	}
    
    //banner
    
	function viewbanner()
	{
		$query=$this->db->query("SELECT `id`, `image`, `title`, `link`,`order`,`timestamp` FROM `banner` ORDER BY `order`")->result();
		return $query;
	}
    
	public function createbanner($image,$title,$link,$order)
	{
		$data  = array(
			'image' => $image,
			'title' => $title,
			'order' => $order,
            'link'=>$link
		);
		$query=$this->db->insert( 'banner', $data );
		return  1;
	}
    
	public function editbanner($id,$image,$title,$link,$order)
	{
		$data  = array(
			'image' => $image,
			'title' => $title,
			'order' => $order,
            'link'=>$link
		);
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'banner', $data );
		return 1;
	}
	public function beforeeditbanner( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'banner' )->row();
		return $query;
	}
    
	public function getbannerimagebyid($id)
	{
		$query=$this->db->query("SELECT `image` FROM `banner` WHERE `id`='$id'")->row();
		return $query;
	}
    
	function deletebanner($id)
	{
		$query=$this->db->query("DELETE FROM `banner` WHERE `id`='$id'");
	}
    
	function deleteallbanner()
	{
		$query=$this->db->query("DELETE FROM `banner`");
		
	}
    
	public function getbanner()
	{
		$query=$this->db->query("SELECT * FROM `banner` ORDER BY `order`")->result();
		return $query;
	}
}
?>