<?php
$config = array(
	'registration' => array(
		array(
			'field' => 'first_name',
			'label' => 'first name',
			'rules' => 'required|alpha'
		),
		array(
			'field' => 'last_name',
			'label' => 'last name',
			'rules' => 'required|alpha'
		),
		array(
			'field' => 'email',
			'label' => 'email',
			'rules' => 'required|valid_email|is_unique[users.email]'
		),
		array(
			'field' => 'password',
			'label' => 'password',
			'rules' => 'required'
		),
		array(
			'field' => 'password_conf',
			'label' => 'password confirmation',
			'rules' => 'required|matches[password]'
		),
	),
);