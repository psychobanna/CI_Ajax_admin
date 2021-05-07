<!DOCTYPE html>
<html lang="en">

<head>
 
    <?php $this->load->view("admin/inc/metatag");?>

    <title>Login</title>

    <?php $this->load->view("admin/inc/link");?>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image" style="background-image: url(<?php echo base_url('assets-admin/');?>upload/login-img.jpeg);"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                        <div class="alert <?php if(!empty($this->input->cookie('alert'))){ echo 'alert-'.$this->input->cookie('alert');}?>" id="alerts"><?php if(!empty($this->input->cookie("message"))){echo $this->input->cookie("message");}?></div>
                                    </div>
                                    <form class="user" id="loginform" method="post">
                                        <div class="form-group">
                                            <input type="text" name="username" value="<?php if(!empty($this->input->cookie('username'))){ echo $this->input->cookie('username');}else{'';}?>" class="form-control form-control-user"
                                                id="exampleInputUname" aria-describedby="userHelp"
                                                placeholder="Enter Username...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" value="<?php if(!empty($this->input->cookie('password'))){ echo $this->input->cookie('password');}else{'';}?>" class="form-control form-control-user pwd"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary reveal" type="button">Show Password</button>
                                        </span> 
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" name="rem-me" value="1" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <!-- <hr>
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a> -->
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo base_url();?>panel/forgotpassword">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo base_url();?>panel/register">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <?php $this->load->view("admin/inc/script");?>
    <script type="text/javascript">
        $(".reveal").on('click',function() {
            var $pwd = $(".pwd");
            if ($pwd.attr('type') === 'password') {
                $pwd.attr('type', 'text');
            } else {
                $pwd.attr('type', 'password');
            }
        });
    </script>

</body>

</html>