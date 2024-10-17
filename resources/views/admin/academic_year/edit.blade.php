@extends('admin.layout')


@section('title', 'Academic Year')

@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="mb-3 text-capitalize">Edit Academic year</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active text-capitalize">Edit Academic year</li>
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
                            <h3 class="card-title">Academic year</h3>
                        </div>
                        <form action="{{ route('academic.year.update') }}" method="POST">
                            @method('PUT')
                            @csrf

                            <input type="hidden" name="id" value="{{ $academic_y->id }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="academic_year">Academic year</label>
                                    <input type="text" name="academic_year" class="form-control @error('academic_year') is-invalid @enderror" value="{{ old('academic_year', $academic_y->academic_year) }}" id="academic_year" placeholder="2024-2025">
                                    @error('academic_year')
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
