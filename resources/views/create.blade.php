@extends('layout')
@section('content')

<meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
       <style>
  .btn-default {
      box-shadow: 2px 4px 10px #000000;   
  }
  .btn-success {
      box-shadow: 2px 4px 10px #000000;   
  }
  </style>
    </head>
   
   <body>
      <div class = "container">
      <h3 class="glyphicon glyphicon-user">Add 	Info</h3><br><br>
        <form method="post" action="{{ action('EmpInfoController@store') }}" autocomplete="off"> 
		{{csrf_field()  }}
        <label>Name</label><input style="border-left:5px solid #00b300; width:500px;" type="text" class="form-control" name="emp_name"><br>

		<label>Project </label><input style="border-left:5px solid #00b300; width:500px;" type="text" class="form-control" name="emp_department"><br>
		<label>Department</label> 

		<input style="border-left:5px solid #00b300; width:500px;" type="text" class="form-control" name="project" ><br>
		<table>
			<tr>            
		<div style="margin-left:300px;"><br>
		<td>
			<a href="{{ action('EmpInfoController@index') }}" style="margin-left:350px;" class="btn btn-default">Cancel</a>
		</td>
        <td>
        	<input style="margin-left:30px;" type="submit" name="submit" value="Add" class="btn btn-success" style="width:100px;"></div>
        </td></tr>
		</table>
			
		</form>
@endsection