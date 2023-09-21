<?php $this->extend('layouts/admin.php'); ?>

<?php $this->section('content'); ?>


<div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
                <?php if(session()->getFlashdata('delete')) : ?>
							<p class="alert alert-success"><?php echo session()->getFlashdata('delete'); ?></p>
				<?php endif; ?>
              <h5 class="card-title mb-4 d-inline">Posts</h5>
            
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">title</th>
                    <th scope="col">category</th>
                    <th scope="col">user</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                    <?php foreach($allPosts as $post) : ?>
                        <tr>
                            <th scope="row"><?= $post->id; ?></th>
                            <td><?= substr($post->title, 0, 40); ?></td>
                            <td><?= $post->category; ?></td>
                            <td><?= $post->user_name; ?></td>
                            <td><a href="<?= url_to('posts.delete', $post->id); ?>" class="btn btn-danger  text-center ">delete</a></td>
                        </tr>
                    <?php endforeach; ?>
                 
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>

<?php $this->endsection(); ?>