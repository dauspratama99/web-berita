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
    $dataedit = $koneksi->query("SELECT * FROM tbl_berita a JOIN tbl_kategori b ON a.kategori_id=b.kategori_id WHERE a.berita_id='$id'")->fetch_assoc();
    
    ?>

    <div class="container">
    <div class="card">
        <div class="card-header">Edit Berita</div>
        <div class="card-body">
            <form action="#" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $dataedit['berita_id']?>">
            <div class="form-group">
          <label for="">Kategori Nama</label>
                <select name="kat" id="kat" class="form-control">
                    <?php $data = $koneksi->query("SELECT * FROM tbl_kategori");
                        while ($ekstrak = $data->fetch_assoc()) { 
                            var_dump($ekstrak);
                    ?>
                    <option value="<?= $ekstrak['kategori_id'] ?>"><?= $ekstrak['kategori_nama']?></option>
                    <?php } ?>

                    <script>
                        document.getElementById('kat').value = '<?= $dataedit['kategori_id'] ?>';
                    </script>
                </select>
        </div>
        <div class="form-group">
            <label for="">berita Judul</label>
            <input type="text" name="berita_judul" class="form-control" value="<?= $dataedit['berita_judul']?>">
        </div>
        <div class="form-group">
            <label for="">berita Tgl</label>
            <input type="date" name="berita_tgl" class="form-control" value="<?= $dataedit['berita_tgl']?>">
        </div>
        <div class="form-group">
            <label for="">berita Isi</label>
            <textarea name="berita_isi" id="" cols="30" rows="10" class="form-control"><?= $dataedit['berita_isi']?></textarea>
        </div>
        <div class="form-group">
            <img src="asset/images/foto_berita/<?= $dataedit['berita_gambar']?>" width="200"alt="">
        </div>
        <div class="form-group">
            <input type="hidden" name="berita_gambar_lama" value="<?= $dataedit['berita_gambar']?>">
        </div>
        <div class="form-group">
            <label for="">berita Gambar</label>
            <input type="file" name="berita_gambar" class="form-control">
        </div>
          <button type="submit" name="edit" class="btn btn-warning btn-block">Edit</button>
        </form>

        <?php 
            if (isset($_POST['edit'])){
            $idinput    = $_POST['id'];
            $kat        = $_POST['kat'];
            $berita_judul  = $_POST['berita_judul'];
            $berita_tgl = $_POST['berita_tgl'];
            $berita_isi = $_POST['berita_isi'];
            $fotolama   = $_POST['berita_gambar_lama'];

            $originalname = $_FILES['berita_gambar']['name'];
            $lokasi = $_FILES['berita_gambar']['tmp_name'];
            $size = $_FILES['berita_gambar']['size'];
            $filename = time()."_".$originalname;
            
            if ($size > 1000000){
                echo"<script>
                alert('data Max 1 Mb')
                window.location='?page=pages/berita/edit_berita&idedit=".$id."'
              </script>";
            }else{
            if (!empty($lokasi)){
                unlink("asset/images/foto_berita/".$fotolama);
                move_uploaded_file($lokasi,"asset/images/foto_berita/".$filename);
                $update = $koneksi->query("UPDATE tbl_berita SET kategori_id='$kat',berita_judul='$berita_judul',berita_tgl='$berita_tgl',berita_isi='$berita_isi',berita_gambar='$filename' WHERE berita_id='$idinput'");
            }else{
              $update = $koneksi->query("UPDATE tbl_berita SET kategori_id='$kat',berita_judul='$berita_judul',berita_tgl='$berita_tgl',berita_isi='$berita_isi' WHERE berita_id='$idinput'");
            }
            
            if($update == True){
                echo"<script>
                alert('data berhasil diedit')
                window.location='?page=pages/berita/view_berita'
              </script>";
            }else{
                echo"<script>
                alert('data Gagal diedit')
                window.location='?page=pages/berita/edit_berita&idedit=".$id."'
              </script>";
            }
        }


            }
        ?>
            
        </div>
    </div>
    </div>