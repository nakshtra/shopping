<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Site extends CI_Controller 
{
	public function __construct( )
	{
		parent::__construct();
		
		$this->is_logged_in();
	}
	function is_logged_in( )
	{
		$is_logged_in = $this->session->userdata( 'logged_in' );
		if ( $is_logged_in !== 'true' || !isset( $is_logged_in ) ) {
			redirect( base_url() . 'index.php/login', 'refresh' );
		} //$is_logged_in !== 'true' || !isset( $is_logged_in )
	}
	function checkaccess($access)
	{
		$accesslevel=$this->session->userdata('accesslevel');
		if(!in_array($accesslevel,$access))
			redirect( base_url() . 'index.php/site?alerterror=You do not have access to this page. ', 'refresh' );
	}
	public function index()
	{
		//$access = array("1","2");
		$access = array("1","2","3");
		$this->checkaccess($access);
		$data[ 'page' ] = 'dashboard';
		$data[ 'title' ] = 'Welcome';
		$this->load->view( 'template', $data );	
	}
	public function createuser()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['accesslevel']=$this->user_model->getaccesslevels();
		$data[ 'status' ] =$this->user_model->getstatusdropdown();
		$data[ 'brand' ] =$this->brand_model->getbranddropdown();
		$data[ 'page' ] = 'createuser';
		$data[ 'title' ] = 'Create User';
		$this->load->view( 'template', $data );	
	}
	function createusersubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('firstname','First Name','trim|required|max_length[30]');
		$this->form_validation->set_rules('lastname','Last Name','trim|max_length[30]');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[6]|max_length[30]');
		$this->form_validation->set_rules('confirmpassword','Confirm Password','trim|required|matches[password]');
		$this->form_validation->set_rules('accessslevel','Accessslevel','trim');
		$this->form_validation->set_rules('status','status','trim|');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('contact','contactno','trim');
		$this->form_validation->set_rules('website','Website','trim|max_length[50]');
		$this->form_validation->set_rules('description','Description','trim|');
		$this->form_validation->set_rules('address','Address','trim|');
		$this->form_validation->set_rules('city','City','trim|max_length[30]');
		$this->form_validation->set_rules('pincode','Pincode','trim|max_length[20]');
		$this->form_validation->set_rules('facebookuserid','facebookuserid','trim|max_length[20]');
		$this->form_validation->set_rules('store','store','trim');
		$this->form_validation->set_rules('brand','brand','trim');
		
		$this->form_validation->set_rules('email','Email','trim|valid_email');
		$this->form_validation->set_rules('status','Status','trim');
//		$this->form_validation->set_rules('dob','DOB','trim');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'status' ] =$this->user_model->getstatusdropdown();
			$data['accesslevel']=$this->user_model->getaccesslevels();
		  $data[ 'brand' ] =$this->brand_model->getbranddropdown();
			$data['page']='createuser';
			$data['title']='Create New User';
			$this->load->view('template',$data);
		}
		else
		{
//            print_r($_POST);
            $website=$this->input->post('website');
            $store=$this->input->post('store');
            $brand=$this->input->post('brand');
            $description=$this->input->post('description');
            $address=$this->input->post('address');
            $city=$this->input->post('city');
            $pincode=$this->input->post('pincode');
            $dob=$this->input->post('dob');
			$password=$this->input->post('password');
			if($dob != "")
			{
				$dob = date("Y-m-d",strtotime($dob));
			}
//            echo $dob;
			$accesslevel=$this->input->post('accesslevel');
			$email=$this->input->post('email');
			$contact=$this->input->post('contact');
			$status=$this->input->post('status');
			$facebookuserid=$this->input->post('facebookuserid');
			$firstname=$this->input->post('firstname');
			$lastname=$this->input->post('lastname');
			if($this->user_model->create($firstname,$lastname,$dob,$password,$accesslevel,$email,$contact,$status,$facebookuserid,$website,$description,$address,$city,$pincode,$store,$brand)==0)
			$data['alerterror']="New user could not be created.";
			else
			$data['alertsuccess']="User created Successfully.";
			
			$data['table']=$this->user_model->viewusers();
			$data['redirect']="site/viewusers";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
	function viewusers()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['table']=$this->user_model->viewusers();
		$data['page']='viewusers';
		$data['title']='View Users';
		$this->load->view('template',$data);
	}
    
    function viewsponsor()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['table']=$this->sponsor_model->viewall();
		$data['page']='viewsponsor';
		$data['title']='View Sponsor';
		$this->load->view('template',$data);
	}
	function viewuserinterestevents()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['before']=$this->user_model->beforeedit($this->input->get('id'));
		$data['table']=$this->user_model->userinterestevents($this->input->get('id'));
		$data['page']='viewuserinterestevents';
		$data['page2']='block/userblock';
		$data['title']='View User Interest Events';
		$this->load->view('template',$data);
	}
	function edituser()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'status' ] =$this->user_model->getstatusdropdown();
		$data['accesslevel']=$this->user_model->getaccesslevels();
		$data['before']=$this->user_model->beforeedit($this->input->get('id'));
		$data[ 'brand' ] =$this->brand_model->getbranddropdown();
		$data['page']='edituser';
		$data['page2']='block/userblock';
		$data['title']='Edit User';
		$this->load->view('template',$data);
	}
	function editusersubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('password','Password','trim|min_length[6]|max_length[30]');
		$this->form_validation->set_rules('confirmpassword','Confirm Password','trim|matches[password]');
		$this->form_validation->set_rules('accessslevel','Accessslevel','trim');
		$this->form_validation->set_rules('status','status','trim|');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('contact','contactno','trim');
		$this->form_validation->set_rules('website','Website','trim|max_length[50]');
		$this->form_validation->set_rules('description','Description','trim|');
		$this->form_validation->set_rules('address','Address','trim');
		$this->form_validation->set_rules('store','store','trim');
		$this->form_validation->set_rules('brand','Address','trim');
		$this->form_validation->set_rules('city','City','trim|max_length[30]');
		$this->form_validation->set_rules('pincode','Pincode','trim|max_length[20]');
        
		$this->form_validation->set_rules('fname','First Name','trim|required|max_length[30]');
		$this->form_validation->set_rules('lname','Last Name','trim|max_length[30]');
		$this->form_validation->set_rules('email','Email','trim|valid_email');
		$this->form_validation->set_rules('status','Status','trim');
		$this->form_validation->set_rules('dob','DOB','trim');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'status' ] =$this->user_model->getstatusdropdown();
			$data['accesslevel']=$this->user_model->getaccesslevels();
			$data['before']=$this->user_model->beforeedit($this->input->post('id'));
		    $data[ 'brand' ] =$this->brand_model->getbranddropdown();
			$data['page']='edituser';
			$data['page2']='block/userblock';
			$data['title']='Edit User';
			$this->load->view('template',$data);
		}
		else
		{
            $website=$this->input->post('website');
            $store=$this->input->post('store');
            $brand=$this->input->post('brand');
            $description=$this->input->post('description');
            $address=$this->input->post('address');
            $city=$this->input->post('city');
            $pincode=$this->input->post('pincode');
			$id=$this->input->post('id');
			$password=$this->input->post('password');
			$dob=$this->input->post('dob');
			if($dob != "")
			{
				$dob = date("Y-m-d",strtotime($dob));
			}
			$accesslevel=$this->input->post('accesslevel');
			$contact=$this->input->post('contact');
			$status=$this->input->post('status');
			$facebookuserid=$this->input->post('facebookuserid');
			$fname=$this->input->post('fname');
			$lname=$this->input->post('lname');
			if($this->user_model->edit($id,$fname,$lname,$dob,$password,$accesslevel,$contact,$status,$facebookuserid,$website,$description,$address,$city,$pincode,$store,$brand)==0)
			$data['alerterror']="User Editing was unsuccesful";
			else
			$data['alertsuccess']="User edited Successfully.";
			
			$data['redirect']="site/viewusers";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
			
		}
	}
	function editaddress()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'status' ] =$this->user_model->getstatusdropdown();
		$data['accesslevel']=$this->user_model->getaccesslevels();
		$data['before']=$this->user_model->beforeedit($this->input->get('id'));
		$data['page']='editaddress';
		$data['page2']='block/userblock';
		$data['title']='Edit User';
		$this->load->view('template',$data);
	}
	function editaddresssubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		
		$this->form_validation->set_rules('address','address','trim');
		$this->form_validation->set_rules('facebookuserid','facebookuserid','trim');
		$this->form_validation->set_rules('city','city','trim');
		$this->form_validation->set_rules('pincode','pincode','trim');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'status' ] =$this->user_model->getstatusdropdown();
			$data['accesslevel']=$this->user_model->getaccesslevels();
			$data['before']=$this->user_model->beforeedit($this->input->post('id'));
			$data['page']='editaddress';
			$data['page2']='block/userblock';
			$data['title']='Edit User';
			$this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->post('id');
			$address=$this->input->post('address');
			$city=$this->input->post('city');
			$pincode=$this->input->post('pincode');
			if($this->user_model->editaddress($id,$address,$city,$pincode)==0)
			$data['alerterror']="User Editing was unsuccesful";
			else
			$data['alertsuccess']="User edited Successfully.";
			$data['table']=$this->user_model->viewusers();
			$data['redirect']="site/editaddress?id=".$id;
			//$data['other']="template=$template";
			$this->load->view("redirect2",$data);
			
		}
	}
	function deleteuser()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->user_model->deleteuser($this->input->get('id'));
		$data['table']=$this->user_model->viewusers();
		$data['alertsuccess']="User Deleted Successfully";
		$data['page']='viewusers';
		$data['title']='View Users';
		$this->load->view('template',$data);
	}
	function changeuserstatus()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->user_model->changestatus($this->input->get('id'));
		$data['table']=$this->user_model->viewusers();
		$data['alertsuccess']="Status Changed Successfully";
		$data['redirect']="site/viewusers";
        $data['other']="template=$template";
        $this->load->view("redirect",$data);
	}
    
    function changesponsorstatus()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->sponsor_model->changestatus($this->input->get('user'),$this->input->get('event'));
		$data['table']=$this->sponsor_model->viewall();
		$data['alertsuccess']="Status Changed Successfully";
        
		$data['redirect']="site/viewsponsor";
        
        $this->load->view("redirect",$data);
	}
    
    
    /*-----------------User/Organizer Finctions added by avinash for frontend APIs---------------*/
    public function update()
	{
        $id=$this->input->get('id');
        $firstname=$this->input->get('firstname');
        $lastname=$this->input->get('lastname');
        $password=$this->input->get('password');
        $password=md5($password);
        $email=$this->input->get('email');
        $website=$this->input->get('website');
        $description=$this->input->get('description');
        $eventinfo=$this->input->get('eventinfo');
        $contact=$this->input->get('contact');
        $address=$this->input->get('address');
        $city=$this->input->get('city');
        $pincode=$this->input->get('pincode');
        $dob=$this->input->get('dob');
       // $accesslevel=$this->input->get('accesslevel');
        $accesslevel=2;
        $timestamp=$this->input->get('timestamp');
        $facebookuserid=$this->input->get('facebookuserid');
        $newsletterstatus=$this->input->get('newsletterstatus');
        $status=$this->input->get('status');
        $logo=$this->input->get('logo');
        $showwebsite=$this->input->get('showwebsite');
        $eventsheld=$this->input->get('eventsheld');
        $topeventlocation=$this->input->get('topeventlocation');
        $data['json']=$this->user_model->update($id,$firstname,$lastname,$password,$email,$website,$description,$eventinfo,$contact,$address,$city,$pincode,$dob,$accesslevel,$timestamp,$facebookuserid,$newsletterstatus,$status,$logo,$showwebsite,$eventsheld,$topeventlocation);
        print_r($data);
		//$this->load->view('json',$data);
	}
	public function finduser()
	{
        $data['json']=$this->user_model->viewall();
        print_r($data);
		//$this->load->view('json',$data);
	}
    public function findoneuser()
	{
        $id=$this->input->get('id');
        $data['json']=$this->user_model->viewone($id);
        print_r($data);
		//$this->load->view('json',$data);
	}
    public function deleteoneuser()
	{
        $id=$this->input->get('id');
        $data['json']=$this->user_model->deleteone($id);
		//$this->load->view('json',$data);
	}
    public function login()
    {
        $email=$this->input->get("email");
        $password=$this->input->get("password");
        $data['json']=$this->user_model->login($email,$password);
        //$this->load->view('json',$data);
    }
    public function authenticate()
    {
        $data['json']=$this->user_model->authenticate();
        //$this->load->view('json',$data);
    }
    public function signup()
    {
        $email=$this->input->get_post("email");
        $password=$this->input->get_post("password");
        $data['json']=$this->user_model->signup($email,$password);
        //$this->load->view('json',$data);
        
    }
    public function logout()
    {
        $this->session->sess_destroy();
        $data['json']=true;
        //$this->load->view('json',$data);
    }
    
    
    
    /*-----------------End of User/Organizer functions----------------------------------*/
    
    
    
	//category
    
	function viewcategory()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['table']=$this->category_model->viewcategory();
		$data['page']='viewcategory';
		$data['title']='View category';
		$this->load->view('template',$data);
	}
	function viewsubcategory()
	{
		$access = array("1");
		$this->checkaccess($access);
		//$data['table']=$this->category_model->viewsubcategory();
        $brandid=$this->input->get('brandid');
        $categoryid=$this->input->get('id');
        $data['check']=$this->category_model->selectedcategory($brandid,$categoryid);
        $data['brandcategoryid']=$this->category_model->getbrandcategoryid($brandid,$categoryid);
		$data['page']='viewsubcategory';
		$data['title']='View Sub-category';
		$this->load->view('template',$data);
	}
     function editsubcategorysubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('brandcategoryid','brandcategoryid','trim|required');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$brandid=$this->input->get('brandid');
        $categoryid=$this->input->get('id');
        $data['check']=$this->category_model->selectedcategory($brandid,$categoryid);
        $data['brandcategoryid']=$this->category_model->getbrandcategoryid($brandid,$categoryid);
		$data['page']='viewsubcategory';
		$data['title']='View Sub-category';
		$this->load->view('template',$data);
		}
		else
		{
			$brandcategoryid=$this->input->post('brandcategoryid');
			$men=$this->input->post('men');
			$women=$this->input->post('women');
			$kids=$this->input->post('kids');
            echo "men=".$men;
            if($men=="1")
               {
                $this->category_model->editsubcategorysubmit($brandcategoryid,$men);
                
               }
               else
               {
                   echo "else";
               $this->category_model->deletesubcategorysubmit($brandcategoryid,1);
               }
               
            if($women=="2")
               {
                $this->category_model->editsubcategorysubmit($brandcategoryid,$women);
               }
               else
               {
               $this->category_model->deletesubcategorysubmit($brandcategoryid,2);
               }
            if($kids=="3")
               {
                $this->category_model->editsubcategorysubmit($brandcategoryid,$kids);
               }
               else
               {
               $this->category_model->deletesubcategorysubmit($brandcategoryid,3);
               }
			$brandid=$this->input->get('brandid');
        $categoryid=$this->input->get('id');
        $data['check']=$this->category_model->selectedcategory($brandid,$categoryid);
        $data['brandcategoryid']=$this->category_model->getbrandcategoryid($brandid,$categoryid);
		$data['page']='viewsubcategory';
		$data['title']='View Sub-category';
		$this->load->view('template',$data);
			//$data['other']="template=$template";
			//$this->load->view("redirect",$data);
			/*$data['page']='viewusers';
			$data['title']='View Users';
			$this->load->view('template',$data);*/
		}
	}
	public function createcategory()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'status' ] =$this->category_model->getstatusdropdown();
		$data['category']=$this->category_model->getcategorydropdown();
		$data[ 'page' ] = 'createcategory';
		$data[ 'title' ] = 'Create category';
		$this->load->view( 'template', $data );	
	}
    public function createbrandcategory()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'status' ] =$this->category_model->getstatusdropdown();
		$data['category']=$this->category_model->getcategorydropdown();
		$data[ 'page' ] = 'createbrandcategory';
		$data[ 'title' ] = 'Create Brand category';
		$this->load->view( 'template', $data );	
	}
	function createcategorysubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('parent','parent','trim|');
		$this->form_validation->set_rules('status','status','trim|');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'status' ] =$this->category_model->getstatusdropdown();
			$data['category']=$this->category_model->getcategorydropdown();
			$data[ 'page' ] = 'createcategory';
			$data[ 'title' ] = 'Create category';
			$this->load->view('template',$data);
		}
		else
		{
			$name=$this->input->post('name');
			$parent=$this->input->post('parent');
			$status=$this->input->post('status');
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
			}
			if($this->category_model->createcategory($name,$parent,$status,$image)==0)
			$data['alerterror']="New category could not be created.";
			else
			$data['alertsuccess']="category  created Successfully.";
			$data['table']=$this->category_model->viewcategory();
			$data['redirect']="site/viewcategory";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
    function createbrandcategorysubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		//$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('brandid','Brandid','trim|');
		$this->form_validation->set_rules('category','Category','trim|');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'status' ] =$this->category_model->getstatusdropdown();
			$data['category']=$this->category_model->getcategorydropdown();
			$data[ 'page' ] = 'createcategory';
			$data[ 'title' ] = 'Create category';
			$this->load->view('template',$data);
		}
		else
		{
			$brandid=$this->input->get_post('brandid');
			$categoryid=$this->input->post('category');
			$parent=$this->input->post('parent');
			$status=$this->input->post('status');
			if($this->category_model->createbrandcategory($brandid,$categoryid)==0)
			$data['alerterror']="New Brand category could not be created.";
			else
			$data['alertsuccess']="Brand category  created Successfully.";
			$data['table']=$this->category_model->viewonebrandcategories($brandid);
			$data['redirect']="site/viewonebrandcategories?brandid=".$brandid;
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
	function viewonebrandcategories()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['table']=$this->category_model->viewonebrandcategories($this->input->get('brandid'));
		$data['tablemain']=$this->category_model->viewmaincategory();
		$data['hastypes']=$this->category_model->viewcategorytypes();
		$data['subcategory']=$this->category_model->viewallsubcategory();
        $data['category']=$this->brand_model->getcategory();
		$data['page']='viewonebrandcategories';
		$data['title']='View category';
		$this->load->view('template',$data);
	}
	function editcategory()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['before']=$this->category_model->beforeeditcategory($this->input->get('id'));
		$data['category']=$this->category_model->getcategorydropdown();
		$data[ 'status' ] =$this->category_model->getstatusdropdown();
		$data['page']='editcategory';
		$data['title']='Edit category';
		$this->load->view('template',$data);
	}
	function editcategorysubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('parent','parent','trim|');
		$this->form_validation->set_rules('status','status','trim|');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'status' ] =$this->category_model->getstatusdropdown();
			$data['category']=$this->category_model->getcategorydropdown();
			$data['before']=$this->category_model->beforeeditcategory($this->input->post('id'));
			$data['page']='editcategory';
			$data['title']='Edit category';
			$this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->post('id');
			$name=$this->input->post('name');
			$parent=$this->input->post('parent');
			$status=$this->input->post('status');
            
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
			}
            
            if($image=="")
            {
            $image=$this->category_model->getcategoryimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }
            
			if($this->category_model->editcategory($id,$name,$parent,$status,$image)==0)
			$data['alerterror']="category Editing was unsuccesful";
			else
			$data['alertsuccess']="category edited Successfully.";
			$data['table']=$this->category_model->viewcategory();
			$data['redirect']="site/viewcategory";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
			/*$data['page']='viewusers';
			$data['title']='View Users';
			$this->load->view('template',$data);*/
		}
	}
   
	function deletecategory()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->category_model->deletecategory($this->input->get('id'));
		$data['table']=$this->category_model->viewcategory();
		$data['alertsuccess']="category Deleted Successfully";
		$data['page']='viewcategory';
		$data['title']='View category';
		$this->load->view('template',$data);
	}
	
	//topic
    //Offer
	public function createoffer()
	{
		$access = array("1");
		$this->checkaccess($access);
		//$data[ 'status' ] =$this->user_model->getstatusdropdown();
		//$data['topic']=$this->topic_model->gettopicdropdown();
        $data['brand']=$this->brand_model->getbranddropdown();
        
		$data[ 'page' ] = 'createoffer';
		$data[ 'title' ] = 'Create offer';
		$this->load->view( 'template', $data );	
	}
	function createoffersubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
        print_r($_POST);
		$this->form_validation->set_rules('header','header','trim|required');
		$this->form_validation->set_rules('description','description','trim|');
//		$this->form_validation->set_rules('from','From','trim');
//		$this->form_validation->set_rules('to','To','trim');
		$this->form_validation->set_rules('brand','Brand','trim');
