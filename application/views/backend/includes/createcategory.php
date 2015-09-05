<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 Category Details
			</header>
			<div class="panel-body">
				<form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('site/createcategorysubmit');?>" enctype= "multipart/form-data">
					<div class="form-group">
						<label class="col-sm-2 control-label">Name</label>
						<div class="col-sm-4">
						  <input type="text" id="normal-field" class="form-control" name="name" value="<?php echo set_value('name');?>">
						</div>
					</div>		
					<div class="form-group">
						<label class="col-sm-2 control-label" >Parent</label>
						<div class="col-sm-4">
						   <?php 
								echo form_dropdown('parent',$category,set_value('parent'),'id="select10" onchange="getimagediv()" class="form-control populate placeholder select2-offscreen"');
								 
							?>
						</div>
					</div>
					<div class=" form-group">
					  <label class="col-sm-2 control-label">Status</label>
					  <div class="col-sm-4">
						<?php
							
							echo form_dropdown('status',$status,set_value('status'),'id="select2" class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
						?>
					  </div>
					</div>
					
				<div class=" form-group" id="onparentselect">
				  <label class="col-sm-2 control-label" for="normal-field">Image</label>
				  <div class="col-sm-4">
					<input type="file" id="normal-field" class="form-control" name="image" value="<?php echo set_value('image');?>">
				  </div>
				</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">&nbsp;</label>
						<div class="col-sm-4">	
							<button type="submit" class="btn btn-info">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</section>
    </div>
</div>

<script>
 function getimagediv() {
     
        console.log($('#select10').val());
     
     $.getJSON(
            "<?php echo base_url(); ?>index.php/site/getcategoryparent/" + $('#select10').val(), {
                id: "123"
            },
            function (data) {
//                  alert(data);
                console.log(data);
                if(data[0].parent=="")
                {
                 $( "#onparentselect" ).hide();
                }
                else if(data[0].parent==null)
                {
                $( "#onparentselect" ).hide();
                }
                else
                {
                $( "#onparentselect" ).hide();
                }
            }

        );
       
    }

</script>
