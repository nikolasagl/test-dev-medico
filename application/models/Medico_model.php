<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medico_model extends Eloquent {

  use SoftDeletes;

  public $timestamps = true;

  protected $table = 'medicos';

  protected $fillable = array('nome', 'crm', 'created_at', 'updated_at', 'deleted_at');

}
