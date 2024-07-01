<!-- resources/views/admin/ukur/add.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add New Measurement</div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('admin/ukur/add') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="height" class="col-md-4 col-form-label text-md-right">Height (cm)</label>

                                <div class="col-md-6">
                                    <input id="height" type="number" class="form-control @error('height') is-invalid @enderror" name="height" value="{{ old('height') }}" required autofocus>

                                    @error('height')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="weight" class="col-md-4 col-form-label text-md-right">Weight (kg)</label>

                                <div class="col-md-6">
                                    <input id="weight" type="number" class="form-control @error('weight') is-invalid @enderror" name="weight" value="{{ old('weight') }}" required>

                                    @error('weight')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Add Measurement
                                    </button>
                                    <a href="{{ url('admin/ukur/list') }}" class="btn btn-secondary">
                                        Cancel
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
