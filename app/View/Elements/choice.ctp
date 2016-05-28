<?php
$key = isset($key) ? $key : '<%= key %>';
$branchArr = isset($branchArr) ? $branchArr : array();
$selected = isset($selected) ? $selected : 'none';
$subjectArr = isset($subjectArr) ? $subjectArr : array();
$selectedSub = isset($selectedSub) ? $selectedSub : 'none';
?>
<tr>
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
              //print_r($branchArr); print_r($selected);
              echo $this->Form->input("Choice.{$key}.subject", array(
                    'options' => $subjectArr,
                    'empty' => array('none' => '- select -'),
                    'style' => 'width: 100%;',
                    'label' => false,
                    'selected' => $selectedSub
                )); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Choice.{$key}.rollno"); ?>
    </td>
    <td>
        <?php //$selected = (isset($dbYear) && $dbYear !== "" && $year == $dbYear) ? 'selected' : '';
              //print_r($branchArr); print_r($selected);
              echo $this->Form->input("Choice.{$key}.preference", array(
                    'options' => $branchArr,
                    'empty' => array('none' => '- select -'),
                    'style' => 'width: 100%;',
                    'label' => false,
                    'selected' => $selected
                )); ?>
    </td>
    <td>
        <?php echo $this->Form->text("Choice.{$key}.score"); ?>
    </td>
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