//		$this->form_validation->set_rules('storeid','storeid','trim');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
//			$data[ 'status' ] =$this->user_model->getstatusdropdown();
//			$data['offer']=$this->offer_model->getofferdropdown();
			$data[ 'page' ] = 'createoffer';
			$data[ 'title' ] = 'Create offer';
			$this->load->view('template',$data);
		}
		else
		{
//            print_r($_POST);
            //echo "<br>";
			$header=$this->input->post('header');
			$description=$this->input->post('description');
			$from=$this->input->post('from');
			$to=$this->input->post('to');
			$brand=$this->input->post('brand');
			$storeid=$this->input->post('storeid');
            
//            print_r($storeid);
            
            if($from != "")
			{
				$from = date("Y-m-d",strtotime($from));
			}
            if($to != "")
			{
				$to = date("Y-m-d",strtotime($to));
			}
			if($this->offer_model->createoffer($header,$description,$from,$to,$brand,$storeid)==0)
			$data['alerterror']="New offer could not be created.";
			else
			$data['alertsuccess']="offer  created Successfully.";
			$data['table']=$this->offer_model->viewoffer();
			$data['redirect']="site/viewoffer";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
    
    //image gallery
     function viewgallery()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['table']=$this->imagegallery_model->viewnewin();
		$data['page']='viewgallery';
		$data['title']='View gallery';
		$this->load->view('template',$data);
	}     
    
	public function creategallery()
	{
		$access = array("1");
		$this->checkaccess($access);
		//$data[ 'status' ] =$this->user_model->getstatusdropdown();
		//$data['topic']=$this->topic_model->gettopicdropdown();
        $data['brand']=$this->brand_model->getbranddropdown();
		$data[ 'page' ] = 'creategallery';
		$data[ 'title' ] = 'Create Gallery';
		$this->load->view( 'template', $data );	
	}
    function creategallerysubmit()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		//$this->form_validation->set_rules('image','Image','trim|required');
		$this->form_validation->set_rules('description','Description','trim');
		$this->form_validation->set_rules('brand','brand','trim');
		//$this->form_validation->set_rules('storeid','storeid','trim');
        
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			
            $data['brand']=$this->brand_model->getbranddropdown();
            $data[ 'page' ] = 'creategallery';
            $data[ 'title' ] = 'Create Gallery';
            $this->load->view( 'template', $data );	
		}
		else
		{
			//$image=$this->input->post('image');
			$brand=$this->input->post('brand');
			$description=$this->input->post('description');
			$storeid=$this->input->post('storeid');
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
			}
			if($this->imagegallery_model->createnewin($image,$description,$brand,$storeid)==0)
			$data['alerterror']="New Image in gallery could not be created.";
			else
			$data['alertsuccess']="Image in gallery created Successfully.";
			
			$data['table']=$this->imagegallery_model->viewgallery();
			$data['redirect']="site/viewgallery";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}

    
	function editgallery()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['before']=$this->imagegallery_model->beforeeditnewin($this->input->get('id'));
        //$data['store']=$this->store_model->getstorebybrand($data['before']->brandid);
        $data['brand']=$this->brand_model->getbranddropdown();
        
        $data['store']=$this->store_model->getstorebybrandfordropdown($data['before']->brandid);
        $data['selectedstore']=$this->store_model->getstorebynewin($this->input->get('id'));
        $data['brand']=$this->brand_model->getbranddropdown();
		$data['page']='editgallery';
		$data['title']='Edit Gallery';
		$this->load->view('template',$data);
	}
    
    function editgallerysubmit()
	{
		$access = array("1","2");
		$this->checkaccess($access);
        
		$this->form_validation->set_rules('description','Description','trim');
		$this->form_validation->set_rules('brand','brand','trim');
		//$this->form_validation->set_rules('storeid','storeid','trim');
        
		if($this->form_validation->run() == FALSE)	
		{
            $data['alerterror'] = validation_errors();
			
            $data['before']=$this->imagegallery_model->beforeeditnewin($this->input->get('id'));
            //$data['store']=$this->store_model->getstorebybrand($data['before']->brandid);
            $data['brand']=$this->brand_model->getbranddropdown();

            $data['store']=$this->store_model->getstorebybrandfordropdown($data['before']->brandid);
            $data['selectedstore']=$this->store_model->getstorebynewin($this->input->get('id'));
            $data['brand']=$this->brand_model->getbranddropdown();
            $data['page']='editgallery';
            $data['title']='Edit Gallery';
            $this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->post('id');
			$brand=$this->input->post('brand');
			$description=$this->input->post('description');
			$storeid=$this->input->post('storeid');
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
			}
            if($image=="")
            {
            $image=$this->imagegallery_model->getnewinimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }
			if($this->imagegallery_model->editnewin($id,$image,$description,$brand,$storeid)==0)
			$data['alerterror']="Image Gallery Editing was unsuccesful";
			else
			$data['alertsuccess']="Image Gallery edited Successfully.";
			
			$data['redirect']="site/viewgallery";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
			
		}
	}
	
	function deletegallery()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->imagegallery_model->deletenewin($this->input->get('id'));
		$data['table']=$this->imagegallery_model->viewnewin();
		$data['alertsuccess']="Image Deleted Successfully";
		$data['page']='viewgallery';
		$data['title']='View Image Gallery';
		$this->load->view('template',$data);
	}
    
    
	function deleteallgallery()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->imagegallery_model->deleteallgallery();
		$data['table']=$this->imagegallery_model->viewgallery();
		$data['alertsuccess']="ALL New In Deleted Successfully";
		$data['page']='viewgallery';
		$data['title']='View New In';
		$this->load->view('template',$data);
	}
    
    //new in
    
     function viewnewin()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['table']=$this->imagegallery_model->viewnewin();
		$data['page']='viewnewin';
		$data['title']='View New In';
		$this->load->view('template',$data);
	}  
    
     
	public function createnewin()
	{
		$access = array("1");
		$this->checkaccess($access);
        $data['brand']=$this->brand_model->getbranddropdown();
		$data[ 'page' ] = 'createnewin';
		$data[ 'title' ] = 'Create New In';
		$this->load->view( 'template', $data );	
	}
    function createnewinsubmit()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		//$this->form_validation->set_rules('image','Image','trim|required');
		$this->form_validation->set_rules('description','Description','trim|required');
        
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			
            $data['brand']=$this->brand_model->getbranddropdown();
            $data[ 'page' ] = 'createnewin';
            $data[ 'title' ] = 'Create New In';
            $this->load->view( 'template', $data );	
		}
		else
		{
			//$image=$this->input->post('image');
			$description=$this->input->post('description');
			$brand=$this->input->post('brand');
			$storeid=$this->input->post('storeid');
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$logo="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
			}
			if($this->imagegallery_model->createnewin($image,$description,$brand,$storeid)==0)
			$data['alerterror']="New In could not be created.";
			else
			$data['alertsuccess']="New In created Successfully.";
			
			$data['table']=$this->imagegallery_model->viewnewin();
			$data['redirect']="site/viewnewin";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}

    
	function editnewin()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['before']=$this->imagegallery_model->beforeeditnewin($this->input->get('id'));
        $data['brand']=$this->brand_model->getbranddropdown();
        
        $data['store']=$this->store_model->getstorebybrandfordropdown($data['before']->brandid);
        $data['selectedstore']=$this->store_model->getstorebynewin($this->input->get('id'));
        $data['brand']=$this->brand_model->getbranddropdown();
		$data['page']='editnewin';
		$data['title']='Edit New in';
		$this->load->view('template',$data);
	}
    
    function editnewinsubmit()
	{
		$access = array("1","2");
		$this->checkaccess($access);
        
		$this->form_validation->set_rules('description','Description','trim|required');
        
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			
            $data['before']=$this->imagegallery_model->beforeeditnewin($this->input->get('id'));
            $data['brand']=$this->brand_model->getbranddropdown();

            $data['store']=$this->store_model->getstorebybrandfordropdown($data['before']->brandid);
            $data['selectedstore']=$this->store_model->getstorebynewin($this->input->get('id'));
            $data['brand']=$this->brand_model->getbranddropdown();
//			$data['page2']='block/eventblock';
			$data['page']='editnewin';
			$data['title']='Edit New in';
			$this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->post('id');
			$description=$this->input->post('description');
			$brand=$this->input->post('brand');
			$storeid=$this->input->post('storeid');
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
			}
            
            if($image=="")
            {
            $image=$this->imagegallery_model->getnewinimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }
			if($this->imagegallery_model->editnewin($id,$image,$description,$brand,$storeid)==0)
			$data['alerterror']="New In Editing was unsuccesful";
			else
			$data['alertsuccess']="New In edited Successfully.";
			
			$data['redirect']="site/viewnewin";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
			
		}
	}
	
	function deletenewin()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->imagegallery_model->deletenewin($this->input->get('id'));
		$data['table']=$this->imagegallery_model->viewnewin();
		$data['alertsuccess']="New In Deleted Successfully";
		$data['page']='viewnewin';
		$data['title']='View New In';
		$this->load->view('template',$data);
	}
    
	function deleteallnewin()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->imagegallery_model->deleteallnewin();
		$data['table']=$this->imagegallery_model->viewnewin();
		$data['alertsuccess']="ALL New In Deleted Successfully";
		$data['page']='viewnewin';
		$data['title']='View New In';
		$this->load->view('template',$data);
	}
    
    
    
    
    
	function viewoffer()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['table']=$this->offer_model->viewoffer();
		$data['page']='viewoffer';
		$data['title']='View offer';
		$this->load->view('template',$data);
	}
	function editoffer()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['before']=$this->offer_model->beforeeditoffer($this->input->get('id'));
        $data['store']=$this->store_model->getstorebybrandfordropdown($data['before']->brandid);
        $data['selectedstore']=$this->store_model->getstorebyoffers($this->input->get('id'));
        $data['brand']=$this->brand_model->getbranddropdown();
		$data['page']='editoffer';
		$data['title']='Edit offer';
		$this->load->view('template',$data);
	}
	function editoffersubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
        print_r($_POST);
		$this->form_validation->set_rules('header','header','trim|required');
		$this->form_validation->set_rules('description','description','trim|');
		$this->form_validation->set_rules('from','From','trim');
		$this->form_validation->set_rules('to','To','trim');
		//$this->form_validation->set_rules('brand','Brand','trim');
		//$this->form_validation->set_rules('storeid','storeid','trim');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
//			$data[ 'status' ] =$this->user_model->getstatusdropdown();
//			$data['topic']=$this->topic_model->gettopicdropdown();
			$data['before']=$this->offer_model->beforeeditoffer($this->input->post('id'));
			$data['page']='editoffer';
			$data['title']='Edit offer';
			$this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->post('id');
			$header=$this->input->post('header');
			$description=$this->input->post('description');
			$from=$this->input->post('from');
			$to=$this->input->post('to');
			$brand=$this->input->get_post('brand');
			$storeid=$this->input->post('storeid');
            echo $brand;
            if($from != "")
			{
				$from = date("Y-m-d",strtotime($from));
			}
            if($to != "")
			{
				$to = date("Y-m-d",strtotime($to));
			}
			if($this->offer_model->editoffer($id,$header,$description,$from,$to,$brand,$storeid)==0)
			$data['alerterror']="offer Editing was unsuccesful";
			else
			$data['alertsuccess']="offer edited Successfully.";
			$data['table']=$this->offer_model->viewoffer();
			$data['redirect']="site/viewoffer";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
	function deleteoffer()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->offer_model->deleteoffer($this->input->get('id'));
		$data['table']=$this->offer_model->viewoffer();
		$data['alertsuccess']="offer Deleted Successfully";
		$data['page']='viewoffer';
		$data['title']='View offer';
		$this->load->view('template',$data);
	}
    
    
	function deletealloffers()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->offer_model->deletealloffers();
		$data['table']=$this->offer_model->viewoffer();
		$data['alertsuccess']="ALL Offers Deleted Successfully";
		$data['page']='viewoffer';
		$data['title']='View Offer';
		$this->load->view('template',$data);
	}
    
	//discountcoupon
	public function creatediscountcoupon()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'ticketevent' ] =$this->ticketevent_model->getticketevent();
		$data[ 'page' ] = 'creatediscountcoupon';
		$data[ 'title' ] = 'Create discountcoupon';
		$this->load->view( 'template', $data );	
	}
	function creatediscountcouponsubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','name','trim|');
		$this->form_validation->set_rules('couponcode','couponcode','trim|');
		$this->form_validation->set_rules('percent','percent','trim|');
		$this->form_validation->set_rules('amount','amount','trim|');
		$this->form_validation->set_rules('minimumticket','minimumticket','trim|');
		$this->form_validation->set_rules('maximumticket','maximumticket','trim|');
		$this->form_validation->set_rules('ticketevent','ticketevent','trim|');
		$this->form_validation->set_rules('userperuser','userperuser','trim|');
		$this->form_validation->set_rules('starttime','Start Time','trim|required');
		$this->form_validation->set_rules('endtime','End Time','trim|required');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'ticketevent' ] =$this->ticketevent_model->getticketevent();
			$data[ 'page' ] = 'creatediscountcoupon';
			$data[ 'title' ] = 'Create discountcoupon';
			$this->load->view('template',$data);
		}
		else
		{
			$name=$this->input->post('name');
			$percent=$this->input->post('percent');
			$amount=$this->input->post('amount');
			$couponcode=$this->input->post('couponcode');
			$minimumticket=$this->input->post('minimumticket');
			$maximumticket=$this->input->post('maximumticket');
			$ticketevent=$this->input->post('ticketevent');
			$userperuser=$this->input->post('userperuser');
			$starttime=date("H:i",strtotime($this->input->post('starttime')));
			$starttime = $starttime.":00";
			$starttime = date("H:i:s",strtotime($starttime));
			$endtime=date("H:i",strtotime($this->input->post('endtime')));
			$endtime = $endtime.":00";
			$endtime = date("H:i:s",strtotime($endtime));
			if($this->discountcoupon_model->creatediscountcoupon($name,$percent,$amount,$minimumticket,$maximumticket,$ticketevent,$couponcode,$userperuser,$starttime,$endtime)==0)
			$data['alerterror']="New discountcoupon could not be created.";
			else
			$data['alertsuccess']="discountcoupon  created Successfully.";
			$data['table']=$this->discountcoupon_model->viewdiscountcoupon();
			$data['redirect']="site/viewdiscountcoupon";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
	function viewdiscountcoupon()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['table']=$this->discountcoupon_model->viewdiscountcoupon();
		$data['page']='viewdiscountcoupon';
		$data['title']='View discountcoupon';
		$this->load->view('template',$data);
	}
	function editdiscountcoupon()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['before']=$this->discountcoupon_model->beforeeditdiscountcoupon($this->input->get('id'));
		$data[ 'ticketevent' ] =$this->ticketevent_model->getticketevent();
		$data['page']='editdiscountcoupon';
		$data['title']='Edit discountcoupon';
		$this->load->view('template',$data);
	}
	function editdiscountcouponsubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','name','trim|');
		$this->form_validation->set_rules('couponcode','couponcode','trim|');
		$this->form_validation->set_rules('percent','percent','trim|');
		$this->form_validation->set_rules('amount','amount','trim|');
		$this->form_validation->set_rules('minimumticket','minimumticket','trim|');
		$this->form_validation->set_rules('maximumticket','maximumticket','trim|');
		$this->form_validation->set_rules('ticketevent','ticketevent','trim|');
		$this->form_validation->set_rules('userperuser','userperuser','trim|');
		$this->form_validation->set_rules('starttime','Start Time','trim|required');
		$this->form_validation->set_rules('endtime','End Time','trim|required');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['before']=$this->discountcoupon_model->beforeeditdiscountcoupon($this->input->post('id'));
			$data[ 'ticketevent' ] =$this->ticketevent_model->getticketevent();
			$data['page']='editdiscountcoupon';
			$data['title']='Edit discountcoupon';
			$this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->post('id');
			$name=$this->input->post('name');
			$percent=$this->input->post('percent');
			$amount=$this->input->post('amount');
			$couponcode=$this->input->post('couponcode');
			$minimumticket=$this->input->post('minimumticket');
			$maximumticket=$this->input->post('maximumticket');
			$ticketevent=$this->input->post('ticketevent');
			$userperuser=$this->input->post('userperuser');
			$starttime=date("H:i",strtotime($this->input->post('starttime')));
			$starttime = $starttime.":00";
			$starttime = date("H:i:s",strtotime($starttime));
			$endtime=date("H:i",strtotime($this->input->post('endtime')));
			$endtime = $endtime.":00";
			$endtime = date("H:i:s",strtotime($endtime));
			if($this->discountcoupon_model->editdiscountcoupon($id,$name,$percent,$amount,$minimumticket,$maximumticket,$ticketevent,$couponcode,$userperuser,$starttime,$endtime)==0)
			$data['alerterror']="discountcoupon Editing was unsuccesful";
			else
			$data['alertsuccess']="discountcoupon edited Successfully.";
			$data['table']=$this->discountcoupon_model->viewdiscountcoupon();
			$data['redirect']="site/viewdiscountcoupon";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
			/*$data['discountcoupon']='viewusers';
			$data['title']='View Users';
			$this->load->view('template',$data);*/
		}
	}
	function deletediscountcoupon()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->discountcoupon_model->deletediscountcoupon($this->input->get('id'));
		$data['table']=$this->discountcoupon_model->viewdiscountcoupon();
		$data['alertsuccess']="discountcoupon Deleted Successfully";
		$data['page']='viewdiscountcoupon';
		$data['title']='View discountcoupon';
		$this->load->view('template',$data);
	}
	public function createorganizer()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'page' ] = 'createorganizer';
		$data[ 'title' ] = 'Create organizer';
		$data['user']=$this->user_model->getorganizeruser();
		$this->load->view( 'template', $data );	
	}
	function createorganizersubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|');
		$this->form_validation->set_rules('contact','contactno','trim');
		
		$this->form_validation->set_rules('name','Name','trim|required|max_length[30]');
		$this->form_validation->set_rules('description','description','trim');
		$this->form_validation->set_rules('info','info','trim');
		$this->form_validation->set_rules('website','website','trim');
		$this->form_validation->set_rules('user','user','trim');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['page']='createorganizer';
			$data['title']='Create New organizer';
			$data['user']=$this->user_model->getorganizeruser();
			$this->load->view('template',$data);
		}
		else
		{
			$info=$this->input->post('info');
			$email=$this->input->post('email');
			$website=$this->input->post('website');
			$contact=$this->input->post('contact');
			$name=$this->input->post('name');
			$description=$this->input->post('description');
			$user=$this->input->post('user');
			if($this->organizer_model->create($name,$description,$email,$contact,$info,$website,$user)==0)
			$data['alerterror']="New organizer could not be created.";
			else
			$data['alertsuccess']="organizer created Successfully.";
			
			$data['table']=$this->organizer_model->vieworganizers();
			$data['redirect']="site/vieworganizers";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
	
	function editorganizer()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['before']=$this->organizer_model->beforeedit($this->input->get('id'));
		$data['user']=$this->user_model->getorganizeruser();
		$data['page']='editorganizer';
		$data['title']='Edit organizer';
		$this->load->view('template',$data);
	}
	function editorganizersubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|');
		$this->form_validation->set_rules('contact','contactno','trim');
		
		$this->form_validation->set_rules('name','Name','trim|required|max_length[30]');
		$this->form_validation->set_rules('description','description','trim');
		$this->form_validation->set_rules('info','info','trim');
		$this->form_validation->set_rules('website','website','trim');
		$this->form_validation->set_rules('user','user','trim');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['user']=$this->user_model->getorganizeruser();
			$data['before']=$this->organizer_model->beforeedit($this->input->post('id'));
			$data['page']='editorganizer';
			$data['title']='Edit organizer';
			$this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->post('id');
			$info=$this->input->post('info');
			$email=$this->input->post('email');
			$website=$this->input->post('website');
			$contact=$this->input->post('contact');
			$name=$this->input->post('name');
			$description=$this->input->post('description');
			$user=$this->input->post('user');
			if($this->organizer_model->edit($id,$name,$description,$email,$contact,$info,$website,$user)==0)
			$data['alerterror']="organizer Editing was unsuccesful";
			else
			$data['alertsuccess']="organizer edited Successfully.";
			
			$data['redirect']="site/vieworganizers";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
			
		}
	}
	
	function deleteorganizer()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->organizer_model->deleteorganizer($this->input->get('id'));
		$data['table']=$this->organizer_model->vieworganizers();
		$data['alertsuccess']="organizer Deleted Successfully";
		$data['page']='vieworganizers';
		$data['title']='View organizers';
		$this->load->view('template',$data);
	}
    
	//City
    
    function viewcity()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['table']=$this->city_model->viewcity();
		$data['page']='viewcity';
		$data['title']='View City';
		$this->load->view('template',$data);
	} 
    function viewonecitylocations()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['table']=$this->city_model->viewonecitylocations($this->input->get('cityid'));
		$data['page']='viewonecitylocations';
		$data['title']='View Locations';
		$this->load->view('template',$data);
	}
	public function createcity()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'page' ] = 'createcity';
		$data[ 'title' ] = 'Create city';
