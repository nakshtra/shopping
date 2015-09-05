<div class="row" style="padding:1% 0">
	<div class="col-md-12">
		<div class="pull-right">
			<a href="<?php echo site_url('site/viewmall'); ?>" class="btn btn-primary pull-right"><i class="icon-long-arrow-left"></i>&nbsp;Back</a>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 Mall Details
			</header>
			<div class="panel-body">
			  <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/createmallsubmit');?>" enctype= "multipart/form-data">
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Name</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="name" value="<?php echo set_value('name');?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Address</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="address" value="<?php echo set_value('address');?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Location</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="location" value="<?php echo set_value('location');?>">
				  </div>
				</div>
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
					<input type="number" id="normal-field" class="form-control" name="contact" value="<?php echo set_value('contact');?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Parking Facility</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="parkingfacility" value="<?php echo set_value('parkingfacility');?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Cinema</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="cinema" value="<?php echo set_value('cinema');?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Restaurant</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="restaurant" value="<?php echo set_value('restaurant');?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Entertainment</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="entertainment" value="<?php echo set_value('entertainment');?>">
				  </div>
				</div>
				
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Email</label>
				  <div class="col-sm-4">
					<input type="email" id="normal-field" class="form-control" name="email" value="<?php echo set_value('email');?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Website</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="website" value="<?php echo set_value('website');?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Mall Logo</label>
				  <div class="col-sm-4">
					<input type="file" id="normal-field" class="form-control" name="logo" value="<?php echo set_value('logo');?>">
				  </div>
				</div>
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