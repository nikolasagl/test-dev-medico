<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Medico extends CI_Controller {

  public function index () {

    $medicos = Medico_model::withTrashed()->get();

    $this->load->template('medicos/medicos', compact('medicos'), 'medicos/js_medicos');
  }

  public function create()
  {
    $especialidades = Especialidade_model::all();
    $tipos_telefone = TipoTelefone_model::all();

    $this->load->template('medicos/create', compact('especialidades', 'tipos_telefone'), 'medicos/js_medicos');
  }

  public function store()
  {

  }

  public function edit($id)
  {

  }

  public function update($id)
  {

  }
}

?>
