@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit New Anak</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <div class="card card-primary">
                <form method="POST" action="" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="card-body">
                    <div class="row">
                      <!-- Row 1 -->
                      <div class="form-group col-md-6">
                        <label>Nama</label>
                        <input type="text" class="form-control" value="{{ old('name',$getRecord->name) }}" name="name" required placeholder="Name">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control" value="{{ old('tmp_lahir',$getRecord->tmp_lahir) }}" name="tmp_lahir" required placeholder="Tempat Lahir">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Email</label>
                        <input type="text" class="form-control" value="{{ old('email',$getRecord->email) }}" name="email" required placeholder="Email">
                      </div>

                      <!-- Row 2 -->

                      <div class="form-group col-md-6">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" value="{{ old('tgl_lahir',$getRecord->tgl_lahir) }}" name="tgl_lahir" required placeholder="Tanggal Lahir">
                      </div>

                      <!-- Row 3 -->
                      <div class="form-group col-md-6">
                        <label>Alamat</label>
                        <input type="text" class="form-control" value="{{ old('alamat',$getRecord->alamat) }}" name="alamat" required placeholder="Alamat">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Jenis Kelamin</label>
                        <select name="gender" class="form-control" value="{{ old('alamat',$getRecord->gender) }}" id="gender">
                          <option value="">Pilih Jenis Kelamin</option>
                          <option {{ (old('gender',$getRecord->gender) =='Laki - Laki') ? 'selected' : '' }} value="Laki - Laki">Laki-Laki</option>
                          <option {{ (old('gender',$getRecord->gender) =='Perempuan') ? 'selected' : '' }} value="Perempuan">Perempuan</option>
                          <option {{ (old('gender',$getRecord->gender) =='Lainnya') ? 'selected' : '' }} value="Lainnya">Lainnya</option>
                        </select>
                      </div>

                      <!-- Row 4 -->

                      <div class="form-group col-md-6">
                        <label>Nama Ibu</label>
                        <input type="text" class="form-control" value="{{ old('nm_ibu',$getRecord->nm_ibu) }}" name="nm_ibu" placeholder="Nama Ibu">
                      </div>

                      <!-- Row 5 -->
                      <div class="form-group col-md-6">
                        <label>Tempat Lahir Ibu</label>
                        <input type="text" class="form-control" value="{{ old('tmp_lahir_ibu',$getRecord->tmp_lahir_ibu) }}" name="tmp_lahir_ibu" placeholder="Tempat Lahir">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Tanggal Lahir Ibu</label>
                        <input type="date" class="form-control" value="{{ old('tgl_lahir_ibu',$getRecord->tgl_lahir_ibu) }}" name="tgl_lahir_ibu" placeholder="Tanggal Lahir">
                      </div>

                      <!-- Row 6 -->
                      <div class="form-group col-md-6">
                        <label>Nama Ayah</label>
                        <input type="text" class="form-control" value="{{ old('nm_ayah',$getRecord->nm_ayah) }}" name="nm_ayah" required placeholder="Nama Ayah">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Tempat Lahir Ayah</label>
                        <input type="text" class="form-control" value="{{ old('tmp_lahir_ayah',$getRecord->tmp_lahir_ayah) }}" name="tmp_lahir_ayah" required placeholder="Tempat Lahir">
                      </div>

                      <!-- Row 7 -->
                      <div class="form-group col-md-6">
                        <label>Tanggal Lahir Ayah</label>
                        <input type="date" class="form-control" value="{{ old('tgl_lahir_ayah',$getRecord->tgl_lahir_ayah) }}" name="tgl_lahir_ayah" required placeholder="Tanggal Lahir">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" required placeholder="Password">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Foto</label>
                        <input type="file" class="form-control" name="profile" placeholder="Profile" value="{{old('profile')}}">
                        @if (!empty($getRecord->getProfile()))
                        <img src="{{$getRecord->getProfile()}}" style="height: 50px; width=50px; border-radius: 50px" alt="">
                       @endif
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
            </div>
            <!--/.col (left) -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>

    <!-- /.content -->
  </div>

@endsection
