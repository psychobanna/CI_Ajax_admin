<!DOCTYPE html>
<html lang="en">

<head>

    <?php $this->load->view("admin/inc/metatag");?>

    <title>Dashboard</title>

    <?php $this->load->view("admin/inc/link");?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php $this->load->view("admin/template/sidebar");?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

        <?php $this->load->view("admin/template/topbar");?>                

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
                    <div class="alert " id="alerts"></div>
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-10 mx-auto">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Edit Admin User</h6>
                                        </div>
                                    <div class="p-5">
                                        <form class="user" id="updateuserform" method="post">
                                            <div class="form-group image-field">
                                                <img id="showimg" class="dropzone" src="<?php echo $userdata->profile;?>" style="height:300px;width:300px"/><br>
                                                <span>Profile file size must be 300pixel X300pixel</span>
                                                <input type="file" name="profileimg" class="form-control form-control-user" id="exampleInputRole"
                                                    placeholder="First name" value="<?php echo $userdata->afname;?>" onchange="readURL(this)">
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" name="ids" value="<?php echo $userdata->aid;?>">
                                                <input type="text" name="fname" class="form-control form-control-user" id="exampleInputRole"
                                                    placeholder="First name" value="<?php echo $userdata->afname;?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="lname" class="form-control form-control-user" id="exampleInputRole"
                                                    placeholder="Last name" value="<?php echo $userdata->alname;?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="username" class="form-control form-control-user" id="exampleInputRole"
                                                    placeholder="Username name" value="<?php echo $userdata->ausername;?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="email" class="form-control form-control-user" id="exampleInputRole"
                                                    placeholder="Email" value="<?php echo $userdata->aemail;?>" readonly>
                                            </div>
                                            <div class="form-group"><?php
                                                        $table = 'adminrole';
                                                        $where = array('arolestatus' => 1);
                                                        $data= $this->query->get_single_row($table,$where);
                                                        // print_r($data);
                                                    ?>
                                                <select class="form-control form-control-user form-control-user-select" id="exampleInputRole" name="role" <?php  
                                                    if($this->session->admin->arole != '1'){
                                                        echo 'disabled';
                                                    }
                                                ?>>
                                                    <option value="0">Select a Role</option>
                                                    <?php
                                                    foreach ($data as $key => $value) {
                                                        # code...
                                                    ?>
                                                    <option value="<?php echo $value->aroleid;?>" <?php  
                                                    if($userdata->arole == $value->aroleid){
                                                        echo 'selected';
                                                    }
                                                ?>><?php echo $value->arolename;?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                Submit
                                            </button>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                                
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php $this->load->view("admin/inc/copyright");?>
            

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <?php $this->load->view("admin/template/logoutpopup");?>
    <?php $this->load->view("admin/inc/script");?>

</body>

</html>