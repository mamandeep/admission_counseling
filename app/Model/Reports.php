<?php

class Reports extends AppModel {
    
    public $useTable = 'reports';
    
    var $validate = array(
        /*'applicant_id' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Please enter only numbers',
                'allowEmpty' => false,
                'required' => true,
            )
        ),
        'type' => array(
            'alphaNumeric' => array(
                'rule' => 'alphaNumeric',
                'required' => true,
                'allowEmpty' => false,
                'message' => 'Letters and numbers only'
            )
        )*/
    );
    
}

?>
