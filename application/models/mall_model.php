<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Mall_model extends CI_Model
{
	
	public function create($name,$address,$location,$latitude,$longitude,$contactno,$parkingfacility,$cinema,$restaurant,$entertainment,$website,$email,$logo,$description,$specialoffers,$events,$cinemaoffer,$facebookpage,$pininterest,$instagram,$twitterpage,$city)
	{
		$data  = array(
			'name' => $name,
			'address' => $address,
			'description' => $description,
			'specialoffers' => $specialoffers,
			'events' => $events,
			'cinemaoffer' => $cinemaoffer,
			'facebookpage' => $facebookpage,
			'pininterest' => $pininterest,
			'instagram' => $instagram,
			'twitterpage' => $twitterpage,
			'location' => $location,
			'latitude' => $latitude,
			'longitude' => $longitude,
			'contactno' => $contactno,
			'parkingfacility' => $parkingfacility,
			'cinema' => $cinema,
			'restaurant' => $restaurant,
			'entertainment' => $entertainment,
			'website' => $website,
			'email' => $email,
			'city' => $city,
			'logo' => $logo
		);
		$query=$this->db->insert( 'mall', $data );
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
     
	public function createbycsv($file)
	{
//        print_r($file);
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
            
            $data  = array(
                'name' => $row['name'],
                'address' => $row['address'],
                'location' => $locationid,
                'latitude' => $row['latitude'],
                'longitude' => $row['longitude'],
                'contactno' => $row['contactno'],
                'parkingfacility' => $row['parkingfacility'],
                'cinema' => $row['cinema'],
                'cinemaoffer' => $row['cinemaoffer'],
                'restaurant' => $row['restaurant'],
                'entertainment' => $row['entertainment'],
                'website' => $row['website'],
                'email' => $row['email'],
                'description' => $row['description'],
                'specialoffers' => $row['specialoffers'],
                'events' => $row['events'],
                'facebookpage' => $row['facebookpage'],
                'pininterest' => $row['pininterest'],
                'instagram' => $row['instagram'],
                'twitterpage' => $row['twitterpage'],
                'logo' => $row['logo'],
                'city' => $cityid
            );
//            print_r($data);

            $query=$this->db->insert( 'mall', $data );
        }
		if(!$query)
			return  0;
		else
			return  1;
	}
	function viewmall()
	{
		$query="SELECT `mall`.`id`, `mall`.`name`, `mall`.`address`, `mall`.`location`, `mall`.`latitude`, `mall`.`longitude`, `mall`.`contactno`, `mall`.`parkingfacility`, `mall`.`cinema`, `mall`.`restaurant`, `mall`.`entertainment`, `mall`.`website`, `mall`.`email`, `mall`.`logo` ,`city`.`name` AS `cityname`,`location`.`name` AS `locationname`
        FROM `mall`
        LEFT OUTER JOIN `city` ON `city`.`id`=`mall`.`city`
        LEFT OUTER JOIN `location` ON `location`.`id`=`mall`.`location`";
		$query=$this->db->query($query)->result();
		return $query;
	}
    
    
     public function getmallincity($id)
	{
		$query="SELECT `id`, `name`, `address`, `location`, `latitude`, `longitude`, `contactno`, `parkingfacility`, `cinema`, `cinemaoffer`, `restaurant`, `entertainment`, `website`, `email`, `logo`, `description`, `specialoffers`, `events`, `facebookpage`, `pininterest`, `instagram`, `twitterpage`, `city` FROM `mall` 
        WHERE `city`='$id' ";
		$mall=$this->db->query($query)->result();
         if ($mall== NULL) {
                return "No Mall";
            }
        else
        return $mall;
	}
	public function getlogobymallid($id)
	{
		$query=$this->db->query("SELECT `logo` FROM `mall` WHERE `id`='$id'")->row();
		
		
		return $query;
	}
	public function beforeedit( $id )
	{
		$this->db->where( 'id', $id );
		$query['mall']=$this->db->get( 'mall' )->row();
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
	
	public function edit($id,$name,$address,$location,$latitude,$longitude,$contactno,$parkingfacility,$cinema,$restaurant,$entertainment,$website,$email,$logo,$description,$specialoffers,$events,$cinemaoffer,$facebookpage,$pininterest,$instagram,$twitterpage,$city)
	{
		$data  = array(
			'name' => $name,
			'address' => $address,
			'description' => $description,
			'specialoffers' => $specialoffers,
			'events' => $events,
			'cinemaoffer' => $cinemaoffer,
			'facebookpage' => $facebookpage,
			'pininterest' => $pininterest,
			'instagram' => $instagram,
			'twitterpage' => $twitterpage,
			'location' => $location,
			'latitude' => $latitude,
			'longitude' => $longitude,
			'contactno' => $contactno,
			'parkingfacility' => $parkingfacility,
			'cinema' => $cinema,
			'restaurant' => $restaurant,
			'entertainment' => $entertainment,
			'website' => $website,
			'email' => $email,
			'city' => $city,
			'logo' => $logo
		);
		if($logo != "")
			$data['logo'] = $logo;
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'mall', $data );
		if($query)
		{
			$this->savelog($id,'Mall Edited');
		}
		return 1;
	}
	function deletemall($id)
	{
		$query=$this->db->query("DELETE FROM `mall` WHERE `id`='$id'");
	}
     public function getmalldropdown()
	{
		$query=$this->db->query("SELECT * FROM `mall`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->name;
		}
		
		return $return;
	}
     public function getfloordropdown()
	{
		$query=$this->db->query("SELECT * FROM `floor`  ORDER BY `id` ASC")->result();
		$return=array(
		"" => ""
		);
		foreach($query as $row)
		{
			$return[$row->id]=$row->floorno;
		}
		
		return $return;
	}
    
	//
	public function getevent()
	{
		$return=array();
		$query=$this->db->query("SELECT * FROM `event` ORDER BY `id` ASC")->result();
		foreach($query as $row)
		{
			$return[$row->id]=$row->title;
		}
	
		return $return;
	}
	public function getlistingtype()
	{
		$return=array();
		$return = array(
			"1" => "Private",
			"2" => "Public"
		);
		return $return;
	}
	public function getremainingticket()
	{
		$return=array();
		$return = array(
			"1" => "Yes",
			"0" => "No"
		);
		return $return;
	}
	function editeventcategorytopic($id,$category,$topic)
	{
		$this->db->query("DELETE FROM `eventcategory` WHERE `event`='$id'");
		$this->db->query("DELETE FROM `eventtopic` WHERE `event`='$id'");
		if(!empty($category))
		{
			foreach($category as $key => $cat)
			{
				$data  = array(
					'event' => $id,
					'category' => $cat,
				);
				$query=$this->db->insert( 'eventcategory', $data );
			}
		}
		if(!empty($topic))
		{
			foreach($topic as $key => $top)
			{
				$data2  = array(
					'event' => $id,
					'topic' => $top,
				);
				$query=$this->db->insert( 'eventtopic', $data2 );
			}
		}
		{
			$this->savelog($id,"Event Category ,Topic updated");
		}
		return 1;
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
    /*frontend apis*/
    
    function getallmalls($city)
	{
		if($city==0)
		{
		$newcity="";
		}else{
		$newcity=" WHERE `mall`.`city` ='$city'";
		}
		$sqlqry="SELECT `mall`.`id`, `mall`.`name`, `mall`.`address`, `mall`.`location`, `mall`.`latitude`, `mall`.`longitude`, `mall`.`contactno`, `mall`.`parkingfacility`, `mall`.`cinema`, `mall`.`restaurant`, `mall`.`entertainment`, `mall`.`website`, `mall`.`email`, `mall`.`logo` ,`city`.`name` AS `cityname`,`location`.`name` AS `locationname` FROM `mall` LEFT OUTER JOIN `city` ON `city`.`id`=`mall`.`city` LEFT OUTER JOIN `location` ON `location`.`id`=`mall`.`location`".$newcity;
		$query=$this->db->query($sqlqry)->result();
		return $query;
	}

        
    function mallcategories($id)
	{
		$query=$this->db->query("SELECT `store`.`id` as `storeid`,`store`.`name` as `storename`,`store`.`mall`,`storecategory`.`categoryid`,`category`.`name`,`category`.`parent`,`category`.`image` FROM `store` LEFT JOIN `storecategory` ON `store`.`id`=`storecategory`.`storeid` LEFT JOIN `category` ON `storecategory`.`categoryid`=`category`.`id` WHERE `store`.`mall`='$id'")->result();
		return $query;
	}

         
    function mallcategorystore($id,$mid)
	{
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
WHERE `storecategory`.`categoryid`='$id' AND `store`.`mall`='$mid'
GROUP BY `store`.`id`")->result();
		return $query;
	}

         
    function mallcategorystorecat($id,$mid)
	{
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
WHERE `storecategory`.`categoryid` IN ('$id') AND `store`.`mall`='$mid'
GROUP BY `store`.`id`")->result();
		return $query;
	}
	function malloffers($id,$limit)
	{
		$query=$this->db->query("SELECT `store`.`name`,`store`.`mall`,`store`.`address`,`store`.`location`,`store`.`latitude`,`store`.`longitude`,`storeoffers`.`offerid`,`storeoffers`.`storeid`,`offers`.`header`,`offers`.`description`,`offers`.`from`,`offers`.`to` FROM `store` LEFT OUTER JOIN `storeoffers` ON `store`.`id`=`storeoffers`.`storeid` LEFT OUTER JOIN `offers` ON `offers`.`id`=`storeoffers`.`offerid` WHERE `store`.`mall`='$id' LIMIT 0,$limit")->result();
		return $query;
	}

        
	function mallalloffers($id)
	{
		$query=$this->db->query("SELECT `store`.`name`,`store`.`mall`,`store`.`address`,`store`.`location`,`store`.`latitude`,`store`.`longitude`,`storeoffers`.`offerid`,`storeoffers`.`storeid`,`offers`.`header`,`offers`.`description`,`offers`.`from`,`offers`.`to`,`imagegallery`.`image`
FROM `store`
LEFT OUTER JOIN `storeoffers` ON `store`.`id`=`storeoffers`.`storeid`
LEFT OUTER JOIN `offers` ON `offers`.`id`=`storeoffers`.`offerid`
LEFT OUTER JOIN `storeimagegallery` ON `storeimagegallery`.`storeid`=`store`.`id`
LEFT OUTER JOIN `imagegallery` ON `imagegallery`.`id`=`storeimagegallery`.`imagegalleryid`
WHERE `store`.`mall`='$id'")->result();
		return $query;
	}
    
    
    function exportmallstocsv()
	{
		$this->load->dbutil();
		$query=$this->db->query("SELECT `mall`.`id`, `mall`.`name`, `mall`.`address`, `mall`.`location`, `mall`.`latitude`, `mall`.`longitude`, `mall`.`contactno`, `mall`.`parkingfacility`, `mall`.`cinema`, `mall`.`restaurant`, `mall`.`entertainment`, `mall`.`website`, `mall`.`email`, `mall`.`logo` ,`city`.`name` AS `cityname`,`location`.`name` AS `locationname`
        FROM `mall`
        LEFT OUTER JOIN `city` ON `city`.`id`=`mall`.`city`
        LEFT OUTER JOIN `location` ON `location`.`id`=`mall`.`location`");
//print_r($query);
       $content= $this->dbutil->csv_from_result($query);
//        $timestamp=new DateTime();
//        $timestamp=$timestamp->format('Y-m-d_H.i.s');
        //$data = 'Some file data';

        if ( ! write_file('./uploads/mallcsvdownloaded.csv', $content))
        {
             echo 'Unable to write the File';
        }
        else
        {
            redirect(base_url('uploads/mallcsvdownloaded.csv'), 'refresh');
             echo 'File Downloaded Successfully!!!';
        }
	}
    
}
?>