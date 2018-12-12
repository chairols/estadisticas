<?php

class Tablas_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function get_general() {
        $query = $this->db->query("SELECT j.idjugadores, j.apodo, j.nombre, j.apellido, 
                                    (select count(*) from partidos_jugadores WHERE idjugadores = j.idjugadores AND idresultados = '1') as ganados, 
                                    (select count(*) from partidos_jugadores WHERE idjugadores = j.idjugadores AND idresultados = '2') as empatados, 
                                    (select count(*) from partidos_jugadores WHERE idjugadores = j.idjugadores AND idresultados = '3') as perdidos,  
                                    (((select count(*) from partidos_jugadores WHERE idjugadores = j.idjugadores AND idresultados = '1') * 3) +
                                    (select count(*) from partidos_jugadores WHERE idjugadores = j.idjugadores AND idresultados = '2')) as puntos, 
                                    (select count(*) from partidos_jugadores WHERE idjugadores = j.idjugadores) as jugados,
                                    ((((select count(*) from partidos_jugadores WHERE idjugadores = j.idjugadores AND idresultados = '1') * 3) +
                                    (select count(*) from partidos_jugadores WHERE idjugadores = j.idjugadores AND idresultados = '2')) / 
                                    (select count(*) from partidos_jugadores WHERE idjugadores = j.idjugadores)) as promedio,
                                    (select sum(golesF) from partidos_jugadores WHERE idjugadores = j.idjugadores) as golesF,
                                    (select sum(golesC) from partidos_jugadores WHERE idjugadores = j.idjugadores) as golesC
                                    from partidos_jugadores pj, jugadores j WHERE pj.idjugadores = j.idjugadores group by j.apodo ORDER BY puntos DESC, promedio DESC, jugados DESC");
        return $query->result_array();
    }
    
