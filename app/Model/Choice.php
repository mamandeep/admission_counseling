<?php

class Choice extends AppModel {
    
    public $useTable = 'choices';
            
    var $validate = array(
        'preference',
        'pref_order'
    );
    
}

?>