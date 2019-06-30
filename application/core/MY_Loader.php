<?php
class My_Loader extends CI_Loader
{

  function template($path, $data = null)
  {
    $this->view('includes/header');

    $this->view($path, $data);

    $this->view('includes/footer');
  }

  function table($path, $data = null, $js = null)
  {
    $this->view($path, $data);
  }
}
