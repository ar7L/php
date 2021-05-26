<<<<<<< HEAD
<?php 
   $conn = mysqli_connect("freedb.tech:3306","freedbtech_ashraf","01928419790","freedbtech_assignment");
   // if($conn){
   // 	echo "Hurrah!!";
   // }else{
   // 	echo "Oh no!!";
   // }
   // $sql = "CREATE TABLE category( 
   //            c_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   //            c_name VARCHAR(20) NOT NULL,
   //            c_desc VARCHAR(255) NOT NULL

   //         )";
   //  $connTab = mysqli_query($conn , $sql);
   //  if($connTab){
   //  	echo "Table is created";
   //  }else{
   //  	echo ":(";
   //  }

   ob_start();

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">
      <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <title></title>
  </head>
  <body>
  	<center style="margin-top: 10%;">
  		<h1 class="animate__animated animate__bounce">This is the First Part of Crud operation</h1>
  	</center>




  	<div class="container">
  		<div class="row mt-5">
  		  <div class="col-md-6 col-sm-12 animate__animated animate__slideInLeft">
  		  	<form method = "POST">
  		      <div class="mb-3">	

  				<label for="exampleFormControlInput" class="form-label">Add New Category</label>
  				<input name = "cat_name" type="text" class="form-control" id="exampleFormControlInput" placeholder="Category Name" required="required">

  				<textarea name = "cat_desc" class="form-control my-3" name="" id="" cols="12" rows="3" placeholder="Add category Description"></textarea>
  				<input name="add_cat" type = "submit" class="btn btn-primary">

  			</div>
  		</form>
  		</div>

  		  <?php
  		    if(isset($_POST['add_cat'])){
  		    	$cat_name = $_POST['cat_name'];
  		    	$cat_desc = $_POST['cat_desc'];

  		    	$sql_p = "INSERT INTO category (c_name,c_desc) VALUES ('$cat_name','$cat_desc')";
  		    	$p_conn = mysqli_query($conn , $sql_p);

  		    	if($p_conn){
  		          header("location: https://php-assignment-1.herokuapp.com/");
  		    		
  		    	}else{
  		    		echo "oh! no";
  		    	}

  		    }
  		  ?>
  		  <div class="col-md-6 col-sm-12 animate__animated animate__slideInRight">
  		  	<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>

  	<?php 


  	   $sql_r = "SELECT * FROM category";
  	   $r_conn = mysqli_query($conn , $sql_r);

  	   $c = 1;

  	   while($row = mysqli_fetch_assoc($r_conn)){
  	   	   $id   = $row['c_id'];
  	   	   $name = $row['c_name'];
  	   	   $desc = $row['c_desc'];

           ?>
  	   	       <tr>
			      <th scope="row"><?php echo $c?></th>
			      <td><?php echo $name?></td>
			      <td><?php echo $desc?></td>
			      <td>
			      	<a href="index.php?update_id=<?php echo $id?>" class="btn btn-success">Edit</a>
			      	<a onClick="return confirm('Are you sleeping??');" href="index.php?delete_id=<?php echo $id?>" class="btn btn-danger">Delete</a>
			      </td>
			  </tr>
      <?php 	   
        $c++;
  	   }

  	?>

  </tbody>
</table>
  		  </div>

  		</div>
  	</div>
  	<?php

  	   if(isset($_GET['delete_id'])){
  	   	$del_id = $_GET['delete_id'];
  	   	$sql_d = "DELETE FROM category WHERE c_id = '$del_id'";
  	   	$d_conn = mysqli_query($conn,$sql_d);
  	   	if($d_conn){
  	   		header("location: https://php-assignment-1.herokuapp.com/");
  	   	}else{
  	   		echo "Something went wrong!!";
  	   	}
  	   }

  	?>
    <?php

      if(isset($_GET['update_id'])){
        $update_id = $_GET['update_id'];

        $u_sql = "SELECT * FROM category WHERE c_id = '$update_id'";
        $u_conn = mysqli_query($conn , $u_sql);

        while($row = mysqli_fetch_assoc($u_conn)){
          $c_name = $row['c_name'];
          $c_desc = $row['c_desc'];
        }
        ?>
            <div class="container">
      <div class="row mt-5">
          <div class="col-md-6 col-sm-12 animate__animated animate__slideInLeft">
          <form method = "POST">
            <div class="mb-3">  

          <label for="exampleFormControlInput" class="form-label">Update Category</label>
          <input name = "cat_name" type="text" class="form-control" id="exampleFormControlInput" value="<?php echo $c_name?>" required="required">

          <textarea name = "cat_desc" class="form-control my-3" name="" id="" cols="12" rows="3">
            <?php echo $c_desc?>
          </textarea>

          <input name="upd_cat" type = "submit" class="btn btn-primary">

        </div>
      </form>
      </div>
      </div>
    </div>
    <?php
      }
    ?>

    <?php 

       if(isset($_POST['upd_cat'])){
        $c_name = $_POST['cat_name'];
        $c_desc = $_POST['cat_desc'];
        $upd_sql = "UPDATE category SET c_name = '$c_name' , c_desc = '$c_desc' WHERE c_id = '$update_id'";
        $upd_conn = mysqli_query($conn , $upd_sql);
        if($upd_conn){
          header("Location: https://php-assignment-1.herokuapp.com/");
        }else{
          echo "Something went wrong";
        }
       }

    ?>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
      $('document').ready(function()
{
    $('textarea').each(function(){
            $(this).val($(this).val().trim());
        }
    );
});
    </script>
  </body>
