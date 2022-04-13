<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
     <!-- Bootstrap 4 cdn links: -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Bootstrap 5 cdn links: -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Icon links: -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- FontAwesome icon link: -->
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <style>
        body{
            
            width:100%;
            height:auto;
        }
        #left{
            background-color:khaki;
            padding:10px;
            height:auto;
        }
        #about{
            display:flex;
            justify-content:left;
            align-items:center;
            min-height:100vh;
            flex-wrap:wrap;
            background-color:whitesmoke;
            padding:10px;
            
        }
        #scbtn{
            display:flex;
            justify-content:center;
            align-items:center;
            z-index:100;
            min-height:100vh;
            position:fixed;
           
        }
        #skills p{
          
            margin-bottom:0px;
            padding-bottom:20px;
        }
        .navbar-nav .nav-link {
            padding-right: 0;
            padding-left: 0;
            color: black;
        }
    </style>
</head>
<body>
    <div class="container">
       
        <div class="row" style="padding-top:70px;padding-bottom:70px;">
            <?php
                require "dbconnect.php";
                $sql = "SELECT * FROM portfolio";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result) > 0){
                    
                    while($profile = mysqli_fetch_assoc($result)){
                        
                        //echo("<script>alert('profile uploaded successfully');</script>");
                        $profile_id = $profile['id'];
                        $profile_img = $profile['image_url'];
                        $profile_name = $profile['fullname'];
                        $profile_bio = $profile['bio'];
                       
                    }
                
                }
                
                
            ?>
            <div class="col-12 col-sm-12 col-md-12 col-lg-4" id="left">
                <img src="./profile/<?php echo($profile_img);?>" alt="logo" style="width:100px;height:100px;border-radius:50%;margin:0px auto;display:block;">
                <h3 class="text-center text-uppercase"><?php echo($profile_name); ?></h3>
                <h6 class="text-center text-uppercase"><?php echo($profile_bio); ?></h6>
                <a href="editprofile.php?id=<?php echo($profile_id);?>" class="btn bg-danger text-white" type="button" data-toggle="modal" data-target="#profileform" style="margin:0px auto;display:block;border:1px solid black;width:50%;">Edit Profile</a>
                <!-- profile modal -->
                <div class="modal" id="profileform">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3>Edit Profile</h3>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                            </div>
                            <div class="modal-body">
                                <form method="post" action="uploadprofile.php" enctype="multipart/form-data">
                                    <b>* Required Fields</b><br />
                                    <div class="form-group">
                                        <label for="fullname" class="form-label">Full Name:</label><b>*</b><br />
                                        <input type="text" class="form-control" name="fullname" id="fullname" required />
                                    </div>
                                    <br />
                                    <div class="form-group">
                                        <label for="bio" class="form-label">Bio:</label><b>*</b><br />
                                        <input type="text" class="form-control" name="bio" id="bio" required />
                                    </div>
                                    <br />
                                    <div class="form-group">
                                        
                                        <label for="profile" class="form-label">Upload Image:</label><b>*</b><br />
                                        <input type="file" class="form-control" name="myprofile" id="myprofile" required />
                                    </div>
                                    <br />
                                    <input type="submit" class="btn btn-success" name="submit" value="Save">
                                    

                                </form>

                            </div>

                        </div>

                    </div>

                </div>
                <!--  -->
                <div>
                    <nav class="navbar justify-content-center">
                        <ul class="navbar-nav" style="text-align:center;text-transform:uppercase;">
                            
                            <li class="nav-item">
                                <a href="#about" class="nav-link">About</a>
                            </li>
                            <li class="nav-item">
                                <a href="#services" class="nav-link">Services</a>
                            </li>
                            <li class="nav-item">
                                <a href="#skills" class="nav-link">Skills</a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="#work" class="nav-link">Work</a>
                            </li>
                            <li class="nav-item">
                                <a href="#blog" class="nav-link">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="#contact" class="nav-link">Contact</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                <!-- profile intro -->
                <div class="row pb-2" id="about">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-8 pb-2">
                        <p class="display-4" style="font-weight:600;">I am<br>a Web Developer</p><br>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsa, molestias?<br> <a href="dashboard.php" class="text-decoration-none">Know More</a></p><br>
                        <a href="contact.php" class="btn text-decaration-none bg-danger text-white" style="border:0.5px solid black;">Hire Me</a>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                        <img src="intro.jpg" alt="intro" style="width:100%;height:100%;">
                    </div>
                </div>
                <!-- skills -->
                <div class="row pb-2 bg-dark text-white" id="skills">
                    <h3 class="text-center p-2">Recent Skills</h3>
                   
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div>
                                    <p>HTML</p>
                                    <div class="progress" style="height:20px;">
                                        <div class="progress-bar bg-success" style="width:80%;">
                                            80%
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div>
                                    <p>CSS</p>
                                    <div class="progress" style="height:20px;">
                                        <div class="progress-bar bg-success" style="width:80%;">
                                            80%
                                        </div>
                                    </div>  
                                </div>
                                <br>
                                <div>
                                    <p>JavaScript</p>
                                <div class="progress" style="height:20px;">
                                        <div class="progress-bar bg-success" style="width:70%;">
                                            70%
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div>
                                    <p>Bootstrap</p>
                                <div class="progress" style="height:20px;">
                                        <div class="progress-bar bg-success" style="width:80%;">
                                            80%
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div>
                                    <p>Jquery</p>
                                    <div class="progress" style="height:20px;">
                                        <div class="progress-bar bg-success" style="width:60%;">
                                            60%
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div>
                                    <p>Php</p>
                                    <div class="progress" style="height:20px;">
                                    <div class="progress-bar bg-success" style="width:60%;">
                                            60%
                                        </div>
                                    </div>  
                                </div>
                                <br>
                                <div>
                                    <p>MySQL</p>
                                    <div class="progress" style="height:20px;">
                                        <div class="progress-bar bg-success" style="width:60%;">
                                            60%
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div>
                                    <p>Perl</p>
                                    <div class="progress" style="height:20px;">
                                        <div class="progress-bar bg-success" style="width:50%;">
                                            50%
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div>
                                    <p>Blogging</p>
                                    <div class="progress" style="height:20px;">
                                        <div class="progress-bar bg-success" style="width:80%;">
                                            80%
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div>
                                    <p>Wordpress</p>
                                    <div class="progress" style="height:20px;">
                                        <div class="progress-bar bg-success" style="width:60%;">
                                            60%
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div>
                                    <p>Video Editing</p>
                                    <div class="progress" style="height:20px;">
                                        <div class="progress-bar bg-success" style="width:50%;">
                                            50%
                                        </div>
                                    </div>
                                </div>
                                <br> 
                                <div>
                                    <p>Photshop</p>
                                    <div class="progress" style="height:20px;">
                                        <div class="progress-bar bg-success" style="width:50%;">
                                            50%
                                        </div>
                                    </div>
                                </div>           
                        </div>
                    </div>
                    <!-- services -->
                    <div class="row pb-2 bg-info" id="services" style="color:black;">
                        <h3 class="text-center p-2">Services</h3>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-4 pb-2" style="margin-bottom:0px;">
                            <img src="freelancing.png" class="img-thumbnail"  alt="freelancing" style="width:200px;height:200px;border-radius:50%;display:block;margin:0px auto;padding:10px;">
                            <p class="text-center">Freelancing</p>   
                        
                        </div>

                        <div class="col-12 col-sm-12 col-md-12 col-lg-4 pb-2" style="margin-bottom:0px;">
                            <img src="reading.png" class="img-thumbnail" alt="learning" style="width:200px;height:200px;border-radius:50%;display:block;margin:0px auto;padding:10px;">
                            <p class="text-center">Teaching</p>  
                        
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-4 pb-2" style="margin-bottom:0px;">
                           <img src="money.jpg" class="img-thumbnail"  alt="money" style="width:200px;height:200px;border-radius:50%;display:block;margin:0px auto;padding:10px;">
                            <p class="text-center">Refer & Earn</p> 
                        
                        </div>
                        
                        
                    </div>
                    <!-- add new row here -->
            </div>
        </div>

    </div>
</body>
</html>
