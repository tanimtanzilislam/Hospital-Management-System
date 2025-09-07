
<?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['add_pharmaceutical_category']))
		{
			$pharm_cat_name = $_POST['pharm_cat_name'];
			$pharm_cat_vendor = $_POST['pharm_cat_vendor'];
			$pharm_cat_desc=$_POST['pharm_cat_desc'];
            
            
   
			$query="INSERT INTO his_pharmaceuticals_categories (pharm_cat_name, pharm_cat_vendor, pharm_cat_desc) VALUES (?,?,?)";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('sss', $pharm_cat_name, $pharm_cat_vendor, $pharm_cat_desc);
			$stmt->execute();
	
			if($stmt)
			{
				$success = "Pharmaceutical Category Added";
			}
			else {
				$err = "Please Try Again Or Try Later";
			}
			
			
		}
?>

<!DOCTYPE html>
<html lang="en">
    
 
    <?php include('assets/inc/head.php');?>
    <body>

  
        <div id="wrapper">

        
            <?php include("assets/inc/nav.php");?>
            
            <?php include("assets/inc/sidebar.php");?>
           

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
                                            <li class="breadcrumb-item active">Add Pharmaceutical Category</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Create A Pharmaceutical Category</h4>
                                </div>
                            </div>
                        </div>     
                       
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Fill all fields</h4>
                                        
                                        <form method="post">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Pharmaceutical Category Name</label>
                                                    <input type="text" required="required" name="pharm_cat_name" class="form-control" id="inputEmail4" >
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="inputState" class="col-form-label">Pharmaceutical Vendor</label>
                                                    <select id="inputState" required="required" name="pharm_cat_vendor" class="form-control">
                                                    <?php
                                                    
                                                        $ret="SELECT * FROM  his_vendor ORDER BY RAND() "; 
                                                      
                                                        $stmt= $mysqli->prepare($ret) ;
                                                        $stmt->execute() ;//ok
                                                        $res=$stmt->get_result();
                                                        $cnt=1;
                                                        while($row=$res->fetch_object())
                                                        {
                                                            
                                                    ?>
                                                        <option><?php echo $row->v_name;?></option>

                                                    <?php }?>   
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <label for="inputAddress" class="col-form-label">Pharmaceutical Category Description</label>
                                                <textarea required="required" type="text" class="form-control" name="pharm_cat_desc" id="editor"></textarea>
                                            </div>

                                           <button type="submit" name="add_pharmaceutical_category" class="ladda-button btn btn-success" data-style="expand-right">Add Category</button>

                                        </form>
                                     
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <?php include('assets/inc/footer.php');?>
                <!-- end Footer -->

            </div>

           

        </div>
        <!-- END wrapper -->
        <!--Load CK EDITOR Javascript-->
        <script src="//cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script>
        <script type="text/javascript">
        CKEDITOR.replace('editor')
        </script>
       
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js-->
        <script src="assets/js/app.min.js"></script>

        <!-- Loading buttons js -->
        <script src="assets/libs/ladda/spin.js"></script>
        <script src="assets/libs/ladda/ladda.js"></script>

        <!-- Buttons init js-->
        <script src="assets/js/pages/loading-btn.init.js"></script>
        
    </body>

</html>