<?php   echo $this->Html->css('jquery-ui.min');
        echo $this->Html->script('jquery-ui.min'); ?>
<div>
<table width="650px" style="table-layout: fixed; margin: 0 auto;">
<tr>
    <td width="20%"></td>
    <td width="50%"><span class="generalinfoheader">General Information</span>
    <br/>Counseling Schedule: <a href="<?php echo $this->webroot . '/files/CUP Recruietment TNT-01(2016 Notice.jpg'; ?>" target="_blank">click here</a>
    <br/>General Instructions and Essential Information for Online Counseling: <a href="<?php echo $this->webroot . 'files/Important Instruction for adm-2016.pdf'; ?>" target="_blank">click here</a>
    <!--<br/>E-Brochure <a href="<?php echo $this->webroot . 'files/handbook 2016.pdf'; ?>" target="_blank">click here</a>-->
    <br/>The fee structure of each Course : <a href="http://www.ugc.ac.in/pdfnews/8539300_English.pdf" target="_blank">click here</a>
    <br/></td>
    <!--<td width="30%"><span class="generalinfoheader">Educational Qualifications</span></td>
    <td width="20%"><span class="generalinfoheader">Advertisement</span></td>-->
    <td><?php if(!empty($this->Session->read('admin')) && $this->Session->read('admin') == "1") { ?> For Reports: <a href="javascript: showReports();" target="_blank">click here</a> <?php } ?></td>
</tr>
<tr>
    <td></td>
    <td>If the candidate is selected, she/he will be required to submit Aadhaar within one month of joining.</td>
    <td></td>
    <td></td>
</tr>
<!--
<tr>
    <td></td>
    <td>In case of payment failure, the final submission of application will not take place. The candidate will not be able to print the form.</td>
    <td></td>
    <td></td>
</tr>-->
<!--
<tr>
    <td></td>
    <td>If payment fails, it will be automatically refunded to the same account.</td>
    <td></td>
    <td></td>
</tr>-->
<tr>
    <td></td>
    <td>Billing Address is the address of Credit/Debit card holder.</td>
    <td></td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td><span class="generalinfoheader">Eligibility Criteria & Seat Distribution</span>
    <br/>Educational Qualifications for each Course: <a href="<?php echo $this->webroot . 'files/PUNJAB Eligibility Criteria-CUCET2016.pdf'; ?>" target="_blank">click here</a><br/>
    <br/>Seat Distribution in Each Course: <a href="<?php echo $this->webroot . 'files/PUNJAB Eligibility Criteria-CUCET2016.pdf'; ?>" target="_blank">click here</a> 
    <br/></td>
    <td></td>
</tr>
<!--
<tr>
    <td></td>
    <td width="60%"></td>
    <td></td>
</tr>-->
<tr>
    <td></td>
    <td><span class="generalinfoheader">Important Dates</span>
        <br/> The registration of online counseling starts from 20<sup>th</sup> June, 2016 0900 hrs
        <br/>
        The last date of online counseling form is 28<sup>th</sup> June, 2016 1700 hrs
        <br/>
    </td>
    <td></td>
</tr>
<!--
<tr>
    <td></td>
    <td>
        <span>For detailed qualifications, please <a href="javascript: void(0);" target="_blank">click here</a></span>.
    </td>
    <td></td>
    <td></td>
</tr>-->
<tr>
    <td></td>
    <td><label>I have read the General Conditions to Apply and <a href="<?php echo $this->webroot . 'files/Refund Policy.pdf'; ?>">Payment & Refund Policy</a>: (Tick the box to continue) <span>*</span></label>
    </td>
    <td><input type="checkbox" id="declaration" name="declaration"></input></td>
    <td></td>
</tr>
<!--
<tr>
    <td></td>
    <td><span style="font-weight: bold; font-size: 20px; color:#0a0;">Post Applied For: *</span>
    </td>
    <td><select id="post_applied_for" name="post_applied_for" style="width: auto;">
                <option value="none" selected="selected">None</option>
                <option value="professor">Professor</option>
                <option value="associateprofessor">Associate Professor</option>
                <option value="assistantprofessor">Assistant Professor</option>
            </select></td>
    <td></td>
</tr>-->
<!--
<tr>
    <td></td>
    <td><span style="font-weight: bold; font-size: 20px; color:#0a0;">School: *</span>
        (<a href="http://cup.ac.in/schools_centres.php" target="_blank">Details of Schools and Centres</a>)
    </td>
    <td><select id="area" name="area" style="width: auto;">
                <option value="none" selected="selected">None</option>
                <option value="bas">Basic and Applied Sciences</option>
                <option value="edu">Education</option>
                <option value="et">Engineering and Technology</option>
                <option value="ees">Environment and Earth Sciences</option>
                <option value="gr">Global Relations</option>
                <option value="hs">Health Sciences</option>
                <option value="llc">Languages, Literature and Culture</option>
                <option value="lsg">Legal Studies and Governance</option>
                <option value="sps">Sports Sciences</option>
                <option value="ss">Social Sciences</option>
                <option value="bsr">Baba Satguru Ram Singh Chair</option>
            </select></td>
    <td></td>
