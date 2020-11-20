<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Companys extends CI_Controller
{

	public function index()
	{
		checkUserLogged(); /* FUNÇÃO PARA VERIFICAR SE O USUÁRIO LOGADO É VERDADEIRO */
		$data['session_name'] = $_SESSION['logged_user']['nome'];
		$this->load->model('company_model');
		$this->load->model('charts_model');
		$data['charts'] = $this->charts_model->getStatesCount();

		$data['all_companys'] = $this->company_model->getAllCompanys();
		$this->load->view('companys', $data);
	}


	/* Essa função recebe o ID do usuário como parâmetro para deleta-lo do DB */

	public function deletecompany($id)
	{
		$this->load->model('company_model');
		$this->company_model->deletecompany($id);
		redirect($_SERVER['HTTP_REFERER']);
	}
}
