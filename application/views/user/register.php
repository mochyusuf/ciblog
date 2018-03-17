<?php echo validation_errors(); ?>

<?php echo form_open('users/register'); ?>
<div class="row">
    <div class="col-md-4 offset-md-4">
      <h2 class="text-center"><?= $title ?></h2>
      <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Name" value="">
      </div>
      <div class="form-group">
        <label for="">Zipcode</label>
        <input type="text" class="form-control" name="zipcode" placeholder="Zipcode" value="">
      </div>
      <div class="form-group">
        <label for="">Email</label>
        <input type="email" class="form-control" name="email" placeholder="Email" value="">
      </div>
      <div class="form-group">
        <label for="">Username</label>
        <input type="text" class="form-control" name="username" placeholder="Username" value="">
      </div>
      <div class="form-group">
        <label for="">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password" value="">
      </div>
      <div class="form-group">
        <label for="">Confirm Password</label>
        <input type="password" class="form-control" name="password2" placeholder="Confirm Password" value="">
      </div>
      <input type="submit" class="btn btn-primary btn-block" name="submit" value="Submit">
    </div>
  </div>
<?php echo form_close(); ?>
