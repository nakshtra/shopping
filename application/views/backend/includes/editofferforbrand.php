<?php // print_r($before);?>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Offer Details
            </header>
            <?php
//                print_r($store);

            ?>
            <div class="panel-body">
                <form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('site/editofferforbrandsubmit');?>" enctype="multipart/form-data">
                    <div class="form-row control-group row-fluid" style="display:none;">
                        <label class="control-label span3" for="normal-field">ID</label>
                        <div class="controls span9">
                            <input type="text" id="normal-field" class="row-fluid" name="id" value="<?php echo $before->id;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Header</label>
                        <div class="col-sm-4">
                            <input type="text" id="normal-field" class="form-control" name="header" value="<?php echo set_value('name',$before->header);?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-4">
                            <input type="text" id="normal-field" class="form-control" name="description" value="<?php echo set_value('name',$before->description);?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="normal-field">From</label>
                        <div class="col-sm-4">
                        
                            <input type="date" class="form-control fromdate" name="from" value="<?php echo set_value('from',$before->from);?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="normal-field">To</label>
                        <div class="col-sm-4">
                        
                            <input type="date" class="form-control fromdate" name="to" value="<?php echo set_value('to',$before->to);?>">
                            <input type="hidden" class="form-control" name="brand" value="<?php echo set_value('brand',$before->brandid);?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Brand</label>
                        <div class="col-sm-4">
                            <?php
//echo form_dropdown( 'brand',$brand,set_value( 'brand',$before->brandid),' class="form-control populate placeholder ", disabled="disabled"');
                                echo $brand[0]->name;
                            ?>
                        </div>
                    </div>

                    <div id="store" class="form-group">
                        <label class="col-sm-2 control-label">Store Name</label>
                        <div class="col-sm-4">
                            <?php echo "<table border=1><tr>
                                        <th>Select</th>
                                        <th>ADDRESS</th>
                                    </tr>"; 
                                    foreach($store as $key=>$store){ if(in_array($key,$selectedstore)) { 
                                    echo "
                            <tr>
                                <td>
                                    <input type='checkbox' name='storeid[]' id='select51' class='check' checked value='$key'></td><td>$store</td>
                            </tr>"; } else { echo "
                            <tr>
                                <td>
                                    <input type='checkbox' name='storeid[]' id='select51' class='check' value='$key'></td><td>$store</td>
                            </tr>"; } } echo "</table>"; //echo form_dropdown('storeid[]', $store, $selectedstore,'id="select2" class="form-control populate placeholder "'); //echo form_dropdown('storeid',$store,'',); ?>
                        </div>
                        <div class='col-md-4'>
                            <input type='checkbox' id='checkbox'>Select All
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
    <script>
    $(document).ready(function () {

        $("#checkbox").click(function () {
            // alert("checkbox");
            if ($("#checkbox").is(':checked')) {
                //alert("checkbox");
                $(".check").prop('checked', true);
            } else {
                $(".check").prop('checked', false);

            }
        });

        $("#button").click(function () {
            alert($(".check").val());
        });

        function changestore() {
            //alert($('#select3').val());

//            $.get(
//                "<?php echo base_url(); ?>index.php/site/getstore/" + $('#select2').val(), {
//                    id: "123"
//                },
//                function (data) {
//                    //  alert(data);
//                    $("#store").html(data);
//                }
//
//            );$.get(
//                "<?php echo base_url(); ?>index.php/site/getstore/" + $('#select2').val(), {
//                    id: "123"
//                },
//                function (data) {
//                    //  alert(data);
//                    $("#store").html(data);
//                }
//
//            );

        }
    })
</script>
</div>