<?php $this->extend('layouts/admin.php'); ?>

<?php $this->section('content'); ?>


<div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
                <?php if(session()->getFlashdata('create')) : ?>
							<p class="alert alert-success"><?php echo session()->getFlashdata('create'); ?></p>
				<?php endif; ?>
              <h5 class="card-title mb-4 d-inline">Admins</h5>
             <a  href="<?php echo url_to('admins.create'); ?>" class="btn btn-primary mb-4 text-center float-right">Create Admins</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                  </tr>
                </thead>
                <tbody>
                    <?php foreach ($allAdmins as $admin) : ?>
                        <tr>
                            <th scope="row"><?= $admin->id; ?></th>
                            <td><?= $admin->name; ?></td>
                            <td><?= $admin->email; ?></td>
                        
                        </tr>
                  <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>

<?php $this->endsection(); ?>