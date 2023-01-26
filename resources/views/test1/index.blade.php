<html>
	<head>
		<title>Bootstrap Example</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
		<style>
			.bootstrap-select{
				width: 100% !important;
			}
		</style>


	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<form action="{{ route('addTest')}}" method="POST">
						@csrf
						<div class="row">
							<div class="col-md-6 mb-3">
								<label for="exampleInputEmail1" class="form-label">Name</label>
								<input type="name" class="form-control" id="name" name="name" >
							</div>
							<div class="col-md-6 mb-3">
								<label  class="form-label">price</label>
								<input type="number" class="form-control" id="price" name="price">
							</div>
							<div class="col-md-6 mb-3">
								<select class="selectpicker"  multiple="multiple" id="varient" name="varient[]">
									<option value="L">L</option>
									<option value="M">M</option>
									<option value="S">S</option>
								</select>
							</div>	
							<div class="col-md-6 mb-3">
								<select class="selectpicker"  multiple="multiple" id="category" name="category[]">
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									<option value="Child">Child</option>
								</select>
							</div>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
						
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
	</body>
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>


<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
	<script>
		$(document).ready(function() {
			$('.selectpicker').selectpicker();
		});
	</script>
</html>
