<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Tahmid
 * Date: 4/5/2018
 * Time: 3:19 PM
 */
class Auth_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public  function  get_all_item()
    {
        $this->db->select('*');
        $this->db->from('item_tbl');
        $this->db->order_by('item_id', 'DESC');
        $data = $this->db->get();
        return $data->result();
    }
public  function  get_all_product()
{
    $this->db->select('*');
    $this->db->from('product_tbl');
    $data = $this->db->get();
    return $data->result();
}

    public function get_item($product_id)
    {


        $this->db->select('*');
        $this->db->from('item_tbl');
        $this->db->join('product_tbl','product_tbl.product_id=item_tbl.product_id','natural join');
        $this->db->where('item_tbl.product_id',$product_id);
        $data = $this->db->get();

        return $data->result();

    }


    public function get_product($category_id)
    {


        $this->db->select('*');
        $this->db->from('product_tbl');
        $this->db->join('category_tbl','product_tbl.category_id=category_tbl.category_id','natural join');
        $this->db->where('product_tbl.category_id',$category_id);
        $data = $this->db->get();
        return $data->result();

    }
    public function get_category()
    {

        $this->db->select('*');
        $this->db->from('category_tbl');
        $this->db->order_by('category_id', 'ASC');
        $data = $this->db->get();
        return $data->result();
    }

    public function list_menu() {
		$this->db->select('a.*');
		$this->db->from('tbl_menu a');
		$this->db->order_by('a.ser_id', 'DESC');
		$data = $this->db->get();
		return $data->result();
	}
	public function delete_item($item_select_id)
    {
        $this->db->where('item_id', $item_select_id);
        $this->db->delete('item_tbl');
        return $this->db->affected_rows();
    }

	public function save_menu() {
		$menu_label = $this->input->post('menu_label');
		$menu_url = $this->input->post('menu_url') ? $this->input->post('menu_url') : '#';
		$parent_menu = $this->input->post('parent_menu')==-1 ? NULL : $this->input->post('parent_menu');
		$menu_icon = $this->input->post('menu_icon') ? $this->input->post('menu_icon') : NULL;
		$menu_level = $this->input->post('menu_level') ? $this->input->post('menu_level') : 0;

		$ins_data = array(
			'menu_label' => $menu_label,
			'menu_url' => $menu_url,
			'parent_menu' => $parent_menu,
			'menu_icon' => $menu_icon,
			'menu_level' => $menu_level
		);

		if($this->db->insert('tbl_menu', $ins_data)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function menu_data($menu_id) {
        $this->db->select('a.*');
        $this->db->from('tbl_menu a');
        $this->db->where('a.ser_id', $menu_id);
        $data = $this->db->get();
        return $data->row();
    }

    public function update_menu()
    {
        $menu_id = $this->input->post('menu_id');
        $menu_label = $this->input->post('menu_label');
        $menu_url = $this->input->post('menu_url') ? $this->input->post('menu_url') : '#';
        $parent_menu = $this->input->post('parent_menu')==-1 ? NULL : $this->input->post('parent_menu');
        $menu_icon = $this->input->post('menu_icon') ? $this->input->post('menu_icon') : NULL;
        $menu_level = $this->input->post('menu_level') ? $this->input->post('menu_level') : 0;

        $ins_data = array(
            'menu_label' => $menu_label,
            'menu_url' => $menu_url,
            'parent_menu' => $parent_menu,
            'menu_icon' => $menu_icon,
            'menu_level' => $menu_level
        );

        $this->db->where('ser_id', $menu_id);
        if($this->db->update('tbl_menu', $ins_data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function delete_menu($menu_id)
    {
        $this->db->trans_begin();

        $this->db->where('menu_id', $menu_id);
        $this->db->delete('tbl_menu_to_group');

        $this->db->where('ser_id', $menu_id);
        $this->db->delete('tbl_menu');

        if($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } else {
            $this->db->trans_commit();
            return TRUE;
        }
    }

    public function delete_group($group_id)
    {
        $this->db->where('group_id', $group_id);
        if($this->db->delete('tbl_menu_to_group')) {
            if($this->aauth->delete_group($group_id)){
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    public function group_data($group_id)
    {
        $this->db->where('id', $group_id);
        $data = $this->db->get('aauth_groups');
        return $data->row();
    }

    public function group_menu_list($group_id)
    {
        $query = $this->db->query("SELECT a.*, 1 AS selected
            FROM tbl_menu a
            INNER JOIN tbl_menu_to_group b ON a.`ser_id`=b.`menu_id`
            WHERE b.`group_id`='$group_id'
            UNION
            SELECT a.*, 0 AS selected
            FROM tbl_menu a
            WHERE a.`ser_id` NOT IN(
            SELECT a.`ser_id`
            FROM tbl_menu a
            INNER JOIN tbl_menu_to_group b ON a.`ser_id`=b.`menu_id`
            WHERE b.`group_id`='$group_id'
            )
            ORDER BY `ser_id`");
        return $query->result();
    }

    public function save_group_menu($group_id)
    {
        $group_menu_list = $this->input->post('group_menu_list');

        $this->db->trans_begin();

        $this->db->where('group_id', $group_id);
        $this->db->delete('tbl_menu_to_group');

        foreach ($group_menu_list as $menu) {
            $ins_data = array(
                'group_id'=> $group_id,
                'menu_id'=> $menu
            );
            $this->db->insert('tbl_menu_to_group', $ins_data);
        }


        if($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } else {
            $this->db->trans_commit();
            return TRUE;
        }
    }

    public function group_perm_list($group_id)
    {
        $query = $this->db->query("SELECT a.*, 1 AS selected
            FROM `aauth_perms` a
            INNER JOIN `aauth_perm_to_group` b ON a.`id`=b.`perm_id`
            WHERE b.`group_id`='$group_id'
            UNION
            SELECT a.*, 0 AS selected
            FROM `aauth_perms` a
            WHERE a.`id` NOT IN (
            SELECT a.`id`
            FROM `aauth_perms` a
            INNER JOIN `aauth_perm_to_group` b ON a.`id`=b.`perm_id`
            WHERE b.`group_id`='$group_id'
            )");
        return $query->result();
    }

    public function save_group_perms($group_id)
    {
        $group_perm_list = $this->input->post('group_perm_list');

        $this->db->trans_begin();

        $this->db->where('group_id', $group_id);
        $this->db->delete('aauth_perm_to_group');

        foreach ($group_perm_list as $perm) {
            //$this->aauth->allow_group($group_id, $perm);
            $ins_data = array(
                'perm_id'=> $perm,
                'group_id'=> $group_id
            );
            $this->db->insert('aauth_perm_to_group', $ins_data);
        }

        if($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } else {
            $this->db->trans_commit();
            return TRUE;
        }
    }

    public function group_user_list($group_id)
    {
        $query = $this->db->query("SELECT a.*, 1 AS selected
            FROM aauth_users a
            INNER JOIN `aauth_user_to_group` b ON a.`id`=b.`user_id`
            WHERE b.`group_id`='$group_id'
            UNION
            SELECT a.*, 0 AS selected
            FROM aauth_users a
            WHERE a.`id` NOT IN(
            SELECT a.id
            FROM aauth_users a
            INNER JOIN `aauth_user_to_group` b ON a.`id`=b.`user_id`
            WHERE b.`group_id`='$group_id'
            )");
        return $query->result();
    }

    public function save_group_user($group_id)
    {
        $group_user_list = $this->input->post('group_user_list');

        $this->db->trans_begin();

        $this->db->where('group_id', $group_id);
        $this->db->delete('aauth_user_to_group');

        foreach ($group_user_list as $user) {
            //$this->aauth->allow_group($group_id, $perm);
            $ins_data = array(
                'user_id'=> $user,
                'group_id'=> $group_id
            );
            $this->db->insert('aauth_user_to_group', $ins_data);
        }

        if($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } else {
            $this->db->trans_commit();
            return TRUE;
        }
    }

}