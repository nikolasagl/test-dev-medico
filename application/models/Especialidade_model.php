<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class Especialidade_model extends Eloquent {

  public $timestamps = false;

  protected $table = 'especialidades';

  protected $fillable = array('nome');

}
