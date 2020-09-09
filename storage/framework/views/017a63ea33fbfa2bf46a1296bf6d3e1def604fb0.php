<?php if(session('success')): ?>
<div class="alert alert-success">
  <?php echo e(session('success')); ?>

</div>
<?php endif; ?>

<?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

<?php if(Auth()->user()->level == 'guru'): ?>	

	 <header class="bg-primary">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12">
          <h1 class="display-4 text-white mt-5 mb-2">Upload</h1>
          <div class="container">

<?php if(session('success')): ?>
<div class="alert alert-success">
  <?php echo e(session('success')); ?>

</div>
<?php endif; ?>

   	<form action="file-upload.post" method="POST" enctype="multipart/form-data">
	<?php echo e(csrf_field()); ?>

    <div class="form-group col-md-6">
      <label for="inputEmail4">File Nilai</label>
      <input type="file" class="form-control" id="inputEmail4" name="file_nilai"	> 
 
    <label for="inputAddress">File Absen</label>
    <input type="file" class="form-control" id="inputAddress" name="file_absensi">

  
    <label for="inputAddress2">File RPP</label>
    <input type="file" class="form-control" id="inputAddress2" name="file_RPP">

      <label class="mr-sm-2" for="inlineFormCustomSelect">Guru</label>
      <input class="form-control"  type="text" name="guru" value="<?php echo e(ucfirst(Auth()->user()->name)); ?>" readonly>
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

  <?php elseif(Auth()->user()->level == 'kurikulum'): ?>
   <header class="bg-primary">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12">
          <h1 class="display-4 text-white mt-5 mb-2">Jadwal</h1>
          <div class="container">
            <?php if(session('success')): ?>
<div class="alert alert-success">
  <?php echo e(session('success')); ?>

</div>
<?php endif; ?>
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
            <?php $__currentLoopData = $coba; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upload): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <form action="<?php echo e(route('jadwal.update',$upload->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="id" value="<?php echo e($upload->id); ?>">
        <tr>
            <td><?php echo e($upload->id); ?></td>
            <td><?php echo e($upload->file_nilai); ?></td>
            <td><?php echo e($upload->file_absensi); ?></td>
            <td><?php echo e($upload->file_RPP); ?></td>
            <td><?php echo e($upload->guru); ?></td>
            <?php if($upload->jadwal == ' '): ?>
            <td><input type="date" id="jadwal" name="jadwal"></td>
            <?php else: ?>          
            <td><?php echo e($upload->jadwal); ?></td>
            <?php endif; ?>
            <?php if($upload->pemeriksa == ' '): ?>
            <td><input type="text" id="jadwal" name="pemeriksa"></td>
            <?php else: ?>
            <td><?php echo e($upload->pemeriksa); ?></td>
            <?php endif; ?>
            <td><?php echo e($upload->status); ?></td>
            <td>
   			<?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
   			<button type="submit" class="btn btn-dark ">Update</button>
   			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php elseif(Auth()->user()->level == 'supervisor'): ?>
   <header class="bg-primary">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12">
          <h1 class="display-4 text-white mt-5 mb-2">Penilaian</h1>
          <div class="container">

          <?php if(session('success')): ?>
<div class="alert alert-success">
  <?php echo e(session('success')); ?>

</div>
<?php endif; ?>

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
        <?php $__currentLoopData = $coba; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upload): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <form action="<?php echo e(route('status.update',$upload->id)); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <input type="hidden" name="id" value="<?php echo e($upload->id); ?>">
        <tr>
            <td><?php echo e($upload->id); ?></td>
            <td><?php echo e($upload->file_nilai); ?></td>
            <td><?php echo e($upload->file_absensi); ?></td>
            <td><?php echo e($upload->file_RPP); ?></td>
            <td><?php echo e($upload->guru); ?></td>
            <td><?php echo e($upload->jadwal); ?></td>
            <td><?php echo e($upload->pemeriksa); ?></td>
            <?php if( $upload->status == ' '): ?>
            <td><select name="status" >
  			<option value="Terima">Terima</option>
  			<option value="Tolak">Tolak</option>
  		</td>
			</select>
             <?php else: ?>
            <td><?php echo e($upload->status); ?></td>
            <?php endif; ?>
            <td>
            
   			<?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
   			<button type="submit" class="btn btn-dark ">Update</button>
   			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    <?php elseif(Auth()->user()->level == 'kepala'): ?>
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
        <?php $__currentLoopData = $coba; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upload): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($upload->id); ?></td>
            <td><?php echo e($upload->file_nilai); ?></td>
            <td><?php echo e($upload->file_absensi); ?></td>
            <td><?php echo e($upload->file_RPP); ?></td>
            <td><?php echo e($upload->guru); ?></td>
            <td><?php echo e($upload->jadwal); ?></td>
            <td><?php echo e($upload->pemeriksa); ?></td>
            <td><?php echo e($upload->status); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php endif; ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Xampp\htdocs\Supervisor\resources\views/dashboard.blade.php ENDPATH**/ ?>