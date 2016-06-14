<div id="wrapper">
  <div id="sidebar"><?php echo $this->element('left-sidebar');?></div>
  <div id="maincontent">
<?php  
        echo $this->Form->create('Choice', array('id' => 'Choice_Details', 
                                'url' => Router::url( null, true ))); 
        $codeSubjectCentre =  array('PGQP02' => array('L.L.M' => 'Centre for Law'),
                      'PGQP03' => array('M.A. Education' => 'Centre for Education',
                                        'M.Ed.' => 'Centre for Education'),
                      'PGQP04' => array('M.A. English' => 'Centre for Comparative Literature'),
                      'PGQP06' => array('M.A. Hindi' => ''),
                      'PGQP08' => array('M.A. Punjabi' => 'Centre for Classical and Modern Languages'),
                      'PGQP12' => array('M.A. History' => 'Centre for South and Central Asian Studies (Including Historical Studies)'),
                      'PGQP14' => array('M.A. Music (Vocal)' => '',
                                        'M.A. Music (Instrumental)' => ''),
                      'PGQP15' => array('M.A. Fine Arts' => ''),
                      'PGQP16' => array('M.A. Theatre' => ''),
                      'PGQP19' => array('M.A. Geography' => 'Centre for Geography and Geology',
                                        'M.Sc. Geography' => 'Centre for Geography and Geology'),
                      'PGQP21' => array('M.A. Sociology' => 'Centre for Sociology'),
                      'PGQP22' => array('M.Sc. Life Sciences (Specialization in Human Genetics)' => 'Centre for Human Genetics and Molecular Medicine',
                                        'M.Sc. Life Sciences (Specialization in Molecular Medicine)' => 'Centre for Human Genetics and Molecular Medicine',
                                        'M.Sc. Life Sciences (Specialization in Biochemistry)' => 'Centre for Biochemistry and Microbial Sciences',
                                        'M.Sc. Life Sciences (Specialization in Mirobial Sciences)' => 'Centre for Biochemistry and Microbial Sciences',
                                        'M.Sc. Life Sciences (Specialization in Animal Sciences)' => 'Centre for Animal Sciences',
                                        'M.Sc. Life Sciences (Specialization in Plant Sciences)' => 'Centre for Plant Sciences',
                                        'M.Sc. Life Sciences (Specialization in Bioinformatics)' => 'Centre for Computational Sciences'),
                      'PGQP23' => array('M.Pharm. Pharmaceutical Sciences (Medicinal Chemistry)' => 'Centre for Pharmaceutical Sciences and Natural Products',
                                        'M.Pharm. Pharmaceutical Sciences (Pharmacognosy and Phytochemistry)' => 'Centre for Pharmaceutical Sciences and Natural Products'),
                      'PGQP24' => array('M.Sc. Chemistry (Computational Chemistry)' => 'Centre for Computational Sciences',
                                        'M.Sc. Chemical Sciences (Medicinal Chemistry)' => 'Centre for Pharmaceutical Sciences and Natural Products',
                                        'M.Sc. Chemistry' => 'Centre for Chemical Sciences'),
                      'PGQP27' => array('M.Sc. Mathematics' => 'Centre for Mathematics and Statistics'),
                      'PGQP28' => array('M.Sc. Physics (Computational Physics)' => 'Centre for Computational Sciences',
                                        'M.Sc. Physics' => 'Centre for Physical Sciences'),
                      'PGQP29' => array('M.Sc. Statistics' => 'Centre for Mathematics and Statistics'),
                      'PGQP30' => array('M.Sc. Sports Science' => ''),
                      'PGQP31' => array('M.Tech. Computer Science and Technology' => 'Centre for Computer Science and Technology',
                                        'M.Tech. Computer Science and Technology (Cyber Security)' => 'Centre for Computer Science and Technology'),
                      'PGQP32' => array('M.Sc. in Environment Science and Technology' => 'Centre for Environmental Sciences and Technology'),
                      'PGQP36' => array('M.Tech. Food Technology' => ''),
                      'PGQP38' => array('MBA. Agribussiness' => ''),
                      'PGQP43' => array('M.A. Political Science' => 'Centre for South and Central Asian Studies (Including Historical Studies)'),
                      'PGQP47' => array('M.A. Economics' => 'Centre for Economic Studies'),
                      'PGQP48' => array('M.Sc. Geology' => 'Centre for Geography and Geology')
            );
        $eligibilty =  array('PGQP02' => array('L.L.M' => 'Centre for Law'),
                      'PGQP03' => array('M.A. Education' => 'Centre for Education',
                                        'M.Ed.' => 'Centre for Education'),
                      'PGQP04' => array('M.A. English' => 'Centre for Comparative Literature'),
                      'PGQP06' => array('M.A. Hindi' => ''),
                      'PGQP08' => array('M.A. Punjabi' => 'Centre for Classical and Modern Languages'),
                      'PGQP12' => array('M.A. History' => 'Centre for South and Central Asian Studies (Including Historical Studies)'),
                      'PGQP14' => array('M.A. Music (Vocal)' => '',
                                        'M.A. Music (Instrumental)' => ''),
                      'PGQP15' => array('M.A. Fine Arts' => ''),
                      'PGQP16' => array('M.A. Theatre' => ''),
                      'PGQP19' => array('M.A. Geography' => 'Centre for Geography and Geology',
                                        'M.Sc. Geography' => 'Centre for Geography and Geology'),
                      'PGQP21' => array('M.A. Sociology' => 'Centre for Sociology'),
                      'PGQP22' => array('M.Sc. Life Sciences (Specialization in Human Genetics)' => 'Centre for Human Genetics and Molecular Medicine',
                                        'M.Sc. Life Sciences (Specialization in Molecular Medicine)' => 'Centre for Human Genetics and Molecular Medicine',
                                        'M.Sc. Life Sciences (Specialization in Biochemistry)' => 'Centre for Biochemistry and Microbial Sciences',
                                        'M.Sc. Life Sciences (Specialization in Mirobial Sciences)' => 'Centre for Biochemistry and Microbial Sciences',
                                        'M.Sc. Life Sciences (Specialization in Animal Sciences)' => 'Centre for Animal Sciences',
                                        'M.Sc. Life Sciences (Specialization in Plant Sciences)' => 'Centre for Plant Sciences',
                                        'M.Sc. Life Sciences (Specialization in Bioinformatics)' => 'Centre for Computational Sciences'),
                      'PGQP23' => array('M.Pharm. Pharmaceutical Sciences (Medicinal Chemistry)' => 'Centre for Pharmaceutical Sciences and Natural Products',
                                        'M.Pharm. Pharmaceutical Sciences (Pharmacognosy and Phytochemistry)' => 'Centre for Pharmaceutical Sciences and Natural Products'),
                      'PGQP24' => array('M.Sc. Chemistry (Computational Chemistry)' => 'Centre for Computational Sciences',
                                        'M.Sc. Chemical Sciences (Medicinal Chemistry)' => 'Centre for Pharmaceutical Sciences and Natural Products',
                                        'M.Sc. Chemistry' => 'Centre for Chemical Sciences'),
                      'PGQP27' => array('M.Sc. Mathematics' => 'Centre for Mathematics and Statistics'),
                      'PGQP28' => array('M.Sc. Physics (Computational Physics)' => 'Centre for Computational Sciences',
                                        'M.Sc. Physics' => 'Centre for Physical Sciences'),
                      'PGQP29' => array('M.Sc. Statistics' => 'Centre for Mathematics and Statistics'),
                      'PGQP30' => array('M.Sc. Sports Science' => ''),
                      'PGQP31' => array('M.Tech. Computer Science and Technology' => 'Centre for Computer Science and Technology',
                                        'M.Tech. Computer Science and Technology (Cyber Security)' => 'Centre for Computer Science and Technology'),
                      'PGQP32' => array('M.Sc. in Environment Science and Technology' => 'Centre for Environmental Sciences and Technology'),
                      'PGQP36' => array('M.Tech. Food Technology' => ''),
                      'PGQP38' => array('MBA. Agribussiness' => ''),
                      'PGQP43' => array('M.A. Political Science' => 'Centre for South and Central Asian Studies (Including Historical Studies)'),
                      'PGQP47' => array('M.A. Economics' => 'Centre for Economic Studies'),
                      'PGQP48' => array('M.Sc. Geology' => 'Centre for Geography and Geology')
            );
