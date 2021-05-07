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
                                <div class="col-lg-6">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Add Admin Role</h6>
                                        </div>
                                        <div class="card-body">
                                    <div class="p-5">
                                        <div class="text-center">
                                        </div>
                                        <form class="user" id="addadminroleform" method="post">
                                            <div class="form-group">
                                                <input type="hidden" name="id" value="">
                                                <input type="text" name="role" class="form-control form-control-user" id="exampleInputRole"
                                                    placeholder="Admin Role">
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                Add Account
                                            </button>
                                        </form>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">

                                    <!-- DataTales Example -->
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">View Admin Role</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive" id="viewadminrole">
                                                <form id="alldeleterole" method="post">
                                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th><button type="submit" class="btn btn-danger">Delete</button></th>
                                                            <th>Name</th>
                                                            <th>Status</th>
                                                            <th>Edit</th>
                                                            <th>Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($alluserrole as $key => $value) {
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" name="delete[]" value="<?php echo $value->aroleid;?>" class="form-control col-4">
                                                            </td>
                                                            <td><?php echo $value->arolename;?></td>
                                                            <td>
                                                                <?php 
                                                                if($value->arolestatus == 0){
                                                                ?>
                                                                <button class="btn btn-danger" onclick="adminrolestatus(<?php echo $value->aroleid;?>,<?php echo $value->arolestatus;?>)">Deactive
                                                                </button>
                                                                <?php
                                                                }else{
                                                                ?>
                                                                <button class="btn btn-success" onclick="adminrolestatus(<?php echo $value->aroleid;?>,<?php echo $value->arolestatus;?>)">Active
                                                                </button>
                                                                <?php
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                            <button class="btn btn-primary btn-circle" onclick="showadminrole(<?php echo $value->aroleid;?>)">
                                                                    <i class="fa fa-edit"></i>
                                                            </button>
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-danger btn-circle" onclick="singleroledelete(<?php echo $value->aroleid;?>)">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        }   
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </form>
                                            </div>
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