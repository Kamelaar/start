<?php
class Admin_model extends CI_Model{
	public function register($userInfo){
		$this->db->insert('user', $userInfo);
	}

	// Log user in
	public function login($name, $password){
		// Validate

		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('name', $name);
		$query = $this->db->get();

		$userInfo = $query->row();

		if(!empty($userInfo)){
			if(password_verify($password, $userInfo->password)){
				return $userInfo;
			} else {
				return array();
			}
		} else {
			return array();
		}

	}

	public function get_picture_info($game)
	{

	}

	public function get_card_info($game)
	{

	}

//		// Check username exists
//		public function check_username_exists($username){
//			$query = $this->db->get_where('users', array('username' => $username));
//            
//			if(empty($query->row_array())){
//                
//				return true;
//                
//			} else {
//                
//				return false;
//			}
//		}

	// Check email exists
	public function check_cuid_exists($cuid){
		$query = $this->db->get_where('user', array('cuid' => $cuid));

		if(empty($query->row_array())){

			return true;

		} else {

			return false;

		}
	}

	// Getting a user profile
	public function get_profile($user_id){
		$this->db->select('id, surname, name, cuid, email, register_date');
		$this->db->from('user');
		$this->db->where('id', $user_id);
		$query = $this->db->get();

	return $query->row();
	}

	// Update a user profile
	public function update_profile(){
		$data = array(
			'surname' => $this->input->post('name'),
			'name' => $this->input->post('name'),
			'cuid' => $this->input->post('zipcode'),
			'email' => $this->input->post('email')
		);

		$this->db->where('id', $this->input->post('id'));

	return $this->db->update('user', $data);
	}

	// Delete a user profile
	public function delete_profile($user_id){

	return $this->db->delete('user', array('id' => $user_id));
	}


	/**
	* This function is used to get the user roles information
	* @return array $result : This is result of the query
	*/
	function getUserRole($user_id){
		$this->db->select('role');
		$this->db->from('user');
		$this->db->where('id', $user_id); 
		$query = $this->db->get();

	return $query->row();  
	}

	// Returns the number of members
	function getMembersCount(){
		$this->db->select('*');
		$this->db->from('user'); 
		$query = $this->db->get();

	return $query->num_rows();
	}

	// Returns the most active members
	function getMembersActivity(){
		$this->db->select('COUNT(user_id), author');
		$this->db->from('posts');
		$this->db->group_by('author');
		$this->db->limit(3);
		$this->db->order_by('COUNT(user_id) DESC');
		$query = $this->db->get();

	return $query->result_array();
	}

	// Getting the data of all the members
	public function getMembers(){
		$this->db->select('*');
		$this->db->from('user');
		$query = $this->db->get();

	return $query->result_array();
	}

	public function updateMember(){
		$data = array(
			'surname' => $this->input->post('surname'),
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'cuid' => $this->input->post('cuid'),
			);
		$this->db->where('id', $this->input->post('id'));

		return $this->db->update('user', $data);
	}

	public function deleteMember($user_id){

	return $this->db->delete('user', array('id' => $user_id));
	}

	/**
	 * This function used to save login information of user
	 * @param array $loginInfo : This is users login information
	 */
	function lastLogin($loginInfo){
		$this->db->trans_start();
		$this->db->insert('login_history', $loginInfo);
		$this->db->trans_complete();
	}

	/**
	 * This function is used to get last login info by user id
	 * @param number $userId : This is user id
	 * @return number $result : This is query result
	 */
	function lastLoginInfo($userId){
		$this->db->select('createdDtm');
		$this->db->where('userId', $userId);
		$this->db->order_by('id', 'desc');
		$this->db->limit(1);
		$query = $this->db->get();

		return $query->row();
	}

	// Getting the login history of all members
	public function getLoginHistory($userId){
		$this->db->select('*');
		$this->db->from('login_history');
		$this->db->where('userId', $userId);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();

	return $query->result_array();
	}
	
	// Validate user account after registration
	public function validateUser($boolean,$id){
		$data = array('validated' => $boolean);
		$this->db->where('id', $id);
		$this->db->update('user', $data);
	}
	
	    /**
     * This function used to check email exists or not
     * @param {string} $email : This is users email id
     * @return {boolean} $result : TRUE/FALSE
     */
    function checkEmailExist($email){
        $this->db->select('id');
        $this->db->where('email', $email);
        $query = $this->db->get('user');

        if ($query->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }


    /**
     * This function used to insert reset password data
     * @param {array} $data : This is reset password data
     * @return {boolean} $result : TRUE/FALSE
     */
    function resetPasswordUser($data)
    {
        $result = $this->db->insert('reset_password', $data);

        if($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * This function is used to get customer information by email-id for forget password email
     * @param string $email : Email id of customer
     * @return object $result : Information of customer
     */
    function getCustomerInfoByEmail($email)
    {
        $this->db->select('id, email, surname');
        $this->db->from('user');
        $this->db->where('email', $email);
        $query = $this->db->get();

        return $query->row();
    }

    /**
     * This function used to check correct activation details for forget password.
     * @param string $email : Email id of user
     * @param string $activation_id : This is activation string
     */
    function checkActivationDetails($email, $activation_id)
    {
        $this->db->select('id');
        $this->db->from('reset_password');
        $this->db->where('email', $email);
        $this->db->where('activation_id', $activation_id);
        $query = $this->db->get();
        return $query->num_rows();
    }

    // This function used to create new password by reset link
    function createPasswordUser($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->update('user', array('password'=>getHashedPassword($password)));
        $this->db->delete('reset_password', array('email'=>$email));
    }
	
	 /**
     * This function is used to match users password for change password
     * @param number $userId : This is user id
     */
    function matchOldPassword($userId, $oldPassword)
    {
        $this->db->select('id, password');
        $this->db->where('id', $userId);        
        $query = $this->db->get('user');
        
        $user = $query->result();

        if(!empty($user)){
            if(verifyHashedPassword($oldPassword, $user[0]->password)){
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }
    
    /**
     * This function is used to change users password
     * @param number $userId : This is user id
     * @param array $userInfo : This is user updation info
     */
    function changePassword($userId, $userInfo)
    {
        $this->db->where('id', $userId);
        $this->db->update('user', $userInfo);
        
        return $this->db->affected_rows();
    }


}
