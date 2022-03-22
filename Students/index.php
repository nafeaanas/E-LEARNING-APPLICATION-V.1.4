<?php
session_start();
    if(!$_COOKIE['email'] && !$_COOKIE['password']){
        header('location:../index.php');
    }
?>
<?php
include 'Connection.php';
if(isset($_POST['submit'])){
     $name=$_POST['name'];
     $email=$_POST['email'];
     $phone=$_POST['phone'];
     $enroll_number=$_POST['enroll_number'];
     $date_of_admission=$_POST['date_of_admission'];



     $sql="INSERT INTO student (name,email,phone,enroll_number,date_of_admission) VALUES ('$name','$email','$phone','$enroll_number','$date_of_admission')";
     $result=$conn->query($sql);
     header('location:index.php');
}
?>
<?php include 'Connection.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Student</title>
</head>
<body>
    <main class="row w-100 h-100"> 
        <?php
           include '../decoupage/sidbar.php'
        ?>   

        <div class="container-fuild  mt-2 col">
            <?php
              include '../decoupage/nav.php'
            ?>   

          <section class="d-flex flex-row justify-content-between align-items-center px-4 pt-2" >
                <div>
                        <p><strong>Students List</strong></p>
                </div>
                <div class="nvr d-flex flex-row align-items-center">
                    <div class="pe-4">
                        <img class="" src="image/Vector.png" alt="liste">
                    </div>  
                    <div>  
                        <button class="btn bg-info text-white fs-6 " data-bs-toggle="modal" data-bs-target="#exampleModal"><a class="text-white text-decoration-none">ADD NEW STUDENT</a></button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">enter student information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" class="p-4" method="post">
                  <div class="mb-3">
                       <label for="exampleInputemail1" class="form-label ">name</label>
                       <input type="text" class="form-control" id="exampleInputemail1" aria-describedby="emailHelp" placeholder="Enter student name" name="name" REQUIRED>
                  </div>
                  <div class="mb-3">
                       <label for="exampleInputemail1" class="form-label ">email</label>
                       <input type="email" class="form-control" id="exampleInputemail1" aria-describedby="emailHelp" placeholder="Enter student email" name="email" REQUIRED>
                  </div>
                  <div class="mb-3">
                       <label for="exampleInputemail1" class="form-label ">phone</label>
                       <input type="phone" class="form-control" id="exampleInputemail1" aria-describedby="emailHelp" placeholder="Enter student phone" name="phone" REQUIRED>
                  </div>
                  <div class="mb-3">
                       <label for="exampleInputemail1" class="form-label ">enroll number</label>
                       <input type="number" class="form-control" id="exampleInputemail1" aria-describedby="emailHelp" placeholder="Enter student enroll_number" name="enroll_number" REQUIRED>
                  </div>
                  <div class="mb-3">
                       <label for="exampleInputemail1" class="form-label ">date of admission</label>
                       <input type="date" class="form-control" id="exampleInputemail1" aria-describedby="emailHelp" placeholder="Enter student date_of_admission" name="date_of_admission" REQUIRED>
                  </div>
                  <input name="submit"type="submit" class="btn bg-info text-white w-100" value="add">
              </form>
      </div>
    </div>
  </div>
</div>
                    </div>  
                </div>
          </section> 
        
         <section class="tab table-responsive mx-4  pt-2"  style="overflow-y: auto; height: 500px;">
            <table class="table table-borderless" style="min-height: 200px;">
                    <thead >
                      <tr class=" text-muted">
                        <th scope="col"></th>
                        <th scope="col">name</th>
                        <th scope="col">email</th>
                        <th scope="col">phone</th>
                        <th class="text-nowrap" scope="col">enrole number</th>
                        <th scope="col" class="text-nowrap">date of admission</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                 <tbody >
                     <?php
                        //  $students_list= array (
                        //      array("img"=>"image/student.png", "name"=>"username", "email"=>"user@email.com", "phone"=>"7305477760", "enroll_number"=>"1234567305477760", "date_of_admission"=>"08-Dec-2021", "logo1"=>"image/vector (1).png", "logo2"=>"image/vector (2).png"),
                        //      array("img"=>"image/student.png", "name"=>"username", "email"=>"user@email.com", "phone"=>"7305477760", "enroll_number"=>"1234567305477760", "date_of_admission"=>"08-Dec-2021", "logo1"=>"image/vector (1).png", "logo2"=>"image/vector (2).png"),
                        //      array("img"=>"image/student.png", "name"=>"username", "email"=>"user@email.com", "phone"=>"7305477760", "enroll_number"=>"1234567305477760", "date_of_admission"=>"08-Dec-2021", "logo1"=>"image/vector (1).png", "logo2"=>"image/vector (2).png"),
                        //      array("img"=>"image/student.png", "name"=>"username", "email"=>"user@email.com", "phone"=>"7305477760", "enroll_number"=>"1234567305477760", "date_of_admission"=>"08-Dec-2021", "logo1"=>"image/vector (1).png", "logo2"=>"image/vector (2).png"),
                        //  );
                          $sql= "select * from student";
                          $result=mysqli_query($conn,$sql);
                          if($result){ 
                            while($row=mysqli_fetch_assoc($result)){
                              $id=$row['id'];
                              $name=$row['name'];
                              $email=$row['email'];
                              $phone=$row['phone'];
                              $enroll_number=$row['enroll_number'];
                              $date_of_admission=$row['date_of_admission'];

                              echo '<tr>';
                          echo '<tr><td></td></tr>';
                          echo '<td  scope="row" class="bg-white aligne-middle rounded-1"><img src="image\student.png" alt=""></td>';
                          echo '<td class="align-middle bg-white">'.$name.'</td>';
                          echo '<td class="align-middle bg-white">'.$email.'</td>';
                          echo '<td class="align-middle bg-white">'.$phone.'</td>';
                          echo '<td class="align-middle bg-white">'.$enroll_number.'</td>';
                          echo '<td class="align-middle bg-white text-nowrap">'.$date_of_admission.'</td>';
                          
                          echo '<td scope="row" class="align-middle bg-white"><a href="updateform.php?updateid='.$id.'"><img src="image\vector (1).png" alt="logo1"></td>';
                          echo '<td scope="row" class="align-middle bg-white rounded-1 "><a href="delete.php?deleteid='.$id.'" onclick="myFunction()"><img src="image\vector (2).png" alt="Logo2"></a></td>';
                          echo ' </tr>';
                            }
                            
                          }
                        
                          

                           
                     ?>
                     
 
                </tbody>
            </table>
        </section>
      </div>    
    </main>
  <!-- <script>
  
  function myFunction() {

Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire(
      'Deleted!',
      'Student has been deleted.',
      'success'
    )
  }
})
}</script> -->
  <script src="bootstrap.bundle.min.js"></script>  
</body>
</html>

<style>
  ::-webkit-scrollbar {
    width: 6px;
  }
  
  /* Track */
  ::-webkit-scrollbar-track {
    box-shadow: inset 0 0 5px grey; 
    border-radius: 10px;
  }
   
  /* Handle */
  ::-webkit-scrollbar-thumb {
    background: gray; 
    border-radius: 10px;
  }
  
  /* Handle on hover */
  ::-webkit-scrollbar-thumb:hover {
    background: gray; 
  }
</style>

