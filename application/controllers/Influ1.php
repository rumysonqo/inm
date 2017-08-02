<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Influ1 extends CI_Controller
{

     public function __construct()
     {
          parent::__construct();
          //Cargamos el modelo del controlador
          $this->load->model('model_inm');
          $this->load->model('model_influ1');
     }


     public function index()
     {
          $datos['micro_red']=$this->model_inm->micro_red();
          $this->load->view('header');
          $this->load->view('view_influ1',$datos);
     }


     public function data_graf1()
     {
          $options = "";
          if($this->input->post('micro_red'))
          {
               $micro_red = $this->input->post('micro_red');
               $datos = $this->model_influ1->datos_micro($micro_red);
               if(!empty($datos))
               {
                    echo json_encode($datos);
               }
          }    
     }



     public function graf_num_eess()
     {
          $options = "";
          if($this->input->post('micro_red'))
          {
               $micro_red = $this->input->post('micro_red');
               $datos = $this->model_influ1->num_eess($micro_red);
               if(!empty($datos))
               {
                    echo json_encode($datos);
               }
          }    
     }


     public function graf_num_eess_mes()
     {
          $options = "";
          if($this->input->post('eess'))
          {
               $eess = $this->input->post('eess');
               $datos = $this->model_influ1->datos_eess($eess);
               if(!empty($datos))
               {
                    echo json_encode($datos);
               }
          }    
     }

     //PARA GRAFICO DE MICRO RED POR MES
     public function graf_num_micro_mes()
     {
          $options = "";
          if($this->input->post('micro_red'))
          {
               $micro_red = $this->input->post('micro_red');
               $datos = $this->model_influ1->datos_micro_mes($micro_red);
               if(!empty($datos))
               {
                    echo json_encode($datos);
               }
          }    
     }



   //PARA GRAFICO DE MICRO RED
     public function graf_num_micro()
     {
          $datos = $this->model_influ1->datos_micro_num();
          if(!empty($datos))
          {
               echo json_encode($datos);
          }
     }


     //PARA GRAFICO DE RED
     public function graf_cob_red()
     {
          $datos = $this->model_influ1->datos_red_cob();
          if(!empty($datos))
          {
               echo json_encode($datos);
          }
     }



     //cobertura total por micro red
     public function cob_total_micro()
     {
          $options = "";
          if($this->input->post('micro_red'))
          {
               $micro_red = $this->input->post('micro_red');
               $datos = $this->model_influ1->micro_cob_total($micro_red);
               if(!empty($datos))
               {
                    echo json_encode($datos);
               }
          }    
     }

   //PARA GRAFICO DE MICRO RED
     public function graf_cob_micro()
     {
          $datos = $this->model_influ1->datos_micro_cob();
          if(!empty($datos))
          {
               echo json_encode($datos);
          }
     }



     public function graf_cob_eess()
     {
          $options = "";
          if($this->input->post('micro_red'))
          {
               $micro_red = $this->input->post('micro_red');
               $datos = $this->model_influ1->cob_eess($micro_red);
               if(!empty($datos))
               {
                    echo json_encode($datos);
               }
          }    
     }



     public function llena_micro()
     {
          $options = "";
          if($this->input->post('micro_red'))
          {
               $micro_red = $this->input->post('micro_red');
               $datos = $this->model_influ1->datos_micro($micro_red);
               ?>

               <thead>
               <tr>
               <th>Establecimiento</th>
               <th>Meta</th>
               <th>Noviembre 2015</th>
               <th>Diciembre 2015</th>
               <th>Enero 2016</th>
               <th>Febrero 2016</th>
               <th>Marzo 2016</th>
               <th>Abril 2016</th>
               <th>Mayo 2016</th>
               <th>Junio 2016</th>
               <th>Julio 2016</th>
               <th>Agosto 2016</th>
               <th>Setiembre 2016</th>
               <th>Octubre 2016</th>
               <th>Total Avance</th>
               <th>% Cobertura</th>
               </tr>
               </thead>
               <tbody>

               <?php
               if(!empty($datos))
               {
                    foreach($datos as $dat)
                    {
                         //$avance=0;
                         //$avance=$dat -> set_2015 + $dat -> oct_2015 + $dat -> nov_2015 + $dat -> dic_2015 + $dat -> enero + $dat -> febrero + $dat -> marzo + $dat -> abril + $dat -> mayo + $dat -> junio + $dat -> julio+ $dat -> agosto;
                    ?>
                         <tr>
                         <td><?=$dat -> nombre ?></td>
                         <td align="right"><?=$dat -> meta ?></td>
                         <td align="right"><?=$dat -> nov_2015 ?></td>
                         <td align="right"><?=$dat -> dic_2015 ?></td>
                         <td align="right"><?=$dat -> enero ?></td>
                         <td align="right"><?=$dat -> febrero ?></td>
                         <td align="right"><?=$dat -> marzo ?></td>
                         <td align="right"><?=$dat -> abril ?></td>
                         <td align="right"><?=$dat -> mayo ?></td>
                         <td align="right"><?=$dat -> junio ?></td>
                         <td align="right"><?=$dat -> julio ?></td>
                         <td align="right"><?=$dat -> agosto ?></td>
                         <td align="right"><?=$dat -> setiembre ?></td>
                         <td align="right"><?=$dat -> octubre ?></td>
                         <td align="right"><?=$dat -> tot ?></td>
                         <td align="right"><?=number_format($dat -> cob,2) ?></td>
                         </tr>
                    <?php
                    }
               }
               ?>
               </tbody>
               <?php
          }
     }



     public function llena_eess()
     {
          $options = "";
          if($this->input->post('eess'))
          {
               $eess = $this->input->post('eess');
               $datos = $this->model_influ1->datos_eess($eess);
               ?>

               <thead>
               <tr>
               <th>Establecimiento</th>
               <th>Meta</th>
               <th>Noviembre 2015</th>
               <th>Diciembre 2015</th>
               <th>Enero 2016</th>
               <th>Febrero 2016</th>
               <th>Marzo 2016</th>
               <th>Abril 2016</th>
               <th>Mayo 2016</th>
               <th>Junio 2016</th>
               <th>Julio 2016</th>
               <th>Agosto 2016</th>
               <th>Setiembre 2016</th>
               <th>Octubre 2016</th>
               <th>Total Avance</th>
               <th>% Cobertura</th>
               </tr>
               </thead>
               <tbody>

               <?php
               if(!empty($datos))
               {
                    foreach($datos as $dat)
                    {
                         //$avance=0;
                         //$avance=$dat -> set_2015 + $dat -> oct_2015 + $dat -> nov_2015 + $dat -> dic_2015 + $dat -> enero + $dat -> febrero + $dat -> marzo + $dat -> abril + $dat -> mayo + $dat -> junio + $dat -> julio+ $dat -> agosto;
                    ?>
                         <tr>
                         <td><?=$dat -> nombre ?></td>
                         <td align="right"><?=$dat -> meta ?></td>
                         <td align="right"><?=$dat -> nov_2015 ?></td>
                         <td align="right"><?=$dat -> dic_2015 ?></td>
                         <td align="right"><?=$dat -> enero ?></td>
                         <td align="right"><?=$dat -> febrero ?></td>
                         <td align="right"><?=$dat -> marzo ?></td>
                         <td align="right"><?=$dat -> abril ?></td>
                         <td align="right"><?=$dat -> mayo ?></td>
                         <td align="right"><?=$dat -> junio ?></td>
                         <td align="right"><?=$dat -> julio ?></td>
                         <td align="right"><?=$dat -> agosto ?></td>
                         <td align="right"><?=$dat -> setiembre ?></td>
                         <td align="right"><?=$dat -> octubre ?></td>
                         <td align="right"><?=$dat -> tot ?></td>
                         <td align="right"><?=number_format($dat -> cob,2) ?></td>
                         </tr>
                    <?php
                    }
               }
               ?>
               </tbody>
               <?php
          }
     }



     public function llena_red()
     {
               $datos = $this->model_influ1->datos_micro_num();
               ?>

               <thead>
               <tr>
               <th>Micro Red</th>
               <th>Meta</th>
               <th>Noviembre 2015</th>
               <th>Diciembre 2015</th>
               <th>enero</th>
               <th>Febrero</th>
               <th>Marzo</th>
               <th>Abril</th>
               <th>Mayo</th>
               <th>Junio</th>
               <th>Julio</th>
               <th>Agosto</th>
               <th>Setiembre</th>
               <th>Octubre</th>
               <th>Total</th>
               <th>Cobertura</th>
               </tr>
               </thead>
               <tbody>

               <?php
               if(!empty($datos))
               {
                    foreach($datos as $dat)
                    {
                         //$avance=0;
                         //$avance=$dat -> set_2015 + $dat -> oct_2015 + $dat -> nov_2015 + $dat -> dic_2015 + $dat -> enero + $dat -> febrero + $dat -> marzo + $dat -> abril + $dat -> mayo + $dat -> junio + $dat -> julio+ $dat -> agosto;
                    ?>
                         <tr>
                         <td><?=$dat -> nombre ?></td>
                         <td align="right"><?=$dat -> meta ?></td>
                         <td align="right"><?=$dat -> nov15 ?></td>
                         <td align="right"><?=$dat -> dic15 ?></td>
                         <td align="right"><?=$dat -> enero ?></td>
                         <td align="right"><?=$dat -> febrero ?></td>
                         <td align="right"><?=$dat -> marzo ?></td>
                         <td align="right"><?=$dat -> abril ?></td>
                         <td align="right"><?=$dat -> mayo ?></td>
                         <td align="right"><?=$dat -> junio ?></td>
                         <td align="right"><?=$dat -> julio ?></td>
                         <td align="right"><?=$dat -> agosto ?></td>
                         <td align="right"><?=$dat -> setiembre ?></td>
                         <td align="right"><?=$dat -> octubre ?></td>
                         <td align="right"><?=$dat -> tot ?></td>
                         <td align="right"><?= number_format($dat -> cob,2) ?></td>
                         </tr>
                    <?php
                    }
               }
               ?>
               </tbody>
               <?php
     }





     
}