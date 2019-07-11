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
        Attendance
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
              <!--<a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>-->
            </div>
            <div class="table-responsive" style="padding:10px;">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Student ID</th>
                  <th>Photo</th>
                  <th>Name</th>
                  <th>Major</th>
				  <th>Time in</th>
				  <th>Time out</th>
				  <th>Notes</th>
				  <th>Duration</th>
                  <th>Tools</th>
                </thead>
                <tbody>
				<!--$sql = "select *,students.student_id AS stid from time_in left join students on students.student_id = time_in.student_id left join time_out on time_out.student_id = time_in.student_id and time_out.date = time_in.date";-->
                  <?php
                    //$sql = "select *,students.student_id AS stid, time_in.id AS main_id from time_in left join students on students.card_id = time_in.card_id  left JOIN course_class ON students.major = course_class.major where teacher='".$user['id']."'";
                    $sql = "select DISTINCT time_in.id AS main_id, time_in.card_id, students.student_id AS stid,students.firstname, students.lastname, students.photo,students.major,time_in.date, time_in.time_in, time_in.time_out, time_in.comment, time_in.status, time_in.leave_status from time_in left join students on students.card_id = time_in.card_id  left JOIN course_class ON students.major = course_class.major where teacher='".$user['id']."'";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
					$status = ($row['status'])?'<span class="label label-success pull-right">on time</span>':'<span class="label label-danger pull-right">late</span>';
					$leave_status = ($row['leave_status'])?'<span class="label label-success pull-right">on time</span>':'<span class="label label-danger pull-right">Early leave</span>';
                      ?>
                        <tr>
                          <td><?php echo $row['stid']; ?></td>
                          <td><a href="<?php echo (!empty($row['photo']))? '../images/'.$row['photo']:'../images/profile.jpg'; ?> " target="_blank"><img class="dias" src="<?php echo (!empty($row['photo']))? '../images/'.$row['photo']:'../images/profile.jpg'; ?>" width="80px" height="80px"></a> </td>
                          <td><?php echo $row['firstname'].' '.$row['lastname']; ?></td>
                          <td><?php echo $row['major']; ?></td>
                          <td><?php echo date('M d, Y', strtotime($row['date'])).'</br> '.date('h:i A', strtotime($row['time_in'])).$status ?></td>
                          <td>
							<?php 
							if ($row['time_out'] == ('00:00:00')){
							echo "In class"; 
							}else{
							echo date('M d, Y', strtotime($row['date'])).'</br> '.date('h:i A', strtotime($row['time_out'])).$leave_status ;}
							?>
						  </td>
						  <td><?php echo $row['comment']; ?></td>
						  <!--<td><?php echo date('M d, Y', strtotime($row['date'])).' '.date('h:i A', strtotime($row['time_in'])) ?></td>-->
						  <!--<td><?php echo date('M d, Y', strtotime(!empty($row['date']))).' '.date('h:i A', strtotime(!empty($row['time_out']))) ?></td>-->
                          <td> <?php 
							//$calc=(strtotime($row['time_out']) - strtotime($row['time_in'])); echo date('H:i:s', $calc)
							if ($row['time_out'] == ('00:00:00')){
								echo "In class";
							} else {
							$startTime = new DateTime($row['time_out']);
							$endTime = new DateTime($row['time_in']);
							$duration = $startTime->diff($endTime); //$duration is a DateInterval object
							echo $duration->format("%H:%I:%S");
							}
							?></td>
                          <td>
                            <button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['main_id']; ?>" ><i class="fa fa-edit"></i> Edit</button>
                            <button class="btn btn-danger btn-sm delete btn-flat"data-id="<?php echo $row['main_id']; ?>" ><i class="fa fa-trash"></i> Delete</button>
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
  <?php include 'includes/schedule_modal.php'; ?>
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
  
    $('.add_course').click(function(e){
    e.preventDefault();
    $('#add_course').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'schedule_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.stid').html(response.student_id);
      $('#main_id').val(response.id);
      $('#time_in_add').val(response.time_in);
      $('#student_id').val(response.student_id);
      $('#comment').val(response.comment);
      //$('#edit_time_out').val(response.time_out);
      $('#del_timeid').val(response.id);
      //$('#del_schedule').html(response.time_in+' - '+response.time_out);
    }
  });
}
</script>
</body>
</html>
