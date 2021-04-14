<?php session_start(); ?>
<?php include "db.php";?>

<?php 

if(isset($_POST['login']))
{
$username=$_POST['username'];
$password=$_POST['password'];

$username=mysqli_real_escape_string($connection,$username);
$password=mysqli_real_escape_string($connection,$password);

$query = "SELECT * from user";

$select_user_query =  mysqli_query($connection,$query);

if(!$select_user_query)
{
die("QUERY FAILED!". mysqli_error($connection));
}

while($row=mysqli_fetch_array($select_user_query))
{
    $db_user_id=$row['user_id'];
    $db_username=$row['username'];
    $db_user_password=$row['password'];
}

if($username==$db_username && $password==$db_user_password)
{
    $_SESSION['username']=$db_username;
    header("Location:admin_index.php");
}
else
{
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

phpAlert("Incorrect Credentials!"); 
}
}

?>
<?php include "admin_header.php" ?>



<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div>
                <form method="post" action="admin_login.php" class="box">
                    <h1>Login</h1>
                    <p class="text-muted"> Please enter your login and password!</p> 
                    <input type="text" name="username" placeholder="Username" required> 
                    <input type="password" name="password" placeholder="Password" required>  
                    <button name="login" type="submit"> Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>