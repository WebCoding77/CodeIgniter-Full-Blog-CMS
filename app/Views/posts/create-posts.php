<?php $this->extend('layouts/app.php'); ?>

<?php $this->section('content'); ?>
<div class="container">
    <div class="comment-form-wrap pt-5 mb-5">
        <?php if(session()->getFlashdata('create')) : ?>
                    <p class="alert alert-success"><?php echo session()->getFlashdata('create'); ?></p>
        <?php endif; ?>

        <h3 class="mb-5">Create a New Post</h3>
        <form action="<?php echo base_url('posts/store-posts'); ?>" method="POST" class="p-5 bg-light" enctype="multipart/form-data">
        
            <div class="form-group">
                <label for="title">Title</label>

                <input type="text" placeholder="title" name="title"  class="form-control" id="website">
            </div>
            <div class="form-group">

                <select name="category" class="form-select" aria-label="Default select example">
                <label for="title">Categories</label>

                  <option selected>Categories</option>
                        <?php foreach($categories as $category) : ?>
                            <option value="<?php echo $category->name ?>"><?php echo $category->name ?></option>
                        <?php endforeach; ?>
                       

                </select>
            </div>
      
            <div class="form-group">
                <label for="title">Image</label>

                <input type="file" name="image"  class="form-control" id="website">
            </div>

            <div class="form-group">
                <label for="message">Description</label>
                <textarea placeholder="Description" name="body"  cols="30" rows="10" class="form-control"></textarea>
            </div>

            <div class="form-group">
             <input type="submit" name="submit" value="Create Post" class="btn btn-primary">
            </div>

        </form>
    </div>
</div>
<?= $this->endsection(); ?>