<?php

class FormController extends AppController {

    //var $components = array('Captcha.Captcha'=>array('Model'=>'Signup', 
    //                    'field'=>'security_code'));//'Captcha.Captcha'

    var $uses = array('Registereduser', 'Student','Choice','Branch', 'Document', 'Subject','BranchSubject');                
    
    public $helpers = array('SMS');
    
    
    
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
	


    
    
    public function generalinformation() {
           //$applicants = $this->Applicant->find('all', array(
           //     'conditions' => array('Applicant.id' => $this->Session->read('applicant_id'))));
            //if (count($applicants) == 1 ) {
            //    $this->set('applicant', $applicants['0']);
            //}
    }
    
    private function isClosed() {
        $current_datetime = new DateTime();
        $current_datetime->setTimezone(new DateTimeZone('Asia/Calcutta'));
        $close_datetime = new DateTime("2016-06-28 23:59:59", new DateTimeZone('Asia/Calcutta'));
        
        //print_r($current_datetime->format('Y-m-d-H-i-s'));
        //print_r($close_datetime->format('Y-m-d-H-i-s'));
        
        if ($current_datetime > $close_datetime) {
            //exit("The Application Form is closed at this time.");
            //if($current_datetime > $close_datetime) { 
                $this->Session->setFlash('Application Form is closed. Please click on Seat Allocation.');
                return true;
            //}
            //$this->redirect(array('controller' => 'users', 'action' => 'logout'));
        }
        
        return false;
    }
    
    private function isSeatAllocationClosed() {
        $current_datetime = new DateTime();
        $current_datetime->setTimezone(new DateTimeZone('Asia/Calcutta'));
        $close_datetime = new DateTime("2016-07-20 23:59:59", new DateTimeZone('Asia/Calcutta'));
        
        //print_r($current_datetime->format('Y-m-d-H-i-s'));
        //print_r($close_datetime->format('Y-m-d-H-i-s'));
        
        if ($current_datetime > $close_datetime) {
            //exit("The Application Form is closed at this time.");
            //if($current_datetime > $close_datetime) { 
                $this->Session->setFlash('Application Form is closed. Seat Allocation is closed');
                return true;
            //}
            //$this->redirect(array('controller' => 'users', 'action' => 'logout'));
        }
        
        return false;
    }
        
        
        
