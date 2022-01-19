<?php
	class Common_model extends CI_Model {
		function __construct(){
			parent::__construct();
		}
		public function insertTableData($tableName = '', $data = array()){
			$this->db->insert($tableName, $data);
			return $this->db->insert_id();
		}
		public function deleteTableData($tableName = '', $where = array()){
			if ((is_array($where)) && (count($where) > 0)) {
				$this->db->where($where);
			}
			$this->db->delete($tableName);
			return $this->db->affected_rows();
		}
		public function updateTableData($tableName = '', $where = array(), $data = array()){
			if ((is_array($where)) && (count($where) > 0)) {
				$this->db->where($where);
			}
			return $this->db->update($tableName, $data);
		}
		public function getTableData($tableName = '', $where = array(), $selectFields = '', $like = array(), $where_or = array(), $like_or = array(), $offset = '', $limit = '', $orderBy = array(), $groupBy = array(), $where_not = array(), $where_in = array()){
			if ((is_array($where)) && (count($where) > 0)) {
				$this->db->where($where);
			}
			if ((is_array($where_not)) && (count($where_not) > 0)) {
				$this->db->where_not_in($where_not[0],$where_not[1]);
			}
			if ((is_array($where_in)) && (count($where_in) > 0)) {
				$this->db->where_in($where_in[0],$where_in[1]);
			}
			if ((is_array($where_or)) && (count($where_or) > 0)) {
				$this->db->or_where($where_or);
			}
			if ((is_array($like)) && (count($like) > 0)) {
				$this->db->like($like);
			}
			if ((is_array($like_or)) && (count($like_or) > 0)) {
				$this->db->or_like($like_or);
			}
			if ($selectFields != '') {
				$this->db->select($selectFields);
			}
			if (is_array($groupBy) && (count($groupBy) > 0)) {
				$this->db->group_by($groupBy[0]);
			}
			if (is_array($orderBy) && (count($orderBy) > 0)) {
				if(count($orderBy) > 2){
					$this->db->order_by($orderBy[0].' '.$orderBy[1].','.$orderBy[2].' '.$orderBy[3]);
				}else{
					$this->db->order_by($orderBy[0], $orderBy[1]);
				}
			}
			if($limit != '' && $offset != ''){
				$this->db->limit($limit, $offset);
			}
			if($limit != '' && $offset == ''){
				$this->db->limit($limit);
			}
			return $this->db->get($tableName);
		}  
		public function customQuery($query) {
			$query = str_replace('PROCEDURE ANALYSE()','',$query);
			$query = str_replace('PROCEDURE','',$query);
			$query = str_replace('ANALYSE()','',$query);
			return $this->db->query($query);
		}
		public function getJoinedTableData($tableName = '', $joins = array(),  $where = array(), $selectFields = '', $like = array(), $where_or = array(), $like_or = array(), $offset = '', $limit = '', $orderBy = array(), $group_by = array(), $where_in = array()){
			$this->db->from($tableName);		
			if ((is_array($joins)) && (count($joins) > 0)) {
				foreach($joins as $jointb=>$joinON){
					$this->db->join($jointb, $joinON);
				}
			}
			if ((is_array($where_in)) && (count($where_in) > 0)) {
				$this->db->where_in($where_in[0],$where_in[1]);
			}
			if ((is_array($where)) && (count($where) > 0)) {
				$this->db->where($where);
			}
			if ((is_array($where_or)) && (count($where_or) > 0)) {
				$this->db->or_where($where_or);
			}
			if ((is_array($like)) && (count($like) > 0)) {
				$this->db->like($like);
			}
			if ((is_array($like_or)) && (count($like_or) > 0)) {
				$this->db->or_like($like_or);
			}
			if ($selectFields != '') {
				$this->db->select($selectFields, false);
			}
			if (is_array($orderBy) && (count($orderBy) > 0)) {
				$this->db->order_by($orderBy[0], $orderBy[1]);
			}
			if (is_array($group_by) && (count($group_by) > 0)) {
				$this->db->group_by($group_by[0]);
			}
			if($limit != '' && $offset != ''){
				$this->db->limit($limit, $offset);
			}
			if($limit != '' && $offset == ''){
				$this->db->limit($limit);
			}
			return $this->db->get();
		} 
		public function getTableDatas($tableName = '', $where = array(), $selectFields = '', $like = array(), $where_or = array(), $like_or = array(), $offset = '', $limit = '', $orderBy = array(), $groupBy = array(), $where_not = array(), $where_in = array()){
			if ((is_array($where)) && (count($where) > 0)) {
				$this->db->where($where);
			}
			if ((is_array($where_not)) && (count($where_not) > 0)) {
				$this->db->where_not_in($where_not[0],$where_not[1]);
			}
			if ((is_array($where_in)) && (count($where_in) > 0)) {
				$this->db->where_in($where_in[0],$where_in[1]);
			}
			if ((is_array($where_or)) && (count($where_or) > 0)) {
				$this->db->or_where($where_or);
			}
			$this->db->group_start();
			if ((is_array($like)) && (count($like) > 0)) {
				$this->db->like($like);
			}
			if ((is_array($like_or)) && (count($like_or) > 0)) {
				$this->db->or_like($like_or);
			}
			$this->db->group_end();
			if ($selectFields != '') {
				$this->db->select($selectFields);
			}
			if (is_array($groupBy) && (count($groupBy) > 0)) {
				$this->db->group_by($groupBy[0]);
			}
			if (is_array($orderBy) && (count($orderBy) > 0)) {
				if(count($orderBy) > 2){
					$this->db->order_by($orderBy[0].' '.$orderBy[1].','.$orderBy[2].' '.$orderBy[3]);
				}else{
					$this->db->order_by($orderBy[0], $orderBy[1]);
				}
			}
			if($limit != '' && $offset != ''){
				$this->db->limit($limit, $offset);
			}
			if($limit != '' && $offset == ''){
				$this->db->limit($limit);
			}
			return $this->db->get($tableName);
		}  
		public function getJoinedTableDatas($tableName = '', $joins = array(),  $where = array(), $selectFields = '', $like = array(), $where_or = array(), $like_or = array(), $offset = '', $limit = '', $orderBy = array(), $group_by = array()){
			$this->db->from($tableName);		
			if ((is_array($joins)) && (count($joins) > 0)) {
				foreach($joins as $jointb=>$joinON){
					$this->db->join($jointb, $joinON);
				}
			}
			if ((is_array($where)) && (count($where) > 0)) {
				$this->db->where($where);
			}
			if ((is_array($where_or)) && (count($where_or) > 0)) {
				$this->db->or_where($where_or);
			}
			$this->db->group_start();
			if ((is_array($like)) && (count($like) > 0)) {
				$this->db->like($like);
			}
			if ((is_array($like_or)) && (count($like_or) > 0)) {
				$this->db->or_like($like_or);
			}
			$this->db->group_end();
			if ($selectFields != '') {
				$this->db->select($selectFields, false);
			}
			if (is_array($orderBy) && (count($orderBy) > 0)) {
				$this->db->order_by($orderBy[0], $orderBy[1]);
			}
			if (is_array($group_by) && (count($group_by) > 0)) {
				$this->db->group_by($group_by[0]);
			}
			if($limit != '' && $offset != ''){
				$this->db->limit($limit, $offset);
			}
			if($limit != '' && $offset == ''){
				$this->db->limit($limit);
			}
			return $this->db->get();
		} 
		public function getleftJoinedTableData($tableName = '', $joins = array(),  $where = array(), $selectFields = '', $like = array(), $where_or = array(), $like_or = array(), $offset = '', $limit = '', $orderBy = array(), $group_by = array(), $where_in = array()){
			$this->db->from($tableName);		
			if ((is_array($joins)) && (count($joins) > 0)) {
				foreach($joins as $jointb=>$joinON){
					$this->db->join($jointb, $joinON, 'LEFT');
				}
			}
			if ((is_array($where)) && (count($where) > 0)) {
				$this->db->where($where);
			}
			if ((is_array($where_in)) && (count($where_in) > 0)) {
				$this->db->where_in($where_in[0],$where_in[1]);
			}
			if ((is_array($where_or)) && (count($where_or) > 0)) {
				$this->db->or_where($where_or);
			}
			if ((is_array($like)) && (count($like) > 0)) {
				$this->db->like($like);
			}
			if ((is_array($like_or)) && (count($like_or) > 0)) {
				$this->db->or_like($like_or);
			}
			if ($selectFields != '') {
				$this->db->select($selectFields);
			}
			if (is_array($orderBy) && (count($orderBy) > 0)) {
				$this->db->order_by($orderBy[0], $orderBy[1]);
			}
			if (is_array($group_by) && (count($group_by) > 0)) {
				$this->db->group_by($group_by[0]);
			}
			if($limit != '' && $offset != ''){
				$this->db->limit($limit, $offset);
			}
			if($limit != '' && $offset == ''){
				$this->db->limit($limit);
			}
			return $this->db->get();
		}
		public function getlsitTableData($tableName = '', $where = array(), $selectFields = '', $like = array(), $where_or = array(), $like_or = array(), $offset = '', $limit = '', $orderBy = array(), $groupBy = array(), $where_not = array(), $where_in = array()){
			if ((is_array($where)) && (count($where) > 0)) {
				$this->db->where($where);
			}
			if ((is_array($where_not)) && (count($where_not) > 0)) {
				$this->db->where_not_in($where_not[0],$where_not[1]);
			}
			if ((is_array($where_in)) && (count($where_in) > 0)) {
				$this->db->where_in($where_in[0],$where_in[1]);
			}
			if ((is_array($where_or)) && (count($where_or) > 0)) {
				$this->db->or_where($where_or);
			}
			if ((is_array($like)) && (count($like) > 0)) {
				$this->db->like($like);
			}
			if ((is_array($like_or)) && (count($like_or) > 0)) {
				$this->db->or_like($like_or);
			}
			if ($selectFields != '') {
				$this->db->select($selectFields);
			}
			if (is_array($groupBy) && (count($groupBy) > 0)) {
				$this->db->group_by($groupBy[0]);
			}
			if (is_array($orderBy) && (count($orderBy) > 0)) {
				if(count($orderBy) > 2){
					$this->db->order_by($orderBy[0].' '.$orderBy[1].','.$orderBy[2].' '.$orderBy[3]);
				}else{
					$this->db->order_by($orderBy[0], $orderBy[1]);
				}
			}
			if($limit != '' && $offset != ''){
				$this->db->limit($limit, $offset);
			}
			if($limit != '' && $offset == ''){
				$this->db->limit($limit);
			}
			return $this->db->get($tableName);
		}
	}