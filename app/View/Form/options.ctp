<?php echo $this->Html->script('choice'); ?>
<div id="wrapper">
  <div id="sidebar"><?php echo $this->element('left-sidebar');?></div>
  <div id="maincontent" class="section-to-print">
      <div class="main_content_header">Options Selected<?php if(isset($optionsLocked) && $optionsLocked == "1") { ?><input type="button" id="printLOptions" value="Print" onclick="window.print()" /><?php } ?></div>
      <table>
          <tr>
              <td style="font-weight: bold;">Name of the Branch</td>
              <td style="font-weight: bold;">Preference Order</td>
          </tr>
          <?php 
            if(is_array($this->request->data['Choice']) && count($this->request->data['Choice']) > 0) {
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
      </table>
      
<?php if(isset($optionsLocked) && $optionsLocked != "1") { 
        echo $this->Form->create('Choice', array('id' => 'Choice_Details', 
                                'url' => Router::url( null, true ))); 
        ?>
    <input type="hidden" name="glob_userId" id="glob_userId" value="<?php echo $this->Session->read('std_id'); ?>" />
    <input type="hidden" name="modified" id="modified" value="false" />
<div class="main_content_header">Options</div>            
<fieldset>
    <table id="options-table">
        <thead>
            <tr>
                <th>Name of the Branch</th>
                <th>Preference Order</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if (is_array($this->request->data['Choice'])) {
                    for ($key = 0; $key < count($this->request->data['Choice']); $key++) {
                        echo $this->element('choice', array('key' => $key,
                                                            'branchArr' => isset($branchArr) ? $branchArr : array(),
                                                            'selected' => $this->request->data['Choice'][$key]['preference']));
                    }
                }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2"></td>
                <td class="actions">
                    <a href="#" class="add">Add Row</a>
                </td>
            </tr>
        </tfoot>
    </table>
</fieldset>

<script id="options-template" type="text/x-underscore-template">
    <?php echo $this->element('choice');?>
</script>

<div class="submit">
    <?php echo $this->Form->submit('Submit', array('id' => 'formSubmit' , 'div' => false)); ?>
</div>

<?php echo $this->Form->end(); 
    }
    else { ?>
        <div id="termsconditions">
              <p>This is sample terms and conditions. You have to read them and take a printout of this page. This is sample terms and conditions. You have to read them and take a printout of this page.</p>  
                <p>This is sample terms and conditions. You have to read them and take a printout of this page. This is sample terms and conditions. You have to read them and take a printout of this page.</p>  
                <p>This is sample terms and conditions. You have to read them and take a printout of this page. This is sample terms and conditions. You have to read them and take a printout of this page.</p>  
        </div>
<?php    }
?>
</div>
</div>
<script>
</script>