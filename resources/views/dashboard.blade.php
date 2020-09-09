@extends('layout')

@if(session('success'))
<div class="alert alert-success">
  {{session('success')}}
</div>
@endif

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

@if (Auth()->user()->level == 'guru')	

	 <header class="bg-primary">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12">
          <h1 class="display-4 text-white mt-5 mb-2">Upload</h1>
          <div class="container">

@if(session('success'))
<div class="alert alert-success">
  {{session('success')}}
</div>
@endif

   	<form action="file-upload.post" method="POST" enctype="multipart/form-data">
	{{ csrf_field() }}
    <div class="form-group col-md-6">
      <label for="inputEmail4">File Nilai</label>
      <input type="file" class="form-control" id="inputEmail4" name="file_nilai"	> 
 
    <label for="inputAddress">File Absen</label>
    <input type="file" class="form-control" id="inputAddress" name="file_absensi">

  
    <label for="inputAddress2">File RPP</label>
    <input type="file" class="form-control" id="inputAddress2" name="file_RPP">

      <label class="mr-sm-2" for="inlineFormCustomSelect">Guru</label>
      <input class="form-control"  type="text" name="guru" value="{{ ucfirst(Auth()->user()->name) }}" readonly>
<br>
<br>
  <button type="submit" class="btn btn-light ">Submit</button>
</div>
</div>
</form>
</header>


  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Frans 2020</p>
    </div>
  
  </footer>

  @elseif(Auth()->user()->level == 'kurikulum')
   <header class="bg-primary">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12">
          <h1 class="display-4 text-white mt-5 mb-2">Jadwal</h1>
          <div class="container">
            @if(session('success'))
<div class="alert alert-success">
  {{session('success')}}
</div>
@endif
  <table class="table table-bordered table-light">
  	<thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>File Nilai</th>
            <th>File Absensi</th>
            <th>File RPP</th>
            <th>Guru</th>
            <th>Jadwal</th>
            <th>Pemeriksa</th>
            <th>Status</th>
            <th width="auto">Action</th>
        </tr>
</thead>  
            @foreach ($coba as $upload)
          <form action="{{ route('jadwal.update',$upload->id) }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$upload->id}}">
        <tr>
            <td>{{ $upload->id }}</td>
            <td>{{ $upload->file_nilai }}</td>
            <td>{{ $upload->file_absensi }}</td>
            <td>{{ $upload->file_RPP }}</td>
            <td>{{ $upload->guru }}</td>
            @if($upload->jadwal == ' ')
            <td><input type="date" id="jadwal" name="jadwal"></td>
            @else          
            <td>{{ $upload->jadwal }}</td>
            @endif
            @if($upload->pemeriksa == ' ')
            <td><input type="text" id="jadwal" name="pemeriksa"></td>
            @else
            <td>{{ $upload->pemeriksa }}</td>
            @endif
            <td>{{ $upload->status }}</td>
            <td>
   			@csrf
        @method('PUT')
   			<button type="submit" class="btn btn-dark ">Update</button>
   			@endforeach
            </form>
            </td>
        </tr>
    </table> 
</div>
</div>
</div>
</div>
</header>
<footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Frans 2020</p>
    </div>
@elseif(Auth()->user()->level == 'supervisor')
   <header class="bg-primary">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12">
          <h1 class="display-4 text-white mt-5 mb-2">Penilaian</h1>
          <div class="container">

          @if(session('success'))
<div class="alert alert-success">
  {{session('success')}}
</div>
@endif

  <table class="table table-bordered table-light">
  	<thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>File Nilai</th>
            <th>File Absensi</th>
            <th>File RPP</th>
            <th>Guru</th>
            <th>Jadwal</th>
            <th>Pemeriksa</th>
            <th>Status</th>
            <th width="auto">Action</th>
        </tr>
</thead>
        @foreach ($coba as $upload)
        <form action="{{ route('status.update',$upload->id) }}" method="POST">
          @csrf
          <input type="hidden" name="id" value="{{$upload->id}}">
        <tr>
            <td>{{ $upload->id }}</td>
            <td>{{ $upload->file_nilai }}</td>
            <td>{{ $upload->file_absensi }}</td>
            <td>{{ $upload->file_RPP }}</td>
            <td>{{ $upload->guru }}</td>
            <td>{{ $upload->jadwal }}</td>
            <td>{{ $upload->pemeriksa }}</td>
            @if( $upload->status == ' ')
            <td><select name="status" >
  			<option value="Terima">Terima</option>
  			<option value="Tolak">Tolak</option>
  		</td>
			</select>
             @else
            <td>{{ $upload->status }}</td>
            @endif
            <td>
            
   			@csrf
        @method('PUT')
   			<button type="submit" class="btn btn-dark ">Update</button>
   			@endforeach
            </form>
            </td>
        </tr>
    </table> 
</div>
</div>
</div>
</div>
</header>
<footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Frans 2020</p>
    </div>
    @elseif(Auth()->user()->level == 'kepala')
    <header class="bg-primary">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12">
          <h1 class="display-4 text-white mt-5 mb-2">Laporan</h1>
          <div class="container">
  <table class="table table-bordered table-light">
  	<thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>File Nilai</th>
            <th>File Absensi</th>
            <th>File RPP</th>
            <th>Guru</th>
            <th>Jadwal</th>
            <th>Pemeriksa</th>
            <th>Status</th>
        </tr>
</thead>
        @foreach ($coba as $upload)
        <tr>
            <td>{{ $upload->id }}</td>
            <td>{{ $upload->file_nilai }}</td>
            <td>{{ $upload->file_absensi }}</td>
            <td>{{ $upload->file_RPP }}</td>
            <td>{{ $upload->guru }}</td>
            <td>{{ $upload->jadwal }}</td>
            <td>{{ $upload->pemeriksa }}</td>
            <td>{{ $upload->status }}</td>
        </tr>
        @endforeach
    </table> 
</div>
</div>
</div>
</div>
</header>
<footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Frans 2020</p>
    </div>
@endif
