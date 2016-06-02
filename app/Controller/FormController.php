<?php

class FormController extends AppController {

    var $components = array('Captcha.Captcha'=>array('Model'=>'Signup', 
                        'field'=>'security_code'));//'Captcha.Captcha'

    var $uses = array('Signup', 'Student', 'Registereduser','Choice','Branch', 'Document', 'Subject','BranchSubject');                
    
    public $helpers = array('Captcha.Captcha');
    
    
    
    public $paginate = array(
        'limit' => 25,
        'conditions' => array('status' => '1'),
    	'order' => array('User.username' => 'asc' ) 
    );
	
    public function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allow('login','add','logout'); 
        if(!$this->Session->check('std_id')) {
            $this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
        }
    }
	


    function captcha()  {
        $this->autoRender = false;
        $this->layout='ajax';
        if(!isset($this->Captcha))	{ //if you didn't load in the header
            $this->Captcha = $this->Components->load('Captcha.Captcha'); //load it
        }
        $this->Captcha->create();
    }
    
    public function generalinformation() {
           //$applicants = $this->Applicant->find('all', array(
           //     'conditions' => array('Applicant.id' => $this->Session->read('applicant_id'))));
            //if (count($applicants) == 1 ) {
            //    $this->set('applicant', $applicants['0']);
            //}
    }
        
        public function register() {
            if(!empty($this->data['Registereduser'])) {
                $this->Signup->setCaptcha('security_code', $this->Captcha->getCode('Signup.security_code')); //getting from component and passing to model to make proper validation check
                $this->Signup->set($this->request->data);
                if ($this->Signup->validates()) {
                    $segments = explode('/', $this->data['Registereduser']['dob']);
                    if (count($segments) !== 3 || !preg_match("/^[0-3][0-9]\/[0-1][0-9]\/[0-9]{4}$/", $this->data['Registereduser']['dob'])) {
                        $this->Session->setFlash('Date of Birth is not in correct format.');
                        return false;
                    }
                    list($dd,$mm,$yyyy) = $segments;
                    if (!checkdate((int)$mm,(int)$dd,(int)$yyyy)) {
                        $this->Session->setFlash('Date of Birth is not in correct format.');
                        return false;
                    }
                    if(!filter_var($this->data['Registereduser']['email'], FILTER_VALIDATE_EMAIL)) {
                        $this->Session->setFlash('Email Id is not in correct format.');
                        return false;
                    }
                    if (!preg_match("/^[789]\d{9}$/",$this->data['Registereduser']['mobile_no'])) {
                        $this->Session->setFlash('Mobile number is not correct. Please enter a valid 10 digit mobile number.');
                        return false; 
                    }
                    $registered_user = $this->Registereduser->find('all', array(
                                'conditions' => array('Registereduser.email' => trim($this->data['Registereduser']['email']),
                                                      'Registereduser.dob' => trim($this->data['Registereduser']['dob']))
                                                    ));
                    if(count($registered_user) != 0) {
                        $this->Session->setFlash('Email / Date of Birth is already registered.');
                        return false;
                    }
                    $this->Student->create();
                    //$this->Student->set(array(
                    //    'advertisement_no' => 'T-01 (2016)'));
                    if(!$this->Student->save(array(), false)){
                        debug($this->Student->validationErrors); die();
                    }
                    if($this->Student->save(null, false) && $this->Registereduser->save($this->data['Registereduser'])) {
                        $this->Session->write('std_id', $this->Student->getLastInsertID());
                        $this->Session->write('registration_id', $this->Registereduser->getLastInsertID());
                        $this->Student->id = $this->Session->read('std_id');
                        $this->Student->saveField('reg_id', $this->Session->read('registration_id'));
                        $this->Registereduser->id = $this->Session->read('registration_id');
                        $this->Registereduser->saveField('std_id', $this->Session->read('std_id'));
                        $this->Session->setFlash('You have successfully registered.');
                        //$this->redirect(array('controller' => 'form', 'action' => 'pay'));
			$this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
                    }
                    else {
                        $this->Session->setFlash('There was an error in Registration.');
                    }
                }
                else {
                    $this->Session->setFlash('Data Validation Failure', 'default', array('class' =>
                        'cake-error'));
                }
            }
        }
        
        public function studentdetails() {
            if(!empty($this->data['Student'])) {
                $this->Student->create();    
                $this->Student->set($this->data);
                if($this->Student->validates()) {
                    if($this->Student->save())
                        $this->redirect(array('controller' => 'form', 'action' => 'uploaddocuments'));
                    else {
                        $this->Session->setFlash('There was an error in saving the form.');
                    }
                }
                else {
                    $this->Session->setFlash('Some of the data filled is not correct. Please check.');
                    return false;
                }
            }
            $student = $this->Student->find('all', array(
                    'conditions' => array('Student.id' => $this->Session->read('std_id'))));
            $this->request->data = $student['0'];
            $this->set('dbYear', $student['0']['Student']['year_of_cucet']);
            $this->set('pg_result', $student['0']['Student']['pg_result']);
        }
        
        public function uploaddocuments() {
            if(!empty($this->data['Document'])) {
                if(!empty($this->data['Document']['filename']['error']) && $this->data['Document']['filename']['error'] == 4
                && !empty($this->data['Document']['filename2']['error']) && $this->data['Document']['filename2']['error'] == 4
                && !empty($this->data['Document']['filename3']['error']) && $this->data['Document']['filename3']['error'] == 4
                && !empty($this->data['Document']['filename4']['error']) && $this->data['Document']['filename4']['error'] == 4
               )
                return true;

                if ($this->Document->save($this->data['Document'])) {
                    $this->Session->setFlash('Your documents have been submitted successfully.');
                    $this->redirect(array('controller'=>'form', 'action' => 'previewdocuments'));
                    return true;
                }
                return false;
            }
            
            $param ="";
            if(isset($this->params['url']['ct'])) 
                $param = $this->params['url']['ct'];
            if($param == "1") {
                $this->redirect(array('controller'=>'form', 'action' => 'previewdocuments'));
            }
            
            $images = $this->Document->find('all', array(
                    'conditions' => array('Document.std_id' => $this->Session->read('std_id'))));
            
            if(count($images) == 1) {
                $this->request->data = $images['0'];
            }
            else if(count($images) > 1) {
                $this->Session->setFlash('An error has occured. Please contact Support.');
            }
        }
        
        public function previewdocuments() {
            $images = $this->Document->find('all', array(
                    'conditions' => array('Document.std_id' => $this->Session->read('std_id'))));
            
            if(count($images) == 1) {
                //$this->request->data = $images['0'];
                if(empty($images['0']['Document']['filename']) || empty($images['0']['Document']['filename2']) 
                    || empty($images['0']['Document']['filename4']))
                {
                    if(empty($images['0']['Document']['filename']))
                        $this->Session->setFlash('Photograph is mandatory');
                    if(empty($images['0']['Document']['filename2']))
                        $this->Session->setFlash('Date of Birth Certificate is mandatory');
                    if(empty($images['0']['Document']['filename4']))
                        $this->Session->setFlash('Signature is mandatory');
                    $this->redirect(array('controller'=>'form', 'action' => 'uploaddocuments'));
                }
                $this->set('image', $images['0']);
                //print_r($this->request->data);
            }
            else if(count($images) > 1) {
                $this->Session->setFlash('An error has occured. Please contact Support.');
            }
        }
        
        public function prepayment() {
        if (!empty($this->data['Applicant']['id']) && !empty($this->data['Applicant']['email']) 
                && !empty($this->data['Applicant']['date_of_birth'])) { 
            $segments = explode('/', $this->data['Applicant']['date_of_birth']);
            if (count($segments) !== 3 || !preg_match("/^[0-3][0-9]\/[0-1][0-9]\/[0-9]{4}$/", $this->data['Applicant']['date_of_birth'])) {
                $this->Session->setFlash('Date of Birth is not in correct format.');
                return false;
            }
            list($dd,$mm,$yyyy) = $segments;
            if (!checkdate((int)$mm,(int)$dd,(int)$yyyy)) {
                $this->Session->setFlash('Date of Birth is not in correct format.');
                return false;
            }
            if(!filter_var($this->data['Applicant']['email'], FILTER_VALIDATE_EMAIL)) {
                $this->Session->setFlash('Email Id is not in correct format.');
                return false;
            }
            $applicant_id = trim($this->data['Applicant']['id']);
            $registered_user = $this->Registereduser->find('all', array(
                'conditions' => array('Registereduser.applicant_id' => $applicant_id,
                    'Registereduser.email' => trim($this->data['Applicant']['email']),
                    'Registereduser.dob' => trim($this->data['Applicant']['date_of_birth']))));
            $applicants = $this->Applicant->find('all', array(
                'conditions' => array('Applicant.id' => $applicant_id)));
            if (count($registered_user) == 1 && count($applicants) == 1 
                    && $applicants['0']['Applicant']['response_code'] != "0") {
                $this->Session->write('applicant_id', $applicant_id);
                $this->redirect(array('controller' => 'form', 'action' => 'pay'));
            } else if(count($registered_user) == 1 && count($applicants) == 1 
                    && $applicants['0']['Applicant']['response_code'] == "0") {
                // Is the below message fine for showing to applicants
                $this->Session->setFlash('Payment has been done. Enter credentials to login.');
                $this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
            }
            else {
                $this->Session->setFlash('Details entered are not valid.');
                return false;
            }
        }
        else if(strcmp(Router::url(array('controller' => 'Form','action' => 'register'), true), $this->referer()) !== 0) {
            $this->Session->setFlash('Details entered are not complete.');
            return false;
        }
    }

    public function appliedposts() { 
            /*$posts_applied = $this->Post->find('all', array(
                        'conditions' => array('Post.registration_id' => $this->Session->read('registration_id'))));
                                              //'Post.final_submit' => '1')));
            $this->request->data = $posts_applied;*/
        }
        
        public function printform($post = null) { 
            if(!empty($this->Session->read('registration_id'))) {
                $post_name = !empty($this->request->query['post']) ? $this->request->query['post'] : '';
                $posts_applied = $this->Post->find('all', array(
                            'conditions' => array('Post.registration_id' => $this->Session->read('registration_id'),
                                                  'Post.post_name' => $post_name)
                                                ));
                if(count($posts_applied) == 1 && $posts_applied['0']['Post']['final_submit'] == '1') {
                    $applicant_id = $posts_applied['0']['Post']['user_id'];
                    $this->layout = false;
                    $this->set('data_set', 'false');
                    $applicants = $this->Applicant->find('all', array(
                            'conditions' => array('Applicant.id' => $applicant_id)));
                    $education_arr = $this->Education->find('all', array(
                            'conditions' => array('Education.user_id' => $applicant_id)));
                    $exp_arr = $this->Experience->find('all', array(
                            'conditions' => array('Experience.user_id' => $applicant_id)));
                    $publications_arr = $this->Researchpaper->find('all', array(
                            'conditions' => array('Researchpaper.user_id' => $this->Session->read('applicant_id'))));
                    $image = $this->Image->find('all', array(
                            'conditions' => array('Image.user_id' => $applicant_id)));
                    $misc = $this->Misc->find('all', array(
                            'conditions' => array('Misc.user_id' => $applicant_id)));                
                    if(count($applicants) == 1 && count($misc) == 1) {
                        $this->set('postAppliedFor', $post_name);
                        $this->set('applicant', $applicants['0']);
                        $this->set('education_arr', $education_arr);
                        $this->set('exp_arr', $exp_arr);
                        $this->set('publication_arr', $publications_arr);
                        $this->set('image', !empty($image['0']) ? $image['0'] : array());
                        $this->set('misc', $misc['0']);
                        $this->set('data_set', 'true');
                    }
                }
            }
        }

	public function prepay() {
            $student = $this->Student->find('all', array(
                            'conditions' => array('Student.id' => $this->Session->read('std_id'))));
            $this->set('payment_status', $student['0']['Student']['response_code']);
        }
        
        public function pay() {
                $arr = array("Male", "Female", "Transgender");
                $student = $this->Student->find('all', array(
                            'conditions' => array('Student.id' => $this->Session->read('std_id'))));
                if(!in_array($student['0']['Student']['gender'], $arr)) {
                    $this->Session->setFlash('Please complete the Personal Details section before payment.');
                    $this->redirect(array('controller' => 'form', 'action' => 'studentdetails'));
                }
                      
                if($student['0']['Student']['category'] == "SC" || $student['0']['Student']['category'] == "ST" 
                        || $student['0']['Student']['pwd'] == "Yes") {
                        $this->set('app_fee', '250');
                        $this->Session->write('payment_amount','250');
                }
                else {
                        $this->set('app_fee', '750');
                        $this->Session->write('payment_amount','750');
                }
                $this->set('Student', $student['0']['Student']);
	}

	public function post() {
		//print_r($this->request->data);
		$HASHING_METHOD = 'sha512'; // md5,sha1
		$ACTION_URL = "https://secure.ebs.in/pg/ma/payment/request/";

		$this->set('ACTION_URL',$ACTION_URL);		
		if(isset($_POST['secretkey']))
			$_SESSION['SECRET_KEY'] = $_POST['secretkey'];
		else
			$_SESSION['SECRET_KEY'] = ''; //set your secretkey here
			
		$hashData = $_SESSION['SECRET_KEY'];

		unset($_POST['secretkey']);
		unset($_POST['submitted']);

		ksort($_POST);
		foreach ($_POST as $key => $value) {
			if (strlen($value) > 0) {
				if($key == "amount") {
					$hashData .= '|'. $this->Session->read('payment_amount');
				}
				else {
					$hashData .= '|'.$value;
				}
			}
		}
		if (strlen($hashData) > 0) {
			$secureHash = strtoupper(hash($HASHING_METHOD, $hashData));
			$this->set('secureHash', $secureHash);
		}
	}
        
	public function returnpg() {
		$HASHING_METHOD = 'sha512'; // md5,sha1

		// This response.php used to receive and validate response.
		if(!isset($_SESSION['SECRET_KEY']) || empty($_SESSION['SECRET_KEY']))
		$_SESSION['SECRET_KEY'] = ''; //set your secretkey here
			
		$hashData = $_SESSION['SECRET_KEY'];
		ksort($_POST);
		foreach ($_POST as $key => $value){
			if (strlen($value) > 0 && $key != 'SecureHash') {
				$hashData .= '|'.$value;
			}
		}
		if (strlen($hashData) > 0) {
			$secureHash = strtoupper(hash($HASHING_METHOD , $hashData));
	
			if($secureHash == $_POST['SecureHash']){
				
				if($_POST['ResponseCode'] == 0){
					// update response and the order's payment status as SUCCESS in to database
					
					$this->Student->create();
            				$this->Student->id = $this->Session->read('std_id');
					$this->Student->set(array('response_code' => $_POST['ResponseCode'],
								    'payment_date_created' => $_POST['DateCreated'],
								    'payment_id' => $_POST['PaymentID'],
								    'payment_amount' => $_POST['Amount'],
								    'payment_transaction_id' => $_POST['TransactionID']));
            				if ($this->Applicant->id) {
                				$this->Applicant->save();
            				}
            				//$this->redirect(array('controller' => 'form', 'action' => 'appliedposts'));
					//for demo purpose, its stored in session
					$_POST['paymentStatus'] = 'SUCCESS';
					$_SESSION['paymentResponse'][$_POST['PaymentID']] = $_POST;
					$this->set('paymentStatus', $_POST['ResponseCode']);
					$this->set('paymentStatusStr', 'SUCCESS');
					$this->set('transID', $_POST['TransactionID']);
					$this->set('tras_amount', $_POST['Amount']);
					
				} else {
					// update response and the order's payment status as FAILED in to database
					$this->set('error_mesg', $_POST['Error']);
					//for demo purpose, its stored in session
					$_POST['paymentStatus'] = 'FAILED';
					$_SESSION['paymentResponse'][$_POST['PaymentID']] = $_POST;
				}
				// Redirect to confirm page with reference.
				$confirmData = array();
				$confirmData['PaymentID'] = $_POST['PaymentID'];
				$confirmData['Status'] = $_POST['paymentStatus'];
				$confirmData['Amount'] = $_POST['Amount'];
				
				$hashData = $_SESSION['SECRET_KEY'];

				ksort($confirmData);
				foreach ($confirmData as $key => $value){
					if (strlen($value) > 0) {
						$hashData .= '|'.$value;
					}
				}
				if (strlen($hashData) > 0) {
					$secureHash = strtoupper(hash($HASHING_METHOD , $hashData));
				}
			} else {
				echo '<h1>Error!</h1>';
				echo '<p>Hash validation failed</p>';
			}
		} else {
			echo '<h1>Error!</h1>';
			echo '<p>Invalid response</p>';
		}
	}

	public function options() {
            $student = $this->Student->find('all', array(
                            'conditions' => array('Student.id' => $this->Session->read('std_id'))));
            
            if(!empty($student['0']['Student']['response_code']) && $student['0']['Student']['response_code'] == "0") {
                $this->Session->setFlash('Payment not completed.');
                $this->redirect(array('controller' => 'form', 'action' => 'prepay'));
            }
            //$this->Session->write('options_locked', $student['0']['Student']['options_locked']);
            $this->set('optionsLocked', ($student['0']['Student']['options_locked'] == "1") ? "1" : "0");
            if(!empty($this->data['Choice'])) {
                if(!empty($this->data['modified']) && $this->data['modified'] == 'true') {
                    $choices = $this->Choice->deleteAll( array('Choice.std_id' => $this->Session->read('std_id')));
                }
                
                if($this->Choice->saveMany($this->data['Choice'])) { 
                    $this->redirect(array('controller' => 'form', 'action' => 'lockoptions'));
                    //return true;
                }
                else {
                    $this->Session->setFlash('There was an error in saving the preferences. Please contact Support.');
                    return false;
                }
                
                //return false;
            }
            //$temp = $this->Session->read('applicant_id');
            $choice_arr = $this->Choice->find('all', array(
                    'conditions' => array('Choice.std_id' => $this->Session->read('std_id')),
                    'order' => array('Choice.pref_order ASC')));
            //$misc = $this->Applicant->find('all', array(
            //        'conditions' => array('Applicant.id' => $this->Session->read('applicant_id'))));
            //print_r($this->Session->read('applicant_id'));
            //if(count($education_arr) == 7 || count($education_arr) == 12) {
                //$this->request->data = $education_arr;
            //$educationId_arr = array();
            $choice_data = array();
            foreach($choice_arr as $key => $value) {
                //$educationId_arr[$key] = $value['Education']['id'];
                $choice_data[$key] = $choice_arr[$key]['Choice'];
            }
            $branchlist = $this->Branch->find('list', array(
                                                'conditions' => array(
                                                    'college_code' => 1
                                                ),    
                                                'fields' => array('Branch.branch_code','Branch.branch_name')));
            $subjectlist = $this->Subject->find('list', array(
                                                'conditions' => array(
                                                    'college_code' => 1
                                                ),    
                                                'fields' => array('Subject.subject_code','Subject.subject_name')));
            
            $subjectbranch = $this->BranchSubject->find('list', array(    
                                                'fields' => array('BranchSubject.subject_code','BranchSubject.branch_code')));
            //foreach ($branchlist as $key)
            $this->request->data = array('Choice' => $choice_data);
            $this->set('branchArr', $branchlist);
            $this->set('subjectArr', $subjectlist);
            $this->set('subjectBrArr', $subjectbranch);
        }
        
        public function lockoptions() {
            //print_r($this->data);
            $student = $this->Student->find('all', array(
                            'conditions' => array('Student.id' => $this->Session->read('std_id'))));
            
            //$this->Session->write('options_locked', $student['0']['Student']['options_locked']);
            if(!empty($this->Session->read('options_locked')) && $this->Session->read('options_locked') == "1") {
                $this->Session->setFlash('The options have been locked.');
                $this->redirect(array('controller' => 'form', 'action' => 'options'));
            }
                
            if(!empty($this->data) && $this->data['lockoptions'] == "true") {
                $this->Student->id = $this->Session->read('std_id');
                if (!empty($this->Student->id)) {
                    $this->Student->saveField('options_locked', "1");
                    //$this->Session->write('options_locked', "1");
            	}
            	$this->redirect(array('controller' => 'form', 'action' => 'options'));
            }
            
            $choice_arr = $this->Choice->find('all', array(
                                    'conditions' => array('Choice.std_id' => $this->Session->read('std_id')),
                                    'order' => array('Choice.pref_order ASC')));
            if(count($choice_arr) == 0) {
                $this->Session->setFlash('No Preferences given.');
                $this->redirect(array('controller' => 'form', 'action' => 'options'));
            }
            
            $choice_data = array();
            foreach($choice_arr as $key => $value) {
                $choice_data[$key] = $choice_arr[$key]['Choice'];
            }
            $branchlist = $this->Branch->find('list', array(
                                                'conditions' => array(
                                                    'college_code' => 1
                                                ),    
                                                'fields' => array('Branch.branch_code','Branch.branch_name')));
            $this->request->data = array('Choice' => $choice_data);
            $this->set('branchArr', $branchlist);
            $this->set('showLockButton', ($student['0']['Student']['options_locked'] == "1") ? "1" : "0");
        }
        
        public function print_bfs() {
            $this->layout = false;
            $this->set('data_set', 'false');
            $applicants = $this->Applicant->find('all', array(
                    'conditions' => array('Applicant.id' => $this->Session->read('applicant_id'))));
            if(count($applicants) == 0) {
                $this->redirect('/multi_step_form/wizard/first');
                return false;
            }
            $education_arr = $this->Education->find('all', array(
                    'conditions' => array('Education.applicant_id' => $this->Session->read('applicant_id'))));

            $exp_arr = $this->Experience->find('all', array(
                    'conditions' => array('Experience.applicant_id' => $this->Session->read('applicant_id'))));
            $rpaper_arr = $this->Researchpaper->find('all', array(
                    'conditions' => array('Researchpaper.applicant_id' => $this->Session->read('applicant_id'))));
            $rarticle_arr = $this->Researcharticle->find('all', array(
                    'conditions' => array('Researcharticle.applicant_id' => $this->Session->read('applicant_id'))));
            $rproject_arr = $this->Researchproject->find('all', array(
                    'conditions' => array('Researchproject.applicant_id' => $this->Session->read('applicant_id'))));
            $image = $this->Document->find('all', array(
                    'conditions' => array('Document.applicant_id' => $this->Session->read('applicant_id'))));
            $apiscore = $this->ApiScore->find('all', array(
                    'conditions' => array('ApiScore.applicant_id' => $this->Session->read('applicant_id'))));

            //$misc = $this->Applicant->find('all', array(
            //        'conditions' => array('Misc.user_id' => $this->Session->read('applicant_id'))));                
            if(count($applicants) == 0) {
                $this->Session->setFlash('Please complete your form in sequence.');
                return false;
            }		
            if(count($applicants) == 1) {
                //$this->set('postAppliedFor', $this->getPostAppliedFor());
                $this->set('applicant', $applicants['0']);
                $this->set('education_arr', $education_arr);
                $this->set('exp_arr', $exp_arr);
                $this->set('rpaper_arr', $rpaper_arr);
                $this->set('rarticle_arr', $rarticle_arr);
                $this->set('rproject_arr', $rproject_arr);
                $this->set('apiscore', $apiscore['0']);
                //$this->set('miscexp', $miscexp['0']);
                //$this->set('academic_dist', $adacdemic_dist);
                $this->set('image', !empty($image['0']) ? $image['0'] : array());
                //$this->set('researchpapers', $researchpapers);
                //$this->set('researcharticles', $researcharticles);
                //$this->set('misc', $misc['0']);
                $this->set('data_set', 'true');
            }
            else {
                $this->Session->setFlash('An error has occured. Please contact Support.');
                return false;
            }
	}

	public function final_submit() {
		$this->Applicant->id = $this->Session->read('applicant_id');
                if (!empty($this->Applicant->id)) {
                	$this->Applicant->saveField('final_submit', "1");
            	}
		//$this->Session->delete('applicant_id');
            	$this->redirect(array('controller' => 'form', 'action' => 'generalinformation'));
		//$this->redirect(array('controller' => 'users', 'action' => 'logout'));
	}

	function getPostAppliedFor() {
        	$current_post_applied = !empty($this->request->query['post']) ? $this->request->query['post'] : NULL;
        	if (!empty($current_post_applied)) {
            		//$this->set('postAppliedFor', $current_post_applied);
            		$this->Session->write('post_applied_for', $current_post_applied);
            		return $current_post_applied;
        	} else if (!empty($this->Session->read('post_applied_for'))) {
            		//$this->set('postAppliedFor', $this->Session->read('post_applied_for'));
            		return $this->Session->read('post_applied_for');
        	} else {
            		$this->Session->setFlash('Please select a post and then continue.');
            		$this->redirect(array('controller' => 'form', 'action' => 'generalinformation'));
        	}
    	}

}

?>
