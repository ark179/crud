<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/dataTables.bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <title>Product List</title>
    </head>
    <body>
        <?php //echo "<pre>";print_R($_SESSION);die;?>
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <strong><?php echo $_SESSION['success']; ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">x</span>

                </button>
            </div>
        <?php elseif (isset($_SESSION['failure'])): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <strong><?php echo $_SESSION['failure']; ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
        <?php elseif(validation_errors() != false): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <strong><?php echo form_error('checked_id'); ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
        <?php else:
            ?>
        <?php endif; ?>
        <strong><?php //echo validation_errors(); die;?></strong>
        <?php echo form_open('product/delete_all',array('name'=>'delete_all_prod','id'=>'delete_all_prod')) ?>
        <div class="row">
            <div class="col-md-6 text-left">
                <input type="submit" class="btn btn-danger" name="delete_all" value="Delete All">
            </div>
            <div class="col-md-6 text-right">
                <a href="<?php echo base_url('product/add'); ?>" class="btn btn-success">
                    Add Product 
                </a>
            </div>
        </div>
        <!--<div class="col-md-10">-->
            <br>
            <table class="table table-bordered" id="prod_table" name="prod_table" width="100%">
                 <thead>
                <tr>
                    <th><input type="checkbox" id="select_all" class="form-group"value="" <?php if(empty($products)) { echo "disabled"; }?>></th>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Product description</th>
                    <th>Product quantity</th>
                    <th>Product Price</th>
                    <th>Product Added Date</th>
                    <th>Last Updated Date</th>
                    <th>Actions</th>
                </tr>
                 </thead>
                  <tbody>
                <?php
                if (!empty($products)) {
                    $i = 0;
                    
                    foreach ($products as $key => $value):
                        $i++;
                        ?>
                       
                        <tr>
                            <td align="center"><input type="checkbox" name="checked_id[]" id="checked_id" class="checkbox" value="<?php echo  $value->id; ?>"></td>
                            <td><?php echo $i ?></td>
                            <td><?php echo $value->name ?></td>
                            <td><?php echo $value->description ?></td>
                            <td><?php echo $value->qty ?></td>
                            <td><?php echo $value->price ?></td>
                            <td><?php echo $value->created_at ?></td>
                            <td><?php echo $value->updated_at ?></td>
                            <td>
                                <a href="<?php echo base_url('product/view/') . $value->id ?>"
                                    <button class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></button>
                                </a>
                                <a href="<?php echo base_url('product/edit/') . $value->id ?>"
                                    <button class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></button>
                                </a>
                                <a href="<?php echo base_url('product/delete/') . $value->id ?>"
                                    <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                </a>
                            </td>
                        </tr>
                        
                    <?php
                    endforeach;
                }
                else {
                    ?>
                    <tr>
                        <td colspan="8">
                            No record found.
                        </td>
                    </tr>
                <?php }
                ?>
                    </tbody>
            </table>
            <?php echo form_close(); ?>
        <!--</div>-->
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        
    </body>
</html>
<script src="<?php echo base_url('assets/js/jquery.min.js');?>" ></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>" ></script>
<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js');?>" ></script>
<script src="<?php echo base_url('assets/js/dataTables.bootstrap.min.js');?>" ></script>
<script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
<script>
    $(document).ready(function () {
    
    $('#prod_table').DataTable( {
        aaSorting: [[1, 'asc']],
        bFilter: true,
        bSortable: true,
        aoColumnDefs: [
            { "aTargets": [ 0 ], "bSortable": false },
//            { "aTargets": [ 1 ], "bSortable": true },
//            { "aTargets": [ 2 ], "bSortable": true },
//            { "aTargets": [ 3 ], "bSortable": true },
//            { "aTargets": [ 4 ], "bSortable": true },
//            { "aTargets": [ 5 ], "bSortable": true },
//            { "aTargets": [ 6 ], "bSortable": true },
            { "aTargets": [ 7 ], "bSortable": false }
        ]
    });
    $("#select_all").on('click',function(){
        if(this.checked)
        {
            $(".checkbox").each(function (){
                this.checked=true;
            });
        }
        else
        {
            $(".checkbox").each(function (){
                this.checked=false;
            });
        }
    });
    
    $('.checkbox').on('click',function (){
        if($(".checkbox:checked").length == $(".checkbox").length){
            $("#select_all").prop('checked',true);
        }
        else {
            $("#select_all").prop('checked',false);
        }
    });
    });
    
    function delete_confirm()
    {
        
        if($(".checkbox:checked").length > 0)
        {
            var result = confirm("Are you sure to delete selected users");
            if(result)
                return true;
            else
                return false;
        }
        else
        {
            alert("Select at least 1 record successfully");
            return false;
        }
    }
</script>