<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medico_Especialidade_model extends Eloquent {

  use SoftDeletes;

  public $timestamps = true;

  protected $table = 'medicos_especialidades';

  protected $fillable = array('medico_id', 'especialidade_id', 'created_at', 'updated_at', 'deleted_at');

}
