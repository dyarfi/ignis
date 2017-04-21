<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="container">
  <div class="back-to-article">
    <div class="article ts"><h4>&laquo; <a href="<?php echo base_url('articles');?>">BACK TO ARTICLES</a></h4></div>
  </div>
  <div class="article-page mb100">
    <h1 class="font-bold ts"><?php echo $article->subject;?></h1>
    <h4 class="font-bold ts"><?php echo date('Y-m-d, D h:m:s',strtotime($article->publish_date));?></h4>
    <!--h4>by <a href="">Kompas.com</a></h4-->
    <div class="body-text-article ts">
        <?php if ($article->media && !$article->attribute) { ?>
            <img class="img-responsive" src="<?php echo base_url('uploads/articles/'.$article->media);?>" />
        <?php } else if ($article->attribute && !$article->media) {
            echo $article->attribute;
        } else if ($article->attribute && $article->media) {
            echo $article->attribute;
        } else {
            echo '<img class="img-responsive" width="100%" src="'.base_url('assets/static/img/default.jpg').'" />';
        }
        ?>
        <p><?php echo $article->text;?></p>
        <p class="mb100">&nbsp;</p>
        <p class="mb100">&nbsp;</p>
    </div>
  </div>
</div><!-- /.container -->
