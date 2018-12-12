<?php

class Figuras_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function get_general() {
        $query = $this->db->query("SELECT sum(pj.mejor) as mejor, j.apodo, j.idJugadores 
                                    FROM 
                                        partidos_Jugadores pj, jugadores j
                                    WHERE 
                                        pj.idJugadores = j.idJugadores
                                    GROUP BY 
                                        j.apodo
                                    ORDER BY 
                                        mejor DESC");
        
        return $query->result_array();
    }
    
    public function get_anio($anio) {
        $query = $this->db->query("SELECT sum(pj.mejor) as mejor, j.apodo , j.idJugadores
                                    FROM 
                                        partidos_jugadores pj, jugadores j, partidos p
                                    WHERE 
                                        pj.idJugadores = j.idJugadores AND
                                        pj.idPartidos = p.idPartidos AND
                                        p.fecha BETWEEN '$anio-01-01' AND '$anio-12-31'
                                    GROUP BY 
                                        j.apodo
                                    ORDER BY 
                                        mejor DESC");
        
        return $query->result_array();
    }
}
?>
