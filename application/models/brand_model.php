<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Brand_model extends CI_Model
{
	
	public function create($name,$website,$facebook,$twitter,$pininterest,$googleplus,$instagram,$blog,$description,$logo)
	{
		$data  = array(
			'name' => $name,
			'website' => $website,
			'facebookpage' => $facebook,
			'twitterpage' => $twitter,
			'pininterest' => $pininterest,
			'googleplus' => $googleplus,
			'instagram' => $instagram,
			'blog' => $blog,
			'logo' => $logo,
			'description' => $description,
		);
		$query=$this->db->insert( 'brand', $data );
		$id = $this->db->insert_id();
//		if($query)
//		{
//			$this->savelog($id,'Event Created');
//		}
		if(!$query)
			return  0;
		else
			return  $id;
	}
	
	public function createbycsv($file)
	{
        
//            echo $row['name']."<br>";
//            echo $row['pricerange']."<br>";
//            echo $row['video']."<br>";
//            echo $row['description']."<br>";
//            echo $row['website']."<br>";
//            echo $row['facebookpage']."<br>";
//            echo $row['twitterpage']."<br>";
//            echo $row['logo']."<br>";
//            echo $row['pininterest']."<br>";
//            echo $row['googleplus']."<br>";
//            echo $row['instagram']."<br>";
//            echo $row['blog']."<br>";
//            $this->brand_model->createbycsv($row['name'],$row['pricerange'],$row['video'],$row['description'],$row['website'],$row['facebookpage'],$row['twitterpage'],$row['logo'],$row['pininterest'],$row['googleplus'],$row['instagram'],$row['blog'])
//        }
        foreach ($file as $row)
        {
            $data  = array(
                'name' => $row['name'],
                'website' => $row['website'],
                'facebookpage' => $row['facebookpage'],
                'twitterpage' => $row['twitterpage'],
                'pininterest' => $row['pininterest'],
                'googleplus' => $row['googleplus'],
                'instagram' => $row['instagram'],
                'blog' => $row['blog'],
                'logo' => $row['logo'],
                'description' => $row['description'],
            );

            $query=$this->db->insert( 'brand', $data );
        }
//		$id = $this->db->insert_id();
////		if($query)
////		{
////			$this->savelog($id,'Event Created');
////		}
		if(!$query)
			return  0;
		else
			return  1;
	}
    public function createsubcategory($brandid,$categoryid)
	{
		$data  = array(
			'brandid' => $brandid,
			'categoryid' => $categoryid
		);
       // print_r($data);
        $this->db->where($data);
      
        $q = $this->db->get('brandcategory');
        if($q->num_rows()==0)
        { 
          $query=$this->db->insert( 'brandcategory', $data );
        }
        else{
            
        }
        
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
    public function getcategory()
	{
		$query="SELECT `id`,`name`,`parent` FROM  `category` ";
		$query=$this->db->query($query)->result();
		return $query;

	}
    public function getbrandcategory($id)
	{
		$query="SELECT  `brandcategory`.`id` ,  `brandcategory`.`brandid` ,  `brandcategory`.`categoryid` ,  `category`.`name` as `categoryname`, `category`.`parent`
FROM  `brandcategory` 
LEFT OUTER JOIN  `category` ON  `category`.`id` =  `brandcategory`.`categoryid`  WHERE `brandcategory`.`brandid`='$id'";
		$query=$this->db->query($query)->result();
		return $query;

	}
    public function createlocation($name,$cityid)
	{
		$data  = array(
			'name' => $name,
            'cityid'=> $cityid
		);
		$query=$this->db->insert( 'location', $data );
//		$id = $this->db->insert_id();
//		if($query)
//		{
//			$this->savelog($id,'Event Created');
//		}
		if(!$query)
			return  0;
		else
			return  1;
	}
	function viewbrand()
	{
		$query="SELECT `brand`.`id`, `brand`.`name`, `brand`.`pricerange`,`pricerange`.`range` AS `rangename`, `brand`.`video`, `brand`.`description`, `brand`.`facebookpage`, `brand`.`website`, `brand`.`twitterpage`, `brand`.`logo` FROM `brand` LEFT OUTER JOIN `pricerange` ON `pricerange`.`id`=`brand`.`pricerange`";
		$query=$this->db->query($query)->result();
		return $query;
	}
	function getbrandname()
	{
        $brandid=$this->session->userdata('brand');
		$query="SELECT `brand`.`id`, `brand`.`name` FROM `brand` WHERE `brand`.`id`='$brandid'";
		$query=$this->db->query($query)->result();
		return $query;
	}
	function viewonebrand($id)
	{
		$query="SELECT `brand`.`id`, `brand`.`name`, `brand`.`pricerange`,`pricerange`.`range` AS `rangename`, `brand`.`video`, `brand`.`description`, `brand`.`facebookpage`, `brand`.`website`, `brand`.`twitterpage`, `brand`.`logo` FROM `brand` LEFT OUTER JOIN `pricerange` ON `pricerange`.`id`=`brand`.`pricerange` WHERE `brand`.`id`='$id'";
		$query=$this->db->query($query)->row();
		return $query;
	}
	function viewonecitylocations($id)
	{
		$query="SELECT `location`.`id`,`location`.`name`,`location`.`cityid`, `city`.`name` AS `cityname` FROM `location`
        INNER JOIN `city` ON `city`.`id` = `location`.`cityid` WHERE `location`.`cityid`='$id'";
		$query=$this->db->query($query)->result();
		return $query;
	}
	public function beforeedit( $id )
	{
		$this->db->where( 'id', $id );
		$query['brand']=$this->db->get( 'brand' )->row();
//		$query['eventcategory']=array();
//		$eventcategory=$this->db->query("SELECT `category` FROM `eventcategory` WHERE `eventcategory`.`event`='$id'")->result();
//		foreach($eventcategory as $cat)
//		{
//			$query['eventcategory'][]=$cat->category;
//		}
//		$query['eventtopic']=array();
//		$eventtopic=$this->db->query("SELECT `topic` FROM `eventtopic` WHERE `eventtopic`.`event`='$id'")->result();
//		foreach($eventtopic as $top)
//		{
//			$query['eventtopic'][]=$top->topic;
//		}
		return $query;
	}
	public function beforeeditlocation( $id )
	{
		$this->db->where( 'id', $id );
		$query['location']=$this->db->get( 'location' )->row();
//		$query['eventcategory']=array();
//		$eventcategory=$this->db->query("SELECT `category` FROM `eventcategory` WHERE `eventcategory`.`event`='$id'")->result();
//		foreach($eventcategory as $cat)
//		{
//			$query['eventcategory'][]=$cat->category;
//		}
//		$query['eventtopic']=array();
//		$eventtopic=$this->db->query("SELECT `topic` FROM `eventtopic` WHERE `eventtopic`.`event`='$id'")->result();
//		foreach($eventtopic as $top)
//		{
//			$query['eventtopic'][]=$top->topic;
//		}
		return $query;
	}
	
	public function edit($id,$name,$website,$facebook,$twitter,$pininterest,$googleplus,$instagram,$blog,$description,$logo)
	{
		$data  = array(
			'name' => $name,
			'website' => $website,
			'facebookpage' => $facebook,
			'twitterpage' => $twitter,
			'pininterest' => $pininterest,
			'googleplus' => $googleplus,
			'instagram' => $instagram,
			'blog' => $blog,
			'logo' => $logo,
			'description' => $description,
		);
		
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'brand', $data );
		if($query)
		{
			$this->savelog($id,'Brand Edited');
		}
		return 1;
	}
    public function editbrand($id,$name,$website,$facebook,$twitter,$pininterest,$googleplus,$instagram,$blog,$description,$logo)
	{
		$data  = array(
			'name' => $name,
			'website' => $website,
			'facebookpage' => $facebook,
			'twitterpage' => $twitter,
			'pininterest' => $pininterest,
			'googleplus' => $googleplus,
			'instagram' => $instagram,
			'blog' => $blog,
			'logo' => $logo,
			'description' => $description,
		);
		
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'brand', $data );
//		if($query)
//		{
//			$this->savelog($id,'Brand Edited');
//		}
		return 1;
	}
	public function editlocation($id,$cityid,$name)
	{
		$data  = array(
			'cityid' => $cityid,
			'name' => $name
		);
		
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'location', $data );
		if($query)
		{
			$this->savelog($id,'Location Edited');
		}
		return 1;
	}
     public function getbranddropdown()
	{
		$query=$this->db->query("SELECT * FROM `brand`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
	function deletebrand($id)
	{
		$query=$this->db->query("DELETE FROM `brand` WHERE `id`='$id'");
	}
	function deletesubcategory($id)
	{
		$query=$this->db->query("DELETE FROM `brandcategory` WHERE `brandid`='$id'");
	}
	function deletelocation($id)
	{
		$query=$this->db->query("DELETE FROM `location` WHERE `id`='$id'");
	}
	
	
	function savelog($id,$action)
	{
		$fromuser = $this->session->userdata('id');
		$data2  = array(
			'user' => $id,
			'event' => $id,
			'description' => $action,
		);
		$query2=$this->db->insert( 'eventlog', $data2 );
	}
    //-----------------Changes made avinash
    function filterbrandbycategoryid($id)
    {
        $query=$this->db->query("SELECT `brand`.`id`, `brand`.`name`, `brand`.`pricerange`,`pricerange`.`range`, `brand`.`video`,`category`.`name` FROM `brand`
LEFT OUTER JOIN `brandcategory`ON `brandcategory`.`brandid`=`brand`.`id`
LEFT OUTER JOIN `category`ON `category`.`id`=`brandcategory`.`categoryid`
LEFT OUTER JOIN `pricerange`ON `brand`.`pricerange`=`pricerange`.`id`
WHERE `brandcategory`.`categoryid`='$id'")->result();
         return $query;
    }
    
   
	public function getlogobybrandid($id)
	{
		$query=$this->db->query("SELECT `logo` FROM `brand` WHERE `id`='$id'")->row();
		
		
		return $query;
	}
    
    //------------------------
    /*frontend apis*/
    
    function getallbrands()
	{
		$query=$this->db->query("SELECT `brand`.`id`, `brand`.`name`, `brand`.`pricerange`,`pricerange`.`range` AS `rangename`, `brand`.`video`, `brand`.`description`, `brand`.`facebookpage`, `brand`.`website`, `brand`.`twitterpage`, `brand`.`logo` FROM `brand` LEFT OUTER JOIN `pricerange` ON `pricerange`.`id`=`brand`.`pricerange`")->result();
		return $query;
	}
     
     public function getallbrandsforusers()
	{
		$query="SELECT `brand`.`id`, `brand`.`name`, `brand`.`pricerange`,`pricerange`.`range` AS `rangename`, `brand`.`video`, `brand`.`description`, `brand`.`facebookpage`, `brand`.`website`, `brand`.`twitterpage`, `brand`.`logo` FROM `brand` LEFT OUTER JOIN `pricerange` ON `pricerange`.`id`=`brand`.`pricerange` ";
		$brand=$this->db->query($query)->result();
         if ($brand== NULL) {
                return "No brand";
            }
        else
        return $brand;
	}
    function getallbrandswithoffers()
	{
		$query=$this->db->query("SELECT `brand`.`id`, `brand`.`name`, `brand`.`pricerange`,`pricerange`.`range` AS `rangename`, `brand`.`video`, `brand`.`description`, `brand`.`facebookpage`, `brand`.`website`, `brand`.`twitterpage`, `brand`.`logo`,`offers`.`id` AS `offerid`, `offers`.`header`, `offers`.`description` AS `offerdescription`, `offers`.`from`, `offers`.`to`, `offers`.`brandid`, `offers`.`storeid`, `offers`.`like` 
FROM `offers`
LEFT OUTER JOIN `brand` ON `brand`.`id`=`offers`.`brandid`
LEFT OUTER JOIN `pricerange` ON `pricerange`.`id`=`brand`.`pricerange`")->result();
		return $query;
	}
    
    function getallbrandswithcategories()
	{
		$query=$this->db->query("SELECT `brand`.`id`, `brand`.`name`, `brand`.`pricerange`,`pricerange`.`range` AS `rangename`, `brand`.`video`, `brand`.`description`, `brand`.`facebookpage`, `brand`.`website`, `brand`.`twitterpage`, `brand`.`logo`, `brandcategory`.`brandid`, `brandcategory`.`categoryid`,`category`.`name`,`tab2`.`name` as `parent`
FROM `brandcategory`
LEFT OUTER JOIN `brand` ON `brand`.`id`=`brandcategory`.`brandid`
LEFT OUTER JOIN `category` ON `category`.`id`=`brandcategory`.`categoryid`
LEFT OUTER JOIN `pricerange` ON `pricerange`.`id`=`brand`.`pricerange`
LEFT JOIN `category` as `tab2` ON `tab2`.`id`=`category`.`parent`")->result();
		return $query;
	}
    function getbrandsearch($brandname)
	{
		$query=$this->db->query("SELECT `store`.`id`,`store`. `name`,`store`. `city`,`city`.`name` as `cityname`, `store`.`brand` AS `brandid`,`brand`.`name` as `brandname`,`store`. `format`,`store`. `mall`,`mall`.`name` as `mallname`, `store`.`floor`,`floor`.`floorno` AS `floorname`,`mall`. `address`,`store`.`address` AS `storeaddress`, `mall`.`location`,`location`.`name` AS `locationname`,`mall`. `latitude`, `mall`.`longitude`,`store`.`contactno`, `store`.`email`,`store`.`description`, `brand`.`website`, `brand`.`facebookpage`, `brand`.`twitterpage`,`store`.`workinghoursto`,`store`.`workinghoursfrom`,`shopclosed`.`day` AS `shopclosedday` FROM `store`
        LEFT OUTER JOIN `city` ON `store`. `city`=`city`.`id`
        LEFT OUTER JOIN `mall` ON `store`. `mall`=`mall`.`id`
        LEFT OUTER JOIN `location` ON `mall`. `location`=`location`.`id`
        LEFT OUTER JOIN `floor` ON `store`. `floor`=`floor`.`id`
        LEFT OUTER JOIN `brand` ON `store`. `brand`=`brand`.`id` 
        INNER JOIN `shopclosed` ON `store`. `shopclosedon`=`shopclosed`.`id`
        WHERE `brand`.`name` LIKE '%$brandname%'")->result();
		return $query;
	}
    
    //like api query
    
     public function addlike($userid,$brandid,$like)
	{
		$data  = array(
			'user' => $userid,
			'brand' => $brandid,
			'like' => $like
		);
        $querydelete=$this->db->query("DELETE FROM `brandlike` WHERE `user`='$userid' AND `brand`='$brandid'");
		$query=$this->db->insert( 'brandlike', $data );
		$queryselect=$this->db->query("SELECT `like` FROM `brandlike` WHERE `user`='$userid' AND `brand`='$brandid'")->row();
//        $sessiondata=$this->session->set_userdata($newdata);
		if(!$query)
			return  0;
		else
			return  $queryselect->like;
	}
    
    function exportbrandstocsv()
	{
		$this->load->dbutil();
		$query=$this->db->query("SELECT `brand`.`id`, `brand`.`name`, `brand`.`pricerange`,`pricerange`.`range` AS `rangename`, `brand`.`video`, `brand`.`description`, `brand`.`facebookpage`, `brand`.`website`, `brand`.`twitterpage`, `brand`.`logo` FROM `brand` LEFT OUTER JOIN `pricerange` ON `pricerange`.`id`=`brand`.`pricerange`");
//print_r($query);
       $content= $this->dbutil->csv_from_result($query);
//        $timestamp=new DateTime();
//        $timestamp=$timestamp->format('Y-m-d_H.i.s');
        //$data = 'Some file data';

        if ( ! write_file('./uploads/brandcsvdownloaded.csv', $content))
        {
             echo 'Unable to write the File';
        }
        else
        {
            redirect(base_url('uploads/brandcsvdownloaded.csv'), 'refresh');
             echo 'File Downloaded Successfully!!!';
        }
	}
}
?>