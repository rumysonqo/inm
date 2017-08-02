<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_Rot1 extends CI_Model
{
     function __construct()
     {
          parent::__construct();
     }

     public function datos_micro($micro_red)
     {
          $this->db->select('e.nombre, p.meta, p.nov_2015, p.dic_2015, p.enero, p.febrero, p.marzo, p.abril, p.mayo, p.junio, p.julio, p.agosto, p.setiembre, p.octubre, (p.nov_2015 + p.dic_2015+p.enero+p.febrero+p.marzo+p.abril+p.mayo+p.junio+p.julio+p.agosto+p.setiembre+p.octubre) as tot, (p.nov_2015 + p.dic_2015+p.enero+p.febrero+p.marzo+p.abril+p.mayo+p.junio+p.julio+p.agosto+p.setiembre+p.octubre)*100/p.meta as cob');
          $this->db->from('rot1 p');
          $this->db->join('eess e','e.id = p.eess');
          $this->db->join('micro_red m','m.id = e.micro_red');
          $this->db->where('m.id',$micro_red);
          $this->db->order_by('cob','desc');
          $datos=$this->db->get();
          if($datos->num_rows()>0)
          {
               return $datos->result();
          }
     }




     public function micro_cob_total($micro_red)
     {
          $this->db->select('((sum(p.nov_2015) + sum(p.dic_2015) + sum(p.enero) + sum(p.febrero) + sum(p.marzo) + sum(p.abril) + sum(p.mayo) + sum(p.junio) + sum(p.julio) + sum(p.agosto)+sum(p.setiembre)+sum(p.octubre)) * 100) / sum(p.meta) as cob');
          $this->db->from('rot1 p');
          $this->db->join('eess e','e.id = p.eess');
          $this->db->join('micro_red m','m.id = e.micro_red');
          $this->db->where('m.id',$micro_red);
          $datos=$this->db->get();
          if($datos->num_rows()>0)
          {
               return $datos->result();
          }
     }


     public function datos_micro_num()
     {
          $this->db->select('m.nombre, sum(p.meta) as meta, sum(p.nov_2015) as nov15, sum(p.dic_2015) as dic15, sum(p.enero) as enero, sum(p.febrero) as febrero, sum(p.marzo) as marzo, sum(p.abril) as abril, sum(p.mayo) as mayo, sum(p.junio) as junio, sum(p.julio) as julio, sum(p.agosto) as agosto, sum(p.setiembre) as setiembre, sum(p.octubre) as octubre, (sum(p.nov_2015) + sum(p.dic_2015) + sum(p.enero) + sum(p.febrero) + sum(p.marzo) + sum(p.abril) + sum(p.mayo) + sum(p.junio) + sum(p.julio) + sum(p.agosto)+ sum(p.setiembre)+ sum(p.octubre)) as tot, (sum(p.nov_2015) + sum(p.dic_2015) + sum(p.enero) + sum(p.febrero) + sum(p.marzo) + sum(p.abril) + sum(p.mayo) + sum(p.junio) + sum(p.julio) + sum(p.agosto)+ sum(p.setiembre)+ sum(p.octubre)) * 100 / sum(p.meta) as cob');
          $this->db->from('rot1 p');
          $this->db->join('eess e','e.id = p.eess');
          $this->db->join('micro_red m','m.id = e.micro_red');
          $this->db->group_by('m.nombre');
          $this->db->order_by('meta','desc');
          $datos=$this->db->get();
          if($datos->num_rows()>0)
          {
               return $datos->result();
          }
     }



     public function datos_micro_cob()
     {
          $this->db->select('m.nombre, sum(p.meta) as meta, sum(p.nov_2015) as nov15, sum(p.dic_2015) as dic15, sum(p.enero) as enero, sum(p.febrero) as febrero, sum(p.marzo) as marzo, sum(p.abril) as abril, sum(p.mayo) as mayo, sum(p.junio) as junio, sum(p.julio) as julio, sum(p.agosto) as agosto, sum(p.setiembre) as setiembre, sum(p.octubre) as octubre, (sum(p.nov_2015) + sum(p.dic_2015) + sum(p.enero) + sum(p.febrero) + sum(p.marzo) + sum(p.abril) + sum(p.mayo) + sum(p.junio) + sum(p.julio) + sum(p.agosto) + sum(p.setiembre) + sum(p.octubre)) as tot, (sum(p.nov_2015) + sum(p.dic_2015) + sum(p.enero) + sum(p.febrero) + sum(p.marzo) + sum(p.abril) + sum(p.mayo) + sum(p.junio) + sum(p.julio) + sum(p.agosto) + sum(p.setiembre) + sum(p.octubre)) * 100 / sum(p.meta) as cob');
          $this->db->from('rot1 p');
          $this->db->join('eess e','e.id = p.eess');
          $this->db->join('micro_red m','m.id = e.micro_red');
          $this->db->group_by('m.nombre');
          $this->db->order_by('cob','desc');
          $datos=$this->db->get();
          if($datos->num_rows()>0)
          {
               return $datos->result();
          }
     }


     public function datos_red_cob()
     {
          $this->db->select('sum(p.meta) as meta, (sum(p.nov_2015) + sum(p.dic_2015) + sum(p.enero) + sum(p.febrero) + sum(p.marzo) + sum(p.abril) + sum(p.mayo) + sum(p.junio) + sum(p.julio) + sum(p.agosto)+ sum(p.setiembre)+ sum(p.octubre)) * 100 / sum(p.meta) as cob');
          $this->db->from('rot1 p');
          $datos=$this->db->get();
          if($datos->num_rows()>0)
          {
               return $datos->result();
          }
     }



     public function datos_micro_mes($micro_red)
     {
          $this->db->select('m.nombre, sum(p.nov_2015) as nov15, sum(p.dic_2015) as dic15, sum(p.enero) as enero, sum(p.febrero) as febrero, sum(p.marzo) as marzo, sum(p.abril) as abril, sum(p.mayo) as mayo, sum(p.junio) as junio, sum(p.julio) as julio, sum(p.agosto) as agosto, sum(p.setiembre) as setiembre, sum(p.octubre) as octubre');
          $this->db->from('rot1 p');
          $this->db->join('eess e','e.id = p.eess');
          $this->db->join('micro_red m','m.id = e.micro_red');
          $this->db->where('m.id',$micro_red);
          $this->db->group_by('m.nombre');
          $datos=$this->db->get();
          if($datos->num_rows()>0)
          {
               return $datos->result();
          }
     }




     public function datos_eess($eess)
     {
          $this->db->select('e.nombre, p.meta, p.nov_2015, p.dic_2015, p.enero, p.febrero, p.marzo, p.abril, p.mayo, p.junio, p.julio, p.agosto, p.setiembre, p.octubre, (p.nov_2015 + p.dic_2015+p.enero+p.febrero+p.marzo+p.abril+p.mayo+p.junio+p.julio+p.agosto+p.setiembre+p.octubre) as tot, (p.nov_2015 + p.dic_2015+p.enero+p.febrero+p.marzo+p.abril+p.mayo+p.junio+p.julio+p.agosto+p.setiembre+p.octubre)*100/p.meta as cob');
          $this->db->from('rot1 p');
          $this->db->join('eess e','e.id = p.eess');
          $this->db->join('micro_red m','m.id = e.micro_red');
          $this->db->where('e.id',$eess);
          $datos=$this->db->get();
          if($datos->num_rows()>0)
          {
               return $datos->result();
          }
     }



     //numero de vacunados por eess de microred 
     public function num_eess($micro_red)
     {
          $this->db->select('e.nombre, p.meta, (p.nov_2015 + p.dic_2015+p.enero+p.febrero+p.marzo+p.abril+p.mayo+p.junio+p.julio+p.agosto+p.setiembre+p.octubre) as tot, (p.nov_2015 + p.dic_2015+p.enero+p.febrero+p.marzo+p.abril+p.mayo+p.junio+p.julio+p.agosto+p.setiembre+p.octubre)*100/p.meta as cob');
          $this->db->from('rot1 p');
          $this->db->join('eess e','e.id = p.eess');
          $this->db->join('micro_red m','m.id = e.micro_red');
          $this->db->where('m.id',$micro_red);
          $this->db->order_by('p.meta','desc');
          $datos=$this->db->get();
          if($datos->num_rows()>0)
          {
               return $datos->result();
          }

     }



     //numero de vacunados por eess de microred 
     public function num_eess_dat($eess)
     {
          $this->db->select('e.nombre, p.meta, (p.nov_2015 + p.dic_2015+p.enero+p.febrero+p.marzo+p.abril+p.mayo+p.junio+p.julio+p.agosto+p.setiembre+p.octubre) as tot, (p.nov_2015 + p.dic_2015+p.enero+p.febrero+p.marzo+p.abril+p.mayo+p.junio+p.julio+p.agosto+p.setiembre+p.octubre)*100/p.meta as cob');
          $this->db->from('rot1 p');
          $this->db->join('eess e','e.id = p.eess');
          $this->db->join('micro_red m','m.id = e.micro_red');
          $this->db->where('m.id',$micro_red);
          $this->db->order_by('p.meta','desc');
          $datos=$this->db->get();
          if($datos->num_rows()>0)
          {
               return $datos->result();
          }

     }



     //numero de vacunados por eess de microred 
     public function cob_eess($micro_red)
     {
          //$this->db->query('select e.nombre, p.set_2015+p.oct_2015 as cob from eess e, penta1 p, micro_red m where p.eess = e.id and e.micro_red = m.id and m.id =',$micro_red);
          $this->db->select('e.nombre, (p.nov_2015 + p.dic_2015+p.enero+p.febrero+p.marzo+p.abril+p.mayo+p.junio+p.julio+p.agosto+p.setiembre+p.octubre)*100/p.meta as cob');
          $this->db->from('rot1 p');
          $this->db->join('eess e','e.id = p.eess');
          $this->db->join('micro_red m','m.id = e.micro_red');
          $this->db->where('m.id',$micro_red);
          $this->db->order_by('cob','desc');
          $datos=$this->db->get();
          if($datos->num_rows()>0)
          {
               return $datos->result();
          }

     }

     

}