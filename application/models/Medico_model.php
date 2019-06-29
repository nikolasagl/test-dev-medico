<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medico_model extends Eloquent {

  use SoftDeletes;

  public $timestamps = true;

  protected $table = 'medicos';

  protected $fillable = array('nome', 'crm', 'created_at', 'updated_at', 'deleted_at');

  public function especialidades()
  {
    return $this->belongsToMany(Especialidade_model::class, 'medicos_especialidades', 'medico_id', 'especialidade_id');
  }

  public function telefones()
  {
    return $this->hasMany(Telefone_model::class, 'medico_id', 'id');
  }

  public function endereco()
  {
    return $this->hasOne(Endereco_model::class, 'medico_id', 'id');
  }

  public function getEspecialidades($medico)
  {
    $string = '';

    foreach ($medico->especialidades as $key => $especialidade) {

      $string .= $key == 0 ? $especialidade->nome : ' | '.$especialidade->nome  ;
    }

    return $string;
  }

}
