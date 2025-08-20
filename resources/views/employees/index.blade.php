@extends('employees.layout')
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2>Tes Magang</h2>
                    </div>
                    <div class="card-body">
                        @if (Auth::user()->role == 'admin')
                            <a href="{{ url('/employee/create') }}" class="btn btn-success btn-sm" title="Add New Employee">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add New
                            </a>
                        @endif
                        <br />
                        <br />
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>FIRSTNAME</th>
                                        <th>LASTNAME</th>
                                        <th>GENDER</th>
                                        <th>ADDRESS</th>
                                        <th>DOB</th>
                                        <th>DEPT</th>
                                        <th>STATUS</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->FIRSTNAME }}</td>
                                            <td>{{ $item->LASTNAME }}</td>
                                            <td>{{ $item->GENDER }}</td>
                                            <td>{{ $item->ADDRESS }}</td>
                                            <td>{{ $item->DOB }}</td>
                                            <td>{{ $item->department->NAME }}</td>
                                            <td>
                                                @if ($item->STATUS == 'cont')
                                                    Contract
                                                @elseif($item->STATUS == 'emp')
                                                    Employee
                                                @elseif($item->STATUS == 'no_act')
                                                    Not Active
                                                @else
                                                    Unknown
                                                @endif
                                            </td>

                                            <td>
                                                {{-- <a href="{{ url('/employee/' . $item->id) }}" title="View Employee"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a> --}}
                                                @if (Auth::user()->role == 'admin')
                                                    <a href="{{ url('/employee/' . $item->id . '/edit') }}"
                                                        title="Edit Employee"><button class="btn btn-primary btn-sm"><i
                                                                class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                            Edit</button></a>

                                                    <form method="POST" action="{{ url('/employee' . '/' . $item->id) }}"
                                                        accept-charset="UTF-8" style="display:inline">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            title="Delete Employee"
                                                            onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                                class="fa fa-trash-o" aria-hidden="true"></i>
                                                            Delete</button>
                                                    </form>
                                                @endif
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="card mt-4">
                            <div class="card-header">
                                <h3>Employee Report</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Status</th>
                                                <th>Total Employees</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($summaryStatus as $status)
                                                <tr>
                                                    <td>
                                                        @if ($status->STATUS == 'cont')
                                                            Contract
                                                        @elseif($status->STATUS == 'emp')
                                                            Employee
                                                        @elseif($status->STATUS == 'no_act')
                                                            Not Active
                                                        @else
                                                            Grand Total
                                                        @endif
                                                    </td>
                                                    <td>{{ $status->TOTAL }}</td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-4">
                            <div class="card-header">
                                <h3>Employee Status Report by Department</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Department</th>
                                                <th>Contract</th>
                                                <th>Employee</th>
                                                <th>Not Active</th>
                                                <th>Grand Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($statusEmployeePerDepartment as $dept)
                                                <tr>
                                                    <td>{{ $dept->DEPARTMENT }}</td>
                                                    <td>{{ $dept->Contract }}</td>
                                                    <td>{{ $dept->Employee }}</td>
                                                    <td>{{ $dept->NotActive }}</td>
                                                    <td>{{ $dept->Total }}</td>

                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
