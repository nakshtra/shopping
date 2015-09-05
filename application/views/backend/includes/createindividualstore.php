<div class="row" style="padding:1% 0">
	<div class="col-md-12">
		<div class="pull-right">
			<a href="<?php echo site_url('site/viewindividualstore'); ?>" class="btn btn-primary pull-right"><i class="icon-long-arrow-left"></i>&nbsp;Back</a>
		</div>
	</div>
</div>
<?php
print_r($city);
?>
<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 Individual Stores Details
			</header>
			<div class="panel-body">
			  <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/createindividualstoresubmit');?>" enctype= "multipart/form-data">
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Name Of Store</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="name" value="<?php echo set_value('name');?>">
					<input type="hidden" id="normal-field" class="form-control" name="format" value="2">
				  </div>
				</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">City</label>
						<div class="col-sm-4">
						   <?php 
								echo form_dropdown('city',$city,set_value('city'),'id="select1" class="form-control populate placeholder select2-offscreen"');
								 
							?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Brand</label>
						<div class="col-sm-4">
						   <?php 
								echo form_dropdown('brand',$brand,set_value('brand'),'id="select2" class="form-control populate placeholder select2-offscreen"');
								 
							?>
						</div>
					</div>
					<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Address</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="address" value="<?php echo set_value('address');?>">
				  </div>
				</div>
					<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Description</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="description" value="<?php echo set_value('description');?>">
				  </div>
				</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Location</label>
						<div class="col-sm-4">
						   <?php 
								echo form_dropdown('location',$location,set_value('location'),'id="select3" class="form-control populate placeholder select2-offscreen"');
								 
							?>
						</div>
					</div>
					
<!--
					<div class="form-group">
						<label class="col-sm-2 control-label">Offer</label>
						<div class="col-sm-4">
						   <?php 
//								echo form_dropdown('offer',$offer,set_value('offer'),'id="select5" class="form-control populate placeholder select2-offscreen"');
								 
							?>
						</div>
					</div>
-->
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Latitude</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="latitude" value="<?php echo set_value('latitude');?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Longitude</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="longitude" value="<?php echo set_value('longitude');?>">
				  </div>
				</div>
				
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Contact Number</label>
				  <div class="col-sm-4">
					<input type="number" id="normal-field" class="form-control" name="contactno" value="<?php echo set_value('contactno');?>">
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
								echo form_dropdown('shopclosedon',$shopclosedon,set_value('shopclosedon'),'id="select4" class="form-control populate placeholder select2-offscreen"');
								 
							?>
						</div>
					</div>
				
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Email</label>
				  <div class="col-sm-4">
					<input type="email" id="normal-field" class="form-control" name="email" value="<?php echo set_value('email');?>">
				  </div>
				</div>
<!--
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Website</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="website" value="<?php echo set_value('website');?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Facebook Page</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="facebookpage" value="<?php echo set_value('facebookpage');?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Twitter Page</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="twitterpage" value="<?php echo set_value('twitterpage');?>">
				  </div>
				</div>
-->
<!--
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Mall Logo</label>
				  <div class="col-sm-4">
					<input type="file" id="normal-field" class="form-control" name="logo" value="<?php echo set_value('logo');?>">
				  </div>
				</div>
-->
				<!--
				<div class="form-group">
					<label class="col-sm-2 control-label">Categories</label>
					<div class="col-sm-4">
					   <?php /*
							echo form_dropdown('category',$category,set_value('category'),'id="select1" class="form-control populate placeholder select2-offscreen"');
							 */
						?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Organizer</label>
					<div class="col-sm-4">
					   <?php 
							echo form_dropdown('organizer',$organizer,set_value('organizer'),'id="select1" class="form-control populate placeholder select2-offscreen"');
							 
						?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Listing Type</label>
					<div class="col-sm-4">
					   <?php 
							echo form_dropdown('listingtype',$listingtype,set_value('listingtype'),'id="select2" class="form-control populate placeholder select2-offscreen"');
							 
						?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Show remaining ticket</label>
					<div class="col-sm-4">
					   <?php 
							echo form_dropdown('showremainingticket',$remainingticket,set_value('showremainingticket'),'id="select3" class="form-control populate placeholder select2-offscreen"');
							 
						?>
					</div>
				</div>-->
				<div class=" form-group">
				  <label class="col-sm-2 control-label">&nbsp;</label>
				  <div class="col-sm-4">
				  <button type="submit" class="btn btn-primary">Save</button>
				  <a href="<?php echo site_url('site/viewmall'); ?>" class="btn btn-secondary">Cancel</a>
				</div>
				</div>
			  </form>
			</div>
		</section>
	</div>
</div>