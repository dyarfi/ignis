<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
    <div class="container">   
      <div class="article-page-title">
        <h2>ARTICLES</h2>
      </div>
      <div class="article-item">
        <?php if ($articles) { ?>
      	<?php foreach ($articles as $article) { ?>
	      	<div class="col-xs-12 col-sm-4 col-md-4">            
	          <div class="thumbnail">
	            <div class="text-caption">
	              <p><?php echo date('d, m Y',$article->added);?></p>
	              <h3><a href="<?php echo base_url('read/article/'.$article->url);?>"><?php echo $article->subject;?></a></h3>
	            </div>
	            <div class="caption"></div>
	            <?php if ($article->media) { ?>	            
	            	<img class="img-responsive" src="<?php echo base_url('uploads/articles/'.$article->media);?>" />
	            <?php } else { ?>
	            	<img class="img-responsive" src="<?php echo base_url('assets/public/img/article-01.jpg');?>" />
	            <?php } ?>
	          </div>
	        </div>
      	<?php } ?>
      <?php } else { ?>
      <br/><br/>
      <h2>Belum ada Artikel</h2>
      <br/><br/><br/><br/><br/><br/><br/>
      <?php } ?>
      </div>
    </div><!-- /.container -->
