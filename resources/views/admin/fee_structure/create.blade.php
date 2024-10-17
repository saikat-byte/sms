@extends('admin.layout')


@section('title', 'Fee structure')

@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="mb-3">Fee structure</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Fee structure</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            @include('message')

            <div class="row">

                <div class="col-md-12">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Fee structure</h3>
                        </div>

                        <form action="{{ route('fee.structure.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12 ">
                                        <div class="form-group">
                                            <label for="academic_year">Select Academic year</label>
                                            <select class="form-control  @error('academic_years_id') @enderror" name="academic_years_id" id="academic_years_id">
                                                <option value="" selected>Select academy year</option>
                                                @foreach ($academic_year as $year)
                                                <option value="{{ $year->id }}">{{ $year->academic_year }}</option>
                                                @endforeach
                                            </select>
                                            @error('academic_years_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12 ">
                                        <div class="form-group">
                                            <label for="january">Select class</label>
                                            <select class="form-control @error('student_classes_id') @enderror" name="student_classes_id" id="class_name">
                                                <option value="" selected>Select class</option>
                                                @foreach ($class_name as $class)
                                                <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('student_classes_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12 ">
                                        <div class="form-group">
                                            <label for="fee_name">Select Fee Head</label>
                                            <select class="form-control  @error('fee_heads_id') @enderror" name="fee_heads_id" id="fee_heads_id">
                                                <option value="" selected>Select academy year</option>
                                                @foreach ($fee_head as $fee)
                                                <option value="{{ $fee->id }}">{{ $fee->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('fee_heads_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 col-sm-12 ">
                                        <div class="form-group">
                                            <label for="january">January</label>
                                            <input type="text" name="january" class="form-control" value="{{ old('january')}}" placeholder="Enter fees of January">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12 ">
                                        <div class="form-group">
                                            <label for="february">February</label>
                                            <input type="text" name="february" class="form-control" value="{{ old('february')}}" placeholder="Enter fees of february">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12 ">
                                        <div class="form-group">
                                            <label for="march">March</label>
                                            <input type="text" name="march" class="form-control" value="{{ old('march')}}" placeholder="Enter fees of march">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12 ">
                                        <div class="form-group">
                                            <label for="april">April</label>
                                            <input type="text" name="april" class="form-control" value="{{ old('april')}}" placeholder="Enter fees of april">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12 ">
                                        <div class="form-group">
                                            <label for="may">May</label>
                                            <input type="text" name="may" class="form-control" value="{{ old('may')}}" placeholder="Enter Fees of may">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12 ">
                                        <div class="form-group">
                                            <label for="june">June</label>
                                            <input type="text" name="june" class="form-control" value="{{ old('june')}}" placeholder="Enter Fees of june">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12 ">
                                        <div class="form-group">
                                            <label for="july">July</label>
                                            <input type="text" name="july" class="form-control" value="{{ old('july')}}" placeholder="Enter Fees of july">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12 ">
                                        <div class="form-group">
                                            <label for="august">auguest</label>
                                            <input type="text" name="august" class="form-control" value="{{ old('august')}}" placeholder="Enter Fees of august">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12 ">
                                        <div class="form-group">
                                            <label for="september">September</label>
                                            <input type="text" name="september" class="form-control" value="{{ old('september')}}" placeholder="Enter Fees of september">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12 ">
                                        <div class="form-group">
                                            <label for="october">October</label>
                                            <input type="text" name="october" class="form-control" value="{{ old('october')}}" placeholder="Enter Fees of october">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12 ">
                                        <div class="form-group">
                                            <label for="november">November</label>
                                            <input type="text" name="november" class="form-control" value="{{ old('november')}}" placeholder="Enter Fees of november">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12 col-4">
                                        <div class="form-group">
                                            <label for="december">December</label>
                                            <input type="text" name="december" class="form-control" value="{{ old('december')}}" placeholder="Enter Fees of december">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </section>

</div>


@endsection
