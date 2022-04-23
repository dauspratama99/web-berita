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
            <div class="card-header">Data Kategori</div>
            <div class="card-body">
            <button type="button" class="btn btn-primary btn-sm mb-2" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i> Tambah Data</button>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori Nama</th>
                        <th>Kategori Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $data = $koneksi->query("SELECT * FROM tbl_kategori");
                    $no = 1;
                    while($ekstrak = $data->fetch_assoc()){

                    
                ?>
                    <tr>
                        <td><?= $no ++;?></td>
                        <td><?= $ekstrak['kategori_nama'] ?></td>
                        <td><?= $ekstrak['kategori_deskripsi'] ?></td>
                        <td><a href="?page=pages/kategori/edit_kategori&idedit=<?= $ekstrak['kategori_id'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="?page=pages/kategori/hapus_kategori&idhapus=<?= $ekstrak['kategori_id'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="POST">
        <div class="form-group">
          <label for="">Kategori Nama</label>
          <input type="text" require name="kategori_nama" class="form-control form-control-sm">
        </div> 
        <div class="form-group">
          <label for="">Kategori Deskripsi</label>
          <textarea name="kategori_deskripsi" class="form-control form-control-sm" id="" cols="30" rows="5"></textarea>
        </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
      </div>
     </form>
    
    <?php 
    if (isset($_POST['simpan'])){
        $kategori_nama = $_POST['kategori_nama'];
        $kategori_deskripsi = $_POST['kategori_deskripsi'];
        $simpan = $koneksi->query("INSERT INTO tbl_kategori(kategori_nama,kategori_deskripsi) VALUES ('$kategori_nama','$kategori_deskripsi')");
        if($simpan == True){
            echo"<script>
                alert('data berhasil disimpan')
                window.location='?page=pages/kategori/view_kategori'
              </script>";
        }else{
            echo"<script>
                alert('data berhasil disimpan')
                window.location='?page=pages/kategori/view_kategori'
              </script>";
        }
    }
    ?>

    </div>
  </div>
</div>