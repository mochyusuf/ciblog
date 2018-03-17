<?php echo form_open('users/login'); ?>
  <div class="row">
    <div class="col-md-4 offset-md-4">
      <h1 class="text-center"><?php echo $title; ?></h1>
      <div class="form-group">
        <input type="text" name="username" class="form-control" placeholder="Enter Username" required autofocus value="">
      </div>
      <div class="form-group">
        <input type="password" name="password" class="form-control" placeholder="Enter Password" required value="">
      </div>
      <input type="submit" class="btn btn-primary btn-block" name="" value="Login">
    </div>
  </div>
<?php echo form_close(); ?>
