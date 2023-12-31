<!-- subadmin_login.php -->
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center"> <a href="index.html" class="app-brand-link gap-2"> <span class="app-brand-logo demo"> <svg width="25" viewBox="0 0 25 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <defs>
                                        <path d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z" id="path-1"></path>
                                        <path d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z" id="path-3"></path>
                                        <path d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z" id="path-4"></path>
                                        <path d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z" id="path-5"></path>
                                    </defs>
                                    <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                                            <g id="Icon" transform="translate(27.000000, 15.000000)">
                                                <g id="Mask" transform="translate(0.000000, 8.000000)">
                                                    <mask id="mask-2" fill="white">
                                                        <use xlink:href="#path-1"></use>
                                                    </mask>
                                                    <use fill="#696cff" xlink:href="#path-1"></use>
                                                    <g id="Path-3" mask="url(#mask-2)">
                                                        <use fill="#696cff" xlink:href="#path-3"></use>
                                                        <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"> </use>
                                                    </g>
                                                    <g id="Path-4" mask="url(#mask-2)">
                                                        <use fill="#696cff" xlink:href="#path-4"></use>
                                                        <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"> </use>
                                                    </g>
                                                </g>
                                                <g id="Triangle" transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) ">
                                                    <use fill="#696cff" xlink:href="#path-5"></use>
                                                    <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"> </use>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg> </span> <span class="app-brand-text demo text-body fw-bolder">Trackwhere</span> </a> </div> <!-- /Logo -->

                    <h4 class="mb-2">Welcome to Trackwhere! 👋</h4>
                    <p class="mb-4">Please log-in to your account and start the adventure</p>


                    <?php echo validation_errors(); ?>

                    <form id="subadmin_loginForm"  method="post">
                    <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" required>
                <div class="invalid-feedback"></div>
                </div>


                    <div class="mb-3 mt-3">
                        <label for="select_admin">Select Admin</label>
                        <select class="form-control" name="select_admin" id="select_admin" disabled>
                            <option value="">Select an admin</option>
                        </select>
                    </div>

                    
                    <div class="form-group form-password-toggle">
                        <label for="password" class="form-label" id="disabled" >password</label>
                        <input type="text" class="form-control" id="password" name="password" placeholder="Enter your password" disabled />   
                    </div>


                    


                    <button type="submit" class="btn btn-primary mb-3 mt-3">Submit</button>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Include the necessary jQuery library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<!-- jQuery Validation plugin -->
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    // Function to populate the dropdown menu with admin data
    function populateDropdown(adminData) {
        var selectAdmin = $("#select_admin");
        selectAdmin.empty();
        selectAdmin.append('<option value="">Select an admin</option>');

        // Loop through the admin data and add options to the select element
        $.each(adminData, function(index, admin) {
            selectAdmin.append('<option value="' + admin.master_user_id + '">' + admin.username + '</option>'); 
        });

        // Enable the select element after populating the data
        selectAdmin.prop('disabled', false);
    }

    // Function to validate email
    function isEmail(email) {
        var regEx = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regEx.test(email);
    }

    // Form submission event
    $("form").submit(function(event) {
        event.preventDefault();
        var email = $('#email').val().trim();
        
        $(".error").remove();

        if(email === '') {
            $('#email').addClass('is-invalid');
            $('.invalid-feedback', $('#email').parent()).text('Please enter an email address.');
            return false;
        } else if (!isEmail(email)) {
            $('#email').addClass('is-invalid');
            $('.invalid-feedback', $('#email').parent()).text('Please enter a valid email address.');
            
            return false;
        } else {
            var form = $('#subadmin_loginForm')[0];
            const formData = new FormData(form);
            // Subadmin login AJAX call
            $.ajax({
                url: '<?php echo base_url() ?>Subadmin/subadmin_login',
                method: "POST",
                dataType: "JSON",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    if (response.status == "success") {
                        console.log(response);
                        alert("Subadmin login successful");
                        populateDropdown(response.data);
                    }else if(response.status=="successfully"){
                        window.location.href="<?php base_url();?>dashboard";
                    } else {
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

    $('#select_admin').change(function() {
        var selectedAdmin = $(this).val();
        if (selectedAdmin !== '') {
            $('#password').prop('disabled', false);
        } else {
            $('#password').prop('disabled', true);
        }
    });
});
</script>







