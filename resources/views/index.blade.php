<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width" scale="1.0"/>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	{{-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap3.css"> --}}
	{{-- <link rel="stylesheet" type="text/css" href="css/css/all.css">
	<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script> --}}
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	{{-- <style>
		body
		{
			background-color:#e056fd;
		}
		.formdemo
		{
			min-height:500px;
			background-color:#22a6b3;
			border:1px solid black;
			box-shadow:5px 5px 5px rgba(0,0,0,0.5);
			padding:20px; 
		}
		.demo
		{
			margin-top:30px;
		}
		.demotext
		{
			margin:10px 30px;
		}
		.demotext label
		{
			font-size:20px;
		}
		textarea
		{
			resize:none;
		}
		.checkbox
		{
			margin:0 20px;
		}
	</style> --}}
</head> 
<body>
	<div class="container">
		<div class="row">
			{{-- <h1 class="text-center">Registration Form</h1> --}}
		</div>
		<div class="row demo">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="formdemo">
					<form  action="{{ route('addtest')}}" method="POST">
						@csrf
						<div class="row">
							<form>
								<table class="table" id="main">
									{{-- <tr>
										<th>test1</th>
										<th>test2</th>
										<th>test3</th>
									</tr> --}}
									<tr>
										<input type="hidden" name="slot1" id="#abc(slot1)">
										<td><input type="number" name="test1[]" placeholder="Enter 1Value"></td>
										<td><input type="number" name="test2[]" placeholder="Enter 1Value"></td>
										<td><input type="number" name="test3[]" placeholder="Enter 1Value"></td>
									</tr>
									<tr>
										<input type="hidden" name="slot2">
										<td><input type="number" name="test1[]" placeholder="Enter 2Value"></td>
										<td><input type="number" name="test2[]" placeholder="Enter 2Value"></td>
										<td><input type="number" name="test3[]" placeholder="Enter 2Value"></td>
									</tr>
									<tr>
										<input type="hidden" name="slot3">
										<td><input type="number" name="test1[]" placeholder="Enter 3-Value"></td>
										<td><input type="number" name="test2[]" placeholder="Enter 3-Value"></td>
										<td><input type="number" name="test3[]" placeholder="Enter 3-Value"></td>
									</tr>
									
								</table>
								<input type="submit" value="submit"/>
							</form>
								{{-- <input type="button" value="Add New Row" onclick="addRow();" id="rowButton" /> --}}
								<input type="button" value="Add New Column" onclick="addColumn();" id="columnButton" />
							
						</div>
					</form>	
				</div>
			</div>
		</div>
	</div>

	<script>
	// function addRow() {
	// 	var table = document.getElementById("main");
	// 	var rws = table.rows;
	// 	var cols = table.rows[0].cells.length;
	// 	var row = table.insertRow(rws.length);
	// 	var cell;
	// 	for(var i=0;i<cols;i++){
	// 		var j = i+1;
	// 		cell = row.insertCell(i);
			
	// 		cell.innerHTML = '<input type="text" name="test'+j+'[]" placeholder="Enter '+j+'Value">';
	// 	}
	// }

	function addColumn() {
		var table = document.getElementById("main");
		var rws = table.rows;
		var cols = table.rows[1].cells.length;
		var cell;
		for(var i=0;i<rws.length;i++){
			var j = i+3;
			cell = rws[i].insertCell(cols);
			cell.innerHTML = '<input type="text" name="test'+ j +'[]" placeholder="Enter '+ j  +'Value">';
		}
	}
	</script>

</body>
</html>
