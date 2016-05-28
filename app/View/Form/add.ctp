<?php 
//create a unique id
$up_id = uniqid(); 
?>
<?php

$upload_progress_js = <<<UPJS

    jQuery(function($) {
      $('#DocumentAddForm').submit(function(e) {
		  	show_progress();
      });
 	});

function show_progress(){

		$('.submit').hide();	
		$('#upload_frame').show(); 

		function set() { 
            $('#upload_frame').attr('src','/progress_frame.php?up_id=$up_id'); 
        } 
        setTimeout(set);

}

UPJS;
?>
<?php $up_p_name = ini_get("session.upload_progress.name"); ?>
<?php echo $this->Form->create('Document', array('type' => 'file')); ?>
<?php $this->Form->unlockField($up_p_name); 
 	    echo $this->Form->hidden($up_p_name, array('value' => $up_id,'name' => $up_p_name,'id'=>'upload_progress_id','secure' => false));
            echo $this->Form->input('Document.filename', array('type' => 'file','label' => 'Image Upload'));
?>
<?php echo $this->Form->end(__('Submit Entry')); ?>

<iframe id="upload_frame" name="upload_frame" frameborder="0" border="0" src="" scrolling="no" scrollbar="no" > </iframe>

<?php $this->Js->buffer($upload_progress_js); ?>
<?php
    echo $this->Js->writeBuffer();
?>