        public function studentdetails() {
            if($this->isClosed()) {
                $this->redirect(array('controller' => 'form', 'action' => 'generalinformation'));
            }
            
            $student = $this->Student->find('all', array(
                    'conditions' => array('Student.id' => $this->Session->read('std_id'))));
            
            if(!empty($this->data['Student'])) {
                $this->Student->create();
                $this->Student->id = $student['0']['id'];
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
            
            $this->request->data = $student['0'];
            $this->Session->write('eligible_for_payment',$student['0']['Student']['eligible_for_payment']);
            //$this->set('dbYear', $student['0']['Student']['year_of_cucet']);
            //$this->set('ug_result', $student['0']['Student']['ug_result']);
            //$this->set('pwd', $student['0']['Student']['pwd']);
            //$this->set('bgroup', $student['0']['Student']['blood_group']);
            $this->set('hostel_acco', $student['0']['Student']['hostel_accommodation']);
        }
        
        public function uploaddocuments() {
            if($this->isClosed()) {
                $this->redirect(array('controller' => 'form', 'action' => 'generalinformation'));
            }
            if(!empty($this->data['Document'])) {
                if(!empty($this->data['Document']['filename']['error']) && $this->data['Document']['filename']['error'] == 4
                && !empty($this->data['Document']['filename2']['error']) && $this->data['Document']['filename2']['error'] == 4
                && !empty($this->data['Document']['filename3']['error']) && $this->data['Document']['filename3']['error'] == 4
                && !empty($this->data['Document']['filename4']['error']) && $this->data['Document']['filename4']['error'] == 4
                && !empty($this->data['Document']['filename6']['error']) && $this->data['Document']['filename6']['error'] == 4
               )
                return true;

                if ($this->Document->save($this->data['Document'])) {
                    $this->Session->setFlash('Your documents have been submitted successfully.');
                    $this->redirect(array('controller'=>'form', 'action' => 'previewdocuments'));
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
            
             if(count($images) > 1) { 
                 $this->Session->setFlash('An error has occured in uploading documents. Please contact Support.'); 
                 return false; 
             } 
             else if(count($images) == 0) { 
                 $this->Document->create(); 
                 $this->Document->set(array( 
                     'std_id' => $this->Session->read('std_id'))); 
                 $this->Document->save(); 
                 $this->Document->id = $this->Document->getLastInsertId(); 
                 $images = $this->Document->find('all', array(
                    'conditions' => array('Document.std_id' => $this->Session->read('std_id')))); 
             } 
             
            $this->request->data = $images['0'];
            
        }
        
        public function previewdocuments() {
            if($this->isClosed()) {
                $this->redirect(array('controller' => 'form', 'action' => 'generalinformation'));
            }
            $images = $this->Document->find('all', array(
                    'conditions' => array('Document.std_id' => $this->Session->read('std_id'))));
            
            if(count($images) == 1) {
                //$this->request->data = $images['0'];
                if(empty($images['0']['Document']['filename']) 
                    || empty($images['0']['Document']['filename2'])
                    || empty($images['0']['Document']['filename4']))
                {
                    if(empty($images['0']['Document']['filename']))
                        $this->Session->setFlash('Photograph is compulsory');
                    if(empty($images['0']['Document']['filename2']))
                        $this->Session->setFlash('Date of Birth certificate is compulsory');
                    if(empty($images['0']['Document']['filename4']))
                        $this->Session->setFlash('Signature is compulsory');
                    $this->redirect(array('controller'=>'form', 'action' => 'uploaddocuments'));
                }
                $this->set('image', $images['0']);
                //print_r($this->request->data);
            }
            else if(count($images) > 1) {
                $this->Session->setFlash('An error has occured. Please contact Support.');
            }
            else {
                $this->Session->setFlash('Upload the mandatory documents');
                $this->redirect(array('controller'=>'form', 'action' => 'uploaddocuments'));
            }
        }
        
        public function prepayment() {
        if (!empty($this->data['Student'])) { 
            $std_id = trim($this->data['Student']['id']);
            $student = $this->Student->find('all', array(
                'conditions' => array('Student.id' => $std_id)));
            if (count($student) != 1) {
                $this->Session->setFlash('An error occurred. Please contact support.');
                return false;
            } 
            
            if($this->Student->save($this->data, false)) {
                // redirect to online or rtgs depending upon value
                if($this->data['Student']['payment_mode'] === "Online (Credit Card/Debit Card/Netbanking)") {
                    $this->redirect(array('controller' => 'form', 'action' => 'prepay'));
                }
                else if($this->data['Student']['payment_mode'] === "RTGS"){
                    $this->redirect(array('controller' => 'form', 'action' => 'rtgs'));
                }
                else {
                    $this->Session->setFlash('Please select a value.');
                    return false;
                }
            }
            else {
                $this->Session->setFlash('There was an error in submitted data.');
                return false;
            }
        }
        
        $student = $this->Student->find('all', array(
                            'conditions' => array('Student.id' => $this->Session->read('std_id'))));
        
        $images = $this->Document->find('all', array(
                    'conditions' => array('Document.std_id' => $this->Session->read('std_id'))));
        //print_r($student['0']['Student']['payment_mode']); return false;
        if($student['0']['Student']['response_code'] == "0" || (!empty($student['0']['Student']['payment_mode']) && $student['0']['Student']['payment_mode'] != "NULL" && !empty($student['0']['Student']['rtgs_ac_no']) && !empty($images['0']['Document']['filename5']))) {
            $this->Session->setFlash('Payment process is complete.');
            $this->redirect(array('controller' => 'form', 'action' => 'generalinformation'));
        }
        $this->request->data = $student['0'];
        /*else if(strcmp(Router::url(array('controller' => 'Form','action' => 'register'), true), $this->referer()) !== 0) {
            $this->Session->setFlash('Details entered are not complete.');
            return false;
        }*/
    }

    public function rtgs() {
        $student = $this->Student->find('all', array(
                            'conditions' => array('Student.id' => $this->Session->read('std_id'))));
        
        $registered_user = $this->Registereduser->find('all', array(
                                'conditions' => array('Registereduser.std_id' => $this->Session->read('std_id'),
                                                      )));
        //print_r($this->Session->read('seat_allocated'));
        if(!empty($this->data['Document'])) {
                if(!empty($this->data['Document']['filename5']['error']) && $this->data['Document']['filename5']['error'] == 4) {
                $this->Session->setFlash('There was an error in uploading the document.');
                    return true;
                }
                
                

                if ($this->Document->save($this->data['Document'])) {
                    $this->Student->create();
                    $this->Student->id = $student['0']['Student']['id'];
                    if (!empty($this->Student->id)) {
                        $arr = explode(":", $this->Session->read('seat_allocated'));
                        $this->Student->set(array(  'sa_category' => $arr[1],
                                                    'seat_allocated' => $arr[0]));
                        if($this->Student->save($this->Student->data, false)) {
                            //print_r("Record Saved");
                            $this->Session->setFlash('Your document has been submitted successfully. Seat has been allocated to you.');
                            
                            if($this->is_connected()) {
                                $response = $this->smsSend($registered_user['0']['Registereduser']['mobile_no'], 'You have been proviosionally allocated seat in '.$arr[0].' for CUP cousnelling 2016-17');
                            }
                            $this->redirect(array('controller' => 'form', 'action' => 'generalinformation'));
                        }
                        else {
                            $this->Session->setFlash('An error has occured in seat allocation. Please contact support.');
                        }
                    }
                    //$this->redirect(array('controller'=>'form', 'action' => 'generalinformation'));
                }
                
                return false;
            }
            
            /*$param ="";
            if(isset($this->params['url']['ct'])) 
                $param = $this->params['url']['ct'];
            if($param == "1") {
                $this->redirect(array('controller'=>'form', 'action' => 'previewdocuments'));
            }*/
            
            $images = $this->Document->find('all', array(
                    'conditions' => array('Document.std_id' => $this->Session->read('std_id'))));
            
            if(count($images) == 1) {
                $this->request->data = $images['0'];
            }
            else if(count($images) > 1) {
                $this->Session->setFlash('An error has occured. Please contact Support.');
            }
    }
    
    public function rtgschallan() {
        $student = $this->Student->find('all', array(
                            'conditions' => array('Student.id' => $this->Session->read('std_id'))));
        //print_r($this->Session->read('seat_allocated'));
        /*$param ="";
        if(isset($this->params['url']['ct'])) 
            $param = $this->params['url']['ct'];
        if($param == "1") {
            $this->redirect(array('controller'=>'form', 'action' => 'previewdocuments'));
        }*/

        $this->set('student', $student['0']);
        $images = $this->Document->find('all', array(
                'conditions' => array('Document.std_id' => $this->Session->read('std_id'))));

        if(count($images) == 1) {
            $this->request->data = $images['0'];
        }
        else if(count($images) > 1) {
            $this->Session->setFlash('An error has occured. Please contact Support.');
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
                $arr = array("General", "SC", "ST", "OBC");
                $student = $this->Student->find('all', array(
                            'conditions' => array('Student.id' => $this->Session->read('std_id'))));
                if(!in_array($student['0']['Student']['category'], $arr)) {
                    $this->Session->setFlash('Please complete the Personal Details section before payment.');
                    $this->redirect(array('controller' => 'form', 'action' => 'studentdetails'));
                }
                $amount = array('L.L.M' => '8025',
                            'M.A. Education' => '8025',
                            'M.Ed.' => '12520', 
                            'M.A. English' => '8025',
                            'M.A. Hindi' => '8025',
                            'M.A. Punjabi' => '8025',
                            'M.A. History' => '8025',
                            'M.A. Music (Vocal)' => '8025',
                            'M.A. Music (Instrumental)' => '8025',
                            'M.A. Fine Arts' => '8025',
                            'M.A. Theatre' => '8025',
                            'M.A. Geography' => '8025',
                            'M.Sc. Geography' => '8025',
                            'M.A. Sociology' => '8025',
                            'M.Sc. Life Sciences (Specialization in Human Genetics)' => '9530',
                            'M.Sc. Life Sciences (Specialization in Molecular Medicine)' => '9530',
                            'M.Sc. Life Sciences (Specialization in Biochemistry)' => '9530',
                            'M.Sc. Life Sciences (Specialization in Mirobial Sciences)' => '9530',
                            'M.Sc. Life Sciences (Specialization in Animal Sciences)' => '9530',
                            'M.Sc. Life Sciences (Specialization in Plant Sciences)' => '9530',
                            'M.Sc. Life Sciences (Specialization in Bioinformatics)' => '9530',
                            'M.Pharm. Pharmaceutical Sciences (Medicinal Chemistry)' => '14245',
                            'M.Pharm. Pharmaceutical Sciences (Pharmacognosy and Phytochemistry)' => '14245',
                            'M.Sc. Chemistry (Computational Chemistry)' => '9530',
                            'M.Sc. Chemical Sciences (Medicinal Chemistry)' => '9530',
                            'M.Sc. Chemistry' => '9530',
                            'M.Sc. Mathematics' => '9530',
                            'M.Sc. Physics (Computational Physics)' => '9530',
                            'M.Sc. Physics' => '9530',
                            'M.Sc. Statistics' => '9530',
                            'M.Sc. Sports Science' => '9530',
                            'M.Tech. Computer Science and Technology' => '14245',
                            'M.Tech. Computer Science and Technology (Cyber Security)' => '9530',
                            'M.Sc. in Environment Science and Technology' => '9530',
                            'M.Tech. Food Technology' => '9530',
                            'MBA. Agribussiness' => '12640',
                            'M.A. Political Science' => '8025',
                            'M.A. Economics' => '8025',
                            'M.Sc. Geology' => '9530');
                $arr = explode(":", $this->Session->read('seat_allocated'));
                $fee = $amount[$arr[0]];
                if($student['0']['Student']['category'] == "SC" || $student['0']['Student']['category'] == "ST" 
                        || $student['0']['Student']['pwd'] == "Yes") {
                        $this->set('app_fee', $fee);
                        $this->Session->write('payment_amount', $fee);
                }
                else {
                        $this->set('app_fee', $fee);
                        $this->Session->write('payment_amount', $fee);
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
			//print_r("Started");
			$secureHash = strtoupper(hash($HASHING_METHOD , $hashData));
	
			if($secureHash == $_POST['SecureHash']){
				//print_r($_POST);
				if($_POST['ResponseCode'] == 0){
					// update response and the order's payment status as SUCCESS in to database
					//print_r("Entered Here");
                                    $registered_user = $this->Registereduser->find('all', array(
                                                                        'conditions' => array('Registereduser.std_id' => $this->Session->read('std_id'),
                                                                                              )));
					$this->Student->create();
            				$this->Student->id = $this->Session->read('std_id');
                                        $arr = explode(":", $this->Session->read('seat_allocated'));
					$this->Student->set(array('response_code' => $_POST['ResponseCode'],
								    'payment_date_created' => $_POST['DateCreated'],
								    'payment_id' => $_POST['PaymentID'],
								    'payment_amount' => $_POST['Amount'],
								    'payment_transaction_id' => $_POST['TransactionID'],
                                                                    'seat_allocated' => $arr[0],
                                                                    'sa_category' => $arr[1]));
            				if ($this->Student->id) {
                                            if($this->Student->save($this->Student->data, false)) {
                                                //print_r("Record Saved");
                                                if($this->is_connected()) {
                                                    $response = $this->smsSend($registered_user['0']['Registereduser']['mobile_no'], 'You have been proviosionally allocated seat in '.$arr[0].' for CUP cousnelling 2016-17');
                                                }
                                                $this->Session->setFlash('Your payment has been successfull. Seat has been allocated to you.');
                                                }
                                                else {
                                                        //print_r("Error in Record Saving");
                                                }
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
				//echo '<h1>Error!</h1>';
				//echo '<p>Hash validation failed</p>';
                            $this->set('error_mesg', "Hash validation failed");
			}
		} else {
			//echo '<h1>Error!</h1>';
			//echo '<p>Invalid response</p>';
                        $this->set('error_mesg', "Invalid response.");
		}
	}

	public function options() {
            if($this->isClosed()) {
                $this->redirect(array('controller' => 'form', 'action' => 'generalinformation'));
            }
            $student = $this->Student->find('all', array(
                            'conditions' => array('Student.id' => $this->Session->read('std_id'))));
            $choice_arr = $this->Choice->find('all', array(
                    'conditions' => array('Choice.std_id' => $this->Session->read('std_id')),
                    'order' => array('Choice.pref_order ASC')));
            $choice_data = array();
            foreach($choice_arr as $key => $value) {
                //$educationId_arr[$key] = $value['Education']['id'];
                $choice_data[$key] = $choice_arr[$key]['Choice'];
            }
            /*if(!empty($student['0']['Student']['response_code']) && $student['0']['Student']['response_code'] == "0") {
                $this->Session->setFlash('Payment not completed.');
                $this->redirect(array('controller' => 'form', 'action' => 'prepay'));
            }*/
            
            //$this->Session->write('options_locked', $student['0']['Student']['options_locked']);
            //$this->set('optionsLocked', ($student['0']['Student']['options_locked'] == "1") ? "1" : "0");
            
            if(!empty($this->data['Choice'])) {
                /*if(!empty($this->data['modified']) && $this->data['modified'] == 'true') {
                    $choices = $this->Choice->deleteAll( array('Choice.std_id' => $this->Session->read('std_id')));
                }*/
                //print_r($this->data['Choice']);
                $foundEmpty = false;
                //print_r($this->data['Choice']); return false;
                foreach ($this->data['Choice'] as $key => $value) {
                    if($this->data['Choice'][$key]['subject'] === "- select -") {
                        $foundEmpty = true;
                    }
                    if($foundEmpty === true && $this->data['Choice'][$key]['subject'] !== "- select -") {
                        $this->Session->setFlash('Please fill the preferences in order.');
                        $this->request->data = array('Choice' => $choice_data);
                        return false;
                    }
                    if(count($choice_arr) === 5) {
                        $this->request->data['Choice'][$key]['id'] = $choice_arr[$key]['Choice']['id'];
                    }
                }
                //print_r($this->data['Choice']);
                if($this->Choice->saveMany($this->data['Choice'])) { 
                    //return false;
                    $this->redirect(array('controller' => 'form', 'action' => 'printoptions'));
                    //return true;
                }
                else {
                    $this->Session->setFlash('There was an error in saving the preferences. Please contact Support.');
                    return false;
                }
                
                //return false;
            }
            //$temp = $this->Session->read('applicant_id');
            
            //$misc = $this->Applicant->find('all', array(
            //        'conditions' => array('Applicant.id' => $this->Session->read('applicant_id'))));
            //print_r($this->Session->read('applicant_id'));
            //if(count($education_arr) == 7 || count($education_arr) == 12) {
                //$this->request->data = $education_arr;
            //$educationId_arr = array();
            
            
            //$branchlist = $this->Branch->find('list', array(
            //                                    'conditions' => array(
            //                                        'college_code' => 1
            //                                    ),    
            //                                    'fields' => array('Branch.branch_code','Branch.branch_name')));
            //$subjectlist = $this->Subject->find('list', array(
            //                                    'conditions' => array(
            //                                        'college_code' => 1
            //                                    ),    
            //                                    'fields' => array('Subject.subject_code','Subject.subject_name')));
            
            //$subjectbranch = $this->BranchSubject->find('list', array(    
            //                                    'fields' => array('BranchSubject.subject_code','BranchSubject.branch_code')));
            //foreach ($branchlist as $key)
            $this->request->data = array('Choice' => $choice_data);
            //$this->set('branchArr', $branchlist);
            //$this->set('subjectArr', $subjectlist);
            //$this->set('subjectBrArr', $subjectbranch);
        }
        
        public function printoptions() {
            if($this->isClosed()) {
                $this->redirect(array('controller' => 'form', 'action' => 'generalinformation'));
            }
            //print_r($this->data);
            $student = $this->Student->find('all', array(
                            'conditions' => array('Student.id' => $this->Session->read('std_id'))));
            
            //$this->Session->write('options_locked', $student['0']['Student']['options_locked']);
            
            $choice_arr = $this->Choice->find('all', array(
                                    'conditions' => array('Choice.std_id' => $this->Session->read('std_id')),
                                    'order' => array('Choice.pref_order ASC')));
            $image = $this->Document->find('all', array(
                    'conditions' => array('Document.std_id' => $this->Session->read('std_id'))));
            
            if(count($image) > 1) {
                $this->Session->setFlash('An error occurred in uploading documents. Please contact support.');
                return false;
            }
            else if(count($image) == 0) {
                $this->Session->setFlash('Documents not uploaded.');
                $this->redirect(array('controller' => 'form', 'action' => 'uploaddocuments'));
            }
            
            if(count($choice_arr) == 0) {
                $this->Session->setFlash('No Preferences given.');
                $this->redirect(array('controller' => 'form', 'action' => 'options'));
            }
            
            $choice_data = array();
            foreach($choice_arr as $key => $value) {
                $choice_data[$key] = $choice_arr[$key]['Choice'];
            }
            
            $this->request->data = array('Choice' => $choice_data);
            $this->set('student',$student['0']);
            $this->set('image', $image['0']);
            $this->set('data_set', 'true');
            
        }
        
        public function seatallocation() {
            
            //print_r(gmdate("Y-m-d\TH:i:s\Z")); 
            //print_r($this->data);
            if($this->isSeatAllocationClosed()) {
                $this->redirect(array('controller' => 'form', 'action' => 'generalinformation'));
            }
            $student = $this->Student->find('all', array(
                            'conditions' => array('Student.id' => $this->Session->read('std_id'))));
            if(!empty($this->data['Student'])) {
                //$this->Student->id = $student['0']['id'];
                //if (!empty($this->Student->id)) {
                if(empty($student['0']['Student']['seat_allocated']) ||  trim($student['0']['Student']['seat_allocated']) == "") {
                    $this->Session->write('seat_allocated', $this->data['Student']['seat_allocated']);
                    $this->Choice->create();
                    $arr = explode(":", $this->data['Student']['seat_allocated']);
                    $db = $this->Choice->getDataSource();
                    $seat = $db->value($arr[0], 'string');
                    $category = $db->value($arr[1], 'string');
                    if($this->Choice->updateAll(array( 'seat_allocated_bef_payment' => $seat,
                                                       'sa_category' => $category),
                                             array('std_id' => $this->Session->read('std_id'),
                                                   'seat_allocated' => '1',
                                                   'preference' => $arr[0]))) {
                        $rowsUpdated = $this->Choice->getAffectedRows();
                        if($rowsUpdated > 0) {
                            $this->redirect(array('controller' => 'form', 'action' => 'prepayment'));
                        }
                        else {
                            $this->Session->setFlash('There was an error in preprocess. Please contact Support.');
                            return false;
                        }
                    }
                    else {
                        $this->Session->setFlash('There was an error in preprocess. Please contact Support.');
                        return false;
                    }
                }
                else {
                    $registered_user = $this->Registereduser->find('all', array(
                                                            'conditions' => array('Registereduser.std_id' => $this->Session->read('std_id'),
                                                                                  )));
                    $this->Student->create();
                    $this->Student->id = $this->Session->read('std_id');
                    $arr = explode(":", $this->data['Student']['seat_allocated']);
                    $this->Student->set(array(  'seat_shifted' => gmdate("Y-m-d H:i:s"),
                                                'seat_allocated' => $arr[0],
                                               'sa_category' => $arr[1]));
                    if ($this->Student->id) {
                        if($this->Student->save($this->Student->data, false)) {
                            $this->Session->setFlash('You have been provisionally allocated seat in ' . $arr[0]);
                            if($this->is_connected()) {
                                $response = $this->smsSend($registered_user['0']['Registereduser']['mobile_no'], 'You have been proviosionally allocated seat in '.$arr[0].' for CUP cousnelling 2016-17');
                            }
                            $this->redirect(array('controller' => 'form', 'action' => 'generalinformation'));
                        }
                        else {
                            $this->Session->setFlash('There was an error in saving the choice. Please contact Support.');
                        }
                    }
                }
                //}
            }
            //$this->Session->write('options_locked', $student['0']['Student']['options_locked']);
            
            $choice_arr = $this->Choice->find('all', array(
                                    'conditions' => array('Choice.std_id' => $this->Session->read('std_id'),
                                                          'Choice.seat_allocated' => '1',
'Choice.counselling_no' => '1',
'Choice.cycle_no' => '2'),
                                    'order' => array('Choice.pref_order ASC')));
            
            $image = $this->Document->find('all', array(
                    'conditions' => array('Document.std_id' => $this->Session->read('std_id'))));
            //print_r($this->Session->read('std_id')); print_r(count($choice_arr)); print_r(count($image));
            if(count($choice_arr) != 0) {
                //$this->Session->setFlash('No Preferences given.');
                //$this->redirect(array('controller' => 'form', 'action' => 'options'));
            
                $choice_data = array();
                foreach($choice_arr as $key => $value) {
                    $choice_data[$key] = $choice_arr[$key]['Choice'];
                }

                $this->request->data = array('Choice' => $choice_data);
                $this->set('student',$student['0']);
                $this->set('image', $image['0']);
                $this->set('data_set', 'true');
            }
            else {
                $this->set('data_set', 'false');
            }
            
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
            if($this->isClosed()) {
                $this->redirect(array('controller' => 'form', 'action' => 'generalinformation'));
            }
		$this->Student->id = $this->Session->read('std_id');
                $registered_user = $this->Registereduser->find('all', array(
                                'conditions' => array('Registereduser.std_id' => $this->Session->read('std_id'),
                                                      )));
                if (!empty($this->Student->id)) {
                    $this->Student->saveField('final_submit', 1);
                    if($this->is_connected()) {
                        $response = $this->smsSend($registered_user['0']['Registereduser']['mobile_no'], 'Your application form has been successfully received with Applicant ID '.$this->Session->read('std_id').' for CUP cousnelling 2016-17');
                    }
                    $this->redirect(array('controller' => 'form', 'action' => 'printoptions'));
            	}
                else {
                    $this->Session->setFlash('Your session is invalid.');
                    $this->redirect(array('controller' => 'users', 'action' => 'logout'));
                }
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
