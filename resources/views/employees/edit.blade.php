@extends('employees.layout')
@section('content')

    <div class="card">
        <div class="card-header">Input Page</div>
        <div class="card-body">

            <form action="{{ url('employee/' .$employee->id) }}" method="post">
                {!! csrf_field() !!}
                @method("PATCH")
                <input type="hidden" name="id" value="{{ $employee->id }}">
                <label for="FIRSTNAME">Firstname</label></br>
                <input type="text" name="FIRSTNAME" id="FIRSTNAME" value="{{ $employee->FIRSTNAME }}" class="form-control"></br>
                <label for="LASTNAME">Lastname</label></br>
                <input type="text" name="LASTNAME" id="LASTNAME" value="{{ $employee->LASTNAME }}" class="form-control"></br>
                <label>Gender</label></br>
                <input type="radio" name="GENDER" value="male" id="GENDER" {{ $employee->GENDER == 'male' ? 'checked' : '' }}> Male</br>
                <input type="radio" name="GENDER" value="female" id="GENDER" {{ $employee->GENDER == 'female' ? 'checked' : '' }}> Female</br>
                </br>
                <label>Address</label></br>
                <input type="text" name="ADDRESS" id="ADDRESS" value="{{ $employee->ADDRESS }}" class="form-control"></br>
                <label>DOB</label></br>
                <input type="date" name="DOB" id="DOB" value="{{ $employee->DOB }}" class="form-control"></br>
                <label for="DEPARTMENT">Department</label></br>
                <select name="DEPT_ID" id="DEPT_ID" class="form-control">
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}" {{ $employee->DEPT_ID == $department->id ? 'selected' : '' }}>{{ $department->NAME }}</option>
                    @endforeach
                </select></br>
                <label>Status</label></br>
                <input type="radio" name="STATUS" value="cont" id="STATUS" {{ $employee->STATUS == 'cont' ? 'checked' : '' }}> Contract</br>
                <input type="radio" name="STATUS" value="emp" id="STATUS" {{ $employee->STATUS == 'emp' ? 'checked' : '' }}> Employee</br>
                <input type="radio" name="STATUS" value="no_act" id="STATUS" {{ $employee->STATUS == 'no_act' ? 'checked' : '' }}> Not Active</br>
                </br>
                <input type="submit" value="Update" class="btn btn-success"></br>
            </form>

        </div>
    </div>

@stop
