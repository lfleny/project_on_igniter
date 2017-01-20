<?php   
class Helloworld_model extends CI_Model {   
 
    function Helloworld_model()   
    {   
        // Вызов конструктора  
        parent::__construct( );
    }   
 
    function getData()   
        {   
            //Выбираем все данные из таблицы tdata  
            $query = $this->db->get('tdata'); 
            //Возвращаем результат   
            return $query->result();      
        }   
 
}   
?>