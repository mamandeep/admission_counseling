<?php echo $this->Form->create('Student', array('id' => 'student_details', 'url' => Router::url( null, true ))); 
    //print_r($this->request->data);
?>
 <!--
    <div id="tabs">
    <div>Is Applicant ID. alloted to you?</div>
    <select id="applicant_id_given" name="data[Applicant][applicant_id_given]" required>
        <option value="yes">Yes</option>
        <option value="no" selected="selected">No</option>
    </select>
-->
<div id="tabs-1">
	<table id="student_input">
                <?php if(empty($this->request->data['Student']['response_code']) || $this->request->data['Student']['response_code'] != "0") { ?>
		<tr> <!--check if applicant has been alloted applicant_id-->
                    <td width="30%"><?php echo $this->Form->input('Student.id', array('label' => false, 'type' => 'hidden')); ?></td>
                    <td class="table_headertxt" style="padding-top: 17px; width: 20%;">Payment Mode</td>
                    <td><?php echo $this->Form->input('Student.payment_mode', array(
                        'options' => array('Online (Credit Card/Debit Card/Netbanking)' => 'Online (Credit Card/Debit Card/Netbanking)',
                                           'RTGS' => 'RTGS'),
                        'empty' => array('- select -' => '- select -'),
                        'id' => 'payment_mode',
                        'label' => false
                    )); ?></td>
                    <td width="30%"></td>
		</tr>
                <tr> <!--check if applicant has been alloted applicant_id-->
                    <td width="30%"></td>
                    <td class="table_headertxt" style="padding-top: 17px; width: 20%;"></td>
                    <td><table id="ac_details">
                        <tr>
                            <td><?php echo $this->Form->input('Student.rtgs_ac_no', array('label' => 'Account No. (from which the payment is done)', 'maxlength' => '20', 'required' => false)); ?></td>
                        </tr>
                    </table></td>
                    <td width="30%"></td>
		</tr>
                <tr> <!--check if applicant has been alloted applicant_id-->
                    <td width="30%"></td>
                    <td class="table_headertxt" style="padding-top: 17px; width: 20%;"></td>
                    <td><div class="submit">
                        <?php echo $this->Form->submit('Submit', array('div' => false)); ?>
                    </div></td>
                    <td width="30%"></td>
		</tr>
                <?php } ?>
	</table>
	<!--<form  method="post" action="validate_api.php" name="frmTransaction" id="frmTransaction" onSubmit="return validate()">-->
	<!--<div style="font-size: 30px;">Kindly do not proceed further. It will be enabled shortly!</div>-->

</div>

<?php echo $this->Form->end(); ?>

<script>
$(document).ready(function () {
        if($("#payment_mode option:selected").text() === "RTGS") {
            $('#ac_details').css('display', 'table');
            $('#ac_details').css('visibility', 'visible');
            //$('#exp_date_result').css('visibility', 'hidden');
        }
        else {
            //var elem = $("input[name='data[Student][ug_marks]']");
            /*if(elem.attr('class') && elem.attr('class').indexOf("form-error") != -1) {
                $("#ug_result").val("Yes");
                $('#ug_result_details').css('display', 'table');
                $('#ug_result_details').css('visibility', 'visible');
            }
            else {*/
            $('#ac_details').css('visibility', 'hidden');
            //}
            //$('#exp_date_result').css('visibility', 'visible');
        }
        
        $("select[name='data[Student][payment_mode]']").change(function(){
            if($(this).val() === 'RTGS'){
                $('#ac_details').each(function(){
                    $(this).css('display','table');
                    $('#ac_details').css('visibility', 'visible');
                });
                //$('#exp_date_result').css('visibility', 'hidden');
            }
            else {
                $('#ac_details').each(function(){
                    $(this).css('visibility','hidden');
                });
            }
        });
});
    
</script>