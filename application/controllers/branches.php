<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class branches extends CI_Controller {

	public function index()
	{
		$this->load->model("branches_model");

		$items = $this->branches_model->getAll();
		
		$viewData = new stdClass();
		$viewData->items=$items;

		$this->load->view('branches_v/branches_view.php',$viewData);
	}
}?>
