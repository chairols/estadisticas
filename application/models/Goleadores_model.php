<?php

class Goleadores_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function get_general() {
        $query = $this->db->query("SELECT sum(pj.golesF) as goles, j.apodo, j.idJugadores 
                                    FROM 
                                        partidos_jugadores pj, jugadores j
                                    WHERE 
                                        pj.idJugadores = j.idJugadores
                                    GROUP BY 
                                        j.apodo
                                    ORDER BY 
                                        goles DESC");
        
        return $query->result_array();
    }
    
    public function get_anio($anio) {
        $query = $this->db->query("SELECT sum(pj.golesF) as goles, j.apodo, j.idJugadores 
                                    FROM 
                                        partidos_jugadores pj, jugadores j, partidos p
                                    WHERE 
                                        pj.idJugadores = j.idJugadores AND
                                        pj.idpartidos = p.idpartidos AND
                                        p.fecha BETWEEN '$anio-01-01' AND '$anio-12-31'
                                    GROUP BY 
                                        j.apodo
                                    ORDER BY 
                                        goles DESC");
        
        return $query->result_array();
    }
}
?>
