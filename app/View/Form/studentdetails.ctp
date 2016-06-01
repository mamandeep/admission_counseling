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
                <td><?php echo $this->Form->input('Student.pwd', array(
                    'options' => array('Yes' => 'Yes', 'No' => 'No'),
                    'empty' => array('- select -' => '- select -'),
                    'style' => 'width: 100%;',
                    'label' => 'Differently Abled'
                )); ?></td>
            </tr>
            <tr>
                <td><?php echo $this->Form->input('Student.kashmiri_mig', array(
                    'options' => array('Yes' => 'Yes', 'No' => 'No'),
                    'empty' => array('- select -' => '- select -'),
                    'style' => 'width: 100%;',
                    'label' => 'Kashmiri Migrant'
                )); ?></td>
                <td><?php echo $this->Form->input('Student.ward_of_def', array(
                    'options' => array('Yes' => 'Yes', 'No' => 'No'),
                    'empty' => array('- select -' => '- select -'),
                    'style' => 'width: 100%;',
                    'label' => 'Ward of Defense Personnel'
                )); ?></td>
                <td><?php echo $this->Form->input('Student.comm_address', array('label' => 'Communication Address:', 'maxlength' => '200')); ?></td>
            </tr>
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
            <tr>
                <td><?php
                        echo $this->Form->input('Student.pg_result', array(
                        'options' => array('Yes' => 'Yes',
                                           'No' => 'No'),
                        'selected' => (isset($pg_result) ? $pg_result : 'No'),
                        'label' => 'Is PG Result declared?',
                        'id' => 'pg_result'
                    )); ?>
                    <table id="pg_result_marks">
                        <tr>
                            <td>Marks (%): </td>
                            <td><?php echo $this->Form->input('Student.pg_marks', array('label' => false, 'maxlength' => '100')); ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td><?php echo $this->Form->input('Student.gate_year_of_passing', array('label' => 'GATE - Year of Passing', 'maxlength' => '50')); ?></td>
                <td><?php echo $this->Form->input('Student.gate_rollno', array('label' => 'GATE - Roll No.', 'maxlength' => '50')); ?></td>
                <td><?php echo $this->Form->input('Student.gate_score', array('label' => 'GATE - Score', 'maxlength' => '50')); ?></td>
            </tr>
            <tr>
                <td><?php echo $this->Form->input('Student.gpat_year_of_passing', array('label' => 'GPAT - Year of Passing', 'maxlength' => '50')); ?></td>
                <td><?php echo $this->Form->input('Student.gpat_rollno', array('label' => 'GPAT - Roll No.', 'maxlength' => '50')); ?></td>
                <td><?php echo $this->Form->input('Student.gpat_score', array('label' => 'GPAT - Score', 'maxlength' => '50')); ?></td>
            </tr>
            <tr>
                <td><?php echo $this->Form->input('Student.any_other_info', array('label' => 'Any Other Information', 'maxlength' => '200')); ?></td>
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
    $(document).ready(function () {
        if($("#pg_result option:selected").text() === "Yes") {
            $('#pg_result_marks').css('display', 'table');
        }
        else {
            var elem = $("input[name='data[Student][pg_marks]']");
            if(elem.attr('class') && elem.attr('class').indexOf("form-error") != -1) {
                $("#pg_result").val("Yes");
                $('#pg_result_marks').css('display', 'table');
            }
            else {
                $('#pg_result_marks').css('display', 'none');
            }
        }
        
        $("select[name='data[Student][pg_result]']").change(function(){
            if($(this).val() === 'No') {
                $('#pg_result_marks').each(function(){
                    $(this).css('display','none');
                });
            }
            else {
                $('#pg_result_marks').each(function(){
                    $(this).css('display','table');
                });
            }
        });
    });
</script>