//		$data['location']=$this->location_model->getlocation();
//        $data['category']=$this->category_model->getcategory();
//        $data['topic']=$this->topic_model->gettopic();
//		$data['listingtype']=$this->event_model->getlistingtype();
//		$data['remainingticket']=$this->event_model->getremainingticket();
		$this->load->view( 'template', $data );	
	}
    function createcitysubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['page']='createcity';
			$data['title']='Create New City';
//			$data['organizer']=$this->organizer_model->getorganizer();
//			$data['listingtype']=$this->event_model->getlistingtype();
//			$data['remainingticket']=$this->event_model->getremainingticket();
			$this->load->view('template',$data);
		}
		else
		{
			$name=$this->input->post('name');
			if($this->city_model->create($name)==0)
			$data['alerterror']="New City could not be created.";
			else
			$data['alertsuccess']="City created Successfully.";
			
			$data['table']=$this->city_model->viewcity();
			$data['redirect']="site/viewcity";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
    public function createlocation()
	{
		$access = array("1");
		$this->checkaccess($access);
        $data['cityid']=$this->input->get('cityid');
		$data[ 'page' ] = 'createlocation';
		$data[ 'title' ] = 'Create Location';
//		$data['location']=$this->location_model->getlocation();
//        $data['category']=$this->category_model->getcategory();
//        $data['topic']=$this->topic_model->gettopic();
//		$data['listingtype']=$this->event_model->getlistingtype();
//		$data['remainingticket']=$this->event_model->getremainingticket();
		$this->load->view( 'template', $data );	
	}
    function createlocationsubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('pincode','Pincode','trim|required');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['page']='createlocation';
			$data['title']='Create New Location';
//			$data['organizer']=$this->organizer_model->getorganizer();
//			$data['listingtype']=$this->event_model->getlistingtype();
//			$data['remainingticket']=$this->event_model->getremainingticket();
			$this->load->view('template',$data);
		}
		else
		{
			$name=$this->input->post('name');
			$pincode=$this->input->post('pincode');
			$cityid=$this->input->get_post('cityid');
			if($this->city_model->createlocation($name,$cityid,$pincode)==0)
			$data['alerterror']="New Location could not be created.";
			else
			$data['alertsuccess']="Location created Successfully.";
			
			$data['table']=$this->city_model->viewonecitylocations($cityid);
			$data['redirect']="site/viewonecitylocations?cityid=".$cityid;
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
    
    function editcity()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['before']=$this->city_model->beforeedit($this->input->get('id'));
//		$data['organizer']=$this->organizer_model->getorganizer();
//		$data['listingtype']=$this->event_model->getlistingtype();
//		$data['remainingticket']=$this->event_model->getremainingticket();
//		$data['page2']='block/eventblock';
		$data['page']='editcity';
		$data['title']='Edit City';
		$this->load->view('template',$data);
	}
	function editcitysubmit()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required');
        
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
//			$data['organizer']=$this->organizer_model->getorganizer();
//			$data['listingtype']=$this->event_model->getlistingtype();
//			$data['remainingticket']=$this->event_model->getremainingticket();
			$data['before']=$this->city_model->beforeedit($this->input->post('id'));
//			$data['page2']='block/eventblock';
			$data['page']='editcity';
			$data['title']='Edit City';
			$this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->post('id');
			$name=$this->input->post('name');
			if($this->city_model->edit($id,$name)==0)
			$data['alerterror']="City Editing was unsuccesful";
			else
			$data['alertsuccess']="City edited Successfully.";
			
			$data['redirect']="site/viewcity";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
			
		}
	}
	function editlocation()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['before']=$this->city_model->beforeeditlocation($this->input->get('id'));
//		$data['organizer']=$this->organizer_model->getorganizer();
//		$data['listingtype']=$this->event_model->getlistingtype();
//		$data['remainingticket']=$this->event_model->getremainingticket();
//		$data['page2']='block/eventblock';
		$data['page']='editlocation';
		$data['title']='Edit Location';
		$this->load->view('template',$data);
	}
	function editlocationsubmit()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('pincode','Pincode','trim|required');
        
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
//			$data['organizer']=$this->organizer_model->getorganizer();
//			$data['listingtype']=$this->event_model->getlistingtype();
//			$data['remainingticket']=$this->event_model->getremainingticket();
			$data['before']=$this->city_model->beforeedit($this->input->post('id'));
//			$data['page2']='block/eventblock';
			$data['page']='editcity';
			$data['title']='Edit City';
			$this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->get_post('id');
			$cityid=$this->input->get_post('cityid');
			$name=$this->input->post('name');
			$pincode=$this->input->post('pincode');
			if($this->city_model->editlocation($id,$cityid,$name,$pincode)==0)
			$data['alerterror']="Location Editing was unsuccesful";
			else
			$data['alertsuccess']="Location edited Successfully.";
			
			$data['redirect']="site/viewonecitylocations?cityid=".$cityid;
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
			
		}
	}
	
    
	function deletecity()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->city_model->deletecity($this->input->get('id'));
		$data['table']=$this->city_model->viewcity();
		$data['alertsuccess']="City Deleted Successfully";
		$data['page']='viewcity';
		$data['title']='View City';
		$this->load->view('template',$data);
	}
     
	function deletelocation()
	{
		$access = array("1");
		$this->checkaccess($access);
        $cityid=$this->input->get('cityid');
		$this->city_model->deletelocation($this->input->get('id'));
		$data['table']=$this->city_model->viewonecitylocations($cityid);
		$data['alertsuccess']="City Deleted Successfully";
		$data['page']='viewonecitylocations';
		$data['title']='View Location';
		$this->load->view('template',$data);
	}
    
    //Brand
    
    function uploadbrandcsv()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'page' ] = 'uploadbrandcsv';
		$data[ 'title' ] = 'Upload Brand';
		$this->load->view( 'template', $data );
	} 
    
    function uploadbrandcsvsubmit()
	{
        $access = array("1");
		$this->checkaccess($access);
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
        $filename="file";
        $file="";
        if (  $this->upload->do_upload($filename))
        {
            $uploaddata = $this->upload->data();
            $file=$uploaddata['file_name'];
            $filepath=$uploaddata['file_path'];
        }
        $fullfilepath=$filepath."".$file;
        $file = $this->csvreader->parse_file($fullfilepath);
        $id1=$this->brand_model->createbycsv($file);
//        echo $id1;
        if($id1==0)
        $data['alerterror']="New brand could not be Uploaded.";
		else
		$data['alertsuccess']="Brand Uploaded Successfully.";
        $data['table']=$this->brand_model->viewbrand();
		$data['page']='viewbrand';
		$data['title']='View Brand';
		$this->load->view('template',$data);
    }
			
    
    function viewbrand()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['table']=$this->brand_model->viewbrand();
		$data['page']='viewbrand';
		$data['title']='View Brand';
		$this->load->view('template',$data);
	} 
    
    public function createbrand()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'page' ] = 'createbrand';
		$data[ 'title' ] = 'Create Brand';
        $data['category']=$this->brand_model->getcategory();
//		$data['location']=$this->location_model->getlocation();
//        $data['category']=$this->category_model->getcategory();
//        $data['topic']=$this->topic_model->gettopic();
//		$data['listingtype']=$this->event_model->getlistingtype();
//		$data['remainingticket']=$this->event_model->getremainingticket();
		$this->load->view( 'template', $data );	
	}
    function createbrandsubmit()
	{
        $access = array("1");
		$this->checkaccess($access);
        $this->form_validation->set_rules('name','Name','trim|required');
        $this->form_validation->set_rules('website','website','trim');
        $this->form_validation->set_rules('facebook','Facebook','trim');
        $this->form_validation->set_rules('twitter','twitter','trim');
        $this->form_validation->set_rules('pininterest','pininterest','trim');
        $this->form_validation->set_rules('googleplus','googleplus','trim');
        $this->form_validation->set_rules('instagram','instagram','trim');
        $this->form_validation->set_rules('blog','blog','trim');
        $this->form_validation->set_rules('description','description','trim');
		
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['page']='createbrand';
			$data['title']='Create New Brand';
        $data['category']=$this->brand_model->getcategory();
			$this->load->view('template',$data);
		}
		else
		{
           //$id=$this->input->get_post('id');
			$name=$this->input->post('name');
			$website=$this->input->post('website');
			$facebook=$this->input->post('facebook');
			$twitter=$this->input->post('twitter');
			$pininterest=$this->input->post('pininterest');
			$googleplus=$this->input->post('googleplus');
			$instagram=$this->input->post('instagram');
			$blog=$this->input->post('blog');
			$description=$this->input->post('description');
            
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="logo";
			$logo="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$logo=$uploaddata['file_name'];
			}
            
            $id=$this->brand_model->create($name,$website,$facebook,$twitter,$pininterest,$googleplus,$instagram,$blog,$description,$logo);
            if($id==0)
			$data['alerterror']="New brand could not be created.";
			else
			$data['alertsuccess']="brand created Successfully.";
            
            foreach ($_POST as $key => $value) {
             if(is_array($value)){
//                 echo "hi";
             foreach ($_POST[$key] as $key => $value) {
        //        echo "<tr>";
        //        echo "<td>";
//                echo $key;
        //        echo "</td>";
        //        echo "<td>";
               // echo $value;
                 $this->brand_model->createsubcategory($id,$value);
        //        echo "</td>";
        //        echo "</tr>";
                     }


                     }
                     else{
        //        echo "<tr>";
        //        echo "<td>";
//                echo $key;
        //        echo "</td>";
        //        echo "<td>";
                //echo $value;
                         if($key!="name")
                $this->brand_model->createsubcategory($id,$value);
                         
        //        echo "</td>";
        //        echo "</tr>";
                     }
             
                }
			
//			
			$data['table']=$this->brand_model->viewbrand();
			$data['redirect']="site/viewbrand";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
    
    
    function editbrand()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['before']=$this->brand_model->beforeedit($this->input->get('id'));
        $data['category']=$this->brand_model->getcategory();
        $data['brandcategory']=$this->brand_model->getbrandcategory($this->input->get('id'));
//		$data['organizer']=$this->organizer_model->getorganizer();
//		$data['listingtype']=$this->event_model->getlistingtype();
//		$data['remainingticket']=$this->event_model->getremainingticket();
//		$data['page2']='block/eventblock';
		$data['page']='editbrand';
		$data['title']='Edit brand';
		$this->load->view('template',$data);
	}
	function editbrandsubmit()
	{
		$access = array("1","2");
		$this->checkaccess($access);
//		echo "Hello";
		$this->form_validation->set_rules('name','Name','trim|required');
        $this->form_validation->set_rules('website','website','trim');
        $this->form_validation->set_rules('facebook','Facebook','trim');
        $this->form_validation->set_rules('twitter','twitter','trim');
        $this->form_validation->set_rules('pininterest','pininterest','trim');
        $this->form_validation->set_rules('googleplus','googleplus','trim');
        $this->form_validation->set_rules('instagram','instagram','trim');
        $this->form_validation->set_rules('blog','blog','trim');
        $this->form_validation->set_rules('description','description','trim');
		
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['page']='createbrand';
			$data['title']='Create New Brand';
        $data['category']=$this->brand_model->getcategory();
			$this->load->view('template',$data);
		}
		else
		{
           $id=$this->input->get_post('id');
			$name=$this->input->post('name');
            $website=$this->input->post('website');
			$facebook=$this->input->post('facebook');
			$twitter=$this->input->post('twitter');
			$pininterest=$this->input->post('pininterest');
			$googleplus=$this->input->post('googleplus');
			$instagram=$this->input->post('instagram');
			$blog=$this->input->post('blog');
			$description=$this->input->post('description');
            echo $description;
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="logo";
			$logo="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$logo=$uploaddata['file_name'];
			}
            if($logo=="")
            {
            $logo=$this->brand_model->getlogobybrandid($id);
               // print_r($logo);
                $logo=$logo->logo;
            }
            
            $id1=$this->brand_model->editbrand($id,$name,$website,$facebook,$twitter,$pininterest,$googleplus,$instagram,$blog,$description,$logo);
            $this->brand_model->deletesubcategory($id);
            if($id1==0)
			$data['alerterror']="New brand could not be Updated.";
			else
			$data['alertsuccess']="brand Updated Successfully.";
            
            foreach ($_POST as $key => $value) {
             if(is_array($value)){
//                 echo "hi";
             foreach ($_POST[$key] as $key => $value) {
//                 echo $value;
                 $this->brand_model->createsubcategory($id,$value);
                     }

                     }
                     else{
                         if($key!="name")
                $this->brand_model->createsubcategory($id,$value);
               
                     }
             
                }
			
//			
			$data['table']=$this->brand_model->viewbrand();
			$data['redirect']="site/viewbrand";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
    
	function deletebrand()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->brand_model->deletebrand($this->input->get('id'));
		$data['table']=$this->brand_model->viewbrand();
		$data['alertsuccess']="brand Deleted Successfully";
		$data['page']='viewbrand';
		$data['title']='View brand';
		$this->load->view('template',$data);
	}
    
    function deletebrandcategory()
	{
		$access = array("1");
		$this->checkaccess($access);
        $id=$this->input->get('id');
        $brandid=$this->input->get('brandid');
		$this->category_model->deletebrandcategory($this->input->get('id'),$this->input->get('brandid'));
		$data['table']=$this->category_model->viewonebrandcategories($this->input->get('brandid'));
		$data['page']='viewonebrandcategories';
		$data['title']='View Brand category';
		$this->load->view('template',$data);
	}
    
    
    
    
    //Mall
    
    function uploadmallcsv()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'page' ] = 'uploadmallcsv';
		$data[ 'title' ] = 'Upload mall';
		$this->load->view( 'template', $data );
	} 
    
    function uploadmallcsvsubmit()
	{
        $access = array("1");
		$this->checkaccess($access);
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
        $filename="file";
        $file="";
        if (  $this->upload->do_upload($filename))
        {
            $uploaddata = $this->upload->data();
            $file=$uploaddata['file_name'];
            $filepath=$uploaddata['file_path'];
        }
        $fullfilepath=$filepath."".$file;
        $file = $this->csvreader->parse_file($fullfilepath);
        print_r($file);
//        print_r($file);
//        $id1=$this->mall_model->createbycsv($file);
////        echo $id1;
//        if($id1==0)
//        $data['alerterror']="New mall could not be Uploaded.";
//		else
//		$data['alertsuccess']="mall Uploaded Successfully.";
//        $data['table']=$this->mall_model->viewmall();
//		$data['page']='viewmall';
//		$data['title']='View mall';
//		$this->load->view('template',$data);
    }
    public function createmall()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'page' ] = 'createmall';
		$data[ 'title' ] = 'Create mall';
        $data['location']=$this->city_model->getlocationdropdown();
        $data['city']=$this->city_model->getcitydropdown();
//		$data['location']=$this->location_model->getlocation();
//        $data['category']=$this->category_model->getcategory();
//        $data['topic']=$this->topic_model->gettopic();
//		$data['listingtype']=$this->event_model->getlistingtype();
//		$data['remainingticket']=$this->event_model->getremainingticket();
		$this->load->view( 'template', $data );	
	}
	function createmallsubmit()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('address','Address','trim|required');
		$this->form_validation->set_rules('description','Description','trim');
		$this->form_validation->set_rules('specialoffers','specialoffers','trim');
		$this->form_validation->set_rules('events','events','trim');
		$this->form_validation->set_rules('cinemaoffer','Cinemaoffer','trim');
		$this->form_validation->set_rules('facebookpage','Facebookpage','trim');
		$this->form_validation->set_rules('pininterest','pininterest','trim');
		$this->form_validation->set_rules('instagram','instagram','trim');
		$this->form_validation->set_rules('twitterpage','twitterpage','trim');
		$this->form_validation->set_rules('location','location','trim|required');
		$this->form_validation->set_rules('latitude','Latitude','trim');
		$this->form_validation->set_rules('longitude','Longitude','trim|');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[mall.email]');
		$this->form_validation->set_rules('contactno','contactno','trim');
		$this->form_validation->set_rules('website','Website','trim|max_length[50]');
		$this->form_validation->set_rules('parkingfacility','Parkingfacility','trim');
		$this->form_validation->set_rules('cinema','Cinema','trim');
		$this->form_validation->set_rules('restaurant','Restaurant','trim');
		$this->form_validation->set_rules('entertainment','Entertainment','trim');
		$this->form_validation->set_rules('city','city','trim');
        
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['page']='createmall';
			$data['title']='Create New Mall';
            $data['location']=$this->city_model->getlocationdropdown();
            $data['city']=$this->city_model->getcitydropdown();
//			$data['organizer']=$this->organizer_model->getorganizer();
//			$data['listingtype']=$this->event_model->getlistingtype();
//			$data['remainingticket']=$this->event_model->getremainingticket();
			$this->load->view('template',$data);
		}
		else
		{
			$name=$this->input->post('name');
			$address=$this->input->post('address');
			$description=$this->input->post('description');
			$specialoffers=$this->input->post('specialoffers');
			$events=$this->input->post('events');
			$cinemaoffer=$this->input->post('cinemaoffer');
			$pininterest=$this->input->post('pininterest');
			$instagram=$this->input->post('instagram');
			$twitterpage=$this->input->post('twitterpage');
			$facebookpage=$this->input->post('facebookpage');
			$location=$this->input->post('location');
			$latitude=$this->input->post('latitude');
			$longitude=$this->input->post('longitude');
			$contactno=$this->input->post('contactno');
			$parkingfacility=$this->input->post('parkingfacility');
			$cinema=$this->input->post('cinema');
			$restaurant=$this->input->post('restaurant');
			$entertainment=$this->input->post('entertainment');
			$website=$this->input->post('website');
			$email=$this->input->post('email');
			$city=$this->input->post('city');
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="logo";
			$logo="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$logo=$uploaddata['file_name'];
			}
			if($this->mall_model->create($name,$address,$location,$latitude,$longitude,$contactno,$parkingfacility,$cinema,$restaurant,$entertainment,$website,$email,$logo,$description,$specialoffers,$events,$cinemaoffer,$facebookpage,$pininterest,$instagram,$twitterpage,$city)==0)
			$data['alerterror']="New Mall could not be created.";
			else
			$data['alertsuccess']="Mall created Successfully.";
			
			$data['table']=$this->mall_model->viewmall();
			$data['redirect']="site/viewmall";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
	function viewmall()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['table']=$this->mall_model->viewmall();
		$data['page']='viewmall';
		$data['title']='View Malls';
		$this->load->view('template',$data);
	}
	function editmall()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['before']=$this->mall_model->beforeedit($this->input->get('id'));
        $data['location']=$this->city_model->getlocationdropdown();
        $data['city']=$this->city_model->getcitydropdown();
//		$data['organizer']=$this->organizer_model->getorganizer();
//		$data['listingtype']=$this->event_model->getlistingtype();
//		$data['remainingticket']=$this->event_model->getremainingticket();
//		$data['page2']='block/eventblock';
		$data['page']='editmall';
		$data['title']='Edit Mall';
		$this->load->view('template',$data);
	}
	function editmallsubmit()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('address','Address','trim|required');
		$this->form_validation->set_rules('description','Description','trim');
		$this->form_validation->set_rules('specialoffers','specialoffers','trim');
		$this->form_validation->set_rules('events','events','trim');
		$this->form_validation->set_rules('cinemaoffer','Cinemaoffer','trim');
		$this->form_validation->set_rules('facebookpage','Facebookpage','trim');
		$this->form_validation->set_rules('pininterest','pininterest','trim');
		$this->form_validation->set_rules('instagram','instagram','trim');
		$this->form_validation->set_rules('twitterpage','twitterpage','trim');
		$this->form_validation->set_rules('location','location','trim|required');
		$this->form_validation->set_rules('latitude','Latitude','trim');
		$this->form_validation->set_rules('longitude','Longitude','trim|');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('contactno','contactno','trim');
		$this->form_validation->set_rules('website','Website','trim|max_length[50]');
		$this->form_validation->set_rules('parkingfacility','Parkingfacility','trim');
		$this->form_validation->set_rules('cinema','Cinema','trim');
		$this->form_validation->set_rules('restaurant','Restaurant','trim');
		$this->form_validation->set_rules('entertainment','Entertainment','trim');
		$this->form_validation->set_rules('city','city','trim');
        
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
            $data['before']=$this->mall_model->beforeedit($this->input->get('id'));
            $data['location']=$this->city_model->getlocationdropdown();
            $data['city']=$this->city_model->getcitydropdown();
