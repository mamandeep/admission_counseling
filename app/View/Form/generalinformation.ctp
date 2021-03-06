<div id="wrapper">
  <div id="sidebar"><?php echo $this->element('left-sidebar');?></div>
  <div id="maincontent">
    <?php   echo $this->Html->css('jquery-ui.min');
            echo $this->Html->script('jquery-ui.min'); ?>
    <div>
    <table width="650px" style="table-layout: fixed; margin: 0 auto;">
    <tr>
        <td width="20%"></td>
        <td width="50%"><span class="generalinfoheader">General Information</span>
            <!--<div class="glabel">Counselling Schedule: <a href="<?php echo $this->webroot . 'files/CUPB_counselling_ schedule.pdf'; ?>" >click here</a></div>-->
            <div class="glabel">Important Instructions: <a href="<?php echo $this->webroot . 'files/Important Instruction for adm-2016.pdf'; ?>" >click here</a></div>
            <div class="glabel">How to Register & Fill the Counselling Form: <a href="<?php echo $this->webroot . 'files/guidelines_for_filling_form.pdf'; ?>" >click here</a></div>
            <!--<br/>E-Brochure <a href="<?php echo $this->webroot . 'files/handbook 2016.pdf'; ?>" target="_blank">click here</a>-->
            <div class="glabel">The fee structure of each Course : <a href="<?php echo $this->webroot . 'files/Fee Structure 2016.jpg'; ?>" >click here</a></div>
        </td>
        <!--<td width="30%"><span class="generalinfoheader">Educational Qualifications</span></td>
        <td width="20%"><span class="generalinfoheader">Advertisement</span></td>-->
        <td><?php if(!empty($this->Session->read('admin')) && $this->Session->read('admin') == "1") { ?> For Reports: <a href="javascript: showReports();" target="_blank">click here</a> <?php } ?></td>
    </tr>
    <tr>
        <td></td>
        <td><span class="generalinfoheader">Eligibility Criteria & Seat Distribution</span>
            <div class="glabel">Educational Qualifications for each Course: <a href="<?php echo $this->webroot . 'files/PUNJAB Eligibility Criteria-CUCET2016.pdf'; ?>" >click here</a></div>
            <div class="glabel">Seat Distribution in each Course: <a href="<?php echo $this->webroot . 'files/Allocation of Reserved seats Admission 2016-17.pdf'; ?>" >click here</a></div>
        </td>
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
            <div class="glabel">The registration of online counseling starts from 01<sup>st</sup> August, 2016 0900 hrs</div>
            <div class="glabel">The last date of online counseling form is 03<sup>rd</sup> August, 2016 1600 hrs</div>
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
    </tr>
    <a href="<?php echo $this->webroot . 'files/Refund Policy.pdf'; ?>">Payment & Refund Policy</a>-->
    <tr>
        <td></td>
        <td><label style="color: red;">I have read the Important Instructions and Eligibility Criteria: (Tick the box to continue) <span>*</span></label>
        </td>
        <td><input type="checkbox" id="declaration" name="declaration" style="width: 30px;height: 30px; cursor: pointer;"></input></td>
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
            <?php 
                  echo $this->Form->create('Temp', array('id' => 'Continue_Form', 'url' => Router::url( '/form/studentdetails', true ))); 
                  echo $this->Form->submit('Continue to Application Form', array('div' => false, 'id' => 'continue_bt' ));
                  echo $this->Form->end(); 
                 ?>
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
  </div>
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
        //$('#continue_bt').prop('disabled', true);
        $('#declaration').prop('checked', false);

        $('#continue_bt').on('click', function(e){
            if($('#declaration').is(':checked') == false) {
                e.preventDefault();
                alert('Please select General Conditions to Apply (Tick Box) to continue.');
            }
            else {
                e.preventDefault();
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
                //$('#continue_bt').prop('disabled',true);
            }
        });

    });
</script>

