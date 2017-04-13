<section class="container-fluid main-content">
  <div class="container">
    <div class="col-md-8 mobil">
      <?php // mobil-ignis-2.jpg  ?>
      <img class="img-responsive produk-ignis" src="<?php echo base_url('assets/public/img/ignis-lamp.gif');?>" alt="Suzuki Ignis - Gear to Ignite" />
    </div>
    <div class="col-md-4">
      <div class="row">
        <?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
        <div id="result" class="col-md-12"></div>
        <div class="container-fluid quiz">
                <div>
                <?php echo form_open(base_url('account/update_account'),['enctype'=>'multipart/form-data','role'=>'form','name'=>'form_account','id'=>'form_account','class'=>'form-horizontal']); ?>
                <div class="indentity-form">
                  <div class="body-indentity">
                        <h3><span class="font-bold">Isi form untuk mendapatkan souvenir menarik</span><br><span class="font-small"></span></h3>
                        <div class="form-group">
                            <div>
                                <input type="text" class="form-control" id="inputName" name="name" placeholder="Nama Lengkap" value="<?php echo @$this->participant->name;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" value="<?php echo @$this->participant->email;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="text" class="form-control" id="inputPhone" name="phone_number" placeholder="No. Hp" value="<?php echo @$this->participant->phone_number;?>">
                            </div>
                        </div>
                        <div class="form-group captcha-css">
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
                <div class="boxed-grey">
                    <fieldset><legend class="text-white">Atau login dengan akun sosial anda untuk melanjutkan</legend>
                        <ul class="list-inline">
                            <li>
                                <a href="javascript:void(0);" class="btn btn-sm btn-primary facebook" id="facebook" onclick="popupCenter('<?php echo base_url('hauth/login/Facebook');?>', 'Facebook',480,520);">
                                    <span class="fa fa-facebook fa-1x"></span>&nbsp;&nbsp;Facebook
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="btn btn-sm btn-info twitter" id="twitter" onclick="popupCenter('<?php echo base_url('hauth/login/Twitter');?>', 'Twitter',480,520);">
                                    <span class="fa fa-twitter fa-1x"></span>&nbsp;&nbsp;Twitter
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="btn btn-sm btn-danger google" id="google" onclick="popupCenter('<?php echo base_url('hauth/login/Google');?>', 'Google',480,520);">
                                    <span class="fa fa-google-plus fa-1x"></span>&nbsp;&nbsp;Google
                                </a>
                            </li>
                        </ul>
                        <span class="text-white">* Akan dikembalikan ke halaman daftar setelah login</span>
                    </fieldset>
                </div>
                <?php } else { ?>
                    <span class="text-white">Terima Kasih telah menggunakan Account<?php echo ' '.$this->input->get('redirect');?> Anda. Silahkan melanjutkan mengisi form diatas.</span>
                <?php } ?>
                <div class="submit-quiz">
                  <button class="btn btn-hero btn-lg btn-danger" role="button">SUBMIT</button>
                  <span class="center-block agreed">
                      Dengan menekan tombol <b>SUBMIT</b> berarti <b>ANDA</b> setuju untuk tunduk kepada <a href="<?php echo base_url('page/terms-and-conditions');?>" class="font-bold">Syarat &amp; Ketentuan</a> yang berlaku.
                  </span>
                  <div class="tnc">
                      <a class="font-bold hidden" href="<?php echo base_url('page/terms-and-conditions');?>">Syarat &amp; Ketentuan</a>
                  </div>
                </div>
                <?php echo form_close(); ?>
            </div>
      </div>
    </div>
  </div>
  </div>
</section>
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
