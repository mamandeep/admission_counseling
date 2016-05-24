<?php
$key = isset($key) ? $key : '<%= key %>';
$branchArr = isset($branchArr) ? $branchArr : array();
$selected = isset($selected) ? $selected : 'none';
?>
<tr>
    <td>
        <?php echo $this->Form->hidden("Choice.{$key}.id");
              echo $this->Form->hidden("Choice.{$key}.std_id");
              //$selected = (isset($dbYear) && $dbYear !== "" && $year == $dbYear) ? 'selected' : '';
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
    </td>  
    <td class="actions">
        <a href="#" class="remove">Delete Row</a>
    </td>
</tr>