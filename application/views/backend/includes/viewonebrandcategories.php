<?php print_r($category);
?>
	<script>
        $(document).ready(function() { 
            alert("hi");
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

