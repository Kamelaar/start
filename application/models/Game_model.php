<?php
/**
 * Created by IntelliJ IDEA.
 * User: Informatique
 * Date: 09/06/2019
 * Time: 15:34
 */

class Game_model extends CI_Model
{
	public function insert_player_session($player_name, $score)
	{
		// assign the data to an array
		$data = array
		(
			'name'		=> $player_name,
			'score'		=> $score,
		);

		//insert image to the database
		$this->db->insert('player', $data);
	}

	public function get_ranking()
	{
		$query = $this->db->get('player');

		return $query->result();
	}

}
