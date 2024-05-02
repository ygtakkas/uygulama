<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class brands extends CI_Controller {
	public $viewFolder="";
	public function __construct()
	{
		parent::__construct();
		$this->load->model("brands_model");
		$this->viewFolder="brands_v";
	}

	public function index()
	{
		$items = $this->brands_model->getAll();
		
		$viewData = new stdClass();
		$viewData->viewFolder=$this->viewFolder;
		$viewData->subViewFolder="list";
		$viewData->items=$items;

		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}

	public function new_form(){
		$viewData = new stdClass();
		$viewData->viewFolder=$this->viewFolder;
		$viewData->subViewFolder="add";
		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}

	public function save(){
		//kutuphane yuklendı
		$this->load->library("form_validation");

		//kurallar
		$this->form_validation->set_rules("title", "Marka Adı ","required|trim");
		//mesajlar
		$this->form_validation->set_message(
			array(
			"required"=>"<b>{field}</b>  Alanı Doldurulmalıdır"
			)
		);
		//calıstırılnası
		$validate=$this->form_validation->run(); 

		if($validate){
			//echo "Kayıt başarılı";
			$data=array(
				"title"=>$this->input->post("title"),
			);
			$insert=$this->brands_model->add($data);
			if($insert){
				redirect(base_url("brands"));
			}
			else{
				echo "Kayıt sırasında hata";
			}
		}
		else {
		//echo "validasyon başarısız";
		$viewData = new stdClass();
		$viewData->viewFolder=$this->viewFolder;
		$viewData->subViewFolder="add";
		$viewData->formError=true;
		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
		}
	}

	public function updateForm($id){
		$item=$this->brands_model->get(
			array(
				"id"=>$id
			)
			);
		$viewData = new stdClass();
		$viewData->item=$item;
		$viewData->viewFolder=$this->viewFolder;
		$viewData->subViewFolder="update";
		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
	}

	public function update($id){
		$this->load->library("form_validation");

		//kurallar
		$this->form_validation->set_rules("title", "Marka Adı ","required|trim");
		//mesajlar
		$this->form_validation->set_message(
			array(
			"required"=>"<b>{field}</b>  Alanı Doldurulmalıdır"
			)
		);
		//calıstırılnası
		$validate=$this->form_validation->run(); 

		if($validate){
			//echo "Kayıt başarılı";
			$data=array(
				"title"=>$this->input->post("title"),
			);
			$update=$this->brands_model->update(
				array(
					"id"=>$id
				),$data
				);


			if($update){
					redirect(base_url("brands"));
			}
			else{
				echo "basarısız";
			}
		}
		else {
			$item=$this->brands_model->get(
				array(
					"id"=>$id
				)
				);
			$viewData = new stdClass();
			$viewData->item=$item;
			$viewData->viewFolder=$this->viewFolder;
			$viewData->subViewFolder="update";
			$viewData->formError=true;
			$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
		}
	}
	public function delete($id){
		$data=array(
			"id"=>$id
		);
		$this->brands_model->delete($data);
		redirect(base_url("brands"));
	}
}?>