    public function get_anio($anio) {
        $query = $this->db->query("select j.idjugadores, j.apodo, j.nombre, j.apellido, 
                                    (select count(*) from partidos_jugadores pj2, partidos p2 WHERE p2.fecha BETWEEN '$anio-01-01' AND '$anio-12-31' AND p2.idpartidos = pj2.idpartidos AND idjugadores = j.idjugadores AND idresultados = '1') as ganados, 
                                    (select count(*) from partidos_jugadores pj2, partidos p2 WHERE p2.fecha BETWEEN '$anio-01-01' AND '$anio-12-31' AND p2.idpartidos = pj2.idpartidos AND idjugadores = j.idjugadores AND idresultados = '2') as empatados, 
                                    (select count(*) from partidos_jugadores pj2, partidos p2 WHERE p2.fecha BETWEEN '$anio-01-01' AND '$anio-12-31' AND p2.idpartidos = pj2.idpartidos AND idjugadores = j.idjugadores AND idresultados = '3') as perdidos,  
                                    (((select count(*) from partidos_jugadores pj2, partidos p2 WHERE p2.fecha BETWEEN '$anio-01-01' AND '$anio-12-31' AND p2.idpartidos = pj2.idpartidos AND idjugadores = j.idjugadores AND idresultados = '1') * 3) +
                                    (select count(*) from partidos_jugadores pj2, partidos p2 WHERE p2.fecha BETWEEN '$anio-01-01' AND '$anio-12-31' AND p2.idpartidos = pj2.idpartidos AND idjugadores = j.idjugadores AND idresultados = '2')) as puntos, 
                                    (select count(*) from partidos_jugadores pj2, partidos p2 WHERE p2.fecha BETWEEN '$anio-01-01' AND '$anio-12-31' AND p2.idpartidos = pj2.idpartidos AND idjugadores = j.idjugadores) as jugados,
                                    ((((select count(*) from partidos_jugadores pj2, partidos p2 WHERE p2.fecha BETWEEN '$anio-01-01' AND '$anio-12-31' AND p2.idpartidos = pj2.idpartidos AND idjugadores = j.idjugadores AND idresultados = '1') * 3) +
                                    (select count(*) from partidos_jugadores pj2, partidos p2 WHERE p2.fecha BETWEEN '$anio-01-01' AND '$anio-12-31' AND p2.idpartidos = pj2.idpartidos AND idjugadores = j.idjugadores AND idresultados = '2')) / 
                                    (select count(*) from partidos_jugadores pj2, partidos p2 WHERE p2.fecha BETWEEN '$anio-01-01' AND '$anio-12-31' AND p2.idpartidos = pj2.idpartidos AND idjugadores = j.idjugadores)) as promedio,
                                    (select sum(golesF) from partidos_jugadores pj2, partidos p2 WHERE p2.fecha BETWEEN '$anio-01-01' AND '$anio-12-31' AND p2.idpartidos = pj2.idpartidos AND idjugadores = j.idjugadores) as golesF,
                                    (select sum(golesC) from partidos_jugadores pj2, partidos p2 WHERE p2.fecha BETWEEN '$anio-01-01' AND '$anio-12-31' AND p2.idpartidos = pj2.idpartidos AND idjugadores = j.idjugadores) as golesC
                                    from partidos_jugadores pj, jugadores j, partidos p WHERE p.fecha BETWEEN '$anio-01-01' AND '$anio-12-31' AND pj.idjugadores = j.idjugadores GROUP BY j.apodo ORDER BY puntos DESC, promedio DESC, jugados DESC");

        return $query->result_array();
    }
    
    public function get_general_descenso() {
        $query = $this->db->query("SELECT j.idjugadores, j.apodo, j.nombre, j.apellido, 
                                    (select count(*) from partidos_jugadores WHERE idjugadores = j.idjugadores AND idresultados = '1') as ganados, 
                                    (select count(*) from partidos_jugadores WHERE idjugadores = j.idjugadores AND idresultados = '2') as empatados, 
                                    (select count(*) from partidos_jugadores WHERE idjugadores = j.idjugadores AND idresultados = '3') as perdidos,  
                                    (((select count(*) from partidos_jugadores WHERE idjugadores = j.idjugadores AND idresultados = '1') * 3) +
                                    (select count(*) from partidos_jugadores WHERE idjugadores = j.idjugadores AND idresultados = '2')) as puntos, 
                                    (select count(*) from partidos_jugadores WHERE idjugadores = j.idjugadores) as jugados,
                                    ((((select count(*) from partidos_jugadores WHERE idjugadores = j.idjugadores AND idresultados = '1') * 3) +
                                    (select count(*) from partidos_jugadores WHERE idjugadores = j.idjugadores AND idresultados = '2')) / 
                                    (select count(*) from partidos_jugadores WHERE idjugadores = j.idjugadores)) as promedio,
                                    (select sum(golesF) from partidos_jugadores WHERE idjugadores = j.idjugadores) as golesF,
                                    (select sum(golesC) from partidos_jugadores WHERE idjugadores = j.idjugadores) as golesC
                                    from partidos_jugadores pj, jugadores j WHERE pj.idjugadores = j.idjugadores GROUP BY j.apodo ORDER BY promedio DESC, puntos DESC, jugados DESC, golesF DESC");
        return $query->result_array();
    }
    
    public function get_anio_descenso($anio) {
        $query = $this->db->query("select j.idjugadores, j.apodo, j.nombre, j.apellido, 
                                    (select count(*) from partidos_jugadores pj2, partidos p2 WHERE p2.fecha BETWEEN '$anio-01-01' AND '$anio-12-31' AND p2.idpartidos = pj2.idpartidos AND idjugadores = j.idjugadores AND idresultados = '1') as ganados, 
                                    (select count(*) from partidos_jugadores pj2, partidos p2 WHERE p2.fecha BETWEEN '$anio-01-01' AND '$anio-12-31' AND p2.idpartidos = pj2.idpartidos AND idjugadores = j.idjugadores AND idresultados = '2') as empatados, 
                                    (select count(*) from partidos_jugadores pj2, partidos p2 WHERE p2.fecha BETWEEN '$anio-01-01' AND '$anio-12-31' AND p2.idpartidos = pj2.idpartidos AND idjugadores = j.idjugadores AND idresultados = '3') as perdidos,  
                                    (((select count(*) from partidos_jugadores pj2, partidos p2 WHERE p2.fecha BETWEEN '$anio-01-01' AND '$anio-12-31' AND p2.idpartidos = pj2.idpartidos AND idjugadores = j.idjugadores AND idresultados = '1') * 3) +
                                    (select count(*) from partidos_jugadores pj2, partidos p2 WHERE p2.fecha BETWEEN '$anio-01-01' AND '$anio-12-31' AND p2.idpartidos = pj2.idpartidos AND idjugadores = j.idjugadores AND idresultados = '2')) as puntos, 
                                    (select count(*) from partidos_jugadores pj2, partidos p2 WHERE p2.fecha BETWEEN '$anio-01-01' AND '$anio-12-31' AND p2.idpartidos = pj2.idpartidos AND idjugadores = j.idjugadores) as jugados,
                                    ((((select count(*) from partidos_jugadores pj2, partidos p2 WHERE p2.fecha BETWEEN '$anio-01-01' AND '$anio-12-31' AND p2.idpartidos = pj2.idpartidos AND idjugadores = j.idjugadores AND idresultados = '1') * 3) +
                                    (select count(*) from partidos_jugadores pj2, partidos p2 WHERE p2.fecha BETWEEN '$anio-01-01' AND '$anio-12-31' AND p2.idpartidos = pj2.idpartidos AND idjugadores = j.idjugadores AND idresultados = '2')) / 
                                    (select count(*) from partidos_jugadores pj2, partidos p2 WHERE p2.fecha BETWEEN '$anio-01-01' AND '$anio-12-31' AND p2.idpartidos = pj2.idpartidos AND idjugadores = j.idjugadores)) as promedio,
                                    (select sum(golesF) from partidos_jugadores pj2, partidos p2 WHERE p2.fecha BETWEEN '$anio-01-01' AND '$anio-12-31' AND p2.idpartidos = pj2.idpartidos AND idjugadores = j.idjugadores) as golesF,
                                    (select sum(golesC) from partidos_jugadores pj2, partidos p2 WHERE p2.fecha BETWEEN '$anio-01-01' AND '$anio-12-31' AND p2.idpartidos = pj2.idpartidos AND idjugadores = j.idjugadores) as golesC
                                    from partidos_jugadores pj, jugadores j, partidos p WHERE p.fecha BETWEEN '$anio-01-01' AND '$anio-12-31' AND pj.idjugadores = j.idjugadores GROUP BY j.apodo ORDER BY promedio DESC, puntos DESC, jugados DESC, golesF DESC");

        return $query->result_array();
    }
}
?>
