<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_inm extends CI_Model
{
     function __construct()
     {
          parent::__construct();
     }

     function micro_red()
     {
     	$query=$this->db->query('select id, nombre from micro_red');
     	if($query->num_rows()>0)
     	{
     		/*foreach($query->result() as $fila)
     		{
     			$fila['nombre'];
     		}*/
     		return $query->result();
     	}
     }


     public function eess($micro_red)
     {
          $this->db->where('micro_red',$micro_red);
          $this->db->order_by('id','asc');
          $eess = $this->db->get('eess');
          if($eess->num_rows()>0)
          {
               return $eess->result();
          }
     }


     

}