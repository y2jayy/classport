#!/usr/local/bin/php
<?php

class LoginRegister extends Controller {

	public function index() {
		$data = array();
		$data['title'] = "Hello World";
		$this->view("../views/login_register.php", $data);
	}

}