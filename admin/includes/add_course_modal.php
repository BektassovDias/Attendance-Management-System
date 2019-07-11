<!-- Add -->
<div class="modal fade" id="add_course">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><b>Courses and Classes</b></h4>
            	<h4 class="modal-title"><b><span class="stid"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="add_course_edit.php">
                <div class="form-group">
                  	<label for="course" class="col-sm-3 control-label">Course name</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="course_name" name="course_name" required>
                  	</div>
                </div>
				<div class="form-group">
                    <label for="position" class="col-sm-3 control-label">Class</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="class_name" id="class_name" required>
                        <option value="" selected>- Select -</option>
                        <?php
                          $sql = "SELECT DISTINCT major FROM students";
                          $query = $conn->query($sql);
                          while($major = $query->fetch_assoc()){
                            echo "
                              <option value='".$major['major']."'>".$major['major']."</option>
                            ";
                          }
                        ?>
                      </select>
                    </div>
                </div>
                    	<input type="hidden" class="form-control" id="teacher_id" name="teacher_id" value="<?php echo $user['id'];?>" required>

				
				 
					
					
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-primary btn-flat" name="add_course"><i class="fa fa-save"></i> Add</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete_course">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><b>Courses and Majors</b></h4>
            	<h4 class="modal-title"><b><span class="stid"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="delete_course_edit.php">
            		<input type="hidden" class="course" name="course" value="<?php echo $course_id?>">
            		<div class="text-center">
	                	<p>DELETE COURSE </p>
	                	<h2><?php echo $course ?></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="delete_course"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!--Add class-->
<div class="modal fade" id="add_class">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><b>Classes</b></h4>
            	<h4 class="modal-title"><b><span class="stid"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="add_class.php">
            		<input type="hidden" id="id" name="id">
                <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Class name:</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="class" name="class" required>
                  	</div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="add_class"><i class="fa fa-check-square-o"></i> Add</button>
            	</form>
          	</div>
        </div>
    </div>
</div>