//			$data['page2']='block/eventblock';
			$data['page']='editmall';
			$data['title']='Edit Mall';
			$this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->post('id');
			$name=$this->input->post('name');
			$address=$this->input->post('address');
			$description=$this->input->post('description');
			$specialoffers=$this->input->post('specialoffers');
			$events=$this->input->post('events');
			$facebookpage=$this->input->post('facebookpage');
			$cinemaoffer=$this->input->post('cinemaoffer');
			$pininterest=$this->input->post('pininterest');
			$instagram=$this->input->post('instagram');
			$twitterpage=$this->input->post('twitterpage');
			$location=$this->input->post('location');
			$latitude=$this->input->post('latitude');
			$longitude=$this->input->post('longitude');
			$contactno=$this->input->post('contactno');
			$parkingfacility=$this->input->post('parkingfacility');
			$cinema=$this->input->post('cinema');
			$restaurant=$this->input->post('restaurant');
			$entertainment=$this->input->post('entertainment');
			$website=$this->input->post('website');
			$email=$this->input->post('email');
			$city=$this->input->post('city');
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="logo";
			$logo="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$logo=$uploaddata['file_name'];
			}
            if($logo=="")
            {
            $logo=$this->mall_model->getlogobymallid($id);
               // print_r($logo);
                $logo=$logo->logo;
            }
			if($this->mall_model->edit($id,$name,$address,$location,$latitude,$longitude,$contactno,$parkingfacility,$cinema,$restaurant,$entertainment,$website,$email,$logo,$description,$specialoffers,$events,$cinemaoffer,$facebookpage,$pininterest,$instagram,$twitterpage,$city)==0)
			$data['alerterror']="Mall Editing was unsuccesful";
			else
			$data['alertsuccess']="Mall edited Successfully.";
			
			$data['redirect']="site/viewmall";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
			
		}
	}
	
	function deletemall()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->mall_model->deletemall($this->input->get('id'));
		$data['table']=$this->mall_model->viewmall();
		$data['alertsuccess']="Mall Deleted Successfully";
		$data['page']='viewmall';
		$data['title']='View Malls';
		$this->load->view('template',$data);
	}
    
    /*-----------------Event functions Addes by Avinash------------------------*/
    public function showalleventsbyuserid()
    {
        $id=$this->input->get('id');
        $data['json']=$this->event_model->showalleventsbyuserid($id);
        print_r ($data);
		//$this->load->view('json',$data);
    }
    public function findone()
	{
        $id=$this->input->get('id');
        $data['json']=$this->event_model->viewone($id);
        print_r($data);
		//$this->load->view('json',$data);
	}
    
    /*-----------------End of event functions----------------------------------*/
    
	function editeventcategorytopic()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['before']=$this->event_model->beforeedit($this->input->get('id'));
		$data['category']=$this->category_model->getcategory();
		$data['topic']=$this->topic_model->gettopic();
		$data['page2']='block/eventblock';
		$data['page']='eventcategorytopic';
		$data['title']='Edit event category';
		$this->load->view('template',$data);
	}
	function editeventcategorytopicsubmit()
	{
		$this->form_validation->set_rules('id','id','trim|');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['before']=$this->event_model->beforeeditevent($this->input->post('id'));
			$data['category']=$this->category_model->getcategory();
			$data['topic']=$this->topic_model->gettopic();
			$data['page2']='block/eventblock';
			$data['page']='eventcategorytopic';
			$data['title']='Edit Related events';
			$this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->post('id');
			
			$category=$this->input->post('category');
			$topic=$this->input->post('topic');
			if($this->event_model->editeventcategorytopic($id,$category,$topic)==0)
			$data['alerterror']=" Event category-topic Editing was unsuccesful";
			else
			$data['alertsuccess']=" Event category-topic edited Successfully.";
			
			$data['redirect']="site/editeventcategorytopic?id=".$id;
			//$data['other']="template=$template";
			$this->load->view("redirect2",$data);
		}
	}
	//ticketevent
	public function createticketevent()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'page' ] = 'createticketevent';
		$data[ 'title' ] = 'Create ticketevent';
		$data['event']=$this->event_model->getevent();
		$data['tickettype']=$this->ticketevent_model->gettickettype();
		$this->load->view( 'template', $data );	
	}
	function createticketeventsubmit()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$this->form_validation->set_rules('event','event','trim|');
		$this->form_validation->set_rules('tickettype','tickettype','trim');
		$this->form_validation->set_rules('ticket','ticket','trim|');
		$this->form_validation->set_rules('ticketname','ticketname','trim');
		$this->form_validation->set_rules('amount','amount','trim');
		$this->form_validation->set_rules('starttime','Start Time','trim|required');
		$this->form_validation->set_rules('endtime','End Time','trim|required');
		$this->form_validation->set_rules('quantity','quantity','trim');
		$this->form_validation->set_rules('description','description','trim');
		$this->form_validation->set_rules('ticketmaxallowed','ticketmaxallowed','trim');
		$this->form_validation->set_rules('ticketminallowed','ticketminallowed','trim');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['page']='createticketevent';
			$data['title']='Create New ticketevent';
			$data['event']=$this->event_model->getevent();
			$data['tickettype']=$this->ticketevent_model->gettickettype();
			$this->load->view('template',$data);
		}
		else
		{
			$event=$this->input->post('event');
			$ticket=$this->input->post('ticket');
			$tickettype=$this->input->post('tickettype');
			$amount=$this->input->post('amount');
			$ticketname=$this->input->post('ticketname');
			$quantity=$this->input->post('quantity');
			$description=$this->input->post('description');
			$ticketmaxallowed=$this->input->post('ticketmaxallowed');
			$ticketminallowed=$this->input->post('ticketminallowed');
			$starttime=date("H:i",strtotime($this->input->post('starttime')));
			$starttime = $starttime.":00";
			$starttime = date("H:i:s",strtotime($starttime));
			$endtime=date("H:i",strtotime($this->input->post('endtime')));
			$endtime = $endtime.":00";
			$endtime = date("H:i:s",strtotime($endtime));
			if($this->ticketevent_model->create($event,$ticket,$tickettype,$amount,$ticketname,$quantity,$description,$ticketmaxallowed,$ticketminallowed,$starttime,$endtime)==0)
			$data['alerterror']="New ticketevent could not be created.";
			else
			$data['alertsuccess']="ticketevent created Successfully.";
			
			$data['table']=$this->ticketevent_model->viewticketevent();
			$data['redirect']="site/viewticketevent";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
	function viewticketevent()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['table']=$this->ticketevent_model->viewticketevent();
		$data['page']='viewticketevent';
		$data['title']='View ticketevent';
		$this->load->view('template',$data);
	}
	function editticketevent()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['before']=$this->ticketevent_model->beforeedit($this->input->get('id'));
		$data['event']=$this->event_model->getevent();
		$data['tickettype']=$this->ticketevent_model->gettickettype();
		$data['page']='editticketevent';
		$data['title']='Edit ticketevent';
		$this->load->view('template',$data);
	}
	function editticketeventsubmit()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$this->form_validation->set_rules('event','event','trim|');
		$this->form_validation->set_rules('tickettype','tickettype','trim');
		$this->form_validation->set_rules('ticket','ticket','trim|');
		$this->form_validation->set_rules('ticketname','ticketname','trim');
		$this->form_validation->set_rules('amount','amount','trim');
		$this->form_validation->set_rules('starttime','Start Time','trim|required');
		$this->form_validation->set_rules('endtime','End Time','trim|required');
		$this->form_validation->set_rules('quantity','quantity','trim');
		$this->form_validation->set_rules('description','description','trim');
		$this->form_validation->set_rules('ticketmaxallowed','ticketmaxallowed','trim');
		$this->form_validation->set_rules('ticketminallowed','ticketminallowed','trim');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['event']=$this->event_model->getevent();
			$data['tickettype']=$this->ticketevent_model->gettickettype();
			$data['before']=$this->ticketevent_model->beforeedit($this->input->post('id'));
			$data['page']='editticketevent';
			$data['title']='Edit ticketevent';
			$this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->post('id');
			$event=$this->input->post('event');
			$ticket=$this->input->post('ticket');
			$tickettype=$this->input->post('tickettype');
			$amount=$this->input->post('amount');
			$ticketname=$this->input->post('ticketname');
			$quantity=$this->input->post('quantity');
			$description=$this->input->post('description');
			$ticketmaxallowed=$this->input->post('ticketmaxallowed');
			$ticketminallowed=$this->input->post('ticketminallowed');
			$starttime=date("H:i",strtotime($this->input->post('starttime')));
			$starttime = $starttime.":00";
			$starttime = date("H:i:s",strtotime($starttime));
			$endtime=date("H:i",strtotime($this->input->post('endtime')));
			$endtime = $endtime.":00";
			$endtime = date("H:i:s",strtotime($endtime));
			if($this->ticketevent_model->edit($id,$event,$ticket,$tickettype,$amount,$ticketname,$quantity,$description,$ticketmaxallowed,$ticketminallowed,$starttime,$endtime)==0)
			$data['alerterror']="ticketevent Editing was unsuccesful";
			else
			$data['alertsuccess']="ticketevent edited Successfully.";
			
			$data['redirect']="site/viewticketevent";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
			
		}
	}
	
	function deleteticketevent()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->ticketevent_model->deleteticketevent($this->input->get('id'));
		$data['table']=$this->ticketevent_model->viewticketevent();
		$data['alertsuccess']="ticketevent Deleted Successfully";
		$data['page']='viewticketevent';
		$data['title']='View ticketevent';
		$this->load->view('template',$data);
	}
	//Newsletter
	public function createnewsletter()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'page' ] = 'createnewsletter';
		$data[ 'title' ] = 'Create newsletter';
		$this->load->view( 'template', $data );	
	}
	public function createnewslettersubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('title','title','trim|');
		$this->form_validation->set_rules('subject','subject','trim|');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'page' ] = 'createnewsletter';
			$data[ 'title' ] = 'Create newsletter';
			$this->load->view('template',$data);
		}
		else
		{
			$title=$this->input->post('title');
			$subject=$this->input->post('subject');
			if($this->newsletter_model->createnewsletter($title,$subject)==0)
			$data['alerterror']="New newsletter could not be created.";
			else
			$data['alertsuccess']="newsletter  created Successfully.";
			$data['redirect']="site/viewnewsletter";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
	public function editnewsletter()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['before']=$this->newsletter_model->beforeeditnewsletter($this->input->get('id'));
		$data[ 'page' ] = 'editnewsletter';
		$data[ 'title' ] = 'Edit newsletter';
		$this->load->view( 'template', $data );	
	}
	function editnewslettersubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('title','title','trim|');
		$this->form_validation->set_rules('subject','subject','trim|');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['before']=$this->newsletter_model->beforeeditnewsletter($this->input->post('id'));
			$data['page']='editnewsletter';
			$data['title']='Edit newsletter';
			$this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->post('id');
			$title=$this->input->post('title');
			$subject=$this->input->post('subject');
			
			if($this->newsletter_model->editnewsletter($id,$title,$subject)==0)
			$data['alerterror']="newsletter Editing was unsuccesful";
			else
			$data['alertsuccess']="newsletter edited Successfully.";
			$data['table']=$this->newsletter_model->viewnewsletter();
			$data['redirect']="site/viewnewsletter";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
			/*$data['page']='viewusers';
			$data['title']='View Users';
			$this->load->view('template',$data);*/
		}
	}
	function deletenewsletter()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->newsletter_model->deletenewsletter($this->input->get('id'));
		$data['table']=$this->newsletter_model->viewnewsletter();
		$data['alertsuccess']="newsletter Deleted Successfully";
		$data['page']='viewnewsletter';
		$data['title']='View newsletter';
		$this->load->view('template',$data);
	}
	function viewnewsletter()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['table']=$this->newsletter_model->viewnewsletter();
		$data['page']='viewnewsletter';
		$data['title']='View newsletter';
		$this->load->view('template',$data);
	}
    
    
    //store
    
    function uploadstorecsv()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'page' ] = 'uploadstorecsv';
		$data[ 'title' ] = 'Upload store';
		$this->load->view( 'template', $data );
	} 
    function uploadstorecsvforbrand()
	{
		$access = array("2");
		$this->checkaccess($access);
		$data[ 'page' ] = 'uploadstorecsvforbrand';
		$data[ 'title' ] = 'Upload store';
		$this->load->view( 'template', $data );
	} 
    
    function uploadstorecsvforbrandsubmit()
	{
        $access = array("2");
		$this->checkaccess($access);
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
        $filename="file";
        $file="";
        if (  $this->upload->do_upload($filename))
        {
            $uploaddata = $this->upload->data();
            $file=$uploaddata['file_name'];
            $filepath=$uploaddata['file_path'];
        }
        $fullfilepath=$filepath."".$file;
        $file = $this->csvreader->parse_file($fullfilepath);
        $id1=$this->store_model->createbycsv($file);
//        echo $id1;
        if($id1==0)
        $data['alerterror']="New stores could not be Uploaded.";
		else
		$data['alertsuccess']="stores Uploaded Successfully.";
        $data['table']=$this->store_model->viewindividualstoreforbrand();
		$data['page']='viewindividualstoreforbrand';
		$data['title']='View Individualstore';
		$this->load->view('template',$data);
    }
   
    function uploadstorecsvsubmit()
	{
        $access = array("1");
		$this->checkaccess($access);
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
        $filename="file";
        $file="";
        if (  $this->upload->do_upload($filename))
        {
            $uploaddata = $this->upload->data();
            $file=$uploaddata['file_name'];
            $filepath=$uploaddata['file_path'];
        }
        $fullfilepath=$filepath."".$file;
        $file = $this->csvreader->parse_file($fullfilepath);
        $id1=$this->store_model->createbycsv($file);
//        echo $id1;
        if($id1==0)
        $data['alerterror']="New stores could not be Uploaded.";
		else
		$data['alertsuccess']="stores Uploaded Successfully.";
        $data['table']=$this->store_model->viewindividualstore();
		$data['page']='viewindividualstore';
		$data['title']='View Individualstore';
		$this->load->view('template',$data);
    }
   
    function uploadindividualstorecsv()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'page' ] = 'uploadindividualstorecsv';
		$data[ 'title' ] = 'Upload individualstore';
		$this->load->view( 'template', $data );
	} 
    
    function uploadusercsv()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'page' ] = 'uploadusercsv';
		$data[ 'title' ] = 'Upload user';
		$this->load->view( 'template', $data );
	} 
    
    function uploadindividualstorecsvsubmit()
	{
        $access = array("1");
		$this->checkaccess($access);
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
        $filename="file";
        $file="";
        if (  $this->upload->do_upload($filename))
        {
            $uploaddata = $this->upload->data();
            $file=$uploaddata['file_name'];
            $filepath=$uploaddata['file_path'];
        }
        $fullfilepath=$filepath."".$file;
        $file = $this->csvreader->parse_file($fullfilepath);
        $id1=$this->store_model->createindividualstorebycsv($file);
//        echo $id1;
        if($id1==0)
        $data['alerterror']="New Individual stores could not be Uploaded.";
		else
		$data['alertsuccess']="Individual stores Uploaded Successfully.";
        $data['table']=$this->store_model->viewindividualstore();
		$data['page']='viewindividualstore';
		$data['title']='View Individualstore';
		$this->load->view('template',$data);
    }
    
    function uploadusercsvsubmit()
	{
        $access = array("1");
		$this->checkaccess($access);
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
        $filename="file";
        $file="";
        if (  $this->upload->do_upload($filename))
        {
            $uploaddata = $this->upload->data();
            $file=$uploaddata['file_name'];
            $filepath=$uploaddata['file_path'];
        }
        $fullfilepath=$filepath."".$file;
        $file = $this->csvreader->parse_file($fullfilepath);
        $id1=$this->user_model->createuserbycsv($file);
//        echo $id1;
        if($id1==0)
        $data['alerterror']="New Users could not be Uploaded.";
		else
		$data['alertsuccess']="Users Uploaded Successfully.";
        $data['table']=$this->user_model->viewusers();
		$data['page']='viewusers';
		$data['title']='View Users';
		$this->load->view('template',$data);
    }
    function viewindividualstore()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['table']=$this->store_model->viewindividualstore();
		$data['page']='viewindividualstore';
		$data['title']='View Individualstore';
		$this->load->view('template',$data);
	}
    function viewstoreinmall()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['table']=$this->store_model->viewstoreinmall();
		$data['page']='viewstoreinmall';
		$data['title']='View Stores in mall';
		$this->load->view('template',$data);
	}
    
     public function createstoreinmall()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'page' ] = 'createstoreinmall';
		$data[ 'title' ] = 'Create Store in mall';
		$data['city']=$this->city_model->getcitydropdown();
        $data['brand']=$this->brand_model->getbranddropdown();
        $data['shopclosedon']=$this->store_model->getshopclosedondropdown();
        $data['mall']=$this->mall_model->getmalldropdown();
        $data['floor']=$this->mall_model->getfloordropdown();
        $data['offer']=$this->offer_model->getofferdropdown();
//        $data['topic']=$this->topic_model->gettopic();
//		$data['listingtype']=$this->event_model->getlistingtype();
//		$data['remainingticket']=$this->event_model->getremainingticket();
		$this->load->view( 'template', $data );	
	}
	function editstoreinmall()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['before']=$this->store_model->beforeeditstoreinmall($this->input->get('id'));
		$data['city']=$this->city_model->getcitydropdown();
        $data['brand']=$this->brand_model->getbranddropdown();
        $data['mall']=$this->mall_model->getmalldropdown();
        $data['floor']=$this->mall_model->getfloordropdown();
        $data['shopclosedon']=$this->store_model->getshopclosedondropdown();
        $data['offer']=$this->offer_model->getofferdropdown();
        $data['category']=$this->brand_model->getcategory();
        $data['brandcategory']=$this->brand_model->getbrandcategory($this->input->get('brandid'));
		$data['page']='editstoreinmall';
		$data['title']='Edit store in mall';
		$this->load->view('template',$data);
	}
	function editstoreinmallsubmit()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('city','city','trim|required');
		$this->form_validation->set_rules('brand','brand','trim|required');
		$this->form_validation->set_rules('mall','mall','trim|required');
		$this->form_validation->set_rules('floor','floor','trim');
		$this->form_validation->set_rules('offer','offer','trim|');
		$this->form_validation->set_rules('description','Description','trim|');
		$this->form_validation->set_rules('shopclosedon','Shopclosedon','trim|');
		$this->form_validation->set_rules('workinghoursfrom','Workinghoursfrom','trim|');
		$this->form_validation->set_rules('workinghoursto','Workinghoursto','trim|');
        $this->form_validation->set_rules('email','Email','trim|valid_email|is_unique[mall.email]');
		$this->form_validation->set_rules('contactno','contactno','trim');
        
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['page']='editstoreinmall';
			$data['title']='Edit Store in Mall';
            $data['before']=$this->store_model->beforeeditstoreinmall($this->input->get('id'));
            $data['city']=$this->city_model->getcitydropdown();
            $data['brand']=$this->brand_model->getbranddropdown();
            $data['shopclosedon']=$this->store_model->getshopclosedondropdown();
            $data['mall']=$this->mall_model->getmalldropdown();
            $data['floor']=$this->mall_model->getfloordropdown();
			$this->load->view('template',$data);
		}
		else
		{
            $id=$this->input->post('id');
			$name=$this->input->post('name');
			$city=$this->input->post('city');
			$brand=$this->input->post('brand');
			$mall=$this->input->post('mall');
			$floor=$this->input->post('floor');
			$offer=$this->input->post('offer');
			$contactno=$this->input->post('contactno');
			$description=$this->input->post('description');
			$format=$this->input->post('format');
			$shopclosedon=$this->input->post('shopclosedon');
			$workinghoursfrom=$this->input->post('workinghoursfrom');
			$workinghoursto=$this->input->post('workinghoursto');
			$email=$this->input->post('email');
            //print_r($_POST);
            foreach ($_POST as $key => $value) {
                
               // print_r($value);
             if(is_array($value)){
//                 echo "hi";
             foreach ($_POST[$key] as $key => $value) {
                 $this->store_model->createsubcategory($id,$value);
                     }

                     }
                     else{
                         if($key!="name" || $key!="city" || $key!="brand" || $key!="mall" || $key!="floor" || $key!="offer"|| $key!="contactno"|| $key!="description"|| $key!="email"|| $key!="format"|| $key!="shopclosedon"|| $key!="workinghoursfrom"|| $key!="workinghoursto")
                         {
                $this->store_model->createsubcategory($id,$value);
                         }
                     }
             
                }
            
			if($this->store_model->editstoreinmall($id,$name,$city,$brand,$mall,$floor,$contactno,$email,$format,$offer,$shopclosedon,$workinghoursfrom,$workinghoursto,$description)==0)
			$data['alerterror']="Store in Mall could not be edited.";
			else
			$data['alertsuccess']="Store in Mall Updated Successfully.";
			
			$data['table']=$this->store_model->viewstoreinmall();
		$data['page']='viewstoreinmall';
		$data['title']='View Stores in mall';
		$this->load->view('template',$data);
			//$data['other']="template=$template";
			//$this->load->view("redirect",$data);
		}
	}
	function createstoreinmallsubmit()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('city','city','trim|required');
		$this->form_validation->set_rules('brand','brand','trim|required');
		$this->form_validation->set_rules('mall','mall','trim|required');
		$this->form_validation->set_rules('floor','floor','trim|required');
