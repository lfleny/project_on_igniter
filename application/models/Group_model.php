<?php 
class Group_model extends CI_Model {   
   
    function group_get_by_group_numb($group_numb) {
        return $this->db->get_where('bad_groups', array('group_numb' => $group_numb));
    }

    function group_get_groups() {
        $this->db->select('group_numb');
        return $this->db->get('bad_groups');
    }

    function group_add($group_numb) {
        $data = array(
            'group_numb' => $group_numb
        );
        $this->db->like($data);
        $this->db->from('bad_groups');
        $group_numb_counter = $this->db->count_all_results();
        if ($group_numb_counter > 0) {
            return array("state"=>false,"mesage"=>"Группа с таким номером уже существует");
        }
        $this->db->insert('bad_groups',$data);

        return array("state"=>true,"mesage"=>"Группа успешно добавлена");
    }

    function group_edit($group_numb_old, $group_numb_new) {
        $this->db->where('group_numb', $group_numb_old);
        $this->db->update('bad_groups',array('group_numb' => $group_numb_new));
        return array("state"=>true,"mesage"=>"Номер группы успешно изменен");
    }

    function group_delete($group_numb) {
        $this->db->like(array('group_numb' => $group_numb));
        $this->db->from('bad_groups');
        $group_numb_counter = $this->db->count_all_results();

        if ($group_numb_counter != 0){
            $this->db->where('group_numb', $group_numb);
            $this->db->delete('bad_groups');
            return array("state"=>true,"mesage"=>"Группа успешно удалена");
        } else {
            return array("state"=>false,"mesage"=>"Группы с таким номером не существует");
        }
    }

}