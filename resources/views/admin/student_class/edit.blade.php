@extends('admin.layout')


@section('title', 'Student class name')

@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="mb-3 text-capitalize">Edit Student class name</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-capitalize">Edit Student class name</li>
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
                            <h3 class="card-title">Student class name</h3>
                        </div>
                        <form action="{{ route('student.class.update') }}" method="POST">
                            @method('PUT')
                            @csrf

                            <input type="hidden" name="id" value="{{ $student_class->id }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="class_name">Student class name</label>
                                    <input type="text" name="class_name" class="form-control @error('class_name') is-invalid @enderror" value="{{ old('class_name', $student_class->class_name) }}" id="class_name" placeholder="Enter class name">
                                    @error('class_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