//		$this->form_validation->set_rules('offer','offer','trim|');
        $this->form_validation->set_rules('email','Email','trim|valid_email');
		$this->form_validation->set_rules('contactno','contactno','trim');
		$this->form_validation->set_rules('workinghoursfrom','workinghoursFrom','trim');
		$this->form_validation->set_rules('workinghoursto','workinghoursTo','trim');
		$this->form_validation->set_rules('description','Description','trim');
		$this->form_validation->set_rules('shopclosedon','shopclosedon','trim');
        
//		$this->form_validation->set_rules('website','Website','trim|max_length[50]');
//		$this->form_validation->set_rules('facebookpage','facebookpage','trim');
//		$this->form_validation->set_rules('twitterpage','twitterpage','trim');
        
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['page']='createstoreinmall';
			$data['title']='Create New Store in Mall';
            $data['city']=$this->city_model->getcitydropdown();
            $data['brand']=$this->brand_model->getbranddropdown();
        $data['shopclosedon']=$this->store_model->getshopclosedondropdown();
            $data['mall']=$this->mall_model->getmalldropdown();
            $data['floor']=$this->mall_model->getfloordropdown();
			$this->load->view('template',$data);
		}
		else
		{
			$name=$this->input->post('name');
			$city=$this->input->post('city');
			$brand=$this->input->post('brand');
			$mall=$this->input->post('mall');
			$floor=$this->input->post('floor');
			$offer=$this->input->post('offer');
			$contactno=$this->input->post('contactno');
			$description=$this->input->post('description');
//			$facebookpage=$this->input->post('facebookpage');
//			$twitterpage=$this->input->post('twitterpage');
//			$website=$this->input->post('website');
			$email=$this->input->post('email');
			$format=$this->input->post('format');
			$shopclosedon=$this->input->post('shopclosedon');
			$workinghoursfrom=$this->input->post('workinghoursfrom');
			$workinghoursto=$this->input->post('workinghoursto');
//			$config['upload_path'] = './uploads/';
//			$config['allowed_types'] = 'gif|jpg|png|jpeg';
//			$this->load->library('upload', $config);
//			$filename="logo";
//			$logo="";
//			if (  $this->upload->do_upload($filename))
//			{
//				$uploaddata = $this->upload->data();
//				$logo=$uploaddata['file_name'];
//			}
            
			if($this->store_model->createstoreinmall($name,$city,$brand,$mall,$floor,$contactno,$email,$format,$offer,$shopclosedon,$workinghoursfrom,$workinghoursto,$description)==0)
			$data['alerterror']="New Store in Mall could not be created.";
			else
			$data['alertsuccess']="Store in Mall created Successfully.";
			
			$data['table']=$this->store_model->viewstoreinmall();
			$data['redirect']="site/viewstoreinmall";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
     public function createindividualstore()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'page' ] = 'createindividualstore';
		$data[ 'title' ] = 'Create Individual Store';
		$data['city']=$this->city_model->getcitydropdown();
        $data['brand']=$this->brand_model->getbranddropdown();
        $data['shopclosedon']=$this->store_model->getshopclosedondropdown();
//        $data['mall']=$this->mall_model->getmalldropdown();
//        $data['floor']=$this->mall_model->getfloordropdown();
        $data['location']=$this->city_model->getlocationdropdown();
        $data['offer']=$this->offer_model->getofferdropdown();
//        $data['topic']=$this->topic_model->gettopic();
//		$data['listingtype']=$this->event_model->getlistingtype();
//		$data['remainingticket']=$this->event_model->getremainingticket();
		$this->load->view( 'template', $data );	
	}
     public function editindividualstore()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'page' ] = 'editindividualstore';
		$data[ 'title' ] = 'Edit Individual Store';
		$data['before']=$this->store_model->beforeeditindividualstore($this->input->get('id'));
		$data['city']=$this->city_model->getcitydropdown();
        $data['brand']=$this->brand_model->getbranddropdown();
        $data['offer']=$this->offer_model->getofferdropdown();
        $data['shopclosedon']=$this->store_model->getshopclosedondropdown();
//        $data['mall']=$this->mall_model->getmalldropdown();
//        $data['floor']=$this->mall_model->getfloordropdown();
        $data['location']=$this->city_model->getlocationdropdown();
//        $data['topic']=$this->topic_model->gettopic();
//		$data['listingtype']=$this->event_model->getlistingtype();
//		$data['remainingticket']=$this->event_model->getremainingticket();
		$this->load->view( 'template', $data );	
	}
	function createindividualstoresubmit()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('city','city','trim|required');
		$this->form_validation->set_rules('brand','brand','trim|required');
		$this->form_validation->set_rules('offer','offer','trim|');
		$this->form_validation->set_rules('workinghoursfrom','Workinghoursfrom','trim|');
		$this->form_validation->set_rules('workinghoursto','Workinghoursto','trim|');
		$this->form_validation->set_rules('shopclosedon','shopclosedon','trim|');
		$this->form_validation->set_rules('address','Address','trim|required');
		$this->form_validation->set_rules('description','Description','trim');
		$this->form_validation->set_rules('location','Location','trim|required');
		$this->form_validation->set_rules('latitude','Latitude','trim|required');
		$this->form_validation->set_rules('longitude','Longitude','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[mall.email]');
		$this->form_validation->set_rules('contactno','contactno','trim');
//		$this->form_validation->set_rules('website','Website','trim|max_length[50]');
//		$this->form_validation->set_rules('facebookpage','facebookpage','trim');
//		$this->form_validation->set_rules('twitterpage','twitterpage','trim');
        
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'page' ] = 'createindividualstore';
		$data[ 'title' ] = 'Create Individual Store';
		$data['city']=$this->city_model->getcitydropdown();
        $data['brand']=$this->brand_model->getbranddropdown();
        $data['shopclosedon']=$this->store_model->getshopclosedondropdown();
        $data['mall']=$this->mall_model->getmalldropdown();
        $data['floor']=$this->mall_model->getfloordropdown();
        $data['offer']=$this->offer_model->getofferdropdown();
        $data['location']=$this->city_model->getlocationdropdown();
		$this->load->view( 'template', $data );
		}
		else
		{
			$name=$this->input->post('name');
			$city=$this->input->post('city');
			$brand=$this->input->post('brand');
			$offer=$this->input->post('offer');
			$workinghoursfrom=$this->input->post('workinghoursfrom');
			$workinghoursto=$this->input->post('workinghoursto');
			$shopclosedon=$this->input->post('shopclosedon');
			$address=$this->input->post('address');
			$description=$this->input->post('description');
			$location=$this->input->post('location');
			$latitude=$this->input->post('latitude');
			$longitude=$this->input->post('longitude');
			$contactno=$this->input->post('contactno');
            
//			$facebookpage=$this->input->post('facebookpage');
//			$twitterpage=$this->input->post('twitterpage');
//			$website=$this->input->post('website');
			$email=$this->input->post('email');
			$format=$this->input->post('format');
//			$config['upload_path'] = './uploads/';
//			$config['allowed_types'] = 'gif|jpg|png|jpeg';
//			$this->load->library('upload', $config);
//			$filename="logo";
//			$logo="";
//			if (  $this->upload->do_upload($filename))
//			{
//				$uploaddata = $this->upload->data();
//				$logo=$uploaddata['file_name'];
//			}
			if($this->store_model->createindividualstore($name,$city,$brand,$address,$location,$latitude,$longitude,$contactno,$email,$format,$offer,$workinghoursfrom,$workinhhoursto,$shopclosedon,$description)==0)
			$data['alerterror']="New Individual Store could not be created.";
			else
			$data['alertsuccess']="Individual Store created Successfully.";
			
			
		$data['table']=$this->store_model->viewindividualstore();
		$data['page']='viewindividualstore';
		$data['title']='View Individualstore';
		$this->load->view('template',$data);
		}
	}
	function editindividualstoresubmit()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('city','city','trim|required');
		$this->form_validation->set_rules('brand','brand','trim|required');
		$this->form_validation->set_rules('offer','offer','trim');
		$this->form_validation->set_rules('workinghoursfrom','Workinghoursfrom','trim|');
		$this->form_validation->set_rules('workinghoursto','Workinghoursto','trim|');
		$this->form_validation->set_rules('address','Address','trim|required');
		$this->form_validation->set_rules('description','Description','trim');
		$this->form_validation->set_rules('location','Location','trim|required');
		$this->form_validation->set_rules('latitude','Latitude','trim|required');
		$this->form_validation->set_rules('longitude','Longitude','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[mall.email]');
		$this->form_validation->set_rules('contactno','contactno','trim');
//		$this->form_validation->set_rules('website','Website','trim|max_length[50]');
//		$this->form_validation->set_rules('facebookpage','facebookpage','trim');
//		$this->form_validation->set_rules('twitterpage','twitterpage','trim');
        
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'page' ] = 'editindividualstore';
		$data[ 'title' ] = 'Edit Individual Store';
		$data['before']=$this->store_model->beforeeditindividualstore($this->input->get('id'));
		$data['city']=$this->city_model->getcitydropdown();
        $data['brand']=$this->brand_model->getbranddropdown();
        $data['shopclosedon']=$this->store_model->getshopclosedondropdown();
        $data['offer']=$this->offer_model->getofferdropdown();
//        $data['mall']=$this->mall_model->getmalldropdown();
//        $data['floor']=$this->mall_model->getfloordropdown();
        $data['location']=$this->city_model->getlocationdropdown();
		$this->load->view( 'template', $data );
		}
		else
		{
			$id=$this->input->get_post('id');
			$name=$this->input->post('name');
			$city=$this->input->post('city');
			$brand=$this->input->post('brand');
			$offer=$this->input->post('offer');
			$workinghoursfrom=$this->input->post('workinghoursfrom');
			$workinghoursto=$this->input->post('workinghoursto');
			$shopclosedon=$this->input->post('shopclosedon');
			$address=$this->input->post('address');
			$description=$this->input->post('description');
			$location=$this->input->post('location');
			$latitude=$this->input->post('latitude');
			$longitude=$this->input->post('longitude');
			$contactno=$this->input->post('contactno');
			$facebookpage=$this->input->post('facebookpage');
			$twitterpage=$this->input->post('twitterpage');
			$website=$this->input->post('website');
			$email=$this->input->post('email');
			$format=$this->input->post('format');
			if($this->store_model->editindividualstore($id,$name,$city,$brand,$address,$location,$latitude,$longitude,$contactno,$email,$format,$offer,$workinghoursfrom,$workinhhoursto,$shopclosedon,$description)==0)
			$data['alerterror']=" Individual Store could not be Updated.";
			else
			$data['alertsuccess']="Individual Store Updated Successfully.";
			
			
		$data['table']=$this->store_model->viewindividualstore();
		$data['page']='viewindividualstore';
		$data['title']='View Individualstore';
		$this->load->view('template',$data);
		}
	}
    
	function deletestoreinmall()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->store_model->deletestoreinmall($this->input->get('id'));
		$data['table']=$this->store_model->viewstoreinmall();
		$data['page']='viewstoreinmall';
		$data['title']='View Stores in mall';
		$this->load->view('template',$data);
	}
	function deleteindividualstore()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->store_model->deleteindividualstore($this->input->get('id'));
		$data['table']=$this->store_model->viewindividualstore();
		$data['page']='viewindividualstore';
		$data['title']='View Individual Stores';
		$this->load->view('template',$data);
	}
    
    //filters
    function filterstorebyofferid()
    {
		$id=$this->input->get_post('id');
        $this->store_model->filterstorebyofferid($this->input->get_post('id'));
        
    
    }
    function filterbrandbycategoryid()
    {
		$id=$this->input->get_post('id');
        $this->brand_model->filterbrandbycategoryid($this->input->get_post('id'));
        
    
    }
    
    //store category
    function editstorecategory()
    {
        $access = array("1");
		$this->checkaccess($access);
		$data['before']=$this->brand_model->beforeedit($this->input->get('brandid'));
        $data['category']=$this->brand_model->getcategory();
        $data['brandcategory']=$this->brand_model->getbrandcategory($this->input->get('brandid'));
//		$data['organizer']=$this->organizer_model->getorganizer();
//		$data['listingtype']=$this->event_model->getlistingtype();
//		$data['remainingticket']=$this->event_model->getremainingticket();
//		$data['page2']='block/eventblock';
		$data['page']='editstorecategory';
		$data['title']='Edit Categories in Store';
		$this->load->view('template',$data);
    }
    
    function editstorecategorysubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		
           $id=$this->input->get_post('id');
			$brandid=$this->input->get_post('brandid');
            $this->store_model->deletesubcategoryofstore($id);
            
            foreach ($_POST as $key => $value) {
             if(is_array($value)){
//                 echo "hi";
             foreach ($_POST[$key] as $key => $value) {
//                 echo $value."if block <br>";
                 $this->store_model->createsubcategoryofstore($id,$value);
                     }

                     }
                     else{
//                          echo $value."else block <br>";
                         if($key!="id")
                $this->store_model->createsubcategoryofstore($id,$value);
               
                     }
             
                }
			
//			
			$data['table']=$this->store_model->viewstoreinmall();
			$data['redirect']="site/viewstoreinmall";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
	}
    
    
    function viewstorecategory()
    {
        $access = array("1");
		$this->checkaccess($access);
		//$data['before']=$this->brand_model->beforeedit($this->input->get('brandid'));
        $data['category']=$this->brand_model->getcategory();
        $data['brandcategory']=$this->store_model->getstorecategory($this->input->get('id'));
//		$data['organizer']=$this->organizer_model->getorganizer();
//		$data['listingtype']=$this->event_model->getlistingtype();
//		$data['remainingticket']=$this->event_model->getremainingticket();
//		$data['page2']='block/eventblock';
		$data['page']='viewstorecategory';
		$data['title']='View Categories in Store';
		$this->load->view('template',$data);
    }
    
    
    public function getstore($id)
    {
   $data1=$this->store_model->getstore($id);
        
        
            $data["message"]=$data1;
            $this->load->view("json",$data);
  
            
             /*echo "<div class='form-group'>
                <label class='col-sm-2 control-label'>Store Name</label>
                <div class='col-sm-4'>
                <table>
                ";
              
                      foreach($options as $key=>$store){
                          
                        echo "<tr><td><input type='checkbox' name='storeid[]' id='select5' class='check' value='$key' >$store</td></tr>";
                          
                      }
               echo "
               <table></div>
               <div class='col-md-4'>
                            <input type='checkbox' id='checkbox' >Select All
                          </div>
                </div>";
        }
        else{
        echo "<div class='form-group'>
                <label class='col-sm-2 control-label'>Store Name</label>
                <div class='col-sm-4'>No Store for This Brand";

              
               echo "</div>
                </div>";
        */
        
        
        
    }
    public function getcategoryparent($catid)
    {
   $data1=$this->category_model->getparentcategory($catid);
        
        
            $data["message"]=$data1;
            $this->load->view("json",$data);
    }
    
    public function getmallincity($id)
    {
   $data1=$this->mall_model->getmallincity($id);
        
        
            $data["message"]=$data1;
//        print_r($data);
            $this->load->view("json",$data);
  
            
        
    }
    
    public function changebrands($id)
    {
//        console.log($id);
        if($id==2)
        {
//            console.log($id);
            $data1=$this->brand_model->getallbrandsforusers();
        }
        elseif($id==3)
        {
            $data1=$this->brand_model->getallbrandsforusers();
            $data2=$this->store_model->getallstoresforusers();
        }
        
            $data["message"]=$data1;
//        print_r($data);
            $this->load->view("json",$data);
  
    }
    
     public function getstoreforusers($id)
    {
   $data1=$this->store_model->getstore($id);
        
        
            $data["message"]=$data1;
            $this->load->view("json",$data);
  
            
        
    }
    
    //accesslevel 
    
    function editbrandforbrand()
	{
		$access = array("2");
		$this->checkaccess($access);
        $brandid=$this->session->userdata('brand');
//        print_r( $brandid);
		$data['before']=$this->brand_model->beforeedit($brandid);
        $data['category']=$this->brand_model->getcategory();
        $data['brandcategory']=$this->brand_model->getbrandcategory($brandid);
//		$data['organizer']=$this->organizer_model->getorganizer();
//		$data['listingtype']=$this->event_model->getlistingtype();
//		$data['remainingticket']=$this->event_model->getremainingticket();
//		$data['page2']='block/eventblock';
		$data['page']='editbrandforbrand';
		$data['title']='Edit brand';
		$this->load->view('template',$data);
	}
    function editbrandforbrandsubmit()
	{
		$access = array("1","2");
		$this->checkaccess($access);
//		echo "Hello";
		$this->form_validation->set_rules('name','Name','trim|required');
        $this->form_validation->set_rules('website','website','trim');
        $this->form_validation->set_rules('facebook','Facebook','trim');
        $this->form_validation->set_rules('twitter','twitter','trim');
        $this->form_validation->set_rules('pininterest','pininterest','trim');
        $this->form_validation->set_rules('googleplus','googleplus','trim');
        $this->form_validation->set_rules('instagram','instagram','trim');
        $this->form_validation->set_rules('blog','blog','trim');
        $this->form_validation->set_rules('description','description','trim');
		
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['page']='createbrand';
			$data['title']='Create New Brand';
        $data['category']=$this->brand_model->getcategory();
			$this->load->view('template',$data);
		}
		else
		{
           $id=$this->input->get_post('id');
			$name=$this->input->post('name');
            $website=$this->input->post('website');
			$facebook=$this->input->post('facebook');
			$twitter=$this->input->post('twitter');
			$pininterest=$this->input->post('pininterest');
			$googleplus=$this->input->post('googleplus');
			$instagram=$this->input->post('instagram');
			$blog=$this->input->post('blog');
			$description=$this->input->post('description');
            echo $description;
            $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="logo";
			$logo="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$logo=$uploaddata['file_name'];
			}
            if($logo=="")
            {
            $logo=$this->brand_model->getlogobybrandid($id);
               // print_r($logo);
                $logo=$logo->logo;
            }
            
            $id1=$this->brand_model->editbrand($id,$name,$website,$facebook,$twitter,$pininterest,$googleplus,$instagram,$blog,$description,$logo);
            $this->brand_model->deletesubcategory($id);
            if($id1==0)
			$data['alerterror']="New brand could not be Updated.";
			else
			$data['alertsuccess']="brand Updated Successfully.";
            
            foreach ($_POST as $key => $value) {
             if(is_array($value)){
//                 echo "hi";
             foreach ($_POST[$key] as $key => $value) {
//                 echo $value;
                 $this->brand_model->createsubcategory($id,$value);
                     }

                     }
                     else{
                         if($key!="name")
                $this->brand_model->createsubcategory($id,$value);
               
                     }
             
                }
			
//			
			$data['table']=$this->brand_model->viewbrand();
			$data['redirect']="site/editbrandforbrand";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
    
    
    function viewindividualstoreforbrand()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$data['table']=$this->store_model->viewindividualstoreforbrand();
		$data['page']='viewindividualstoreforbrand';
		$data['title']='View Individualstore';
		$this->load->view('template',$data);
	}
    
    function viewstoreinmallforbrand()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$data['table']=$this->store_model->viewstoreinmallforbrand();
		$data['page']='viewstoreinmallforbrand';
		$data['title']='View Stores in mall';
		$this->load->view('template',$data);
	}
    
     public function createstoreinmallforbrand()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$data[ 'page' ] = 'createstoreinmallforbrand';
		$data[ 'title' ] = 'Create Store in mall';
		$data['city']=$this->city_model->getcitydropdown();
