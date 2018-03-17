<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CI Blog</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="<?php echo base_url(); ?>">CI Blog</a>

      <div class="collapse navbar-collapse" id="navbarColor02">
        <ul class="navbar-nav nav">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>posts">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>categories">Categories</a>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>users/register">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>create">Create Post</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(); ?>categories/create">Create Category</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container">
        <?php if($this->session->flashdata('user_registered')){ ?>
          <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
        <?php } ?>

        <?php if($this->session->flashdata('post_created')){ ?>
          <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>'; ?>
        <?php } ?>

        <?php if($this->session->flashdata('post_updated')){ ?>
          <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>'; ?>
        <?php } ?>

        <?php if($this->session->flashdata('categories_created')){ ?>
          <?php echo '<p class="alert alert-success">'.$this->session->flashdata('categories_created').'</p>'; ?>
        <?php } ?>

        <?php if($this->session->flashdata('post_deleted')){ ?>
          <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_deleted').'</p>'; ?>
        <?php } ?>
