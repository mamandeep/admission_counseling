<?php

App::uses('CakeSession', 'Model/Datasource');

class Student extends AppModel {

    //public $belongsTo = 'User';
    public $useTable = 'students';
    
    var $validate = array(
        'name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'This field cannot be left blank'
            ),
            'length' => array (
                'rule' => array('maxLength', 100),
                'message' => 'This field has crossed allowed limit.'
            ),
            'pattern'=>array(
                 'rule'      => '/^[a-z ]+$/i',
                 'message'   => 'Only letters allowed'
            )
        ),
        'email' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'This field cannot be left blank'
            ),
            'email'=>array(
                 'rule'      => 'email',
                 'message'   => 'Only valid email allowed'
            )
        ),
        'mobile_no' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'This field cannot be left blank'
            ),
            'length' => array (
                'rule' => array('maxLength', 10),
                'message' => 'This field has crossed allowed limit. Only 10 digits allowed'
            ),
            'pattern'=>array(
                 'rule'      => '/^[789][0-9]{9}$/i',
                 'message'   => 'Only valid 10 digit mobile number allowed',
            )
        ),
        'father_name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'This field cannot be left blank'
            ),
            'length' => array (
                'rule' => array('maxLength', 100),
                'message' => 'This field has crossed allowed limit.'
            ),
            'pattern'=>array(
                 'rule'      => '/^[a-z ]+$/i',
                 'message'   => 'Only letters allowed'
            )
        ),
        /*
        'father_email' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'This field cannot be left blank'
            ),
            'email'=>array(
                 'rule'      => 'email',
                 'message'   => 'Only valid email allowed'
            )
        ),*/
        'father_mobile' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'This field cannot be left blank'
            ),
            'length' => array (
                'rule' => array('maxLength', 10),
                'message' => 'This field has crossed allowed limit. Only 10 digits allowed.'
            ),
            'pattern'=>array(
                 'rule'      => '/^[789][0-9]{9}$/i',
                 'message'   => 'Only valid 10 digit mobile number allowed'
            )
        ),
        'mother_name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'This field cannot be left blank'
            ),
            'length' => array (
                'rule' => array('maxLength', 100),
                'message' => 'This field has crossed allowed limit.'
            ),
            'pattern'=>array(
                 'rule'      => '/^[a-z ]+$/i',
                 'message'   => 'Only letters allowed'
            )
        ),
        /*
        'mother_email' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'This field cannot be left blank'
            ),
            'email'=>array(
                 'rule'      => 'email',
                 'message'   => 'Only valid email allowed'
            )
        ),*/
        'mother_mobile' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'This field cannot be left blank'
            ),
            'length' => array (
                'rule' => array('maxLength', 10),
                'message' => 'This field has crossed allowed limit. Only 10 digits allowed.'
            ),
            'pattern'=>array(
                 'rule'      => '/^[789][0-9]{9}$/i',
                 'message'   => 'Only valid 10 digit mobile number allowed'
            )
        ),
        'dob' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'This field cannot be left blank'
            ),
            'pattern'=>array(
                'rule'      => '/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/i',
                'message'   => 'Only valid date (dd/mm/yyyy) is allowed'
            ),
            'valid'=> array(
                'rule'      => 'checkdate',
                'message'   => 'Only valid date is allowed'
            )
        ),
        /*
        'aadhaar_no' => array(
            'pattern'=>array(
                'rule'      => '/^[0-9]{4} [0-9]{4} [0-9]{4}$/i',
                'message'   => 'Only valid Aadhaar No. (xxxx xxxx xxxx) is allowed'
            )
        ),
        'nationality' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'This field cannot be left blank'
            ),
            'length' => array (
                'rule' => array('maxLength', 20),
                'message' => 'This field has crossed allowed limit.'
            )
        ),*/
        'gender' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'This field cannot be left blank'
            ),
            'pattern' => array(
                 'rule'      => '/^[a-z ]+$/i',
                 'message'   => 'Value not selected'
            )
        ),
        'ward_of_ffighter' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'This field cannot be left blank'
            ),
            'pattern' => array(
                 'rule'      => '/^[a-z ]+$/i',
                 'message'   => 'Value not selected'
            )
        ),
        'category' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'This field cannot be left blank'
            ),
            'pattern' => array(
                 'rule'      => '/^[a-z ]+$/i',
                 'message'   => 'Category not selected'
            )
        ),
        'pwd' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'This field cannot be left blank'
            ),
            'pattern' => array(
                 'rule'      => '/^[a-z ]+$/i',
                 'message'   => 'Value not selected'
            )
        ),
        'kashmiri_mig' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'This field cannot be left blank'
            ),
            'pattern' => array(
                 'rule'      => '/^[a-z ]+$/i',
                 'message'   => 'Value not selected'
            )
        ),
        'ward_of_def' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'This field cannot be left blank'
            ),
            'pattern' => array(
                 'rule'      => '/^[a-z ]+$/i',
                 'message'   => 'Value not selected'
            )
        ),
        /*
        'state_domicile' => array(
            'states' => array(
                'rule' => 'checkstate',
                'required' => true,
                'message' => 'State selected is not valid'
            )
        ),*/
        'comm_address' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'This field cannot be left blank'
            ),
            'length' => array (
                'rule' => array('maxLength', 200),
                'message' => 'The length of this field is beyond max allowed limit.'
            )
        ),
        /*
        'subject1' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'This field cannot be left blank'
            ),
            'pattern'=>array(
                 'rule'      => '/^[a-z 0-9]+$/i',
                 'message'   => 'Value not selected'
            )
        ),
        'rollno1' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'This field cannot be left blank'
            ),
            'length' => array (
                'rule' => array('maxLength', 10),
                'message' => 'This field has crossed allowed limit. Only 10 digits allowed'
            ),
            'pattern'=>array(
                 'rule'      => '/^[0-9]+$/i',
                 'message'   => 'Only digits allowed',
            )
        ),
        'score1' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'This field cannot be left blank'
            ),
            'pattern'=>array(
                 'rule'      => '/^[0-9]+$/i',
                 'message'   => 'Only digits allowed',
            )
        ),*/
        'rollno' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'This field cannot be left blank'
            ),
            'length' => array (
                'rule' => array('maxLength', 10),
                'message' => 'This field has crossed allowed limit. Only 10 digits allowed'
            ),
            'pattern'=>array(
                 'rule'      => '/^[0-9]+$/i',
                 'message'   => 'Only digits allowed',
            )
        ),
        'ug_result' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'This field cannot be left blank'
            )
        ),
        'ug_marks' => array(
            'pattern'=>array(
                 'rule'      => '/^[0-9.]+$/i',
                 'required'  => false,
                 'allowEmpty' => true,
                 'message'   => 'Only numbers are allowed'
            )
        ),
        'blood_group' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'This field cannot be left blank'
            )
        ),
        'blood_group' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'This field cannot be left blank'
            ),
            'pattern' => array(
                 'rule'      => '/^[a-z ]+$/i',
                 'message'   => 'Value not selected'
            )
        ),
        'state_domicile' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'This field cannot be left blank'
            ),
            'pattern' => array(
                 'rule'      => '/^[a-z ]+$/i',
                 'message'   => 'Value not selected'
            )
        ),
        'nationality' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'This field cannot be left blank'
            )
        ),
        'perm_address' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'This field cannot be left blank'
            ),
            'length' => array (
                'rule' => array('maxLength', 200),
                'message' => 'The length of this field is beyond max allowed limit.'
            )
        )
        /*
        'year_of_cucet' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'required'   => true,
                'message' => 'This field cannot be left blank'
            ),
            'pattern'=>array(
                'rule'      => '/^[0-9]{4}$/i',
                'message'   => 'Only valid Year (yyyy) is allowed'
            )
        )*/
    );

    function beforeSave($options = array()) {
        /*if (empty($this->data[$this->alias]['appId']))   {
            $digits = 8;
            $appId = rand(pow(10, $digits-1), pow(10, $digits)-1);
            $this->data[$this->alias]['appId'] = $appId;
            //$this->data[$this->alias]['user_id'] = CakeSession::read('applicant_id');
        }*/
        //print_r($this->data); return false;
        //return $this->data;
    }
    
    function beforeValidate($options = array()) {
        
    }
    

    function paymentValidation($data) {
        return ((!empty($this->data[$this->alias]['appfee_dd_no'])
               && !empty($this->data[$this->alias]['appfee_dd_date'])
               && !empty($this->data[$this->alias]['appfee_dd_amt'])
               && !empty($this->data[$this->alias]['appfee_dd_bank'])
               && !empty($this->data[$this->alias]['appfee_dd_branch'])));
                /*||
                (!empty($this->data[$this->alias]['challan_no'])
                && !empty($this->data[$this->alias]['challan_date']))
                );*/
    }
    
    public function checkdate($check) {
        $dtarr = explode("/", $check['dob']);
        return checkdate($dtarr[1], $dtarr[0], $dtarr[2]);
        /*$bday = strtotime($check['dob']);
        if (time() < strtotime('+13 years', $bday)) return false;
        return true;*/
    }
    
    public function checkstate ($check) {
        $str = "Andaman and Nicobar Islands;Andhra Pradesh;Arunachal Pradesh;Assam;Bihar;Chandigarh;Chhattisgarh;Dadra and Nagar Haveli;Daman and Diu;National Capital Territory of Delhi;Goa;Gujarat;Haryana;Himachal Pradesh;Jammu and Kashmir;Jharkhand;Karnataka;Kerala;Lakshadweep;Madhya Pradesh;Maharashtra;Manipur;Meghalaya;Mizoram;Nagaland;Odisha;Puducherry;Punjab;Rajasthan;Sikkim;Tamil Nadu;Telangana;Tripura;Uttar Pradesh;Uttarakhand;West Bengal";
        if(strpos($str, $check['state_domicile']) >= 0)
            return true;
        else
            return false;
    }
    
}

?>