//        $data['brand']=$this->brand_model->getbranddropdown();
        $data['brand']=$this->brand_model->getbrandname();
        $data['shopclosedon']=$this->store_model->getshopclosedondropdown();
        $data['mall']=$this->mall_model->getmalldropdown();
        $data['floor']=$this->mall_model->getfloordropdown();
        $data['offer']=$this->offer_model->getofferdropdown();
		$this->load->view( 'template', $data );	
	}
    
	function createstoreinmallforbrandsubmit()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('city','city','trim|required');
//		$this->form_validation->set_rules('brand','brand','trim|required');
		$this->form_validation->set_rules('mall','mall','trim|required');
		$this->form_validation->set_rules('floor','floor','trim');
//		$this->form_validation->set_rules('offer','offer','trim|');
        $this->form_validation->set_rules('email','Email','trim|valid_email');
		$this->form_validation->set_rules('contactno','contactno','trim');
		$this->form_validation->set_rules('workinghoursfrom','workinghoursFrom','trim');
		$this->form_validation->set_rules('workinghoursto','workinghoursTo','trim');
		$this->form_validation->set_rules('description','Description','trim');
		$this->form_validation->set_rules('shopclosedon','shopclosedon','trim');
        
//		$this->form_validation->set_rules('website','Website','trim|max_length[50]');
//		$this->form_validation->set_rules('facebookpage','facebookpage','trim');
//		$this->form_validation->set_rules('twitterpage','twitterpage','trim');
        
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$access = array("1","2");
            $this->checkaccess($access);
            $data[ 'page' ] = 'createstoreinmallforbrand';
            $data[ 'title' ] = 'Create Store in mall';
            $data['city']=$this->city_model->getcitydropdown();
    //        $data['brand']=$this->brand_model->getbranddropdown();
            $data['brand']=$this->brand_model->getbrandname();
            $data['shopclosedon']=$this->store_model->getshopclosedondropdown();
            $data['mall']=$this->mall_model->getmalldropdown();
            $data['floor']=$this->mall_model->getfloordropdown();
            $data['offer']=$this->offer_model->getofferdropdown();
            $this->load->view( 'template', $data );	
		}
		else
		{
			$name=$this->input->post('name');
			$city=$this->input->post('city');
//			$brand=$this->input->post('brand');
			$brand=$this->session->userdata('brand');
			$mall=$this->input->post('mall');
			$floor=$this->input->post('floor');
			$offer=$this->input->post('offer');
			$contactno=$this->input->post('contactno');
			$description=$this->input->post('description');
//			$facebookpage=$this->input->post('facebookpage');
//			$twitterpage=$this->input->post('twitterpage');
//			$website=$this->input->post('website');
			$email=$this->input->post('email');
			$format=$this->input->post('format');
			$shopclosedon=$this->input->post('shopclosedon');
			$workinghoursfrom=$this->input->post('workinghoursfrom');
			$workinghoursto=$this->input->post('workinghoursto');
//			$config['upload_path'] = './uploads/';
//			$config['allowed_types'] = 'gif|jpg|png|jpeg';
//			$this->load->library('upload', $config);
//			$filename="logo";
//			$logo="";
//			if (  $this->upload->do_upload($filename))
//			{
//				$uploaddata = $this->upload->data();
//				$logo=$uploaddata['file_name'];
//			}
            
			if($this->store_model->createstoreinmall($name,$city,$brand,$mall,$floor,$contactno,$email,$format,$offer,$shopclosedon,$workinghoursfrom,$workinghoursto,$description)==0)
			$data['alerterror']="New Store in Mall could not be created.";
			else
			$data['alertsuccess']="Store in Mall created Successfully.";
			
			$data['table']=$this->store_model->viewstoreinmallforbrand();
			$data['redirect']="site/viewstoreinmallforbrand";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
    
	function editstoreinmallforbrand()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$data['before']=$this->store_model->beforeeditstoreinmall($this->input->get('id'));
		$data['city']=$this->city_model->getcitydropdown();
//        $data['brand']=$this->brand_model->getbranddropdown();
        $data['brand']=$this->brand_model->getbrandname();
        $data['mall']=$this->mall_model->getmalldropdown();
        $data['floor']=$this->mall_model->getfloordropdown();
        $data['shopclosedon']=$this->store_model->getshopclosedondropdown();
        $data['offer']=$this->offer_model->getofferdropdown();
        $data['category']=$this->brand_model->getcategory();
        $data['brandcategory']=$this->brand_model->getbrandcategory($this->input->get('brandid'));
		$data['page']='editstoreinmallforbrand';
		$data['title']='Edit store in mall';
		$this->load->view('template',$data);
	}
    
	function editstoreinmallforbrandsubmit()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('city','city','trim|required');
