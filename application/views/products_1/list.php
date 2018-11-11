<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <title>Update Product</title>
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
            <?php else:
            ?>
        <?php endif; ?>
            <div class="row">
            <div class="col-md-10 text-right">
                <a href="<?php echo base_url('product/add');?>" class="btn btn-success">
                    Add Product 
                </a>
            </div>
            </div>
                <div class="col-md-10">
            <br>
            <table class="table table-bordered">
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Product description</th>
                    <th>Product quantity</th>
                    <th>Product Price</th>
                    <th>Product Added Date</th>
                    <th>Last Updated Date</th>
                    <th>Actions</th>
                </tr>
                <?php
                if(!empty($products))
                {
                    $i=0;
                    foreach ($products as $key => $value): 
                        $i++;
                ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $value->name ?></td>
                        <td><?php echo $value->description ?></td>
                        <td><?php echo $value->qty ?></td>
                        <td><?php echo $value->price ?></td>
                        <td><?php echo $value->created_at ?></td>
                        <td><?php echo $value->updated_at ?></td>
                        <td>
                            <a href="<?php echo base_url('product/view/') . $value->id ?>">
                                <button class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></button>
                            </a>
                            <a href="<?php echo base_url('product/edit/') . $value->id ?>">
                                <button class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></button>
                            </a>
                            <a href="<?php echo base_url('product/delete/') . $value->id ?>">
                                <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach;
                }
                else
                { ?>
                    <tr>
                        <td colspan="8">
                            No record found.
                        </td>
                    </tr>
                <?php }
                ?>
            </table>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" ></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>" ></script>
        <script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
        </body>
                </html>