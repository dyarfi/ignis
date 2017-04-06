<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div id="result" class="col-md-12"></div>
<div class="container-fluid quiz">
  <?php /*if ($this->participant && $this->participant->completed != 1) { */ ?>
  <?php /*if (!$this->participant) {*/ ?>
    <?php echo form_open(base_url('account/update_account'),['enctype'=>'multipart/form-data','role'=>'form','name'=>'form_account','id'=>'form_account','class'=>'form-horizontal']); ?>
     <div class="body-quiz col-md-6 pull-right">
         <div class="indentity-form">
          <div class="body-indentity">
                  <div class="text-danger">
                      <h1 class="uppercase text-white">Gabung <b>Ignis</b>
                      <small>Sekarang</small>
                      <!--a href="<?php echo base_url('account');?>" class="various fancybox.ajax popup_account">account</a-->
                  </h1>
                  </div>

                <div class="form-group">
                    <!--label for="inputName" class="control-label col-xs-4 text-danger">Nama Lengkap</label-->
                    <div class="col-xs-8">
                        <input type="text" class="form-control" id="inputName" name="name" placeholder="Nama Lengkap" value="<?php echo @$this->participant->name;?>">
                    </div>
                </div>
                <div class="form-group">
                    <!--label for="inputEmail" class="control-label col-xs-4 text-danger">Email</label-->
                    <div class="col-xs-8">
                        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" value="<?php echo @$this->participant->email;?>">
                    </div>
                </div>
                <div class="form-group">
                    <!--label for="inputAddress" class="control-label col-xs-4 text-danger">Alamat</label-->
                    <div class="col-xs-8">
                        <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Alamat" value="<?php echo @$this->participant->address;?>">
                    </div>
                </div>
                <div class="form-group">
                    <!--label for="inputPhone" class="control-label col-xs-4 text-danger">No. Hp</label-->
                    <div class="col-xs-4">
                        <input type="text" class="form-control" id="inputPhone" name="phone_number" placeholder="No. Hp" value="<?php echo @$this->participant->phone_number;?>">
                    </div>
                </div>
                <div class="form-group">
                    <!--label for="inputHomePhone" class="control-label col-xs-4 text-danger">No. Telp</label-->
                    <div class="col-xs-4">
                        <input type="text" class="form-control" id="inputHomePhone" name="phone_home" placeholder="No. Telp" value="<?php echo @$this->participant->phone_home;?>">
                    </div>
                </div>
                <div class="form-group">
                    <!--label for="inputId" class="control-label col-xs-4 text-danger">No. ID</label-->
                    <div class="col-xs-4">
                        <input type="text" class="form-control" id="inputId" placeholder="KTP / SIM" name="id_number" value="<?php echo @$this->participant->id_number;?>">
                    </div>
                </div>
          </div>
        </div>
        <?php if (!$this->participant) { ?>
        <div class="boxed-grey marginbot-50">
            <fieldset class="marginbot-50"><legend class="text-white">Atau login dengan akun sosial anda untuk melanjutkan</legend>
                <ul class="list-inline col-lg-12 col-md-12 col-sm-12">
                    <li>
                        <a href="javascript:void(0);" class="btn btn-default btn-md btn-info twitter" id="twitter" onclick="popupCenter('<?php echo base_url('hauth/login/Twitter');?>', 'Twitter',480,520);">
                            <span class="fa fa-twitter"></span>&nbsp;&nbsp;Login Twitter
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="btn btn-primary btn-md facebook" id="facebook" onclick="popupCenter('<?php echo base_url('hauth/login/Facebook');?>', 'Facebook',480,520);">
                            <span class="fa fa-facebook"></span>&nbsp;&nbsp;Login Facebook
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
        <div class="submit-quiz">
          <button class="btn btn-hero btn-sm btn-danger" role="button">SUBMIT</button>
          <div class="tnc"><a href="<?php echo base_url('page/terms-and-conditions');?>">Syarat &amp; Ketentuan</a></div>
        </div>
      </div>
    <?php echo form_close();
  /*} else {*/ ?>
  <br/><br/><br/><br/><br/><br/><br/><br/>
<?php /*}*/ ?>
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
</div>
