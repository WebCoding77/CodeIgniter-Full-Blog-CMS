<?php $this->extend('layouts/app.php'); ?>

<?php $this->section('content'); ?>
<div class="container">
    <div class="comment-form-wrap pt-5">
       

        <h3 class="mb-5">Update Post</h3>
        <form action="<?php echo url_to('update.post', $singlePost['id']); ?>" method="POST" class="p-5 bg-light" enctype="multipart/form-data">
        
            <div class="form-group">
                <label for="title">Title</label>

                <input type="text" placeholder="title" value="<?php echo $singlePost['title']; ?>" name="title"  class="form-control" id="website">
            </div>
            <div class="form-group">

                <select name="category" class="form-select" aria-label="Default select example">
                    <option selected>Categories</option>
                        <?php foreach($categories as $category) : ?>
                            <option value="<?php echo $category->name ?>"><?php echo $category->name ?></option>
                        <?php endforeach; ?>
                       

                </select>
            </div>
      
            
            <div class="form-group">
                <label for="message">Description</label>
                <textarea placeholder="Description"  name="body"  cols="30" rows="10" class="form-control">
                    <?php echo $singlePost['body']; ?>
                </textarea>
            </div>

            <div class="form-group">
             <input type="submit" name="submit" value="Update Post" class="btn btn-primary">
            </div>

        </form>
    </div>
</div>
<?= $this->endsection(); ?>