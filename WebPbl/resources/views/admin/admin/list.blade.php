@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h3 class="card-title">Admin List (Total : {{$getRecord->total()}})</h3>
              </div>
              <div class="col-sm-6" style="text-align: right">
                <a href="{{url('admin/admin/add')}}" class="btn btn-primary">add New Admin</a>
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
                    <h3 class="card-title">Secarch Admin </h3>
                  </div>
                <form method="get" action="">
                  {{ csrf_field()}}
                  <div class="card-body">
                    <div class="row">
                    <div class="form-group col-md-3">
                      <label >Nama</label>
                      <input type="text" class="form-control"  name="name" value=" {{Request::get('name')}} " placeholder="name">
                    </div>
                    <div class="form-group col-md-3">
                      <label >Email</label>
                      <input type="email" class="form-control" name="email" value=" {{ Request::get('email') }} "  placeholder="email">
                      <div style="color: red">{{$errors->first('email')}}</div>
                  </div>

                  <div class="form-group col-md-3">
                    <label >Date</label>
                    <input type="date" class="form-control" name="email" value=" {{ Request::get('date') }} "  placeholder="Date">

                </div>
                  <div class="form-group col-md-3">
                    <button class="btn btn-primary" type="submit" style="margin-top : 30px;">Secarch</button>
                    <a href="{{url('admin/admin/list')}}" class="btn btn-success" style="margin-top : 30px;">Clear</a>
                  </div>

                </form>
            </div>
              </div>

            @include('_message')
            <div class="card">


              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Create Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($getRecord as $value)
                    <tr>
                      <td>{{$value->id}}</td>
                      <td>{{$value->name}}</td>
                      <td>{{$value->email}}</td>
                      <td>{{date('d-m-Y h:i A',strtotime ($value->created_at))}}</td>
                      <td>
                        <a href="{{url('admin/admin/edit/'.$value->id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{url('admin/admin/delete/'.$value->id)}}" class="btn btn-danger">Delete</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              <div style="padding: 10px; float: right;">
                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
