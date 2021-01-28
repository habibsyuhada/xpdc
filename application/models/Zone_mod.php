<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Zone_mod extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	function zone_list_db($where = null)
	{
		if (isset($where)) {
			$this->db->where($where);
		}
		$this->db->order_by("created_date", "DESC");
		$query = $this->db->get('mst_zone');

		return $query->result_array();
	}

	function zone_list_db_query($where = null)
	{
		if (isset($where)) {
			$this->db->where($where);
		}
		$this->db->select("a.id, a.zone_name, a.created_by, a.created_date, GROUP_CONCAT(b.country) as country");
		$this->db->from('mst_zone a');
		$this->db->join("mst_zone_detail b", "a.id = b.id_zone", "LEFT OUTER");
		$this->db->group_by("a.id, a.zone_name, a.created_by, a.created_date");
		$query = $this->db->get();
		return $query->result_array();
	}

	function zone_detail_list_db($where = null)
	{
		if (isset($where)) {
			$this->db->where($where);
		}
		$query = $this->db->get('mst_zone_detail');

		return $query->result_array();
	}

	function subzone_list_db_query($where = null)
	{
		if (isset($where)) {
			$this->db->where($where);
		}
		$this->db->select("a.id, a.sub_zone, a.created_by, a.created_date, GROUP_CONCAT(b.city) as city");
		$this->db->from('mst_sub_zone a');
		$this->db->join("mst_sub_zone_detail b", "a.id = b.id_subzone", "LEFT OUTER");
		$this->db->group_by("a.id, a.sub_zone, a.created_by, a.created_date");
		$query = $this->db->get();
		return $query->result_array();
	}

	function subzone_list_db($where = null)
	{
		if (isset($where)) {
			$this->db->where($where);
		}
		$this->db->order_by("created_date", "DESC");
		$query = $this->db->get('mst_sub_zone');

		return $query->result_array();
	}

	function subzone_detail_list_db($where = null)
	{
		if (isset($where)) {
			$this->db->where($where);
		}
		$query = $this->db->get('mst_sub_zone_detail');

		return $query->result_array();
	}

	function branch_list_db($where = null)
	{
		if (isset($where)) {
			$this->db->where($where);
		}
		$this->db->order_by("created_date", "DESC");
		$query = $this->db->get('branch');

		return $query->result_array();
	}

	function country_list_db($where = null)
	{
		if (isset($where)) {
			$this->db->where($where);
		}
		$this->db->order_by("record_date", "DESC");
		$query = $this->db->get('mst_country');

		return $query->result_array();
	}

	public function zone_detail_create_process_db($data)
	{
		return $this->db->insert_batch("mst_zone_detail", $data);
	}

	public function zone_detail_create_process_db_per($data)
	{
		$this->db->insert('mst_zone_detail', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	public function zone_create_process_db($data)
	{
		$this->db->insert('mst_zone', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	public function subzone_create_process_db($data)
	{
		$this->db->insert('mst_sub_zone', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	public function subzone_detail_create_process_db($data)
	{
		return $this->db->insert_batch("mst_sub_zone_detail", $data);
	}

	public function subzone_detail_create_process_db_per($data)
	{
		$this->db->insert('mst_sub_zone_detail', $data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	public function zone_update_process_db($data, $where)
	{
		$this->db->where($where);
		$this->db->update('mst_zone', $data);
	}

	public function subzone_update_process_db($data, $where)
	{
		$this->db->where($where);
		$this->db->update('mst_sub_zone', $data);
	}

	public function zone_delete_process_db($where)
	{
		$this->db->where($where);
		$this->db->delete('mst_zone');
	}

	public function zone_detail_delete_process_db($where)
	{
		$this->db->where($where);
		$this->db->delete('mst_zone_detail');
	}

	public function subzone_delete_process_db($where)
	{
		$this->db->where($where);
		$this->db->delete('mst_sub_zone');
	}

	public function subzone_detail_delete_process_db($where)
	{
		$this->db->where($where);
		$this->db->delete('mst_sub_zone_detail');
	}

	function city_list_db($where = null)
	{
		if (isset($where)) {
			$this->db->where($where);
		}
		$this->db->order_by("created_date", "DESC");
		$query = $this->db->get('mst_city');

		return $query->result_array();
	}

	public function zone_download_list_db($where = null)
	{
	  if(isset($where)){
		$this->db->where($where);
	  }
	  $this->db->select('a.zone_name, b.country');
	  $this->db->from('mst_zone a');
	  $this->db->join("mst_zone_detail b", "a.id = b.id_zone", "LEFT OUTER");
	  $query = $this->db->get();
	  return $query->result_array();
	}

	public function subzone_download_list_db($where = null)
	{
	  if(isset($where)){
		$this->db->where($where);
	  }
	  $this->db->select('a.sub_zone, b.city');
	  $this->db->from('mst_sub_zone a');
	  $this->db->join("mst_sub_zone_detail b", "a.id = b.id_subzone", "LEFT OUTER");
	  $query = $this->db->get();
	  return $query->result_array();
	}

	public function zone_truncate_process_db()
	{
	  $this->db->truncate('mst_zone');
	}

	public function zone_detail_truncate_process_db()
	{
	  $this->db->truncate('mst_zone_detail');
	}
}
