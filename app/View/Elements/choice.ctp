<?php
$key = isset($key) ? $key : '<%= key %>';
$codeSubjectCentre = isset($codeSubjectCentre) ? $codeSubjectCentre : array();
$selected = isset($selected) ? $selected : 'none';
$selectedSub = isset($selectedSub) ? $selectedSub : 'none';
?>
<tr id="row_<?php echo $key; ?>">
    <td>
        <?php echo $this->Form->hidden("Choice.{$key}.id");
              echo $this->Form->hidden("Choice.{$key}.std_id");
              //$selected = (isset($dbYear) && $dbYear !== "" && $year == $dbYear) ? 'selected' : '';
              //print_r($branchArr); print_r($selected);
              echo $this->Form->text("Choice.{$key}.pref_order", array(
                    'value' => $key + 1,
                    'label' => false,
                    'readonly' => 'readonly')); ?>
    </td>
    <td>
        <?php //$selected = (isset($dbYear) && $dbYear !== "" && $year == $dbYear) ? 'selected' : '';
                $subjectoptions = array();
                foreach ($codeSubjectCentre as $key2 => $value2) {
                    $subjectoptions[$key2] = $key2;
                }
              //print_r($codeSubjectCentre); //print_r($selected);
              echo $this->Form->input("Choice.{$key}.subject", array(
                    'options' => $subjectoptions,
                    'empty' => array('- select -' => '- select -'),
                    'style' => 'width: 100%;',
                    'label' => false
                )); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Choice.{$key}.score"); ?>
    </td>
    <!--<td>
        <?php echo $this->Form->text("Choice.{$key}.rollno"); ?>
    </td>-->
    <td>
        <?php //$selected = (isset($dbYear) && $dbYear !== "" && $year == $dbYear) ? 'selected' : '';
              //print_r($branchArr); print_r($selected);
              echo $this->Form->input("Choice.{$key}.preference", array(
                    'options' => array(),
                    'empty' => array('- select -' => '- select -'),
                    'style' => 'width: 100%;',
                    'label' => false
                )); ?>
    </td>
    <td>
        <div name="[Choice][<?php echo $key; ?>][centre]" style="width: 100px; overflow-x: auto;white-space: nowrap;"></div>
        <?php echo $this->Form->input("Choice.{$key}.centre", array('type' => 'hidden')); ?>
    </td>
    <!--
    <td>
        <?php echo $this->Form->text("Choice.{$key}.score"); ?>
    </td>-->
    <!--
    <td>
        <?php  
               $countArray = range(1, 3);
               $options = array();
               foreach($countArray as $count){
                    $options[$count] = $count;
               }
               echo $this->Form->input("Choice.{$key}.pref_order", array(
                    'options' => $options,
                    'empty' => array('none' => '- select -'),
                    'style' => 'width: 100%;',
                    'label' => false
                ));
              ?>
    </td>-->  
    <td class="actions">
        <a href="#" class="remove">Delete Row</a>
    </td>
</tr>