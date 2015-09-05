<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Offer_model extends CI_Model
{
	//
	public function createoffer($header,$description,$from,$to,$brand,$storeid)
	{
		$data  = array(
			'header' => $header,
			'description' => $description,
			'from' => $from,
			'brandid' => $brand,
//			'storeid' => $storeid,
			'to' => $to
		);
		$query=$this->db->insert( 'offers', $data );
		$offerid=$this->db->insert_id();
        foreach($storeid AS $key=>$value)
            {
                $this->offer_model->createofferbystore($value,$offerid);
        }
		return  1;
	}
	public function createofferforstore($header,$description,$from,$to,$brand,$store)
	{
//        echo $store;
		$data  = array(
			'header' => $header,
			'description' => $description,
			'from' => $from,
			'brandid' => $brand,
//			'storeid' => $storeid,
			'to' => $to
		);
		$query=$this->db->insert( 'offers', $data );
		$offerid=$this->db->insert_id();
        $data  = array(
			'storeid' => $store,
			'offerid' => $offerid
		);
		$query=$this->db->insert( 'storeoffers', $data );
//        $querystoreofferforstore=$this->db->query('INSERT INTO `storeoffers`( `storeid`, `offerid`) VALUES ('$store','$offerid')');
//        foreach($storeid AS $key=>$value)
//            {
//                $this->offer_model->createofferbystoreforstore($store,$offerid);
//        }
		return  1;
	}
    public function createofferbystore($value,$offerid)
	{
		$data  = array(
			'storeid' => $value,
			'offerid' => $offerid
		);
		$query=$this->db->insert( 'storeoffers', $data );
		return  1;
	}
    
	function viewoffer()
	{
		$query=$this->db->query("SELECT `offers`.`id`,`offers`.`header`,`offers`.`description`,`offers`.`from`,`offers`.`to`,`brand`.`name` AS `brandname`,`brand`.`id` AS `brandid`,`store`.`name` AS `storename` FROM `offers` 
        LEFT OUTER JOIN `brand` ON `brand`.`id`=`offers`.`brandid`
        LEFT OUTER JOIN `store` ON `store`.`id`=`offers`.`storeid`
        ")->result();
		return $query;
	}
	function viewofferforstore()
	{
        $storeid=$this->session->userdata('store');
		$query=$this->db->query("SELECT `offers`.`id`,`storeoffers`.`id` AS `storeofferid`, `storeoffers`.`storeid`, `storeoffers`.`offerid`,`offers`.`header`,`offers`.`description`,`offers`.`from`,`offers`.`to`
FROM `storeoffers` 
LEFT OUTER JOIN `offers` ON `offers`.`id`=`storeoffers`.`offerid`
WHERE `storeoffers`.`storeid`='$storeid'")->result();
		return $query;
	}
	function viewofferforbrand()
	{
        $brandid=$this->session->userdata('brand');
		$query=$this->db->query("SELECT `offers`.`id`,`offers`.`header`,`offers`.`description`,`offers`.`from`,`offers`.`to`,`brand`.`name` AS `brandname`,`brand`.`id` AS `brandid`,`store`.`name` AS `storename` FROM `offers` 
        LEFT OUTER JOIN `brand` ON `brand`.`id`=`offers`.`brandid`
        LEFT OUTER JOIN `store` ON `store`.`id`=`offers`.`storeid`
        WHERE `offers`.`brandid`='$brandid'
        ")->result();
		return $query;
	}
	public function beforeeditoffer( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'offers' )->row();
		return $query;
	}
	public function beforeeditofferforstore( $id )
	{
//        echo $id;
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'offers' )->row();
		return $query;
	}
	
	public function editoffer( $id,$header,$description,$from,$to,$brand,$storeid)
	{
		$data = array(
			'header' => $header,
			'description' => $description,
			'from' => $from,
			'brandid' => $brand,
			'to' => $to
		);
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'offers', $data );
        $querydelete=$this->db->query("DELETE FROM `storeoffers` WHERE `offerid`='$id'");
        foreach($storeid AS $key=>$value)
            {
                $this->offer_model->createsstoreoffer($value,$id);
        }
		return  1;
	}
	public function editofferforstore( $id,$header,$description,$from,$to,$brand,$store)
	{
		$data = array(
			'header' => $header,
			'description' => $description,
			'from' => $from,
			'brandid' => $brand,
			'to' => $to
		);
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'offers', $data );
//        $querydelete=$this->db->query("DELETE FROM `storeoffers` WHERE `offerid`='$id'");
//        foreach($storeid AS $key=>$value)
//            {
//                $this->offer_model->createsstoreoffer($value,$id);
//        }
		return  1;
	}
    
    public function createsstoreoffer($storeid,$offerid)
	{
		$data  = array(
			'storeid' => $storeid,
			'offerid' => $offerid
		);
       // print_r($data);
        $this->db->where($data);
      
          $query=$this->db->insert( 'storeoffers', $data );
        
        
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
    
	function deleteoffer($id)
	{
		$query=$this->db->query("DELETE FROM `offers` WHERE `id`='$id'");
		
	}
	function deleteofferforstore($id,$storeofferid)
	{
		$query=$this->db->query("DELETE FROM `offers` WHERE `id`='$id'");
		$query=$this->db->query("DELETE FROM `storeoffers` WHERE `id`='$storeofferid'");
		
	}
	function deletealloffers()
	{
		$query=$this->db->query("DELETE FROM `offers`");
		
	}
	function deletealloffersforstore()
	{
		$query=$this->db->query("DELETE FROM `offers` WHERE ");
		
	}
	function deleteallofferforbrand()
	{
        $brandid=$this->session->userdata('brand');
		$query=$this->db->query("DELETE FROM `offers` WHERE `brandid`='$brandid'");
		
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
	public function getstatusdropdown()
	{
		$status= array(
			 "1" => "Enabled",
			 "0" => "Disabled",
			);
		return $status;
	}
}
?>