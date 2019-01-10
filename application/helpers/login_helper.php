<?php
defined('BASEPATH') OR exit('No direct scripting allowed');

function is_logged_in() {
    $CI = & get_instance();
    $user = $CI->session->userdata('logged_in');
    if (!isset($user)) { 
		return false; 
	} 
	else { 
		return true;
	}
}
