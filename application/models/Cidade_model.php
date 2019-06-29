<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Cidade_model extends Eloquent {

  public $timestamps = false;
  protected $table = 'cidades';
  protected $fillable = array('nome', 'estado_id');

  public function endereco()
  {
    return $this->hasMany(Endereco_model::class, 'cidade_id', 'id');
  }

  public function estado()
  {
    return $this->belongsTo(Estado_model::class, 'estado_id');
  }

}
