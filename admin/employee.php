<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Student List
      </h1>
      
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
               <a href="#delete_course" data-toggle="modal" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-trash"></i> DELETE COURSE</a>
            </div>
            <div class="table-responsive" style="padding:10px;">
              <table id="example1" class="table table-bordered">
			 
			 
			  <thead>
				<th>Card ID</th>
                  <th>Student ID</th>
                  <th>Photo</th>
                  <th>Name</th>
                  <th>Major</th>
                  
                  <th>Tools</th>
                </thead>
                <tbody>
                  <?php
				  //if(isset($_GET["major"])){
				    $course = isset($_GET['course']) ? ($_GET['course']) : ''; 
					$major = isset($_GET['major']) ? ($_GET['major']) : '';
					$course_id = isset($_GET['id']) ? ($_GET['id']) : '';
				  //$major = ($_GET['major']);
                    $sql = "SELECT *,students.id as empid FROM students where major='".$major."'";//where major=".$_GET['major']."
                    //$sql = "SELECT *,students.id as empid FROM students left join course_class on students.major=course_class.major left join time_in on students.card_id=time_in.card_id where students.major='".$major."'";//where major=".$_GET['major']."
					  //sql = "";
					$query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
					
					
					//if(isset($_GET["id"])){
					//$res =$mysqli->query("SELECT *,students.id as empid FROM students where major=".$_GET['major']."");
					//if($r = mysqli_fetch_array($res)){
                      ?>
                        <tr>
						<td><?php echo $row['card_id']; ?></td>
                          <td><?php echo $row['student_id']; ?></td>
                          <td>
						  <a href="<?php echo (!empty($row['photo']))? '../images/'.$row['photo']:'../images/profile.jpg'; ?>" target="_blank"><img src="<?php echo (!empty($row['photo']))? '../images/'.$row['photo']:'../images/profile.jpg'; ?>" width="80px" height="80px"></a> 
						  <a href="#edit_photo" data-toggle="modal" class="pull-right photo" data-id="<?php echo $row['empid']; ?>"><span class="fa fa-edit"></span></a></td>
                          <td><?php echo $row['firstname'].' '.$row['lastname']; ?></td>
                          <td><?php echo $row['major']; ?></td>
                          
						  
                          <td>
                            <button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['empid']; ?>"><i class="fa fa-edit"></i> Edit</button>
                            <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['empid']; ?>"><i class="fa fa-trash"></i> Delete</button> 
                          
					</td>
                        </tr>
                      <?php
                    }
					
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/employee_modal.php'; ?>
  <?php include 'includes/add_course_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>

 <!--<link rel="stylesheet" type="text/css" href="css/imgzoom.css" />
 <script type="text/javascript" src="scripts/jquery.min.js"></script>
 <script type="text/javascript" src="scripts/jquery.imgzoom.pack.js"></script> -->
<script>
$(document).ready(function () {
    $('img.dias').imgZoom();
  });
$(function(){
  $('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.delete').click(function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.photo').click(function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });
  
 
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'employee_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.empid').val(response.id);
      $('#edit_student_id').val(response.student_id);
      $('.del_employee_name').html(response.firstname+' '+response.lastname);
      $('#employee_name').html(response.firstname+' '+response.lastname);
      $('#edit_firstname').val(response.firstname);
      $('#edit_lastname').val(response.lastname);
      $('#edit_major').val(response.major);
      $('#edit_card_id').val(response.card_id);

    //  $('#position_val').val(response.position_id).html(response.description);
      //$('#schedule_val').val(response.schedule_id).html(response.time_in+' - '+response.time_out);
    }
  });
}
</script>
</body>
</html>
