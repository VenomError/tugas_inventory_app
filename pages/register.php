<?php
set_layout('auth');
set_title('register admin');
onlyGuest();
?>
<div class="card-body p-0 bg-black auth-header-box rounded-top">
    <div class="text-center p-3">
        <a href="index.html" class="logo logo-admin">
            <img src="assets/images/logo-sm.png" height="50" alt="logo"
                class="auth-logo">
        </a>
        <h4 class="mt-3 mb-1 fw-semibold text-white fs-18">Create an account</h4>
        <p class="text-muted fw-medium mb-0">Enter your detail to Create your account today.</p>
    </div>
</div>
<div class="card-body pt-0">
    <form class="my-4" id="registerForm">
        <div class="form-group mb-2">
            <label class="form-label" for="full_name">Full Name</label>
            <input type="text" class="form-control" id="full_name" name="full_name"
                placeholder="Enter Full Name" required>
        </div><!--end form-group-->

        <div class="form-group mb-2">
            <label class="form-label" for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email"
                placeholder="Enter Email" required>
        </div><!--end form-group-->

        <div class="form-group">
            <label class="form-label" for="userpassword">Password</label>
            <input type="password" class="form-control" name="password"
                id="userpassword" placeholder="Enter password" required>
        </div><!--end form-group-->

        <div class="form-group mb-0 row">
            <div class="col-12">
                <div class="d-grid mt-3">
                    <button class="btn btn-primary" type="submit">Register <i
                            class="fas fa-sign-in-alt ms-1"></i></button>
                </div>
            </div><!--end col-->
        </div> <!--end form-group-->
    </form><!--end form-->
    <div class="text-center  mb-2">
        <p class="text-muted">Already have an account ? <a href="/login" class="text-primary ms-2">Login</a></p>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#registerForm').submit(function(event) {
            event.preventDefault();



            const name = $('#full_name').val().trim();
            const email = $('#email').val().trim();
            const password = $('#userpassword').val().trim();

            const formData = {
                name: name,
                email: email,
                password: password,
            };

            $.ajax({
                    url: '/request/registerRequest.php',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                })
                .done(function(res) {
                    if (res.status === 'success') {
                        toastr.success(res.message, 'Berhasil');
                        setTimeout(function() {
                            window.location.href = '/login';
                        }, 1000);
                    } else {
                        toastr.error(res.message, 'Gagal');
                    }
                })
                .fail(function(xhr, status, error) {
                    console.log(xhr.responseText); // Lihat respons lengkap di console
                    toastr.error('Terjadi kesalahan: ' + error, 'Error');
                });
        });
    });
</script>