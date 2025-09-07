<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['ad_id'];
?>
<!DOCTYPE html>
<html lang="en">
    
<?php include ('assets/inc/head.php');?>

    <body>

      
        <div id="wrapper">

          
            <?php include('assets/inc/nav.php');?>
            
                <?php include("assets/inc/sidebar.php");?>
            
            <?php
                $eqp_code=$_GET['eqp_code'];
                $ret="SELECT  * FROM his_equipments WHERE eqp_code = ?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('i',$eqp_code);
                $stmt->execute() ;//ok
                $res=$stmt->get_result();
                
                while($row=$res->fetch_object())
                {
            ?>

                <div class="content-page">
                    <div class="content">

                        
                        <div class="container-fluid">
                            
                            
                            <div class="row">
                                <div class="col-12">
                                    <div class="page-title-box">
                                        <div class="page-title-right">
                                            <ol class="breadcrumb m-0">
                                                <li class="breadcrumb-item"><a href="his_admin_dashboard.php">Dashboard</a></li>
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Inventory</a></li>
                                                <li class="breadcrumb-item active">Equipments | Assets</li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title">Equipment #<?php echo $row->eqp_code;?> Details</h4>
                                    </div>
                                </div>
                            </div>     
                            

                            <div class="row">
                                <div class="col-12">
                                    <div class="card-box">
                                        <div class="row">
                                            <div class="col-xl-5">

                                                <div class="tab-content pt-0">

                                                    <div class="tab-pane active show" id="product-1-item">
                                                        <img src="assets/images/hosp_asset.jpg" alt="" class="img-fluid mx-auto d-block rounded">
                                                    </div>
                            
                                                </div>
                                            </div> 
                                            <div class="col-xl-7">
                                                <div class="pl-xl-3 mt-3 mt-xl-0">
                                                    <h2 class="mb-3">Equipment Name : <?php echo $row->eqp_name;?></h2>
                                                    <hr>
                                                    <h4 class="text-danger">Equipment Vendor: <?php echo $row->eqp_vendor;?></h4>
                                                    <hr>
                                                    <h4 class="text-danger">Equipment Barcode: <?php echo $row->eqp_code;?></h4>
                                                    <hr>
                                                    <h4 class="text-danger">Equipment(s) Available : <?php echo $row->eqp_qty;?></h4>
                                                    <hr>
                                                    <h4 class="text-danger">Equipment Status : <?php echo $row->eqp_status;?></h4>
                                                    <hr>
                                                    <h4 class="text-danger">Equipment Description</h4>
                                                    <p class="text-muted mb-4">
                                                        <?php echo $row->eqp_desc;?>
                                                    </p>
                                                  
                                                    <div>
                                                        <button type="button" class="btn btn-danger mr-2"><i class="mdi mdi-heart-outline"></i></button>
                                                        <button type="button" class="btn btn-success waves-effect waves-light">
                                                            <span class="btn-label"><i class="mdi mdi-cart"></i></span>Add to cart
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       

                                      
                                    </div> 
                                </div> 
                            </div>
                          
                            
                        </div> <!-- container -->

                    </div> <!-- content -->

                    <!-- Footer Start -->
                        <?php include('assets/inc/footer.php');?>
                    <!-- end Footer -->

                </div>
            <?php }?>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
    </body>

</html>