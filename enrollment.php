<!DOCTYPE html>
<html>
<head>
	<title>Employee Information</title>
	<script src="jquery.min.js"></script>
	<script src="enrollment.js"></script>
	<link href="bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="container">
		<br>
		<div class="row">

			<div class="col-md-4">
				<br>
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="form-group">
							<label>Student#</label>
							<input type="text" id="studentNo" class="form-control" autocomplete="off">
						</div>

						<div class="form-group">
							<label>Name</label>
							<input type="text" id="studentName" class="form-control" autocomplete="off">
						</div>	

						<div class="form-group">
							<label>Contact#</label>
							<input type="text" id="studentContact" class="form-control" autocomplete="off">
						</div>

						<div class="form-group">
							<label>Age</label>
							<input type="text" id="studentAge" class="form-control" autocomplete="off">
						</div>

						<div class="form-group">
							<label>Address</label>
							<textarea id="studentAddress" class="form-control"></textarea>
						</div>	

						<div class="form-group">
							<label>Civil Status</label>
							<select id="studentStatus" class="form-control">
								<option></option>
								<option>Single</option>
								<option>In a relationship</option>
								<option>Married</option>
							</select>
						</div>						

						<div class="form-group">
							<label>Gender</label>
							<select id="studentGender" class="form-control">
								<option></option>
								<option>Male</option>
								<option>Female</option>
							</select>
						</div>

						<div class="form-group">
							<label>Background of study</label>
							<select id="studentStudy" class="form-control">
								<option></option>
								<option>Elementary</option>
								<option>Highschool</option>
								<option>College</option>
							</select>
						</div>

					</div>
					<div class="panel-footer pull-right">
						<button id="addStudentBtn" class="btn btn-primary">Add</button>
					</div>					
				</div>
			</div>
		
			<div class="col-md-8">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Student#</th>
							<th>Name</th>
							<th>Contact#</th>
							<th>Age</th>
							<th>Address</th>
							<th>Status</th>
							<th>Gender</th>
							<th>Study</th>
						</tr>
					</thead>
					<tbody id="student-table"></tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>