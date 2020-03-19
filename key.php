<?php
$server = 'localhost';
$username = 'root';
$pass = '';
$db = 'employee';
$con = new mysqli($server,$username,$pass,$db);
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Assingment</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>

    <!-- insertion form -->

    <div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
      <form method="post">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="ename" id="" class="form-control" placeholder="" aria-describedby="helpId">
          </div>

          <div class="form-group">
            <label for="">City</label>
            <input type="text" name="ecity" id="" class="form-control" placeholder="" aria-describedby="helpId">
          </div>

          <div class="form-group">
            <label for="">Email</label>
            <input type="text" name="email" id="" class="form-control" placeholder="" aria-describedby="helpId">
          </div>

          <select name="depart">
              <option value="">Select Department</option>
              <?php
                // fetching list from database
                $fetch = mysqli_query($con,"SELECT * from department");
                while($show = mysqli_fetch_array($fetch))
                {
                  echo "<option value='$show[0]'>$show[1]</option>";
                }
              ?>
          </select>
          <br/>
          <br/>
          <input class="btn btn-primary" type="submit" name="ins" value="Insert"/>
      </form>
    </div>
    <div class="col-lg-4"></div>
    </div>

    <!-- insertion query -->
    <?php
      if(isset($_POST['ins']))
      {
        $g_name = $_POST['ename'];
        $g_city = $_POST['ecity'];
        $g_email = $_POST['email'];
        $g_depart = $_POST['depart'];

        $insq = mysqli_query($con,"INSERT into data(name,city,email,depart_id) 
        values('$g_name','$g_city','$g_email',$g_depart)");
        // if($insq){
        //   echo "inserted";
        // }else{
        //   echo "failed";
        // }
      }
    ?>

    <!-- fetching all records -->
   
    <table border="1" style="width: 600px; text-align: center; margin-top: 5%;
    margin-left: 20%;" >
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>City</th>
          <th>Email</th>
          <th>Department</th>
        </tr>
      </thead>

      <!-- display records query -->
      <?php
      $display = mysqli_query($con,"SELECT * from data");
      $dque = mysqli_query($con,"SELECT * from department");
      while($fque = mysqli_fetch_array($display))
      {
        echo "<tr>
        <td>$fque[0]</td>
        <td>$fque[1]</td>
        <td>$fque[2]</td>
        <td>$fque[3]</td>
        <td>$fque[4]</td>
        </tr>";
      }      
      ?>
    </table>

    

</html>