<?php
session_start();
//the isset function to check username is already loged in and stored on the session
if(!isset($_SESSION['user_id'])){
header('location:../index.php');	
}
?>

<?php 
        
            if(isset($_POST['username'])){
            $fullname = $_POST["fullname"];    
            $username = $_POST["username"];
            $id = $_POST["id"];

            include 'dbcon.php';
            //code after connection is successfull
            //update query
            $qry = "update admin set name='$fullname', username='$username' where user_id='$id'";
            $result = mysqli_query($con,$qry); //query executes

            if(!$result){
                echo"ERROR!!";
            }else {

                header('Location:profile.php');

            }

            }else{
                echo"<h3>YOU ARE NOT AUTHORIZED TO REDIRECT THIS PAGE. GO BACK to <a href='index.php'> DASHBOARD </a></h3>";
            }
?>