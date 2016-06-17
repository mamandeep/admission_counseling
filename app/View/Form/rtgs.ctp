<div id="wrapper">
  <div id="sidebar"><?php echo $this->element('left-sidebar');?></div>
  <div id="maincontent">
<?php
echo $this->Form->create('Document', array('id' => 'Image_Details', 'url' => Router::url( null, true ), 'type' => 'file')); ?>
<div class="main_content_header">Upload Documents</div>
<div id="contentContainer">
    <table>
        <tr>
            <td class="table_headertxt misc_col1" style="padding-top: 17px;">Upload scanned image of RTGS payment (.jpg format, min size 10 kb, max size 200 kb)
                <?php echo $this->Form->input('Document.id', array('type' => 'hidden'));
                      echo $this->Form->input('Document.std_id', array('type' => 'hidden', 'value' => $this->Session->read('std_id')));   ?>
            <span style="color: red;">MANDATORY</span>    
            </td>
            <td><?php echo $this->Form->input('filename5', array('label' => false, 'type' => 'file')); ?>
            </td>
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
        <!--
        <td>
            <div class="submit">
                <a href="<?php echo $this->webroot; ?>form/previewdocuments?ct=1" id="continue_bt" class="button_ct" style="font-size: 20px;">Continue</a>
            </div>
        </td> -->
    </tr>
</table>
<?php echo $this->Form->end(); ?>
  </div>
<script>
</script>