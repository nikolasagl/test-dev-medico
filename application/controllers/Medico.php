<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Medico extends CI_Controller
{

  public function index ()
  {

    $medicos = Medico_model::withTrashed()->get();

    $this->load->template('medicos/medicos', compact('medicos'));
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

    $this->load->template('medicos/create', compact('especialidades', 'tipos_telefone', 'estados', 'errors'));
  }

  public function store()
  {
    $input = $this->input->post();

    if ($this->validar($input)) {

      try {

        $this->medicoservice->store($input);

        $this->session->set_flashdata('success','Registro cadastrado com sucesso');

        redirect('medico');

      } catch (\Exception $e) {}
    }

    $this->session->set_flashdata('danger','Problemas ao cadastrar registro, tente novamente!');

    $this->create();
  }

  public function edit($id)
  {
    $medico = Medico_model::find($id);

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

    $this->load->template('medicos/edit', compact('medico', 'especialidades', 'tipos_telefone', 'estados', 'errors'));
  }

  public function update($id)
  {
    $input = $this->input->post();

    if ($this->validar($input)) {

      try {

        $this->medicoservice->update($input, $id);

        $this->session->set_flashdata('success','Registro atualizado com sucesso');

        redirect('medico');

      } catch (\Exception $e) {}
    }

    $this->session->set_flashdata('danger','Problemas ao atualizar registro, tente novamente!');

    $this->edit($id);
  }

  public function destroy($id)
  {
    try {

      $this->medicoservice->destroy($id);

      $this->session->set_flashdata('success','Registro inativado com sucesso');

      redirect('medico');

    } catch (\Exception $e) {

      $this->session->set_flashdata('danger','Problemas ao inativar, tente novamente!');

      redirect('medico');
    }
  }

  public function restore($id)
  {
    try {

      $this->medicoservice->restore($id);

      $this->session->set_flashdata('success','Registro reativado com sucesso');

      redirect('medico');

    } catch (\Exception $e) {

      $this->session->set_flashdata('danger','Problemas ao reativar registro, tente novamente!');

      redirect('medico');
    }
  }

  public function validar($input, $id=null)
  {
    $this->form_validation->set_rules('medico[nome]', 'Nome', 'required|max_length[150]|min_length[3]');
    $this->form_validation->set_rules('medico[crm]', 'CRM', 'required|numeric|max_length[15]|min_length[2]');
    $this->form_validation->set_rules('medico[especialidade_id][]', 'Especialidades', 'required|callback_check_length');
    $this->form_validation->set_rules('medico[endereco][estado_id]', 'Estado', 'required');
    $this->form_validation->set_rules('medico[endereco][cidade_id]', 'Cidade', 'required');

    foreach ($input['medico']['telefone'] as $key => $telefone) {

      $this->form_validation->set_rules('medico[telefone]['.$key.'][tipo_telefone_id]', 'Tipo de Telefone', 'required');
      $this->form_validation->set_rules('medico[telefone]['.$key.'][ddd]', 'DDD', 'required|min_length[2]');
      $this->form_validation->set_rules('medico[telefone]['.$key.'][numero]', 'numero', 'required|min_length[9]');
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

      $this->load->table('medicos/table', compact('medicos'));
  }

}

?>
