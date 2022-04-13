<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
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
<body>
    
<?php
include "dbconnect.php";
if(isset($_GET['id'])){
    $id=$_GET['id'];
    //echo($_GET['id']);
    //echo("connected");
    $sql = "SELECT * FROM portfolio WHERE id=$id";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
          //echo("<br>id is:".$row['id']."<br>and name is".$row['name']);
        
          $fullname = $row['fullname'];
          $bio = $row['bio'];
          $image_url = $row['image_url'];
          
          ?>
          <!-- ----------update form -->
        <?php include "menu.php"?>
            <div style="padding-top:70px;padding-bottom:70px;">
            <h3 class="text-center">Update Profile</h3>
            
          <form method="post" id="uform" style="width:360px;height:100%;margin:0px auto;padding:10px;border:1px solid black;border-radius:10px;">
                   <b>* Required Fields</b><br />
                                    <div class="form-group">
                                        <label for="fullname" class="form-label">Full Name:</label><b>*</b><br />
                                        <input type="text" class="form-control" name="fullname" id="fullname" required value="<?php echo($fullname) ?>"/>
                                    </div>
                                    <br />
                                    <div class="form-group">
                                        <label for="bio" class="form-label">Bio:</label><b>*</b><br />
                                        <input type="text" class="form-control" name="bio" id="bio" required value="<?php echo($bio) ?>"/>
                                    </div>
                                    <br />
                                    <div class="form-group">
                                        
                                        <label for="profile" class="form-label">Upload Image:</label><b>*</b><br />
                                        <input type="file" class="form-control" name="myprofile" id="myprofile" required />
                                    </div>
                                    <br />
                                    <input type="submit" class="btn btn-success" name="update" value="Update">
                                    
                </form>
                </div>
        <?php include "footer.php"?>
          <!-- //---------------- -->
          <?php
        }
        //echo($sql);
        //echo("id data fetched");
    }
    else{
        echo("error in sql");
    }

}
else{
    echo("not connected");
}
if(isset($_POST['update'])){
    $id=$_GET['id'];
    $fullname = $_POST['fullname'];
    $bio = $_POST['bio'];
    $image_url = $_POST['myprofile'];
    // $job = $_POST['job']; 
    echo("you update id is<h4> $id </h4>");
    $img_ex = pathinfo($image_url,PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
        $allowed_exs = array("jpg","jpeg","png");
        if(in_array($img_ex_lc,$allowed_exs)){
            $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
            $img_upload_path = "profile/".$new_img_name;
            $image_url = $new_img_name;
        }
    //$sql = "INSERT INTO portfolio(fullname,bio,image_url) VALUES('$fullname','$bio','$new_img_name')";
 
    $sql = "UPDATE portfolio SET fullname='$fullname',bio='$bio',image_url='$image_url' WHERE id='$id'";
    $result = mysqli_query($conn,$sql);
    if($result == 1){
        
        echo("<script>alert('Update Successfully');alert('Check Your Portfolio Page.');</script>");
    }
    else{
        echo("erro in sql update syntax");
    }
}
else{
    echo("<br>error in update and not connected");
}

$conn->close();
?>
</body>
</html>
