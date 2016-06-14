<style type="text/css">

    td {

        /* css-3 */
        white-space: -o-pre-wrap; 
        word-wrap: break-word;
        white-space: pre-wrap; 
        white-space: -moz-pre-wrap; 
        white-space: -pre-wrap; 

    }

    table { 
        table-layout: fixed;
        width: 100%
    }

    .print_required label:after { content:"*"; }

    .print_headers {
        font-size: 12px;
        font-weight: bold;
        color: #010101;
        padding: 5px;
    }

    .print_value {
        font-size: 12px;
        color: black;
        padding: 5px;
    }

    .misc_col1 {
        width: 45%;
    }

</style>
<div id="wrapper">
  <div id="sidebar"><?php echo $this->element('left-sidebar');?></div>
  <div id="maincontent" class="section-to-print">
      <?php if($data_set === 'true') { ?>
      <div class="main_content_header"><input type="button" id="printLOptions" value="Print" onclick="window.print()" /></div>
      <div id="contentContainer" style="width: 650px; max-width: 650px; margin-left: 100px;">
        <p style="font-size: 28px; font-weight: bold; text-align: center">CENTRAL UNIVERSITY OF PUNJAB</p>
        <p style="font-size: 12px; font-weight: bold; text-align: center">(Established vide Act no 25(2009) of Parliament)</p>
        <p style="font-size: 28px; font-weight: bold; text-align: center">Online Application Form for Admission Counseling</p>
        <table id="onlineformdata"  class="print_table" style="table-layout:fixed;">
            <tr>
                <td width="40%" class="print_headers">Name</td>
                <td width="40%" class="print_value"><?php echo $student['Student']['name'] ?></td>
                <td width="20%"><img src="<?php if(!empty($image['Document']['filename'])) { echo $this->webroot . '/' . $image['Document']['filename']; } else { echo ""; } ?>" alt="Passport Size Photograph" height="132px" width="132px"></td>
            </tr>
            <tr>
                <td width="40%" class="print_headers">Application Number</td>
                <td width="40%" class="print_value"><?php echo $student['Student']['id'] ?></td>
                <td width="20%"><img src="<?php if(!empty($image['Document']['filename4'])) { echo $this->webroot . '/' . $image['Document']['filename4']; } else { echo ""; } ?>" alt="Signature" height="50px" width="132px"></td>
            </tr>
            <tr>
                <td class="print_headers">Details of application fee</td>
                <td style="word-wrap: normal;" class="print_value">Transaction ID:<?php echo $student['Student']['payment_transaction_id']?> Date:<?php echo $student['Student']['payment_date_created']?> Amount:<?php echo $student['Student']['payment_amount']?>
                </td>
            </tr>
            <br />
            <!--
            <tr>
                <td class="print_headers">Name of the Applicant</td>
                <td class="print_value"><?php echo $applicant['Applicant']['first_name']?>&nbsp;<?php echo $applicant['Applicant']['middle_name']?>&nbsp;<?php echo $applicant['Applicant']['last_name']?>
                </td>
            </tr>-->
            <!--
            <tr>
                <td class="print_headers">Gender</td>
                <td class="print_value"><?php echo $applicant['Applicant']['gender']?>
                </td>
            </tr>-->
            <tr>
                <td class="print_headers">Date of Birth</td>
                <td class="print_value"><?php echo $student['Student']['dob']?>
                </td>
            </tr>
            <tr>
                <td class="print_headers">Category</td>
                <td class="print_value"><?php echo $student['Student']['category']?></td>
            </tr>
            <tr>
                <td class="print_headers">Kashmiri Migrant</td>
                <td class="print_value"><?php echo $student['Student']['kashmiri_mig']?></td>
            </tr>
            <tr>
                <td class="print_headers">Ward of Defense Personnel</td>
                <td class="print_value"><?php echo $student['Student']['ward_of_def']?></td>
            </tr>
            <tr>
                <td class="print_headers">Differently Abled</td>
                <td class="print_value"><?php echo $student['Student']['pwd'] ?></td>
            </tr>
            <?php if(!empty($student['Student']['pwd']) && $student['Student']['pwd'] == "Yes") { ?>
                <tr>
                    <td class="print_headers" style="padding-left: 20px;">a. Blindness or low vision</td>
                    <td class="print_value"><?php echo $student['Student']['blindness']?></td>
                    <td class="print_value"><?php echo $student['Student']['blindness_pertge']?></td>
                </tr>
                <tr>
                    <td class="print_headers" style="padding-left: 20px;">b. Hearing impairment</td>
                    <td class="print_value"><?php echo $student['Student']['hearing']?></td>
                    <td class="print_value"><?php echo $student['Student']['hearing_pertge']?></td>
                </tr>
                <tr>
                    <td class="print_headers" style="padding-left: 20px;">c. Locomotor disability or cerebral palsy</td>
                    <td class="print_value"><?php echo $student['Student']['locomotor']?></td>
                    <td class="print_value"><?php echo $student['Student']['locomotor_pertge']?></td>
                </tr>
            <?php } ?>
            <tr>
                <td class="print_headers">Email </td>
                <td class="print_value"><?php echo $student['Student']['email']?>
                </td>
            </tr>
            <tr>
                <td class="print_headers">Mobile No </td>
                <td class="print_value"><?php echo $student['Student']['mobile_no']?>
                </td>
            </tr>
            <tr>
                <td class="print_headers">Blood Group</td>
                <td class="print_value"><?php echo $student['Student']['blood_group']?></td>
            </tr>
            <tr>
                <td class="print_headers">Father's Name</td>
                <td class="print_value"><?php echo $student['Student']['father_name']?>
                </td>
            </tr>
            <tr>
                <td class="print_headers">Father's Mobile No.</td>
                <td class="print_value"><?php echo $student['Student']['father_mobile']?>
                </td>
            </tr>
            <tr>
                <td class="print_headers">Mother's Name</td>
                <td class="print_value"><?php echo $student['Student']['mother_name']?></td>
            </tr>
            <tr>
                <td class="print_headers">Mother's Mobile No.</td>
                <td class="print_value"><?php echo $student['Student']['mother_mobile']?></td>
            </tr>
            <!--
            <tr>
                <td class="print_headers">Marital Status: </td>
                <td class="print_value"><?php echo $applicant['Applicant']['marital_status']?>
                </td>
            </tr>-->
            <tr>
                <td class="print_headers">Aadhaar No. </td>
                <td class="print_value"><?php echo $student['Student']['aadhaar_no']?>
                </td>
            </tr>
            <tr>
                <td class="print_headers">Nationality </td>
                <td class="print_value"><?php echo $student['Student']['nationality']?>
                </td>
            </tr>
            <tr>
                <td class="print_headers">State of Domicile</td>
                <td class="print_value"><?php echo $student['Student']['state_domicile']?>
                </td>
            </tr>
            <tr>
                <td class="print_headers">UG Result declared</td>
                <td class="print_value"><?php echo $student['Student']['ug_result'] ?></td>
            </tr>
            <?php if(!empty($student['Student']['ug_result']) && $student['Student']['ug_result'] == "Yes") { ?>
            <tr>
                <td class="print_headers">Course</td>
                <td class="print_value"><?php echo $student['Student']['ug_course']?></td>
            </tr>
            <tr>
                <td class="print_headers">University/College</td>
                <td class="print_value"><?php echo $student['Student']['ug_univ']?></td>
            </tr>
            <tr>
                <td class="print_headers">Marks Obtained</td>
                <td class="print_value"><?php echo $student['Student']['ug_marks']?></td>
            </tr>
            <tr>
                <td class="print_headers">Maximum Marks</td>
                <td class="print_value"><?php echo $student['Student']['ug_max_marks']?></td>
            </tr>
            <?php } ?>
            <tr>
                <td class="print_headers">Whether Hostel Accommodation required</td>
                <td class="print_value"><?php echo $student['Student']['hostel_accommodation']?></td>
            </tr>
            <tr>
                <td class="print_headers">Communication Address</td>
                <td class="print_value"><?php echo $student['Student']['comm_address']?>
                </td>
            </tr>
            <tr>
                <td class="print_headers">Permanent Address</td>
                <td class="print_value"><?php echo $student['Student']['perm_address']?>
                </td>
            </tr>
            <tr>
                <td class="print_headers">Any Other Information</td>
                <td class="print_value"><?php echo $student['Student']['any_other_info'] ?></td>
            </tr>
            <tr>
              <td width="40%" style="font-weight: bold;">Name of the Center</td>
              <td width="40%" style="font-weight: bold;">Name of the Course</td>
              <td width="20%" style="font-weight: bold;">Preference Order</td>
            </tr>
            <?php //print_r($this->request->data['Choice']); 
            if(is_array($this->request->data['Choice']) && count($this->request->data['Choice']) > 0) {
                for ($key = 0; $key < count($this->request->data['Choice']); $key++) {
                    if($this->request->data['Choice'][$key]['subject'] !== "- select -") {
                        echo "<tr>";
                        echo "<td>" . $this->request->data['Choice'][$key]['centre'] . "</td>";
                        echo "<td>" . $this->request->data['Choice'][$key]['preference'] . "</td>";
                        echo "<td>" . $this->request->data['Choice'][$key]['pref_order'] . "</td>";
                        echo "</tr>";
                    }
                }
            }
            else { ?>
                <tr>
                    <td>No Center Selected</td>
                    <td>No Branch Selected</td>
                    <td>No Preference Order Selected</td>
                </tr>    
            <?php }
          ?>
        </table>
        <br/>
        <br/>
            <div id="termsconditions">
            <p>I hereby declare that all the information given by me in this application is true and correct to the best of my knowledge and belief. I also note that if any of the above statements are found to be incorrect or false or any information or particulars have been suppressed or omitted there from, I am liable to be disqualified and my admission may be cancelled. I have read and understood the contents of the Admission Announcement for the various Programmes.
               I hereby permit the Central University of Punjab to use, display or transfer any of the details furnished by me in this form for complying with the admission requirements.
            </p>
            <br/>
            <br/>
            <div style="float: right;">Acceptance by the Candidate:….………………………</div>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <div style="font-size: 14px; font-weight: bold;">Undertaking by the Candidate:</div>
              <p>I will comply with the rules and regulations for student behaviour as notified by the University from time to time. I agree that the University shall have the right to enforce appropriate standards of conduct and that it may terminate my participation at any time in the University’s program for failure to maintain these standards or for any actions or conduct which the University considers to be incompatible with the interest, harmony, comfort and welfare of other students. If my participation is terminated, I give my consent to be sent home at my own or my parent’s expense with no refund of fees. All references in the undertaking to the University shall include the University Vice Chancellor, and all its Officers. All reference herein to the parents of the applicant shall include the legal guardian or any other adult responsible for the applicant. In addition to this, I shall abide by all the anti-ragging rules specified by the university. I agree that in case of any legal dispute concerning admission procedures, the same shall be subject to exclusive jurisdiction of Courts at Bathinda.</p>
              <p>This undertaking shall take effect from the time I am accepted by and confirmed for enrolment in the University.</p>
              <br/>
              <br/>
              <div style="float: right;">Acceptance by the Candidate:….………………………</div>
              <br/>
              <br/>
              <br/>
              <br/>
              <?php if(isset($student) && $student['Student']['final_submit'] != "1" ) { ?>
                <div class="print_required">
                    Declaration <input type="checkbox" id="declaration" name="declaration"></input> 
                </div>
                <br/><br/>
                <?php } ?>
                <?php if(isset($student) && $student['Student']['final_submit'] != "1" ) {
                        echo $this->Form->create('Temp', array('id' => 'Temp_Details', 'url' => Router::url( '/form/final_submit', true )));
                        echo $this->Form->input('Document.id', array('type' => 'hidden','name' => 'temp', 'value' => 'temp'));
                        echo $this->Form->submit('After reading above, select declaration and click here', array('div' => false, 'id' => 'finalsubmit' )); 
                        echo $this->Form->end(); 
                     } 
                ?>
          </div>
      </div>
    <?php } ?>
  </div>
</div>
<script>
    $('document').ready(function () {
        $('#finalsubmit').prop('disabled', true);

        $('#declaration').change(function () {
            if ($(this).is(':checked')) {
                $('#finalsubmit').prop('disabled', false);
            }
            else {
                $('#finalsubmit').prop('disabled', true);
            }
        });

        $("#finalsubmit").click(function(e) {
            if(!confirm("Are you sure you have read all the above Terms and Conditions?")) {
                e.preventDefault();
            }
            else {
                e.preventDefault();
                window.location.href = '<?php echo $this->webroot; ?>form/final_submit';
            }
        });
    });
</script>