
<?php $this->extend('layouts/app.php'); ?>

<?php $this->section('content'); ?>

<div class="section search-result-wrap">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="heading">Searches for <?= $keyword; ?></div>
				</div>
			</div>
			<div class="row posts-entry">
				<div class="col-lg-8">
                    <?php foreach($searches as $post) : ?>
                        <div class="blog-entry d-flex blog-entry-search-item">
                            <a href="<?php echo base_url('posts/single/'.$post['id'].''); ?>" class="img-link me-4">
                                <img src="<?php echo base_url('public/assets/images/'.$post['image'].''); ?>" alt="Image" class="img-fluid">
                            </a>
                            <div>
                                <span class="date"><?= $post['created_at']; ?> &bullet; <a href="#"><?= $post['category']; ?></a></span>
                                <h2><a href="<?php echo base_url('posts/single/'.$post['id'].''); ?>"><?= $post['title']; ?></a></h2>
                                <p>
                                <?= substr($post['body'], 0, 50); ?>
                                </p>
                                <p><a href="<?php echo base_url('posts/single/'.$post['id'].''); ?>" class="btn btn-sm btn-outline-primary">Read More</a></p>
                            </div>
                        </div>
                    <?php endforeach; ?>

					


				</div>

				
			</div>
		</div>
	</div>

    <?php $this->endsection(); ?>