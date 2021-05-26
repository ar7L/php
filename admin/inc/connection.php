<?php
   
   $conn = mysqli_connect("freedb.tech:3306","freedbtech_ashraf","01928419790","freedbtech_assignment");
   
   if($conn){
   	echo "Hurrah!!";
   }else{
   	echo "Oh no!!";
   }

?>