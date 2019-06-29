<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MedicoService
{
  public function store($input)
  {
    DB::beginTransaction();

    try {

      $medico = new Medico_model($input['medico']);

      $medico->save();

      $medico->especialidades()->sync($input['medico']['especialidade_id']);

      foreach ($input['medico']['telefone'] as $key => $telefone) {
        $medico->telefones()->save(new Telefone_model(MainHelper::fixTelefone($telefone)));
      }

      $endereco = new Endereco_model($input['medico']['endereco']);

      $medico->endereco()->save($endereco);

      DB::commit();

    } catch (\Exception $e) {

      DB::rollback();

      echo "<pre>"; print_r($e); exit;
    }
  }

  public function update($input, $id)
  {
    // echo "<pre>"; print_r($input); exit;
    DB::beginTransaction();

    try {

      $medico = Medico_model::find($id);

      $medico->fill($input['medico']);

      $medico->save();

      $medico->especialidades()->sync($input['medico']['especialidade_id']);

      if (count($medico->telefones)) {

        foreach ($medico->telefones as $key => $telefone) {
          $telefone->update(MainHelper::fixTelefone($input['medico']['telefone'][$key]));
        }

        if (count($medico->telefones) < count($input['medico']['telefone'])) {

          foreach ($input['medico']['telefone'] as $key => $telefone) {

            if (!isset($medico->telefones[$key])) {
              $medico->telefones()->save(new Telefone_model(MainHelper::fixTelefone($telefone)));
            }
          }
        }
      }

      $medico->endereco->update($input['medico']['endereco']);

      DB::commit();

    } catch (\Exception $e) {

      DB::rollback();

      echo "<pre>"; print_r($e); exit;
    }
  }
}


?>
