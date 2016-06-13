<div id="wrapper">
  <div id="sidebar"><?php echo $this->element('left-sidebar');?></div>
  <div id="maincontent" class="section-to-print">
      <div class="main_content_header">Options Selected<input type="button" id="printLOptions" value="Print" onclick="window.print()" /></div>
      <table>
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
        <?php if(isset($student) && $student['Student']['final_submit'] != "1" ) { ?>
        <div class="print_required">
            Declaration: <input type="checkbox" id="declaration" name="declaration"></input> 
        </div>
        <?php } ?>
        <br/>
        <br/>
        <div id="termsconditions">
        <p>I, hereby declare that all the statements and entries made in this application are 
            true, complete and correct to the best of my knowledge and belief. No information has been concealed. In the event of any 
            information being found false or incorrect or ineligibility being detected in future 
            at any stage, my candidature may be cancelled by the University.
        </p>
          <p>She/He will abide by all the rules and regulations of the University as a student of Central University of Punjab, Bathinda. <a href="javascript: void(0);">Rules and Regulations</a></p>  
          <p>If she/he fails to qualify as per the norms, it would lead her/him to forego her/his seat.</p>  
          <p>Payment of Hostel Advance does not necessarily guarantee Hostel Accommodation. Hostel Accommodation will be made according to availability.</p>  
      </div>
        <?php if(isset($student) && $student['Student']['final_submit'] != "1" ) {
                echo $this->Form->create('Temp', array('id' => 'Temp_Details', 'url' => Router::url( '/form/final_submit', true )));
                echo $this->Form->input('Document.id', array('type' => 'hidden','name' => 'temp', 'value' => 'temp'));
                echo $this->Form->submit('After reading above, select declaration and click here', array('div' => false, 'id' => 'finalsubmit' )); 
                echo $this->Form->end(); 
             } 
            ?>
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