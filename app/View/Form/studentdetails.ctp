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
        <table>
            <tr>
                <td colspan="3">
                    <div class="main_content_header">Personal Details</div>
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
                <td><?php echo $this->Form->input('Student.father_email', array('label' => 'Father\'s Email:', 'maxlength' => '100')); ?></td>
                <td><?php echo $this->Form->input('Student.father_mobile', array('label' => 'Father\'s Mobile No.:', 'maxlength' => '100')); ?></td>
            </tr>
            <tr>
                <td><?php echo $this->Form->input('Student.mother_name', array('label' => 'Mother\'s Name:', 'maxlength' => '100')); ?></td>
                <td><?php echo $this->Form->input('Student.mother_email', array('label' => 'Mother\'s Email:', 'maxlength' => '100')); ?></td>
                <td><?php echo $this->Form->input('Student.mother_mobile', array('label' => 'Mother\'s Mobile No.:', 'maxlength' => '100')); ?></td>
            </tr>
            <tr>
                <td><?php echo $this->Form->input('Student.dob', array('label' => 'Date of Birth:', 'maxlength' => '100')); ?></td>
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
                <td><?php echo $this->Form->input('Student.category', array(
                    'options' => array('General' => 'General', 'SC' => 'SC', 'ST' => 'ST', 'OBC' => 'OBC'),
                    'empty' => array('none' => '- select -'),
                    'style' => 'width: 100%;',
                    'label' => 'Category'
                )); ?></td>
                <td><?php echo $this->Form->input('Student.pwd', array(
                    'options' => array('Yes' => 'Yes', 'No' => 'No'),
                    'empty' => array('none' => '- select -'),
                    'style' => 'width: 100%;',
                    'label' => 'Differently Abled'
                )); ?></td>
            </tr>
            <tr>
                <td><?php echo $this->Form->input('Student.kashmiri_mig', array(
                    'options' => array('Yes' => 'Yes', 'No' => 'No'),
                    'empty' => array('none' => '- select -'),
                    'style' => 'width: 100%;',
                    'label' => 'Kashmiri Migrant'
                )); ?></td>
                <td><?php echo $this->Form->input('Student.ward_of_def', array(
                    'options' => array('Yes' => 'Yes', 'No' => 'No'),
                    'empty' => array('none' => '- select -'),
                    'style' => 'width: 100%;',
                    'label' => 'Ward of Defense Personnel'
                )); ?></td>
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
                <td><?php echo $this->Form->input('Student.comm_address', array('label' => 'Communication Address:', 'maxlength' => '200')); ?></td>
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
            </tr>
        </table>
	<div class="submit">
            <?php echo $this->Form->submit('Submit', array('div' => false)); ?>
	</div>
<?php echo $this->Form->end(); ?>
</div>
</div>
<script>
</script>