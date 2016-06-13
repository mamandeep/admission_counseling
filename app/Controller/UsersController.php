<?php

App::uses('ConnectionManager', 'Model'); 

class UsersController extends AppController {
    
    var $components = array('Captcha.Captcha'=>array('Model'=>'Signup', 
                        'field'=>'security_code'));//'Captcha.Captcha'
    
    var $uses = array('Signup', 'Registereduser', 'Student');
    
    var $coc = array("aman_k2007@hotmail.com");
    var $ozeki_user = "admin";
    var $ozeki_password = "qwe123";
    var $ozeki_url = "http://127.0.0.1:9501/api?";
    var $OTPValidity = "30"; // in minutes
    
    public $helpers = array('Captcha.Captcha');
    
    public $paginate = array(
        'limit' => 25,
        'conditions' => array('status' => '1'),
    	'order' => array('User.username' => 'asc' ) 
    );
	
    public function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allow('login','add','logout'); 
    }
	
    function captcha()  {
        $this->autoRender = false;
        $this->layout='ajax';
        if(!isset($this->Captcha))	{ //if you didn't load in the header
            $this->Captcha = $this->Components->load('Captcha.Captcha'); //load it
        }
        $this->Captcha->create();
    }

	public function login() {
		
		//if already logged-in, redirect
		//if($this->Session->check('Auth.User')){
                $this->redirect(array('action' => 'dashboard'));		
		//}
		
		// if we get the post information, try to authenticate
		/*if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$this->Session->setFlash(__('Welcome, '. $this->Auth->user('username')));
				$this->redirect($this->Auth->redirectUrl());
			} else {
				$this->Session->setFlash(__('Invalid username or password'));
			}
		}*/ 
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
        
        public function dashboard() {
            if(!empty($this->data['User'])){
                /*
                $segments = explode('/', $this->data['User']['dob']);
                if (count($segments) !== 3) {
                    $this->Session->setFlash('Date of Birth is not in correct format.');
                    return false;
                }
                list($dd,$mm,$yyyy) = $segments;
                if (!checkdate((int)$mm,(int)$dd,(int)$yyyy)) {
                    $this->Session->setFlash('Date of Birth is not in correct format.');
                    return false;
                }*/
                if(!filter_var($this->data['User']['email'], FILTER_VALIDATE_EMAIL)) {
                    $this->Session->setFlash('Email Id is not in correct format.');
                    return false;
                }
                $db = ConnectionManager::getDataSource('default');
                $sql = "SELECT * FROM `registered_users` WHERE email = '" . 
                        $this->data['User']['email'] . "' and password = '" . 
                        Security::hash($this->data['User']['password'], null, true) . "'"; //"' and applicant_id = '" .
                        //trim($this->data['User']['applicant_id']) . "'";
                $result = $db->rawQuery($sql);
                $count_r = 0;
                $password_hash = "";
                while ($row = $db->fetchRow()) { 
                    $this->Session->write('registration_id', $row['registered_users']['id']);
                    $this->Session->write('std_id', $row['registered_users']['std_id']);
                    $password_hash = $row['registered_users']['password'];
                    $count_r++;
                }
                
                /*$sql = "SELECT * FROM `applicant` WHERE id = '" . 
                        trim($this->data['User']['applicant_id']) . "'";
                $result = $db->rawQuery($sql);
                $fee_paid = array();
                while ($row = $db->fetchRow()) {
                    $fee_paid[$row['applicant']['id']] = $row['applicant']['response_code'];
                }
                reset($fee_paid);
                $first_key = key($fee_paid);
                if(!(count($fee_paid) === 1 && $fee_paid[$first_key] == "0")) {
                    $this->Session->setFlash(__('Pay fees before login.'));
                    return false;
                }*/
                //print_r($result);
                /*$result = $this->Registereduser->find('all', array(
                        'conditions' => array('Registereduser.email' => $this->data['User']['email'],
                                              'Registereduser.email' => $this->data['User']['dob'])));
                */
                if($count_r == 1) {
                    if(in_array($this->data['User']['email'], $this->coc) && Security::hash($this->data['User']['password'], null, true) == $password_hash) {
                        $this->Session->write('admin', "1");
                    }
                    $this->redirect(array('controller' => 'form', 'action' => 'generalinformation'));
                }
                else if($count_r == 0) {
                    $this->Session->setFlash('Please check the credentials entered below.');
                }
                else {
                    $this->Session->setFlash('Please contact support.');
                }
            }
        }

	public function logout() {
             $this->Session->destroy();
	     $this->redirect(array('action' => 'dashboard'));
             //$this->redirect($this->Auth->logout());
	}

    public function index() {
        $this->paginate = array(
                'limit' => 6,
                'order' => array('User.username' => 'asc' )
        );
        $users = $this->paginate('User');
        $this->set(compact('users'));
    }

    public function forgotpassword() {
        if(!empty($this->data['Registereduser'])) {
            if(!filter_var($this->data['Registereduser']['email'], FILTER_VALIDATE_EMAIL)) {
                $this->Session->setFlash('Email Id is not in correct format.');
                return false;
            }
            
            $registered_user = $this->Registereduser->find('all', array(
                                'conditions' => array('Registereduser.email' => trim($this->data['Registereduser']['email']),
                                                      )));
            
            if(count($registered_user) != 1) {
                $this->Session->setFlash('Please check the email address.');
                return false;
            }
            
            //$this->Session->write('std_id', $registered_user['0']['Registereduser']['std_id']);
            $this->Session->write('registration_id', $registered_user['0']['Registereduser']['id']);
            $_SESSION['otp'] = $this->ozekiOTP();
            //print_r($_SESSION['otp']);
            $date_now = new DateTime();
            $date_now->setTimezone(new DateTimeZone("Asia/Calcutta"));
            //print_r($date_now->format("Y-m-d H:i:s"));
            $this->Registereduser->create();
            $this->Registereduser->set(array('otp_timestamp' => $date_now->format("Y-m-d H:i:s"),
                                    'otp' => $_SESSION['otp']));
            
            $this->Registereduser->id = $this->Session->read('registration_id');
            //print_r($this->Registereduser->data);
            //print_r($this->Registereduser->id);
            $this->Registereduser->save($this->Registereduser->data, false);
            //print_r("otp saved");
            
            $this->request->data = $registered_user['0'];
	
            
            ########################################################            
            ###        SENDING THE PASSWORD AND LOADING          ###
            ###            THE OTP-VERIFYING PAGE                ###
            ########################################################        
            //$this->ozekiSend('+91' . $registered_user['0']['Registereduser']['mobile_no'], 'Dear '.$registered_user['0']['Registereduser']['first_name'].'! Your One-Time password is: '.$_SESSION['otp'], false);
            
            //$response = $this->smsSend(/*$registered_user['0']['Registereduser']['mobile_no']*/ "9463069882", 'Dear '.$registered_user['0']['Registereduser']['first_name'].'! Your One-Time password is: '.$_SESSION['otp']);
            $response = "";
            if($this->is_connected()) {
                $response = $this->smsSend($registered_user['0']['Registereduser']['mobile_no'], 'Dear '.$registered_user['0']['Registereduser']['first_name'].'! Your One-Time password is: '.$_SESSION['otp']);
            }
            else {
                $this->Session->setFlash('OTP could not be sent at this time. Please contact support');
                return false;
            }
            
            if(!empty($response)) {
                $this->Registereduser->create();
                $this->Registereduser->set(array('otp_response' => $response));
                $this->Registereduser->id = $this->Session->read('registration_id');
                $this->Registereduser->save($this->Registereduser->data, false);
            }
            
            $this->redirect(array('controller' => 'users', 'action' => 'changepassword'));
        }
    }
    
    private function is_connected() {
        $connected = @fsockopen("www.smsjust.com", 80);
        $is_conn = false;
        
        if($connected) {
            $is_conn = true;
            fclose($connected);
        }
        else {
            $is_conn = false;
        }
        
        return $is_conn;
    }
    
    public function changepassword() {
        if(!empty($this->data['Registereduser'])) {
            $registered_user = $this->Registereduser->find('all', array(
                                'conditions' => array('Registereduser.id' => $this->Session->read('registration_id'),
                                                      )));
            
            if(count($registered_user) != 1) {
                $this->Session->setFlash('An error occured. Please contact Support.');
                return false;
            }
            
            $ozotp = $this->data['Registereduser']['otp'];
            
            $timeGap = $this->getOTPTimeGap($registered_user);
            
            if( isset($_SESSION['otp']) && $ozotp === $_SESSION['otp'] && ($timeGap <= $this->OTPValidity) && $this->data['Registereduser']['password'] === $this->data['Registereduser']['passwd_confirm'] && $this->Registereduser->save($this->data['Registereduser'])) {
                $this->Registereduser->create();
                $this->Registereduser->set(array('otp_gap' => $timeGap));
                $this->Registereduser->id = $this->Session->read('registration_id');
                $this->Registereduser->save($this->Registereduser->data, false);
                $this->Session->setFlash('Password changed successfully.');
                $this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
            }
            else if($ozotp !== $_SESSION['otp']) {
                $this->Session->setFlash('The OTP entered is not valid.');
                if($timeGap > $this->OTPValidity)
                    unset($_SESSION['otp']);
                return false;
            }
            else if($this->data['Registereduser']['password'] !== $this->data['Registereduser']['passwd_confirm']) {
                $this->Session->setFlash('The passwords did not match.');
                return false;
            }
            else {
                $this->Session->setFlash('There was an error in changing the password. Please contact support.');
                return false;
            }
        }
    }
    
    private function getOTPTimeGap($reg_user){
        $generted_time = new DateTime($reg_user['0']['Registereduser']['otp_timestamp'], new DateTimeZone("Asia/Calcutta"));
        $now = new DateTime();
        
        $diff = $now->diff($generted_time);
        
        $hours = $diff->h;
        $hours = $hours + ($diff->days * 24);
        $minutes = $diff->i;
        $minutes = $minutes + ($hours * 60);
        
        return $minutes;
        
    }
    
    private function httpRequest($url){
        $pattern = "/http...([0-9a-zA-Z-.]*).([0-9]*).(.*)/";
        print_r($url);
        preg_match($pattern,$url,$args);
        print_r($args);
        $in = "";
        $fp = fsockopen("$args[1]", $args[2], $errno, $errstr, 30);
        if (!$fp) {
           return("$errstr ($errno)");
        } else {
            $out = "GET /$args[3] HTTP/1.1\r\n";
            $out .= "Host: $args[1]:$args[2]\r\n";
            $out .= "User-agent: Ozeki PHP client\r\n";
            $out .= "Accept: */*\r\n";
            $out .= "Connection: Close\r\n\r\n";

            fwrite($fp, $out);
            while (!feof($fp)) {
               $in.=fgets($fp, 128);
            }
        }
        fclose($fp);
        return($in);
    }
    
    private function ozekiSend($phone, $msg, $debug=false){
        global $ozeki_user,$ozeki_password,$ozeki_url;
        $url = 'username='. $this->ozeki_user;
        $url.= '&password='. $this->ozeki_password;
        $url.= '&action=sendmessage';
        $url.= '&messagetype=SMS:TEXT';
        $url.= '&recipient='.urlencode($phone);
        $url.= '&messagedata='.urlencode($msg);

        $urltouse =  $this->ozeki_url.$url;
        //if ($debug) { echo "Request: <br>$urltouse<br><br>"; }

        //Open the URL to send the message
        $response = $this->httpRequest($urltouse);
        if ($debug) {
             echo "Response: <br><pre>".
             str_replace(array("<",">"),array("&lt;","&gt;"),$response).
             "</pre><br>"; }
        return($response);
    }
    
    private function smsSend($mobile_no, $message) {
        //$username = urlencode("u1810"); 
        $username = urlencode("cuplib"); 
        $password = urlencode("cuplib@123");
        //$msg_token = urlencode("fP9oW6"); 
        //$sender_id = urlencode("BBSBEC"); // optional (compulsory in transactional sms) 
        $sender_id = urlencode("CUPEXM");
        $message = urlencode($message); 
        $mobile = urlencode($mobile_no); 

        //$api = "http://manage.sarvsms.com/api/send_transactional_sms.php?username=".$username."&msg_token=".$msg_token."&sender_id=".$sender_id."&message=".$message."&mobile=".$mobile.""; 

        $api = "http://www.smsjust.com/sms/user/urlsms.php?username=".$username."&pass=".$password."&senderid=".$sender_id."&dest_mobileno=".$mobile."&message=".$message."&response=Y";
        $response = file_get_contents($api);

        return $response; 
    }
    
    public function post() {
        $username = urlencode("u1810"); 
        $msg_token = urlencode("fP9oW6"); 
        $sender_id = urlencode("BBSBEC"); // optional (compulsory in transactional sms) 
        $message = urlencode($message); 
        $mobile = urlencode($mobile_no); 

        $api = "http://manage.sarvsms.com/api/send_transactional_sms.php?username=".$username."&msg_token=".$msg_token."&sender_id=".$sender_id."&message=".$message."&mobile=".$mobile.""; 
        $ACTION_URL = "http://203.129.203.243/sms/user/XMLAPI/send.php";
        $this->set('ACTION_URL',$ACTION_URL);
        $data = "<message-submit-request>
            <username>".$username."</username>
            <password>XXXXXX</password>
            <sender-id>".$sender_id."</sender-id>
            <MType>TXT</MType>
            <message-text>
            <text>hi test message 1</text>
            <to>9890XXXXXX</to>
            </message-text>
            <message-text>
            <text>hi test message 2</text>
            <to>9823XXXXXX</to>
            </message-text>
            <message-text>
            <text>hi test message 3</text>
            <to>9375XXXXXX</to>
            </message-text>
            </message-submit-request>";
        $this->set('data', $data);
    }
    
    private function ozekiOTP($length = 8, $chars = 'abcdefghijklmnopqrstuvwxyz1234567890')
    {
        $chars_length = (strlen($chars) - 1);
        $string = $chars{rand(0, $chars_length)};
        for ($i = 1; $i < $length; $i = strlen($string))
        {
            $r = $chars{rand(0, $chars_length)};
            if ($r != $string{$i - 1}) $string .=  $r;
        }
        return $string;
        
    }
    /*public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('The user has been created'));
                    $this->redirect(array('action' => 'login'));
            } else {
                    $this->Session->setFlash(__('The user could not be created. Please, try again.'));
            }	
        }
    }

    private function edit($id = null) {

		    if (!$id) {
				$this->Session->setFlash('Please provide a user id');
				$this->redirect(array('action'=>'index'));
			}

			$user = $this->User->findById($id);
			if (!$user) {
				$this->Session->setFlash('Invalid User ID Provided');
				$this->redirect(array('action'=>'index'));
			}

			if ($this->request->is('post') || $this->request->is('put')) {
				$this->User->id = $id;
				if ($this->User->save($this->request->data)) {
					$this->Session->setFlash(__('The user has been updated'));
					$this->redirect(array('action' => 'edit', $id));
				}else{
					$this->Session->setFlash(__('Unable to update your user.'));
				}
			}

			if (!$this->request->data) {
				$this->request->data = $user;
			}
    }

    private function delete($id = null) {
		
		if (!$id) {
			$this->Session->setFlash('Please provide a user id');
			$this->redirect(array('action'=>'index'));
		}
		
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('Invalid user id provided');
			$this->redirect(array('action'=>'index'));
        }
        if ($this->User->saveField('status', 0)) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
	
	public function activate($id = null) {
		
		if (!$id) {
			$this->Session->setFlash('Please provide a user id');
			$this->redirect(array('action'=>'index'));
		}
		
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('Invalid user id provided');
			$this->redirect(array('action'=>'index'));
        }
        if ($this->User->saveField('status', 1)) {
            $this->Session->setFlash(__('User re-activated'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not re-activated'));
        $this->redirect(array('action' => 'index'));
    }*/

}

?>