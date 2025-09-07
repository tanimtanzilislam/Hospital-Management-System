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
                $pharm_cat_id=$_GET['pharm_cat_id'];
                $ret="SELECT  * FROM his_pharmaceuticals_categories WHERE pharm_cat_id = ?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('i',$pharm_cat_id);
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
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pharmaceuticals</a></li>
                                                <li class="breadcrumb-item active">View Pharmaceuticals Categories</li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title"></h4>
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
                                                        <img src="assets/images/pharm.webp" alt="" class="img-fluid mx-auto d-block rounded">
                                                    </div>
                            
                                                </div>
                                            </div>
                                            <div class="col-xl-7">
                                                <div class="pl-xl-3 mt-3 mt-xl-0">
                                                    <h2 class="mb-3">Pharmaceutical Name: <?php echo $row->pharm_cat_name;?></h2>
                                                    <hr>
                                                    <h6 class="text-danger">Phrmaceutical Vendor<?php echo $row->pharm_cat_vendor;?></h6>
                                                    <hr>
                                                    <p class="text-muted mb-4">
                                                        <?php echo $row->pharm_cat_desc;?>
                                                    </p>
                                                  
                                                        <label class="my-1 mr-2" for="sizeinput">Size</label>
                                                        <select class="custom-select my-1 mr-sm-3" id="sizeinput">
                                                            <option selected>Small</option>
                                                            <option value="1">Medium</option>
                                                            <option value="2">Large</option>
                                                            <option value="3">X-large</option>
                                                        </select>
                                                    </form>

                                                    <div>
                                                        <button type="button" class="btn btn-danger mr-2"><i class="mdi mdi-heart-outline"></i></button>
                                                        <button type="button" class="btn btn-success waves-effect waves-light">
                                                            <span class="btn-label"><i class="mdi mdi-cart"></i></span>Add to cart
                                                        </button>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                       

                                      

                                    </div>
                                </div>
                            </div>
                            
                            
                        </div> 

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