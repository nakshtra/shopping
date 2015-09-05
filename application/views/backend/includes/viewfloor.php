<div class=" row" style="padding:1% 0;">
	<div class="col-md-10">
	
		<a class="btn btn-primary pull-right"  href="<?php echo site_url('site/createfloor'); ?>"><i class="icon-plus"></i>Create </a> &nbsp; 
	</div>
<!--
	<div class="col-md-2">
	
		<a class="btn btn-danger"  href="<?php echo site_url('site/deleteallfloor'); ?>" onclick="return confirm('Are you sure?')"><i class="icon-trash"></i>Delete All </a> &nbsp; 
	</div>
-->
	
</div>
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
                floor Details
            </header>
           
			<table class="table table-striped table-hover fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
			<thead>
				<tr>
					<!--<th>Id</th>-->
					<th>Id</th>
					<th>Floor</th>
					<th> Actions </th>
				</tr>
			</thead>
			<tbody>
			   <?php foreach($table as $row) { ?>
					<tr>
						<td><?php echo $row->id;?></td>
						<td><?php echo $row->floorno;?></td>
						<td>
							<a href="<?php echo site_url('site/editfloor?id=').$row->id;?>" class="btn btn-primary btn-xs">
								<i class="icon-pencil"></i>
							</a>
							<a href="<?php echo site_url('site/deletefloor?id=').$row->id; ?>" class="btn btn-danger btn-xs">
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