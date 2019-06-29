<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ServiceHelper
{
  public function fixTelefone($telefone)
  {
    $fixedTelefone = [
      'tipo_telefone_id' => $telefone['tipo_telefone_id'],
      'numero' => $telefone['ddd'].$telefone['numero']
    ];

    return $fixedTelefone;
  }
}

?>
