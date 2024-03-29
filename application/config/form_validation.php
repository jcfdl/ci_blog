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
	'update_user' => array(
		array(
			'field' => 'first_name',
			'label' => 'first name',
			'rules' => 'required|regex_match[/^([a-z ])+$/i]'
		),
		array(
			'field' => 'id',
			'label' => 'id',
			'rules' => 'required'
		),
		array(
			'field' => 'last_name',
			'label' => 'last name',
			'rules' => 'required|regex_match[/^([a-z ])+$/i]'
		),
		array(
			'field' => 'role_id',
			'label' => 'role',
			'rules' => 'required'
		),
		array(
			'field' => 'status',
			'label' => 'status',
			'rules' => 'required'
		),
	),
	'login' => array(
		array(
			'field' => 'email',
			'label' => 'email',
			'rules' => 'required|valid_email'
		),
		array(
			'field' => 'password',
			'label' => 'password',
			'rules' => 'required'
		),
	),
	'content' => array(
		array(
			'field' => 'title',
			'label' => 'title',
			'rules' => 'required'
		),
		array(
			'field' => 'status',
			'label' => 'status',
			'rules' => 'required'
		)
	),
);
$config['error_prefix'] = '<small class="text-danger">';
$config['error_suffix'] = '</small>';