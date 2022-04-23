<section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">
      <div class="section-title">
          <h2>Baca Berita</h2>
          
        </div>
<?php 
    $id = $_GET['idberita'];
    $data = $koneksi->query("SELECT * FROM tbl_berita a JOIN tbl_kategori b ON a.kategori_id=b.kategori_id WHERE berita_id='$id'")->fetch_assoc();
    
?>
        <div class="row">
            <div class="col-sm">
                <div class="media">
                    <img class="mr-3" src="admin/asset/images/foto_berita/<?= $data['berita_gambar'] ?>" alt="Generic placeholder image" width="100" height="100">
                    <div class="media-body">
                        <h2 class="mt-0"><?= $data['berita_judul'] ?></h2>
                        <h5 class="mt-0">Kategori : <?= $data['kategori_nama'] ?></h5>
                        <h5 class="mt-0">Publish : <?= $data['berita_tgl'] ?></h5>
                        <span class="badge badge-pill badge-info">Read 1K</span> <span class="badge badge-pill badge-primary">Like 302</span>
                        <?php 
                            echo  '<p class="category_text lead">' 
                            . implode('</p><p class="category_text lead">', explode('/',$data['berita_isi'] ))
                            .'</p>';
                        ?>
                        
                        
                    </div>
                </div>
            </div>
        </div>

  </div>
</section>