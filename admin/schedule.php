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
        BBA-15
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
               <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
            </div>
            <div class="table-responsive"style="padding:10px;">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Employee ID</th>
                  <th>Photo</th>
                  <th>Name</th>
                  <th>Major</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *, students.student_id AS stid FROM students where major ='BBA-15'";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      ?>
                        <tr>
                          <td><?php echo $row['student_id']; ?></td>
                          <td><a href="<?php echo (!empty($row['photo']))? '../images/'.$row['photo']:'../images/profile.jpg'; ?>"><img class="dias" src="<?php echo (!empty($row['photo']))? '../images/'.$row['photo']:'../images/profile.jpg'; ?>" width="80px" height="80px"></a> <a href="#edit_photo" data-toggle="modal" class="pull-right photo" data-id="<?php echo $row['stid']; ?>"><span class="fa fa-edit"></span></a></td>
                          <td><?php echo $row['firstname'].' '.$row['lastname']; ?></td>
                          <td><?php echo $row['major']; ?></td>
                          
                          <td>
                            <button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['stid']; ?>"><i class="fa fa-edit"></i> Edit</button>
                            <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['stid']; ?>"><i class="fa fa-trash"></i> Delete</button>
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
  <?php include 'includes/overtime_modal.php'; ?>
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
    url: 'overtime_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      //var time = response.hours;
      //var split = time.split('.');
      //var hour = split[0];
      //var min = '.'+split[1];
      //min = min * 60;
      //console.log(min);
      $('.stid').val(response.stid);
	  $('.del_employee_name').html(response.firstname+' '+response.lastname);
	  $('#student_name').val(response.firstname);
	  $('#student_lastname').val(response.lastname);
      $('#major').val(response.major);
      $('#student_id').val(response.student_id);
      //$('#photo').val(response.photo);
      //$('#mins_edit').val(min);
      //$('#rate_edit').val(response.rate);
    }
  });
}
</script>
</body>
</html>
