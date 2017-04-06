<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

  <nav class="navbar navbar-default container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url();?>"><img src="<?php echo base_url('assets/public/img/logo.jpg');?>" /></a>
    </div>
    <div>
      <div id="navbar" class="collapse navbar-right navbar-collapse">
        <ul class="nav navbar-nav">
          <?php foreach ($this->menus as $menu) {
            $menu->url = $menu->url == 'home' ? '' : $menu->url;
            ?>
            <li class="<?php echo $this->uri->segment(1) == $menu->url ? 'active' :'';?>"><a href="<?php echo base_url($menu->url);?>"><?php echo $menu->subject;?></a></li>
          <?php } ?>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>
