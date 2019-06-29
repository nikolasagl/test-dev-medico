<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainHelper
{
  public function fixTelefone($telefone)
  {
    $fixedTelefone = [
      'tipo_telefone_id' => $telefone['tipo_telefone_id'],
      'numero' => $telefone['ddd'].$telefone['numero']
    ];

    return $fixedTelefone;
  }

  public static function formatTelefone($data)
  {
    return substr_replace($data, '-', -4, 0);
  }

  public static function multiSelectValues($array){
    $newarray = [];
    foreach($array as $element){
      array_push($newarray,$element->id);
    }
    return $newarray;
  }
}

?>
