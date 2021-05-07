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
                                <div class="col-lg-12">

                                    <!-- DataTales Example -->
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">View Admin Users</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive" id="viewadminrole">
                                                <form id="alldeleteuser" method="post">
                                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th><button type="submit" class="btn btn-danger">Delete</button></th>
                                                            <th>Profile</th>
                                                            <th>First name</th>
                                                            <th>Last name</th>
                                                            <th>Username</th>
                                                            <th>Email</th>
                                                            <th>IP Address</th>
                                                            <th>Role</th>
                                                            <th>Status</th>
                                                            <th>Edit</th>
                                                            <th>Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($alluser as $key => $value) {
                                                            if($this->session->admin->aid == $value->aid){
                                                                continue;
                                                            }
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" name="delete[]" value="<?php echo $value->aid;?>" class="form-control col-4">
                                                            </td>
                                                            <td><img src="<?php 
                                                            if($value->profile!=""){
                                                                echo $value->profile;
                                                            }else{
                                                                echo base_url("assets-admin/img/undraw_profile.png");
                                                            }
                                                                ?>" height="100" width="100"></td>
                                                            <td><?php echo $value->afname;?></td>
                                                            <td><?php echo $value->alname;?></td>
                                                            <td><?php echo $value->ausername;?></td>
                                                            <td><?php echo $value->aemail;?></td>
                                                            <td><?php echo $value->aip;?></td>
                                                            <td>
                                                                <?php 
                                                                    $where = array('aroleid' => $value->arole);
                                                                    $table = 'adminrole';
                                                                    $data = $this->query->get_single_row($table,$where)[0];
                                                                    echo $data->arolename;
                                                                ?>           
                                                            </td>
                                                            <td>
                                                                <?php 
                                                                if($value->astatus == 0){
                                                                ?>
                                                                <button class="btn btn-danger" onclick="adminstatus(<?php echo $value->aid;?>,<?php echo $value->astatus;?>)">Deactive
                                                                </button>
                                                                <?php
                                                                }else{
                                                                ?>
                                                                <button class="btn btn-success" onclick="adminstatus(<?php echo $value->aid;?>,<?php echo $value->astatus;?>)">Active
                                                                </button>
                                                                <?php
                                                                }
                                                                ?>  
                                                            </td>
                                                            <td>
                                                            <a href="<?php echo base_url('panel/').'edituser/'.$value->aid;?>" class="btn btn-primary btn-circle">
                                                                    <i class="fa fa-edit"></i>
                                                            </a>
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-danger btn-circle" onclick="singleroledelete(<?php echo $value->aid;?>)">
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