//		$this->form_validation->set_rules('brand','brand','trim|required');
		$this->form_validation->set_rules('mall','mall','trim|required');
		$this->form_validation->set_rules('floor','floor','trim|required');
		$this->form_validation->set_rules('offer','offer','trim|');
		$this->form_validation->set_rules('description','Description','trim|');
		$this->form_validation->set_rules('shopclosedon','Shopclosedon','trim|');
		$this->form_validation->set_rules('workinghoursfrom','Workinghoursfrom','trim|');
		$this->form_validation->set_rules('workinghoursto','Workinghoursto','trim|');
        $this->form_validation->set_rules('email','Email','trim|valid_email|is_unique[mall.email]');
		$this->form_validation->set_rules('contactno','contactno','trim');
        
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$access = array("1","2");
            $this->checkaccess($access);
            $data['before']=$this->store_model->beforeeditstoreinmall($this->input->get('id'));
            $data['city']=$this->city_model->getcitydropdown();
    //        $data['brand']=$this->brand_model->getbranddropdown();
            $data['brand']=$this->brand_model->getbrandname();
            $data['mall']=$this->mall_model->getmalldropdown();
            $data['floor']=$this->mall_model->getfloordropdown();
            $data['shopclosedon']=$this->store_model->getshopclosedondropdown();
            $data['offer']=$this->offer_model->getofferdropdown();
            $data['category']=$this->brand_model->getcategory();
            $data['brandcategory']=$this->brand_model->getbrandcategory($this->input->get('brandid'));
            $data['page']='editstoreinmallforbrand';
            $data['title']='Edit store in mall';
            $this->load->view('template',$data);
		}
		else
		{
            $id=$this->input->post('id');
			$name=$this->input->post('name');
			$city=$this->input->post('city');
//			$brand=$this->input->post('brand');
			$brand=$this->session->userdata('brand');
			$mall=$this->input->post('mall');
			$floor=$this->input->post('floor');
			$offer=$this->input->post('offer');
			$contactno=$this->input->post('contactno');
			$description=$this->input->post('description');
			$format=$this->input->post('format');
			$shopclosedon=$this->input->post('shopclosedon');
			$workinghoursfrom=$this->input->post('workinghoursfrom');
			$workinghoursto=$this->input->post('workinghoursto');
			$email=$this->input->post('email');
            //print_r($_POST);
            foreach ($_POST as $key => $value) {
                
               // print_r($value);
             if(is_array($value)){
//                 echo "hi";
             foreach ($_POST[$key] as $key => $value) {
                 $this->store_model->createsubcategory($id,$value);
                     }

                     }
                     else{
                         if($key!="name" || $key!="city" || $key!="brand" || $key!="mall" || $key!="floor" || $key!="offer"|| $key!="contactno"|| $key!="description"|| $key!="email"|| $key!="format"|| $key!="shopclosedon"|| $key!="workinghoursfrom"|| $key!="workinghoursto")
                         {
//                             echo $value.'else<br>';
                $this->store_model->createsubcategory($id,$value);
                         }
                     }
             
                }
			if($this->store_model->editstoreinmall($id,$name,$city,$brand,$mall,$floor,$contactno,$email,$format,$offer,$shopclosedon,$workinghoursfrom,$workinghoursto,$description)==0)
			$data['alerterror']="Store in Mall could not be edited.";
			else
			$data['alertsuccess']="Store in Mall Updated Successfully.";
			
			$data['table']=$this->store_model->viewstoreinmallforbrand();
			$data['redirect']="site/viewstoreinmallforbrand";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
    
	function deletestoreinmallforbrand()
	{
		$access = array("2");
		$this->checkaccess($access);
		$this->store_model->deletestoreinmall($this->input->get('id'));
		$data['table']=$this->store_model->viewstoreinmallforbrand();
		$data['page']='viewstoreinmallforbrand';
		$data['title']='View Stores in mall';
		$this->load->view('template',$data);
	}
    
    
    function viewstorecategoryforbrand()
    {
        $access = array("1","2");
		$this->checkaccess($access);
		//$data['before']=$this->brand_model->beforeedit($this->input->get('brandid'));
        $data['category']=$this->brand_model->getcategory();
        $data['brandcategory']=$this->store_model->getstorecategory($this->input->get('id'));
//		$data['organizer']=$this->organizer_model->getorganizer();
//		$data['listingtype']=$this->event_model->getlistingtype();
//		$data['remainingticket']=$this->event_model->getremainingticket();
//		$data['page2']='block/eventblock';
		$data['page']='viewstorecategoryforbrand';
		$data['title']='View Categories in Store';
		$this->load->view('template',$data);
    }
    
    function editstorecategoryforbrand()
    {
        $access = array("1","2");
		$this->checkaccess($access);
		$data['before']=$this->brand_model->beforeedit($this->input->get('brandid'));
        $data['category']=$this->brand_model->getcategory();
        $data['brandcategory']=$this->brand_model->getbrandcategory($this->input->get('brandid'));
//		$data['organizer']=$this->organizer_model->getorganizer();
//		$data['listingtype']=$this->event_model->getlistingtype();
//		$data['remainingticket']=$this->event_model->getremainingticket();
//		$data['page2']='block/eventblock';
		$data['page']='editstorecategoryforbrand';
		$data['title']='Edit Categories in Store';
		$this->load->view('template',$data);
    }
    
    function editstorecategoryforbrandsubmit()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		
           $id=$this->input->get_post('id');
			$brandid=$this->input->get_post('brandid');
            $this->store_model->deletesubcategoryofstore($id);
            
            foreach ($_POST as $key => $value) {
             if(is_array($value)){
//                 echo "hi";
             foreach ($_POST[$key] as $key => $value) {
//                 echo $value."if block <br>";
                 $this->store_model->createsubcategoryofstore($id,$value);
                     }

                     }
                     else{
//                          echo $value."else block <br>";
                         if($key!="id")
                $this->store_model->createsubcategoryofstore($id,$value);
               
                     }
             
                }
			
//			
			$data['table']=$this->store_model->viewstoreinmallforbrand();
			$data['redirect']="site/viewstoreinmallforbrand";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
	}
    
     public function createindividualstoreforbrand()
	{
		$access = array("2");
		$this->checkaccess($access);
		$data[ 'page' ] = 'createindividualstoreforbrand';
		$data[ 'title' ] = 'Create Individual Store';
		$data['city']=$this->city_model->getcitydropdown();
//        $data['brand']=$this->brand_model->getbranddropdown();
        $data['shopclosedon']=$this->store_model->getshopclosedondropdown();
//        $data['mall']=$this->mall_model->getmalldropdown();
//        $data['floor']=$this->mall_model->getfloordropdown();
        $data['location']=$this->city_model->getlocationdropdown();
        $data['brand']=$this->brand_model->getbrandname();
        $data['offer']=$this->offer_model->getofferdropdown();
//        $data['topic']=$this->topic_model->gettopic();
//		$data['listingtype']=$this->event_model->getlistingtype();
//		$data['remainingticket']=$this->event_model->getremainingticket();
		$this->load->view( 'template', $data );	
	}
    
	function createindividualstoreforbrandsubmit()
	{
		$access = array("1","2");
		$this->checkaccess($access);
        print_r($_POST);
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('city','city','trim|required');
//		$this->form_validation->set_rules('brand','brand','trim|required');
		$this->form_validation->set_rules('offer','offer','trim|');
		$this->form_validation->set_rules('workinghoursfrom','Workinghoursfrom','trim|');
		$this->form_validation->set_rules('workinghoursto','workinghoursto','trim|');
		$this->form_validation->set_rules('shopclosedon','shopclosedon','trim|');
		$this->form_validation->set_rules('address','Address','trim|required');
		$this->form_validation->set_rules('description','Description','trim');
		$this->form_validation->set_rules('location','Location','trim|required');
		$this->form_validation->set_rules('latitude','Latitude','trim|required');
		$this->form_validation->set_rules('longitude','Longitude','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[mall.email]');
		$this->form_validation->set_rules('contactno','contactno','trim');
//		$this->form_validation->set_rules('website','Website','trim|max_length[50]');
//		$this->form_validation->set_rules('facebookpage','facebookpage','trim');
//		$this->form_validation->set_rules('twitterpage','twitterpage','trim');
        
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$access = array("2");
            $this->checkaccess($access);
            $data[ 'page' ] = 'createindividualstoreforbrand';
            $data[ 'title' ] = 'Create Individual Store';
            $data['city']=$this->city_model->getcitydropdown();
//            $data['brand']=$this->brand_model->getbranddropdown();
            $data['brand']=$this->brand_model->getbrandname();
            $data['shopclosedon']=$this->store_model->getshopclosedondropdown();
    //        $data['mall']=$this->mall_model->getmalldropdown();
    //        $data['floor']=$this->mall_model->getfloordropdown();
            $data['location']=$this->city_model->getlocationdropdown();
            $data['offer']=$this->offer_model->getofferdropdown();
    //        $data['topic']=$this->topic_model->gettopic();
    //		$data['listingtype']=$this->event_model->getlistingtype();
    //		$data['remainingticket']=$this->event_model->getremainingticket();
            $this->load->view( 'template', $data );
		}
		else
		{
			$name=$this->input->post('name');
			$city=$this->input->post('city');
//			$brand=$this->input->post('brand');
			$brand=$this->session->userdata('brand');
			$offer=$this->input->post('offer');
			$workinghoursfrom=$this->input->post('workinghoursfrom');
			$workinghoursto=$this->input->post('workinghoursto');
			$shopclosedon=$this->input->post('shopclosedon');
			$address=$this->input->post('address');
			$description=$this->input->post('description');
			$location=$this->input->post('location');
			$latitude=$this->input->post('latitude');
			$longitude=$this->input->post('longitude');
			$contactno=$this->input->post('contactno');
//            echo $workinghoursto;
//			$facebookpage=$this->input->post('facebookpage');
//			$twitterpage=$this->input->post('twitterpage');
//			$website=$this->input->post('website');
			$email=$this->input->post('email');
			$format=$this->input->post('format');
//			$config['upload_path'] = './uploads/';
//			$config['allowed_types'] = 'gif|jpg|png|jpeg';
//			$this->load->library('upload', $config);
//			$filename="logo";
//			$logo="";
//			if (  $this->upload->do_upload($filename))
//			{
//				$uploaddata = $this->upload->data();
//				$logo=$uploaddata['file_name'];
//			}
			if($this->store_model->createindividualstore($name,$city,$brand,$address,$location,$latitude,$longitude,$contactno,$email,$format,$offer,$workinghoursfrom,$workinghoursto,$shopclosedon,$description)==0)
			$data['alerterror']="New Individual Store could not be created.";
			else
			$data['alertsuccess']="Individual Store created Successfully.";
			
			$data['table']=$this->store_model->viewindividualstoreforbrand();
			$data['redirect']="site/viewindividualstoreforbrand";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
    
     public function editindividualstoreforbrand()
	{
		$access = array("2");
		$this->checkaccess($access);
		$data[ 'page' ] = 'editindividualstoreforbrand';
		$data[ 'title' ] = 'Edit Individual Store';
		$data['before']=$this->store_model->beforeeditindividualstore($this->input->get('id'));
		$data['city']=$this->city_model->getcitydropdown();
//        $data['brand']=$this->brand_model->getbranddropdown();
         
        $data['brand']=$this->brand_model->getbrandname();
        $data['offer']=$this->offer_model->getofferdropdown();
        $data['shopclosedon']=$this->store_model->getshopclosedondropdown();
//        $data['mall']=$this->mall_model->getmalldropdown();
//        $data['floor']=$this->mall_model->getfloordropdown();
        $data['location']=$this->city_model->getlocationdropdown();
//        $data['topic']=$this->topic_model->gettopic();
//		$data['listingtype']=$this->event_model->getlistingtype();
//		$data['remainingticket']=$this->event_model->getremainingticket();
		$this->load->view( 'template', $data );	
	}
    
    
	function editindividualstoreforbrandsubmit()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('city','city','trim|required');
//		$this->form_validation->set_rules('brand','brand','trim|required');
//		$this->form_validation->set_rules('offer','offer','trim|required');
		$this->form_validation->set_rules('workinghoursfrom','Workinghoursfrom','trim|');
		$this->form_validation->set_rules('workinghoursto','Workinghoursto','trim|');
		$this->form_validation->set_rules('address','Address','trim|required');
		$this->form_validation->set_rules('description','Description','trim');
		$this->form_validation->set_rules('location','Location','trim');
		$this->form_validation->set_rules('latitude','Latitude','trim');
		$this->form_validation->set_rules('longitude','Longitude','trim');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('contactno','contactno','trim');
		$this->form_validation->set_rules('shopclosedon','shopclosedon','trim');
//		$this->form_validation->set_rules('website','Website','trim|max_length[50]');
//		$this->form_validation->set_rules('facebookpage','facebookpage','trim');
//		$this->form_validation->set_rules('twitterpage','twitterpage','trim');
        
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$access = array("2");
            $this->checkaccess($access);
            $data[ 'page' ] = 'editindividualstoreforbrand';
            $data[ 'title' ] = 'Edit Individual Store';
            $data['before']=$this->store_model->beforeeditindividualstore($this->input->get('id'));
            $data['city']=$this->city_model->getcitydropdown();
    //        $data['brand']=$this->brand_model->getbranddropdown();

            $data['brand']=$this->brand_model->getbrandname();
            $data['offer']=$this->offer_model->getofferdropdown();
            $data['shopclosedon']=$this->store_model->getshopclosedondropdown();
    //        $data['mall']=$this->mall_model->getmalldropdown();
    //        $data['floor']=$this->mall_model->getfloordropdown();
            $data['location']=$this->city_model->getlocationdropdown();
    //        $data['topic']=$this->topic_model->gettopic();
    //		$data['listingtype']=$this->event_model->getlistingtype();
    //		$data['remainingticket']=$this->event_model->getremainingticket();
            $this->load->view( 'template', $data );	
		}
		else
		{
			$id=$this->input->get_post('id');
			$name=$this->input->post('name');
			$city=$this->input->post('city');
//			$brand=$this->input->post('brand');
			$brand=$this->session->userdata('brand');
			$offer=$this->input->post('offer');
			$workinghoursfrom=$this->input->post('workinghoursfrom');
			$workinghoursto=$this->input->post('workinghoursto');
			$shopclosedon=$this->input->post('shopclosedon');
			$address=$this->input->post('address');
			$description=$this->input->post('description');
			$location=$this->input->post('location');
			$latitude=$this->input->post('latitude');
			$longitude=$this->input->post('longitude');
			$contactno=$this->input->post('contactno');
			$facebookpage=$this->input->post('facebookpage');
			$twitterpage=$this->input->post('twitterpage');
			$website=$this->input->post('website');
			$email=$this->input->post('email');
			$format=$this->input->post('format');
			if($this->store_model->editindividualstore($id,$name,$city,$brand,$address,$location,$latitude,$longitude,$contactno,$email,$format,$offer,$workinghoursfrom,$workinhhoursto,$shopclosedon,$description)==0)
			$data['alerterror']=" Individual Store could not be Updated.";
			else
			$data['alertsuccess']="Individual Store Updated Successfully.";
			
			$data['table']=$this->store_model->viewindividualstoreforbrand();
			$data['redirect']="site/viewindividualstoreforbrand";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
    
    function viewindividualstorecategoryforbrand()
    {
        $access = array("1","2");
		$this->checkaccess($access);
		//$data['before']=$this->brand_model->beforeedit($this->input->get('brandid'));
        $data['category']=$this->brand_model->getcategory();
        $data['brandcategory']=$this->store_model->getstorecategory($this->input->get('id'));
//		$data['organizer']=$this->organizer_model->getorganizer();
//		$data['listingtype']=$this->event_model->getlistingtype();
//		$data['remainingticket']=$this->event_model->getremainingticket();
//		$data['page2']='block/eventblock';
		$data['page']='viewindividualstorecategoryforbrand';
		$data['title']='View Categories in Store';
		$this->load->view('template',$data);
    }
    
    function editindividualstorecategoryforbrand()
    {
        $access = array("1","2");
		$this->checkaccess($access);
		$data['before']=$this->brand_model->beforeedit($this->input->get('brandid'));
        $data['category']=$this->brand_model->getcategory();
        $data['brandcategory']=$this->brand_model->getbrandcategory($this->input->get('brandid'));
//		$data['organizer']=$this->organizer_model->getorganizer();
//		$data['listingtype']=$this->event_model->getlistingtype();
//		$data['remainingticket']=$this->event_model->getremainingticket();
//		$data['page2']='block/eventblock';
		$data['page']='editindividualstorecategoryforbrand';
		$data['title']='Edit Categories in Store';
		$this->load->view('template',$data);
    }
    
    function editindividualstorecategoryforbrandsubmit()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		
           $id=$this->input->get_post('id');
			$brandid=$this->input->get_post('brandid');
            $this->store_model->deletesubcategoryofstore($id);
            
            foreach ($_POST as $key => $value) {
             if(is_array($value)){
//                 echo "hi";
             foreach ($_POST[$key] as $key => $value) {
//                 echo $value."if block <br>";
                 $this->store_model->createsubcategoryofstore($id,$value);
                     }

                     }
                     else{
//                          echo $value."else block <br>";
                         if($key!="id")
                $this->store_model->createsubcategoryofstore($id,$value);
               
                     }
             
                }
			
//			
			$data['table']=$this->store_model->viewstoreinmallforbrand();
			$data['redirect']="site/viewindividualstoreforbrand";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
	}
    
	function deleteindividualstoreforbrand()
	{
		$access = array("2");
		$this->checkaccess($access);
		$this->store_model->deletestoreinmall($this->input->get('id'));
		$data['table']=$this->store_model->viewindividualstoreforbrand();
		$data['page']='viewindividualstoreforbrand';
		$data['title']='View Individual Stores';
		$this->load->view('template',$data);
	}
    
    
	function viewofferforbrand()
	{
		$access = array("1","2");
		$this->checkaccess($access);
		$data['table']=$this->offer_model->viewofferforbrand();
		$data['page']='viewofferforbrand';
		$data['title']='View offer';
		$this->load->view('template',$data);
	}
    
	public function createofferforbrand()
	{
		$access = array("2");
		$this->checkaccess($access);
		//$data[ 'status' ] =$this->user_model->getstatusdropdown();
		//$data['topic']=$this->topic_model->gettopicdropdown();
//        $data['brand']=$this->brand_model->getbranddropdown();
        $data['brand']=$this->brand_model->getbrandname();
        
		$data[ 'page' ] = 'createofferforbrand';
		$data[ 'title' ] = 'Create offer';
		$this->load->view( 'template', $data );	
	}
    
	function createofferforbrandsubmit()
	{
		$access = array("2");
		$this->checkaccess($access);
        print_r($_POST);
		$this->form_validation->set_rules('header','header','trim|required');
		$this->form_validation->set_rules('description','description','trim|');
//		$this->form_validation->set_rules('from','From','trim');
//		$this->form_validation->set_rules('to','To','trim');
//		$this->form_validation->set_rules('brand','Brand','trim');
//		$this->form_validation->set_rules('storeid','storeid','trim');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$access = array("2");
            $this->checkaccess($access);
            //$data[ 'status' ] =$this->user_model->getstatusdropdown();
            //$data['topic']=$this->topic_model->gettopicdropdown();
    //        $data['brand']=$this->brand_model->getbranddropdown();
            $data['brand']=$this->brand_model->getbrandname();

            $data[ 'page' ] = 'createofferforbrand';
            $data[ 'title' ] = 'Create offer';
            $this->load->view( 'template', $data );
		}
		else
		{
//            print_r($_POST);
            //echo "<br>";
			$header=$this->input->post('header');
			$description=$this->input->post('description');
			$from=$this->input->post('from');
			$to=$this->input->post('to');
			$brand=$this->session->userdata('brand');
			$storeid=$this->input->post('storeid');
            
//            print_r($storeid);
            
            if($from != "")
			{
				$from = date("Y-m-d",strtotime($from));
			}
            if($to != "")
			{
				$to = date("Y-m-d",strtotime($to));
			}
			if($this->offer_model->createoffer($header,$description,$from,$to,$brand,$storeid)==0)
			$data['alerterror']="New offer could not be created.";
			else
			$data['alertsuccess']="offer  created Successfully.";
			$data['table']=$this->offer_model->viewofferforbrand();
			$data['redirect']="site/viewofferforbrand";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
    
	function editofferforbrand()
	{
		$access = array("2");
		$this->checkaccess($access);
		$data['before']=$this->offer_model->beforeeditoffer($this->input->get('id'));
        $data['store']=$this->store_model->getstorebybrandfordropdown($data['before']->brandid);
        $data['selectedstore']=$this->store_model->getstorebyoffers($this->input->get('id'));
//        $data['brand']=$this->brand_model->getbranddropdown();
        $data['brand']=$this->brand_model->getbrandname();
		$data['page']='editofferforbrand';
		$data['title']='Edit offer';
		$this->load->view('template',$data);
	}
	function editofferforbrandsubmit()
	{
		$access = array("2");
		$this->checkaccess($access);
        print_r($_POST);
		$this->form_validation->set_rules('header','header','trim|required');
		$this->form_validation->set_rules('description','description','trim|');
		$this->form_validation->set_rules('from','From','trim');
		$this->form_validation->set_rules('to','To','trim');
		//$this->form_validation->set_rules('brand','Brand','trim');
		//$this->form_validation->set_rules('storeid','storeid','trim');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
            $access = array("2");
            $this->checkaccess($access);
            $data['before']=$this->offer_model->beforeeditoffer($this->input->get('id'));
            $data['store']=$this->store_model->getstorebybrandfordropdown($data['before']->brandid);
            $data['selectedstore']=$this->store_model->getstorebyoffers($this->input->get('id'));
    //        $data['brand']=$this->brand_model->getbranddropdown();
            $data['brand']=$this->brand_model->getbrandname();
            $data['page']='editofferforbrand';
            $data['title']='Edit offer';
            $this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->post('id');
			$header=$this->input->post('header');
			$description=$this->input->post('description');
			$from=$this->input->post('from');
			$to=$this->input->post('to');
			$brand=$this->session->userdata('brand');
			$storeid=$this->input->post('storeid');
            echo $brand;
            if($from != "")
			{
				$from = date("Y-m-d",strtotime($from));
			}
            if($to != "")
			{
				$to = date("Y-m-d",strtotime($to));
			}
			if($this->offer_model->editoffer($id,$header,$description,$from,$to,$brand,$storeid)==0)
			$data['alerterror']="offer Editing was unsuccesful";
			else
			$data['alertsuccess']="offer edited Successfully.";
			$data['table']=$this->offer_model->viewofferforbrand();
			$data['redirect']="site/viewofferforbrand";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
	function deleteofferforbrand()
	{
		$access = array("2");
		$this->checkaccess($access);
		$this->offer_model->deleteoffer($this->input->get('id'));
		$data['table']=$this->offer_model->viewofferforbrand();
		$data['alertsuccess']="offer Deleted Successfully";
		$data['page']='viewofferforbrand';
		$data['title']='View offer';
		$this->load->view('template',$data);
	}
    
    
	function deleteallofferforbrand()
	{
		$access = array("2");
		$this->checkaccess($access);
		$this->offer_model->deleteallofferforbrand();
		$data['table']=$this->offer_model->viewofferforbrand();
		$data['alertsuccess']="ALL Offers Deleted Successfully";
		$data['page']='viewofferforbrand';
		$data['title']='View Offer';
		$this->load->view('template',$data);
	}
    
     function viewnewinforbrand()
	{
		$access = array("2");
		$this->checkaccess($access);
		$data['table']=$this->imagegallery_model->viewnewinforbrand();
		$data['page']='viewnewinforbrand';
		$data['title']='View New In';
		$this->load->view('template',$data);
	}  
    
	public function createnewinforbrand()
	{
		$access = array("2");
		$this->checkaccess($access);
//        $data['brand']=$this->brand_model->getbranddropdown();
        $data['brand']=$this->brand_model->getbrandname();
		$data[ 'page' ] = 'createnewinforbrand';
		$data[ 'title' ] = 'Create New In';
		$this->load->view( 'template', $data );	
	}
    
    function createnewinforbrandsubmit()
	{
		$access = array("2");
		$this->checkaccess($access);
		//$this->form_validation->set_rules('image','Image','trim|required');
		$this->form_validation->set_rules('description','Description','trim|required');
        
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			
            $data['brand']=$this->brand_model->getbrandname();
            $data[ 'page' ] = 'createnewinforbrand';
            $data[ 'title' ] = 'Create New In';
            $this->load->view( 'template', $data );
		}
		else
		{
			//$image=$this->input->post('image');
			$description=$this->input->post('description');
			$brand=$this->session->userdata('brand');
			$storeid=$this->input->post('storeid');
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$logo="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
			}
			if($this->imagegallery_model->createnewin($image,$description,$brand,$storeid)==0)
			$data['alerterror']="New In could not be created.";
			else
			$data['alertsuccess']="New In created Successfully.";
			
			$data['table']=$this->imagegallery_model->viewnewinforbrand();
			$data['redirect']="site/viewnewinforbrand";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
    
	function editnewinforbrand()
	{
		$access = array("2");
		$this->checkaccess($access);
		$data['before']=$this->imagegallery_model->beforeeditnewin($this->input->get('id'));
//        $data['brand']=$this->brand_model->getbranddropdown();
        $data['brand']=$this->brand_model->getbrandname();
        
        $data['store']=$this->store_model->getstorebybrandfordropdown($data['before']->brandid);
        $data['selectedstore']=$this->store_model->getstorebynewin($this->input->get('id'));
//        $data['brand']=$this->brand_model->getbranddropdown();
		$data['page']='editnewinforbrand';
		$data['title']='Edit New in';
		$this->load->view('template',$data);
	}
    
    function editnewinforbrandsubmit()
	{
		$access = array("1","2");
		$this->checkaccess($access);
        
		$this->form_validation->set_rules('description','Description','trim|required');
        
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			
            $data['before']=$this->imagegallery_model->beforeeditnewin($this->input->get('id'));
    //        $data['brand']=$this->brand_model->getbranddropdown();
            $data['brand']=$this->brand_model->getbrandname();

            $data['store']=$this->store_model->getstorebybrandfordropdown($data['before']->brandid);
            $data['selectedstore']=$this->store_model->getstorebynewin($this->input->get('id'));
    //        $data['brand']=$this->brand_model->getbranddropdown();
            $data['page']='editnewinforbrand';
            $data['title']='Edit New in';
            $this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->post('id');
			$description=$this->input->post('description');
			$brand=$this->session->userdata('brand');
			$storeid=$this->input->post('storeid');
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
			}
            
            if($image=="")
            {
            $image=$this->imagegallery_model->getnewinimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }
			if($this->imagegallery_model->editnewin($id,$image,$description,$brand,$storeid)==0)
			$data['alerterror']="New In Editing was unsuccesful";
			else
			$data['alertsuccess']="New In edited Successfully.";
			
			$data['redirect']="site/viewnewinforbrand";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
			
		}
	}
    
	function deletenewinforbrand()
	{
		$access = array("2");
		$this->checkaccess($access);
		$this->imagegallery_model->deletenewin($this->input->get('id'));
		$data['table']=$this->imagegallery_model->viewnewinforbrand();
		$data['alertsuccess']="New In Deleted Successfully";
		$data['page']='viewnewinforbrand';
		$data['title']='View New In';
		$this->load->view('template',$data);
	}
	
	function deleteallnewinforbrand()
	{
		$access = array("2");
		$this->checkaccess($access);
		$this->imagegallery_model->deleteallnewinforbrand();
		$data['table']=$this->imagegallery_model->viewnewinforbrand();
		$data['alertsuccess']="ALL New In Deleted Successfully";
		$data['page']='viewnewinforbrand';
		$data['title']='View New In';
		$this->load->view('template',$data);
	}
    
	function editstoreforstore()
	{
		$access = array("3");
		$this->checkaccess($access);
        $storeid=$this->session->userdata('store');
        $brandid=$this->session->userdata('brand');
        $storedetails=$this->store_model->getstoredetails($storeid);
//        print_r($storedetails);
//        echo $storedetails->format;
        if($storedetails->format==1)
        {
		$data['before']=$this->store_model->beforeeditstoreinmall($storeid);
		$data['city']=$this->city_model->getcitydropdown();
        $data['brand']=$this->brand_model->getbrandname();
        $data['mall']=$this->mall_model->getmalldropdown();
        $data['floor']=$this->mall_model->getfloordropdown();
        $data['shopclosedon']=$this->store_model->getshopclosedondropdown();
        $data['offer']=$this->offer_model->getofferdropdown();
        $data['category']=$this->brand_model->getcategory();
        $data['brandcategory']=$this->brand_model->getbrandcategory($brandid);
		$data['page']='editstoreinmallforstore';
		$data['title']='Edit store in mall';
		$this->load->view('template',$data);
        }
        elseif($storedetails->format==2)
        {
        $data[ 'page' ] = 'editindividualstoreforstore';
		$data[ 'title' ] = 'Edit Individual Store';
		$data['before']=$this->store_model->beforeeditindividualstore($storeid);
		$data['city']=$this->city_model->getcitydropdown();
//        $data['brand']=$this->brand_model->getbranddropdown();
        $data['brand']=$this->brand_model->getbrandname();
        $data['offer']=$this->offer_model->getofferdropdown();
        $data['shopclosedon']=$this->store_model->getshopclosedondropdown();
//        $data['mall']=$this->mall_model->getmalldropdown();
//        $data['floor']=$this->mall_model->getfloordropdown();
        $data['location']=$this->city_model->getlocationdropdown();
//        $data['topic']=$this->topic_model->gettopic();
//		$data['listingtype']=$this->event_model->getlistingtype();
//		$data['remainingticket']=$this->event_model->getremainingticket();
		$this->load->view( 'template', $data );	
        }
        else
        {
        echo "Something Went wrong";
        }
	}
    
	function editstoreinmallforstoresubmit()
	{
		$access = array("3");
		$this->checkaccess($access);
//        echo "Hello";
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('city','city','trim|required');
//		$this->form_validation->set_rules('brand','brand','trim|required');
		$this->form_validation->set_rules('mall','mall','trim|required');
		$this->form_validation->set_rules('floor','floor','trim');
		$this->form_validation->set_rules('offer','offer','trim|');
		$this->form_validation->set_rules('description','Description','trim|');
		$this->form_validation->set_rules('shopclosedon','Shopclosedon','trim|');
		$this->form_validation->set_rules('workinghoursfrom','Workinghoursfrom','trim|');
		$this->form_validation->set_rules('workinghoursto','Workinghoursto','trim|');
        $this->form_validation->set_rules('email','Email','trim|valid_email');
		$this->form_validation->set_rules('contactno','contactno','trim');
//        echo "Hello2";
		if($this->form_validation->run() == FALSE)	
		{
//            echo "Hello3";
			$data['alerterror'] = validation_errors();
			$data['before']=$this->store_model->beforeeditstoreinmall($storeid);
            $data['city']=$this->city_model->getcitydropdown();
            $data['brand']=$this->brand_model->getbrandname();
            $data['mall']=$this->mall_model->getmalldropdown();
            $data['floor']=$this->mall_model->getfloordropdown();
            $data['shopclosedon']=$this->store_model->getshopclosedondropdown();
            $data['offer']=$this->offer_model->getofferdropdown();
            $data['category']=$this->brand_model->getcategory();
            $data['brandcategory']=$this->brand_model->getbrandcategory($brandid);
            $data['page']='editstoreinmallforstore';
            $data['title']='Edit store in mall';
            $this->load->view('template',$data);
		}
		else
		{
            $id=$this->session->userdata('store');
			$name=$this->input->post('name');
			$city=$this->input->post('city');
			$brand=$this->session->userdata('brand');
			$mall=$this->input->post('mall');
			$floor=$this->input->post('floor');
			$offer=$this->input->post('offer');
			$contactno=$this->input->post('contactno');
			$description=$this->input->post('description');
			$format=$this->input->post('format');
			$shopclosedon=$this->input->post('shopclosedon');
			$workinghoursfrom=$this->input->post('workinghoursfrom');
			$workinghoursto=$this->input->post('workinghoursto');
			$email=$this->input->post('email');
//            print_r($_POST);
            foreach ($_POST as $key => $value) {
                
               // print_r($value);
             if(is_array($value)){
//                 echo "hi";
             foreach ($_POST[$key] as $key => $value) {
                 $this->store_model->createsubcategory($id,$value);
                     }

                     }
                     else{
                         if($key!="name" || $key!="city" || $key!="brand" || $key!="mall" || $key!="floor" || $key!="offer"|| $key!="contactno"|| $key!="description"|| $key!="email"|| $key!="format"|| $key!="shopclosedon"|| $key!="workinghoursfrom"|| $key!="workinghoursto")
                         {
//                             echo $value.'else<br>';
                $this->store_model->createsubcategory($id,$value);
                         }
                     }
             
                }
            
			if($this->store_model->editstoreinmall($id,$name,$city,$brand,$mall,$floor,$contactno,$email,$format,$offer,$shopclosedon,$workinghoursfrom,$workinghoursto,$description)==0)
			$data['alerterror']="Store in Mall could not be edited.";
			else
			$data['alertsuccess']="Store in Mall Updated Successfully.";
			
//			$data['table']=$this->store_model->viewstoreinmall();
			$data['redirect']="site/editstoreforstore";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
    
    
	function editindividualstoreforstoresubmit()
	{
		$access = array("3");
		$this->checkaccess($access);
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('city','city','trim|required');
//		$this->form_validation->set_rules('brand','brand','trim|required');
		$this->form_validation->set_rules('offer','offer','trim');
		$this->form_validation->set_rules('workinghoursfrom','Workinghoursfrom','trim|');
		$this->form_validation->set_rules('workinghoursto','Workinghoursto','trim|');
		$this->form_validation->set_rules('address','Address','trim|required');
		$this->form_validation->set_rules('description','Description','trim');
		$this->form_validation->set_rules('location','Location','trim');
		$this->form_validation->set_rules('latitude','Latitude','trim');
		$this->form_validation->set_rules('longitude','Longitude','trim');
        $this->form_validation->set_rules('email','Email','trim|valid_email');
		$this->form_validation->set_rules('contactno','contactno','trim');
//		$this->form_validation->set_rules('website','Website','trim|max_length[50]');
//		$this->form_validation->set_rules('facebookpage','facebookpage','trim');
//		$this->form_validation->set_rules('twitterpage','twitterpage','trim');
        
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'page' ] = 'editindividualstoreforstore';
            $data[ 'title' ] = 'Edit Individual Store';
            $data['before']=$this->store_model->beforeeditindividualstore($storeid);
            $data['city']=$this->city_model->getcitydropdown();
    //        $data['brand']=$this->brand_model->getbranddropdown();
            $data['brand']=$this->brand_model->getbrandname();
            $data['offer']=$this->offer_model->getofferdropdown();
            $data['shopclosedon']=$this->store_model->getshopclosedondropdown();
    //        $data['mall']=$this->mall_model->getmalldropdown();
    //        $data['floor']=$this->mall_model->getfloordropdown();
            $data['location']=$this->city_model->getlocationdropdown();
    //        $data['topic']=$this->topic_model->gettopic();
    //		$data['listingtype']=$this->event_model->getlistingtype();
    //		$data['remainingticket']=$this->event_model->getremainingticket();
            $this->load->view( 'template', $data );
		}
		else
		{
//			$id=$this->input->get_post('id');
			$id=$this->session->userdata('store');
			$name=$this->input->post('name');
			$city=$this->input->post('city');
//			$brand=$this->input->post('brand');
			$brand=$this->session->userdata('brand');
			$offer=$this->input->post('offer');
			$workinghoursfrom=$this->input->post('workinghoursfrom');
			$workinghoursto=$this->input->post('workinghoursto');
			$shopclosedon=$this->input->post('shopclosedon');
			$address=$this->input->post('address');
			$description=$this->input->post('description');
			$location=$this->input->post('location');
			$latitude=$this->input->post('latitude');
			$longitude=$this->input->post('longitude');
			$contactno=$this->input->post('contactno');
			$facebookpage=$this->input->post('facebookpage');
			$twitterpage=$this->input->post('twitterpage');
			$website=$this->input->post('website');
			$email=$this->input->post('email');
			$format=$this->input->post('format');
			if($this->store_model->editindividualstore($id,$name,$city,$brand,$address,$location,$latitude,$longitude,$contactno,$email,$format,$offer,$workinghoursfrom,$workinhhoursto,$shopclosedon,$description)==0)
			$data['alerterror']=" Individual Store could not be Updated.";
			else
			$data['alertsuccess']="Individual Store Updated Successfully.";
			
//			$data['table']=$this->store_model->viewindividualstore();
			$data['redirect']="site/editstoreforstore";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
    
    
    function editstorecategoryforstore()
    {
        $access = array("3");
		$this->checkaccess($access);
        $brandid=$this->session->userdata('brand');
        $storeid=$this->session->userdata('store');
		$data['before']=$this->brand_model->beforeedit($brandid);
        $data['category']=$this->brand_model->getcategory();
        $data['brandcategory']=$this->brand_model->getbrandcategory($brandid);
//		$data['organizer']=$this->organizer_model->getorganizer();
//		$data['listingtype']=$this->event_model->getlistingtype();
//		$data['remainingticket']=$this->event_model->getremainingticket();
//		$data['page2']='block/eventblock';
		$data['page']='editstorecategoryforstore';
		$data['title']='Edit Categories in Store';
		$this->load->view('template',$data);
    }
    
    function editstorecategoryforstoresubmit()
	{
		$access = array("3");
		$this->checkaccess($access);
//           $id=$this->input->get_post('id');
//			$brandid=$this->input->get_post('brandid');
        $id=$this->session->userdata('store');
        $brandid=$this->session->userdata('brand');
//        echo $id."<br>";
//        echo $brandid;
//        print_r($_POST);
            $this->store_model->deletesubcategoryofstore($id);
            
            foreach ($_POST as $key => $value) {
             if(is_array($value)){
//                 echo "hi";
             foreach ($_POST[$key] as $key => $value) {
//                 echo $value."if block <br>";
                 $this->store_model->createsubcategoryofstore($id,$value);
                     }

                     }
                     else{
//                          echo $value."else block <br>";
                         if($key!="id")
                $this->store_model->createsubcategoryofstore($id,$value);
               
                     }
             
                }
			
//			
//			$data['table']=$this->store_model->viewstoreinmall();
			$data['redirect']="site/editstorecategoryforstore";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
	}
    
    
    function viewstorecategoryforstore()
    {
        $access = array("3");
		$this->checkaccess($access);
        $storeid=$this->session->userdata('store');
        $brandid=$this->session->userdata('brand');
		//$data['before']=$this->brand_model->beforeedit($this->input->get('brandid'));
        $data['category']=$this->brand_model->getcategory();
        $data['brandcategory']=$this->store_model->getstorecategory($storeid);
//		$data['organizer']=$this->organizer_model->getorganizer();
//		$data['listingtype']=$this->event_model->getlistingtype();
//		$data['remainingticket']=$this->event_model->getremainingticket();
//		$data['page2']='block/eventblock';
		$data['page']='viewstorecategoryforstore';
		$data['title']='View Categories in Store';
		$this->load->view('template',$data);
    }
    
//    function editstorecategoryforstoresubmit()
//	{
//		$access = array("3");
//		$this->checkaccess($access);
//		
////           $id=$this->input->get_post('id');
////			$brandid=$this->input->get_post('brandid');
//        $id=$this->session->userdata('store');
//        $brandid=$this->session->userdata('brand');
//            $this->store_model->deletesubcategoryofstore($id);
//            
//            foreach ($_POST as $key => $value) {
//             if(is_array($value)){
////                 echo "hi";
//             foreach ($_POST[$key] as $key => $value) {
////                 echo $value."if block <br>";
//                 $this->store_model->createsubcategoryofstore($id,$value);
//                     }
//
//                     }
//                     else{
////                          echo $value."else block <br>";
//                         if($key!="id")
//                $this->store_model->createsubcategoryofstore($id,$value);
//               
//                     }
//             
//                }
//			
////			
////			$data['table']=$this->store_model->viewstoreinmall();
//			$data['redirect']="site/viewstorecategoryforstore";
//			//$data['other']="template=$template";
//			$this->load->view("redirect",$data);
//	}
    
    
	function viewofferforstore()
	{
		$access = array("3");
		$this->checkaccess($access);
		$data['table']=$this->offer_model->viewofferforstore();
		$data['page']='viewofferforstore';
		$data['title']='View offer';
		$this->load->view('template',$data);
	}
    
	public function createofferforstore()
	{
		$access = array("3");
		$this->checkaccess($access);
		//$data[ 'status' ] =$this->user_model->getstatusdropdown();
		//$data['topic']=$this->topic_model->gettopicdropdown();
//        $data['brand']=$this->brand_model->getbranddropdown();
        $data['brand']=$this->brand_model->getbrandname();
        $data['store']=$this->store_model->getstorename();
        
		$data[ 'page' ] = 'createofferforstore';
		$data[ 'title' ] = 'Create offer';
		$this->load->view( 'template', $data );	
	}
	function createofferforstoresubmit()
	{
		$access = array("3");
		$this->checkaccess($access);
//        print_r($_POST);
		$this->form_validation->set_rules('header','header','trim|required');
		$this->form_validation->set_rules('description','description','trim|');
//		$this->form_validation->set_rules('from','From','trim');
//		$this->form_validation->set_rules('to','To','trim');
//		$this->form_validation->set_rules('brand','Brand','trim');
//		$this->form_validation->set_rules('storeid','storeid','trim');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
//			$data[ 'status' ] =$this->user_model->getstatusdropdown();
//			$data['offer']=$this->offer_model->getofferdropdown();
			$data['brand']=$this->brand_model->getbrandname();
            $data['store']=$this->store_model->getstorename();

            $data[ 'page' ] = 'createofferforstore';
            $data[ 'title' ] = 'Create offer';
            $this->load->view( 'template', $data );
		}
		else
		{
//            print_r($_POST);
            //echo "<br>";
			$header=$this->input->post('header');
			$description=$this->input->post('description');
			$from=$this->input->post('from');
			$to=$this->input->post('to');
			$brand=$this->session->userdata('brand');
			$store=$this->session->userdata('store');
//            echo $store;
//            print_r($storeid);
            
            if($from != "")
			{
				$from = date("Y-m-d",strtotime($from));
			}
            if($to != "")
			{
				$to = date("Y-m-d",strtotime($to));
			}
			if($this->offer_model->createofferforstore($header,$description,$from,$to,$brand,$store)==0)
			$data['alerterror']="New offer could not be created.";
			else
			$data['alertsuccess']="offer  created Successfully.";
			$data['table']=$this->offer_model->viewofferforstore();
            $data['page']='viewofferforstore';
            $data['title']='View offer';
            $this->load->view('template',$data);
		}
	}
    
	function editofferforstore()
	{
		$access = array("3");
		$this->checkaccess($access);
		$data['before']=$this->offer_model->beforeeditofferforstore($this->input->get('id'));
//        $data['store']=$this->store_model->getstorebybrandfordropdown($data['before']->brandid);
//        $data['selectedstore']=$this->store_model->getstorebyoffers($this->input->get('id'));
        
        $data['brand']=$this->brand_model->getbrandname();
        $data['store']=$this->store_model->getstorename();
//        $data['brand']=$this->brand_model->getbranddropdown();
		$data['page']='editofferforstore';
		$data['title']='Edit offer';
		$this->load->view('template',$data);
	}
    function editofferforstoresubmit()
	{
		$access = array("3");
		$this->checkaccess($access);
		$this->form_validation->set_rules('header','header','trim|required');
		$this->form_validation->set_rules('description','description','trim|');
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
            $data['before']=$this->offer_model->beforeeditofferforstore($this->input->get('id'));
            $data['brand']=$this->brand_model->getbrandname();
            $data['store']=$this->store_model->getstorename();
            $data['page']='editofferforstore';
            $data['title']='Edit offer';
            $this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->post('id');
			$header=$this->input->post('header');
			$description=$this->input->post('description');
			$from=$this->input->post('from');
			$to=$this->input->post('to');
			$brand=$this->session->userdata('brand');
			$store=$this->session->userdata('store');
//            echo $brand;
            if($from != "")
			{
				$from = date("Y-m-d",strtotime($from));
			}
            if($to != "")
			{
				$to = date("Y-m-d",strtotime($to));
			}
			if($this->offer_model->editofferforstore($id,$header,$description,$from,$to,$brand,$store)==0)
			$data['alerterror']="offer Editing was unsuccesful";
			else
			$data['alertsuccess']="offer edited Successfully.";
			$data['table']=$this->offer_model->viewofferforstore();
            $data['page']='viewofferforstore';
            $data['title']='View offer';
            $this->load->view('template',$data);
		}
	}
    
	function deleteofferforstore()
	{
		$access = array("3");
		$this->checkaccess($access);
		$this->offer_model->deleteofferforstore($this->input->get('id'),$this->input->get('storeoffersid'));
//		$data['table']=$this->offer_model->viewofferforbrand();
		$data['alertsuccess']="offer Deleted Successfully";
		$data['table']=$this->offer_model->viewofferforstore();
        $data['page']='viewofferforstore';
        $data['title']='View offer';
        $this->load->view('template',$data);
	}
    
	function deletealloffersforstore()
	{
		$access = array("3");
		$this->checkaccess($access);
		$this->offer_model->deletealloffersforstore();
		$data['table']=$this->offer_model->viewoffer();
		$data['alertsuccess']="ALL Offers Deleted Successfully";
		$data['page']='viewoffer';
		$data['title']='View Offer';
		$this->load->view('template',$data);
	}
    
     function viewnewinforstore()
	{
		$access = array("3");
		$this->checkaccess($access);
		$data['table']=$this->imagegallery_model->viewnewinforstore();
		$data['page']='viewnewinforstore';
		$data['title']='View New In';
		$this->load->view('template',$data);
	}  
    
	public function createnewinforstore()
	{
		$access = array("3");
		$this->checkaccess($access);
//        $data['brand']=$this->brand_model->getbranddropdown();
        $data['store']=$this->store_model->getstorename();
        $data['brand']=$this->brand_model->getbrandname();
		$data[ 'page' ] = 'createnewinforstore';
		$data[ 'title' ] = 'Create New In';
		$this->load->view( 'template', $data );	
	}
    
    function createnewinforstoresubmit()
	{
		$access = array("3");
		$this->checkaccess($access);
		//$this->form_validation->set_rules('image','Image','trim|required');
		$this->form_validation->set_rules('description','Description','trim|required');
        
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			
            $data['brand']=$this->brand_model->getbranddropdown();
            $data[ 'page' ] = 'createnewin';
            $data[ 'title' ] = 'Create New In';
            $this->load->view( 'template', $data );	
		}
		else
		{
			//$image=$this->input->post('image');
			$description=$this->input->post('description');
			$brand=$this->session->userdata('brand');
			$storeid=$this->session->userdata('store');
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$logo="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
			}
			if($this->imagegallery_model->createnewinforstore($image,$description,$brand,$storeid)==0)
			$data['alerterror']="New In could not be created.";
			else
			$data['alertsuccess']="New In created Successfully.";
			$data['table']=$this->imagegallery_model->viewnewinforstore();
            $data['page']='viewnewinforstore';
            $data['title']='View New In';
            $this->load->view('template',$data);
		}
	}
    
	function editnewinforstore()
	{
		$access = array("3");
		$this->checkaccess($access);
		$data['before']=$this->imagegallery_model->beforeeditnewinforstore($this->input->get('id'));
//        $data['brand']=$this->brand_model->getbranddropdown();
        $data['brand']=$this->brand_model->getbrandname();
        $data['store']=$this->store_model->getstorename();
        
//        $data['store']=$this->store_model->getstorebybrandfordropdown($data['before']->brandid);
//        $data['selectedstore']=$this->store_model->getstorebynewin($this->input->get('id'));
//        $data['brand']=$this->brand_model->getbranddropdown();
		$data['page']='editnewinforstore';
		$data['title']='Edit New in';
		$this->load->view('template',$data);
	}

    
    function editnewinforstoresubmit()
	{
		$access = array("3");
		$this->checkaccess($access);
        
		$this->form_validation->set_rules('description','Description','trim|required');
        
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['before']=$this->imagegallery_model->beforeeditnewinforstore($this->input->get('id'));
    //        $data['brand']=$this->brand_model->getbranddropdown();
            $data['brand']=$this->brand_model->getbrandname();
            $data['store']=$this->store_model->getstorename();

    //        $data['store']=$this->store_model->getstorebybrandfordropdown($data['before']->brandid);
    //        $data['selectedstore']=$this->store_model->getstorebynewin($this->input->get('id'));
    //        $data['brand']=$this->brand_model->getbranddropdown();
            $data['page']='editnewinforstore';
            $data['title']='Edit New in';
            $this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->post('id');
			$description=$this->input->post('description');
			$brand=$this->session->userdata('brand');
			$storeid=$this->session->userdata('store');
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
			}
            
            if($image=="")
            {
            $image=$this->imagegallery_model->getnewinimagebyid($id);
                $image=$image->image;
            }
			if($this->imagegallery_model->editnewinforstore($id,$image,$description,$brand,$store)==0)
			$data['alerterror']="New In Editing was unsuccesful";
			else
			$data['alertsuccess']="New In edited Successfully.";
			
			$data['redirect']="site/viewnewinforstore";
			$this->load->view("redirect",$data);
			
		}
	}
    
	function deletenewinforstore()
	{
		$access = array("3");
		$this->checkaccess($access);
		$this->imagegallery_model->deletenewinforstore($this->input->get('id'),$this->input->get('storenewinid'));
		$data['table']=$this->imagegallery_model->viewnewinforstore();
		$data['alertsuccess']="New In Deleted Successfully";
		$data['page']='viewnewinforstore';
		$data['title']='View New In';
		$this->load->view('template',$data);
	}
	
    //banner
    
     function viewbanner()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['table']=$this->imagegallery_model->viewbanner();
		$data['page']='viewbanner';
		$data['title']='View New In';
		$this->load->view('template',$data);
	} 
    
	public function createbanner()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'page' ] = 'createbanner';
		$data[ 'title' ] = 'Create New In';
		$this->load->view( 'template', $data );	
	}
    
    function createbannersubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('title','title','trim|required');
		$this->form_validation->set_rules('link','link','trim');
		$this->form_validation->set_rules('order','order','trim');
        
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'page' ] = 'createbanner';
            $data[ 'title' ] = 'Create New In';
            $this->load->view( 'template', $data );	
		}
		else
		{
			$title=$this->input->post('title');
			$link=$this->input->post('link');
			$order=$this->input->post('order');
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$logo="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
			}
			if($this->imagegallery_model->createbanner($image,$title,$link,$order)==0)
			$data['alerterror']="Banner could not be created.";
			else
			$data['alertsuccess']="Banner created Successfully.";
			
			$data['table']=$this->imagegallery_model->viewbanner();
			$data['redirect']="site/viewbanner";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
    
	function editbanner()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['before']=$this->imagegallery_model->beforeeditbanner($this->input->get('id'));
		$data['page']='editbanner';
		$data['title']='Edit Banner';
		$this->load->view('template',$data);
	}
    
    function editbannersubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('title','title','trim|required');
		$this->form_validation->set_rules('link','link','trim');
		$this->form_validation->set_rules('order','order','trim');
        
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['before']=$this->imagegallery_model->beforeeditbanner($this->input->get('id'));
            $data['page']='editbanner';
            $data['title']='Edit Banner';
            $this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->post('id');
			$title=$this->input->post('title');
			$link=$this->input->post('link');
			$order=$this->input->post('order');
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			$filename="image";
			$image="";
			if (  $this->upload->do_upload($filename))
			{
				$uploaddata = $this->upload->data();
				$image=$uploaddata['file_name'];
			}
            
            if($image=="")
            {
            $image=$this->imagegallery_model->getbannerimagebyid($id);
               // print_r($image);
                $image=$image->image;
            }
			if($this->imagegallery_model->editbanner($id,$image,$title,$link,$order)==0)
			$data['alerterror']="Banner Editing was unsuccesful";
			else
			$data['alertsuccess']="Banner edited Successfully.";
			
			$data['redirect']="site/viewbanner";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
			
		}
	}
	
	function deletebanner()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->imagegallery_model->deletebanner($this->input->get('id'));
		$data['table']=$this->imagegallery_model->viewbanner();
		$data['alertsuccess']="Banner Deleted Successfully";
		$data['page']='viewbanner';
		$data['title']='View Banner';
		$this->load->view('template',$data);
	}
	function deleteallbanner()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->imagegallery_model->deleteallbanner();
		$data['table']=$this->imagegallery_model->viewbanner();
		$data['alertsuccess']="ALL New In Deleted Successfully";
		$data['page']='viewbanner';
		$data['title']='View Banner';
		$this->load->view('template',$data);
	}

     //floor
    
     function viewfloor()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['table']=$this->floor_model->viewfloor();
		$data['page']='viewfloor';
		$data['title']='View New In';
		$this->load->view('template',$data);
	} 
    
	public function createfloor()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data[ 'page' ] = 'createfloor';
		$data[ 'title' ] = 'Create New In';
		$this->load->view( 'template', $data );	
	}
    
    function createfloorsubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('floor','floor','trim|required');
        
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data[ 'page' ] = 'createfloor';
            $data[ 'title' ] = 'Create New In';
            $this->load->view( 'template', $data );	
		}
		else
		{
			$floor=$this->input->post('floor');
			
			if($this->floor_model->createfloor($floor)==0)
			$data['alerterror']="floor could not be created.";
			else
			$data['alertsuccess']="floor created Successfully.";
			
			$data['table']=$this->floor_model->viewfloor();
			$data['redirect']="site/viewfloor";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
		}
	}
    
	function editfloor()
	{
		$access = array("1");
		$this->checkaccess($access);
		$data['before']=$this->floor_model->beforeeditfloor($this->input->get('id'));
		$data['page']='editfloor';
		$data['title']='Edit floor';
		$this->load->view('template',$data);
	}
    
    function editfloorsubmit()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->form_validation->set_rules('floor','floor','trim|required');
        
		if($this->form_validation->run() == FALSE)	
		{
			$data['alerterror'] = validation_errors();
			$data['before']=$this->floor_model->beforeeditfloor($this->input->get('id'));
            $data['page']='editfloor';
            $data['title']='Edit floor';
            $this->load->view('template',$data);
		}
		else
		{
			$id=$this->input->post('id');
			$floor=$this->input->post('floor');
			
			if($this->floor_model->editfloor($id,$floor)==0)
			$data['alerterror']="floor Editing was unsuccesful";
			else
			$data['alertsuccess']="floor edited Successfully.";
			
			$data['redirect']="site/viewfloor";
			//$data['other']="template=$template";
			$this->load->view("redirect",$data);
			
		}
	}
	
	function deletefloor()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->floor_model->deletefloor($this->input->get('id'));
		$data['table']=$this->floor_model->viewfloor();
		$data['alertsuccess']="floor Deleted Successfully";
		$data['page']='viewfloor';
		$data['title']='View floor';
		$this->load->view('template',$data);
	}
	function deleteallfloor()
	{
		$access = array("1");
		$this->checkaccess($access);
		$this->floor_model->deleteallfloor();
		$data['table']=$this->floor_model->viewfloor();
		$data['alertsuccess']="ALL New In Deleted Successfully";
		$data['page']='viewfloor';
		$data['title']='View floor';
		$this->load->view('template',$data);
	}

    
    	public function exportstoresinmalltocsv()
	{
		$this->store_model->exportstoresinmalltocsv();
            
//        $data['retailer']=$this->retailer_model->getretailersinceyesterday($currentdate);
//        $data['topproducts']=$this->retailer_model->gettopproducts();
//        $data['noofretailers']=sizeof($data['retailer']);
//		$data[ 'page' ] = 'dashboard';
//		$data[ 'title' ] = 'Welcome';
//		$this->load->view( 'template', $data );
            
	}
    	public function exportindividualstorestocsv()
	{
		$this->store_model->exportindividualstorestocsv();
            
//        $data['retailer']=$this->retailer_model->getretailersinceyesterday($currentdate);
//        $data['topproducts']=$this->retailer_model->gettopproducts();
//        $data['noofretailers']=sizeof($data['retailer']);
//		$data[ 'page' ] = 'dashboard';
//		$data[ 'title' ] = 'Welcome';
//		$this->load->view( 'template', $data );
            
	}
    	public function exportmallstocsv()
	{
		$this->mall_model->exportmallstocsv();
            
	}
    	public function exportbrandstocsv()
	{
		$this->brand_model->exportbrandstocsv();
            
	}

}
?>