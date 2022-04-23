<section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About Us</h2>
        </div>

        <div class="row content">
        <?php $data = $koneksi->query("SELECT * FROM tbl_about")->fetch_assoc();
          $list_about = explode(',', $data['about_keterangan_list']);
        ?>
          <div class="col-lg-4">
            <p class="text-justify"><?= $data['about_keterangan_1'] ?></p>
            
          </div>
          
          <div class="col-lg-4 pt-4 pt-lg-0">
          <div class="text-center">
            <ul>
              <?php 
                for ($i=0; $i < count($list_about) ; $i++) {  
              ?>
                <li><span class="ri-check-double-line"></span> <?= $list_about[$i] ?></li>
  
                <?php } ?>
            </ul>
            <a href="https://mediatamaweb.co.id/" class="btn-learn-more">View More</a>
          </div>
          </div>

          <div class="col-lg-4 pt-4 pt-lg-0">
            <p class="text-justify">
            <?= $data['about_keterangan_2'] ?>
            </p>
            
          </div>
        </div>

      </div>
    </section>