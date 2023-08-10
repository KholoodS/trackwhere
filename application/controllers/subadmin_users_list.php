<!-- Include the header -->
<?php $this->load->view('header'); ?>

<!-- Begin Page Content -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Subadmin Users List</div>
                <div class="card-body">
                    <?php if (!empty($subadmin_users)) : ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <!-- Add more columns here based on your subadmin_users table -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($subadmin_users as $user) : ?>
                                    <tr>
                                        <td><?php echo $user->name; ?></td>
                                        <td><?php echo $user->email; ?></td>
                                        <!-- Add more columns here based on your subadmin_users table -->
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <p>No subadmin users found.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include the footer -->
<?php $this->load->view('footer'); ?>
