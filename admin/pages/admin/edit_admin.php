<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
              <li class="breadcrumb-item"><a href="?page=pages/admin/view_admin">Admin</a></li>
              <li class="breadcrumb-item"><a href="#">Edit Admin</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    
    <?php $id = $_GET['idedit'];
    $dataedit = $koneksi->query("SELECT * FROM tbl_admin WHERE admin_id = '$id'")->fetch_assoc();
    // var_dump($dataedit);
    ?>

    <div class="container">
    <div class="card">
        <div class="card-header">Edit Admin</div>
        <div class="card-body">
            <form action="#" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $dataedit['admin_id']?>">
            <div class="form-group">
          <label for="">Admin Nama</label>
          <input type="text" require name="nama" value="<?= $dataedit['admin_nama'] ?>" class="form-control form-control-sm">
        </div>
        <div class="form-row">

          <div class="col form-group">
            <label for="">Admin Username</label>
            <input type="text" require name="username" value="<?= $dataedit['admin_username'] ?>" class="form-control form-control-sm">
          </div>

          <div class="col form-group">
            <label for="">Admin Password</label>
            <input type="password" require name="password" value="<?= $dataedit['admin_password'] ?>" class="form-control form-control-sm">
          </div>
       </div>

          <div class="form-group">
            <label for="">Admin email</label>
            <input type="email" require name="email" value="<?= $dataedit['admin_email'] ?>" class="form-control form-control-sm">
          </div>
          <div class="form-group">
            <img src="asset/images/foto_admin/<?= $dataedit['admin_foto']?>" alt="" width="200">
            <input type="hidden" name="fotolama" value="<?= $dataedit['admin_foto']?>">
          </div>
          <div class="form-group">
            <label for="">Admin foto</label>
            <input type="file" require name="foto" class="form-control form-control-sm">
          </div>
          <button type="submit" name="edit" class="btn btn-warning btn-block">Edit</button>
        </form>

        <?php 
            if (isset($_POST['edit'])){
            $idinput    = $_POST['id'];
            $nama       = $_POST['nama'];
            $username   = $_POST['username'];
            $password   = $_POST['password'];
            $email      = $_POST['email'];
            $fotolama   = $_POST['fotolama'];

            $originalname = $_FILES['foto']['name'];
            $lokasi = $_FILES['foto']['tmp_name'];
            $size = $_FILES['foto']['size'];
            $filename = time()."_".$originalname;
            
            if ($size > 1000000){
                echo"<script>
                alert('data Max 1 Mb')
                window.location='?page=pages/admin/edit_admin&idedit=".$id."'
              </script>";
            }else{
            if (!empty($lokasi)){
                unlink("asset/images/foto_admin/".$fotolama);
                move_uploaded_file($lokasi,"asset/images/foto_admin/".$filename);
                $update = $koneksi->query("UPDATE tbl_admin SET admin_nama='$nama',admin_username='$username',admin_password='$password',admin_email='$email',admin_foto='$filename' WHERE admin_id='$idinput'");
            }else{
                $update = $koneksi->query("UPDATE tbl_admin SET admin_nama='$nama',admin_username='$username',admin_password='$password',admin_email='$email' WHERE admin_id='$idinput'");
            }
            
            if($update == True){
                echo"<script>
                alert('data berhasil diedit')
                window.location='?page=pages/admin/view_admin'
              </script>";
            }else{
                echo"<script>
                alert('data Gagal diedit')
                window.location='?page=pages/admin/edit_admin&idedit=".$id."'
              </script>";
            }
        }


            }
        ?>
            
        </div>
    </div>
    </div>