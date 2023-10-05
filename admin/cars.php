<?php
  // Check login
  include_once("includes/logged.php");

  include_once("includes/conn.php");
  try{
    $data = "SELECT * FROM `cars`";
    $result = $conn->prepare($data);
    $result->execute();

  }catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Table V01</title>
    <link rel="stylesheet" href="cars.css">
</head>
<body>
    <body>
        <div id="wrapper">
         <h1>Cars List</h1>
         
         <table id="keywords" cellspacing="0" cellpadding="0">
           <thead>
             <tr>
               <th><span>Car Title</span></th>
               <th><span>Price</span></th>
               <th><span>Model</span></th>
               <th><span>Delete</span></th>
               <th><span>Update</span></th>
             </tr>
           </thead>
           <tbody>
           <?php
              foreach($result->fetchAll() as $row){
                $title = $row["Title"];
                $price = $row["Price"];
                $model = $row["Model"];
                $id = $row["id"];
              ?>

             <tr>
               <td class="lalign"><?php echo $title;?></td>
               <td> <?php echo $price; ?> </td>
               <td><?php echo $model; ?></td>
               <td><a href="delete.php?id=<?php echo $id ?>" onclick="return confirm('Are you sure you want to delete?')"><img src="../img/delete.jpg" alt=""></a></a>
               <td><a href="UpdateCar.php?id=<?php echo $id ?>" ><img src="../img/update.jpg" alt=""></a></td>
             </tr>
             <?php
              }
              ?>
           </tbody>
         </table>
        </div> 
       </body>
</body>
</html>
