#!/usr/local/bin/php
<?php

class Friend extends Controller {

	public function index() {

		$data = array();
		$data['title'] = "Hello World";

		$data['subview'] = $this->view("subview", array('word' => "shazam"), true);
		$this->view("friend", $data);
	}

	public function addfriend() {
		die('xxx');
	}

}