?>
    <input type="hidden" name="glob_userId" id="glob_userId" value="<?php echo $this->Session->read('std_id'); ?>" />
    <input type="hidden" name="modified" id="modified" value="false" />
<div class="main_content_header">Options</div>
<fieldset>
    <table id="options-table">
        <thead>
            <tr>
                <th width="5%">Preference Order</th>
                <th width="20%">Paper Code</th>
                <th width="10%">Score</th>
                <th width="35%">Course Preference</th>
                <th width="30%">Name of the Center</th>
            </tr>
        </thead>
        <tbody>
            <?php for($key = 0; $key < 5; $key++) { ?>
            <tr>
                <td>
                    <?php echo $this->Form->hidden("Choice.{$key}.id");
                          echo $this->Form->hidden("Choice.{$key}.std_id", array('value' => $this->Session->read('std_id')));
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
                                'label' => false,
                                'onchange' => 'loadPreferences(this,' . $key .');'
                            )); ?>
                </td>
                <td>
                    <?php echo $this->Form->text("Choice.{$key}.score"); ?>
                </td>
                <td>
                    <?php //$selected = (isset($dbYear) && $dbYear !== "" && $year == $dbYear) ? 'selected' : '';
                          //print_r($branchArr); print_r($selected);
                          echo $this->Form->input("Choice.{$key}.preference", array(
                                'options' => array(),
                                'empty' => array('- select -' => '- select -'),
                                'style' => 'width: 100%;',
                                'label' => false,
                                'onchange' => 'loadCenter(this,' . $key .');'
                            )); ?>
                </td>
                <td>
                    <div name="[Choice][<?php echo $key; ?>][centre]" style="width: 120px; overflow-x: auto;white-space: nowrap;"></div>
                    <?php echo $this->Form->input("Choice.{$key}.centre", array('type' => 'hidden')); ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</fieldset>
