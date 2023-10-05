<html lang="en">
<head>
  <title>Import Export </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="container">
	<h3>Import Export </h3>
	<form action="{{ route('import') }}" method="POST" name="importform"
	  enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label for="file">File:</label>
			<input id="file" type="file" name="file" class="form-control">
		</div>
		<div class="form-group">
			<a class="btn btn-info" href="{{ route('export') }}">Export File</a>
		</div> 
		<button class="btn btn-success">Import File</button>
	</form>
</div>
</body>
</html>