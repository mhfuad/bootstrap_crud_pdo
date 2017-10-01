<?php
spl_autoload_register(function ($class){
  include 'classes/'.$class.'.php';
});
$user = new student();

    //CREATE NEW
if (isset($_POST['create'])) {
  $name = $_POST['name'];
  $department = $_POST['department'];
  $age = $_POST['age'];

  $user->setName($name);
  $user->setDepartment($department);
  $user->setAge($age);

  $user->createData();
}
    //UPDATE 
if (isset($_POST['UPDATE'])) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $department = $_POST['department'];
  $age = $_POST['age'];

      //$user->setId($id);
  $user->setName($name);
  $user->setDepartment($department);
  $user->setAge($age);

  $user->updateData($id);
}
    //DELETE 
if(isset($_GET['action']) && $_GET['action'] == 'delete'){
  $id = $_GET['id'];
  $user->deleteData($id);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD WITH PDO</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 ">
        <div class="panel panel-success">
          <div class="panel-heading">
            <h1>CRUD WITH PDO</h1>
            <a href="index.php" class="btn btn-primary">Create New Student</a>
            <a href="teacher.php" class="btn btn-primary">Create New Teacher</a>
          </div>
        </div>    
      </div>
    </div>
    <div class="row">
      
      <?php
//UPDATE 
      if(isset($_GET['action']) && $_GET['action'] == 'edit'){
        $id = $_GET['id'];
        $result = $user->readById($id);

        ?>
        <div class="col-md-6">
          <form action="" method="POST">
            <table class="table table-bordered table-striped table-hover table-condensed">
              <tr>
                
                <td><label >Name</label> </td>
                <td><input type="text" class="form-control" value="<?php echo $result['name']; ?>" name="name"></td>         
                <input type="hidden" class="form-control" value="<?php echo $result['id']; ?>" name="id"> 
              </tr>
              <tr>
                <td><label >Department:</label></td>
                <td><input type="text" class="form-control" value="<?php echo $result['department']; ?>" name="department"></td>
              </tr>
              <tr>
                <td><label >Age:</label></td>
                <td><input type="text" class="form-control" value="<?php echo $result['age']; ?>" name="age"></td>
              </tr>
              <tr>
                <td></td>
                <td><input type="submit" name="UPDATE" class="btn btn-success" value="Submit"></td>
              </tr>
            </table>
          </form>
        </div>
        <?php

      }  else {
        ?>  
        
        
        
        
        
        <div class="col-md-6">
          <form action="" method="POST">
            <table class="table table-bordered table-striped table-hover table-condensed">
              <tr>
                <td><label >Name</label> </td>
                <td><input type="text" class="form-control" placeholder="Name" name="name"></td>         
              </tr>
              <tr>
                <td><label >Department:</label></td>
                <td><input type="text" class="form-control" placeholder="Department" name="department"></td>
              </tr>
              <tr>
                <td><label >Age:</label></td>
                <td><input type="text" class="form-control" placeholder="Age" name="age"></td>
              </tr>
              <tr>
                <td></td>
                <td><input type="submit" name="create" class="btn btn-success" value="Submit"></td>
              </tr>
            </table>
          </form>
        </div>  
        <?php

      }
      ?>
      <div class="col-md-6">
        <table class="table table-bordered table-striped table-hover">
          <tr>
            <td class="text-center">No</td>
            <td class="text-center">Name</td>
            <td class="text-center">Department</td>
            <td class="text-center">Age</td>
            <td class="text-center">Action</td>
          </tr>
          <?php
          $id = 0;
          foreach ($user->readAll($id) as $value => $key) {
            $id++;
            ?>
            <tr>
              <td class="text-center"><?php echo $id; ?></td>
              <td class="text-center"><?php echo $key['name'];?></td>
              <td class="text-center"><?php echo $key['department'];?></td>
              <td class="text-center"><?php echo $key['age'];?></td>
              <td class="text-center" >
                <a href="index.php?action=edit&id=<?php echo $key['id']; ?>" class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span></a> || 
                <a href="index.php?action=delete&id=<?php echo $key['id']; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-trash"></span></a></td>
              </tr>   
              <?php    
            }
            ?>
          </table>
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
    <script src="js/bootstrap_jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
  </html>