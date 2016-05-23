<?php echo $this->Html->script('choice'); ?>
<div id="wrapper">
  <div id="sidebar"><?php echo $this->element('left-sidebar');?></div>
  <div id="maincontent">
<?php echo $this->Form->create('Student', array('id' => 'Student_Details', 
                                'url' => Router::url( null, true ))); 
//print_r($this->request->data);
        ?>
        <input type="hidden" name="glob_userId" id="glob_userId" value="<?php echo $this->Session->read('std_id'); ?>" />
        <table>
            <tr>
                <td><?php 
                    echo $this->Form->input('Student.id', array('type' => 'hidden', 'value' => $this->Session->read('std_id')));
                    echo $this->Form->input('Student.reg_id', array('type' => 'hidden', 'value' => $this->Session->read('registration_id')));
                    ?></td>
                <td></td>
            </tr>
        </table>
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
                                                            'branchArr' => isset($branchArr) ? $branchArr : array()));
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

<?php echo $this->Form->end(); ?>
</div>
</div>
<script>
</script>