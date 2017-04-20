<section class="container-fluid main-content">
  <!-- start main content -->
  <div class="container">
    <div class="col-md-8 mobil">
      <img class="img-responsive produk-ignis" src="<?php echo base_url('assets/public/img/mobil-ignis.png');?>" alt="suzuki" />
    </div>
    <div class="col-md-4">
      <div class="row ts">
        <?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
        <div id="result" class="col-md-12"></div>
        <div class="container-fluid quiz">
            <div>
                <div class="main-page text-white" style="margin:100px auto 340px auto">
                  <h1><?php echo $this->participant->name; ?></h1>
                  <h3>Kode Unik Anda : <b class="text-white"><?php echo $this->participant->verify; ?></b></h3>
                  <a href="<?php echo base_url('account/logout');?>" class="btn btn-danger btn-md">LOGOUT</a>
                  <br/><br/>
                  Simpan nomor unik peserta Anda untuk ditukarkan dengan souvenir menarik di acara pameran Suzuki Ignis di <b>Kota Kasablanka</b> tanggal <b>17 - 23 April 2017</b> dan <b>IIMS</b> tanggal <b>27 April - 5 Mei 2017</b>
                  <br/>
                </div>
            </div>
        </div>
    </div>
  </div>
  </div>
</section> <!-- /container -->
<?php if ($articles) { ?>
      <div class="bar-title">
        <div class="article"><h3>ARTICLES</h3></div>
        <div class="article-bar-left"></div>
        <div class="article-bar-right"></div>
        <div class="article article-right"></div>
      </div>
      <div class="article-item">
        <?php foreach ($articles as $article) { ?>
            <div class="col-xs-12 col-sm-4 col-md-4">
              <div class="thumbnail">
                <div class="text-caption">
                  <p><?php echo date('D, d-m-Y',$article->added);?></p>
                  <h3><a href="<?php echo base_url('read/article/'.$article->url);?>"><?php echo $article->subject;?></a></h3>
                </div>
                <div class="caption"></div>
                <?php if ($article->media) { ?>
                    <img class="img-responsive" src="<?php echo base_url('uploads/articles/'.$article->media);?>" />
                <?php } else { ?>
                    <img class="img-responsive" src="<?php echo base_url('assets/public/img');?>/article-01.jpg" />
                <?php } ?>
              </div>
            </div>
        <?php } ?>
      </div>
<?php } else { ?>
<?php } ?>
