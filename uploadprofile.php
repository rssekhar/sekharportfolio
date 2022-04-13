<?php
if(isset($_POST['submit']) && isset($_FILES['myprofile'])){
    require "dbconnect.php";
    // echo "File Uploaded";
    echo "<pre>";
    print_r($_FILES['myprofile']);
    echo "</pre>";
    
    $img_name = $_FILES['myprofile']['name'];
    $img_size = $_FILES['myprofile']['size'];
    $img_type = $_FILES['myprofile']['type'];
    $tmp_name = $_FILES['myprofile']['tmp_name'];
    $error = $_FILES['myprofile']['error'];
    
    if($error === 0){
        
        if($img_size > 125000){
            $em = "Sorry, Your file is too large";
            header("Location:portfolio.php?error=$em");
        }
        else{
            //echo "Not More than 1mb";
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            //echo($img_ex);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg","jpeg","png");
            
            
            if(in_array($img_ex_lc,$allowed_exs)){
                $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
                $img_upload_path = 'profile/'.$new_img_name;
                move_uploaded_file($tmp_name,$img_upload_path);
                $fullname = $_REQUEST['fullname'];
                $bio = $_REQUEST['bio'];
                   
                //insert into database
                $sql = "INSERT INTO portfolio(fullname,bio,image_url) VALUES('$fullname','$bio','$new_img_name')";
                mysqli_query($conn,$sql);
                header("Location:portfolio.php");
            }else{
                $em = "You can't upload this type of files";
                header("Location:portfolio.php?error=$em"); 
            }
        }

    }
    else{
        $em = "unknown error occured";
        header("Location:portfolio.php?error=$em");
    }
}else{
    header("Location:portfolio.php");
}
?>