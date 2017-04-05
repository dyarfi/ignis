<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="container">
  <div class="slider">
    <img class="img-responsive" src="<?php echo base_url('assets/public/img');?>/slider-01.jpg">
    <div class="hero">
        <hgroup>
              <h1>EXPLORE THE QUIZ, GET THE GIFTS!</h1>        
              <h4>MENANGKAN PAKET WISATA KELUARGA SENILAI 50 JUTA RUPIAH DAN PULUHAN HADIAH</h4>
              <h4>MENARIK LAINNYA HANYA DENGAN MENJAWAB PERTANYAAN BERIKUT.</h4>
        </hgroup>
      <a class="btn btn-hero btn-sm" href="<?php echo base_url('quiz');?>">ENTER QUIZ</a>
      <div class="tnc"><a href="<?php echo base_url('page/terms-and-conditions');?>">Terms &amp; Conditions</a></div>
    </div>
  </div>
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
</div><!-- /.container -->