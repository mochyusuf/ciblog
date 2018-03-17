<h2><?php echo $post['title']; ?></h2>
<img class="post-thumb" src="<?php echo base_url(); ?>assets/images/posts/<?php echo $post['post_image'];?>" alt="">

<small class="post-date">Posted on: <?php echo $post['created_at']; ?></small>
<br />
<div class="post-body">
  <?php echo $post['body']; ?>
</div>


<?php if ($this->session->userdata('user_id') == $post['user_id']) {?>
  <hr>
  <?php echo form_open('/posts/delete/'.$post['id']); ?>
      <input type="submit" name="" value="delete" class="btn btn-danger">

  <a class="btn btn-info" href="<?php echo base_url() ?>posts/edit/<?php echo $post['slug'] ?>">Edit</a>
  </form>
<?php } ?>
<hr>
<h3>Comment</h3>
<?php if($comments) : ?>
    <?php foreach($comments as $commentx) : ?>
    <div class="card">
      <div class="card-header">
        <h5><?php echo $commentx['body']; ?>[by <strong><?php echo $commentx['name'] ?></strong>]</h5>
      </div>
    </div>
    <?php endforeach; ?>
<?php else : ?>
  <p>No Comments To Display</p>
<?php endif; ?>
<h3>Add Comment</h3>
<?php echo validation_errors(); ?>
<?php echo form_open('comments/create/'.$post['id']); ?>
  <div class="form-group">
    <label for="">Name</label>
    <input type="text" name="name" class="form-control" value="">
  </div>
  <div class="form-group">
    <label for="">Email</label>
    <input type="text" name="email" class="form-control" value="">
  </div>
  <div class="form-group">
    <label for="">Body</label>
    <textarea name="body" rows="8" class="form-control" cols="80"></textarea>
  </div>
  <input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
  <input type="submit" class="btn btn-danger" name="" value="submit">
