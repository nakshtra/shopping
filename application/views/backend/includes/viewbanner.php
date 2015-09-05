<div class=" row" style="padding:1% 0;">
	<div class="col-md-10">
	
		<a class="btn btn-primary pull-right"  href="<?php echo site_url('site/createbanner'); ?>"><i class="icon-plus"></i>Create </a> &nbsp; 
	</div>
	<div class="col-md-2">
	
		<a class="btn btn-danger"  href="<?php echo site_url('site/deleteallbanner'); ?>" onclick="return confirm('Are you sure?')"><i class="icon-trash"></i>Delete All </a> &nbsp; 
	</div>
	
</div>
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
                Banner Details
            </header>
            <?php
//print_r($table);
?>
			<table class="table table-striped table-hover fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
			<thead>
				<tr>
					<!--<th>Id</th>-->
					<th>Image</th>
					<th>Title</th>
					<th>Link</th>
					<th>Order</th>
					<th>Timestamp</th>
					<th> Actions </th>
				</tr>
			</thead>
			<tbody>
			   <?php foreach($table as $row) { ?>
					<tr>
						<!--<td><?php echo $row->id;?></td>-->
						<td><img src="<?php echo base_url('uploads')."/".$row->image; ?>" width="50px" height="auto"></td>
						<td><?php echo $row->title;?></td>
						<td><?php echo $row->link;?></td>
						<td><?php echo $row->order;?></td>
						<td><?php echo $row->timestamp;?></td>
						<td>
							<a href="<?php echo site_url('site/editbanner?id=').$row->id;?>" class="btn btn-primary btn-xs">
								<i class="icon-pencil"></i>
							</a>
							<a href="<?php echo site_url('site/deletebanner?id=').$row->id; ?>" class="btn btn-danger btn-xs">
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