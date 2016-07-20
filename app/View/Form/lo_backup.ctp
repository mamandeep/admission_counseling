<div id="wrapper">
  <div id="sidebar"><?php echo $this->element('left-sidebar');?></div>
  <div id="maincontent">

      <div class="main_content_header">Options Selected</div>
      <table>
          <tr>
              <td style="font-weight: bold;">Name of the Branch</td>
              <td style="font-weight: bold;">Preference Order</td>
          </tr>
          <?php 
            if(!empty($this->request->data['Choice']) && is_array($this->request->data['Choice']) && count($this->request->data['Choice']) > 0) {
                for ($key = 0; $key < count($this->request->data['Choice']); $key++) {
                    echo "<tr>";
                    echo "<td>" . $branchArr[$this->request->data['Choice'][$key]['preference']] . "</td>";
                    echo "<td>" . $this->request->data['Choice'][$key]['pref_order'] . "</td>";
                    echo "</tr>";
                }
            }
            else { ?>
                <tr>
                    <td>No Branch Selected</td>
                    <td>No Preference Order Selected</td>
                </tr>    
            <?php }
          ?>
          <tr>
                <td><?php 
                        echo $this->Form->create('Temp1', array('id' => 'Temp1_Details', 'url' => Router::url( '/form/options', true )));
                        echo $this->Form->input('Choice.id', array('type' => 'hidden', 'name' => 'backfrmlock', 'value' => 'true'));
                        echo $this->Form->submit('Change Preferences', array('div' => false, 'id' => 'changepref' )); 
                        echo $this->Form->end();
                    ?>
                </td>
                <td><?php 
                       if(isset($showLockButton) && $showLockButton != "1") { 
                        echo $this->Form->create('Temp', array('id' => 'Temp_Details', 'url' => Router::url( '/form/lockoptions', true )));
                        echo $this->Form->input('Choice.id', array('type' => 'hidden', 'name' => 'lockoptions', 'value' => 'true'));
                        echo $this->Form->submit('Lock Options', array('div' => false, 'id' => 'lockoptions' )); 
                        echo $this->Form->end();
                    } ?></td>
          </tr>
      </table>
</div>
</div>
<script>

$('document').ready(function () {
        $("#lockoptions").click(function(e) {
            if(!confirm("Are you sure to lock the options as displayed above? After locking the options you will not be able to modify them at any time!")) {
                e.preventDefault();
            }
            else {
                //e.preventDefault();
                //window.location.href = '<?php echo $this->webroot; ?>form/final_submit';
            }
        });
});

</script>