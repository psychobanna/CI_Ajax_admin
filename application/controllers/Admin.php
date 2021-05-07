<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	// Dashboad

	public function index()
	{
		$this->checklogin();
		$this->load->view("admin/index");
	}

	// Login
	public function login(){
		$this->checklogout();
		$this->load->view("admin/login");

			delete_cookie('message'); 
			delete_cookie('alert'); 
	}

	// Logout
	public function logout(){
		$cookie = $this->session->admincookie;
		if($this->session->admincookie['rem-me'] == 1){
			print_r($this->session->admincookie);

			$usernamecookie = array( 
				'name'=>'username',
				'value' => $this->session->admincookie['username'],
				'expire' => '86500',
				'secure' => TRUE
			);

			$passwordcookie = array( 
				'name'=>'password',
				'value' => $this->session->admincookie['password'],
				'expire' => '86500',
				'secure' => TRUE
			);

			$this->input->set_cookie($usernamecookie);
			$this->input->set_cookie($passwordcookie);
		}else{
			delete_cookie('username'); 
			delete_cookie('password'); 
		}

		$this->session->admin = "";
		$this->session->admincookie = "";
		$this->checklogin();
	}

	// Register
	public function register(){
		$this->checklogout();
		$this->load->view("admin/register");
	}

	// Forgot Password
	public function forgotpassword(){
		$this->checklogout();
		$this->load->view("admin/forgotpassword");
	}

	// change password
	public function changepassword(){
		$this->load->view("admin/changepassword");
	}

	// Error
	public function error_404(){
		$this->load->view("admin/error404.php");
	}


	// Check login
	public function checklogin(){
		if($this->session->admin == ""){
			redirect(base_url()."panel/login");
		}
	}
	// check logout
	public function checklogout(){
		if($this->session->admin != ""){
			redirect(base_url()."panel");
		}
	}

	public function confirmpassword($id="",$s=""){
		
		$table = 'admindata';
		$where = array('asecuirtycode' => $s, 'aid'=> $id);
		$count = $this->query->get_row_count($table,$where);

		if($count == 1){

			$data = $this->query->get_single_row($table,$where)[0];

			$newpass = strtolower(str_replace(' ', '',$data->afname.$data->asecuirtycode));

			$query = array(
				'apass' => md5($newpass)
			);

			if($this->query->update_data($table,$query,$where)){
				$this->email->from('sumer@gmail.com', 'Your Name');
				$this->email->to('sumersingh1997.ssh@gmail.com');
				// $this->email->cc('another@another-example.com');
				// $this->email->bcc('them@their-example.com');

				$this->email->subject('Email Test');
				$msg = '<p>Your new password is <b>'.$newpass.'</b></p>';

				$this->email->message($msg);

				if($this->email->send()){
		        	$msg = ["alert"=>"success","message"=>"Password sent"];
				}else{
		        	$msg = ["alert"=>"danger","message"=>"Password not sent"];

				}
			}else{
				$msg = ["alert"=>"danger","message"=>"Password Not updated"];
			}


		}else{
			$msg = ["alert"=>"danger","message"=>"Linked Expired"];
		}

			
			$flashmessage = array( 
				'name'=>'message',
				'value' => $msg['message'],
				'expire' => '600',
				'secure' => TRUE
			);

			$this->input->set_cookie($flashmessage);

			$flashalert = array( 
				'name'=>'alert',
				'value' => $msg['alert'],
				'expire' => '600',
				'secure' => TRUE
			);

			$this->input->set_cookie($flashalert);

			redirect(base_url("panel"));
	}
	// Add User
	public function role(){
		$this->checklogin();
		if($this->session->admin->arole == '1'){
			$table = 'adminrole';
			$data = array("alluserrole"=>$this->query->get_data($table));
			$this->load->view("admin/role",$data);
		}else{
			echo "Only master admin is allowed";
		}
	}

    	
		public function viewusers(){
 			if($this->session->admin->arole == '1'){
				$this->checklogin();
				$table = "admindata";
				$data = array( 'alluser' => $this->query->get_data($table));
				$this->load->view("admin/viewusers",$data);
			}else{
				echo "Only master admin is allowed";
			}
		}

		public function edituser($id=""){
				$this->checklogin();
 			if($this->session->admin->arole == '1'){
				$table = 'admindata';
				$where = array('aid' => $id);
				$data = array("userdata" => $this->query->get_single_row($table,$where)[0]);
				$this->load->view("admin/edituser",$data);
			}else{
				echo "Only master admin is allowed";
			}
		}

	// Action submit
	public function action(){

		$data = $this->input->post();

		switch ($data['action']) {
			case 'login':
				$table = 'admindata';
				// Check username
				$logindata = array('ausername' => $data['username']);
				$count = $this->query->get_row_count($table,$logindata);
				if($count == 1){

					$logindata1 = array('ausername' => $data['username'], 'apass' => md5($data['password']));
					$count = $this->query->get_row_count($table,$logindata1);
					if($count == 1){

						$logindata = array('ausername' => $data['username'], 'apass' => md5($data['password']), 'astatus' => 1);
						$count = $this->query->get_row_count($table,$logindata);
						if($count == 1){
								$msg = ["alert"=>"success","message"=>"Welcome"];
								$this->session->admin = ($this->query->get_single_row($table,$logindata))[0];
								$this->session->admincookie = $data;
						}else{
							$msg = ["alert"=>"danger","message"=>"Admin not active"];
						}
					}else{
						$msg = ["alert"=>"danger","message"=>"Wrong password"];
					}
				}else{
					$msg = ["alert"=>"danger","message"=>"Username not exists"];
				}
			
				print_r(json_encode($msg));
				# code...
				break;
			case 'register':
			// Validation
				if(empty($data['fname'])){
					$msg = ["alert"=>"danger","message"=>"Enter first name"];
					print_r(json_encode($msg));
					exit();
				}
				if(empty($data['lname'])){
					$msg = ["alert"=>"danger","message"=>"Enter last name"];
					print_r(json_encode($msg));
					exit();
				}
				if(empty($data['email'])){
					$msg = ["alert"=>"danger","message"=>"Enter email"];
					print_r(json_encode($msg));
					exit();
				}
				if(empty($data['password'])){
					$msg = ["alert"=>"danger","message"=>"Enter password"];
					print_r(json_encode($msg));
					exit();
				}
				if(empty($data['repassword'])){
					$msg = ["alert"=>"danger","message"=>"Enter confirm password"];
					print_r(json_encode($msg));
					exit();
				}
				if($data['password'] != $data['repassword']){
					$msg = ["alert"=>"danger","message"=>"Password not match"];
					print_r(json_encode($msg));
					exit();
				}

				$table = 'admindata';
				$where = array('aemail' => $data['email']);
				$count = $this->query->get_row_count($table,$where);
				if($count != 0){
					$msg = ["alert"=>"danger","message"=>"Email already existed"];
					print_r(json_encode($msg));
					exit();
				}

				$registerdata = array(
					'afname' => $data['fname'], 
					'alname' => $data['lname'], 
					'ausername' => strtolower(str_replace(' ', '',$data['fname'].$data['lname'])), 
					'aemail' => $data['email'], 
					'apass' => md5($data['password']), 
					'asecuirtycode' => rand(11111111,99999999), 
					'aip' => $this->input->ip_address(),
					'arole' => 2
				);

				if($this->query->insert_data($table,$registerdata)){

					$msg = ["alert"=>"success","message"=>"Sent confirmation email"];
				}else{
					$msg = ["alert"=>"danger","message"=>"Error"];
				}

				print_r(json_encode($msg));
				break;
			case 'changepasswordform':
				# code...
				if(empty($data['password'])){
					$msg = ["alert"=>"danger","message"=>"Enter password"];
					print_r(json_encode($msg));
					exit();
				}
				if(empty($data['repassword'])){
					$msg = ["alert"=>"danger","message"=>"Enter repassword"];
					print_r(json_encode($msg));
					exit();
				}
				if($data['password'] != $data['repassword']){
					$msg = ["alert"=>"danger","message"=>"Password not match"];
					print_r(json_encode($msg));
					exit();
				}

				$password = $data['password'];
				$uppercase = preg_match('@[A-Z]@', $password);
				$lowercase = preg_match('@[a-z]@', $password);
				$number    = preg_match('@[0-9]@', $password);
				$specialChars = preg_match('@[^\w]@', $password);

				if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
					$msg = ["alert"=>"danger","message"=>"Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character."];
					print_r(json_encode($msg));
				}else{
					$table = 'admindata';
					$where = array('aid' => $this->session->admin->aid);
					$query = array('apass' => $password);
					$password = md5($password);
					if($this->session->admin->apass != $password){
						if($this->query->update_data($table,$query,$where)){
				        	$msg = ["alert"=>"success","message"=>"Password changed"];
						}else{
				        	$msg = ["alert"=>"danger","message"=>"Password not changed"];
						}
					}else{
				        	$msg = ["alert"=>"danger","message"=>"Enter new password"];
					}
					print_r(json_encode($msg));
				}

				break;
			case 'forgotpassword':

				$table = 'admindata';
				$where = array('aemail' => $data['email']);
				$count = $this->query->get_row_count($table,$where);

				if($count == 1){

					$data = $this->query->get_single_row($table,$where)[0];

					   $config = Array(
					  'protocol' => 'smtp',
					  'smtp_host' => 'ssl://smtp.googlemail.com',
					  'smtp_port' => 465,
					  'smtp_user' => 'sumersingh1997.ssh@gmail.com', // change it to yours
					  'smtp_pass' => 'Admin@007@', // change it to yours
					  'mailtype' => 'html',
					  'charset' => 'iso-8859-1',
					  'wordwrap' => TRUE
					);
			        $this->load->library('email',$config);

					$this->email->from('sumer@gmail.com', 'Your Name');
					$this->email->to('sumersingh1997.ssh@gmail.com');

					$this->email->subject('Email Test');
					$msg = '<a href="'.base_url("panel/confirmpassword").'/'.$data->aid.'/'.$data->asecuirtycode.'">Confirm Now</a>';

					$this->email->message($msg);

					if($this->email->send()){
			        	$msg = ["alert"=>"success","message"=>"Email sent"];
					}else{
			        	$msg = ["alert"=>"danger","message"=>"Email not sent"];
					}
					
				}else{
					$msg = ["alert"=>"danger","message"=>"Email not existed"];
				}

				print_r(json_encode($msg));

				break;
				
			case 'addadminrole':
				$data = $this->input->post();
				if(!empty($data['role'])){
					$table = 'adminrole';
					$where = array('arolename' => $data['role']);
					$count = $this->query->get_row_count($table,$where);

					if($count == 0){
						if($data['id']==""){
							if($this->query->insert_data($table,$where)){
								$msg = ["alert"=>"success","message"=>"Role added"];
							}else{
								$msg = ["alert"=>"danger","message"=>"Role not added"];
							}
						}else{
							$where = array('aroleid ' => $data['id']);
							$query = array('arolename' => $data['role']);
							if($this->query->update_data($table,$query,$where)){
								$msg = ["alert"=>"success","message"=>"Role updated"];
							}else{
								$msg = ["alert"=>"danger","message"=>"Role not updated"];
							}							
						}

					}else{
						$msg = ["alert"=>"danger","message"=>"Role existed"];
					}
				}else{
					$msg = ["alert"=>"danger","message"=>"Role Blank"];					
				}
				print_r(json_encode($msg));
				# code...
				break;

			case 'adminrolestatus':
				# code...
				$data = $this->input->post();
				$table = 'adminrole';
				$where = array('aroleid' => $data['i']);

				if($data['q'] == 0){
					$s = 1;
				}else{
					$s = 0;
				}

				$query = array(
					'arolestatus' => $s
				);

				if($this->query->update_data($table,$query,$where)){
					$msg = ["alert"=>"success","message"=>"Role status updated"];
				}else{
					$msg = ["alert"=>"danger","message"=>"Role status not updated"];
				}
				
				print_r(json_encode($msg));

				break;

			case 'showadminrole':
				$data = $this->input->post();
				$where = array('aroleid' => $data['i']);
				$table = 'adminrole';
				$msg = $this->query->get_single_row($table,$where);
				print_r(json_encode($msg[0]));
				# code...
				break;

			case 'singleroledelete':
				$data = $this->input->post();
				if(!empty($data['i'])){
					$where = array('aroleid' => $data['i']);
					$table = 'adminrole';
					if($this->query->delete_data($table,$where)){
						$msg = ["alert"=>"success","message"=>"Single role Deleted"];	
					}else{
						$msg = ["alert"=>"danger","message"=>"Single role not Deleted"];	
					}
					print_r(json_encode($msg));
				}
				# code...
				break;
			case 'adminstatus':
					# code...
					$data = $this->input->post();
					$table = 'admindata';
					$where = array('aid' => $data['i']);

					if($data['q'] == 0){
						$s = 1;
					}else{
						$s = 0;
					}

					$query = array(
						'astatus' => $s
					);

					if($this->query->update_data($table,$query,$where)){
						$msg = ["alert"=>"success","message"=>"Role status updated"];
					}else{
						$msg = ["alert"=>"danger","message"=>"Role status not updated"];
					}
					
					print_r(json_encode($msg));
					# code...
					break;
				case 'updateuserform':
				if($data['role'] != 0 && $data['role'] != ""){
					# code...
					$config['upload_path']          = './assets-admin/upload/profiles/';
	                $config['allowed_types']        = 'gif|jpg|png';

	                $this->upload->initialize($config);
	                if($this->upload->do_upload('profileimg')){
		                $filedata = $this->upload->data();
		                // base64
		                $base64file = base64_encode(file_get_contents($filedata['full_path']));
		                $filename = "data:".$filedata['file_type'].";base64,".$base64file;
					}
					$where = array('aid' => $data['ids']);
					if(!empty($filename)){
						$query = array(
							'profile' => $filename,
							'afname' => $data['fname'], 
							'alname' => $data['lname'], 
							'aip' => $this->input->ip_address(),
							'arole' => $data['role']
						);
					}else{
						$query = array(
							'afname' => $data['fname'], 
							'alname' => $data['lname'], 
							'aip' => $this->input->ip_address(),
							'arole' => $data['role']
						);
					}
					$table = 'admindata';
					if($this->query->update_data($table,$query,$where)){
						$msg = ["alert"=>"success","message"=>"User details updated"];
					}else{
						$msg = ["alert"=>"danger","message"=>"User details not updated"];
					}
				}else{
					$msg = ["alert"=>"danger","message"=>"Please select any role"];					
				}
					print_r(json_encode($msg));
					break;	
				case 'alldeleteuser':
					# code...
					$table = 'admindata';
					$column = 'aid';
					$value = $data['delete'];
					if($this->query->delete_multidata($table,$column,$value)){
						$msg = ["alert"=>"success","message"=>"Users deteted"];
					}else{
						$msg = ["alert"=>"success","message"=>"Users not deteted"];
					}
					print_r(json_encode($msg));
					break;

				case 'alldeleterole':
					# code...
					$table = 'adminrole';
					$column = 'aroleid';
					$value = $data['delete'];
					if($this->query->delete_multidata($table,$column,$value)){
						$msg = ["alert"=>"success","message"=>"Users deteted"];
					}else{
						$msg = ["alert"=>"success","message"=>"Users not deteted"];
					}
					print_r(json_encode($msg));
					break;
			default:
				# code...
				break;
		}
	}
}
