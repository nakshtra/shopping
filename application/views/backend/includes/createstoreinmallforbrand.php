<div class="row" style="padding:1% 0">
	<div class="col-md-12">
		<div class="pull-right">
			<a href="<?php echo site_url('site/viewstoreinmall'); ?>" class="btn btn-primary pull-right"><i class="icon-long-arrow-left"></i>&nbsp;Back</a>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 Stores in Malls Details
			</header>
			<div class="panel-body">
			  <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/createstoreinmallforbrandsubmit');?>" enctype= "multipart/form-data">
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Name Of Store</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="name" value="<?php echo set_value('name');?>">
					<input type="hidden" id="normal-field" class="form-control" name="format" value="1">
				  </div>
				</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">City</label>
						<div class="col-sm-4">
						   <?php 
								echo form_dropdown('city',$city,set_value('city'),'id="select1" onchange="changemall()" class="cityclass form-control populate placeholder"');
								 
							?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Brand</label>
						<div class="col-sm-4">
						   <?php 
//								echo form_dropdown('brand',$brand,set_value('brand'),'id="select2" class="form-control populate placeholder select2-offscreen"');
								 echo $brand[0]->name;
							?>
						</div>
					</div>
					
				
				
					<div class="form-group">
						<label class="col-sm-2 control-label">Mall</label>
						<div class="col-sm-4 mallsbycity">
                       <select name="mall">
						   <?php 
//								echo form_dropdown('mall',$mall,set_value('mall'),'id="select10" class="form-control populate placeholder select2-offscreen"');
								 
							?>
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Floor</label>
						<div class="col-sm-4">
						   <?php 
								echo form_dropdown('floor',$floor,set_value('floor'),'id="select4" class="form-control populate placeholder select2-offscreen"');
								 
							?>
						</div>
					</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Contact Number</label>
				  <div class="col-sm-4">
					<input type="number" id="normal-field" class="form-control" name="contactno" value="<?php echo set_value('contactno');?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Description</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="description" value="<?php echo set_value('description');?>">
				  </div>
				</div>
				
				
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Email</label>
				  <div class="col-sm-4">
					<input type="email" id="normal-field" class="form-control" name="email" value="<?php echo set_value('email');?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Working Hours From</label>
				  <div class="col-sm-4">
<!--					<input type="test" id="normal-field" class="form-control" name="workinghours" value="<?php echo set_value('workinghours');?>">-->
                        <select name="workinghoursfrom">
                            <option value="12:00 AM">12:00 AM</option>
                            <option value="12:30 AM">12:30 AM</option>
                            <option value="01:00 AM">01:00 AM</option>
                            <option value="01:30 AM">01:30 AM</option>
                            <option value="02:00 AM">02:00 AM</option>
                            <option value="02:30 AM">02:30 AM</option>
                            <option value="03:00 AM">03:00 AM</option>
                            <option value="03:30 AM">03:30 AM</option>
                            <option value="04:00 AM">04:00 AM</option>
                            <option value="04:30 AM">04:30 AM</option>
                            <option value="05:00 AM">05:00 AM</option>
                            <option value="05:30 AM">05:30 AM</option>
                            <option value="06:00 AM">06:00 AM</option>
                            <option value="06:30 AM">06:30 AM</option>
                            <option value="07:00 AM">07:00 AM</option>
                            <option value="07:30 AM">07:30 AM</option>
                            <option value="08:00 AM">08:00 AM</option>
                            <option value="08:30 AM">08:30 AM</option>
                            <option value="09:00 AM">09:00 AM</option>
                            <option value="09:30 AM">09:30 AM</option>
                            <option value="10:00 AM">10:00 AM</option>
                            <option value="10:30 AM">10:30 AM</option>
                            <option value="11:00 AM">11:00 AM</option>
                            <option value="11:30 AM">11:30 AM</option>
                            
                            <option value="12:00 PM">12:00 PM</option>
                            <option value="12:30 PM">12:30 PM</option>
                            <option value="01:00 PM">01:00 PM</option>
                            <option value="01:30 PM">01:30 PM</option>
                            <option value="02:00 PM">02:00 PM</option>
                            <option value="02:30 PM">02:30 PM</option>
                            <option value="03:00 PM">03:00 PM</option>
                            <option value="03:30 PM">03:30 PM</option>
                            <option value="04:00 PM">04:00 PM</option>
                            <option value="04:30 PM">04:30 PM</option>
                            <option value="05:00 PM">05:00 PM</option>
                            <option value="05:30 PM">05:30 PM</option>
                            <option value="06:00 PM">06:00 PM</option>
                            <option value="06:30 PM">06:30 PM</option>
                            <option value="07:00 PM">07:00 PM</option>
                            <option value="07:30 PM">07:30 PM</option>
                            <option value="08:00 PM">08:00 PM</option>
                            <option value="08:30 PM">08:30 PM</option>
                            <option value="09:00 PM">09:00 PM</option>
                            <option value="09:30 PM">09:30 PM</option>
                            <option value="10:00 PM">10:00 PM</option>
                            <option value="10:30 PM">10:30 PM</option>
                            <option value="11:00 PM">11:00 PM</option>
                            <option value="11:30 PM">11:30 PM</option>
                        </select>  
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Working Hours To</label>
				  <div class="col-sm-4">
