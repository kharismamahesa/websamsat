<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		redirect("http://bapenda.riau.go.id");
	}
}
