<!-- Include the header -->

<body>


    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Create New User</h1>

        <!-- User creation form here -->
        <?php echo validation_errors(); ?>

        <form id="createUserForm"  method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" name="username" id="username" required>
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" required>
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" id="password" required>
                <div class="invalid-feedback"></div>
            </div>

            <div class="form-group">
                <label for="role">Role:</label>
                <select class="form-control" name="role" id="role" required>
                    <option value="1">Admin</option>
                    <option value="2">Subadmin</option>
                </select>
            </div>

            <!-- Remove the onclick event from the submit button -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

<!-- Include the necessary jQuery library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<!-- jQuery Validation plugin -->
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<!--Script for new user creation -->
<script>
$(document).ready(function() {
    $("#createUserForm").submit(function(event) {
        event.preventDefault(); // Prevent the default form submission
        
        // Validate the form fields
        var username = $('#username').val().trim();
        var email = $('#email').val().trim();
        var password = $('#password').val().trim();
        var role = $('#role').val();
        
        $(".error").remove();
        
        
        if (username === '') {
            $('#username').addClass('is-invalid');
            $('.invalid-feedback', $('#username').parent()).text('Please enter a username.');
            return false;
        } else if (email === '') {
            $('#email').addClass('is-invalid');
            $('.invalid-feedback', $('#email').parent()).text('Please enter an email address.');
            return false;
        } else if (!isEmail(email)) {
            $('#email').addClass('is-invalid');
            $('.invalid-feedback', $('#email').parent()).text('Please enter a valid email address.');
            return false;
        } else if (password === '') {
            $('#password').addClass('is-invalid');
            $('.invalid-feedback', $('#password').parent()).text('Please enter a password.');
            return false;
        } else {
            // Retrieve the data from the form
            var username = $('#username').val().trim();
            var email = $('#email').val().trim();
            var password = $('#password').val().trim();
            var role = $('#role').val();

            // Send an AJAX POST request to the server
            
            $.ajax({
                url: '<?php echo base_url() ?>dashboard/newuser',
                // Get the form action URL
                method: "POST",
                dataType: "JSON",
                data: {
                    username: username,
                    email: email,
                    password: password,
                    role: role
                },
                success: function(response) {
                    // Success response

                    if(response.status == "success"){
                        console.log(response); 
                        alert("User created successfully!");
                        window.location.href = "<?php echo base_url('dashboard/userList'); ?>";
                    }else{
                        alert(response.message);
                    }
                },
                error: function() {
                    // Error response here
                    alert("Error occurred while creating the user!");
                }
            });

            

        }
    });
});

function isEmail(email) {
            var regEx = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regEx.test(email);
        }

</script>


</body>


