<div class=" row" style="padding:1% 0;">
	<div class="col-md-10">
		<div class=" pull-right col-md-1 createbtn" ><a class="btn btn-primary" href="<?php echo site_url('site/createofferforbrand'); ?>"><i class="icon-plus"></i>Create </a></div>
	</div>
	<div class="col-md-2">
	
		<a class="btn btn-danger"  href="<?php echo site_url('site/deleteallofferforbrand'); ?>" onclick="return confirm('Are you sure?')"><i class="icon-trash"></i>Delete All </a> &nbsp; 
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
                offer Details
            </header>
			<table class="table table-striped table-hover border-top " id="sample_1" cellpadding="0" cellspacing="0" >
			<thead>
				<tr>
					<!--<th>Id</th>-->
					<th>Header</th>
					<th>Description</th>
					<th>From</th>
					<th>To</th>
					<th>Brand</th>
<!--					<th>Store</th>-->
					<th> Actions </th>
				</tr>
			</thead>
			<tbody>
			   <?php foreach($table as $row) { ?>
					<tr>
						<!--<td><?php echo $row->id; ?></td>-->
						<td><?php echo $row->header; ?></td>
						<td><?php echo $row->description; ?></td>
						<td><?php echo $row->from; ?></td>
						<td><?php echo $row->to; ?></td>
						<td><?php echo $row->brandname; ?></td>
<!--						<td><?php echo $row->storename; ?></td>-->
						<td> <a class="btn btn-primary btn-xs" href="<?php echo site_url('site/editofferforbrand?id=').$row->id.'&brand='.$row->brandid;?>"><i class="icon-pencil"></i></a>
                                      <a class="btn btn-danger btn-xs" href="<?php echo site_url('site/deleteofferforbrand?id=').$row->id; ?>" onclick="return confirm('Are you sure?')"><i class="icon-trash "></i></a>
									 
					  </td>
					</tr>
					<?php } ?>
			</tbody>
			</table>
		</section>
	</div>
  </div>
