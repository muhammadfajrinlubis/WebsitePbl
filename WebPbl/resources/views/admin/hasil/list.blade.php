@php
    use Carbon\Carbon; // Pastikan use statement ini ada
@endphp
@extends('layouts.app')


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Anak</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <!-- Optional: add any header content here -->
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Cari Nama</h3>
                        </div>
                        <form method="get" action="">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="name" value="{{ Request::get('name') }}" placeholder="Nama">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Cari</button>
                                        <a href="{{ url()->current() }}" class="btn btn-success" style="margin-top: 30px;">Reset</a> <!-- Mengarahkan ke URL saat ini -->
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    @include('_message')

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Anak</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Umur</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tinggi Badan (cm)</th>
                                        <th>Berat Badan (kg)</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getRecord as $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $value->user->name }}</td>
                                        <td>{{ round(Carbon::parse($value->user->tgl_lahir)->diffInMonths(Carbon::now())) }} Bulan</td>
                                        <td>{{ $value->user->gender }}</td>
                                        <td>{{ $value->tinggi }}</td>
                                        <td>{{ $value->berat }}</td>
                                        <td>
                                             <a href="https://www.kms-online.web.id/kms-online.php" class="btn btn-danger">Hitung</a>
                                        </td>
                                        {{-- <td>

                                            <a href="{{ route('anak.chart', $value->user->id) }}" class="btn btn-info">Grafik</a>
                                        </td> --}}




                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div style="padding: 10px; float: right;">
                                {!! $getRecord->appends(request()->except('page'))->links() !!}
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection
