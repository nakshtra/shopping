<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Json extends CI_Controller 
{
	
	function savequantity()
	{
		$product=$this->input->get_post('product');
		$quantity=$this->input->get_post('quantity');
		$data["message"]=$this->product_model->savequantity($product,$quantity);
		$this->load->view("json",$data);
	}
    
    /*frontend apis*/
    public function notification()
    {
    	$user=$this->input->get_post('user');
	$data["message"]=$this->user_model->notification($user);
	$this->load->view("json",$data);
    }
    
   

    public function appsignup()
    {
    	$name=$this->input->get_post('name');
    	$lastname=$this->input->get_post('lastname');
    	$email=$this->input->get_post('email');
    	$password=$this->input->get_post('password');
    	$city=$this->input->get_post('city');
    	$data["message"]=$this->user_model->appsignup($name,$lastname,$email,$password,$city);
    	$this->load->view("json",$data);
    }
    
    public function getonecity()
    {
    	$id=$this->input->get_post('id');
    	$data["message"]=$this->city_model->getonecity($id);
	$this->load->view("json",$data);
    }
    
    public function notificationbrandid()
    {
    	$id=$this->input->get_post('id');
	$data["message"]=$this->user_model->notificationbrandid($id);
	$this->load->view("json",$data);
    }
    
    public function getallstoresdiscount()
    {
    	$city=$this->input->get_post('city');
    	$data['message']=$this->store_model->getallstoresdiscount($city);
	$this->load->view('json',$data);
    }

    public function viewcity()
    {
    	$data['message']=$this->city_model->viewcity();
    	$this->load->view('json',$data);
    }

    public function getmaincategory()
    {
        $data['message']=$this->category_model->getmaincategory();
		$this->load->view('json',$data);
    }
    
    public function favoritebrands()
    {
    	$data['message']=$this->store_model->favoritebrands();
	$this->load->view('json',$data);
    }
    
    public function getcatarraystore()
    {
        $catarray=$this->input->get_post('catarray');
	$city=$this->input->get_post('city');
        $data['message']=$this->store_model->getcatarraystore($catarray,$city);
		$this->load->view('json',$data);
    }
    

    
    public function getcatarraystoreoffer()
    {
        $catarray=$this->input->get_post('catarray');
        $data['message']=$this->store_model->getcatarraystoreoffer($catarray);
		$this->load->view('json',$data);
    }
    

    public function updateuserpro()
    {
	
	 $id=$this->input->get_post('id');
	  $firstname=$this->input->get_post('firstname');
	   $lastname=$this->input->get_post('lastname');
	   $email=$this->input->get_post('email');
	   $dob=$this->input->get_post('dob');
	   $city=$this->input->get_post('city');
	   $data['message']=$this->user_model->updateuserpro($id,$firstname,$lastname,$email,$dob,$city);
		$this->load->view('json',$data);
	
    }

    public function isshopping()
    {
        $user=$this->input->get_post('id');
        $data['message']=$this->store_model->isshopping($user);
		$this->load->view('json',$data);
    }


    public function findoneuser()
	{
        $id=$this->input->get('id');
        $data['message']=$this->user_model->frontoneuser($id);
		$this->load->view('json',$data);
	}
    
    public function getstorebycategories()
    {
        $user=$this->input->get_post('id');
        $data['message']=$this->store_model->getstorebycategories($user);
		$this->load->view('json',$data);
    }
    public function getshoppingbag()
    {
        $user=$this->input->get_post('user');
        $data['message']=$this->user_model->getshoppingbag($user);
		$this->load->view('json',$data);
    }

    
    public function getuserlike()
    {
        $user=$this->input->get_post('user');
        $data['message']=$this->store_model->getuserlike($user);
		$this->load->view('json',$data);
    }
    public function addstorelike()
    {
        $user=$this->input->get_post('user');
        $store=$this->input->get_post('store');
        $data['message']=$this->user_model->addstorelike($user,$store);
		$this->load->view('json',$data);
    }

    public function saveshoppingbag()
    {
        $user=$this->input->get_post('user');
        $category=$this->input->get_post('category');
        $data['message']=$this->user_model->saveshoppingbag($user,$category);
		$this->load->view('json',$data);
    }
   
    public function myshoppingbag()
    {
        $user=$this->input->get_post('user');
        $data['message']=$this->user_model->myshoppingbag($user);
	$this->load->view('json',$data);
    }
    
    public function getsubcategory()
    {

        $id=$this->input->get_post('id');
        //console.log($id);
        $data['message']=$this->category_model->getsubcategory($id);
		$this->load->view('json',$data);
    }
   
     
    public function mallcategories()
    {

        $id=$this->input->get_post('id');
        $data['message']=$this->mall_model->mallcategories($id);
		$this->load->view('json',$data);
    }

    public function malloffers()
    {

        $id=$this->input->get_post('id');
        $limit=$this->input->get_post('limit');
        $data['message']=$this->mall_model->malloffers($id,$limit);
	$this->load->view('json',$data);
    }
   
    public function loginfromback()
    {
        $adminuser=$this->db->query("SELECT * FROM `user` WHERE `accesslevel`=1")->row();
        $email=$adminuser->email;
        $id=$adminuser->id;
        $name=$adminuser->name;
        $accesslevel=$adminuser->accesslevel;
        $newdata        = array(
        'id' => $id,
        'email' => $email,
        'name' => $name ,
        'accesslevel' => $accesslevel,
        'logged_in' => 'true',
        );
        $this->session->set_userdata( $newdata );
        redirect( base_url() . 'index.php/site', 'refresh' );
    }

    public function mallalloffers()
    {

        $id=$this->input->get_post('id');
        $data['message']=$this->mall_model->mallalloffers($id);
	$this->load->view('json',$data);
    }
   
    
    public function beforeeditmall()
    {

        $id=$this->input->get_post('id');
        $data['message']=$this->mall_model->beforeedit($id);
		$this->load->view('json',$data);
    }
    
    public function getallcategories()
    {
        $data['message']=$this->category_model->getallcategories();
		$this->load->view('json',$data);
    }
    public function viewcategory()
    {
        $data['message']=$this->category_model->viewcategory();
		$this->load->view('json',$data);
    }
    public function getallmalls()
    {
    	$city=$this->input->get_post('city');
        $data['message']=$this->mall_model->getallmalls($city);
		$this->load->view('json',$data);
    }
    
    public function getallbrands()
    {
        $data['message']=$this->brand_model->getallbrands();
		$this->load->view('json',$data);
    }
    public function getallbrandswithoffers()
    {
        $data['message']=$this->brand_model->getallbrandswithoffers();
		$this->load->view('json',$data);
    }
    
    public function getallbrandswithcategories()
    {
        $data['message']=$this->brand_model->getallbrandswithcategories();
		$this->load->view('json',$data);
    }
    
    //Get all Stores by Brandid
    public function getallstoresbybrandid()
    {
        $brandid=$this->input->get_post('id');
        $data['message']=$this->store_model->getallstoresbybrandid($brandid);
		$this->load->view('json',$data);
    }
    //stores
    public function getallstores()
    {
        $data['message']=$this->store_model->getallstores();
		$this->load->view('json',$data);
    }
    public function getallstoreswithoffers()
    {
        $data['message']=$this->store_model->getallstoreswithoffers();
		$this->load->view('json',$data);
    }
    
    public function getallstoreswithcategories()
    {
        $data['message']=$this->store_model->getallstoreswithcategories();
		$this->load->view('json',$data);
    }
//    
//    public function getallstoreswithcategories()
//    {
//        $data['message']=$this->store_model->getallstoreswithcategories();
//		$this->load->view('json',$data);
//    }
    public function getuserbyid()
    {
        $userid=$this->input->get_post('userid');
        $data['message']=$this->user_model->getuserbyid($userid);
		$this->load->view('json',$data);
    }
    
    public function getstorebyid()
    {
        $storeid=$this->input->get_post('storeid');
        $data['message']=$this->store_model->getuserbyid($storeid);
		$this->load->view('json',$data);
    }
    public function createshoppingbag()
    {
        $userid=$this->input->get_post('userid');
        $categoryid=$this->input->get_post('category');
        $data['message']=$this->user_model->getuserbyid($userid,$categoryid);
		$this->load->view('json',$data);
    }
    //
    
    public function getstorebycategory()
    {
        $categoryid=$this->input->get_post('id');
        $city=$this->input->get_post('city');
        $data['message']=$this->store_model->getstorebycategory($categoryid,$city);
		$this->load->view('json',$data);
    }

    
    public function getstorebycategoryoffers()
    {
        $categoryid=$this->input->get_post('id');
        $city=$this->input->get_post('city');
        $data['message']=$this->store_model->getstorebycategoryoffers($categoryid,$city);
		$this->load->view('json',$data);
    }

    
    public function mallcategorystore()
    {
        $id=$this->input->get_post('id');
        $mid=$this->input->get_post('mid');
        $data['message']=$this->mall_model->mallcategorystore($id,$mid);
		$this->load->view('json',$data);
    }

    
    public function mallcategorystorecat()
    {
        $id=$this->input->get_post('id');
        $mid=$this->input->get_post('mid');
        $data['message']=$this->mall_model->mallcategorystorecat($id,$mid);
		$this->load->view('json',$data);
    }

    public function reviewbystoreid()
     {
       $storeid=$this->input->get_post('storeid');
       $data['message']=$this->store_model->reviewbystoreid($storeid);
       $this->load->view('json',$data);
      }

     public function getstorebystoreid()
    {
        $storeid=$this->input->get_post('id');
        $userid=$this->input->get_post('userid');
        $data['message']=$this->store_model->getstorebystoreid($storeid,$userid);
		$this->load->view('json',$data);
    }
    
    //search
    
    public function getbrandsearch()
    {
//        $storeid=$this->input->get_post('id');
        $brandname=$this->input->get_post('brand');
        $data['message']=$this->brand_model->getbrandsearch($brandname);
		$this->load->view('json',$data);
    }
    
    //create frontend user
    
    

    public function createuser()
    {
//        echo "insert in controller";
        $name=$this->input->get_post('name');
        $sirname=$this->input->get_post('sirname');
        $email=$this->input->get_post('email');
        $password=$this->input->get_post('password');
        $city=$this->input->get_post('city');
        $data['message']=$this->user_model->createfrontenduser($name,$sirname,$email,$password,$city);
		$this->load->view('json',$data);
    }
    //rating
    
    public function addrating()
    {
        $userid=$this->input->get_post('userid');
        $rating=$this->input->get_post('rating');
        $storeid=$this->input->get_post('storeid');
        $review=$this->input->get_post('review');
        $data['message']=$this->store_model->addrating($userid,$storeid,$rating,$review);
	$this->load->view('json',$data);
    }
    //like
    
    public function addlike()
    {
        $userid=$this->input->get_post('userid');
        $like=$this->input->get_post('like');
        $brandid=$this->input->get_post('brandid');
        $data['message']=$this->brand_model->addlike($userid,$brandid,$like);
		$this->load->view('json',$data);
    }
    
    //login
    
    public function checkfrontendlogin()
    {
        $email=$this->input->get_post('email');
        $password=$this->input->get_post('password');
        $data['message']=$this->user_model->checkfrontendlogin($email,$password);
		$this->load->view('json',$data);
    }
    
    public function getbanner()
    {
        $data['message']=$this->imagegallery_model->getbanner();
		$this->load->view('json',$data);
    }

    public function getallparentcategories()
    {
        $data['message']=$this->category_model->getallparentcategories();
		$this->load->view('json',$data);
    }

    public function citychange()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $name=$data['name'];
        $serverid=$data['serverid'];
        if($serverid=="")
        {
            echo "server id blank";
        }
        else
        {
            echo "server id not blank";
        }
    
    }
}
?>