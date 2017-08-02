<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Inm extends CI_Controller
{

     public function __construct()
     {
          parent::__construct();
          //Cargamos el modelo del controlador
          $this->load->model('model_inm');
     }


     public function index()
     {
          //$datos=$this->model_inm->micro_red();
          $this->load->view('header');
          $this->load->view('view_home');
          $this->load->view('view_footer');
     }


     public function eess()
     {
          $options = "";
          if($this->input->post('micro_red'))
          {
               $micro_red = $this->input->post('micro_red');
               $eess = $this->model_inm->eess($micro_red);
               ?>
               <option value="">Selecciona un Establecimiento</option>

               <?php
               foreach($eess as $fila)
               {
               ?>
                    <option value="<?=$fila -> id ?>"><?=$fila -> nombre ?></option>
               <?php
               }
          }
     }



     

     
}