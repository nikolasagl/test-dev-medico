<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class TipoTelefone_model extends Eloquent {

  public $timestamps = false;
  protected $table = 'tipos_telefone';
  protected $fillable = array('nome');

  function telefones()
  {
    return $this->hasMany(Telefone_model::class, 'tipo_telefone_id', 'id');
  }
}
