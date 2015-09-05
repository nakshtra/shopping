 <section class="panel">
		    <header class="panel-heading">
				 Category of brands Details
			</header>
			<?php 
//print_r($before);
     ?>
			<?php
//echo "<br>";
//echo "<br>";
//echo $before['brand']->id;
//echo "<br>";
//echo "<br>";
//print_r($category);
//echo "<br>";
//echo "<br>";
//print_r($brandcategory);
            ?>
			<div class="panel-body">
			  <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/editstorecategoryforstoresubmit');?>" enctype= "multipart/form-data">
				<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$this->session->userdata('store'));?>" style="display:none;">
				
				
				
				
				
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Category</label>
				  <div class="col-sm-10">
			
				  
					<?php
$i=1;
$brandflag="false";
$selectedcat="";
                    foreach($category as $data)
                    {
                       $i++;
                         $flag="false";
                        $brandflag="false";
                        if($data->parent==0){
                               
                            echo "<div class='form-group'><div class='col-sm-6'>";
                        foreach($brandcategory as $brand)
                            {
                            
                            if($brand->categoryname==$data->name)
                            {
                        echo " <div class='checkbox'><label><input id='m".$i."' type='checkbox' name='".$data->name."' value='".$data->id."' checked> ".$data->name."</label></div>";
                           $brandflag="true";
                            if($brand->parent==$data->id)
                                $selectedcat+="'".$brand->categoryname."',";
                            }
                                
                            }
                            
                            if($brandflag=="false")
                            {
                                 echo " <div class='checkbox'><label><input id='m".$i."' type='checkbox' name='".$data->name."' value='".$data->id."'> ".$data->name."</label></div>";  
                                
                            }
                            
                        echo "<h4>SubCategory</h4>";
                            $msg=" <select style='width:300px' multiple id='e".$i."' name='select".$i."[]' >";
                            $select="";
                            
                            foreach($category as $datanew)
                            {
                                  $select="";
                                if($datanew->parent==$data->id){
                                    foreach($brandcategory as $selectedcat)
                                    {
                                     if($selectedcat->categoryid==$datanew->id)
                                         $select="selected";
                                    }
                                    
                                    $flag="true";
                                  
                                    $msg=$msg. " <option value='".$datanew->id."'  ".$select.">".$datanew->name."</option>";
                                     
                                }
                                
                            }
                            $selectcat="";
                              foreach($brandcategory as $datanew)
                            {
                                 
                                if($datanew->parent==$data->id){
                                   if($selectcat=="")
                                    $selectcat="'".$datanew->categoryname."'";
                                    else   
                                    $selectcat=$selectcat.",'". $datanew->categoryname."'";
                                     
                                }
                                
                            }
                            
                            $msg=$msg. "</select>";
                            if($flag=="false")
                                 $msg="no Sub category";
                        
                            echo $msg;
                            echo "</div></div>";
                            echo"<script>
                                 
            
                             </script>"; 
                            
                            
                            $msg= "<script>
        $(document).ready(function() { 
           //alert('hi');
            if($('#m".$i."').is(':checked')){
            $('#e".$i."').select2();
            $('#e".$i."').select2('destroy');
            
          //  $('#e".$i."').select2('val', );
            $('#e".$i."').prop('disabled', false);   
            $('#e".$i."').select2();
           // alert($('#m".$i."').is(':checked'));
            }
            else
            {
             $('#e".$i."').select2();
            $('#e".$i."').select2('destroy');
            $('#e".$i."').prop('disabled', true);   
            $('#e".$i."').select2();
            //alert($('#m".$i."').is(':checked'));
            
            
            }
            
             $( '#m".$i."' ).click(function() {
                                        if($('#m".$i."').is(':checked'))
                                        {
                                        $('#e".$i."').select2('destroy');
                                            $('#e".$i."').prop('disabled', false);   
                                            $('#e".$i."').select2();
                                        }
                                        else
                                        {   $('#e".$i."').select2('destroy');
                                            $('#e".$i."').prop('disabled', true);   
                                            $('#e".$i."').select2();
                                        
                                        }
                                  });
            
         
})
      
 
            
    </script>";
                           echo $msg;
                          // echo "selected category".$selectcat;
                            
                           
                        }
                        
                    }
                    ?>
				 
				
				</div>
				</div>
				
		
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label">&nbsp;</label>
				  <div class="col-sm-4">
				  <button type="submit" class="btn btn-primary">Save</button>
				  <a href="<?php echo site_url('site/viewbrand'); ?>" class="btn btn-secondary">Cancel</a>
				</div>
				</div>
			  </form>
			</div>
		</section>