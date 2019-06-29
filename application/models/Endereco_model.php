<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Endereco_model extends Eloquent {

  use SoftDeletes;

  public $timestamps = true;

  protected $table = 'enderecos';

  protected $fillable = array('medico_id', 'cidade_id', 'created_at', 'updated_at', 'deleted_at');

  public function medico()
  {
    return $this->belongsTo(Medico_model::class, 'medico_id');
  }

  public function cidade()
  {
    return $this->belongsTo(Cidade_model::class, 'cidade_id');
  }

}