</tr>
-->
<!--
<tr>
    <td></td>
    <td><span style="font-weight: bold; font-size: 20px; color:#0a0;">Centre: *</span>
    </td>
    <td><select id="centre" name="centre" style="width: auto;">
            <option value="none" selected="selected">None</option>
                <option value="Applied Agriculture">Applied Agriculture</option>
                <option value="Animal Sciences">Animal Sciences</option>
		<option value="Baba Satguru Ram Singh Chair">Baba Satguru Ram Singh Chair</option>
                <option value="Biochemistry and Microbial Sciences">Biochemistry and Microbial Sciences</option>
                <option value="Chemical Sciences">Chemical Sciences</option>
                <option value="Classical and Modern Languages (Punjabi Languages, Literature and Culture, English)">Classical and Modern Languages (Punjabi Languages, Literature and Culture, English)</option>
		<option value="Comparative Literature">Comparative Literature</option>
                <option value="Computational Sciences">Computational Sciences</option>
                <option value="Computer Science and Technology">Computer Science & Technology</option>
                <option value="Economic Studies">Economic Studies</option>
		<option value="Education">Education</option>
                <option value="Environmental Sciences and Technology">Environmental Sciences & Technology</option>
		<option value="Geography and Geology">Geography & Geology</option>
                <option value="Human Genetics and Molecular Medicine">Human Genetics and Molecular Medicine</option>
		<option value="Law">Law</option>
                <option value="Mathematics and Statistics">Mathematics & Statistics</option>
                <option value="Pharmaceutical Sciences and Natural Products">Pharmaceutical Sciences and Natural Products</option>
                <option value="Physical Sciences">Physical Sciences</option>
		<option value="Plant Sciences">Plant Sciences</option>
                <option value="Sociology">Sociology</option>
		<option value="South and Central Asian Studies (Including Historical Studies)">South & Central Asian Studies (Including Historical Studies)</option>
		<option value="Sports Sciences">Sports Sciences</option>
            </select></td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td><div id="post_selected_elig" style="display:none;" class="min_qualification"></div>
    </td>
    <td></td>
    <td></td>
</tr>-->
<tr>
    <td></td>
    <td><div style="text-align: center; font-size: 20px;">
        <?php //if(isset($applicant) && $applicant['Applicant']['final_submit'] != "1" ) {
              echo $this->Form->create('Temp', array('id' => 'Continue_Form', 'url' => Router::url( '/multi_step_form/wizard/first', true ))); 
              echo $this->Form->submit('Continue to Application Form', array('div' => false, 'id' => 'continue_bt' ));
              echo $this->Form->end(); 
            //} ?>
        <!--<a href="<?php echo $this->webroot; ?>multi_step_form/wizard/first" class="button" id="continue_bt">Continue</a>-->
    </div>
    </td>
    <td><!--<div style="text-align: center; font-size: 20px;"><?php if(isset($applicant) && $applicant['Applicant']['final_submit'] == "1" ) {
              echo $this->Form->create('Temp2', array('id' => 'Print_Form', 'url' => Router::url( '/form/print_bfs', true ))); 
              echo $this->Form->submit('Print Application Form', array('div' => false, 'id' => 'print_bt' ));
              echo $this->Form->end(); 
              } ?>
        </div>-->
    </td>
    <td></td>
</tr>
</table>
</div>

<div id="dialog" title="Password">
<form id="pprompt" name="pprompt" method="post" action="<?php echo $this->webroot; ?>reports/index">
  <input name="password" type="password" size="25" />
</form>
</div>
<script>
    var currentForm;
    $(function() {
        $( "#dialog" ).dialog({
            resizable: false,
            height: 240,
            modal: true,
            autoOpen: false,
            buttons: {
                'Submit': function() {
                    $(this).dialog('close');
                    currentForm.submit();
                    
                },
                Cancel: function() {
                    $(this).dialog('close');
                }
            }
        });
    });
    
    function showReports() {
        currentForm = $('#pprompt');
        //currentForm.submit();
        $( "#dialog" ).dialog('open');
    }
    
    $(document).ready(function() {
        $('#post_applied_for').val('none');
        $('#area').val('none');
        $('#centre').val('none');
        //$('#continue_bt').prop('disabled', true);
        $('#declaration').prop('checked', false);

        /*$('#area, #post_applied_for, #declaration, #centre').on('change', function() {
            if($('#post_applied_for').val() === 'none' || $('#area').val() === 'none' || 
                $('#declaration').is(':checked') == false || $('#centre').val() === 'none') {
                    $('#post_selected_elig').css("display","none");
                    //$('#continue_bt').prop('disabled',true);
            }
            else {
                $('#post_selected_elig').empty();
                $('#post_selected_elig').append($('#' + $('#post_applied_for').val() + 
                                                '_' + $('#area').val()).clone().css('display','block'));
                $('#post_selected_elig').css("display","block");
                //$('#continue_bt').prop('disabled', false);
            }
        });*/

        $('#continue_bt').on('click', function(e){
            if($('#declaration').is(':checked') == false) {
                e.preventDefault();
                alert('Please select General Conditions to Apply (Tick Box) to continue.');
            }
            else {
                e.preventDefault();
                //window.location.href = '<?php echo $this->webroot; ?>multi_step_form/wizard/first?post=' + 
                //                $('#post_applied_for').find(":selected").text() + '&area=' + 
                //                $('#area').find(":selected").text() + '&centre=' +
                //                $('#centre').find(":selected").text();
                
                window.location.href = '<?php echo $this->webroot; ?>form/studentdetails';
            }
        });
        
        
        <?php 
            if(!empty($this->Session->read('disabled_posts'))) {
                foreach ($this->Session->read('disabled_posts') as $value) {
                    echo "$(\"#post_applied_for option[text='" . $value .  "']\").remove();";
                    echo "$('#post_applied_for option').each(function() {\n
                        if ( $(this).text() == '" . $value . "' ) {\n
                            $(this).remove();\n
                        }\n
                    });\n";
                }
            }
         ?>
         

         $('#declaration').change(function(){
            if($(this).is(':checked')) {
                $('#continue_bt').prop('disabled', false);
            }
            else {
                $('#continue_bt').prop('disabled',true);
            }
        });

    });
</script>

