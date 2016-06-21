<div id="wrapper">
  <div id="sidebar"><?php echo $this->element('left-sidebar');?></div>
  <div id="maincontent">
<?php
echo $this->Form->create('Document', array('id' => 'Image_Details', 'url' => Router::url( null, true ), 'type' => 'file')); ?>
<div class="main_content_header">Upload Documents</div>
<div id="contentContainer">
    <table>
        <tr>
            <td class="table_headertxt misc_col1" style="padding-top: 17px;">Upload passport size photograph (.jpg/.jpeg/.png/.gif format, min size 10 kb, max size 200 kb)<?php echo $this->Form->input('Document.id', array('type' => 'hidden'));
                                                                                                                                                                             echo $this->Form->input('Document.std_id', array('type' => 'hidden', 'value' => $this->Session->read('std_id')));   ?>
            <span style="color: red;">COMPULSORY</span>    
            </td>
            <td><?php echo $this->Form->input('filename', array('label' => false, 'type' => 'file')); ?>
            </td>
        </tr>
        <!--<tr>
            <td class="table_headertxt misc_col1" style="padding-top: 17px;">Upload NOC, if you are working in a Government Organization. If not, upload Form 16 (.jpg format, min size 10 kb, max size 200 kb)</td>
            <td><?php echo $this->Form->input('filename2', array('label' => false, 'type' => 'file')); ?></td>
        </tr>-->
        <tr>
            <td class="table_headertxt misc_col1" style="padding-top: 17px;">Date of Birth Certificate - 10<sup>th</sup> / 11<sup>th</sup> / 10+2 Certificate - where DOB is mentioned (.jpg/.png/.gif/.pdf format, min size 10 kb, max size 200 kb)
            <span style="color: red;">COMPULSORY</span> 
            </td>
            <td><?php echo $this->Form->input('filename2', array('label' => false, 'type' => 'file')); ?></td>
        </tr>
        <tr>
            <td class="table_headertxt misc_col1" style="padding-top: 17px;">Caste Certificate, as per Central Govt. List (.jpg/.png/.gif/.pdf format, min size 10 kb, max size 200 kb)</td>
            <td><?php echo $this->Form->input('filename3', array('label' => false, 'type' => 'file')); ?></td>
        </tr>
        <tr>
            <td class="table_headertxt misc_col1" style="padding-top: 17px;">Signature of the candidate (.jpg/.jpeg/.png/.gif format, min size 10 kb, max size 200 kb)
            <span style="color: red;">COMPULSORY</span> 
            </td>
            <td><?php echo $this->Form->input('filename4', array('label' => false, 'type' => 'file')); ?></td>
        </tr>
        <tr>
            <td class="table_headertxt misc_col1" style="padding-top: 17px;">CUCET Scorecard/Result Card (.jpg/.jpeg/.png/.gif/.pdf format, min size 10 kb, max size 200 kb)
            </td>
            <td><?php echo $this->Form->input('filename6', array('label' => false, 'type' => 'file')); ?></td>
        </tr>
        <tr>
            <td class="table_headertxt misc_col1" style="padding-top: 17px;">Note: Images can be uploaded using the mobile phone also.</td>
            <td></td>
        </tr>
    </table>
    
</div>
<table>
    <tr>
        <td>
            <div class="submit">
                <?php echo $this->Form->submit('Upload', array('div' => false)); ?>
            </div>
        </td>
        <td>
            <div class="submit">
                <a href="<?php echo $this->webroot; ?>form/previewdocuments?ct=1" id="continue_bt" class="button_ct" style="font-size: 20px;">Continue</a>
            </div>
        </td>
    </tr>
</table>
<?php echo $this->Form->end(); ?>
  </div>
<script>
</script>