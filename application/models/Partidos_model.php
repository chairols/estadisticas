<?php
class Partidos_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function set_partido($fecha) {
        $data['fecha'] = $fecha;
        $this->db->insert('partidos', $data);
        
        return $this->db->insert_id();
    }
    
    public function get_partido($idpartido) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        partidos
                                    WHERE
                                        idPartidos = '$idpartido'");
        return $query->row_array();
    }
    
    public function get_partidos() {
        $query = $this->db->query("SELECT *
                                    FROM
                                        partidos");
        return $query->result_array();
    }
    
    public function get_partidos_por_anio($anio) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        partidos
                                    WHERE
                                        fecha
                                    BETWEEN 
                                        '$anio-01-01' AND '$anio-12-31'");
        return $query->result_array();
    }
}
?>
