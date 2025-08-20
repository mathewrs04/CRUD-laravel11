@extends('employees.layout')
@section('content')

    <div class="card">
        <div class="card-header">Input Page</div>
        <div class="card-body">

            <form action="{{ url('employee') }}" method="post">
                {!! csrf_field() !!}
                <label for="FIRSTNAME">Firstname</label></br>
                <input type="text" name="FIRSTNAME" id="FIRSTNAME" class="form-control"></br>
                <label for="LASTNAME">Lastname</label></br>
                <input type="text" name="LASTNAME" id="LASTNAME" class="form-control"></br>
                <label>Gender</label></br>
                <input type="radio" name="GENDER" value="male" id="GENDER"> Male</br>
                <input type="radio" name="GENDER" value="female" id="GENDER"> Female</br>
                </br>
                <label>Address</label></br>
                <input type="text" name="ADDRESS" id="ADDRESS" class="form-control"></br>
                <label>DOB</label></br>
                <input type="date" name="DOB" id="DOB" class="form-control"></br>
                <label for="DEPARTMENT">Department</label></br>
                <select name="DEPT_ID" id="DEPT_ID" class="form-control">
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->NAME }}</option>
                    @endforeach
                </select></br>
                <label>Status</label></br>
                <input type="radio" name="STATUS" value="cont" id="STATUS"> Contract</br>
                <input type="radio" name="STATUS" value="emp" id="STATUS"> Employee</br>
                <input type="radio" name="STATUS" value="no_act" id="STATUS"> Not Active</br>
                </br>
                <input type="submit" value="Save" class="btn btn-success"></br>
            </form>

        </div>
    </div>

@stop
