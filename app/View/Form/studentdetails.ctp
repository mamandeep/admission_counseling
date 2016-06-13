<div id="wrapper">
  <div id="sidebar"><?php echo $this->element('left-sidebar');?></div>
  <div id="maincontent">
<?php echo $this->Form->create('Student', array('id' => 'Student_Details', 
                                'url' => Router::url( null, true ))); 
//print_r($this->request->data);
        ?>
        <table>
            <tr>
                <td><?php 
                    echo $this->Form->input('Student.id', array('type' => 'hidden', 'value' => $this->Session->read('std_id')));
                    echo $this->Form->input('Student.reg_id', array('type' => 'hidden', 'value' => $this->Session->read('registration_id')));
                    ?></td>
                <td></td>
            </tr>
        </table>
      <!--<div style="white-space:pre;overflow:auto;width:100%;padding:10px;">-->
        <table style="width:100%;">
            <tr>
                <td>
                    <div class="main_content_header">Details</div>
                </td>
            </tr>
            <tr>
                <td><?php 
                    echo $this->Form->input('Student.name', array('label' => 'Name:', 'maxlength' => '100'));
                 ?></td>
                <td><?php echo $this->Form->input('Student.email', array('label' => 'Email:', 'maxlength' => '100'));
                ?></td>
                <td><?php echo $this->Form->input('Student.mobile_no', array('label' => 'Mobile No.:', 'maxlength' => '100')); ?></td>
            </tr>
            <tr>
                <td><?php echo $this->Form->input('Student.father_name', array('label' => 'Father\'s Name:', 'maxlength' => '100')); ?></td>
                <td colspan="2"><?php echo $this->Form->input('Student.father_mobile', array('label' => 'Father\'s Mobile No.:', 'maxlength' => '100')); ?></td>
            </tr>
            <tr>
                <td><?php echo $this->Form->input('Student.mother_name', array('label' => 'Mother\'s Name:', 'maxlength' => '100')); ?></td>
                <td colspan="2"><?php echo $this->Form->input('Student.mother_mobile', array('label' => 'Mother\'s Mobile No.:', 'maxlength' => '100')); ?></td>
            </tr>
            <tr>
                <td><?php echo $this->Form->input('Student.dob', array('label' => 'Date of Birth:', 'maxlength' => '100')); ?></td>
                <td><?php echo $this->Form->input('Student.category', array(
                    'options' => array('General' => 'General', 'SC' => 'SC', 'ST' => 'ST', 'OBC' => 'OBC'),
                    'empty' => array('- select -' => '- select -'),
                    'style' => 'width: 100%;',
                    'label' => 'Category'
                )); ?></td>
                <td><?php echo $this->Form->input('Student.kashmiri_mig', array(
                    'options' => array('Yes' => 'Yes', 'No' => 'No'),
                    'empty' => array('- select -' => '- select -'),
                    'style' => 'width: 100%;',
                    'label' => 'Kashmiri Migrant'
                )); ?></td>
            </tr>
            <tr>
                <td><?php echo $this->Form->input('Student.ward_of_def', array(
                    'options' => array('Yes' => 'Yes', 'No' => 'No'),
                    'empty' => array('- select -' => '- select -'),
                    'style' => 'width: 100%;',
                    'label' => 'Ward of Defense Personnel'
                )); ?></td>
                <td colspan="2"><?php echo $this->Form->input('Student.comm_address', array('label' => 'Communication Address:', 'maxlength' => '200')); ?></td>
            </tr>
            <tr><td colspan="3"><?php echo $this->Form->input('Student.pwd', array(
                    'options' => array('Yes' => 'Yes', 'No' => 'No'),
                    'selected' => (isset($pwd) ? $pwd : 'No'),
                    'style' => 'width: 30%;',
                    'label' => 'Differently Abled',
                    'id' => 'pwd_select'
                )); ?>
                <table id="physical_disable">
                    <tr>
                        <td class="table_headertxt"></td>
                        <td class="table_headertxt">If applicable write 'Yes'</td>
                        <td class="table_headertxt">Percentage of disability(%)</td>
                    </tr>
                    <tr>
                        <td>a. Blindness or low vision</td>
                        <td><?php echo $this->Form->input('Student.blindness', array('label' => false, 'maxlength' => '500')); ?></td>
                        <td><?php echo $this->Form->input('Student.blindness_pertge', array('label' => false, 'maxlength' => '500')); ?></td>
                    </tr>
                    <tr>
                        <td>b. Hearing impairment</td>
                        <td><?php echo $this->Form->input('Student.hearing', array('label' => false, 'maxlength' => '500')); ?></td>
                        <td><?php echo $this->Form->input('Student.hearing_pertge', array('label' => false, 'maxlength' => '500')); ?></td>
                    </tr>
                    <tr>
                        <td>c. Locomotor disability or cerebral palsy</td>
                        <td><?php echo $this->Form->input('Student.locomotor', array('label' => false, 'maxlength' => '500')); ?></td>
                        <td><?php echo $this->Form->input('Student.locomotor_pertge', array('label' => false, 'maxlength' => '500')); ?></td>
                    </tr>
                </table>
                </td>
            </tr>
            <!--
            <tr>
                <td><?php echo $this->Form->input('Student.subject1', array(
                    'options' => array( 
                                        'Subject 1' => 'Subject 1',
                                        'Subject 2' => 'Subject 2',
                                        'Subject 3' => 'Subject 3',
                                        'Subject 4' => 'Subject 4',
                                        'Subject 5' => 'Subject 5',
                                        'Subject 6' => 'Subject 6',
                                        'Subject 7' => 'Subject 7',
                                        'Subject 8' => 'Subject 8',
                                        'Subject 9' => 'Subject 9',
                                        'Subject 10' => 'Subject 10',
                                        'Subject 11' => 'Subject 11',
                                        'Subject 12' => 'Subject 12',
                                        'Subject 13' => 'Subject 13',
                                        'Subject 14' => 'Subject 14',
                                        'Subject 15' => 'Subject 15' 
                                       ),
                    'empty' => array('- select -' => '- select -'),
                    'style' => 'width: 100%;',
                    'label' => 'Subject appeared in'
                )); ?></td>
                <td><?php echo $this->Form->input('Student.rollno1', array('label' => 'Roll No.', 'maxlength' => '100')); ?></td>
                <td><?php echo $this->Form->input('Student.score1', array('label' => 'Score', 'maxlength' => '100')); ?></td>
            </tr>
            <tr>
                <td><?php echo $this->Form->input('Student.subject2', array(
                    'options' => array( 
                                        'Subject 1' => 'Subject 1',
                                        'Subject 2' => 'Subject 2',
                                        'Subject 3' => 'Subject 3',
                                        'Subject 4' => 'Subject 4',
                                        'Subject 5' => 'Subject 5',
                                        'Subject 6' => 'Subject 6',
                                        'Subject 7' => 'Subject 7',
                                        'Subject 8' => 'Subject 8',
                                        'Subject 9' => 'Subject 9',
                                        'Subject 10' => 'Subject 10',
                                        'Subject 11' => 'Subject 11',
                                        'Subject 12' => 'Subject 12',
                                        'Subject 13' => 'Subject 13',
                                        'Subject 14' => 'Subject 14',
                                        'Subject 15' => 'Subject 15' 
                                       ),
                    'empty' => array('- select -' => '- select -'),
                    'style' => 'width: 100%;',
                    'label' => 'Subject appeared in'
                )); ?></td>
                <td><?php echo $this->Form->input('Student.rollno2', array('label' => 'Roll No.', 'maxlength' => '100')); ?></td>
                <td><?php echo $this->Form->input('Student.score2', array('label' => 'Score', 'maxlength' => '100')); ?></td>
            </tr>
            <tr>
                <td><?php echo $this->Form->input('Student.subject3', array(
                    'options' => array( 
                                        'Subject 1' => 'Subject 1',
                                        'Subject 2' => 'Subject 2',
                                        'Subject 3' => 'Subject 3',
                                        'Subject 4' => 'Subject 4',
                                        'Subject 5' => 'Subject 5',
                                        'Subject 6' => 'Subject 6',
                                        'Subject 7' => 'Subject 7',
                                        'Subject 8' => 'Subject 8',
                                        'Subject 9' => 'Subject 9',
                                        'Subject 10' => 'Subject 10',
                                        'Subject 11' => 'Subject 11',
                                        'Subject 12' => 'Subject 12',
                                        'Subject 13' => 'Subject 13',
                                        'Subject 14' => 'Subject 14',
                                        'Subject 15' => 'Subject 15' 
                                       ),
                    'empty' => array('- select -' => '- select -'),
                    'style' => 'width: 100%;',
                    'label' => 'Subject appeared in'
                )); ?></td>
                <td><?php echo $this->Form->input('Student.rollno3', array('label' => 'Roll No.', 'maxlength' => '100')); ?></td>
                <td><?php echo $this->Form->input('Student.score3', array('label' => 'Score', 'maxlength' => '100')); ?></td>
            </tr>
            -->
            <tr>
                <td><?php echo $this->Form->input('Student.rollno', array('label' => 'CUCET Roll No.', 'maxlength' => '20')); ?></td>
                <td colspan="2"><?php echo $this->Form->input('Student.aadhaar_no', array('label' => 'Aadhaar Number: (xxxx xxxx xxxx)', 'maxlength' => '500')); ?></td>
            </tr>
            <tr>
                <td colspan="3"><?php
                        echo $this->Form->input('Student.ug_result', array(
                        'options' => array('Yes' => 'Yes',
                                           'No' => 'No'),
                        'selected' => (isset($ug_result) ? $ug_result : 'No'),
                        'label' => 'Is UG Result declared?',
                        'id' => 'ug_result'
                    )); ?>
                    <table id="ug_result_details">
                        <tr>
                            <td><?php echo $this->Form->input('Student.ug_course', array('label' => 'Course', 'maxlength' => '100', 'required' => false)); ?></td>
                            <td><?php echo $this->Form->input('Student.ug_univ', array('label' => 'University/College', 'maxlength' => '100', 'required' => false)); ?></td>
                            <td><?php echo $this->Form->input('Student.ug_marks', array('label' => 'Marks Obtained', 'maxlength' => '100', 'required' => false)); ?></td>
                            <td><?php echo $this->Form->input('Student.ug_max_marks', array('label' => 'Maximum Marks', 'maxlength' => '100', 'required' => false)); ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td><?php echo $this->Form->input('Student.blood_group', array(
                        'options' => array('- select -' => '- select -',
                                           'O Negative' => 'O Negative',
                                           'O Positive' => 'O Positive',
                                           'A Negative' => 'A Negative',
                                           'A Positive' => 'A Positive',
                                           'B Negative' => 'B Negative',
                                           'B Positive' => 'B Positive',
                                           'AB Negative' => 'AB Negative',
                                           'AB Positive' => 'AB Positive'),
                        'selected' => (isset($bgroup) ? $bgroup : '- select -'),
                        'id' => 'blood_group',
                        'label' => 'Blood Group'
                    )); ?></td>
                <td><?php echo $this->Form->input('Student.hostel_accommodation', array(
                        'options' => array('Yes' => 'Yes',
                                           'No' => 'No'),
                        'selected' => (isset($hostel_acco) ? $hostel_acco : 'No'),
                        'label' => 'Hostel Accommodation',
                        'id' => 'hostel_acco'
                    )); ?></td>
                <td></td>
            </tr>
            <tr>
                <td width="40%"><?php echo $this->Form->input('Student.gate_gpat_year_of_passing', array('label' => 'GATE/GPAT - Year of Passing', 'maxlength' => '50')); ?></td>
                <td width="30%"><?php echo $this->Form->input('Student.gate_gpat_rollno', array('label' => 'GATE/GPAT - Roll No.', 'maxlength' => '50')); ?></td>
                <td width="30%"><?php echo $this->Form->input('Student.gate_gpat_score', array('label' => 'GATE/GPAT - Score', 'maxlength' => '50')); ?></td>
            </tr>
            <!--
            <tr>
                <td><?php echo $this->Form->input('Student.gpat_year_of_passing', array('label' => 'GPAT - Year of Passing', 'maxlength' => '50')); ?></td>
                <td><?php echo $this->Form->input('Student.gpat_rollno', array('label' => 'GPAT - Roll No.', 'maxlength' => '50')); ?></td>
                <td><?php echo $this->Form->input('Student.gpat_score', array('label' => 'GPAT - Score', 'maxlength' => '50')); ?></td>
            </tr>-->
            <tr>
                <td><?php echo $this->Form->input('Student.any_other_info', array('label' => 'Any Other Information', 'maxlength' => '500')); ?></td>
            </tr>
            <!--
            <tr>
                <td><?php echo $this->Form->input('Student.father_name', array('label' => 'Father\'s Name:', 'maxlength' => '100')); ?></td>
                <td><?php echo $this->Form->input('Student.father_email', array('label' => 'Father\'s Email:', 'maxlength' => '100')); ?></td>
                <td><?php echo $this->Form->input('Student.father_mobile', array('label' => 'Father\'s Mobile No.:', 'maxlength' => '100')); ?></td>
            </tr>
            <tr>
                <td><?php echo $this->Form->input('Student.mother_name', array('label' => 'Mother\'s Name:', 'maxlength' => '100')); ?></td>
                <td><?php echo $this->Form->input('Student.mother_email', array('label' => 'Mother\'s Email:', 'maxlength' => '100')); ?></td>
                <td><?php echo $this->Form->input('Student.mother_mobile', array('label' => 'Mother\'s Mobile No.:', 'maxlength' => '100')); ?></td>
            </tr>
            <tr>
                
                <td><?php echo $this->Form->input('Student.aadhaar_no', array('label' => 'Aadhaar No. (xxxx xxxx xxxx):', 'maxlength' => '100')); ?></td>
                <td><?php echo $this->Form->input('Student.nationality', array('label' => 'Nationality:', 'maxlength' => '100')); ?></td>
            </tr>
            <tr>
                <td><?php echo $this->Form->input('Student.gender', array(
                    'options' => array('Male' => 'Male', 'Female' => 'Female', 'Transgender' => 'Transgender'),
                    'empty' => array('none' => '- select -'),
                    'style' => 'width: 100%;',
                    'label' => 'Gender'
                )); ?></td>
            </tr>
            <tr>
                <td><?php echo $this->Form->input('Student.state_domicile', array(
                    'options' => array( 
                                       'Andaman and Nicobar Islands' => 'Andaman and Nicobar Islands',
                                        'Andhra Pradesh' => 'Andhra Pradesh',
                                        'Arunachal Pradesh' => 'Arunachal Pradesh',
                                        'Assam' => 'Assam',
                                        'Bihar' => 'Bihar',
                                        'Chandigarh' => 'Chandigarh',
                                        'Chhattisgarh' => 'Chhattisgarh',
                                        'Dadra and Nagar Haveli' => 'Dadra and Nagar Haveli',
                                        'Daman and Diu' => 'Daman and Diu',
                                        'National Capital Territory of Delhi' => 'National Capital Territory of Delhi',
                                        'Goa' => 'Goa',
                                        'Gujarat' => 'Gujarat',
                                        'Haryana' => 'Haryana',
                                        'Himachal Pradesh' => 'Himachal Pradesh',
                                        'Jammu and Kashmir' => 'Jammu and Kashmir',
                                        'Jharkhand' => 'Jharkhand',
                                        'Karnataka' => 'Karnataka',
                                        'Kerala' => 'Kerala',
                                        'Lakshadweep' => 'Lakshadweep',
                                        'Madhya Pradesh' => 'Madhya Pradesh',
                                        'Maharashtra' => 'Maharashtra',
                                        'Manipur' => 'Manipur',
                                        'Meghalaya' => 'Meghalaya',
                                        'Mizoram' => 'Mizoram',
                                        'Nagaland' => 'Nagaland',
                                        'Odisha' => 'Odisha',
                                        'Puducherry' => 'Puducherry',
                                        'Punjab' => 'Punjab',
                                        'Rajasthan' => 'Rajasthan',
                                        'Sikkim' => 'Sikkim',
                                        'Tamil Nadu' => 'Tamil Nadu',
                                        'Telangana' => 'Telangana',
                                        'Tripura' => 'Tripura',
                                        'Uttar Pradesh' => 'Uttar Pradesh',
                                        'Uttarakhand' => 'Uttarakhand',
                                        'West Bengal' => 'West Bengal'
                                       ),
                    'empty' => array('none' => '- select -'),
                    'style' => 'width: 100%;',
                    'label' => 'State of Domicile'
                )); ?></td>
            </tr>
            <tr>
                <td><?php 
                    $yearArray = range(2000, 2016);
                    ?>
                    <div class="input select required">
                        <label for="StudentYearOfCucet">Year of appearing in CUCET</label>
                        <select name="data[Student][year_of_cucet]" id="StudentYearOfCucet" required="required">
                            <option value="none">- select -</option>
                            <?php echo $dbYear;
                                foreach ($yearArray as $year) {
                                    $selected = (isset($dbYear) && $dbYear !== "" && $year == $dbYear) ? 'selected' : '';
                                    echo '<option '.$selected.' value="'.$year.'">'.$year.'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <?php 
                    /*echo $this->Form->input('year_of_cucet', array(
                    'type' => 'datetime',
                    'name' => 'data[Student][year_of_cucet]',
                    'dateFormat' => 'Y',
                    'timeFormat' => null,
                    'minYear' => date('Y') - 10,
                    'maxYear' => date('Y'),
                    'label' => 'Year of appearing in CUCET',
                    'empty' => '- select -',
                    'style' => 'width: 100%;'
                    'type' => 'date', 
                    'dateFormat' => 'Y', 
                    'minYear' => date('Y') - 10, 
                    'maxYear' => date('Y'), 
                    'name' => 'data[Student][year_of_cucet]'
                    ));*/ ?></td>
                <td></td>
            </tr>-->
        </table>
        <!--</div>-->
	<div class="submit">
            <?php echo $this->Form->submit('Save', array('div' => false)); ?>
	</div>
<?php echo $this->Form->end(); ?>
</div>
</div>
<script>
    
    function aadharFormatCheck() {
        if($("input[name='data[Student][aadhaar_no]']").val().trim() !== '') {
            var t = $("input[name='data[Student][aadhaar_no]']").val().match(/^(\d{4}) (\d{4}) (\d{4})$/);
            if(t === null) {
                alert('Aadhar Number is not in a correct format.');
            }
        }
    }
    
    $(document).ready(function () {
        
        if($("#pwd_select option:selected").text() === "Yes") {
            $('#physical_disable').css('display', 'table');
        }
        else {
            $('#physical_disable').css('display', 'none');
        }
        
        if($("#ug_result option:selected").text() === "Yes") {
            $('#ug_result_details').css('display', 'table');
            $('#ug_result_details').css('visibility', 'visible');
        }
        else {
            var elem = $("input[name='data[Student][ug_marks]']");
            if(elem.attr('class') && elem.attr('class').indexOf("form-error") != -1) {
                $("#ug_result").val("Yes");
                $('#ug_result_details').css('display', 'table');
                $('#ug_result_details').css('visibility', 'visible');
            }
            else {
                $('#ug_result_details').css('visibility', 'hidden');
            }
        }
        
        $("input[name='data[Student][aadhaar_no]']").focusout(function(){
            aadharFormatCheck();
        });
        
        $("select[name='data[Student][pwd]']").change(function(){
            if($(this).val() === 'No') {
                $('#physical_disable').each(function(){
                    $(this).css('display','none');
                });
            }
            else {
                $('#physical_disable').each(function(){
                    $(this).css('display','table');
                });
            }
        });
        
        $("select[name='data[Student][ug_result]']").change(function(){
            if($(this).val() === 'No') {
                $('#ug_result_details').each(function(){
                    $(this).css('visibility','hidden');
                });
            }
            else {
                $('#ug_result_details').each(function(){
                    $(this).css('display','table');
                    $('#ug_result_details').css('visibility', 'visible');
                });
            }
        });
    });
</script>