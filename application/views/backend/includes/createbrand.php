<?php print_r($category);
?>
	<script>
        $(document).ready(function() { 
            //alert("hi");
            $("#e9").select2();})
    </script>
				
<div class="row" style="padding:1% 0">
	<div class="col-md-12">
		<div class="pull-right">
			<a href="<?php echo site_url('site/viewbrand'); ?>" class="btn btn-primary pull-right"><i class="icon-long-arrow-left"></i>&nbsp;Back</a>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 Brand Details
			</header>
			<div class="panel-body">
			  <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/createbrandsubmit');?>" enctype= "multipart/form-data">
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Name</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="name" value="<?php echo set_value('name');?>">
<!--					<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo $this->input->get('brandid');?>">-->
				  </div>
				</div>
				
				
				
				
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Category</label>
				  <div class="col-sm-10">
			
				  
					<?php
$i=1;
                    foreach($category as $data)
                    {
                       $i++;
                         $flag="false";
                        if($data->parent==0){
                               
                            echo "<div class='form-group'><div class='col-sm-6'>";
                        echo " <div class='checkbox'><label><input id='m".$i."' type='checkbox' name='".$data->name."' value='".$data->id."'> ".$data->name."</label></div>";
                        echo "<h4>SubCategory</h4>";
                            echo"<script>
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
            
                             </script>"; 
                            $msg= "<script>
        $(document).ready(function() { 
           //alert('hi');
            $('#e".$i."').select2();
            $('#e".$i."').select2('destroy');
            $('#e".$i."').prop('disabled', true);   
            $('#e".$i."').select2();
            
         
})
      
 
            
    </script>";
                           $msg=$msg." <select style='width:300px' multiple id='e".$i."' name='select".$i."[]' >";
                            foreach($category as $datanew)
                            {
                                 
                                if($datanew->parent==$data->id){
                                    $flag="true";
                                   
                                    $msg=$msg. " <option value='".$datanew->id."'>".$datanew->name."</option>";
                                     
                                }
                                
                            }
                            $msg=$msg. "</select>";
                            if($flag=="false")
                                 $msg="no Sub category";
                        
                            echo $msg;
                            echo "</div></div>";
                           
                        }
                        
                    }
                    ?>
				 
				
				</div>
				</div>
				
				
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Website</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="website" value="<?php echo set_value('website');?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Facebook Page</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="facebook" value="<?php echo set_value('facebook');?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">TwitterPage</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="twitter" value="<?php echo set_value('twitter');?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Pin Interest</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="pininterest" value="<?php echo set_value('pininterest');?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Gogle +</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="googleplus" value="<?php echo set_value('googleplus');?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Instagram</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="instagram" value="<?php echo set_value('instagram');?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Blog</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="blog" value="<?php echo set_value('blog');?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Description</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="description" value="<?php echo set_value('description');?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Brand Logo</label>
				  <div class="col-sm-4">
					<input type="file" id="normal-field" class="form-control" name="logo" value="<?php echo set_value('logo');?>">
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
	</div>
</div>


		
			