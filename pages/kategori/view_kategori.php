<section id="why-us" class="why-us section-bg">
      <div class="container-fluid" data-aos="fade-up">
      <div class="section-title">
          <h2>Kategori</h2>
        </div>
        <div class="row">

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

            <div class="content">
              <h3>Hot New Kategori <strong>Berita MediaTama</strong></h3>
              <p>
                Menjadi Sebuah Media dalam Pertukaran Informasi-informasi penting yang terjadi di indonesia dengan fakta, Anti Hoax, Dan yang pastinya Selalu Update dengan berita-berita Terbaru.
              </p>
            </div>

            <div class="accordion-list">
              <ul>
                  <?php
                        $data = $koneksi->query("SELECT * FROM tbl_kategori");
                        $no=1;
                        while ($ekstraksi = $data->fetch_assoc()) {
                  ?>


                <li>
                  <a data-toggle="collapse" href="#accordion-list-<?= $ekstraksi['kategori_id'] ?>" class="collapsed"><span><?= $no++; ?></span> <?= $ekstraksi['kategori_nama'] ?> <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-<?= $ekstraksi['kategori_id'] ?>" class="collapse" data-parent=".accordion-list">
                    <p class="text-justify">
                      <?= $ekstraksi['kategori_deskripsi'] ?>
                      <a href="?page=pages/berita/spesifik_berita&kategoriid=<?= $ekstraksi['kategori_id'] ?>" class="btn btn-info btn-sm">Baca Berita</a>
                    </p>
                  </div>
                </li>

                <?php } ?>

              </ul>
            </div>

          </div>

          <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("assets/img/why-us.png");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
        </div>

      </div>
    </section>