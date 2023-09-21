<?php $this->extend('layouts/admin.php'); ?>

<?php $this->section('content'); ?>


<div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
                <?php if(session()->getFlashdata('create')) : ?>
							<p class="alert alert-success"><?php echo session()->getFlashdata('create'); ?></p>
				<?php endif; ?>


                <?php if(session()->getFlashdata('update')) : ?>
							<p class="alert alert-success"><?php echo session()->getFlashdata('update'); ?></p>
				<?php endif; ?>

            
        <?php if(session()->getFlashdata('delete')) : ?>
							<p class="alert alert-success"><?php echo session()->getFlashdata('delete'); ?></p>
				<?php endif; ?>


              <h5 class="card-title mb-4 d-inline">Categories</h5>
             <a  href="<?php echo url_to('categories.create'); ?>" class="btn btn-primary mb-4 text-center float-right">Create Categories</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">update</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                    <?php foreach($allCategories as $category) : ?>
                        <tr>
                            <th scope="row"><?= $category->id; ?></th>
                            <td><?= $category->name; ?></td>
                            <td><a  href="<?php echo url_to('categories.edit', $category->id); ?>" class="btn btn-warning text-white text-center ">Update</a></td>
                            <td><a href="<?php echo url_to('categories.delete', $category->id); ?>" class="btn btn-danger  text-center ">Delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>


<?php $this->endsection(); ?>