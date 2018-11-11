<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">

    <title>View Product</title>
  </head>
  <body>
      <div class="col-md-12">
          <h1>View Product</h1>
          <div class="col-md-10">
              <div class="row">
              <div class="form-group col-md-3">
                  <label>Product Name : </label>
              </div>
              <div class="form-group col-md-3">
                  <label><?php echo $product->name?></label>
              </div>
              </div>
              <div class="row">
              <div class="form-group col-md-3">
                  <label>Product Description : </label>
              </div>
              <div class="form-group col-md-3">
                  <label><?php echo $product->description?></label>
              </div>
              </div>
              <div class="row">
              <div class="form-group col-md-3">
                  <label>Product Price : </label>
              </div>
              <div class="form-group col-md-3">
                  <label><?php echo $product->price?></label>
              </div>
              </div>
              <div class="row">
              <div class="form-group col-md-3">
                  <label>Product Quantity : </label>
              </div>
              <div class="form-group col-md-3">
                  <label><?php echo $product->qty?></label>
              </div>
              </div>
              <div class="row">
              <div class="form-group col-md-3">
                  <label>Product Added Date : </label>
              </div>
              <div class="form-group col-md-3">
                  <label><?php echo $product->created_at?></label>
              </div>
              </div>
              <div class="row">
              <div class="form-group col-md-3">
                  <label>Product Last Updated At: </label>
              </div>
              <div class="form-group col-md-3">
                  <label><?php echo $product->updated_at?></label>
              </div>
              </div>
          </div>
          <a href="<?php echo base_url('product'); ?> "<button class="btn btn-primary">Back</button></a>
          </div>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" ></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js" ></script>
  </body>
</html>