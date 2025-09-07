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
                $pres_number=$_GET['pres_number'];
                $pres_id = $_GET['pres_id'];
                $ret="SELECT  * FROM his_prescriptions WHERE pres_number = ? AND pres_id = ?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('ii',$pres_number,$pres_id);
               
                $stmt->execute() ;
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
                                                <li class="breadcrumb-item active">View Prescriptions</li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title">#<?php echo $row->pres_number;?></h4>
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
                                                        <img src="assets/images/users/patient.png" alt="" class="img-fluid mx-auto d-block rounded">
                                                    </div>
                            
                                                </div>
                                            </div>
                                            <div class="col-xl-7">
                                                <div class="pl-xl-3 mt-3 mt-xl-0">
                                                    <h2 class="mb-3">Name : <?php echo $row->pres_pat_name;?></h2>
                                                    <hr>
                                                    <h3 class="text-danger">Age : <?php echo $row->pres_pat_age;?> Years</h3>
                                                    <hr>
                                                    <h3 class="text-danger ">Patient Number : <?php echo $row->pres_pat_number;?></h3>
                                                    <hr>
                                                    <h3 class="text-danger ">Patient Category : <?php echo $row->pres_pat_type;?></h3>
                                                    <hr>
                                                    <h3 class="text-danger ">Patient Ailment : <?php echo $row->pres_pat_ailment;?></h3>
                                                    <hr>
                                                    <h2 class="align-centre">Prescription</h2>
                                                    <hr>
                                                    <p class="text-muted mb-4">
                                                        <?php echo $row->pres_ins;?>
                                                    </p>
                                                    <hr>
                                                  
                                                </div>
                                            </div> 
                                        </div>
                                      
                                    </div> 
                                </div> 
                            </div>
                            
                            
                        </div>

                    </div>

                   
                        <?php include('assets/inc/footer.php');?>
                   

                </div>
            <?php }?>

            


        </div>
        

        

       
        <div class="rightbar-overlay"></div>

        
        <script src="assets/js/vendor.min.js"></script>

       
        <script src="assets/js/app.min.js"></script>
        
    </body>

</html>