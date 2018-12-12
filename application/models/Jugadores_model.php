<?php
class Jugadores_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function get_jugadores() {
        $query = $this->db->query("SELECT * 
                                    FROM 
                                        jugadores
                                    ORDER BY
                                        nombre, apellido");
        return $query->result_array();
    }
    
    public function get_jugador($id) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        jugadores
                                    WHERE
                                        idJugadores = '$id'");
        return $query->row_array();
    }
    
    public function set_jugador($data) {
        $this->db->insert('jugadores', $data);
        
        return $this->db->insert_id();
    }
    
    public function update($data, $id) {
        $this->db->update('jugadores', $data, array('idJugadores' => $id));
        
    }
}
?>
