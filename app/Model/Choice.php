<?php

class Choice extends AppModel {
    
    public $useTable = 'choices';
            
    var $validate = array(
        'subject' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'This field cannot be left blank'
            ),
            'papercode' => array(
                'rule' => 'checkpapercode',
                'required' => true,
                'message' => 'Paper code selected is not valid'
            )
        ),
        'score' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'This field cannot be left blank'
            ),
            'pattern'=>array(
                 'rule'      => '/^[0-9]+$/i',
                 'message'   => 'Only valid numeric digits allowed',
            ),
            'number' => array(
                'rule' => array('range', 0, 300),
                'message' => 'Please enter a number between 0 and 300'
            )
        ),
        'preference'  => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'This field cannot be left blank'
            ),
            'coursename' => array(
                'rule' => 'checkcourse',
                'required' => true,
                'message' => 'Preference selected is not valid'
            )
        ),
        'centre'
    );
    
    public function checkpapercode ($check) {
        $str = "PGQP02;PGQP03;PGQP04;PGQP06;PGQP08;PGQP12;PGQP14;PGQP15;PGQP16;PGQP19;PGQP21;PGQP22;PGQP23;PGQP24;PGQP27;PGQP28;PGQP29;PGQP30;PGQP31;PGQP32;PGQP36;PGQP38;PGQP43;PGQP47;PGQP48";
        if (strpos($str, $check['subject']) === false) {
            return false;
        } else {
            return true;
        }
    }
    
    public function checkcourse ($check) {
        $str = "L.L.M;M.A. Education;M.Ed.;M.A. English;M.A. Hindi;M.A. Punjabi;M.A. History;M.A. Music (Vocal);M.A. Music (Instrumental);M.A. Fine Arts;M.A. Theatre;M.A. Geography;M.Sc. Geography;M.A. Sociology;M.Sc. Life Sciences (Specialization in Human Genetics);M.Sc. Life Sciences (Specialization in Molecular Medicine);M.Sc. Life Sciences (Specialization in Biochemistry);M.Sc. Life Sciences (Specialization in Microbial Sciences);M.Sc. Life Sciences (Specialization in Animal Sciences);M.Sc. Life Sciences (Specialization in Plant Sciences);M.Sc. Life Sciences (Specialization in Bioinformatics);M.Pharm. Pharmaceutical Sciences (Medicinal Chemistry);M.Pharm. Pharmaceutical Sciences (Pharmacognosy and Phytochemistry);M.Sc. Chemistry (Computational Chemistry);M.Sc. Chemical Sciences (Medicinal Chemistry);M.Sc. Chemistry;M.Sc. Mathematics;M.Sc. Physics (Computational Physics);M.Sc. Physics;M.Sc. Statistics;M.Sc. Sports Science;M.Tech. Computer Science and Technology;M.Tech. Computer Science and Technology (Cyber Security);M.Sc. in Environment Science and Technology;M.Tech. Food Technology;MBA. Agribussiness;M.A. Political Science;M.A. Economics;M.Sc. Geology";
        if(strpos($str, $check['preference']) === false) {
            return false;
        }
        else {
            return true;
        }
    }
}

?>