<!--					<input type="test" id="normal-field" class="form-control" name="workinghours" value="<?php echo set_value('workinghours');?>">-->
                        <select name="workinghoursto">
                            <option value="12:00 AM">12:00 AM</option>
                            <option value="12:30 AM">12:30 AM</option>
                            <option value="01:00 AM">01:00 AM</option>
                            <option value="01:30 AM">01:30 AM</option>
                            <option value="02:00 AM">02:00 AM</option>
                            <option value="02:30 AM">02:30 AM</option>
                            <option value="03:00 AM">03:00 AM</option>
                            <option value="03:30 AM">03:30 AM</option>
                            <option value="04:00 AM">04:00 AM</option>
                            <option value="04:30 AM">04:30 AM</option>
                            <option value="05:00 AM">05:00 AM</option>
                            <option value="05:30 AM">05:30 AM</option>
                            <option value="06:00 AM">06:00 AM</option>
                            <option value="06:30 AM">06:30 AM</option>
                            <option value="07:00 AM">07:00 AM</option>
                            <option value="07:30 AM">07:30 AM</option>
                            <option value="08:00 AM">08:00 AM</option>
                            <option value="08:30 AM">08:30 AM</option>
                            <option value="09:00 AM">09:00 AM</option>
                            <option value="09:30 AM">09:30 AM</option>
                            <option value="10:00 AM">10:00 AM</option>
                            <option value="10:30 AM">10:30 AM</option>
                            <option value="11:00 AM">11:00 AM</option>
                            <option value="11:30 AM">11:30 AM</option>
                            
                            <option value="12:00 PM">12:00 PM</option>
                            <option value="12:30 PM">12:30 PM</option>
                            <option value="01:00 PM">01:00 PM</option>
                            <option value="01:30 PM">01:30 PM</option>
                            <option value="02:00 PM">02:00 PM</option>
                            <option value="02:30 PM">02:30 PM</option>
                            <option value="03:00 PM">03:00 PM</option>
                            <option value="03:30 PM">03:30 PM</option>
                            <option value="04:00 PM">04:00 PM</option>
                            <option value="04:30 PM">04:30 PM</option>
                            <option value="05:00 PM">05:00 PM</option>
                            <option value="05:30 PM">05:30 PM</option>
                            <option value="06:00 PM">06:00 PM</option>
                            <option value="06:30 PM">06:30 PM</option>
                            <option value="07:00 PM">07:00 PM</option>
                            <option value="07:30 PM">07:30 PM</option>
                            <option value="08:00 PM">08:00 PM</option>
                            <option value="08:30 PM">08:30 PM</option>
                            <option value="09:00 PM">09:00 PM</option>
                            <option value="09:30 PM">09:30 PM</option>
                            <option value="10:00 PM">10:00 PM</option>
                            <option value="10:30 PM">10:30 PM</option>
                            <option value="11:00 PM">11:00 PM</option>
                            <option value="11:30 PM">11:30 PM</option>
                        </select>  
				  </div>
				</div>
				
					<div class="form-group">
						<label class="col-sm-2 control-label">Shop Closed On</label>
						<div class="col-sm-4">
						   <?php 
								echo form_dropdown('shopclosedon',$shopclosedon,set_value('shopclosedon'),'id="select3" class="form-control populate placeholder select2-offscreen"');
								 
							?>
						</div>
					</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label">&nbsp;</label>
				  <div class="col-sm-4">
				  <button type="submit" class="btn btn-primary">Save</button>
				  <a href="<?php echo site_url('site/viewmall'); ?>" class="btn btn-secondary">Cancel</a>
				</div>
				</div>
			  </form>
			  <script type="text/javascript">
     var nodata=9;
    function changemall() {
        //alert($('#select3').val());

        $.getJSON(
            "<?php echo base_url(); ?>index.php/site/getmallincity/" + $('#select1').val(), {
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
                  var mallbycity=$(".mallsbycity select").select2({allowClear: true,width:343});
                  
    function changemalldropdown(data) {
        $(".mallsbycity select").html("");
        for(var i=0;i<data.length;i++)
        {
//            console.log(data[i].id);
            $(".mallsbycity select").append("<option value='"+data[i].id+"'>"+data[i].name+"</option>");
            
        }

    };
                  
//            $(".mallsbycity").append("<tr><td><input type='checkbox' name='storeid[]' id='select5' class='check' value='"+data[i].id+"' ></td><td>"+data[i].name+"</td><td>"+data[i].storeaddress+"</td><td>"+data[i].locationname+"</td><td>"+data[i].mallname+"</td><td>"+data[i].malladdress+"</td><td>"+data[i].cityname+"</td></tr>");    
                  
                $(document).ready(function() {
                   
    $('#select10').select2(
    {
		
		allowClear: true,
		//minimumInputLength: 3,
		
	 }
    );
                });
                </script>
			</div>
		</section>
	</div>
</div>+