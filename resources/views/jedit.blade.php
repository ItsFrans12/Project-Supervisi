@extends('layout')

@if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <header class="bg-primary">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12">
          <h1 class="display-4 text-white mt-5 mb-2">Tambah Jadwal</h1>
          <div class="container">

    <form action="{{route('jadwal.store')}}" method="POST">
    	@csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">File Nilai</label>
      <input type="text" name="file_nilai" class="form-control" value="{{ $upload->file_nilai }}" id="inputEmail4" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">File Absensi</label>
      <input type="text" name="file_absensi" class="form-control" id="inputPassword4" >
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputAddress">File RPP</label>
    <input type="text" name="file_RPP" class="form-control" id="inputAddress" >
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress2">Guru</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Jadwal</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Pemeriksa</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Status</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>

  <button type="submit" class="btn btn-primary">Sign in</button>
</form>
</div>
</header>


  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Frans 2020</p>
    </div>
  
  </footer>