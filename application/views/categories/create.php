<h2><?= $title ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('categories/create'); ?>
  <div class="form-group">
    <label for="">Name</label>
    <input type="text" class="form-control" name="name" placeholder="Enter Name" value="">
  </div>
  <button type="submit" class="btn btn-default" value="Submit" name="button"></button>
</form>
