	    <section class="panel">
		    <header class="panel-heading">
				 User Details
			</header>
			<div class="panel-body">
			  <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/editusersubmit');?>">
				<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Email</label>
				  <div class="col-sm-4">
					<?php echo $before->email; ?>
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">First Name</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="fname" value="<?php echo set_value('fname',$before->firstname);?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Last Name</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="lname" value="<?php echo set_value('lname',$before->lastname);?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="description-field">Password</label>
				  <div class="col-sm-4">
					<input type="password" id="description-field" class="form-control" name="password" value="">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="description-field">Confirm Password</label>
				  <div class="col-sm-4">
					<input type="password" id="description-field" class="form-control" name="confirmpassword" value="">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Website</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="website" value="<?php echo set_value('website',$before->website);?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Address</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="address" value="<?php echo set_value('address',$before->address);?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">City</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="city" value="<?php echo set_value('city',$before->city);?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Pincode</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="pincode" value="<?php echo set_value('pincode',$before->pincode);?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Contact</label>
				  <div class="col-sm-4">
					<input type="number" id="normal-field" class="form-control" name="contact" value="<?php echo set_value('contact',$before->contact);?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">DOB</label>
				  <div class="col-sm-4">
<!--					<input type="text" id="dp1" class="form-control" name="dob" value="<?php echo set_value('dob',$before->dob);?>">-->
					<input type="date" class="form-control fromdate" name="dob" value="<?php echo set_value('dob',$before->dob);?>">
				  </div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label"> Facebook Userid</label>
					<div class="col-sm-4">
					  <input type="text" id="" name="facebookuserid" class="form-control" value="<?php echo set_value('facebookuserid',$before->facebookuserid); ?>">
					</div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label">Select Accesslevel</label>
				  <div class="col-sm-4">
					<?php  	 echo form_dropdown('accesslevel',$accesslevel,set_value('accesslevel',$before->accesslevel),'id="select100"  onchange="changebrands()" class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
					?>
				  </div>
				</div>
				
				<div class=" form-group " id="onbrandselect" style="display: none">
				  <label class="col-sm-2 control-label">Brand</label>
				  <div class="col-sm-4">
					<?php 	 echo form_dropdown('brand',$brand,set_value('brand'),' id="select4" onchange="changestore()" class="chzn-select form-control" 	data-placeholder="Choose a brand..."');
					?>
				  </div>
				</div>
				<div class="form-group" id="onstoreselect" style="display: none">
						<label class="col-sm-2 control-label">Store</label>
						<div class="col-sm-4 storesforuser">
                       <select name="store">
						   
						   </select>
						</div>
				</div>
				
				<div class="form-group">
				  <label class="col-sm-2 control-label">Status</label>
				  <div class="col-sm-4">
					<?php
						
						echo form_dropdown('status',$status,set_value('status',$before->status),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
					?>
				  </div>
				</div>
                  
				<div class=" form-group">
				  <label class="col-sm-2 control-label">&nbsp;</label>
				  <div class="col-sm-4">
				  <button type="submit" class="btn btn-primary">Save</button>
				  <a href="<?php echo site_url('site/viewusers'); ?>" class="btn btn-secondary">Cancel</a>
				</div>
				</div>
			  </form>
			</div>
		</section>
<script type="text/javascript">
     var nodata=9;
    function changebrands() {
        console.log($('#select100').val());
        if($('#select100').val()==2)
        {
            $( "#onbrandselect" ).show();
        }
        else if( $('#select100').val()==3)
        {
            $( "#onbrandselect" ).show();
            $( "#onstoreselect" ).show();
//            $( "#onbrandselect" ).hide();
        }
        else
        {
            $( "#onbrandselect" ).hide();
            $( "#onstoreselect" ).hide();
        }
       
    }
    function changestore() {
        console.log($('#select4').val());
//        console.log('hiiiii');
//        alert("hiii");

        $.getJSON(
            "<?php echo base_url(); ?>index.php/site/getstoreforusers/" + $('#select4').val(), {
                id: "123"
            },
            function (data) {
//                  alert(data);
                console.log(data);
                nodata=data;
                // $("#store").html(data);
                changemalldropdown(data);

            }

        );
//        $(".select").html("");
//        $(".select2992").append("<option value='6>India</option>");

    }
                  var mallbycity=$(".storesforuser select").select2({allowClear: true,width:343});
                  
    function changemalldropdown(data) {
        $(".storesforuser select").html("");
        for(var i=0;i<data.length;i++)
        {
//            console.log(data[i].id);
            $(".storesforuser select").append("<option value='"+data[i].id+"'>"+data[i].name+" "+data[i].storeaddress+" "+data[i].malladdress+"</option>");
            
        }
        

    };
                  
//    function changemalldropdown(data) {
//        $(".storesforuser select").html("");
//        for(var i=0;i<data.length;i++)
//        {
////            console.log(data[i].id);
//            $(".storesforuser select").append("<option value='"+data[i].id+"'>"+data[i].name+"</option>");
//            
//        }
//        
//
//    };
//                   
                  
                $(document).ready(function() {
                   
                                            $('#select10').select2(
                                            {

                                                allowClear: true,
                                                //minimumInputLength: 3,

                                             }
                                            );
                });
    
    /*deleted
    
//        console.log('hiiiii');
//        alert("hiii");

        $.getJSON(
            "<?php echo base_url(); ?>index.php/site/changebrands/" + $('#select10').val(), {
                id: "123"
            },
            function (data) {
//                  alert(data);
                console.log(data);
                nodata=data;
                // $("#store").html(data);
                changemalldropdown(data);

            }

        );
//        $(".select").html("");
//        $(".select2992").append("<option value='6>India</option>");

    */
</script>