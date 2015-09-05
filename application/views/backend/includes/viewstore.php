<div class=" row" style="padding:1% 0;">
	<div class="col-md-12">
	
		<a class="btn btn-primary pull-right"  href="<?php echo site_url('site/createmall'); ?>"><i class="icon-plus"></i>Create </a> &nbsp; 
	</div>
	
</div>
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
                Event Details
            </header>
			<table class="table table-striped table-hover fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
			<thead>
				<tr>
					<!--<th>Id</th>-->
					<th>Name</th>
					<th>city</th>
					<th>Brand</th>
					<th>Format</th>
					<th>mall</th>
					<th>floor</th>
					<th>Address</th>
					<th>Location</th>
					<!--<th>Latitude</th>
					<th>Longitude</th>-->
					<th>Contact Number</th>
					<th>Website</th>
					<th>Email Id</th>
					<th> Actions </th>
				</tr>
			</thead>
			<tbody>
			   <?php foreach($table as $row) { ?>
					<tr>
						<!--<td><?php echo $row->id;?></td>-->
						<td><?php echo $row->name;?></td>
						<td><?php echo $row->cityname;?></td>
						<td><?php echo $row->brandname;?></td>
						<td><?php echo $row->format;?></td>
						<td><?php echo $row->mallname;?></td>
						<td><?php echo $row->floor;?></td>
						<td><?php echo $row->address;?></td>
						<td><?php echo $row->location;?></td>
						<td><?php echo $row->contactno;?></td>
						<td><?php echo $row->website;?></td>
						<td><?php echo $row->email;?></td>
						<td>
							<a href="<?php echo site_url('site/editmall?id=').$row->id;?>" class="btn btn-primary btn-xs">
								<i class="icon-pencil"></i>
							</a>
							<a href="<?php echo site_url('site/deletemall?id=').$row->id; ?>" class="btn btn-danger btn-xs">
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