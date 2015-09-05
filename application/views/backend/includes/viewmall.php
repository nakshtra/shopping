<div class=" row" style="padding:1% 0;">
	<div class="col-md-8">
		<div class=" pull-right col-md-1 createbtn" ><a class="btn btn-primary pull-right"  href="<?php echo site_url('site/createmall'); ?>"><i class="icon-plus"></i>Create </a> </div>
	</div>
	<div class="col-md-2">
	
		<a class="btn btn-primary"  href="<?php echo site_url('site/uploadmallcsv'); ?>"><i class="icon-upload"></i>Upload malls</a> &nbsp; 
	</div>
	
	<div class=" pull-right col-md-2 createbtn" ><a class="btn btn-primary" href="<?php echo site_url('site/exportmallstocsv'); ?>"target="_blank"><i class="icon-plus"></i>Get Name & ID CSV</a></div>
<!--
	<div class="col-md-2">
	
		<a class="btn btn-primary"  href="<?php echo site_url('site/exportmallstocsv'); ?>"><i class="icon-upload"></i>Export to CSV</a> &nbsp; 
	</div>
-->
</div>
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
                Mall Details
            </header>
			<table class="table table-striped table-hover fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
			<thead>
				<tr>
					<!--<th>Id</th>-->
					<th>Name</th>
					<th>Address</th>
					<th>City</th>
					<th>Location</th>
					<!--<th>Latitude</th>
					<th>Longitude</th>-->
					<th>Contact Number</th>
<!--
					<th>Parking Facility</th>
					<th>Cinema</th>
					<th>Restaurant</th>
					<th>Entertainment</th>
-->
					<th>Website</th>
					<th>Email Id</th>
					<th>Logo</th>
					<th> Actions </th>
				</tr>
			</thead>
			<tbody>
			   <?php foreach($table as $row) { ?>
					<tr>
						<!--<td><?php echo $row->id;?></td>-->
						<td><?php echo $row->name;?></td>
						<td><?php echo $row->address;?></td>
						<td><?php echo $row->cityname;?></td>
						<td><?php echo $row->locationname;?></td>
						<td><?php echo $row->contactno;?></td>
<!--
						<td><?php echo $row->parkingfacility;?></td>
						<td><?php echo $row->cinema;?></td>
						<td><?php echo $row->restaurant;?></td>
						<td><?php echo $row->entertainment;?></td>
-->
						<td><?php echo $row->website;?></td>
						<td><?php echo $row->email;?></td>
						<td><img src="<?php echo base_url('uploads')."/".$row->logo; ?>" width="50px" height="auto"></td>
						<td>
							<a href="<?php echo site_url('site/editmall?id=').$row->id;?>" class="btn btn-primary btn-xs">
								<i class="icon-pencil"></i>
							</a>
							<a href="<?php echo site_url('site/deletemall?id=').$row->id; ?>" class="btn btn-danger btn-xs"onclick="return confirm('Are you sure?')">
								<i class="icon-trash "></i>
							</a> 
							
						</td>
					</tr>
					<?php } ?>
			</tbody>
			</table>
		</section>
	</div>
</div>