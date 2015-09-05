	    <section class="panel">
		    <header class="panel-heading">
				 Event Details
			</header>
			<?php print_r($before);?>
			<div class="panel-body">
			  <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/editmallsubmit');?>" enctype= "multipart/form-data">
				<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before['mall']->id);?>" style="display:none;">
				
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Name</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="name" value="<?php echo set_value('name',$before['mall']->name);?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Address</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="address" value="<?php echo set_value('address',$before['mall']->address);?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Description</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="description" value="<?php echo set_value('description',$before['mall']->description);?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Special Offer</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="specialoffers" value="<?php echo set_value('specialoffers',$before['mall']->specialoffers);?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Event</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="events" value="<?php echo set_value('events',$before['mall']->events);?>">
				  </div>
				</div>
				
					<div class="form-group">
						<label class="col-sm-2 control-label">City</label>
						<div class="col-sm-4">
						   <?php 
								echo form_dropdown('city',$city,set_value('city',$before['mall']->city),'id="select10" class="form-control populate placeholder select2-offscreen"');
								 
							?>
						</div>
					</div>
				<div class="form-group">
						<label class="col-sm-2 control-label">Location</label>
						<div class="col-sm-4">
						   <?php 
								echo form_dropdown('location',$location,set_value('location',$before['mall']->location),'id="select3" class="form-control populate placeholder select2-offscreen"');
								 
							?>
						</div>
					</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Latitude</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="latitude" value="<?php echo set_value('latitude',$before['mall']->latitude);?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Longitude</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="longitude" value="<?php echo set_value('location',$before['mall']->longitude);?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Contact</label>
				  <div class="col-sm-4">
					<input type="number" id="normal-field" class="form-control" name="contactno" value="<?php echo set_value('contactno',$before['mall']->contactno);?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Parking Fascility</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="parkingfacility" value="<?php echo set_value('parkingfacility',$before['mall']->parkingfacility);?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Cinema</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="cinema" value="<?php echo set_value('cinema',$before['mall']->cinema);?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">restaurant</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="restaurant" value="<?php echo set_value('restaurant',$before['mall']->restaurant);?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">entertainment</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="entertainment" value="<?php echo set_value('entertainment',$before['mall']->entertainment);?>">
				  </div>
				</div>
				
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Website</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="website" value="<?php echo set_value('website',$before['mall']->website);?>">
				  </div>
				</div>
				
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Email</label>
				  <div class="col-sm-4">
					<input type="email" id="normal-field" class="form-control" name="email" value="<?php echo set_value('email',$before['mall']->email);?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Facebook Page</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="facebookpage" value="<?php echo set_value('facebookpage',$before['mall']->facebookpage);?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Pin Interest</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="pininterest" value="<?php echo set_value('pininterest',$before['mall']->pininterest);?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Instagram</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="instagram" value="<?php echo set_value('instagram',$before['mall']->instagram);?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Twitter Page</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="twitterpage" value="<?php echo set_value('twitterpage',$before['mall']->twitterpage);?>">
				  </div>
				</div>
				
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Mall Logo</label>
				  <div class="col-sm-4">
					<input type="file" id="normal-field" class="form-control" name="logo" value="<?php echo set_value('logo',$before['mall']->logo);?>">
					<?php if($before['mall']->logo == "")
						 { }
						 else
						 { ?>
							<img src="<?php echo base_url('uploads')."/".$before['mall']->logo; ?>" width="140px" height="140px">
						<?php }
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
			</div>
		</section>
