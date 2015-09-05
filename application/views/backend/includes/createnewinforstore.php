<div class="row" style="padding:1% 0">
	<div class="col-md-12">
		<div class="pull-right">
			<a href="<?php echo site_url('site/viewnewinforbrand'); ?>" class="btn btn-primary pull-right"><i class="icon-long-arrow-left"></i>&nbsp;Back</a>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 New In Details
			</header>
			<div class="panel-body">
			  <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/createnewinforstoresubmit');?>" enctype= "multipart/form-data">
			  
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Brand</label>
                        <div class="col-sm-4">
                            <?php 
//echo form_dropdown( 'brand',$brand,set_value( 'brand'), 'id="select2" onChange="changestore()" class="form-control populate placeholder select2-offscreen"');
                                echo $brand[0]->name;

                            ?>
                            <input type="hidden" name="brand" value="<?php echo $brand[0]->id;?>" class="brandidtextbox"> 
                        </div>
                    </div>


                    <div id="store" class="form-group">
                        <label class="col-sm-2 control-label">Store Name</label>
                        <div class="col-sm-4">
                            
                           <?php
                                echo $store[0]->name;
                            ?>

                        </div>
                    </div>

				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Image</label>
				  <div class="col-sm-4">
					<input type="file" id="normal-field" class="form-control" name="image" value="<?php echo set_value('image');?>">
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Description</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="description" value="<?php echo set_value('description');?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label">&nbsp;</label>
				  <div class="col-sm-4">
				  <button type="submit" class="btn btn-primary">Save</button>
				  <a href="<?php echo site_url('site/viewnewinforstore'); ?>" class="btn btn-secondary">Cancel</a>
				</div>
				</div>
			  </form>
			</div>
		</section>
	</div>
</div>

<script>
    $(document).ready(function () {
        $("#checkbox").click(function () {
            // alert("checkbox");
            if ($("#checkbox").is(':checked')) {
                //alert("checkbox");
                console.log("clicked");
                $(".check").prop('checked', true);
            } else {
                $(".check").prop('checked', false);

            }
        });



    })
var nodata=9;
    function changestore() {
        //alert($('#select3').val());

        $.getJSON(
            "<?php echo base_url(); ?>index.php/site/getstore/" + $('#select2').val(), {
                id: "123"
            },
            function (data) {
                //  alert(data);
                console.log(data);
                nodata=data;
                // $("#store").html(data);
                changestoretable(data);

            }

        );

    }



    function changestoretable(data) {
        $(".tablestore tbody").html("");
        for(var i=0;i<data.length;i++)
        {
            $(".tablestore tbody").append("<tr><td><input type='checkbox' name='storeid[]' id='select5' class='check' value='"+data[i].id+"' ></td><td>"+data[i].name+"</td><td>"+data[i].storeaddress+"</td><td>"+data[i].locationname+"</td><td>"+data[i].mallname+"</td><td>"+data[i].malladdress+"</td><td>"+data[i].cityname+"</td></tr>");
        }
$("#checkbox").click(function () {
            // alert("checkbox");
            if ($("#checkbox").is(':checked')) {
                //alert("checkbox");
                console.log("clicked");
                $(".check").prop('checked', true);
            } else {
                $(".check").prop('checked', false);

            }
        });

    };
    
$(document).ready(function () {
        $.getJSON(
            "<?php echo base_url(); ?>index.php/site/getstore/" + $('.brandidtextbox').val(), {
                id: "123"
            },
            function (data) {
                //  alert(data);
                console.log(data);
                nodata=data;
                // $("#store").html(data);
                changestoretable(data);

            }

        );
})

    //     
    //                    function changechp(){
    //                        alert($('#select1').val());
    //                    $.get( 
    //                             "<?php echo base_url(); ?>index.php/center/getchapter/"+$('#select1').val(),
    //                             { id: "123" },
    //                             function(data) {
    //                             //  alert(data);
    //                                $("#chapter").html(data);
    //                             }
    //
    //                          );
    //                    
    //                    }
</script>