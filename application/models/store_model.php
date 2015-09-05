<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Store_model extends CI_Model
{
    public function createstoreinmall($name,$city,$brand,$mall,$floor,$contactno,$email,$format,$offer,$shopclosedon,$workinghoursfrom,$workinghoursto,$description)
	{
		$data  = array(
			'name' => $name,
			'city' => $city,
			'brand' => $brand,
			'mall' => $mall,
			'floor' => $floor,
			'offer' => $offer,
			'contactno' => $contactno,
			'email' => $email,
			'workinghoursfrom' => $workinghoursfrom,
			'workinghoursto' => $workinghoursto,
			'shopclosedon' => $shopclosedon,
			'description' => $description,
			'format' => $format
		);
		$query=$this->db->insert( 'store', $data );
		
		return  1;
	}
	
	public function getallstoresdiscount($city)
	{
	
		if($city==0)
		{
			$city="";
		}else{
			$city=" WHERE `store`.`city`='$city'";
		}
	
		$query=$this->db->query("SELECT`store`.`id`,`store`. `name`,`store`. `city`,`city`.`name` as `cityname`, `store`.`brand` AS `brandid`,`store`. `format`,`store`. `mall`,`mall`.`name` as `mallname`, `store`.`floor`,`floor`.`floorno` AS `floorname`,`mall`. `address`,`store`.`address` AS `storeaddress`, `mall`.`location`,`location`.`name` AS `locationname`,`mall`. `latitude`, `mall`.`longitude`,`store`.`contactno`, `store`.`email`,`store`.`description`,`offers`.`id` AS `offerid`, `offers`.`header`, `offers`.`description` AS `offerdescription`, `offers`.`from`, `offers`.`to`, `offers`.`brandid`, `offers`.`storeid`, `offers`.`like`,`imagegallery`.`image`,AVG(`storerating`.`rating`) as `rating`
FROM `storeoffers`
LEFT OUTER JOIN `store` ON `store`. `id`=`storeoffers`.`storeid`
LEFT OUTER JOIN `offers` ON `offers`. `id`=`storeoffers`.`offerid`
LEFT OUTER JOIN `city` ON `store`. `city`=`city`.`id`
LEFT OUTER JOIN `mall` ON `store`. `mall`=`mall`.`id`
LEFT OUTER JOIN `location` ON `mall`. `location`=`location`.`id`
LEFT OUTER JOIN `floor` ON `store`. `floor`=`floor`.`id`
LEFT OUTER JOIN `storeimagegallery` ON `store`.`id`=`storeimagegallery`.`storeid`
LEFT OUTER JOIN `imagegallery` ON `storeimagegallery`.`imagegalleryid`=`imagegallery`.`id`
LEFT OUTER JOIN `storerating` ON `store`.`id`=`storerating`.`store`
".$city."
GROUP BY `store`.`id`")->result();
	return $query;
	}
    
	public function createbycsv($file)
	{
        foreach ($file as $row)
        {
            $city=$row['city'];
            $cityquery=$this->db->query("SELECT * FROM `city` where `name`LIKE '$city'")->row();
            if(empty($cityquery))
            {
                $this->db->query("INSERT INTO `city`(`name`) VALUES ('$city')");
                $cityid=$this->db->insert_id();
            }
            else
            {
                $cityid=$cityquery->id;
            }
            
            $floor=$row['floor'];
            $floorquery=$this->db->query("SELECT * FROM `floor` where `floorno`LIKE '$floor'")->row();
            if(empty($floorquery))
            {
                $this->db->query("INSERT INTO `floor`(`floorno`) VALUES ('$floor')");
                $floorid=$this->db->insert_id();
            }
            else
            {
                $floorid=$floorquery->id;
            }
            
            $shopclosedon=$row['shopclosedon'];
            
            $shopclosedonquery=$this->db->query("SELECT * FROM `shopclosed` where `day`LIKE '$shopclosedon'")->row();
//            print_r($shopclosedonquery);
            if(empty($shopclosedonquery))
            {
                $this->db->query("INSERT INTO `shopclosed`(`day`) VALUES ('$shopclosedon')");
                $shopclosedonid=$this->db->insert_id();
            }
            else
            {
                $shopclosedonid=$shopclosedonquery->id;
            }
//            echo $shopclosedonid;
            
//            $brand=$row['brand'];
//            $brandquery=$this->db->query("SELECT * FROM `brand` where `name` LIKE '$brand'")->row();
//            if(empty($brandquery))
//            {
//                $this->db->query("INSERT INTO `brand`(`name`) VALUES ('$brand')");
//                $brandid=$this->db->insert_id();
//            }
//            else
//            {
//                $brandid=$brandquery->id;
//            }
//            
//            $mall=$row['mall'];
//            $mallquery=$this->db->query("SELECT * FROM `mall` where `name` LIKE '$mall'")->row();
//            if(empty($mallquery))
//            {
//                $this->db->query("INSERT INTO `mall`(`name`) VALUES ('$mall')");
//                $mallid=$this->db->insert_id();
//            }
//            else
//            {
//                $mallid=$mallquery->id;
//            }
//            
            $data  = array(
                'name' => $row['name'],
                'contactno' => $row['contactno'],
                'email' => $row['email'],
                'workinghoursfrom' => $row['workinghoursfrom'],
                'workinghoursto' => $row['workinghoursto'],
                'description' => $row['description'],
                'format' => 1,
                'floor' => $floorid,
                'shopclosedon' => $shopclosedonid,
                'brand' => $brand=$row['brand'],
                'mall' => $mall=$row['mall'],
                'city' =>$cityid
            );

            $query=$this->db->insert( 'store', $data );
        }
		if(!$query)
			return  0;
		else
			return  1;
	}
    
        function isshopping($user)	
        {
        	$query=$this->db->query("SELECT * FROM `shoppingbag` WHERE `user`='$user'");
        	if($query->num_rows == 0)
        	{
        	return 0;
        	}else{
        	return 1;
        	}
        
        }

	function getstorebycategories($user)
	{
		$categories=$this->db->query("SELECT `id`, `user`, `category`, `timestamp` FROM `shoppingbag` WHERE `user`='$user'")->result();
		//return $categories;
	
		$catstr=$categories[0]->category;
		foreach($categories as $category)
		{
			$catstr.=",$category->category";
		}
		//return $catstr;
		$query=$this->db->query("SELECT `store`.`id`AS `storeid`,`store`. `name`,`store`. `city`,`city`.`name` as `cityname`, `store`.`brand` AS `brandid`,`brand`.`name` AS `brandname`,`brand`.`logo` as `brandlogo`,`store`. `format`,`store`. `mall`,`mall`.`name` as `mallname`, `store`.`floor`,`floor`.`floorno` AS `floorname`,`mall`. `address`,`store`.`address` AS `storeaddress`, `mall`.`location`,`location`.`name` AS `locationname`,`mall`. `latitude`, `mall`.`longitude`,`store`.`contactno`, `store`.`email`,`store`.`description`,`storecategory`. `storeid`, `storecategory`.`categoryid`,`category`.`name`,`tab2`.`name` as `parent`,`store`.`workinghoursto`,`store`.`workinghoursfrom`,`shopclosed`.`day` AS `shopclosedday`,AVG(`storerating`.`rating`) as `rating`
FROM `storecategory`
LEFT OUTER JOIN `store` ON `store`. `id`=`storecategory`.`storeid`
LEFT OUTER JOIN `storerating` ON `storerating`.`store`=`store`.`id`
LEFT OUTER JOIN `brand` ON `store`. `brand`=`brand`.`id`
LEFT OUTER JOIN `category` ON `category`. `id`=`storecategory`.`categoryid`
LEFT OUTER JOIN `city` ON `store`. `city`=`city`.`id`
LEFT OUTER JOIN `mall` ON `store`. `mall`=`mall`.`id`
LEFT OUTER JOIN `location` ON `mall`. `location`=`location`.`id`
LEFT OUTER JOIN `floor` ON `store`. `floor`=`floor`.`id`
INNER JOIN `shopclosed` ON `store`. `shopclosedon`=`shopclosed`.`id`
LEFT JOIN `category` as `tab2` ON `tab2`.`id`=`category`.`parent`
WHERE `storecategory`.`categoryid` IN ('$catstr')
GROUP BY `store`.`id`")->result();
		return $query;
	}



	 function getcatarraystore($catarray,$city)
	{
		if($city==0)
		{
			$city="";
		}else{
			$city=" AND `store`.`city`=$city";
		}
		$query=$this->db->query("SELECT `store`.`id`AS `storeid`,`store`. `name`,`store`. `city`,`city`.`name` as `cityname`, `store`.`brand` AS `brandid`,`brand`.`name` AS `brandname`,`brand`.`logo` as `brandlogo`,`store`. `format`,`store`. `mall`,`mall`.`name` as `mallname`, `store`.`floor`,`floor`.`floorno` AS `floorname`,`mall`. `address`,`store`.`address` AS `storeaddress`, `mall`.`location`,`location`.`name` AS `locationname`,`mall`. `latitude`, `mall`.`longitude`,`store`.`contactno`, `store`.`email`,`store`.`description`,`storecategory`. `storeid`, `storecategory`.`categoryid`,`category`.`name`,`tab2`.`name` as `parent`,`store`.`workinghoursto`,`store`.`workinghoursfrom`,`shopclosed`.`day` AS `shopclosedday`,AVG(`storerating`.`rating`) as `rating`
FROM `storecategory`
LEFT OUTER JOIN `store` ON `store`. `id`=`storecategory`.`storeid`
LEFT OUTER JOIN `storerating` ON `storerating`.`store`=`store`.`id`
LEFT OUTER JOIN `brand` ON `store`. `brand`=`brand`.`id`
LEFT OUTER JOIN `category` ON `category`. `id`=`storecategory`.`categoryid`
LEFT OUTER JOIN `city` ON `store`. `city`=`city`.`id`
LEFT OUTER JOIN `mall` ON `store`. `mall`=`mall`.`id`
LEFT OUTER JOIN `location` ON `mall`. `location`=`location`.`id`
LEFT OUTER JOIN `floor` ON `store`. `floor`=`floor`.`id`
INNER JOIN `shopclosed` ON `store`. `shopclosedon`=`shopclosed`.`id`
LEFT JOIN `category` as `tab2` ON `tab2`.`id`=`category`.`parent`
WHERE `storecategory`.`categoryid` IN ('$catarray')".$city."
GROUP BY `store`.`id`")->result();
		return $query;
	}
    
        public function getcatarraystoreoffer($catarray)
	{
		
		$query=$this->db->query("SELECT`store`.`id`,`store`. `name`,`store`. `city`,`city`.`name` as `cityname`, `store`.`brand` AS `brandid`,`store`. `format`,`store`. `mall`,`mall`.`name` as `mallname`, `store`.`floor`,`floor`.`floorno` AS `floorname`,`mall`. `address`,`store`.`address` AS `storeaddress`, `mall`.`location`,`location`.`name` AS `locationname`,`mall`. `latitude`, `mall`.`longitude`,`store`.`contactno`, `store`.`email`,`store`.`description`,`offers`.`id` AS `offerid`, `offers`.`header`, `offers`.`description` AS `offerdescription`, `offers`.`from`, `offers`.`to`, `offers`.`brandid`, `offers`.`storeid`, `offers`.`like`,`imagegallery`.`image`,AVG(`storerating`.`rating`) as `rating`
FROM `storeoffers`
LEFT OUTER JOIN `store` ON `store`. `id`=`storeoffers`.`storeid`
LEFT OUTER JOIN `offers` ON `offers`. `id`=`storeoffers`.`offerid`
LEFT OUTER JOIN `city` ON `store`. `city`=`city`.`id`
LEFT OUTER JOIN `mall` ON `store`. `mall`=`mall`.`id`
LEFT OUTER JOIN `location` ON `mall`. `location`=`location`.`id`
LEFT OUTER JOIN `floor` ON `store`. `floor`=`floor`.`id`
LEFT OUTER JOIN `storeimagegallery` ON `store`.`id`=`storeimagegallery`.`storeid`
LEFT OUTER JOIN `imagegallery` ON `storeimagegallery`.`imagegalleryid`=`imagegallery`.`id`
LEFT OUTER JOIN `storerating` ON `store`.`id`=`storerating`.`store`
LEFT OUTER JOIN `storecategory` ON `storecategory`.`storeid`=`store`.`id`
WHERE `storecategory`.`categoryid` IN ('$catarray')
GROUP BY `store`.`id`")->result();
		return $query;
	}
        

	public function createindividualstorebycsv($file)
	{
        foreach ($file as $row)
        {
            $city=$row['city'];
            $cityquery=$this->db->query("SELECT * FROM `city` where `name`LIKE '$city'")->row();
            if(empty($cityquery))
            {
                $this->db->query("INSERT INTO `city`(`name`) VALUES ('$city')");
                $cityid=$this->db->insert_id();
            }
            else
            {
                $cityid=$cityquery->id;
            }
            
//            $brand=$row['brand'];
//            $brandquery=$this->db->query("SELECT * FROM `brand` where `name` LIKE '$brand'")->row();
//            if(empty($brandquery))
//            {
//                $this->db->query("INSERT INTO `brand`(`name`) VALUES ('$brand')");
//                $brandid=$this->db->insert_id();
//            }
//            else
//            {
//                $brandid=$brandquery->id;
//            }
            
            $location=$row['location'];
            $locationquery=$this->db->query("SELECT * FROM `location` where `name`LIKE '$location'")->row();
            if(empty($locationquery))
            {
                $this->db->query("INSERT INTO `location`(`cityid`,`name`) VALUES ('$cityid','$location')");
                $locationid=$this->db->insert_id();
            }
            else
            {
                $locationid=$locationquery->id;
            }
            
            $shopclosedon=$row['shopclosedon'];
            
            $shopclosedonquery=$this->db->query("SELECT * FROM `shopclosed` where `day`LIKE '$shopclosedon'")->row();
//            print_r($shopclosedonquery);
            if(empty($shopclosedonquery))
            {
                $this->db->query("INSERT INTO `shopclosed`(`day`) VALUES ('$shopclosedon')");
                $shopclosedonid=$this->db->insert_id();
            }
            else
            {
                $shopclosedonid=$shopclosedonquery->id;
            }
            
            $data  = array(
                'name' => $row['name'],
                'city' =>$cityid,
                'brand' => $brand=$row['brand'],
                'address' => $row['address'],
                'description' => $row['description'],
                'location' => $locationid,
                'latitude' => $row['latitude'],
                'longitude' => $row['longitude'],
                'contactno' => $row['contactno'],
                'workinghoursfrom' => $row['workinghoursfrom'],
                'workinghoursto' => $row['workinghoursto'],
                'email' => $row['email'],
                'format' => 2,
                'shopclosedon' => $shopclosedonid
            );

            $query=$this->db->insert( 'store', $data );
        }
		if(!$query)
			return  0;
		else
			return  1;
	}
    public function editstoreinmall($id,$name,$city,$brand,$mall,$floor,$contactno,$email,$format,$offer,$shopclosedon,$workinghoursfrom,$workinghoursto,$description)
	{
		$data  = array(
			'name' => $name,
			'city' => $city,
			'brand' => $brand,
			'mall' => $mall,
			'floor' => $floor,
			'offer' => $offer,
			'description' => $description,
			'contactno' => $contactno,
			'email' => $email,
			'workinghoursfrom' => $workinghoursfrom,
			'workinghoursto' => $workinghoursto,
			'shopclosedon' => $shopclosedon,
			'format' => $format
		);
        
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'store', $data );
		
		return  1;
	}
    public function createindividualstore($name,$city,$brand,$address,$location,$latitude,$longitude,$contactno,$email,$format,$offer,$workinghoursfrom,$workinghoursto,$shopclosedon,$description)
	{
        //$branddetails=$this->brand_model->viewonebrand($brand);
            //print_r($branddetails);
       // echo $branddetails->id;
		$data  = array(
			'name' => $name,
			'city' => $city,
			'brand' => $brand,
			'offer' => $offer,
			'workinghoursfrom' => $workinghoursfrom,
			'workinghoursto' => $workinghoursto,
			'shopclosedon' => $shopclosedon,
			'address' => $address,
			'description' => $description,
			'location' => $location,
			'latitude' => $latitude,
			'longitude' => $longitude,
			'contactno' => $contactno,
			'email' => $email,
			'format' => $format
		);
		$query=$this->db->insert( 'store', $data );
		
		return  1;
	}
    public function editindividualstore($id,$name,$city,$brand,$address,$location,$latitude,$longitude,$contactno,$email,$format,$offer,$workinghoursfrom,$workinghoursto,$shopclosedon,$description)
	{
		$data  = array(
			'name' => $name,
			'city' => $city,
			'brand' => $brand,
			'offer' => $offer,
			'workinghoursfrom' => $workinghoursfrom,
			'workinghoursto' => $workinghoursto,
			'shopclosedon' => $shopclosedon,
			'address' => $address,
			'description' => $description,
			'location' => $location,
			'latitude' => $latitude,
			'longitude' => $longitude,
			'contactno' => $contactno,
			'email' => $email,
			'format' => $format
		);
        
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'store', $data );
		
		return  1;
	}
	function viewstoreinmall()
	{
		$query=$this->db->query("SELECT `store`.`id`,`store`. `name`,`store`. `city`,`city`.`name` as `cityname`, `store`.`brand` AS `brandid`,`brand`.`name` as `brandname`,`store`. `format`,`store`. `mall`,`mall`.`name` as `mallname`, `store`.`floor`,`floor`.`floorno` AS `floorname`,`mall`. `address`, `mall`.`location`,`location`.`name` AS `locationname`,`mall`. `latitude`, `mall`.`longitude`,`store`.`contactno`, `store`.`email`,`store`.`description`, `brand`.`website`, `brand`.`facebookpage`, `brand`.`twitterpage` FROM `store`
        LEFT OUTER JOIN `city` ON `store`. `city`=`city`.`id`
        LEFT OUTER JOIN `mall` ON `store`. `mall`=`mall`.`id`
        LEFT OUTER JOIN `location` ON `mall`. `location`=`location`.`id`
        LEFT OUTER JOIN `floor` ON `store`. `floor`=`floor`.`id`
        LEFT OUTER JOIN `brand` ON `store`. `brand`=`brand`.`id` WHERE `store`. `format`='1'")->result();
		return $query;
	}
	function viewstoreinmallforbrand()
	{
        $brandid=$this->session->userdata('brand');
		$query=$this->db->query("SELECT `store`.`id`,`store`. `name`,`store`. `city`,`city`.`name` as `cityname`, `store`.`brand` AS `brandid`,`brand`.`name` as `brandname`,`store`. `format`,`store`. `mall`,`mall`.`name` as `mallname`, `store`.`floor`,`floor`.`floorno` AS `floorname`,`mall`. `address`, `mall`.`location`,`location`.`name` AS `locationname`,`mall`. `latitude`, `mall`.`longitude`,`store`.`contactno`, `store`.`email`,`store`.`description`, `brand`.`website`, `brand`.`facebookpage`, `brand`.`twitterpage` FROM `store`
        LEFT OUTER JOIN `city` ON `store`. `city`=`city`.`id`
        LEFT OUTER JOIN `mall` ON `store`. `mall`=`mall`.`id`
        LEFT OUTER JOIN `location` ON `mall`. `location`=`location`.`id`
        LEFT OUTER JOIN `floor` ON `store`. `floor`=`floor`.`id`
        LEFT OUTER JOIN `brand` ON `store`. `brand`=`brand`.`id` WHERE `store`. `format`='1' AND `store`.`brand`='$brandid'")->result();
		return $query;
	}
	function viewindividualstore()
	{
		$query=$this->db->query("SELECT `store`.`id`,`store`. `name`,`store`. `city`,`city`.`name` as `cityname`, `store`.`brand` AS `brandid`,`brand`.`name` as `brandname`,`store`. `format`,`store`. `mall`,`mall`.`name` as `mallname`, `store`.`floor`,`store`. `address`, `store`.`location`,`location`.`name` as `locationname`,`store`. `latitude`, `store`.`longitude`, `store`.`contactno`, `store`.`email`,`store`.`description`, `brand`.`website`, `brand`.`facebookpage`, `brand`.`twitterpage` FROM `store`
        LEFT OUTER JOIN `city` ON `store`. `city`=`city`.`id`
        LEFT OUTER JOIN `mall` ON `store`. `mall`=`mall`.`id`
        LEFT OUTER JOIN `location` ON `store`. `location`=`location`.`id`
        LEFT OUTER JOIN `brand` ON `store`. `brand`=`brand`.`id` WHERE `store`. `format`='2'")->result();
		return $query;
	}
	function viewindividualstoreforbrand()
	{
        $brandid=$this->session->userdata('brand');
//        echo $brandid;
		$query=$this->db->query("SELECT `store`.`id`,`store`. `name`,`store`. `city`,`city`.`name` as `cityname`, `store`.`brand` AS `brandid`,`brand`.`name` as `brandname`,`store`. `format`,`store`. `mall`,`mall`.`name` as `mallname`, `store`.`floor`,`store`. `address`, `store`.`location`,`location`.`name` as `locationname`,`store`. `latitude`, `store`.`longitude`, `store`.`contactno`, `store`.`email`,`store`.`description`, `brand`.`website`, `brand`.`facebookpage`, `brand`.`twitterpage` FROM `store`
        LEFT OUTER JOIN `city` ON `store`. `city`=`city`.`id`
        LEFT OUTER JOIN `mall` ON `store`. `mall`=`mall`.`id`
        LEFT OUTER JOIN `location` ON `store`. `location`=`location`.`id`
        LEFT OUTER JOIN `brand` ON `store`. `brand`=`brand`.`id` WHERE `store`. `format`='2' AND `store`.`brand`='$brandid'")->result();
		return $query;
	}
	function getstoredetails($storeid)
	{
//        $brandid=$this->session->userdata('brand');
//        echo $brandid;
		$query=$this->db->query("SELECT `id`, `name`, `format` FROM `store` WHERE `id`='$storeid'")->row();
		return $query;
	}
//	public function beforeeditoffer( $id )
//	{
//		$this->db->where( 'id', $id );
//		$query=$this->db->get( 'offers' )->row();
//		return $query;
//	}
	public function beforeeditstoreinmall( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'store' )->row();
		return $query;
	}
	public function beforeeditindividualstore( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'store' )->row();
		return $query;
	}
    
    public function createsubcategory($storeid,$categoryid)
	{
		$data  = array(
			'storeid' => $storeid,
			'categoryid' => $categoryid
		);
       // print_r($data);
        $this->db->where($data);
      
        $q = $this->db->get('storecategory');
      // echo"</br>";
//         echo "num rows".$q->num_rows();
//        echo"</br>";
        if($q->num_rows()==0)
        { 
          $query=$this->db->insert( 'storecategory', $data );
        }
        else{
            //echo "not inserted";
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
       
     public function getshopclosedondropdown()
	{
		$query=$this->db->query("SELECT * FROM `shopclosed`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->day;
		}
		
		return $return;
	}
       
     public function getstore($id)
	{
		$query="SELECT `store`.`id`,`store`.`name`,`store`.`address` as `storeaddress`,`location`.`name` as `locationname`,`mall`.`name` AS `mallname`,`mall`.`address` AS `malladdress`,`city`.`name` AS `cityname` FROM `store` 
        LEFT OUTER JOIN `mall` ON `mall`.`id`=`store`.`mall` 
        LEFT OUTER JOIN `location` ON `location`.`id`=`store`.`location` 
        LEFT OUTER JOIN `city` ON `city`.`id`=`store`.`city` 
        WHERE `store`.`brand`='$id' ";
//		$query="SELECT `store`.`id`,`store`.`name`,`mall`.`name` AS `mallname`,`location`.`name` AS `locationname` FROM `store` LEFT OUTER JOIN `mall` ON `mall`.`id`=`store`.`mall`
//        LEFT OUTER JOIN `location` ON `location`.`id`=`store`.`location`  WHERE `brand`=".$id;
		
//    $query="SELECT `id`,`subjectname` FROM `subject` where `courseid`=".$courseid;
	  
	  
		$store=$this->db->query($query)->result();
         if ($store== NULL) {
                return "No Store";
            }
        else
        return $store;
	}
     public function getstorebybrand($id)
	{
		$query="SELECT `id`,`name` FROM `store`  WHERE `brand`=".$id;
         
		
//    $query="SELECT `id`,`subjectname` FROM `subject` where `courseid`=".$courseid;
	  
	  
		$store=$this->db->query($query)->result();
         if ($store== NULL) {
                return "No Store";
            }
        else
        return $store;
	}
    
    public function getstorebybrandfordropdown ($id)
    {
        $return=array();
        $query=$this->db->query("SELECT `store`.`id`,`store`.`name` as `store`,`store`.`address` as `storeaddress`,`location`.`name` as `location`,`mall`.`name` AS `mallname`,`mall`.`address` AS `malladdress`,`city`.`name` AS `cityname` FROM `store` 
        LEFT OUTER JOIN `mall` ON `mall`.`id`=`store`.`mall` 
        LEFT OUTER JOIN `location` ON `location`.`id`=`store`.`location` 
        LEFT OUTER JOIN `city` ON `city`.`id`=`store`.`city` 
        WHERE `store`.`brand`='$id'  ");
//        $query=$this->db->query("SELECT `store`.`id`,`store`.`name` as `store`,`store`.`address` as `storeaddress`,`location`.`name` as `location`,`mall`.`name` AS `mallname`,`mall`.`address` AS `malladdress` FROM `store` 
//        LEFT OUTER JOIN `mall` ON `mall`.`id`=`store`.`mall` 
//        LEFT OUTER JOIN `location` ON `location`.`id`=`store`.`location` 
//        WHERE `store`.`brand`='$id' ");
       if($query->num_rows() > 0)
        {
            $query=$query->result();
//            foreach($query as $row)
//            {
//                $return[$row->id]="$row->store $row->location $row->mallname $row->malladdress $row->malladdress";
//            }
           
        }
        //print_r($return);
//        return $return;
        return $query;
    }
    
     public function getstorebyoffers($id)
	{
         $return=array();
		$query=$this->db->query("SELECT `id`,`storeid`,`offerid` FROM `storeoffers`  WHERE `offerid`='$id'");
        if($query->num_rows() > 0)
        {
            $query=$query->result();
            foreach($query as $row)
            {
                $return[]=$row->storeid;
            }
        }
         return $return;
         
		
	}
     public function getstorebygallery($id)
	{
         $return=array();
		$query=$this->db->query("SELECT `id`,`storeid`,`imagegalleryid` FROM `storeimagegallery`  WHERE `imagegalleryid`='$id'");
        if($query->num_rows() > 0)
        {
            $query=$query->result();
            foreach($query as $row)
            {
                $return[]=$row->storeid;
            }
        }
         return $return;
         
	}
     public function getstorebynewin($id)
	{
         $return=array();
		$query=$this->db->query("SELECT `id`,`storeid`,`newinid` FROM `storenewin`  WHERE `newinid`='$id'");
        if($query->num_rows() > 0)
        {
            $query=$query->result();
            foreach($query as $row)
            {
                $return[]=$row->storeid;
            }
        }
         return $return;
         
	}
	
	function createsubcategoryofstore($storeid,$categoryid)
	{
		$query=$this->db->query("INSERT INTO `storecategory`(`storeid`, `categoryid`) VALUES ('$storeid','$categoryid')");
	}
	function deletesubcategoryofstore($id)
	{
		$query=$this->db->query("DELETE FROM `storecategory` WHERE `storeid`='$id'");
	}
//	public function editoffer( $id,$header,$description,$from,$to)
//	{
//		$data = array(
//			'header' => $header,
//			'description' => $description,
//			'from' => $from,
//			'to' => $to
//		);
//		$this->db->where( 'id', $id );
//		$query=$this->db->update( 'offers', $data );
//		
//		return 1;
//	}
	function deletestoreinmall($id)
	{
		$query=$this->db->query("DELETE FROM `store` WHERE `id`='$id'");
		
	}
	function deleteindividualstore($id)
	{
		$query=$this->db->query("DELETE FROM `store` WHERE `id`='$id'");
		
	}
//	public function getofferdropdown()
//	{
//		$query=$this->db->query("SELECT * FROM `offers`  ORDER BY `id` ASC")->result();
//		$return=array(
//		"" => ""
//		);
//		foreach($query as $row)
//		{
//			$return[$row->id]=$row->header;
//		}
//		
//		return $return;
//	}
//	public function getoffer()
//	{
//		$query=$this->db->query("SELECT * FROM `offers`  ORDER BY `header` ASC")->result();
//		
//		
//		return $query;
//	}
    
    public function filterstorebyofferid($id)
	{
		$query=$this->db->query("SELECT * FROM `store` WHERE `offer`='$id'")->result();
		
		
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
    
    public function getstorecategory($id)
	{
		$query="SELECT  `storecategory`.`id` ,  `storecategory`.`storeid` ,  `storecategory`.`categoryid` ,  `category`.`name` as `categoryname`, `category`.`parent`
FROM  `storecategory` 
LEFT OUTER JOIN  `category` ON  `category`.`id` =  `storecategory`.`categoryid`  WHERE `storecategory`.`storeid`='$id'";
		$query=$this->db->query($query)->result();
		return $query;

	}
    
	function getstorename()
	{
        $storeid=$this->session->userdata('store');
		$query="SELECT `store`.`id`, `store`.`name` FROM `store` WHERE `store`.`id`='$storeid'";
		$query=$this->db->query($query)->result();
		return $query;
	}
	
    /*frontend apis*/
    
    function getallstores()
	{
		$query=$this->db->query("SELECT `store`.`id`,`store`. `name`,`store`. `city`,`city`.`name` as `cityname`, `store`.`brand` AS `brandid`,`brand`.`name` as `brandname`,`store`. `format`,`store`. `mall`,`mall`.`name` as `mallname`, `store`.`floor`,`floor`.`floorno` AS `floorname`,`mall`. `address`,`store`.`address` AS `storeaddress`, `mall`.`location`,`location`.`name` AS `locationname`,`mall`. `latitude`, `mall`.`longitude`,`store`.`contactno`, `store`.`email`,`store`.`description`, `brand`.`website`, `brand`.`facebookpage`, `brand`.`twitterpage` FROM `store`
        LEFT OUTER JOIN `city` ON `store`. `city`=`city`.`id`
        LEFT OUTER JOIN `mall` ON `store`. `mall`=`mall`.`id`
        LEFT OUTER JOIN `location` ON `mall`. `location`=`location`.`id`
        LEFT OUTER JOIN `floor` ON `store`. `floor`=`floor`.`id`
        LEFT OUTER JOIN `brand` ON `store`. `brand`=`brand`.`id`")->result();
		return $query;
	}
    
    function getallstoreswithoffers()
	{
		$query=$this->db->query("SELECT`store`.`id`,`store`. `name`,`store`. `city`,`city`.`name` as `cityname`, `store`.`brand` AS `brandid`,`store`. `format`,`store`. `mall`,`mall`.`name` as `mallname`, `store`.`floor`,`floor`.`floorno` AS `floorname`,`mall`. `address`,`store`.`address` AS `storeaddress`, `mall`.`location`,`location`.`name` AS `locationname`,`mall`. `latitude`, `mall`.`longitude`,`store`.`contactno`, `store`.`email`,`store`.`description`,`offers`.`id` AS `offerid`, `offers`.`header`, `offers`.`description` AS `offerdescription`, `offers`.`from`, `offers`.`to`, `offers`.`brandid`, `offers`.`storeid`, `offers`.`like` 
FROM `storeoffers`
LEFT OUTER JOIN `store` ON `store`. `id`=`storeoffers`.`storeid`
LEFT OUTER JOIN `offers` ON `offers`. `id`=`storeoffers`.`offerid`
LEFT OUTER JOIN `city` ON `store`. `city`=`city`.`id`
LEFT OUTER JOIN `mall` ON `store`. `mall`=`mall`.`id`
LEFT OUTER JOIN `location` ON `mall`. `location`=`location`.`id`
LEFT OUTER JOIN `floor` ON `store`. `floor`=`floor`.`id`")->result();
		return $query;
	}
    
    function getallstoreswithcategories()
	{
		$query=$this->db->query("SELECT `store`.`id`,`store`. `name`,`store`. `city`,`city`.`name` as `cityname`, `store`.`brand` AS `brandid`,`store`. `format`,`store`. `mall`,`mall`.`name` as `mallname`, `store`.`floor`,`floor`.`floorno` AS `floorname`,`mall`. `address`,`store`.`address` AS `storeaddress`, `mall`.`location`,`location`.`name` AS `locationname`,`mall`. `latitude`, `mall`.`longitude`,`store`.`contactno`, `store`.`email`,`store`.`description`,`storecategory`. `storeid`, `storecategory`.`categoryid`,`category`.`name`,`tab2`.`name` as `parent`
FROM `storecategory`
LEFT OUTER JOIN `store` ON `store`. `id`=`storecategory`.`storeid`
LEFT OUTER JOIN `category` ON `category`. `id`=`storecategory`.`categoryid`
LEFT OUTER JOIN `city` ON `store`. `city`=`city`.`id`
LEFT OUTER JOIN `mall` ON `store`. `mall`=`mall`.`id`
LEFT OUTER JOIN `location` ON `mall`. `location`=`location`.`id`
LEFT OUTER JOIN `floor` ON `store`. `floor`=`floor`.`id`
LEFT JOIN `category` as `tab2` ON `tab2`.`id`=`category`.`parent`")->result();
		return $query;
	}
	
	
    function getstorebyid($id)
	{
		$query=$this->db->query("SELECT `user`.`id` ,  `user`.`firstname` ,  `user`.`lastname` ,  `user`.`password` ,  `user`.`email` ,  `user`.`website` ,  `user`.`description` ,  `user`.`eventinfo` ,  `user`.`contact` , `user`.`address` ,  `user`.`city` ,  `user`.`pincode` ,  `user`.`dob` ,  `accesslevel`.`id` ,  `accesslevel`.`name` AS `Accesslevel` ,  `user`.`timestamp` ,  `user`.`facebookuserid` ,  `user`.`newsletterstatus` ,  `user`.`status`,`user`.`logo`,`user`.`showwebsite`,`user`.`eventsheld`,`user`.`topeventlocation`
FROM  `user` 
INNER JOIN  `accesslevel` ON  `user`.`accesslevel` =  `accesslevel`.`id` WHERE `user`.`id`='$id'")->result();
		return $query;
	}
	public function getuserlike($user)
	{
		$like=$this->db->query("SELECT `brandlike`.`user`,`brandlike`.`brand`,`brandlike`.`like`,`brand`.`name`,`brand`.`pricerange`,`brand`.`description`,`brand`.`website`,`brand`.`logo` FROM `brandlike` LEFT OUTER JOIN `brand` ON `brand`.`id`=`brandlike`.`brand` WHERE `brandlike`.`user`='$user' AND `brandlike`.`like`=1 AND `brandlike`.`user`<>0")->result();

		for($i=0;$i<sizeof($like);$i++)
		{
			$like[$i]->like=$this->getlike($like[$i]->brand);
		}

		return $like;
	}
	function favoritebrands()
	{
		$brands=$this->db->query("SELECT `store`.`id`AS `storeid`,`store`. `name`,`store`. `city`,`city`.`name` as `cityname`, `store`.`brand` AS `brandid`,`brand`.`name` AS `brandname`,`brand`.`logo` as `brandlogo`,`store`. `format`,`store`. `mall`,`mall`.`name` as `mallname`, `store`.`floor`,`floor`.`floorno` AS `floorname`,`mall`. `address`,`store`.`address` AS `storeaddress`, `mall`.`location`,`location`.`name` AS `locationname`,`mall`. `latitude`, `mall`.`longitude`,`store`.`contactno`, `store`.`email`,`store`.`description`,`storecategory`. `storeid`, `storecategory`.`categoryid`,`category`.`name`,`store`.`workinghoursto`,`store`.`workinghoursfrom`,`shopclosed`.`day` AS `shopclosedday`,AVG(`storerating`.`rating`) as `rating`
FROM `storecategory`
LEFT OUTER JOIN `store` ON `store`. `id`=`storecategory`.`storeid`
LEFT OUTER JOIN `storerating` ON `storerating`.`store`=`store`.`id`
LEFT OUTER JOIN `brand` ON `store`. `brand`=`brand`.`id`
LEFT OUTER JOIN `category` ON `category`. `id`=`storecategory`.`categoryid`
LEFT OUTER JOIN `city` ON `store`. `city`=`city`.`id`
LEFT OUTER JOIN `mall` ON `store`. `mall`=`mall`.`id`
LEFT OUTER JOIN `location` ON `mall`. `location`=`location`.`id`
LEFT OUTER JOIN `floor` ON `store`. `floor`=`floor`.`id`
INNER JOIN `shopclosed` ON `store`. `shopclosedon`=`shopclosed`.`id`
GROUP BY `brand`.`id`")->result();

		for($i=0;$i<sizeof($brands);$i++)
		{
			$brands[$i]->like=$this->getlike($brands[$i]->brandid);
		}
		return $brands;
		
	}
    function getlike($brandid)
	    {
	    	$query=$this->db->query("SELECT * FROM `brandlike` WHERE `brand`='$brandid' and `like`=1")->result();
	    	return $query;
	    }
	
    function getstorebycategory($categoryid,$city)
	{
		if($city==0)
		{
			$city="";
		}else{
			$city=" AND `store`.`city`='$city'";
		}
		$query=$this->db->query("SELECT `store`.`id`AS `storeid`,`store`. `name`,`store`. `city`,`city`.`name` as `cityname`, `store`.`brand` AS `brandid`,`brand`.`name` AS `brandname`,`brand`.`logo` as `brandlogo`,`store`. `format`,`store`. `mall`,`mall`.`name` as `mallname`, `store`.`floor`,`floor`.`floorno` AS `floorname`,`mall`. `address`,`store`.`address` AS `storeaddress`, `mall`.`location`,`location`.`name` AS `locationname`,`mall`. `latitude`, `mall`.`longitude`,`store`.`contactno`, `store`.`email`,`store`.`description`,`storecategory`. `storeid`, `storecategory`.`categoryid`,`category`.`name`,`tab2`.`name` as `parent`,`store`.`workinghoursto`,`store`.`workinghoursfrom`,`shopclosed`.`day` AS `shopclosedday`,AVG(`storerating`.`rating`) as `rating`
FROM `storecategory`
LEFT OUTER JOIN `store` ON `store`. `id`=`storecategory`.`storeid`
LEFT OUTER JOIN `storerating` ON `storerating`.`store`=`store`.`id`
LEFT OUTER JOIN `brand` ON `store`. `brand`=`brand`.`id`
LEFT OUTER JOIN `category` ON `category`. `id`=`storecategory`.`categoryid`
LEFT OUTER JOIN `city` ON `store`. `city`=`city`.`id`
LEFT OUTER JOIN `mall` ON `store`. `mall`=`mall`.`id`
LEFT OUTER JOIN `location` ON `mall`. `location`=`location`.`id`
LEFT OUTER JOIN `floor` ON `store`. `floor`=`floor`.`id`
INNER JOIN `shopclosed` ON `store`. `shopclosedon`=`shopclosed`.`id`
LEFT JOIN `category` as `tab2` ON `tab2`.`id`=`category`.`parent`
WHERE `storecategory`.`categoryid`='24'".$city."
GROUP BY `store`.`id`")->result();
		return $query;
	}
	
	
    function getstorebycategoryoffers($categoryid,$city)
	{
                if($city==0)
                   {
                   	$city="";
                   }else{
                   	$city=" AND `store`.`city`='$city'";
                   }
		$query=$this->db->query("SELECT `store`.`id`AS `storeid`,`store`. `name`,`offers`.`header`,`store`. `city`,`city`.`name` as `cityname`, `store`.`brand` AS `brandid`,`brand`.`name` AS `brandname`,`brand`.`logo` as `brandlogo`,`store`. `format`,`store`. `mall`,`mall`.`name` as `mallname`, `store`.`floor`,`floor`.`floorno` AS `floorname`,`mall`. `address`,`store`.`address` AS `storeaddress`, `mall`.`location`,`location`.`name` AS `locationname`,`mall`. `latitude`, `mall`.`longitude`,`store`.`contactno`, `store`.`email`,`store`.`description`,`storecategory`. `storeid`, `storecategory`.`categoryid`,`category`.`name`,`tab2`.`name` as `parent`,`store`.`workinghoursto`,`store`.`workinghoursfrom`,`shopclosed`.`day` AS `shopclosedday`,AVG(`storerating`.`rating`) as `rating`
FROM `storecategory`
LEFT OUTER JOIN `store` ON `store`. `id`=`storecategory`.`storeid`
LEFT OUTER JOIN `storerating` ON `storerating`.`store`=`store`.`id`
LEFT OUTER JOIN `storeoffers` ON `storeoffers`.`storeid`=`store`.`id`
LEFT OUTER JOIN `offers` ON `offers`.`id`=`storeoffers`.`offerid`
LEFT OUTER JOIN `brand` ON `store`. `brand`=`brand`.`id`
LEFT OUTER JOIN `category` ON `category`. `id`=`storecategory`.`categoryid`
LEFT OUTER JOIN `city` ON `store`. `city`=`city`.`id`
LEFT OUTER JOIN `mall` ON `store`. `mall`=`mall`.`id`
LEFT OUTER JOIN `location` ON `mall`. `location`=`location`.`id`
LEFT OUTER JOIN `floor` ON `store`. `floor`=`floor`.`id`
INNER JOIN `shopclosed` ON `store`. `shopclosedon`=`shopclosed`.`id`
LEFT JOIN `category` as `tab2` ON `tab2`.`id`=`category`.`parent`
WHERE `storecategory`.`categoryid`='$categoryid'".$city."
GROUP BY `store`.`id`")->result();
		return $query;
	}

    
    function getstorebystoreid($storeid,$userid)
	{
		$query['store']=$this->db->query("SELECT `store`.`id`,`store`. `name`,`store`. `city`,`city`.`name` as `cityname`, `store`.`brand` AS `brandid`,`brand`.`name` as `brandname`,`brand`.`logo` AS `brandlogo`,`store`. `format`,`store`. `mall`,`mall`.`name` as `mallname`, `store`.`floor`,`floor`.`floorno` AS `floorname`,`mall`. `address`,`store`.`address` AS `storeaddress`, `mall`.`location`,`location`.`name` AS `locationname`,`mall`. `latitude`, `mall`.`longitude`,`store`.`contactno`, `store`.`email`,`store`.`description`, `brand`.`website`, `brand`.`facebookpage`, `brand`.`twitterpage`,`store`.`workinghoursto`,`store`.`workinghoursfrom`,`shopclosed`.`day` AS `shopclosedday` 
	FROM `store`
        LEFT OUTER JOIN `city` ON `store`. `city`=`city`.`id`
        LEFT OUTER JOIN `mall` ON `store`. `mall`=`mall`.`id`
        LEFT OUTER JOIN `location` ON `mall`. `location`=`location`.`id`
        LEFT OUTER JOIN `floor` ON `store`. `floor`=`floor`.`id`
        LEFT OUTER JOIN `brand` ON `store`. `brand`=`brand`.`id`
INNER JOIN `shopclosed` ON `store`. `shopclosedon`=`shopclosed`.`id`
WHERE `store`.`id`='$storeid'")->row();

        $query['newin']=$this->db->query("SELECT `newin`.`image`,`newin`.`description`
FROM `storenewin` 
INNER JOIN `newin` ON `newin`.`id` = `storenewin`.`newinid`
WHERE `storenewin`.`storeid`='$storeid'")->result();

$query['averagerating']=$this->db->query("SELECT  `store`, avg(`rating`) AS `averagerating` 
        FROM `storerating` 
WHERE `store`='$storeid'")->row();
$query['averagerating']=$query['averagerating']->averagerating;

        $brandid=$query['store']->brandid;
	
	if($userid!=0)
	{
		$query['like']=$this->db->query("SELECT  `like` FROM `brandlike` WHERE `user`='$userid' AND `brand`='$brandid'")->row();
$query['like']=$query['like']->like;	
	}else{
	$query['like']=2;
	}
        

	$query['review']=$this->db->query("SELECT `review` FROM `storereview` WHERE `store`='$storeid' AND `review`<>'NULL' AND `review`<>'' LIMIT 0,2")->result();
	$query['offers']=$this->db->query("SELECT `storeoffers`.`storeid`,`storeoffers`.`offerid`,`offers`.`header`,`offers`.`description`,`offers`.`from`,`offers`.`to` FROM `offers` LEFT OUTER JOIN `storeoffers` ON `offers`.`id`=`storeoffers`.`offerid` WHERE `storeoffers`.`storeid`='$storeid'")->result();
		return $query;
	}
	
    function reviewbystoreid($storeid)
    {
    		$query=$this->db->query("SELECT `review` FROM `storereview` WHERE `store`='$storeid' AND `review`<>'NULL' AND `review`<>''")->result();
		return $query;
    }
	
    function getnewinbystoreid($storeid)
	{
		$query=$this->db->query("SELECT `storenewin`.`id`, `storenewin`.`storeid`, `storenewin`.`newinid`,`newin`.`image`,`newin`.`description`
FROM `storenewin` 
INNER JOIN `newin` ON `newin`.`id` = `storenewin`.`newinid`
WHERE `storenewin`.`storeid`='$storeid'")->result();
		return $query;
	}
    
     function getallstoresbybrandid($brandid)
	{
		$query=$this->db->query("SELECT `store`.`id`,`store`. `name`,`store`. `city`,`city`.`name` as `cityname`, `store`.`brand` AS `brandid`,`brand`.`name` as `brandname`,`store`. `format`,`store`. `mall`,`mall`.`name` as `mallname`, `store`.`floor`,`floor`.`floorno` AS `floorname`,`mall`. `address`,`store`.`address` AS `storeaddress`, `mall`.`location`,`location`.`name` AS `locationname`,`mall`. `latitude`, `mall`.`longitude`,`store`.`contactno`, `store`.`email`,`store`.`description`, `brand`.`website`, `brand`.`facebookpage`, `brand`.`twitterpage`,`store`.`workinghoursto`,`store`.`workinghoursfrom`,`shopclosed`.`day` AS `shopclosedday` FROM `store`
        LEFT OUTER JOIN `city` ON `store`. `city`=`city`.`id`
        LEFT OUTER JOIN `mall` ON `store`. `mall`=`mall`.`id`
        LEFT OUTER JOIN `location` ON `mall`. `location`=`location`.`id`
        LEFT OUTER JOIN `floor` ON `store`. `floor`=`floor`.`id`
        LEFT OUTER JOIN `brand` ON `store`. `brand`=`brand`.`id` 
        INNER JOIN `shopclosed` ON `store`. `shopclosedon`=`shopclosed`.`id`
        WHERE `store`.`brand`='$brandid'")->result();
		return $query;
	}
    
     public function addrating($userid,$storeid,$rating,$review)
	{
		$data  = array(
			'user' => $userid,
			'store' => $storeid,
			'rating' => $rating
		);
         $querydelete=$this->db->query("DELETE FROM `storerating` WHERE `user`='$userid' AND `store`='$storeid'");
		$query=$this->db->insert( 'storerating', $data );
		
		$data1  = array(
			'user' => $userid,
			'store' => $storeid,
                        'review' => $review
		);
		$query=$this->db->insert( 'storereview', $data1 );
//        $sessiondata=$this->session->set_userdata($newdata);
		if(!$query)
			return  0;
		else
			return  1;
	}
	
	
    function exportstoresinmalltocsv()
	{
		$this->load->dbutil();
		$query=$this->db->query("SELECT `store`.`id`,`store`. `name`,`store`. `city`,`city`.`name` as `cityname`, `store`.`brand` AS `brandid`,`brand`.`name` as `brandname`,`store`. `format`,`store`. `mall`,`mall`.`name` as `mallname`, `store`.`floor`,`floor`.`floorno` AS `floorname`,`mall`. `address`, `mall`.`location`,`location`.`name` AS `locationname`,`mall`. `latitude`, `mall`.`longitude`,`store`.`contactno`, `store`.`email`,`store`.`description`, `brand`.`website`, `brand`.`facebookpage`, `brand`.`twitterpage` FROM `store`
        LEFT OUTER JOIN `city` ON `store`. `city`=`city`.`id`
        LEFT OUTER JOIN `mall` ON `store`. `mall`=`mall`.`id`
        LEFT OUTER JOIN `location` ON `mall`. `location`=`location`.`id`
        LEFT OUTER JOIN `floor` ON `store`. `floor`=`floor`.`id`
        LEFT OUTER JOIN `brand` ON `store`. `brand`=`brand`.`id` WHERE `store`. `format`='1'");
//print_r($query);
       $content= $this->dbutil->csv_from_result($query);
//        $timestamp=new DateTime();
//        $timestamp=$timestamp->format('Y-m-d_H.i.s');
        //$data = 'Some file data';

        if ( ! write_file('./uploads/storeinmallcsvdownloaded.csv', $content))
        {
             echo 'Unable to write the File';
        }
        else
        {
            redirect(base_url('uploads/storeinmallcsvdownloaded.csv'), 'refresh');
             echo 'File Downloaded Successfully!!!';
        }
//        file_put_contents("gs://toykraftdealer/retailerfilefromdashboard_$timestamp.csv", $content);
//		redirect("http://admin.toy-kraft.com/servepublic?name=retailerfilefromdashboard_$timestamp.csv", 'refresh');
	}
    function exportindividualstorestocsv()
	{
		$this->load->dbutil();
		$query=$this->db->query("SELECT `store`.`id`,`store`. `name`,`store`. `city`,`city`.`name` as `cityname`, `store`.`brand` AS `brandid`,`brand`.`name` as `brandname`,`store`. `format`,`store`. `mall`,`mall`.`name` as `mallname`, `store`.`floor`,`store`. `address`, `store`.`location`,`location`.`name` as `locationname`,`store`. `latitude`, `store`.`longitude`, `store`.`contactno`, `store`.`email`,`store`.`description`, `brand`.`website`, `brand`.`facebookpage`, `brand`.`twitterpage` FROM `store`
        LEFT OUTER JOIN `city` ON `store`. `city`=`city`.`id`
        LEFT OUTER JOIN `mall` ON `store`. `mall`=`mall`.`id`
        LEFT OUTER JOIN `location` ON `store`. `location`=`location`.`id`
        LEFT OUTER JOIN `brand` ON `store`. `brand`=`brand`.`id` WHERE `store`. `format`='2'");
//print_r($query);
       $content= $this->dbutil->csv_from_result($query);
//        $timestamp=new DateTime();
//        $timestamp=$timestamp->format('Y-m-d_H.i.s');
        //$data = 'Some file data';

        if ( ! write_file('./uploads/individualstorecsvdownloaded.csv', $content))
        {
             echo 'Unable to write the File';
        }
        else
        {
            redirect(base_url('uploads/individualstorecsvdownloaded.csv'), 'refresh');
             echo 'File Downloaded Successfully!!!';
        }
//        file_put_contents("gs://toykraftdealer/retailerfilefromdashboard_$timestamp.csv", $content);
//		redirect("http://admin.toy-kraft.com/servepublic?name=retailerfilefromdashboard_$timestamp.csv", 'refresh');
	}
    
}
?>