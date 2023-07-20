# ajax-crud-laravel
https://www.fundaofwebit.com/post/laravel-8-ajax-crud-with-example



Funda Coder

1. php artisan make:model Trainee -mc
2. Trainee.php - Model
	<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;

	class Trainee extends Model
	{
		use HasFactory;
		protected $table = 'trainees';
		protected $fillable = [
			'name',
			'email',
			'phone',
			'course',
		]
	}

3. migration
	 
	 public function up()
		{
			Schema::create('trainees', function (Blueprint $table) {
				$table->id();
				$table->string('name');
				$table->string('email');
				$table->string('phone');
				$table->string('course');
				$table->timestamps();
			});
		}
4. php artisan migrate

5. welcome.blade.php
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Laravel CRUD</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
			integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	</head>

	<body>
		<div class="m-5">
			<h1 class="text-center mt-5 mb-4">Laravel CRUD with AJAX</h1>
			<div class="d-flex justify-content-end mb-2">
				<a href="/" class="btn btn-info btn-sm m-2">Home</a>
			</div>
			<div class="add-data border d-flex justify-content-end mb-5">
				<a href="add" data-bs-toggle="modal" data-bs-target="#AddEmployeeModal" class="btn btn-success m-2">Add Data</a>
			</div>
			@hasSection('content')
			@yield('content')
			@else
			<h1 class="text-center text-danger font-30">NO CONTENT FOUND</h1>
			@endif
		</div>


		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
		</script>
	</body>

	</html>

6. trainee folder inside views - index.blade.php
	index.blade.php
	@extends('welcome')
	@section('content')

	<!-- AddEmployeeModal -->
	<div class="modal fade" id="AddEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		  <div class="modal-content">
			<div class="modal-header">
			  <h1 class="modal-title fs-5" id="exampleModalLabel">Add Employee</h1>
			  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
			  <div class="form-group mb-3">
				<label for="">Employee Name</label>
				<input type="text" class="name form-control">
			  </div>
			  <div class="form-group mb-3">
				<label for="">Email</label>
				<input type="email" class="email form-control">
			  </div>
			  <div class="form-group mb-3">
				<label for="">Phone</label>
				<input type="number" class="phone form-control">
			  </div>
			  <div class="form-group mb-3">
				<label for="">Course</label>
				<input type="text" class="course form-control">
			  </div>
			  
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			  <button type="button" class="btn btn-primary add_employee">Save</button>
			</div>
		  </div>
		</div>
	</div>

	<div class="container py-5">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h4></h4>
					</div>
				</div>
			</div>
		</div>
	</div>

	@endsection
	
7. TraineeController.php
	class TraineeController extends Controller
	{
		public function index(){
			return view('trainee.index');
		}
	}
	
8. web.php
	<?php

	use Illuminate\Support\Facades\Route;
	use App\Http\Controllers\TraineeController;

	Route::get('/', function () {
		return view('welcome');
	});
	Route::get('trainees',[TraineeController::class,'index']);


9. Model - Trainee.php
	<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;

	class Trainee extends Model
	{
		use HasFactory;
		protected $table = 'trainees';
		protected $fillable = [
			'name',
			'email',
			'phone',
			'course',
		];
	}

10. welcome.blade.php
	
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    @yield('scripts')
