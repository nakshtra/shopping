	    <section class="panel">
		    <header class="panel-heading">
				 New In Details
			</header>
			<div class="panel-body">
			  <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/editnewinforstoresubmit');?>" enctype= "multipart/form-data">
				<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
				<div class="form-group">
                        <label class="col-sm-2 control-label">Brand</label>
                        <div class="col-sm-4">
                            <?php 
//echo form_dropdown( 'brand',$brand,set_value( 'brand'), 'id="select2" onChange="changestore()" class="form-control populate placeholder select2-offscreen"');
                                echo $brand[0]->name;

                            ?>
                            <input type="hidden" name="brand" value="<?php echo $brand[0]->id;?>" class="brandidtextbox"> 
                        </div>
                    </div>


                    <div id="store" class="form-group">
                        <label class="col-sm-2 control-label">Store Name</label>
                        <div class="col-sm-4">
                            
                           <?php
                                echo $store[0]->name;
                            ?>

                        </div>
                    </div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Image</label>
				  <div class="col-sm-4">
					<input type="file" id="normal-field" class="form-control" name="image" value="<?php echo set_value('image',$before->image);?>">
					<?php if($before->image == "")
						 { }
						 else
						 { ?>
							<img src="<?php echo base_url('uploads')."/".$before->image; ?>" width="140px" height="140px">
						<?php }
					?>
				  </div>
				</div>
				
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Description</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="description" value="<?php echo set_value('description',$before->description);?>">
					<input type="hidden"  class="form-control" name="brand" value="<?php echo set_value('brand',$before->brandid);?>">
				  </div>
				</div>
				
<!--
					<div class="form-group">
						<label class="col-sm-2 control-label">Brand</label>
						<div class="col-sm-4">
						   <?php 
//								echo form_dropdown('brand',$brand,set_value('brand',$before->brandid),'id="select2" onChange="changestore()" class="form-control populate placeholder select2-offscreen" , disabled="disabled"');
								 echo $brand[0]->name;
							?>
						</div>
					</div>
					
					<div id="store" class="form-group">
                <label class="col-sm-2 control-label">Store Name</label>
                <div class="col-sm-4">
                            <?php echo "<table border=1><tr>
                                        <th>Select</th>
                                        <th>ADDRESS</th>
                                    </tr>"; 
                                    foreach($store as $key=>$store){ if(in_array($key,$selectedstore)) { 
                                    echo "
                            <tr>
                                <td>
                                    <input type='checkbox' name='storeid[]' id='select51' class='check' checked value='$key'></td><td>$store</td>
                            </tr>"; } else { echo "
                            <tr>
                                <td>
                                    <input type='checkbox' name='storeid[]' id='select51' class='check' value='$key'></td><td>$store</td>
                            </tr>"; } } echo "</table>"; //echo form_dropdown('storeid[]', $store, $selectedstore,'id="select2" class="form-control populate placeholder "'); //echo form_dropdown('storeid',$store,'',); ?>
                        </div>
                    <div class='col-md-4'>
                        <input type='checkbox' id='checkbox'>Select All
                    </div>
                    </div>
-->
					
				<div class=" form-group">
				  <label class="col-sm-2 control-label">&nbsp;</label>
				  <div class="col-sm-4">
				  <button type="submit" class="btn btn-primary">Save</button>
				  <a href="<?php echo site_url('site/viewnewinforstore'); ?>" class="btn btn-secondary">Cancel</a>
				</div>
				</div>
			  </form>
			  <script>
    $(document).ready(function () {

        $("#checkbox").click(function () {
            // alert("checkbox");
            if ($("#checkbox").is(':checked')) {
                //alert("checkbox");
                $(".check").prop('checked', true);
            } else {
                $(".check").prop('checked', false);

            }
        });

        $("#button").click(function () {
            alert($(".check").val());
        });

    })
</script>
			</div>
		</section>
