<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="<?php echo config_item('site_title');?>" name="author">
    <meta content="all,index,follow" name="robots">
    <meta content="all,index,follow" name="googlebot">
    <meta content="yes" name="allow-search">
    <meta content="all" name="audience">
    <meta content="7 days" name="revisit">
    <meta content="7 days" name="revisit-after">
    <meta content="<?php echo config_item('copyright');?>" name="copyright">
    <meta content="<?php echo config_item('title_name');?> - <?php echo config_item('site_title');?>" name="creator">
    <meta content="global" name="distribution">
    <meta content="Mobil Suzuki, Motor Suzuki, Suzuki Marine, Motorcycles, Automobiles, Marines" name="classification">
    <meta content="general" name="document-classification">
    <meta content="general" name="rating">
    <meta http-equiv="Reply-to" content="<?php echo $this->email_info->value;?>">
	<meta property="og:site_name" content="<?php echo config_item('title_name');?> - <?php echo config_item('site_title');?>">
	<meta property="og:description" content="Suzuki Indonesia merupakan kelompok usaha yang bergerak dibidang industri otomotif yang memproduksi, memasarkan, memperniagakan motor, mobil dan motor tempel (outboard-motor). Hal tersebut juga diidukung dengan pelayanan purna jual suku cadang serta perbaikan/pemeliharaan di seluruh Indonesia yang solid dan terintegrasi dalam melayani para pelanggan Suzuki.">
	<meta property="og:url" content="<?php echo base_url();?>">
	<meta property="og:type" content="website">
	<meta property="og:image" content="<?php echo base_url('assets/public/img/logo.jpg');?>">
    <link rel="image_src" href="<?php echo base_url('assets/public/img/logo.jpg');?>" />
    <link rel="icon" href="<?php echo base_url('favicon.ico');?>">
    <?php
    /*
    * MINIFY CSS
    * ----------------------
    * Add css files that want to be minify
    */
    // Add / Change default dir
    $this->minify->assets_dir = 'assets/public/css';
    // Add Stylesheet
    $this->minify->css([
      "public/css/bootstrap.min.css",
      "public/css/fancybox/jquery.fancybox.css",
      "public/font-awesome/css/font-awesome.css",
      //"public/css/animate.css",
      "public/css/style.css",
      "public/css/media-queries.css"
    ]);
    /*
     * Adding additional stylesheet from controller
     */
    if (!empty($css_files)) {
        foreach ($css_files as $sheet => $css):
          // Add js to minified
          $this->minify->add_css($css, $sheet);
        endforeach;
    }
    /*
     * ----------------- BEWARE OF DEPLOYING | ALWAYS SET TO FALSE AFTER RECOMPILE ------------------
     * Recompile css!!! Set this to true every times you add css library from anywhere
     * delete assets/public/css/styles.min.css to recompile again
     */
    echo $this->minify->deploy_css(FALSE);
   ?>
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
    <title><?php echo $page_title .' | ' . config_item('title_name') .' - ' . config_item('site_title'); ?></title>
<script type="text/javascript">var base_URL = '<?php echo base_url();?>';</script>
<?php if (!empty($js_files_ext)) { foreach ($js_files_ext as $ext): ?>
<script src="<?php echo $ext; ?>"></script>
<?php endforeach; } ?>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MF3WQDH');</script>
<?php if (!empty($this->ga_analytics->value)) { echo $this->ga_analytics->value; } ?>
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-custom" class="<?php echo @$base_class;?>">
  <?php $this->load->view('template/public/header'); ?>
	<div class="messageFlash">
		<?php $this->load->view('flashdata'); ?>
	</div>
    <?php $this->load->view($main); ?>
    <?php $this->load->view('template/public/footer'); ?>
  <?php
    /*
    * MINIFY JS
    * ----------------------
    * Add js files that want to be minify
    */
    // Add / Change default dir
    $this->minify->assets_dir = 'assets/public/js';
    // Add javascripts
    $this->minify->js([
      "public/js/jquery.min.js",
      "public/js/jquery.cookie.js",
      "public/js/jquery.fancybox.pack.js",
      "public/js/bootstrap.min.js",
      "admin/plugins/bootbox/bootbox.min.js",
      "public/js/jquery.easing.min.js",
      "public/js/jquery.scrollTo.js",
      "public/js/imagesloaded.pkgd.min.js",
      "public/js/style.js"
    ]);
    /*
     * Adding additional javascript from controller
     */
    if (!empty($js_files)) {
        foreach ($js_files as $group => $file):
          // Add js to minified
          $this->minify->add_js($file, $group);
        endforeach;
    }
    /*
     * ----------------- BEWARE OF DEPLOYING | ALWAYS SET TO FALSE AFTER RECOMPILE ------------------
     * Recompile javascript!!! Set this to true every times you add javascripts library from anywhere
     * delete assets/public/js/scripts.min.js to recompile again
     */
    echo $this->minify->deploy_js(FALSE);
  ?>
  <?php
    /*
     * Debugging information only
     *
     */
    /* if (!empty($js_files)) { foreach ($js_files as $file): ?>
    <script src="<?php echo $file; ?>"></script>
    <?php endforeach; } */
  ?>
<script type="text/javascript">
$(document).ready(function() {
  <?php
    // Write the javascript inline in the controller
    echo ($js_inline) ? "\t".$js_inline."\n" : "";
  ?>
});
function popupCenter(url, title, w, h) { window.location.href = url;}
</script>
<script type="text/javascript">(function(d,u){var b=d.getElementsByTagName("script") [0],j=d.createElement("script");j.async=true;j.src=u;b.parentNode.insertBefore(j,b);})(document,"//di2xiflr72bem.cloudfront.net/ut/7953079a2cbe7270_60.js");</script>
<script language='JavaScript1.1' src='//pixel.mathtag.com/event/js?mt_id=1159526&mt_adid=185618&s1=<?php echo base_url();?>&s2=<?php echo $this->agent->referrer();?>&s3=<?php echo $this->config->item('language');?>'></script>
</body>
</html>
