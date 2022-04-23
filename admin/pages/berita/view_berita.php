<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Berita</h1>
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
            <div class="card-header">Data Berita</div>
            <div class="card-body">
            <button type="button" class="btn btn-primary btn-sm mb-2" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i> Tambah Data</button>
            <table class="table table-bordered" id="example1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori Nama</th>
                        <th>Berita Judul</th>
                        <th>Berita Tgl</th>
                        <th>Berita Isi</th>
                        <th>Berita Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $data = $koneksi->query("SELECT * FROM tbl_berita a JOIN tbl_kategori b ON a.kategori_id=b.kategori_id ORDER BY berita_id ASC");
                    $no = 1;
                    
                    while($ekstrak = $data->fetch_assoc()){
                        // var_dump($ekstrak);
                    
                ?>
                    <tr>
                  
                        <td><?= $no ++;?></td>
                        <td><?= $ekstrak['kategori_nama'] ?></td>
                        <td><?= $ekstrak['berita_judul'] ?></td>
                        <td><?= $ekstrak['berita_tgl'] ?></td>
                        <td><?= substr($ekstrak['berita_isi'],0,50) ?></td>
                        <td><img src="asset/images/foto_berita/<?= $ekstrak['berita_gambar'] ?>" width="100" alt=""></td>
                        <td><a href="?page=pages/berita/edit_berita&idedit=<?= $ekstrak['berita_id'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="?page=pages/berita/hapus_berita&idhapus=<?= $ekstrak['berita_id'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
        <form action="#" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="">Kategori Nama</label>
          <select name="kat" id="kat" class="form-control" required>
            <option value="">Silahkan Dipilih</option>
            <?php
              $data = $koneksi->query("SELECT * FROM tbl_kategori");
              while($ekstrak = $data->fetch_assoc())
              {
            ?>
            <option value="<?= $ekstrak['kategori_id'] ?>"><?= $ekstrak['kategori_nama'] ?></option>
            <?php } ?>
          </select>
        </div> 
        <div class="form-group">
          <label for="">Berita Judul</label>
          <input type="text" require name="berita_judul" class="form-control form-control-sm">
        </div> 
        <div class="form-group">
          <label for="">Berita Tgl</label>
          <input type="date" require name="berita_tgl" class="form-control form-control-sm">
        </div> 
        <div class="form-group">
          <label for="">Berita isi</label>
          <textarea name="berita_isi" id="" cols="30" rows="5" class="form-control"></textarea>
        </div> 
        <div class="form-group">
          <label for="">Berita Gambar</label>
          <input type="File" require name="berita_gambar" class="form-control form-control-sm">
        </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
      </div>
     </form>
    
    <?php 
    if (isset($_POST['simpan'])){
      
        $kat          = $_POST['kat'];
        $berita_judul = $_POST['berita_judul'];
        $berita_tgl   = $_POST['berita_tgl'];
        $berita_isi   = $_POST['berita_isi'];

        $originalname = $_FILES['berita_gambar']['name'];
        $lokasi       = $_FILES['berita_gambar']['tmp_name'];
        $size         = $_FILES['berita_gambar']['size'];
        $filename     = time()."_".$originalname;

        $simpan = $koneksi->query("INSERT INTO tbl_berita (kategori_id,berita_judul,berita_tgl,berita_isi,berita_gambar) VALUES ('$kat','$berita_judul','$berita_tgl','$berita_isi','$filename')");

        if($simpan == True){
            move_uploaded_file($lokasi,'asset/images/foto_berita/'.$filename);
            echo"<script>
                alert('data berhasil disimpan')
                window.location='?page=pages/berita/view_berita'
              </script>";
        }else{
            echo"<script>
                alert('data Gagal disimpan')
                window.location='?page=pages/berita/view_berita'
              </script>";
        }
    }
    ?>

    </div>
  </div>
</div>