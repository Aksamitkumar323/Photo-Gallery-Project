<?php session_start(); ?>

<?php include "admin_header.php" ?>
<?php include "db.php";?>
<?php include "navigation.php" ?>

<?php 
if(!isset($_SESSION['username']))
{
    header("Location:admin_login.php"); 
}
?>

<?php 
if (isset($_POST['upload_image']))
  {
    $filetmp = $_FILES['file_img']['tmp_name'];
    $fileimage = $_FILES['file_img']['name'];
    $filetitle = $_POST['img_title'];


    
    move_uploaded_file($filetmp, "img/$fileimage");
    
    $query ="INSERT INTO tbl_photos(img_name, img_title) VALUES('{$fileimage}', '{$filetitle}')";
    $upload_image_query = mysqli_query($connection, $query); 
    if(!$upload_image_query)
    {
    echo $fileimage;
    echo $filetitle;
    die("QUERY FAILED!". mysqli_error($connection));
    }
    
  }



?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div>
                <form method="post" action="admin_index.php" enctype="multipart/form-data">
                    <h1>Upload Image</h1>
                    <div class="photo-field">
                    <input type="file" name="file_img" required>
                    </div>
                    <div class="photo-field">
                    <input type="text" name="img_title" placeholder="Image Title" required> 
                    </div> 
                    <button name="upload_image" type="submit"> Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container" style="padding-top: 5%">
    <center><h2><a href="logout.php">Logout</a></h2></center>
</div>

</body>
</html>