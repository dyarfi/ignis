<section class="container-fluid main-content">
  <!-- start main content -->
  <div class="container">
    <div class="col-md-8 mobil">
      <img class="img-responsive produk-ignis" src="<?php echo base_url('assets/public/img/mobil-ignis.png');?>" alt="suzuki" />
    </div>
    <div class="col-md-4">
      <div class="row">
        <?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
        <div id="result" class="col-md-12"></div>
        <div class="container-fluid quiz">
            <div>
                <div class="main-page text-white" style="margin:100px auto 10px auto">
                  <h1 class="ts"><?php echo $this->participant->name; ?></h1>
                  <h3 class="ts">Kode Unik Anda : <b class="text-white font-bold"><?php echo $this->participant->verify; ?></b></h3>
                  <a href="<?php echo base_url('account/logout');?>" class="btn btn-danger btn-md">LOGOUT</a>
                  <p class="ts">
                  Simpan nomor unik peserta Anda untuk ditukarkan dengan souvenir menarik di acara pameran Suzuki Ignis di <b>Kota Kasablanka</b> tanggal <b>19 - 23 April 2017</b> dan <b>IIMS</b> tanggal <b>27 April - 7 Mei 2017.</b>
                  </p>
                  <a class="ts font-bold" href="<?php echo base_url('page/terms-and-conditions');?>" class="font-bold">Syarat &amp; Ketentuan</a>
                </div>
            </div>
        </div>
    </div>
  </div>
  <?php if ($articles) { ?>
      <?php foreach ($articles as $article) {
          $url_type = ($article->ext_url == 1) ? $article->url : base_url('read/article/'.$article->url);?>
          ?>
          <div class="col-md-6 col-sm-12">
                <?php if ($article->media && !$article->attribute) { ?>
                  <div class="div-holder">
                      <?php if($article->ext_url == 1) { ?>
                          <a href="<?php echo $article->url;?>" title="<?php echo $article->subject;?>">
                              <img class="img-responsive" src="<?php echo base_url('uploads/articles/'.$article->media);?>" />
                          </a>
                      <?php } else { ?>
                          <img class="img-responsive" src="<?php echo base_url('uploads/articles/'.$article->media);?>" />
                      <?php } ?>
                  </div>
                  <?php
                  } else if ($article->attribute && !$article->media) {
                      echo $article->attribute;
                  } else if ($article->attribute && $article->media) {
                      echo $article->attribute;
                  } else {
                      ?>
                      <?php if($article->ext_url == 1) { ?>
                          <a href="<?php echo $article->url;?>" title="<?php echo $article->subject;?>">
                              <img class="img-responsive" src="<?php echo base_url('uploads/articles/'.$article->media);?>" />
                          </a>
                      <?php } else { ?>
                          <img class="img-responsive" src="<?php echo base_url('uploads/articles/'.$article->media);?>" />
                      <?php } ?>
                      <?php
                  }
              ?>
          </div>
      <?php } ?>
  <?php } ?>
  </div>
</section> <!-- /container -->
