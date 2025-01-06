blade
@extends('layouts.app')

   @section('content')
   <div class="container">
       <h1>Employees</h1>
       <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Add Employee</a>
       @if(session('success'))
           <div class="alert alert-success">{{ session('success') }}</div>
       @endif
       <table class="table">
           <thead>
               <tr>
                   <th>#</th>
                   <th>First Name</th>
                   <th>Last Name</th>
                   <th>Email</th>
                   <th>Phone</th>
                   <th>Hire Date</th>
                   <th>Position</th>
                   <th>Salary</th>
                   <th>Actions</th>
               </tr>
           </thead>
           <tbody>
               @foreach($employees as $employee)
                   <tr>
                       <td>{{ $employee->id }}</td>
                       <td>{{ $employee->first_name }}</td>
                       <td>{{ $employee->last_name }}</td>
                       <td>{{ $employee->email }}</td>
                       <td>{{ $employee->phone }}</td>
                       <td>{{ $employee->hire_date }}</td>
                       <td>{{ $employee->position }}</td>
                       <td>{{ $employee->salary }}</td>
                       <td>
                           <a href="{{ route('employees.edit', $employee) }}" class="btn btn-sm btn-warning">Edit</a>
                           <form action="{{ route('employees.destroy', $employee) }}" method="POST" style="display:inline-block;">
                               @csrf
                               @method('DELETE')
                               <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                           </form>
                       </td>
                   </tr>
               @endforeach
           </tbody>
       </table>
   </div>
   @endsection
   