<div class="main_content_header">Before applying please check your eligibility on General Information page.</div>
<div class="submit">
    <?php echo $this->Form->submit('Save', array('id' => 'formSubmit' , 'div' => false)); ?>
</div>

<?php echo $this->Form->end(); 
    ?>
</div>
</div>
<script>
    
    var codeSubjectCentre = <?php echo json_encode($codeSubjectCentre) ?>;
    var dbValues = [];
    
    function loadPreferences(e, index) {
    //alert('fired index=' + index);
    $('select[name="data[Choice][' + index + '][preference]"]')
            .find('option')
            .remove()
            .end();
    $.each(codeSubjectCentre, function(key, value) {
        //console.log('stuff : ' + key + ", " + value);
        if(key == $( 'select[name="data[Choice][' + index + '][subject]"] option:selected' ).val()) {
            var temp = "";
            var temp2 = "";
            $.each(value, function(key2, value2) {
                $('select[name="data[Choice][' + index + '][preference]"]')
                    .append('<option value="' + key2 + '">' + key2 + '</option>');
                temp = key2;
                temp2 = value2;
            });
            $('select[name="data[Choice][' + index + '][preference]"]').val(temp);
            $('div[name="[Choice][' + index + '][centre]"]').html(temp2);
            $('input[name="data[Choice][' + index + '][centre]"]').val(temp2);
        }
    });
    
    }

    function loadCenter(e, index){
        //alert('centre index = ' + index);
        $.each(codeSubjectCentre, function(key, value) {
            //console.log('stuff : ' + key + ", " + value);
            $.each(value, function(key2, value2) {
                if(key2 == $( 'select[name="data[Choice][' + index + '][preference]"] option:selected' ).val()) {
                    $('div[name="[Choice][' + index + '][centre]"]').html(value2);
                    $('input[name="data[Choice][' + index + '][centre]"]').val(value2);
                }
            });
        });
    }
    
    <?php
    if (is_array($this->request->data['Choice'])) {
        for ($key = 0; $key < count($this->request->data['Choice']); $key++) { ?>
            
            var obj = {
                subject: '<?php echo $this->request->data['Choice'][$key]['subject']?>',
                preference: '<?php echo $this->request->data['Choice'][$key]['preference']?>'
            }
            
            dbValues.push(obj);
        <?php
        }
    } ?>
$(document).ready(function () {    
    for(var i=0; i< 5; i++) {
        var index = i;

        //$('select[name="data[Choice][' + index + '][subject]"]').on('change', loadPreferences(index));
        //$('select[name="data[Choice][' + index + '][preference]"]').on('change', loadCenter(index));
        //$('select[name="data[Choice][' + index + '][subject]"]').on('change', loadPreferences(index));
        //$('select[name="data[Choice][' + index + '][preference]"]').on('change', loadCenter(index));

        if(dbValues[i]) {
            $('select[name="data[Choice][' + index + '][subject]"]').val(dbValues[i]['subject']).trigger('change');
            //$('select[name="data[Choice][' + index + '][subject]"]').trigger('change');
        }
        //$('select[name="data[Choice][' + index + '][subject]"]').val(dbValues[i]['subject']).change();
        if(dbValues[i]) {
            $('select[name="data[Choice][' + index + '][preference]"]').val(dbValues[i]['preference']).trigger('change');
            //$('select[name="data[Choice][' + index + '][preference]"]').trigger('change');
        }
        //$('select[name="data[Choice][' + index + '][preference]"]').val(dbValues[i]['preference']).change();
    }
 });
</script>