</html>
=======
<?php 
   $conn = mysqli_connect("freedb.tech:3306","freedbtech_ashraf","01928419790","freedbtech_assignment");
   // if($conn){
   // 	echo "Hurrah!!";
   // }else{
   // 	echo "Oh no!!";
   // }
   // $sql = "CREATE TABLE category( 
   //            c_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   //            c_name VARCHAR(20) NOT NULL,
   //            c_desc VARCHAR(255) NOT NULL

   //         )";
   //  $connTab = mysqli_query($conn , $sql);
   //  if($connTab){
   //  	echo "Table is created";
   //  }else{
   //  	echo ":(";
   //  }

   ob_start();

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">
      <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <title></title>
  </head>
  <body>
  	<center style="margin-top: 10%;">
  		<h1 class="animate__animated animate__bounce">This is PHP Crud operation</h1>
  	</center>




  	<div class="container">
  		<div class="row mt-5">
  		  <div class="col-md-6 col-sm-12 animate__animated animate__slideInLeft">
  		  	<form method = "POST">
  		      <div class="mb-3">	

  				<label for="exampleFormControlInput" class="form-label">Add New Category</label>
  				<input name = "cat_name" type="text" class="form-control" id="exampleFormControlInput" placeholder="Category Name" required="required">

  				<textarea name = "cat_desc" class="form-control my-3" name="" id="" cols="12" rows="3" placeholder="Add category Description"></textarea>
  				<input name="add_cat" type = "submit" class="btn btn-primary">

  			</div>
  		</form>
  		</div>

  		  <?php
  		    if(isset($_POST['add_cat'])){
  		    	$cat_name = $_POST['cat_name'];
  		    	$cat_desc = $_POST['cat_desc'];

  		    	$sql_p = "INSERT INTO category (c_name,c_desc) VALUES ('$cat_name','$cat_desc')";
  		    	$p_conn = mysqli_query($conn , $sql_p);

  		    	if($p_conn){
  		          header("location: https://php-assignment-1.herokuapp.com/");
  		    		
  		    	}else{
  		    		echo "oh! no";
  		    	}

  		    }
  		  ?>
  		  <div class="col-md-6 col-sm-12 animate__animated animate__slideInRight">
  		  	<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>

  	<?php 


  	   $sql_r = "SELECT * FROM category";
  	   $r_conn = mysqli_query($conn , $sql_r);

  	   $c = 1;

  	   while($row = mysqli_fetch_assoc($r_conn)){
  	   	   $id   = $row['c_id'];
  	   	   $name = $row['c_name'];
  	   	   $desc = $row['c_desc'];

           ?>
  	   	       <tr>
			      <th scope="row"><?php echo $c?></th>
			      <td><?php echo $name?></td>
			      <td><?php echo $desc?></td>
			      <td>
			      	<a href="index.php?update_id=<?php echo $id?>" class="btn btn-success">Edit</a>
			      	<a onClick="return confirm('Are you sleeping??');" href="index.php?delete_id=<?php echo $id?>" class="btn btn-danger">Delete</a>
			      </td>
			  </tr>
      <?php 	   
        $c++;
  	   }

  	?>

  </tbody>
</table>
  		  </div>

  		</div>
  	</div>
  	<?php

  	   if(isset($_GET['delete_id'])){
  	   	$del_id = $_GET['delete_id'];
  	   	$sql_d = "DELETE FROM category WHERE c_id = '$del_id'";
  	   	$d_conn = mysqli_query($conn,$sql_d);
  	   	if($d_conn){
  	   		header("location: https://php-assignment-1.herokuapp.com/");
  	   	}else{
  	   		echo "Something went wrong!!";
  	   	}
  	   }

  	?>
    <?php

      if(isset($_GET['update_id'])){
        $update_id = $_GET['update_id'];

        $u_sql = "SELECT * FROM category WHERE c_id = '$update_id'";
        $u_conn = mysqli_query($conn , $u_sql);

        while($row = mysqli_fetch_assoc($u_conn)){
          $c_name = $row['c_name'];
          $c_desc = $row['c_desc'];
        }
        ?>
            <div class="container">
      <div class="row mt-5">
          <div class="col-md-6 col-sm-12 animate__animated animate__slideInLeft">
          <form method = "POST">
            <div class="mb-3">  

          <label for="exampleFormControlInput" class="form-label">Update Category</label>
          <input name = "cat_name" type="text" class="form-control" id="exampleFormControlInput" value="<?php echo $c_name?>" required="required">

          <textarea name = "cat_desc" class="form-control my-3" name="" id="" cols="12" rows="3">
            <?php echo $c_desc?>
          </textarea>

          <input name="upd_cat" type = "submit" class="btn btn-primary">

        </div>
      </form>
      </div>
      </div>
    </div>
    <?php
      }
    ?>

    <?php 

       if(isset($_POST['upd_cat'])){
        $c_name = $_POST['cat_name'];
        $c_desc = $_POST['cat_desc'];
        $upd_sql = "UPDATE category SET c_name = '$c_name' , c_desc = '$c_desc' WHERE c_id = '$update_id'";
        $upd_conn = mysqli_query($conn , $upd_sql);
        if($upd_conn){
          header("Location: https://php-assignment-1.herokuapp.com/");
        }else{
          echo "Something went wrong";
        }
       }

    ?>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
      $('document').ready(function()
{
    $('textarea').each(function(){
            $(this).val($(this).val().trim());
        }
    );
});
    </script>
  </body>
</html>
>>>>>>> 874acf5 ( Initial commit)
