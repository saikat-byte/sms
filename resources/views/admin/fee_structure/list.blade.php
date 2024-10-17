@extends('admin.layout')


@section('title', 'Table')

@section('customCss')
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

@endsection

@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-capitalize">Fee strucre list</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Fee strucre list</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @include('message')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title text-capitalize">Fee strucre list</h3> </br>
                          <form action="">
                            <div class="row">
                                <div class="col-md-2 col-sm-12 ">
                                    <div class="form-group">
                                        <label for="academic_year">Select Academic year</label>
                                        <select class="form-control  @error('academic_years_id') @enderror" name="academic_years_id" id="academic_years_id">
                                            <option value="" selected>Select academy year</option>
                                            @foreach ($academic_year as $year)
                                            <option value="{{ $year->id }}">{{ $year->academic_year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-12 ">
                                    <div class="form-group">
                                        <label for="january">Select class</label>
                                        <select class="form-control @error('student_classes_id') @enderror" name="student_classes_id" id="class_name">
                                            <option value="" selected>Select class</option>
                                            @foreach ($class_name as $class)
                                            <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Filter</button>
                          </form>
                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Academy year</th>
                                        <th>Class name</th>
                                        <th>Fee head name</th>
                                        <th>January</th>
                                        <th>February</th>
                                        <th>March</th>
                                        <th>April</th>
                                        <th>May</th>
                                        <th>June</th>
                                        <th>July</th>
                                        <th>August</th>
                                        <th>September</th>
                                        <th>October</th>
                                        <th>November</th>
                                        <th>December</th>
                                        <th>Created_at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)

                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->AcademicYear->academic_year }}</td>
                                        <td>{{ $item->StudentClasses->class_name }}</td>
                                        <td>{{ $item->FeeHead->name }}</td>
                                        <td>{{ $item->january }}</td>
                                        <td>{{ $item->february }}</td>
                                        <td>{{ $item->march }}</td>
                                        <td>{{ $item->april }}</td>
                                        <td>{{ $item->may }}</td>
                                        <td>{{ $item->june }}</td>
                                        <td>{{ $item->july }}</td>
                                        <td>{{ $item->august }}</td>
                                        <td>{{ $item->september }}</td>
                                        <td>{{ $item->october }}</td>
                                        <td>{{ $item->november }}</td>
                                        <td>{{ $item->december }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <a href="{{ route('fee.structure.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('fee.structure.delete', $item->id) }}" method="POST" style="display: inline;">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

@endsection

@section('customJs')

<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true
            , "lengthChange": false
            , "autoWidth": false
            , "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true
            , "lengthChange": false
            , "searching": false
            , "ordering": true
            , "info": true
            , "autoWidth": false
            , "responsive": true
        , });
    });

</script>
@endsection
