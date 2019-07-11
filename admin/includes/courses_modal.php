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
            	<form class="form-horizontal" method="POST" action="schedule_edit.php">
            		<input type="hidden" id="id" name="id">
                <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Course name</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="course_name" name="course_name" required>
                  	</div>
                </div>
				<div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Class</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="class_name" name="class_name" required>
                  	</div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Add</button>
            	</form>
          	</div>
        </div>
    </div>
</div>