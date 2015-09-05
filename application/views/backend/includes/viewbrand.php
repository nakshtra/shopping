<div class=" row" style="padding:1% 0;">
	<div class="col-md-8">
		<div class=" pull-right col-md-1 createbtn" ><a class="btn btn-primary pull-right"  href="<?php echo site_url('site/createbrand'); ?>"><i class="icon-plus"></i>Create </a> </div>
	</div>
	<div class="col-md-2">
	
		<a class="btn btn-secondary"  href="<?php echo site_url('site/uploadbrandcsv'); ?>"><i class="icon-trash"></i>Upload CSV</a> &nbsp; 
	</div>
	
	<div class=" pull-right col-md-2 createbtn" ><a class="btn btn-primary" href="<?php echo site_url('site/exportbrandstocsv'); ?>"target="_blank"><i class="icon-plus"></i>Get Name & ID CSV</a></div>
</div>
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
                Brand Details
            </header>
			<table class="table table-striped table-hover fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Id</th>
					<th>Brand Name</th>
<!--
					<th>Price Range</th>
					<th>Video</th>
					<th> Categories </th>
-->
					<th> Actions </th>
				</tr>
			</thead>
			<tbody>
			   <?php foreach($table as $row) { ?>
					<tr>
						<td><?php echo $row->id;?></td>
						<td><?php echo $row->name;?></td>
<!--
						<td><?php echo $row->rangename;?></td>
						<td><?php echo $row->video;?></td>
-->
<!--
						<td><a href="<?php echo site_url('site/viewonebrandcategories?brandid=').$row->id;?>" class="btn btn-info">View All Categories
							</a></td>
-->
						<td>
							
							<a href="<?php echo site_url('site/editbrand?id=').$row->id;?>" class="btn btn-primary btn-xs">
								<i class="icon-pencil"></i>
							</a>
							<a href="<?php echo site_url('site/deletebrand?id=').$row->id; ?>" class="btn btn-danger btn-xs">
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