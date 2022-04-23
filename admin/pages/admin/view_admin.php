<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<div class="container">
<div class="card">
    <div class="card-header">
        Data Admin
    </div>
    <div class="card-body">
    <button type="button" class="btn btn-primary btn-sm mb-2" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"> Tambah Data</i></button>
    <table class="table table-bordered">
    <thead>
        <tr>
            <th>Nomor</th>
            <th>Admin Nama</th>
            <th>Admin Username</th>
            <th>Admin Password</th>
            <th>Admin Email</th>
            <th>Admin Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
      <?php 
         $ambil =  $koneksi->query("SELECT * FROM tbl_admin");
         $no=1;
         while ($pecah = $ambil->fetch_assoc()) {
           
          // echo "<pre>";
          // print_r($pecah);
          // echo "</pre>";

      ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $pecah['admin_nama']?></td>
            <td><?= $pecah['admin_username']?></td>
            <td><?= $pecah['admin_password']?></td>
            <td><?= $pecah['admin_email']?></td>
            <td><img src="asset/images/foto_admin/<?= $pecah['admin_foto']?>" width=200 alt=""></td>
            <td>
              <a href="?page=pages/admin/edit_admin&idedit=<?= $pecah['admin_id'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
              <a href="?page=pages/admin/hapus_admin&idhapus=<?= $pecah['admin_id'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        <?php   } ?>
    </tbody>
</table>
    </div>
</div></div>

<!-- Modal -->
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="">Admin Nama</label>
          <input type="text" require name="nama" class="form-control form-control-sm">
        </div>
        <div class="form-row">

          <div class="col form-group">
            <label for="">Admin Username</label>
            <input type="text" require name="username" class="form-control form-control-sm">
          </div>

          <div class="col form-group">
            <label for="">Admin Password</label>
            <input type="password" require name="password" class="form-control form-control-sm">
          </div>
       </div>

          <div class="form-group">
            <label for="">Admin email</label>
            <input type="email" require name="email" class="form-control form-control-sm">
          </div>

          <div class="form-group">
            <label for="">Admin foto</label>
            <input type="file" require name="foto" class="form-control form-control-sm">
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
      </div>
      </form>

          <?php if (isset($_POST['simpan'])) {
            $nama = $_POST['nama'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];

            $originalname = $_FILES['foto']['name'];
            $lokasi = $_FILES['foto']['tmp_name'];
            $size = $_FILES['foto']['size'];
            $filename = time()."_".$originalname;
            
            if ($size > 1000000){
              echo"<script>
                alert('data Ukuran Max 1 Mb')
                window.location='?page=pages/admin/view_admin'
              </script>";
            }else {

            $simpan = $koneksi->query("INSERT INTO tbl_admin(admin_nama,admin_username,admin_password,admin_email,admin_foto) VALUES ('$nama','$username','$password','$email','$filename')");
            if ($simpan == True){
              move_uploaded_file($lokasi,"asset/images/foto_admin/".$filename);
              echo"<script>
                alert('data berhasil disimpan')
                window.location='?page=pages/admin/view_admin'
              </script>";
            }else{
              echo"<script>
                alert('data Gagal disimpan')
                window.location='?page=pages/admin/view_admin'
              </script>";
            }
          }
          } ?>
    </div>
  </div>
</div>