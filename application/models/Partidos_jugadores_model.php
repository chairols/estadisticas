<?php
class Partidos_jugadores_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function set_partidos_jugadores($data) {
        $this->db->insert('partidos_jugadores', $data);
    }
    
    public function get_partidos_por_resultado($idjugador, $idresultado) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        partidos_jugadores pj, 
                                        partidos p
                                    WHERE
                                        pj.idPartidos = p.idPartidos AND
                                        pj.idJugadores = '$idjugador' AND
                                        pj.idResultados = '$idresultado'
                                    ORDER BY
                                        p.fecha DESC");
        return $query->result_array();
    }
    
    public function goles_a_favor($idjugador) {
        $query = $this->db->query("SELECT sum(golesF) as GF
                                    FROM
                                        partidos_jugadores 
                                    WHERE
                                        idJugadores = '$idjugador'");
        return $query->row_array();
    }
    
    public function goles_en_contra($idjugador) {
        $query = $this->db->query("SELECT sum(golesC) as GC
                                    FROM
                                        partidos_jugadores 
                                    WHERE
                                        idJugadores = '$idjugador'");
        return $query->row_array();
    }
    
    public function cantidad_de_veces_figura($idjugador) {
        $query = $this->db->query("SELECT sum(mejor) as figura
                                    FROM
                                        partidos_jugadores
                                    WHERE
                                        idJugadores = '$idjugador'");
        return $query->row_array();
    }
    
    public function racha_goles($idjugador) {
        $query = $this->db->query("SELECT max(golesF) as racha 
                                    FROM
                                        partidos_jugadores
                                    WHERE
                                        idJugadores = '$idjugador' 
                                    ORDER BY
                                        golesF DESC");
        return $query->row_array();
    }
    
    public function get_equipo($idequipo, $idpartido) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        partidos_jugadores
                                    WHERE
                                        equipo = '$idequipo' AND
                                        idPartidos = '$idpartido'");
        return $query->result_array();
    }
    
    public function get_partidos_por_jugador($idjugador) {
        $query = $this->db->query("SELECT *
                                    FROM
                                        partidos_jugadores
                                    WHERE
                                        idJugadores = '$idjugador'");
        return $query->result_array();
    }
}
?>
