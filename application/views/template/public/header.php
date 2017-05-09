<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<header>
    <nav class="navbar navbar-custom" role="navigation">
    	<div class="row-fluid">
    		<div class="navbar-header page-scroll">
			    <a href="<?php echo base_url();?>"><img class="logo-suzuki" src="<?php echo base_url('assets/public/img/logo.jpg');?>" alt="suzuki" /></a>
    			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="fa fa-bars fa-inverse"></span>
                </button>
    		</div>
    		<div class="collapse navbar-collapse navbar-right navbar-main-collapse ignis-navbar">
    			<ul class="nav navbar-nav">
    			  <li class="ignis-nav-li mt20"><a href="https://www.suzuki.co.id/contact-us">Contact</a></li>
                  <li class="dropdown mt20">
    				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="fa fa-bars fa-inverse fa-1x"></span>
                    </a>
    				<ul class="dropdown-menu">
                        <li><a href="https://www.suzuki.co.id/automobile/ignis">Ignis</a></li>
  	                    <li><a href="<?php echo base_url('articles');?>">Articles</a></li>
    				</ul>
    			  </li>
    			</ul>
    		</div>
            <div class="collapse navbar-main-collapse ignis-navbar" id="navbar">
                <ul class="nav navbar-nav ignis-nav-dropdown">
                    <li><a href="https://www.suzuki.co.id/contact-us" class="ignis-nav">Contact</a></li>
	                <li><a href="https://www.suzuki.co.id/automobile/ignis" class="ignis-nav">Ignis</a></li>
	                <li><a href="<?php echo base_url('articles');?>" class="ignis-nav">Articles</a></li>
                </ul>
            </div>
    	</div>
    </nav>
</header>
