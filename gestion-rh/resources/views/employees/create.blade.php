blade
     @extends('layouts.app')

     @section('content')
     <div class="container">
         <h1>Add Employee</h1>
         <form action="{{ route('employees.store') }}" method="POST">
             @csrf
             <div class="form-group">
                 <label>First Name</label>
                 <input type="text" name="first_name" class="form-control" required>
             </div>
             <div class="form-group">
                 <label>Last Name</label>
                 <input type="text" name="last_name" class="form-control" required>
             </div>
             <div class="form-group">
                 <label>Email</label>
                 <input type="email" name="email" class="form-control" required>
             </div>
             <div class="form-group">
                 <label>Phone</label>
                 <input type="text" name="phone" class="form-control">
             </div>
             <div class="form-group">
                 <label>Hire Date</label>
                 <input type="date" name="hire_date" class="form-control" required>
             </div>
             <div class="form-group">
                 <label>Position</label>
                 <input type="text" name="position" class="form-control" required>
             </div>
             <div class="form-group">
                 <label>Salary</label>
                 <input type="number" name="salary" class="form-control" required>
             </div>
             <button type="submit" class="btn btn-primary">Save</button>
         </form>
     </div>
     @endsection
     