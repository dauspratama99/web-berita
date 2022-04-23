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

<?php 
    $id = $_GET['idedit'];
    $data = $koneksi->query("SELECT * FROM tbl_kategori WHERE kategori_id='$id'")->fetch_assoc();
    
?>
<div class="container">
    <div class="card">
        <div class="card-header">Edit Data kategori</div>
            <div class="card-body">
                <form action="#" method="POST">
                <input type="hidden" name="kategori_id" value="<?= $data['kategori_id'] ?>">
                    <div class="form-group">
                        <label for="">Kategori Nama</label>
                        <input type="text" required name="kategori_nama" value="<?= $data['kategori_nama']?>" class="form-control form-control-sm">
                    </div>
                    <div class="form-group">
                    <label for="">Kategori Deskripsi</label>
                    <textarea name="kategori_deskripsi" class="form-control form-control-sm" id="" cols="30" rows="10"><?= $data['kategori_deskripsi']?></textarea>
       
                    </div>
                    <div class="form-group">
                        <button type="submit" name="edit" class="btn btn-warning btn-block">Edit</button>
                    </div>
                </form>
                <?php 
                    if(isset($_POST['edit'])){
                        $kategori_nama = $_POST['kategori_nama'];
                        $kategori_deskripsi = $_POST['kategori_deskripsi'];
                        $kategori_id = $_POST['kategori_id'];
                        $edit = $koneksi->query("UPDATE tbl_kategori SET kategori_nama ='$kategori_nama', kategori_deskripsi ='$kategori_deskripsi' WHERE kategori_id='$kategori_id'");
                        if($edit == True){
                            echo"<script>
                                alert('data berhasil diedit')
                                window.location='?page=pages/kategori/view_kategori'
                            </script>";
                        }else{
                            echo"<script>
                            alert('data gagal diedit')
                            window.location='?page=pages/kategori/edit_kategori&idedit=".$id."'
                        </script>";
                        }
                    }
                ?>
            </div>
    </div>
</div>