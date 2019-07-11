<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Add Overtime</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="overtime_add.php">
          		  <div class="form-group">
                  	<label for="employee" class="col-sm-3 control-label">Employee ID</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="employee" name="employee" required>
                  	</div>
                </div>
                <div class="form-group">
                    <label for="datepicker_add" class="col-sm-3 control-label">Date</label>

                    <div class="col-sm-9"> 
                      <div class="date">
                        <input type="text" class="form-control" id="datepicker_add" name="date" required>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                  	<label for="hours" class="col-sm-3 control-label">No. of Hours</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="hours" name="hours">
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="mins" class="col-sm-3 control-label">No. of Mins</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="mins" name="mins">
                  	</div>
                </div>
                 <div class="form-group">
                    <label for="rate" class="col-sm-3 control-label">Rate</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="rate" name="rate" required>
                    </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="del_employee_name"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="overtime_edit.php">
            		<input type="hidden" class="id" name="id">
                <div class="form-group">
                    <label for="datepicker_edit" class="col-sm-3 control-label">Student ID</label>

                    <div class="col-sm-9"> 
                      <div class="date">
                        <input type="text" class="form-control" id="student_id" name="id">
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="hours_edit" class="col-sm-3 control-label">First Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="student_name" name="name">
                    </div>
                </div>
				<div class="form-group">
                    <label for="rate_edit" class="col-sm-3 control-label">Last Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="student_lastname" name="student_lastname_name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="mins_edit" class="col-sm-3 control-label">Major</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="major" name="major_name">
                    </div>
                </div>
                 
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span id="overtime_date"></span></b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="overtime_delete.php">
            		<input type="hidden" class="otid" name="id">
            		<div class="text-center">
	                	<p>DELETE OVERTIME</p>
	                	<h2 class="employee_name bold"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>
<!-- Update Photo -->
<div class="modal fade" id="edit_photo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="stid"></span></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="employee_edit_photo.php" enctype="multipart/form-data">
                <input type="hidden" class="stid" name="id">
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>
                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo" required>
                    </div>
                </div>
				<div class="form-group">
                    <label class="col-sm-3 control-label">ID</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="student_id" name="name">
                    </div>
                </div>
				
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>    

     