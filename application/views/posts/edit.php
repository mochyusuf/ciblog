<h2><?= $title ?></h2>
<?php echo validation_errors(); ?>
<?php echo form_open('Posts/update'); ?>
  <fieldset>
    <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
    <div class="form-group">
      <label for="exampleInputEmail1">Title</label>
      <input type="text" class="form-control" name="title" id="title" value="<?php echo $post['title']; ?>">
    </div>
    <div class="form-group">
      <label for="exampleTextarea">Body</label>
      <textarea class="form-control" name="body" id="editor1" rows="3" ><?php echo $post['body']; ?></textarea>
    </div>
    <div class="form-group">
      <select class="form-control" name="category_id">
        <?php foreach ($categories as $key) {?>
          # code...
          <option value="<?php echo $key['id']; ?>"><?php echo $key['name']; ?></option>
        <?php } ?>
      </select>
    </div>
    </fieldset>
    <button type="submit" class="btn btn-primary">Submit</button>
  </fieldset>
</form>
