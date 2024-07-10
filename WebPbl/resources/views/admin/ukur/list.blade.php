@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h3 class="card-title">Anak List</h3>
              </div>
              <div class="col-sm-6" style="text-align: right">
                <h1></h1>
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
                    <h3 class="card-title">Search Nama</h3>
                </div>
                <form method="get" action="">
                  {{ csrf_field() }}
                  <div class="card-body">
                    <div class="row">
                      <div class="form-group col-md-3">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="name" value="{{ Request::get('name') }}" placeholder="name">
                      </div>
                      <div class="form-group col-md-3">
                        <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                        <a href="{{ url('admin/class/list') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                      </div>
                    </div>
                  </div>
                </form>
            </div>

            @include('_message')
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Anak List</h3>
                </div>

                @php
                  use Carbon\Carbon;
                @endphp

                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Umur</th>
                        <th>Jenis Kelamin</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($getRecord as $value)
                      <tr>
                        <td>{{ $value->id }}</td>
                        <td>
                          @if (!empty($value->getProfile()))
                            <img src="{{ $value->getProfile() }}" style="height: 50px; width: 50px; border-radius: 50%;" alt="">
                          @endif
                        </td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->alamat }}</td>
                        <td>{{ round(Carbon::parse($value->tgl_lahir)->diffInMonths(Carbon::now())) }} Bulan</td>
                        <td>{{ $value->gender }}</td>
                        <td>
                          @if($value->status == 0)
                            Aktif
                          @else
                            Tidak Aktif
                          @endif
                        </td>
                        <td>
                            <a href="{{ route('measurements.create', ['userId' => $value->id]) }}" class="btn btn-info">Mulai Mengukur</a>
                          <a href="https://www.kms-online.web.id/kms-online.php" class="btn btn-danger">Hitung</a>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                  <div style="padding: 10px; float: right;">
                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
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
