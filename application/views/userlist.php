<?php $this->load->view('dashboard/header'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> Users List</h1>

    <!-- Button to access the "Create New User" page -->
    <a href="<?php echo base_url('dashboard/create_user'); ?>" class="btn btn-primary mb-3">Create New User</a>

    <!-- Subadmins table -->
    <h3>Subadmin Users</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Role: 1-Admin 2-Subadmin</th>
                <th>Created By Admin</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($subadmins as $subadmin): ?>
                <tr>
                    <td><?php echo $subadmin->username; ?></td>
                    <td><?php echo $subadmin->email; ?></td>
                    <td><?php echo $subadmin->usertype; ?></td>
                    <td>
                        <?php
                        // Find the associated admin's username
                        $associated_admin = $this->db->get_where('users', array('id' => $subadmin->master_user_id))->row();
                        if ($associated_admin) {
                            echo $associated_admin->username;
                        } else {
                            echo 'No admin';
                        }
                        ?>
                    </td> 
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Include the necessary jQuery library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<!-- jQuery Validation plugin -->
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>


    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<!-- footer -->
<?php $this->load->view('dashboard/footer'); ?>



