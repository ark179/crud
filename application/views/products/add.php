<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css'); ?>">

    <title>Add Product</title>
  </head>
  <body>
      <div class="col-md-12">
          <h1>Add Product</h1>
          <?php echo form_open('product/add',array('name'=>'prod_form','id'=>'prod_form')); ?>
          <div class="col-md-10">
              <div class="form-group">
                  <label>Product Name : </label>
                  <input class="form-control" name="prod_name" id="prod_name" placeholder="Enter product name" value="<?php echo set_value('prod_name');?>">
                  <?php echo form_error('prod_name'); ?>
              </div>
              <div class="form-group">
                  <label>Product Description : </label>
                  <textarea class="form-control" name="prod_description" id="prod_description"><?php echo set_value('prod_description');?></textarea>
                  <?php echo form_error('prod_description'); ?>
              </div>
              <div class="form-group">
                  <label>Product Price : </label>
                  <input class="form-control" name="prod_price" id="prod_price" placeholder="Enter product price" value="<?php echo set_value('prod_price');?>">
                  <?php echo form_error('prod_price'); ?>
              </div>
              <div class="form-group">
                  <label>Product Quantity : </label>
                  <input class="form-control" name="prod_qty" id="prod_qty" placeholder="Enter product quantity"value="<?php echo set_value('prod_qty');?>">
                  <?php echo form_error('prod_qty'); ?>
              </div>
              <button class="btn btn-success">Add Product</button>
              <a href="<?php echo base_url('product'); ?> "<button class="btn btn-primary">Back</button></a>
          </div>
          <?php echo form_close()?>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  </body>
</html>
<script src="<?php echo base_url('assets/js/jquery.min.js');?>" ></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>" ></script>
<script src="<?php echo base_url('assets/js/jquery.validate.min.js');?>" ></script>
<script>
    $('#prod_form').validate({
  rules: {
    "prod_name": {
         required: true,
         minlength: 5,
         maxlength: 60,
     },
    "prod_description": {
         minlength: 5,
     },
    "prod_price": {
         required: true,
         digits: true
     },
    "prod_qty": {
         required: true,
         maxlength: 5,
         digits: true
     }
  },
  messages: {
    "prod_name": {
         required: "The product name field is required.",
         minlength: "The product name field must be at least 5 characters in length.",
         maxlength: "The product name field cannot exceed 60 characters in length."
     },
    "prod_description": {
         minlength: "The product description field must be at least 5 characters in length.",
     },
    "prod_price": {
         required: "The product price field is required.",
         digits: "The product price field must contain a decimal number.",
     },
    "prod_qty": {
         required: "The product quantity field is required.",
         maxlength: "The product quantity field cannot exceed 5 characters in length.",
         digits: "The product quantity field must contain an integer."
     }
  }
});
</script>