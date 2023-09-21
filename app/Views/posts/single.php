<?php $this->extend('layouts/app.php'); ?>

<?php $this->section('content'); ?>

<div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('<?= base_url('public/assets/images/'.$data['image'].''); ?>');">
    <div class="container">
      <div class="row same-height justify-content-center">
        <div class="col-md-6">
          <div class="post-entry text-center">
            <h1 class="mb-4"><?= $data['title']; ?></h1>
            <div class="post-meta align-items-center text-center">
              <figure class="author-figure mb-0 me-3 d-inline-block"></figure>
              <span class="d-inline-block mt-1">By  <?= $data['user_name']; ?></span>
              <span>&nbsp;-&nbsp; <?= $data['created_at']; ?></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="section">
    <div class="container">

        <?php if(session()->getFlashdata('update')) : ?>
							<p class="alert alert-success"><?php echo session()->getFlashdata('update'); ?></p>
				<?php endif; ?>

      <div class="row blog-entries element-animate">

        <div class="col-md-12 col-lg-8 main-content">

          <div class="post-content-body">
            <p>
            <?= $data['body']; ?>
            </p>
          
          </div>
          <?php if(isset(auth()->user()->id)) : ?>
            <?php if($data['user_id'] == auth()->user()->id) : ?>

              <a class="btn btn-danger" href="<?php echo url_to('delete.post', $data['id']); ?>">delete</a>
              <a class="btn btn-warning text-white" href="<?php echo url_to('edit.post', $data['id']); ?>" style="    margin-left: 532px;">update</a>

            <?php endif; ?>
          <?php endif; ?>
          
          
          <div class="pt-5">
            <p>Categories:  <a href="#"><?= $data['category']; ?></a></p>
          </div>



          <div class="pt-5 comment-wrap">
            <h3 class="mb-5 heading"><?= $numComments; ?> Comments</h3>
            <ul class="comment-list">
              <?php if($comments) : ?>
                <?php foreach($comments as $comment) : ?>
                  <li class="comment">
                    <!-- <div class="vcard">
                      <img src="images/person_1.jpg" alt="Image placeholder">
                    </div> -->
                    <div class="comment-body">
                      <h3><?= $comment->user_name; ?></h3>
                      <div class="meta"><?= $comment->created_at; ?></div>
                      <p>
                      <?= $comment->comment; ?>
                      </p>
                      <!-- <p><a href="#" class="reply rounded">Reply</a></p> -->
                    </div>
                  </li>
                <?php endforeach; ?>
              <?php else : ?>
                <p class="alert alert-success">No comments for this post just yet</p>
              <?php endif; ?>    

              
            </ul>
            <!-- END comment-list -->

            

            <div class="comment-form-wrap pt-5">
              <?php if(session()->getFlashdata('create')) : ?>
                <p class="alert alert-success"><?php echo session()->getFlashdata('create'); ?></p>
              <?php endif; ?>
              <h3 class="mb-5">Leave a comment</h3>
              <?php if(isset(auth()->user()->id)) : ?>
                <form action="<?php echo base_url('posts/store-comment/'.$data['id'].''); ?>" method="POST" class="p-5 bg-light">
                  

                  <div class="form-group">
                    <label for="message">Comment</label>
                    <textarea name="comment" id="message" cols="30" rows="10" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Post Comment" class="btn btn-primary">
                  </div>

                </form>
              <?php else : ?>
                  <p class="alert alert-success">login to post comments</p>
              <?php endif; ?>

            </div>
          </div>

        </div>

        <!-- END main-content -->

        <div class="col-md-12 col-lg-4 sidebar">
        
          <!-- END sidebar-box -->
          <!-- <div class="sidebar-box">
            <div class="bio text-center">
              <img src="images/person_2.jpg" alt="Image Placeholder" class="img-fluid mb-3">
              <div class="bio-body">
                <h2>Hannah Anderson</h2>
                <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem facilis sunt repellendus excepturi beatae porro debitis voluptate nulla quo veniam fuga sit molestias minus.</p>
                <p><a href="#" class="btn btn-primary btn-sm rounded px-2 py-2">Read my bio</a></p>
                <p class="social">
                  <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                  <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                  <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                  <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                </p>
              </div>
            </div>
          </div> -->
          <!-- END sidebar-box -->  
          <div class="sidebar-box">
            <h3 class="heading">Popular Posts</h3>
            <div class="post-entry-sidebar">
              <ul>
              <?php foreach($popPosts as $post) : ?>
								<li>
									<a href="">
										<img src="<?php echo base_url('public/assets/images/'.$post->image.''); ?>" alt="Image placeholder" class="me-4 rounded">
										<div class="text">
											<h4><?= $post->title; ?></h4>
											<div class="post-meta">
												<span class="mr-2"><?= $post->created_at; ?> </span>
											</div>
										</div>
									</a>
								</li>
                <?php endforeach; ?>
               
              </ul>
            </div>
          </div>
          <!-- END sidebar-box -->

          <div class="sidebar-box">
            <h3 class="heading">Categories</h3>
                <ul class="categories">
                                <?php foreach($categories as $category) : ?>
                                    <li><a href="<?php echo base_url('posts/category/'.$category->name.''); ?>"><?= $category->name; ?> <span>(<?= $category->count_posts; ?>)</span></a></li>
                                <?php endforeach; ?>
                </ul>
          </div>
          <!-- END sidebar-box -->

         
        </div>
        <!-- END sidebar -->

      </div>
    </div>
  </section>


  <!-- Start posts-entry -->
  <section class="section posts-entry posts-entry-sm bg-light">
    <div class="container">
      <div class="row mb-4">
        <div class="col-12 text-uppercase text-black">More Blog Posts</div>
      </div>
      <div class="row">
        <?php foreach($moreBlogPosts as $post) : ?>
          <div class="col-md-6 col-lg-3">
            <div class="blog-entry">
              <a href="<?php echo base_url('posts/single/'.$post->id.''); ?>" class="img-link">
                <img src="<?php echo base_url('public/assets/images/'.$post->image.''); ?>" alt="Image" class="img-fluid">
              </a>
              <span class="date"><?= $post->created_at ?></span>
              <h2><a href="single.html"><?= $post->title ?></a></h2>
              <p><?= substr($post->body, 0, 30); ?></p>
              <p><a href="<?php echo base_url('posts/single/'.$post->id.''); ?>" class="read-more">Continue Reading</a></p>
            </div>
          </div>
        <?php endforeach; ?>
        
      </div>
    </div>
  </section>
<?php $this->endsection(); ?>