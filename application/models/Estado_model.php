<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Estado_model extends Eloquent {

  public $timestamps = false;
  protected $table = 'estados';
  protected $fillable = array('uf', 'nome');

  public function cidades()
  {
    return $this->hasMany(Cidade_model::class, 'estado_id', 'id');
  }
}
