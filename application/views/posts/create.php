<h2><?= $title ?></h2>
<?php echo validation_errors(); ?>
<?php echo form_open_multipart('Posts/create'); ?>
  <fieldset>
    <div class="form-group">
      <label for="exampleInputEmail1">Title</label>
      <input type="text" class="form-control" name="title" id="title">
    </div>
    <div class="form-group">
      <label for="exampleTextarea">Body</label>
      <textarea class="form-control" name="body" id="editor1" rows="3"></textarea>
    </div>
    <div class="form-group">
      <select class="form-control" name="category_id">
        <?php foreach ($categories as $key) {?>
          # code...
          <option value="<?php echo $key['id']; ?>"><?php echo $key['name']; ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleInputFile">File input</label>
      <input type="file" name="post_image_X" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
      <small id="fileHelp"  class="form-text text-muted">Masukkan Gambar</small>
    </div>
    </fieldset>
    <button type="submit" class="btn btn-primary">Submit</button>
  </fieldset>
</form>
