<div id="wrapper">
  <div id="sidebar"><?php echo $this->element('left-sidebar');?></div>
  <div id="maincontent">
        <?php
            if(isset($data_set) && $data_set == 'true') {
            echo $this->Form->create('Student', array('id' => 'course_list', 'url' => Router::url( null, true ))); 
            //print_r($this->request->data);
        ?>
        <div id="tabs-1">
            <table id="student_input">
                    <?php 
                          //print_r($student['Student']['id']);
                          //print_r(empty($student['Student']['response_code']));
                          //print_r($student['Student']['response_code']);
                          //print_r($student['Student']['payment_mode']);
                          //print_r(empty($image['Document']['filename5']));
                          //print_r((empty($student['Student']['response_code']) && $student['Student']['payment_mode'] == 'Online (Credit Card/Debit Card/Netbanking)'));
                        if( empty($student['Student']['payment_mode']) || ($student['Student']['response_code'] != "0" && $student['Student']['payment_mode'] == 'Online (Credit Card/Debit Card/Netbanking)')
                             || ($student['Student']['payment_mode'] == 'RTGS' && empty($image['Document']['filename5']))  
                             ) {
                            $seats = array();
                            //print_r($this->request->data['Choice']);
                            if(is_array($this->request->data['Choice']) && count($this->request->data['Choice']) > 0) {    
                                for ($key = 0; $key < count($this->request->data['Choice']); $key++) {
                                    if($this->request->data['Choice'][$key]['open'] == 1) {
                                        $value = $this->request->data['Choice'][$key]['preference'] . ":Open";
                                        $seats[$value] = $value;
                                    }
                                    if($this->request->data['Choice'][$key]['sc'] == 1) {
                                        $value = $this->request->data['Choice'][$key]['preference'] . ":SC";
                                        $seats[$value] = $value;
                                    }
                                    if($this->request->data['Choice'][$key]['st'] == 1) {
                                        $value = $this->request->data['Choice'][$key]['preference'] . ":ST";
                                        $seats[$value] = $value;
                                    }
                                    if($this->request->data['Choice'][$key]['obc'] == 1) {
                                        $value = $this->request->data['Choice'][$key]['preference'] . ":OBC";
                                        $seats[$value] = $value;
                                    }
                                }
                            }
                    ?>
                    <tr> <!--check if applicant has been alloted applicant_id-->
                        <td width="30%"><?php echo $this->Form->input('Student.id', array('label' => false, 'type' => 'hidden', 'value' => $this->Session->read('std_id'))); ?></td>
                        <td class="table_headertxt" style="padding-top: 17px; width: 20%;">Select Seat</td>
                        <td><?php 
                            if(count($seats) > 0) {
                                echo $this->Form->input('Student.seat_allocated', array(
                                    'options' => $seats,
                                    'id' => 'seat_allocated',
                                    'label' => false,
                                    'width' => '200px'
                                )); 
                        } ?></td>
                        <td width="30%"></td>
                    </tr>
                    <tr> <!--check if applicant has been alloted applicant_id-->
                        <td colspan="3" style="color: crimson; font-size: 20px;">Please choose your course from above choices</td>
                        <td width="30%" style="color: crimson; font-size: 20px;">Course:Category</td>
                    </tr>
                    <tr> <!--check if applicant has been alloted applicant_id-->
                        <td width="30%"></td>
                        <td class="table_headertxt" style="padding-top: 17px; width: 20%;"></td>
                        <td><div class="submit">
                            <?php echo $this->Form->submit('Submit', array('div' => false)); ?>
                        </div></td>
                        <td width="30%"></td>
                    </tr>
                    <?php } else { ?>
                    <tr> 
                        <td width="30%"></td>
                        <td class="table_headertxt" style="padding-top: 17px; width: 20%;">You have been provisionally allocated seat in <?php echo $student['Student']['seat_allocated']; ?></td>
                        <td></td>
                        <td width="30%"></td>
                    </tr>
                    <?php } ?>
            </table>
            <!--<form  method="post" action="validate_api.php" name="frmTransaction" id="frmTransaction" onSubmit="return validate()">-->
            <!--<div style="font-size: 30px;">Kindly do not proceed further. It will be enabled shortly!</div>-->

        </div>

        <?php echo $this->Form->end(); 
            }
        ?>
</div>
</div>
<script>
    $(document).ready(function(){
        $('#course_list').on('submit', function(){
            if(!confirm("Have you read the minimum eligibilty criteria for the selected course/seat ?")) {
                return false;
            }
        });
    });
</script>