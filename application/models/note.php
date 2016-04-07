<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Note extends CI_Model {

	public function all() {
		$query = "SELECT * FROM notes";
		return $this->db->query($query)->result_array();
	}

	public function add_new($postdata) {
		$query = "INSERT INTO notes (title, created_at, updated_at) VALUES (?, NOW(), NOW())";
		$array = array('title' => $postdata['title']);
		$this->db->query($query, $array);
	}

	public function update($new_description) {
		$query = "UPDATE notes SET description=?, updated_at=NOW() WHERE id=?";
		$array = array('description' => $new_description['description'],
						'id' => $new_description['id']);
		$this->db->query($query, $array);
	}

	public function delete($delete_info) {
		$query = "DELETE FROM notes WHERE id=?";
		$this->db->query($query, $delete_info['id']);
	}
}

