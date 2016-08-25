<div id="loader"> <i class="fa fa-cog fa-4x fa-spin"></i> </div>

<!-- ============ PAGE LOADER END ============ --> 

<!-- ============ NAVBAR START ============ -->
<link rel="shortcut icon" href="images/favicon.png">

    <!-- Main Stylesheet -->
    <link href="css/style.css" rel="stylesheet">


<!-- ============ NAVBAR END ============ --> 

<!-- ============ HEADER START ============ -->




<?php 
  
  $sql=mysql_query("select * from ".TBL_USER." where user_id='".$_SESSION['user_id']."' "); 
  $row= mysql_fetch_assoc($sql);
  $usertype=$row['type'];


        if ($usertype ==  2) { ?>

        <header>
            <div class="navbar navbar-default" style="margin-top:-10px; max-height: 60px;">
            <div class="navbar-header">
              <!-- <div class="navbar-header">
                <a class="navbar-brand" href="#">WebSiteName</a>
              </div> -->
                <div class="navbar-brand">
                    <div id="logo"><a href="index.php"><img src="images/logo_new.png" alt="ITS Recruitment" /></a></div>
                  </div>
            </div>      
              <ul class="nav navbar-nav pull-right" style="margin-right:80px;">
              
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="company.php">Our Process</a></li>
                 <?php 
                  

                if(isset($_SESSION['user_id'])){ 

                  echo "<li class='dropdown'><a class='dropdown-toggle' data-toggle='dropdown' style='text-transform:capitalize;'>".$_SESSION['name']." &nbsp; <span class='caret'></span></a>";
                  echo "<ul role='menu' class='dropdown-menu'>";

                   $result=mysql_query("SELECT count(*) as total from TBL_EMPLOYEE_DEL where user_id='".$_SESSION['user_id']."'");
                    $sql=mysql_fetch_assoc($result);

                      if ($sql['total'] > 0) {
                       
                        echo "<li><a href='view_profile.php'>View/Edit My Profile</a></li>";
                      }else{
                        echo "<li><a href='emp_type.php'>Upload Your Profile</a></li>";
                      }
                      echo "<li><a href='logout.php'>Logout</a></li>";
                     ?>
                    </ul></li>
                  <?php
                  

                }else{
                  echo "<li><a href='signup.php'>Sign Up</a></li>";
                  echo "<li><a href='signin.php'>Sign In</a></li>";
                  echo "<li><a href='signin-employer.php'>Employer Zone</a></li>";
                } ?>

              </ul>
            
          </div>
                
          </header>
    
  <?php }elseif($usertype == 3) { ?>
                    <header>
                        <div class="navbar navbar-default" style="margin-top:-10px; max-height: 60px;">
                        <div class="navbar-header">
                          <!-- <div class="navbar-header">
                            <a class="navbar-brand" href="#">WebSiteName</a>
                          </div> -->
                            <div class="navbar-brand">
                                <div id="logo"><a href="index.php"><img src="images/logo_new.png" alt="ITS Recruitment" /></a></div>
                              </div>
                        </div>      
                          <ul class="nav navbar-nav pull-right" style="margin-right:80px;">
                          
                            <li class="active"><a href="index.php">Home</a></li>
                            <li><a href="about.php">About Us</a></li>
                            <li><a href="company.php">Our Process</a></li>
                             <?php 
                              

                            if(isset($_SESSION['user_id'])){ 

                              echo "<li class='dropdown'><a class='dropdown-toggle' data-toggle='dropdown' style='text-transform:capitalize;'>".$_SESSION['name']." &nbsp; <span class='caret'></span></a>";
                              echo "<ul role='menu' class='dropdown-menu'>";

                               $result=mysql_query("SELECT count(*) as total from TBL_COMPANY where user_id='".$_SESSION['user_id']."'");
                                $sql=mysql_fetch_assoc($result);

                                  if ($sql['total'] > 0) {
                                   
                                    echo "<li><a href=''>View/Edit My Profile</a></li>";
                                  }else{
                                    echo "<li><a href='emp_type.php'>Upload Your Profile</a></li>";
                                  }
                                  echo "<li><a href='postjob.php'>Add Jobs</a></li>";
                                  echo "<li><a href='logout.php'>Logout</a></li>";
                                 ?>
                                </ul></li>
                              <?php
                              

                            }else{
                              echo "<li><a href='signup-employer.php'>Sign Up</a></li>";
                              echo "<li><a href='signin-employer.php'>Sign In</a></li>";
                            } ?>

                          </ul>
                        
                      </div>
                            
                      </header>
  <?php   }else{  ?>

        <header>
            <div class="navbar navbar-default" style="margin-top:-10px; max-height: 60px;">
            <div class="navbar-header">
              <!-- <div class="navbar-header">
                <a class="navbar-brand" href="#">WebSiteName</a>
              </div> -->
                <div class="navbar-brand">
                    <div id="logo"><a href="index.php"><img src="images/logo_new.png" alt="ITS Recruitment" /></a></div>
                  </div>
            </div>      
              <ul class="nav navbar-nav pull-right" style="margin-right:80px;">
              
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="company.php">Our Process</a></li>
                 <?php 
                  

                if(isset($_SESSION['user_id'])){ 

                  echo "<li class='dropdown'><a class='dropdown-toggle' data-toggle='dropdown' style='text-transform:capitalize;'>".$_SESSION['name']." &nbsp; <span class='caret'></span></a>";
                  echo "<ul role='menu' class='dropdown-menu'>";

                   $result=mysql_query("SELECT count(*) as total from TBL_EMPLOYEE_DEL where user_id='".$_SESSION['user_id']."'");
                    $sql=mysql_fetch_assoc($result);

                      if ($sql['total'] > 0) {
                       
                        echo "<li><a href='view_profile.php'>View/Edit My Profile</a></li>";
                      }else{
                        echo "<li><a href='emp_type.php'>Upload Your Profile</a></li>";
                      }
                      echo "<li><a href='logout.php'>Logout</a></li>";
                     ?>
                    </ul></li>
                  <?php
                  

                }else{
                  echo "<li><a href='signup.php'>Sign Up</a></li>";
                  echo "<li><a href='signin.php'>Sign In</a></li>";
                  echo "<li><a href='signin-employer.php'>Employer Zone</a></li>";
                } ?>

              </ul>
            
          </div>
                
          </header>



    <?php    }


          
?>




