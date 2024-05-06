<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class users extends CI_Controller {
	public $viewFolder="";
	public function __construct()
	{
		parent::__construct();
		$this->load->model("users_model");
		$this->viewFolder="users_v";
	}

	public function index()
	{
		$items = $this->users_model->getAll();
		
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
		$this->form_validation->set_rules("email", "Eposta doldurulmalıdır ","required|trim|valid_email|is_unique[users.email]");
		$this->form_validation->set_rules("name", "Ad doldurulmalıdır ","required|trim");
		$this->form_validation->set_rules("surname", "Soyad doldurulmalıdır ","required|trim");
		$this->form_validation->set_rules("password", "Şifre doldurulmalıdır ","required|trim");
		$this->form_validation->set_rules("re-password", "Şifre tekrarı doldurulmalıdır ","required|trim|matches[password]");
		//mesajlar
		$this->form_validation->set_message(
			array(
			"required"=>"<b>{field}</b>  Alanı Doldurulmalıdır",
			"valid_email"=>"<b>{field}</b> Geçerli eposta değildir",
			"is_unique"=>"<b>{field}</b> daha önceden kayıtlıdır",
			"matches"=>" şifreler birbiriyle aynı değil"

			)
		);
		//calıstırılnası
		$validate=$this->form_validation->run(); 

		if($validate){
			//echo "Kayıt başarılı";
			$data=array(
				"email"=>$this->input->post("email"),
				"name"=>$this->input->post("name"),
				"surname"=>$this->input->post("surname"),
				"password"=>md5($this->input->post("password")),
				"is_active"=>1

			);
			$insert=$this->users_model->add($data);
			if($insert){
				redirect(base_url("users"));
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
		$item=$this->users_model->get(
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
		$this->form_validation->set_rules("email", "Eposta doldurulmalıdır ","required|trim|valid_email|is_unique[users.email]");
		$this->form_validation->set_rules("name", "Ad doldurulmalıdır ","required|trim");
		$this->form_validation->set_rules("surname", "Soyad doldurulmalıdır ","required|trim");
		$this->form_validation->set_rules("password", "Şifre doldurulmalıdır ","required|trim");
		//mesajlar
		$this->form_validation->set_message(
			array(
				"required"=>"<b>{field}</b>  Alanı Doldurulmalıdır",
				"valid_email"=>"<b>{field}</b> Geçerli eposta değildir",
				"is_unique"=>"<b>{field}</b> daha önceden kayıtlıdır",
				"matches"=>" şifreler birbiriyle aynı değil"
			)
		);
		//calıstırılnası
		$validate=$this->form_validation->run(); 

		if($validate){
			//echo "Kayıt başarılı";
			$data=array(
				"email"=>$this->input->post("email"),
				"name"=>$this->input->post("name"),
				"surname"=>$this->input->post("surname"),
				"password"=>md5($this->input->post("password")),
				"is_active"=>1
			);
			$update=$this->users_model->update(
				array(
					"id"=>$id
				),$data
				);


			if($update){
					redirect(base_url("users"));
			}
			else{
				echo "basarısız";
			}
		}
		else {
			$item=$this->users_model->get(
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
		$this->users_model->delete($data);
		redirect(base_url("users"));
	}
}?>
