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
                                        <form class="user" id="changepasswordform" method="post">
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputpassword" placeholder="New Password">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="repassword" class="form-control form-control-user"
                                                id="exampleInputrepassword" placeholder="Rechack Password">
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
                </div>
                <!-- /.container-fluid -->

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