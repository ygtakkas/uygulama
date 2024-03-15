<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->model("product_category_model");

		$items = $this->product_category_model->getAll();
		
		$viewData = new stdClass();
		$viewData->items=$items;

		$this->load->view('welcome_message.php',$viewData);
	}
}?>
