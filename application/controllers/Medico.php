<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Medico extends CI_Controller
{

  public function index ()
  {

    $medicos = Medico_model::withTrashed()->get();

    $this->load->template('medicos/medicos', compact('medicos'), 'medicos/js_medicos');
  }

  public function create()
  {
    $especialidades = Especialidade_model::all();
    $tipos_telefone = TipoTelefone_model::all();
    $estados = Estado_model::all();

    $errors = [
      'nome' => form_error('medico[nome]'),
      'especialidades' => form_error('medico[especialidade_id][]'),
      'crm' => form_error('medico[crm]'),
      'tipo_telefone' => form_error('medico[telefone][0][tipo_telefone_id]'),
      'ddd' => form_error('medico[telefone][0][ddd]'),
      'numero' => form_error('medico[telefone][0][numero]'),
      'estado' => form_error('medico[endereco][estado_id]'),
      'cidade' => form_error('medico[endereco][cidade_id]'),
    ];

    $this->load->template('medicos/create', compact('especialidades', 'tipos_telefone', 'estados', isset($errors) ? 'errors' : ''), 'medicos/js_medicos');
  }

  public function store()
  {
    $input = $this->input->post();

    // echo "<pre>"; print_r($input); exit;
    if ($this->validar($input)) {

      try {

        $this->medicoservice->store($input);

        $this->session->set_flashdata('success','Medico cadastrado com sucesso');

        redirect('medico');

      } catch (\Exception $e) {}
    }

    $this->session->set_flashdata('danger','Problemas ao cadastrar Medico, tente novamente!');

    $this->create();

  }

  public function edit($id)
  {

  }

  public function update($id)
  {

  }

  public function destroy($id)
  {

  }

  public function restore($id)
  {

  }

  public function validar($input, $id=null)
  {
    $this->form_validation->set_rules('medico[nome]', 'Nome', 'required');
    $this->form_validation->set_rules('medico[crm]', 'CRM', 'required');
    $this->form_validation->set_rules('medico[especialidade_id][]', 'Especialidades', 'required');
    $this->form_validation->set_rules('medico[endereco][estado_id]', 'Estado', 'required');
    $this->form_validation->set_rules('medico[endereco][cidade_id]', 'Cidade', 'required');

    foreach ($input['medico']['telefone'] as $key => $telefone) {

      $this->form_validation->set_rules('medico[telefone]['.$key.'][tipo_telefone_id]', 'Tipo de Telefone', 'required');
      $this->form_validation->set_rules('medico[telefone]['.$key.'][ddd]', 'DDD', 'required');
      $this->form_validation->set_rules('medico[telefone]['.$key.'][numero]', 'numero', 'required');
    }

    return $this->form_validation->run();
  }

  public function find()
  {
    $input = $this->input->post('term');

    $cidades = Cidade_model::where('estado_id', $input)->get();

    print_r(json_encode($cidades));
  }

  public function search()
  {
    $term = $this->input->post('term');

    if (empty($term)) {

      $medicos = Medico_model::withTrashed()->get();

    } else {

      $medicos = Medico_model::withTrashed()->where('nome', 'LIKE', '%'.$term.'%')
      ->orWhere('crm', 'LIKE', '%'.$term.'%')
      ->get();
    }

      $this->load->table('medicos/table', compact('medicos'), 'medicos/js_medicos');
  }

}

?>
