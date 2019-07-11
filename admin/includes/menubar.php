<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $user['firstname'].' '.$user['lastname']; ?></p>
          <a><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
	  
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">DASHBOARD</li>
        <li class=""><a href="home.php"><i class="fa fa-dashboard"></i> <span>Home</span></a></li>
        <li class="header">MANAGE</li>
        <li><a href="attendance.php"><i class="fa fa-calendar"></i> <span>Attendance</span></a></li>
		<?php
		if ($user['id'] == ('1')){
			echo "<li><a href='#add_class' data-toggle='modal'><i class='fa fa-plus'></i> <span>Open new major</span></a></li>";
		}
		?>
		<!--<li><a href="employee.php"><i class="fa fa-circle-o"></i> Student List</a></li>-->
		<li class="header">COURSES AND CLASSES</li>
		<?php
		//$result = mysql_query("SELECT * FROM `table` WHERE `id`=$major");
		//$data = mysql_fetch_assoc($result);
		?>
		<?php
					$sql = "SELECT * FROM `course_class` where teacher='".$user['id']."' order by course, major";
                    //$sql = "SELECT * FROM course_class left join students on course_class.major = students.major where teacher='".$user['firstname']."' ";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
		?>
		<tr>
                          
                          
						<td>
							
							
							
								
							<li><a href="employee.php?course=<?php echo $row['course']?>&major=<?php echo $row['major']?>&id=<?php echo $row['id']?>"><i class="fa fa-circle-o"></i><?php echo $row['course'].' - '.$row['major'];?></a></li>	
						  
						</td>
		</tr>
		
                      <?php
                    }
                  ?>
		<!--<li><a href="#" class="add_course"><i class="fa fa-plus"></i>ADD NEW</a></li>-->
		<a href="#add_course" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"style="margin-left:16px; margin-top:16px;"><i class="fa fa-plus">  </i>   Add New Course</a>
		
        <!--
		<li><a href="deduction.php"><i class="fa fa-file-text"></i> Deductions</a></li>
        <li><a href="position.php"><i class="fa fa-suitcase"></i> Positions</a></li>
        <li class="header">PRINTABLES</li>
        <li><a href="payroll.php"><i class="fa fa-files-o"></i> <span>Payroll</span></a></li>
        <li><a href="schedule_employee.php"><i class="fa fa-clock-o"></i> <span>Schedule</span></a></li> -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>