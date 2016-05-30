<script>
    $(function() {
        $('#file_upload').uploadify({
            'swf'      : '<?php echo $this->webroot . 'files/uploadify.swf' ?>',
            'uploader' : '<?php echo $this->webroot . 'form/uploaddocuments' ?>',
            'cancelImg' : '<?php echo $this->webroot . 'files/uploadify-cancel.png' ?>',
            'folder'    : 'documents',
            'auto'      : false,
            'multi'    : false,
            'onComplete'  : function(event, ID, fileObj, response, data) {
                            alert('File Uploaded');
                           }
        });
    });
    
    $(function() {
        $('#file_upload2').uploadify({
            'swf'      : '<?php echo $this->webroot . 'files/uploadify.swf' ?>',
            'uploader' : '<?php echo $this->webroot . 'form/uploaddocuments' ?>',
            'cancelImg' : '<?php echo $this->webroot . 'files/uploadify-cancel.png' ?>',
            'folder'    : 'documents',
            'auto'      : false,
            'multi'    : false,
        });
    });
    
    $(function() {
        $('#file_upload3').uploadify({
            'swf'      : '<?php echo $this->webroot . 'files/uploadify.swf' ?>',
            'uploader' : '<?php echo $this->webroot . 'form/uploaddocuments' ?>',
            'cancelImg' : '<?php echo $this->webroot . 'files/uploadify-cancel.png' ?>',
            'folder'    : 'documents',
            'auto'      : false,
            'multi'    : false,
        });
    });
    
    $(function() {
        $('#file_upload4').uploadify({
            'swf'      : '<?php echo $this->webroot . 'files/uploadify.swf' ?>',
            'uploader' : '<?php echo $this->webroot . 'form/uploaddocuments' ?>',
            'cancelImg' : '<?php echo $this->webroot . 'files/uploadify-cancel.png' ?>',
            'folder'    : 'documents',
            'auto'      : false,
            'multi'    : false,
        });
    });
    
    /*$(".file_upload").each(function() {
        $(this).uploadify({
           //height        : 30,
           'swf'           : '<?php echo $this->webroot . 'files/uploadify.swf' ?>',
           'uploader'      : '<?php echo $this->webroot . 'form/uploaddocuments' ?>',
           //width         : 120,
           'cancelImg'     : '<?php echo $this->webroot . 'files/uploadify-cancel.png' ?>',
           'auto'          : true,
           'folder'        : 'documents',
           //multiple      : false,
           'onComplete'    : function(event, ID, fileObj, response, data) {
                            alert('File Uploaded');
                           }
        });
    });*/

</script>
<div id="wrapper">
  <div id="sidebar"><?php echo $this->element('left-sidebar');?></div>
  <div id="maincontent">
<?php
echo $this->Html->css('uploadify.css');
echo $this->Html->script('jquery.uploadify.min');
echo $this->Form->create('Document', array('id' => 'Image_Details', 'url' => Router::url( null, true ), 'type' => 'file')); ?>
<div class="main_content_header">Upload Documents</div>
<div id="contentContainer">
    <table>
        <tr>
            <td class="table_headertxt misc_col1" style="padding-top: 17px;">Upload passport size photograph (.jpg format, min size 10 kb, max size 200 kb)<?php echo $this->Form->input('Document.id', array('type' => 'hidden'));
                                                                                                                                                                             echo $this->Form->input('Document.applicant_id', array('type' => 'hidden', 'value' => $this->Session->read('applicant_id')));   ?>
            <span style="color: red;">MANDATORY</span>    
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
            <span style="color: red;">MANDATORY</span> 
            </td>
            <td><?php echo $this->Form->input('filename2', array('label' => false, 'type' => 'file')); ?></td>
        </tr>
        <tr>
            <td class="table_headertxt misc_col1" style="padding-top: 17px;">Caste Certificate, as per Central Govt. List (.jpg/.png/.gif/.pdf format, min size 10 kb, max size 200 kb)</td>
            <td><?php echo $this->Form->input('filename3', array('label' => false, 'type' => 'file')); ?></td>
        </tr>
        <tr>
            <td class="table_headertxt misc_col1" style="padding-top: 17px;">Signature of the candidate (.jpg format, min size 10 kb, max size 200 kb)
            <span style="color: red;">MANDATORY</span> 
            </td>
            <td><?php echo $this->Form->input('filename4', array('label' => false, 'type' => 'file')); ?></td>
        </tr>
        <?php if(!empty($applicant['Applicant']['post_applied_for']) && ($applicant['Applicant']['post_applied_for'] == "Professor" || $applicant['Applicant']['post_applied_for'] == "Associate Professor")) { ?>
        <tr>
            <td class="table_headertxt misc_col1" style="padding-top: 17px;">API Proforma (MS Word format - <a href="<?php echo $this->webroot . '/files/API Form.doc'; ?>">Download</a>, Fill and Upload here, min size 10 kb, max size 500 kb)</td>
            <td><?php echo $this->Form->input('filename5', array('label' => false, 'type' => 'file')); ?></td>
        </tr>
        <?php } ?>
        <tr>
            <td class="table_headertxt misc_col1" style="padding-top: 17px;">Note: Images can be uploaded using the mobile phone also.</td>
            <td></td>
        </tr>
    </table>
    
</div>
<div class="submit">
    <?php echo $this->Form->submit('Save & Continue', array('div' => false)); ?>
    <?php echo $this->Form->submit('Cancel', array('name' => 'Cancel', 'div' => false)); ?>
</div>
<?php echo $this->Form->end(); ?>

<input type="file" name="file_upload" id="file_upload" class="file_upload" />
<input type="file" name="file_upload2" id="file_upload2" class="file_upload" />
<input type="file" name="file_upload3" id="file_upload3" class="file_upload" />
<input type="file" name="file_upload4" id="file_upload4" class="file_upload" />
<br/><br/>
<a href="javascript:fileUpload();"/> Upload Documents </a>
  </div>
<script>
    function fileUpload() {
        $('#file_upload').uploadify('upload', '*');
        $('#file_upload2').uploadify('upload', '*');
        $('#file_upload3').uploadify('upload', '*');
        $('#file_upload4').uploadify('upload', '*');
    }
</script>