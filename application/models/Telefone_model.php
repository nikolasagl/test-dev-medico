<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Telefone_model extends Eloquent {

  public $timestamps = true;

  protected $table = 'telefones';

  protected $fillable = array('numero', 'medico_id', 'created_at', 'updated_at', 'deleted_at');

}
