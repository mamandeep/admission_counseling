<table>
    <tr>
        <td><a href="<?php echo $this->webroot . 'Reports/index?t=t'; ?>">Download Teaching Summary Sheet</a></td>
    </tr>
    <tr>
        <td><a href="<?php echo $this->webroot . 'Reports/index?nt=nt'; ?>">Download Non Teaching Summary Sheet</a></td>
    </tr>
</table>
<div>Select the Center and Category below to generate report: </div>
<?php echo $this->Form->create('Reports', array('id' => 'Report_Details', 
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
      
        ?>
        <table>
            <tr>
                <td width="50%"></td>
                <td width="50%"></td>
            </tr>
            <tr>
                <td><?php 
                echo $this->Form->input('Reports.id', array('type' => 'hidden'));
                echo $this->Form->input('Reports.std_id', array('type' => 'hidden', 'value' => $this->Session->read('std_id')));
                $centreoptions = array();
                foreach ($codeSubjectCentre as $key2 => $value2) {
                    foreach($value2 as $key3 => $value3) {
                        $centreoptions[$value3] = $value3;
                    }
                    //$subjectoptions[$key2] = $key2;
                }
                echo $this->Form->input('Reports.centre', array(
                    'options' => $centreoptions,
                    'style' => 'width: 100%;',
                    'label' => 'Center'
                ));
                ?></td>
                <td><?php 
                    echo $this->Form->input('Reports.category', array(
                        'options' => array('General' => 'General',
                                           'SC' => 'SC',
                                           'ST' => 'ST',
                                           'OBC' => 'OBC'),
                        'label' => 'Category'
                    )); ?></td>
                
            <tr>
        </table>
<div class="submit">
    <?php echo $this->Form->submit('Submit', array('div' => false)); ?>
</div>
<?php /* echo $this->Form->create('Reports', array('id' => 'Reports_Details', 
                                'url' => Router::url( null, true ))); 
//print_r($this->request->data);
        ?>
        <table>
            <tr>
                <td><?php 
                    echo $this->Form->input('Reports.id', array('type' => 'hidden'));
                    $dropd = array('teaching' => 'Teaching', 'nonteaching' => 'Non Teaching');
                    echo $this->Form->input('Reports.t_nt', array(
                        'readonly' => 'readonly',
                        'label' => 'Report Type',
                        'options' => $dropd,
                        'default' => 'teaching'
                    )); ?></td>
            </tr>
        </table>
        
        
	<div class="submit">
            <?php echo $this->Form->submit('Download', array('div' => false)); ?>
	</div>
<?php echo $this->Form->end(); */ ?>

<script>
    
    $(document).ready(function () {
        
    });
    
</script>
            
