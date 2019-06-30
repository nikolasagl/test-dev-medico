<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Telefone_model extends Eloquent {

  public $timestamps = true;

  protected $table = 'telefones';

  protected $fillable = array('numero', 'medico_id', 'tipo_telefone_id', 'created_at', 'updated_at', 'deleted_at');


  public function medico()
  {
    return $this->belongsTo(Medico_model::class, 'medico_id');
  }

  public function tipoTelefone()
  {
    return $this->belongsTo(TipoTelefone_model::class, 'tipo_telefone_id');
  }

  public function getNumeroAttribute()
  {
    $fixedTelefone = [
      'ddd' => substr($this->attributes['numero'], 0, 2),
      'numero' => substr($this->attributes['numero'], 2)
    ];

    return $fixedTelefone;
  }

  public function setNumeroAttribute($data)
  {
    $this->attributes['numero'] = MainHelper::removeSignals($data);
  }

}
