<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<section id="account" class="account">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h2 class="page-header text-center"><?php echo $conference->subject;?></h2>
            <div class="col-lg-6 col-md-6 col-sm-6 login">
                <div class="boxed-grey">
                <fieldset><legend>LOGIN</legend>
                  <?php echo form_open(base_url('account/login'),array('id'=>'form-login','name'=>'login','method'=>'POST'));?>
                    <div class="form-group">
                        <label class="control-label" for="email">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email', $fields['email']) ?>" placeholder="Enter email" required="required" />
                        </div>
                        <small class="text-danger"><?php echo $errors['email'];?></small>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="email">Password</label>
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            <input type="password" class="form-control" id="password" name="password" value="<?php echo set_value('password', $fields['password']) ?>" placeholder="Enter password" required="required" />
                        </div>
                        <small class="text-danger"><?php echo $errors['password'];?></small>
                    </div> 
                    <?php echo form_submit('submit','LOGIN','class="btn btn-primary"');?>
                    <div class="pull-right"><a href="<?php echo base_url('account/forgot_password');?>" class="forgot-password">Forgot Password</a></div>
                  <?php echo form_close();?>
                </fieldset>
                    <hr/>
                    <div>
                        <ul class="list-inline">
                            <li class="item-list">
                                <a href="javascript:void(0);" class="btn btn-default btn-md twitter" id="twitter" onclick="popupCenter('<?php echo base_url('hauth/login/Twitter');?>', 'myPop1',480,520);">
                                    <span class="fa fa-twitter"></span>&nbsp;&nbsp;Login With Twitter
                                </a>
                            </li>
                            <li class="item-list">
                                <a href="javascript:void(0);" class="btn btn-default btn-md facebook" id="facebook" onclick="popupCenter('<?php echo base_url('hauth/login/Facebook');?>', 'myPop1',480,520);">
                                    <span class="fa fa-facebook"></span>&nbsp;&nbsp;Login With Facebook
                                </a>
                            </li>
                            <li class="item-list">
                                <a href="javascript:void(0);" class="btn btn-default btn-md googleplus" id="google" onclick="popupCenter('<?php echo base_url('hauth/login/Google');?>', 'myPop1',480,520);">
                                    <span class="fa fa-google-plus"></span>&nbsp;&nbsp;Login With Google
                                </a>
                            </li>
                            <?php 
                                //echo anchor('hauth/login/Google','Login With Google.').'<br />';
                                /*
                                echo anchor('hauth/login/Twitter','<span class="fa fa-twitter"></span>&nbsp;&nbsp;Login With Twitter','id="#iframe" class="btn btn-default twitter"').'<br />';
                                echo anchor('hauth/login/Facebook','<span class="fa fa-twitter"></span>&nbsp;&nbsp;Login With Facebook','id="#iframe" class="btn btn-default facebook"').'<br />';
                                */ 
                                //echo anchor('hauth/login/LinkedIn','Login With LinkedIn.').'<br />';
                            ?>
                        </ul>
                    </div>        
                </div>    
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 register">
                <div class="boxed-grey">
                <fieldset><legend>REGISTER</legend>
                    <?php echo form_open_multipart(base_url('account/register'),array('id'=>'form-register','name'=>'register','method'=>'POST'));?>
                    <div class="form-group">
                        <label class="control-label" for="fullname">Full Name</label>
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo set_value('fullname', $fields['fullname']) ?>" placeholder="Enter full name" required="required" />
                        </div>
                        <small class="text-danger"><?php echo $errors['fullname'];?></small>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="email_register">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                            <input type="email" class="form-control" id="email_register" name="email_register" value="<?php echo set_value('email_register', $fields['email_register']) ?>" placeholder="Enter email" required="required" />
                        </div>
                        <small class="text-danger"><?php echo $errors['email_register'];?></small>
                    </div>
                    <!--div class="form-group">
                        <label class="control-label" for="gender">Gender</label>
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-adjust"></span></span>
                            <select class="form-control" name="gender">
                            <?php foreach ($genders as $gender => $gen) {?>
                                <option value="<?php echo $gender;?>" <?php echo ($gender == $fields['gender']) ? 'selected' : '';?>><?php echo $gen;?></option>
                            <?php } ?>
                            </select>
                        </div>
                        <small class="text-danger"><?php echo $errors['gender'];?></small>
                    </div-->
                    <!--div class="form-group">
                        <label class="control-label" for="phone_number">Phone Number</label>
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?php echo set_value('phone_number', $fields['phone_number']) ?>" placeholder="Enter phone number" required="required" />
                        </div>
                        <small class="text-danger"><?php echo $errors['phone_number'];?></small>
                    </div-->
                    <div class="form-group">
                        <label class="control-label" for="captcha">
                            Captcha <a class="reload_captcha tooltips" title="Reload Captcha" data-placement="right" rel="<?=base_url()?>account/reload_captcha" href="javascript:;">
                            <?php echo $captcha['image'];?></a><!--small class="text-danger">&nbsp; Captcha expired in 60 Seconds.</small-->
                        </label>
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-info-sign"></span></span>
                            <input type="text" class="form-control" placeholder="Captcha" id="captcha" name="captcha" value="<?php echo $fields['captcha']; ?>">
                        </div>
                        <small class="text-danger"><?php echo $errors['captcha'];?></small>
                    </div>																							
                    <div class="form-group">
                        <?php echo form_submit('text','REGISTER','class="btn btn-primary"');?>
                    </div>
                  <?php echo form_close();?>
                </fieldset> 
                </div>    
            </div>
        </div>
    </div>
</section>