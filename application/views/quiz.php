<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="container">
    <div class="quiz-page">
        <div id="result" class="col-md-12"></div>   
        <?php if (!$this->participant) { ?>
        <h1>Test Your SX4 S-Cross Knowledge!</h1>
        <h4>connect to your <a href="<?php echo base_url('account');?>" class="various fancybox.ajax popup_account">account</a>, enter your answers</h4>
        <h4>and get exciting prizes!</h4>
        <?php } ?>
        <div class="error-handler">
            <?php if (!empty($progress)) { ?> 
            <div class="col-md-12 center-block text-center">
                <br/><br/>
                <div class="second circle"><br/>
                    <strong></strong>                    
                </div>
                <span><small>YOU ARE COMPLETED!</small></span>
            </div>
            <br/><br/><br/><br/><br/>
            <?php } ?>                        
            <br/>                            
            <div class="clearfix"></div>
            <?php echo validation_errors('<div class="alert alert-danger" role="alert"><span>', '</span></div>'); ?>
        </div>            
        <div class="body-quiz">
                            
            <?php if ($questionnaires) { ?>
            <?php if ($this->participant) { ?><h1>Test Your SX4 S-Cross Knowledge!</h1><?php } ?>
             <?php
                echo (!$this->participant) ? '<div style="margin:0 0 500px 0px;"></div>' : '';
                echo form_open(base_url('quiz'),['id'=>'form-questionnaire','enctype'=>'multipart/form-data','role'=>'form','name'=>'questionnaire','style' => (!$this->participant) ? 'display:none;' : 'display:block;']);
                $i=1; 
                foreach($questionnaires as $questionnaire) { ?>
                <div class="quiz">
                    <div class="quiz-number-box">
                      <div class="quiz-number"><h4><?php echo $i;?></h4></div>
                      <div class="quiz-number-left"></div> 
                    </div>
                    <?php echo $questionnaire->questionnaire_text;?>
                     <div class="answer">
                        <div class="funkyradio">
                          <?php 
                            if ($questions) { ?>
                                <?php 

                                foreach ($questions as $question) { 
                                  if ($questionnaire->id === $question->questionnaire_id) { ?>
                                    <div class="funkyradio-primary">
                                        <input type="radio" <?php echo ($fields['qrid_'.$question->questionnaire_id] == 'qsid_'.$question->id ? 'checked="checked"' : '');?> name="qrid_<?php echo $questionnaire->id;?>" id="qsid_<?php echo $question->id;?>" value="qsid_<?php echo $question->id;?>"/>
                                        <label for="qsid_<?php echo $question->id;?>"><?php echo preg_replace('/(\D+.\:)/','',strip_tags($question->question_text));?></label>
                                        <?php 
                                        if ($question->file_name) {  /* ?>
                                        <div class="center-block">
                                            <img style="height:160px;margin:0 auto 10px auto;" src="<?php echo base_url('uploads/questionnaire/questions/'.$question->file_name);?>" class="img-thumbnail"/>
                                        </div>
                                        <?php */
                                        } ?>                                              
                                    <?php //echo $errors['qrid_'.$question->questionnaire_id]; ?>                                                                                      
                                    </div>
                                  <?php 
                                  }
                                } ?>
                            <?php
                            }
                          ?>                                        
                        </div>
                    </div>
                </div>
            <?php
                $i++;
                }      
            ?>
            <div class="submit-quiz">
                <button class="btn btn-hero btn-sm" role="button" type="submit">NEXT</button>
                <div class="tnc"><a href="<?php echo base_url('page/terms-and-conditions');?>">Terms &amp; Conditions</a></div>
            </div>
            <?php echo form_close(); ?>
        </div>
        <?php 
        } else { ?>

            <div class="row">                  
                <h1>Terima kasih atas partisipasi anda.</h1>
                <?php if ($this->participant && $this->participant->completed != 1) { ?>
                <?php } ?>
            </div>

            <?php if ($this->participant && $this->participant->completed != 1) { ?>
               <div class="body-quiz">
                  <div class="quiz indentity-form">
                    <div class="body-indentity"> 
                        <?php echo form_open(base_url('account/update_account'),['enctype'=>'multipart/form-data','role'=>'form','name'=>'form_account','id'=>'form_account','class'=>'form-horizontal']); ?>               
                            <div class="form-group">
                                <label for="inputName" class="control-label col-xs-4">Nama Lengkap</label>
                                <div class="col-xs-8">
                                    <input type="text" class="form-control" id="inputName" name="name" placeholder="Nama Lengkap" value="<?php echo $this->participant->name;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="control-label col-xs-4">Email</label>
                                <div class="col-xs-8">
                                    <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" value="<?php echo $this->participant->email;?>">
                                </div>
                            </div>
                              <div class="form-group">
                                <label for="inputAddress" class="control-label col-xs-4">Alamat</label>
                                <div class="col-xs-8">
                                    <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Domisili anda, RT/RW, Kecamatan, Kota" value="<?php echo $this->participant->address;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPhone" class="control-label col-xs-4">No. Hp</label>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" id="inputPhone" name="phone_number" placeholder="08123456789" value="<?php echo $this->participant->phone_number;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputHomePhone" class="control-label col-xs-4">No. Telp</label>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" id="inputHomePhone" name="phone_home" placeholder="021234567" value="<?php echo $this->participant->phone_home;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputId" class="control-label col-xs-4">No. ID</label>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" id="inputId" placeholder="123456789" name="id_number" value="<?php echo $this->participant->id_number;?>">
                                </div>
                            </div>               
                    </div>
                  </div>
                  <div class="submit-quiz">
                    <button class="btn btn-hero btn-sm" role="button">SUBMIT</button>
                    <div class="tnc"><a href="<?php echo base_url('page/terms-and-conditions');?>">Syarat &amp; Ketentuan</a></div>
                  </div>
                </div>
            <?php echo form_close();
            } else { ?>
            <br/><br/><br/><br/><br/><br/><br/><br/>
            <?php }
        } 
        ?>
    </div>
</div><!-- /.container --> 



