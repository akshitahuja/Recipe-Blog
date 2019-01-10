<?php
defined('BASEPATH') OR exit('No direct scripting allowed');

function is_logged_in_super() {
    $CI = & get_instance();
    $user = $CI->session->userdata('logged_in');
    if (!isset($user)) { 
		return false; 
	} 
	elseif ($user['usertype'] == 'SuperAdmin') { 
		return true;
	}
	else {
		return false;
	}
}
