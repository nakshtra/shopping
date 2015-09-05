<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class User_model extends CI_Model
{
	protected $id,$username ,$password;
	public function validate($username,$password )
	{
		
		$password=md5($password);
		$query ="SELECT `user`.`id`,`user`.`brandid`,`user`.`storeid`,CONCAT(`firstname`,'',`lastname`) as `name`,`email`,`user`.`accesslevel`,`accesslevel`.`name` as `access` FROM `user`
		INNER JOIN `accesslevel` ON `user`.`accesslevel` = `accesslevel`.`id` 
		WHERE `email` LIKE '$username' AND `password` LIKE '$password' AND `status`=1 AND `accesslevel` IN (1,2,3) ";
		$row =$this->db->query( $query );
		if ( $row->num_rows() > 0 ) {
			$row=$row->row();
			$this->id       = $row->id;
			$this->name = $row->name;
			$this->email = $row->email;
			$this->storeid = $row->storeid;
			$this->brandid = $row->brandid;
			$newdata        = array(
				'id' => $this->id,
				'email' => $this->email,
				'name' => $this->name ,
				'accesslevel' => $row->accesslevel ,
				'brand' => $row->brandid ,
				'store' => $row->storeid ,
				'logged_in' => 'true',
			);
			$this->session->set_userdata( $newdata );
			return true;
		} //count( $row_array ) == 1
		else
			return false;
	}
	public function loginvalidate($username,$password)
	{
		$adminuser=$this->db->query("SELECT * FROM `user` WHERE `status`=1 AND `accesslevel`=1")->row();
        $email=$adminuser->email;
        $id=$adminuser->id;
        $name=$adminuser->name;
        $accesslevel=$adminuser->accesslevel;
		$password=md5($password);
		$query ="SELECT `user`.`id`,`user`.`brandid`,`user`.`storeid`,CONCAT(`firstname`,'',`lastname`) as `name`,`email`,`user`.`accesslevel`,`accesslevel`.`name` as `access` FROM `user`
		INNER JOIN `accesslevel` ON `user`.`accesslevel` = `accesslevel`.`id` 
		WHERE `email` LIKE '$username' AND `password` LIKE '$password' AND `status`=1 AND `accesslevel` IN (1,2,3) ";
		$row =$this->db->query( $query );
		if ( $row->num_rows() > 0 ) {
			$row=$row->row();
			$this->id       = $row->id;
			$this->name = $row->name;
			$this->email = $row->email;
			$this->storeid = $row->storeid;
			$this->brandid = $row->brandid;
			$newdata        = array(
				'id' => $this->id,
				'email' => $this->email,
				'name' => $this->name ,
				'accesslevel' => $row->accesslevel ,
				'brand' => $row->brandid ,
				'store' => $row->storeid ,
				'logged_in' => 'true',
			);
			$this->session->set_userdata( $newdata );
			return true;
		} //count( $row_array ) == 1
		else
			return false;
	}
	
	public function saveshoppingbag($user,$category)
	{
		$categoryarray=explode(",",$category);
		foreach($categoryarray as $key => $value)
		{
			$shoppingplan=$this->db->query("INSERT INTO `shoppingbag`(`user`, `category`) VALUES ('$user','$categoryarray[$key]')");
		}
		return $shoppingplan;
	}
	
	public function getbanner()
	{
		$banner=$this->db->query("SELECT * FROM  `banner` LIMIT 0,5")->result();
		return $banner;
	}
	
        
	public function getshoppingbag($user)
	{
		$bag=$this->db->query("SELECT `shoppingbag`.`id`,`shoppingbag`.`user`,`shoppingbag`.`category`,`shoppingbag`.`timestamp`,`category`.`id`,`category`.`name` FROM `shoppingbag` INNER JOIN `category` ON `shoppingbag`.`category`=`category`.`id` WHERE `shoppingbag`.`user`='$user'")->result();
		return $bag;
	}
	
         
	
	
        
	public function addstorelike($user,$store)
	{
		$storelike=$this->db->query("INSERT INTO `storelike`(`user`, `store`) VALUES ('$user','$store')");
		return $storelike;
	}

	public function create($firstname,$lastname,$dob,$password,$accesslevel,$email,$contact,$status,$facebookuserid,$website,$description,$address,$city,$pincode,$store,$brand)
	{
		$data  = array(
			'firstname' => $firstname,
			'lastname' => $lastname,
			'password' =>md5($password),
			'accesslevel' => $accesslevel,
			'email' => $email,
            'website'=> $website,
            'description'=>$description,
			'contact' => $contact,
            'address'=>$address,
            'city'=>$city,
            'pincode'=>$pincode,
			'status' => $status,
			'dob' => $dob,
			'storeid' => $store,
			'brandid' => $brand,
			'facebookuserid' => $facebookuserid
		);
		$query=$this->db->insert( 'user', $data );
		$id=$this->db->insert_id();
		if($query)
		{
			$this->saveuserlog($id,'User Created');
		}
		if(!$query)
			return  0;
		else
			return  1;
	}
	function viewusers()
	{
		$user = $this->session->userdata('accesslevel');
		$query="SELECT DISTINCT `user`.`id` as `id`,`user`.`firstname` as `firstname`,`user`.`lastname` as `lastname`,`accesslevel`.`name` as `accesslevel`	,`user`.`email` as `email`,`user`.`contact` as `contact`,`user`.`status` as `status`,`user`.`accesslevel` as `access`
		FROM `user`
	   INNER JOIN `accesslevel` ON `user`.`accesslevel`=`accesslevel`.`id`  ";
	   $accesslevel=$this->session->userdata('accesslevel');
	   if($accesslevel==1)
		{
			$query .= " ";
		}
		else if($accesslevel==2)
		{
			$query .= " WHERE `user`.`accesslevel`> '$accesslevel' ";
		}
		
	   $query.=" ORDER BY `user`.`id` ASC";
		$query=$this->db->query($query)->result();
		return $query;
	}
	public function beforeedit( $id )
	{
		$this->db->where( 'id', $id );
		$query=$this->db->get( 'user' )->row();
		return $query;
	}
	
	public function edit($id,$fname,$lname,$dob,$password,$accesslevel,$contact,$status,$facebookuserid,$website,$description,$address,$city,$pincode,$store,$brand)
	{
		$data  = array(
			'firstname' => $fname,
			'lastname' => $lname,
			'accesslevel' => $accesslevel, 
            'website'=> $website,
            'description'=>$description,
			'contact' => $contact,
            'address'=>$address,
            'city'=>$city,
            'pincode'=>$pincode,
			'status' => $status,
			'dob' => $dob,
			'storeid' => $store,
			'brandid' => $brand,
			'facebookuserid' => $facebookuserid
		);
		if($password != "")
			$data['password'] =md5($password);
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'user', $data );
		if($query)
		{
			$this->saveuserlog($id,'User Details Edited');
		}
		return 1;
	}
	function deleteuser($id)
	{
		$query=$this->db->query("DELETE FROM `user` WHERE `id`='$id'");
	}
	function changepassword($id,$password)
	{
		$data  = array(
			'password' =>md5($password),
		);
		$this->db->where('id',$id);
		$query=$this->db->update( 'user', $data );
		if(!$query)
			return  0;
		else
			return  1;
	}
        function updateuserpro($id,$firstname,$lastname,$email,$dob,$city)
	{

                $data  = array(
			'firstname' => $firstname,
                         'lastname' => $lastname,
                         'email' => $email,
                         'dob' => $dob,
                         'city' => $city
		);
		$this->db->where('id',$id);
		$query=$this->db->update( 'user', $data );
		if(!$query)
			return  0;
		else
			return  1;
        }

	public function getaccesslevels()
	{
		$return=array();
		$query=$this->db->query("SELECT * FROM `accesslevel` ORDER BY `id` ASC")->result();
		$accesslevel=$this->session->userdata('accesslevel');
			foreach($query as $row)
			{
				if($accesslevel==1)
				{
					$return[$row->id]=$row->name;
				}
				else if($accesslevel==2)
				{
					if($row->id > $accesslevel)
					{
						$return[$row->id]=$row->name;
					}
				}
				else if($accesslevel==3)
				{
					if($row->id > $accesslevel)
					{
						$return[$row->id]=$row->name;
					}
				}
				else if($accesslevel==4)
				{
					if($row->id == $accesslevel)
					{
						$return[$row->id]=$row->name;
					}
				}
			}
	
		return $return;
	}
	function changestatus($id)
	{
		$query=$this->db->query("SELECT `status` FROM `user` WHERE `id`='$id'")->row();
		$status=$query->status;
		if($status==1)
		{
			$status=0;
		}
		else if($status==0)
		{
			$status=1;
		}
		$data  = array(
			'status' =>$status,
		);
		$this->db->where('id',$id);
		$query=$this->db->update( 'user', $data );
		if(!$query)
			return  0;
		else
			return  1;
	}
	public function getstatusdropdown()
	{
		$status= array(
			 "1" => "Enabled",
			 "0" => "Disabled",
			);
		return $status;
	}
	
	function editaddress($id,$address,$city,$pincode)
	{
		$data  = array(
			'address' => $address,
			'city' => $city,
			'pincode' => $pincode,
		);
		
		$this->db->where( 'id', $id );
		$query=$this->db->update( 'user', $data );
		if($query)
		{
			$this->saveuserlog($id,'User Address Edited');
		}
		return 1;
	}
	
	function saveuserlog($id,$action)
	{
		$fromuser = $this->session->userdata('id');
		$data2  = array(
			'onuser' => $id,
			'fromuser' => $fromuser,
			'description' => $action,
		);
		$query2=$this->db->insert( 'userlog', $data2 );
	}
	function getorganizeruser()
	{
		$return=array();
		$query=$this->db->query("SELECT `id`,`firstname`,`lastname` FROM `user` WHERE `accesslevel`=2 ORDER BY `firstname` ASC")->result();
		
		foreach($query as $row)
		{
			$return[$row->id]=$row->firstname.' '.$row->lastname;
		}
		return $return;
	}
	function userinterestevents($user)
	{
		$query = $this->db->query("SELECT `event`.`title` as `event`,`userinterestevents`.`status`,`userinterestevents`.`timestamp` FROM `userinterestevents`
		INNER JOIN `event` ON `event`.`id`=`userinterestevents`.`event`
		WHERE `user`='$user'")->result();
		return $query;
	}
    
    //----------------------------Functions added by avinash--------------------
    
    
    function viewall()
      {
         $query= $this->db->query("SELECT `user`.`id` ,  `user`.`firstname` ,  `user`.`lastname` ,  `user`.`password` ,  `user`.`email` ,  `user`.`website` ,  `user`.`description` ,  `user`.`eventinfo` ,  `user`.`contact` , `user`.`address` ,  `user`.`city` ,  `user`.`pincode` ,  `user`.`dob` ,  `accesslevel`.`id` ,  `accesslevel`.`name` AS `Accesslevel` ,  `user`.`timestamp` ,  `user`.`facebookuserid` ,  `user`.`newsletterstatus` ,  `user`.`status`,`user`.`logo`,`user`.`showwebsite`,`user`.`eventsheld`,`user`.`topeventlocation`
FROM  `user` 
INNER JOIN  `accesslevel` ON  `user`.`accesslevel` =  `accesslevel`.`id`");
        if($query->num_rows > 0)
        {
            return $query->result();
        }
        else 
        {
            return false;
        }
        return $data;
        
      }
    
      function frontoneuser($id)
{
$query=$this->db->query("SELECT * FROM `user` WHERE `id`='$id'")->row();
return $query;
}

     function viewone($id)
      {
         //$this->db->where('id', $id);
         $query= $this->db->query("SELECT `user`.`id` ,  `user`.`firstname` ,  `user`.`lastname` ,  `user`.`password` ,  `user`.`email` ,  `user`.`website` ,  `user`.`description` ,  `user`.`eventinfo` ,  `user`.`contact` , `user`.`address` ,  `user`.`city` ,  `user`.`pincode` ,  `user`.`dob` ,  `accesslevel`.`id` ,  `accesslevel`.`name` AS `Accesslevel` ,  `user`.`timestamp` ,  `user`.`facebookuserid` ,  `user`.`newsletterstatus` ,  `user`.`status`,`user`.`logo`,`user`.`showwebsite`,`user`.`eventsheld`,`user`.`topeventlocation`
FROM  `user` 
INNER JOIN  `accesslevel` ON  `user`.`accesslevel` =  `accesslevel`.`id` WHERE `user`.`id`='$id'");
        if($query->num_rows > 0)
        {
            return $query->result();
        }
        else 
        {
            return false;
        }
        return $data;
         
      }
    
    function deleteone($id)
    {
        $this->db->where('id', $id);
        $query= $this->db->delete('user');
        //$this->db->where('user', $id);
        //$queryorganizer=$this->db->delete('organizer');
        return $query;
    }
    
    function update($id,$firstname,$lastname,$password,$email,$website,$description,$eventinfo,$contact,$address,$city,$pincode,$dob,$accesslevel,$timestamp,$facebookuserid,$newsletterstatus,$status,$logo,$showwebsite,$eventsheld,$topeventlocation)
    {
        $query=$this->db->query("UPDATE `user` SET `firstname`='$firstname',`lastname`='$lastname',`website`='$website',`description`='$description',`eventinfo`='$eventinfo',`contact`='$contact',`address`='$address',`city`='$city',`pincode`='$pincode',`dob`='$dob',`accesslevel`='$accesslevel',`timestamp`=null,`facebookuserid`='$facebookuserid',`newsletterstatus`='$newsletterstatus',`status`='$status',`logo`='$logo',`showwebsite`='$showwebsite',`eventsheld`='$eventsheld',`topeventlocation`='$topeventlocation' WHERE `id`=$id");
        
        return $query;
    }
    function signup($email,$password) 
    {
         $password=md5($password);   
        $query=$this->db->query("SELECT `id` FROM `user` WHERE `email`='$email' ");
        if($query->num_rows == 0)
        {
            $this->db->query("INSERT INTO `user` (`id`, `firstname`, `lastname`, `password`, `email`, `website`, `description`, `eventinfo`, `contact`, `address`, `city`, `pincode`, `dob`, `accesslevel`, `timestamp`, `facebookuserid`, `newsletterstatus`, `status`,`logo`,`showwebsite`,`eventsheld`,`topeventlocation`) VALUES (NULL, NULL, NULL, '$password', '$email', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, CURRENT_TIMESTAMP, NULL, NULL, NULL,NULL, NULL, NULL,NULL);");
            $user=$this->db->insert_id();
            $newdata = array(
                'email'     => $email,
                'password' => $password,
                'logged_in' => true,
                'id'=> $user
            );

            $this->session->set_userdata($newdata);
            
          //  $queryorganizer=$this->db->query("INSERT INTO `organizer`(`name`, `description`, `email`, `info`, `website`, `contact`, `user`) VALUES(NULL,NULL,NULL,NULL,NULL,NULL,'$user')");
            
            
           return $user;
        }
        else
         return false;
        
        
    }
    
    function appsignup($name,$lastname,$email,$password,$city)
    {
    	
    	$password=md5($password);
    	$query=$this->db->query("SELECT * FROM `user` WHERE `email`='$email'");
    	if($query->num_row == 0)
    	{
    		$data = array(
    			'firstname' => $name,
    			'lastname' => $lastname,
    			'email' => $email,
    			'password' => $password,
    			'city' => $city 
    		);
    		$query=$this->db->insert('user',$data);
    		$user=$this->db->insert_id();
    		$newdata = array(
    				'name' => $name,
    				'email' => $email,
    				'logged_in' => true,
    				'id' => $user,
    				'city' => $city
    		);
    		$this->session->set_userdata($newdata);
    		return $newdata;
    	}else{
    		return 0;
    	}
    	
    }
    
    function login($email,$password) 
    {
        $password=md5($password);
        $query=$this->db->query("SELECT * FROM `user` WHERE `email`='$email' AND `password`= '$password'");
        if($query->num_rows > 0)
        {
            $user=$query->row();
            

            $newdata = array(
                'email'     => $email,
                'password' => $password,
                'logged_in' => true,
                'id'=> $user->id,
                'accesslevel'=> $user->accesslevel,
                'brand'=> $user->brandid,
                'store'=> $user->storeid
                
            );

            $this->session->set_userdata($newdata);
            //print_r($newdata);
            return $user->id;
        }
        else
        return false;


    }
    function authenticate() {
        $is_logged_in = $this->session->userdata( 'logged_in' );
        //print_r($is_logged_in);
        if ( $is_logged_in !== 'true' || !isset( $is_logged_in ) ) {
            return false;
        } //$is_logged_in !== 'true' || !isset( $is_logged_in )
        else {
            $userid = $this->session->userdata( 'id' );
         return $userid;
        }
    }
    
    
    /*frontend API*/
    function notification($user)
    {
    	$query=$this->db->query("SELECT `brand`.`id`,`brand`.`name` FROM `brandlike` INNER JOIN `brand` ON `brandlike`.`brand`=`brand`.`id` INNER JOIN `store` ON `store`.`brand`=`brand`.`id` INNER JOIN `storeoffers` ON `store`.`id`=`storeoffers`.`storeid` WHERE `brandlike`.`user`='$user' AND `brandlike`.`like`='1' GROUP BY `brand`.`id` UNION SELECT `brand`.`id`,`brand`.`name` FROM `brandlike` INNER JOIN `brand` ON `brandlike`.`brand`=`brand`.`id` INNER JOIN `store` ON `store`.`brand`=`brand`.`id` INNER JOIN `storenewin` ON `store`.`id`=`storenewin`.`storeid` WHERE `brandlike`.`user`='$user' AND `brandlike`.`like`='1' GROUP BY `brand`.`id`")->result();
    	return $query;
    }
    
    function notificationbrandid($id)
    {
    	$query=$this->db->query("SELECT `brandid`,`storeid`,`storename`,`name`,`isid`,`description`,`from`,`to`,`timestamp` FROM 
(SELECT `brand`.`id` as `brandid`,`store`.`id` as `storeid`,`store`.`name` as `storename` ,`offers`.`header` as `name`,`offers`.`id` as `isid`, `offers`.`description` as `description` ,`offers`.`from` as `from`,`offers`.`to` as `to`,`offers`.`timestamp` as `timestamp` FROM `storeoffers` INNER JOIN `offers` ON `offers`.`id`=`storeoffers`.`offerid` INNER JOIN `store` ON `storeoffers`.`storeid`=`store`.`id` INNER JOIN `brand` ON `brand`.`id`=`store`.`brand` WHERE `brand`.`id`='$id' AND 
`offers`.`to` BETWEEN `offers`.`from` AND CURRENT_DATE GROUP BY `offers`.`id`,`store`.`id` UNION SELECT `brand`.`id` as `brandid`, `store`.`id` as `storeid`,`store`.`name` as `storename` ,`newin`.`image` as `name`,`newin`.`id` as `isid`,`newin`.`description` as `description`,'1' as `to`,'1' as `from` , `newin`.`timestamp` as `timestamp` FROM `storenewin`  INNER JOIN `newin` ON `newin`.`id`=`storenewin`.`newinid` INNER JOIN `store` ON `storenewin`.`storeid`=`store`.`id` INNER JOIN `brand` ON `brand`.`id`=`store`.`brand` WHERE `brand`.`id`='$id' GROUP BY `newin`.`id`,`store`.`id`) as `tab1` ORDER BY `tab1`.`timestamp`")->result();
    	return $query;
    }
    
    function getuserbyid($id)
	{
		$query=$this->db->query("SELECT `user`.`id` ,  `user`.`firstname` ,  `user`.`lastname` ,  `user`.`password` ,  `user`.`email` ,  `user`.`website` ,  `user`.`description` ,  `user`.`eventinfo` ,  `user`.`contact` , `user`.`address` ,  `user`.`city` ,  `user`.`pincode` ,  `user`.`dob` ,  `accesslevel`.`id` ,  `accesslevel`.`name` AS `Accesslevel` ,  `user`.`timestamp` ,  `user`.`facebookuserid` ,  `user`.`newsletterstatus` ,  `user`.`status`,`user`.`logo`,`user`.`showwebsite`,`user`.`eventsheld`,`user`.`topeventlocation`
FROM  `user` 
INNER JOIN  `accesslevel` ON  `user`.`accesslevel` =  `accesslevel`.`id` WHERE `user`.`id`='$id'")->result();
		return $query;
	}
    function createfrontenduser($name,$sirname,$email,$password,$city)
	{
		$data  = array(
			'firstname' => $name,
			'lastname' => $sirname,
			'password' =>md5($password),
			'accesslevel' => 4,
			'email' => $email,
                        'city' => $city
		);
		$query=$this->db->insert( 'user', $data );
		$id=$this->db->insert_id();
        $newdata  = array(
            'id' => $id,
			'firstname' => $name,
			'lastname' => $sirname,
			'password' =>md5($password),
			'email' => $email,
                        'city' => $city
		);
//        $sessiondata=$this->session->set_userdata($newdata);
		if(!$query)
			return  0;
		else
			return  $newdata;
	}
	
    function checkfrontendlogin($email,$password) 
    {
        $password=md5($password);
        $query=$this->db->query("SELECT `id`,`dob`,`city` FROM `user` WHERE `email`='$email' AND `password`= '$password'");
        
        if($query->num_rows > 0)
        {
            $user=$query->row();

            $newdata = array(
                'email'     => $email,
                'password' => $password,
                'id'=> $user->id,
                'dob'=> $user->dob,
                'city'=> $user->city
            );

//            $this->session->set_userdata($newdata);
            //print_r($newdata);
            return $newdata;
        }
        else
        return false;


    }
    
    
    
	public function createuserbycsv($file)
	{
        foreach ($file as $row)
        {
            $name=$row['name'];
            $password=md5($row['password']);
            $data  = array(
                'firstname' => $row['name'],
                'email' => $row['email'],
                'password' => $password,
                'contact' => $row['contact'],
                'accesslevel' => 4,
                'status' => 1
            );

            $query=$this->db->insert( 'user', $data );
        }
		if(!$query)
			return  0;
		else
			return  1;
	}
}
?>