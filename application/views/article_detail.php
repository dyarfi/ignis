<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="container">
      
  <div class="back-to-article">
    <div class="article"><h3><a href="<?php echo base_url('articles');?>">BACK TO ARTICLES</a></h3></div>
    <div class="article-bar-left"></div>
  </div>

  <div class="article-page">

    <h1><?php echo $article->subject;?></h1>
    <h4><?php echo date('Y-m-d, D h:m:s',$article->added);?></h4>
    <h4>by <a href="">Kompas.com</a></h4>

    <div class="body-text-article">
    	<?php if($article->media) { ?> 
      		<img class="img-responsive" src="<?php echo base_url('uploads/articles/'.$article->media);?>" alt="image article" />
      	<?php } 
      	//<img class="img-responsive" src="img/dummy-article.jpg" alt="image article" />
  	 	?>
      <p>
        <?php echo $article->text;?>
    	</p>
    </div>
  </div>
</div><!-- /.container -->
