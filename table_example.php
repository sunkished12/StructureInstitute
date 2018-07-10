<?php
 $connect = mysqli_connect("localhost", "root", "", "structure_institute");
 $query ="SELECT * FROM registrants ORDER BY reg_id DESC";
 $result = mysqli_query($connect, $query);
 ?>
 <!DOCTYPE html>
 <html>
      <head>
           <title>Registrants | Structure Institute</title>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
      </head>
      <body>
           <br /><br />
           <div class="container">

                <h3 align="center">Registrants</h3>
                <br />
                <div class="table-responsive">
                     <table id="employee_data" class="table table-striped table-bordered">
                          <thead>
                               <tr>
                                    <td>ID</td>
                                    <td>Name</td>
                                    <td>E-mail</td>
                                    <td>Contact No.</td>
                                    <td>Subject</td>
                                    <td>Status</td>
                               </tr>
                          </thead>
                          <?php
                          while($row = mysqli_fetch_array($result))
                          {
                               echo '
                               <tr>
                                    <td>'.$row["reg_id"].'</td>
                                    <td>'.$row["reg_name"].'</td>
                                    <td>'.$row["reg_email"].'</td>
                                    <td>'.$row["reg_number"].'</td>
                                    <td>'.$row["reg_subject"].'</td>
                                    <td>'.$row["reg_active"].'</td>
                               </tr>
                               ';
                          }
                          ?>
                     </table>
                </div>
           </div>
            <form method = "post" action="table_example.php" enctype="multipart/form-data">
           <h5 align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Enter Employee ID: </h5>

             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text"  name="reg_id" id="id"/>

             <br><br>

           <div class="form-group">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name = "reg_active">
               <option value="">Choose Status </option>
               <option value="Contacted">Contacted</option>
               <option value="Not Contacted">Not Contacted</option>
             </select>
           </div>
           <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="submit">Save</button></div>

           <br><br>

             <?php
               include ("connect.php");
               $conn = mysqli_connect("localhost", "root", "", "structure_institute");
               if (isset($_POST['submit'])) {

                 $reg_id = $_POST['reg_id'];
                 $reg_active   = $_POST['reg_active'];

                 if ($reg_active == '' or $reg_id == '') {
                     echo "<script>alert('Any of the fields is empty')</script>";
                     echo "<script>window.open('table_example.php','_self')</script>";
                     exit();
                 }
                 else {
                     $update_query = "update registrants set reg_active = '$reg_active' WHERE reg_id = $reg_id";
                          if(mysqli_query($conn, $update_query)){
                           echo "<script>alert('Update Successfully!')</script>";
                           echo "<script>window.open('table_example.php','_self')</script>";
                      }
                   }
               }
             ?>
          </form>
           &nbsp;&nbsp;
           <a href="admin.php">
             <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Back to Admin Page <br /> <br />
           </a>
      </body>
 </html>
 <script>
 $(document).ready(function(){
      $('#employee_data').DataTable();
 });
 </script>
