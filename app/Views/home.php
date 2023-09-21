<?php $this->extend('layouts/app.php'); ?>

<?php $this->section('content'); ?>



<!-- Start retroy layout blog posts -->
<section class="section bg-light">
		<div class="container">
				<?php if(session()->getFlashdata('delete')) : ?>
							<p class="alert alert-success"><?php echo session()->getFlashdata('delete'); ?></p>
				<?php endif; ?>
			<div class="row align-items-stretch retro-layout">
				<div class="col-md-4">
				

                    <?php foreach($data as $post) : ?>
					<a href="<?php echo base_url('posts/single/'.$post->id.''); ?>" class="h-entry mb-30 v-height gradient">

						<div class="featured-img" style="background-image: url('<?= base_url('public/assets/images/'.$post->image.'')?>');"></div>

						<div class="text">
							<span class="date"><?= $post->created_at; ?></span>
							<h2><?= $post->title; ?></h2>
						</div>
					</a>
                    <?php endforeach; ?>
					
				</div>
				<div class="col-md-4">
					<?php foreach($data1 as $post) : ?>

						<a href="<?php echo base_url('posts/single/'.$post->id.''); ?>" class="h-entry img-5 h-100 gradient">

							<div class="featured-img" style="background-image: url('<?php echo base_url('public/assets/images/'.$post->image.''); ?>');"></div>

							<div class="text">
								<span class="date"><?= $post->created_at; ?></span>
								<h2><?= $post->title; ?></h2>
							</div>
						</a>
					<?php endforeach; ?>
				</div>
				<div class="col-md-4">

				<?php foreach($dataTwoPosts as $post) : ?>

					<a href="<?php echo base_url('posts/single/'.$post->id.''); ?>" class="h-entry mb-30 v-height gradient">

						<div class="featured-img" style="background-image: url('<?php echo base_url('public/assets/images/'.$post->image.''); ?>');"></div>

						<div class="text">
							<span class="date"><?= $post->created_at ?></span>
							<h2><?= $post->title ?></h2>
						</div>
					</a>
				<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>
	<!-- End retroy layout blog posts -->

	<!-- Start posts-entry -->
	<section class="section posts-entry">
		<div class="container">
			<div class="row mb-4">
				<div class="col-sm-6">
					<h2 class="posts-entry-title">Business</h2>
				</div>
				<div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
			</div>
			<div class="row g-3">
				<div class="col-md-9">
					<div class="row g-3">
					<?php foreach($businessTwoPosts as $post) : ?>

						<div class="col-md-6">
							<div class="blog-entry">
								<a href="<?php echo base_url('posts/single/'.$post->id.''); ?>" class="img-link">
									<img src="<?php echo base_url('public/assets/images/'.$post->image.''); ?>" alt="Image" class="img-fluid">
								</a>
								<span class="date"><?= $post->created_at; ?></span>
								<h2><a href="<?php echo base_url('posts/single/'.$post->id.''); ?>"><?= $post->title; ?></a></h2>
								<p><?= substr($post->body, 0, 50); ?></p>
								<p><a href="<?php echo base_url('posts/single/'.$post->id.''); ?>" class="btn btn-sm btn-outline-primary">Read More</a></p>
							</div>
						</div>
					<?php endforeach; ?>
						
					</div>
				</div>
				<div class="col-md-3">

					<ul class="list-unstyled blog-entry-sm">
					<?php foreach($businessThreePosts as $post) : ?>

						<li>
							<span class="date"><?= $post->created_at; ?></span>
							<h3><a href="single.html"><?= $post->title; ?></a></h3>
							<p>
							<?= substr($post->body, 0, 50); ?>
							</p>
							<p><a href="<?php echo base_url('posts/single/'.$post->id.''); ?>" class="read-more">Continue Reading</a></p>
						</li>
					<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!-- End posts-entry -->

	<!-- Start posts-entry -->
	<section class="section posts-entry posts-entry-sm bg-light">
		<div class="container">
			<div class="row">
			<?php foreach($dataFourPosts as $post) : ?>

				<div class="col-md-6 col-lg-3">
					<div class="blog-entry">
						<a href="single.html" class="img-link">
							<img src="<?php echo base_url('public/assets/images/'.$post->image.''); ?>" alt="Image" class="img-fluid">
						</a>
						<span class="date"><?= $post->created_at; ?></span>
						<h2><a href="single.html"><?= $post->title; ?></a></h2>
						<p><?= substr($post->body, 0, 30); ?></p>
						<p><a href="#" class="read-more">Continue Reading</a></p>
					</div>
				</div>
			<?php endforeach; ?>
			</div>
		</div>
	</section>
	<!-- End posts-entry -->

	<!-- Start posts-entry -->
	<section class="section posts-entry">
		<div class="container">
			<div class="row mb-4">
				<div class="col-sm-6">
					<h2 class="posts-entry-title">Culture</h2>
				</div>
				<div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
			</div>
			<div class="row g-3">
				<div class="col-md-9 order-md-2">
					<div class="row g-3">
						<?php foreach($cultureTwoPosts as $post) : ?>
							<div class="col-md-6">
								<div class="blog-entry">
									<a href="single.html" class="img-link">
										<img src="<?php echo base_url('public/assets/images/'.$post->image.''); ?>" alt="Image" class="img-fluid">
									</a>
									<span class="date"><?= $post->created_at; ?></span>
									<h2><a href="single.html"><?= $post->title; ?></a></h2>
									<p>
									<?= substr($post->body, 0, 30) ?>
									</p>
									<p><a href="single.html" class="btn btn-sm btn-outline-primary">Read More</a></p>
								</div>
							</div>
						<?php endforeach; ?>
						
					</div>
				</div>
				<div class="col-md-3">
					<ul class="list-unstyled blog-entry-sm">

					<?php foreach($cultureThreePosts as $post) : ?>

						<li>
							<span class="date"><?= $post->created_at; ?></span>
							<h3><a href="single.html"><?= $post->title; ?></a></h3>
							<p>
								<?= substr($post->body, 0, 30) ?>
							</p>
							<p><a href="#" class="read-more">Continue Reading</a></p>
						</li>
					<?php endforeach; ?>	
						
					</ul>
				</div>
			</div>
		</div>
	</section>

	<section class="section">
		<div class="container">

			<div class="row mb-4">
				<div class="col-sm-6">
					<h2 class="posts-entry-title">Politics</h2>
				</div>
				<div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
			</div>

			<div class="row">
				<?php foreach($politicsNinePosts as $post) : ?>
				<div class="col-lg-4 mb-4">
					<div class="post-entry-alt">
						<a href="single.html" class="img-link"><img src="<?php echo base_url('public/assets/images/'.$post->image.''); ?>" alt="Image" class="img-fluid"></a>
						<div class="excerpt">
							

							<h2><a href="single.html"><?= $post->title; ?></a></h2>
							<div class="post-meta align-items-center text-left clearfix">
								<figure class="author-figure mb-0 me-3 float-start"></figure>
								<span class="d-inline-block mt-1">By <a href="#"><?= $post->user_name; ?></a></span>
								<span>&nbsp;-&nbsp; <?= $post->created_at; ?></span>
							</div>

							<p>
							<?= substr($post->body, 0, 30) ?>

							</p>
							<p><a href="#" class="read-more">Continue Reading</a></p>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			
			</div>
			
		</div>
	</section>

	<div class="section bg-light">
		<div class="container">

			<div class="row mb-4">
				<div class="col-sm-6">
					<h2 class="posts-entry-title">Travel</h2>
				</div>
				<div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
			</div>

			<div class="row align-items-stretch retro-layout-alt">
				<?php foreach($travelOnePosts as $post) : ?>	
					<div class="col-md-5 order-md-2">
						<a href="single.html" class="hentry img-1 h-100 gradient">
							<div class="featured-img" style="background-image: url('<?php echo base_url('public/assets/images/'.$post->image.''); ?>" ></div>
							<div class="text">
								<span><?= $post->image; ?></span>
								<h2><?= $post->title; ?></h2>
							</div>
						</a>
					</div>
				<?php endforeach; ?>

				<div class="col-md-7">
					<?php foreach($travelOnePosts as $post) : ?>	

						<a href="single.html" class="hentry img-2 v-height mb30 gradient">
						<div class="featured-img" style="background-image: url('<?php echo base_url('public/assets/images/'.$post->image.''); ?>" ></div>
							<div class="text text-sm">
								<span><?= $post->created_at; ?></span>
								<h2><?= $post->title; ?></h2>
							</div>
						</a>

					<?php endforeach; ?>	

					<div class="two-col d-block d-md-flex justify-content-between">
					<?php foreach($travelTwoPosts as $post) : ?>	

						<a href="single.html" class="hentry v-height img-2 gradient">
						<div class="featured-img" style="background-image: url('<?php echo base_url('public/assets/images/'.$post->image.''); ?>" ></div>
							<div class="text text-sm">
								<span><?= $post->created_at; ?></span>
								<h2><?= $post->title; ?></h2>
							</div>
						</a>
					<?php endforeach; ?>
						
					</div>  

				</div>
			</div>

		</div>
	</div>

    <?php $this->endsection(); ?>