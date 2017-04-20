<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
    <div class="container mb100">
      <div class="article-page-title">
        <div class="article ts"><h4>&laquo; <a href="<?php echo base_url();?>">BACK TO HOME</a></h4></div>
      </div>
      <h2 class="ts">ARTICLES</h2>
      <div class="row mb100">
        <?php if ($articles) { ?>
      	<?php foreach ($articles as $article) { ?>
	      	<div class="col-xs-12 col-sm-4 col-md-4">
              <h3 class="ts"><a href="<?php echo base_url('read/article/'.$article->url);?>"><?php echo $article->subject;?></a></h3>
              <span class="ts"><?php echo date('D, d m Y',strtotime($article->publish_date));?></span>
	          <div class="thumbnail">
	            <?php if ($article->media && !$article->attribute) { ?>
                    <img class="img-responsive" src="<?php echo base_url('uploads/articles/'.$article->media);?>" />
                <?php } else if ($article->attribute && !$article->media) {
                    echo $article->attribute;
                } else {
                    echo '<img class="img-responsive" src="'.base_url('uploads/articles/'.$article->media).'" />';
                    echo $article->attribute;
                } ?>
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
