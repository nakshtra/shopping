<div class=" row" style="padding:1% 0;">
	<div class="col-md-9">
		<div class=" pull-right col-md-1 createbtn" ><a class="btn btn-primary pull-right"  href="<?php echo site_url('site/createindividualstoreforbrand'); ?>"><i class="icon-plus"></i>Create </a> </div>
	</div>
	<div class="col-md-3">
	
		<a class="btn btn-default"  href="<?php echo site_url('site/uploadindividualstorecsvforbrand'); ?>"><i class="icon-upload"></i>Upload Individual Stores</a> &nbsp; 
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
                Individual Store Details
            </header>
            <?php
//print_r($table);
?>
			<table class="table table-striped table-hover fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
			<thead>
				<tr>
					<!--<th>Id</th>-->
					<th>Name</th>
<!--					<th>city</th>-->
					<th>Brand</th>
<!--
					<th>Format</th>
					<th>mall</th>
					<th>floor</th>
-->
					<th>Address</th>
					<th>Location</th>
					<!--<th>Latitude</th>
					<th>Longitude</th>-->
					<th>Contact</th>
					<th>Website</th>
					<th>Email Id</th>
<!--
					<th>Facebook</th>
					<th>Twitter</th>
-->
					<th>Categories</th>
					<th> Actions </th>
				</tr>
			</thead>
			<tbody>
			   <?php foreach($table as $row) { ?>
					<tr>
						<!--<td><?php echo $row->id;?></td>-->
						<td><?php echo $row->name;?></td>
<!--						<td><?php echo $row->cityname;?></td>-->
						<td><?php echo $row->brandname;?></td>
<!--
						<td><?php echo $row->format;?></td>
						<td><?php echo $row->mallname;?></td>
						<td><?php echo $row->floor;?></td>
-->
						<td><?php echo $row->address;?></td>
						<td><?php echo $row->locationname;?></td>
<!--
						<td><?php echo $row->latitude;?></td>
						<td><?php echo $row->longitude;?></td>
-->
						<td><?php echo $row->contactno;?></td>
						<td><?php echo $row->website;?></td>
						<td><?php echo $row->email;?></td>
<!--
						<td><?php echo $row->facebookpage;?></td>
						<td><?php echo $row->twitterpage;?></td>
-->
						<td>
						<a href="<?php echo site_url('site/viewindividualstorecategoryforbrand?id=').$row->id.'&brandid='.$row->brandid;?>" class="btn btn-info  btn-xs">view</a>
						<a href="<?php echo site_url('site/editindividualstorecategoryforbrand?id=').$row->id.'&brandid='.$row->brandid;?>" class="btn btn-info  btn-xs">Add</a>
						</td>
						<td>
							<a href="<?php echo site_url('site/editindividualstoreforbrand?id=').$row->id;?>" class="btn btn-primary btn-xs">
								<i class="icon-pencil"></i>
							</a>
							<a href="<?php echo site_url('site/deleteindividualstoreforbrand?id=').$row->id; ?>" class="btn btn-danger btn-xs">
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