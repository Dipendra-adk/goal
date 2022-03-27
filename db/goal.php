<?php 
include('connect.php');
if (isset ($_POST['title'])){
    $goal =$_POST['title'];
    $description =$_POST['description'];
    $accomplish_date = $_POST['accomplish_date'];
    $status = $_POST['status'];
    session_start();
    $user_id = $_SESSION['user_id'];

            if($goal!=''){
             
            $query = "INSERT INTO goal(title,accomplish_date,description,status,user_id) VALUES('$goal','$accomplish_date','$description','$status','$user_id')";
            
                 if(mysqli_query($conn,$query)){
            $msg ="Successfully Inserted";
                }else{
            $msg = mysqli_error();
        }
        header('Location:../home.php?msg='.$msg);
             }else{
        $msg ="Goal name required";
        header('Location:../home.php>-?errmsg='.$msg);
        }
        }

?>