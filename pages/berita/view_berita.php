<section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Berita</h2>
          <p>Menyediakan Berita Terupdate Dan Terpecaya, Anti Hoax dan Cinta Damai, Salam Perjuangan</p>
        </div>

        <div class="row">
        <?php 

            $data = $koneksi->query("SELECT * FROM tbl_berita ORDER BY berita_id DESC Limit 4");
            while ($ekstrak = $data->fetch_assoc()) {  
        ?>
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="card animasi-card" style="width: 18rem;">
              <img class="card-img-top" src="admin/asset/images/foto_berita/<?= $ekstrak['berita_gambar'] ?>" alt="Card image cap" width="150" height="150">
              <div class="card-body">
                <h5 class="card-title"><?= $ekstrak['berita_judul'] ?></h5>
                <p class="card-text"><?= substr($ekstrak['berita_isi'],0,50) ?></p>
                <a href="?page=pages/berita/read_berita&idberita=<?= $ekstrak['berita_id'] ?>" class="btn btn-info" target="_blank">Read More ...</a>
              </div>
            </div>
          </div>
        
        <?php
        }
        ?>
        </div>

  </div>
</section>