<?php
// session_start();
 if(!isset($_SESSION['login']) || !$_SESSION['login']==1){
   header('Location:login.php');
 }
 $id = $_SESSION['user_id']; 
 include('db/connect.php');
 $query = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn,$query);
$data = mysqli_fetch_assoc($result);

$goalQuery = "SELECT * FROM goal WHERE user_id='$id'";
$goalResult = mysqli_query($conn,$goalQuery);

?>
<!DOCTYPE html>
<html>
        <head>
            <title>Display goal</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        </head>
      <body>
            
            <?php include('db/connect.php');?>    
    
 <?php
          if(mysqli_num_rows($goalResult)==0){
            echo "<h3>No Goals found</h3>";
           }else{ ?>

           <table class="table">
             <thead>
               <th>Goal Title</th>
               <th>Action</th>
           </thead>
           <tbody>
             <?php while($row=mysqli_fetch_assoc($goalResult)) { ?>  
                <tr>
                 <td><?php echo $row['title']; ?> </td>
                 <td><a href="#" onclick="deleteConfirmation(<?php echo $row['id']; ?>);"><i class="fa-solid fa-trash" style="color:red;"></i></a> | <a href="edit-goal.php?id=<?php echo $row['id'];?>"><i class="fas fa-edit"></i></a></td>
                 </tr>       
           <!-- <tr>   
             <td><?php echo $row['title'];?></td>
            <td><?php echo $row['description'];?></td>
           <td><?php echo $row['accomplish_date'];?></td> 
             </tr> -->
           <?php } ?>
             </tbody>
             </table>
            
          <?php }
          ?>
      </div>
    </div>
  </div>
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/82f2c2ba8a.js" crossorigin="anonymous"></script>
<script src="js/bootbox.min.js"></script>

 
  
</script>
  </body>
</html>