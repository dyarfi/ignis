<section class="container-fluid main-content">

  <!-- start main content -->
  <div class="container">
    
    <div class="col-md-8 mobil">
      <img class="img-responsive produk-ignis" src="<?php echo base_url('assets/public/img/mobil-ignis-2.jpg');?>" alt="suzuki" />
    </div>
    <div class="col-md-4">
      <div class="row">
        <?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
        <div id="result" class="col-md-12"></div>
        <div class="container-fluid quiz">
          <?php /*if ($this->participant && $this->participant->completed != 1) { */ ?>
          <?php /*if (!$this->participant) {*/ ?>
              <div>
                <?php if (!$this->participant) { ?>
                <?php echo form_open(base_url('account/update_account'),['enctype'=>'multipart/form-data','role'=>'form','name'=>'form_account','id'=>'form_account','class'=>'form-horizontal']); ?>
                <div class="indentity-form">
                  <div class="body-indentity">
                        <h1>BELI <span class="font-bold">IGNIS</span><br><span class="font-small">SEKARANG</span></h1>
                        <div class="form-group">
                            <!--label for="inputName" class="control-label col-xs-4 text-danger">Nama Lengkap</label-->
                            <div>
                                <input type="text" class="form-control" id="inputName" name="name" placeholder="Nama Lengkap" value="<?php echo @$this->participant->name;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <!--label for="inputEmail" class="control-label col-xs-4 text-danger">Email</label-->
                            <div>
                                <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" value="<?php echo @$this->participant->email;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <!--label for="inputPhone" class="control-label col-xs-4 text-danger">No. Hp</label-->
                            <div>
                                <input type="text" class="form-control" id="inputPhone" name="phone_number" placeholder="No. Hp" value="<?php echo @$this->participant->phone_number;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <!--label for="inputId" class="control-label col-xs-4 text-danger">No. ID</label-->
                            <div>
                                <input type="text" class="form-control" id="inputId" placeholder="KTP / SIM" name="id_number" value="<?php echo @$this->participant->id_number;?>">
                            </div>
                        </div>
                        <div class="form-group captcha-css">
                            <!--label for="inputCaptcha" class="control-label col-xs-4 text-danger">Captcha</label-->
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="inputCaptcha" placeholder="Kode Captcha" name="captcha" value="<?php echo @$fields->captcha;?>">
                            </div>
                            <div class="col-md-4">
                                <a class="reload_captcha four columns" rel="<?php echo base_url('xhr/reload_captcha')?>" href="javascript:;"><?php echo $captcha['image'];?></a>
                            </div>
                        </div>
                  </div>
                </div>
                <?php if (!$this->participant) { ?>
                <div class="boxed-grey marginbot-50">
                    <fieldset class="marginbot-50"><legend class="text-white">Atau login dengan akun sosial anda untuk melanjutkan</legend>
                        <ul class="list-inline">
                            <li>
                                <a href="javascript:void(0);" class="btn btn-primary btn-md facebook" id="facebook" onclick="popupCenter('<?php echo base_url('hauth/login/Facebook');?>', 'Facebook',480,520);">
                                    <span class="fa fa-facebook"></span>&nbsp;&nbsp;Login Facebook
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="btn btn-default btn-md btn-info twitter" id="twitter" onclick="popupCenter('<?php echo base_url('hauth/login/Twitter');?>', 'Twitter',480,520);">
                                    <span class="fa fa-twitter"></span>&nbsp;&nbsp;Login Twitter
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="btn btn-default btn-md btn-danger googleplus" id="google" onclick="popupCenter('<?php echo base_url('hauth/login/Google');?>', 'Google',480,520);">
                                    <span class="fa fa-google-plus"></span>&nbsp;&nbsp;Login Google
                                </a>
                            </li>
                        </ul>
                        <span class="text-white">* Akan dikembalikan ke halaman daftar setelah login</span>
                    </fieldset>
                </div>
                <?php } else { ?>
                    <span class="text-white">Terima Kasih telah menggunakan Account<?php echo ' '.$this->input->get('redirect');?> Anda. Silahkan melanjutkan mengisi form diatas.</span>
                <?php } ?>
                <div class="submit-quiz" style="text-align: center; margin: 10px 0;">
                  <button class="btn btn-hero btn-sm btn-danger" role="button">SUBMIT</button>
                  <div class="tnc" style="margin: 10px 0;"><a href="<?php echo base_url('page/terms-and-conditions');?>">Syarat &amp; Ketentuan</a></div>
                </div>
                <?php echo form_close(); ?>
                <?php } else { ?>
                    <div class="main-page text-white" style="margin:100px auto 340px auto">
                        <h1><?php echo $this->participant->name; ?></h1>
                        <h3>Kode Unik Anda : <b class="text-white"><?php echo $this->participant->verify; ?></b></h3>
                    </div>
                <?php } ?>
            </div>
        <?php /*}*/ ?>

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

