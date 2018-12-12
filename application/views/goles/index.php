<div class="text-center"><h3><?=$title?></h3></div>

<table class="table table-bordered table-condensed">
    <tr>
        <th>Jugador</th>
        <?php foreach($partidos as $partido) { ?>
        <th><?=$partido['idPartidos']?></th>
        <?php } ?>
        <th>Total</th>
    </tr>
    
    <?php 
    foreach($jugadores as $jugador) { 
        $id = null;
        foreach($partidos as $partido) {
            foreach($jugador['partidos'] as $p) {
                if($partido['idPartidos'] == $p['idPartidos']) {
                    $id = $jugador['idJugadores'];
                }
            }
        }
        if($id != null) { ?>
            <tr><th><?=$jugador['apodo']?></th>
        <?php
            $total = 0;
            foreach($partidos as $partido) {
                $flag = 0;
                $goles = 0;
                $resultado = 0;
                foreach($jugador['partidos'] as $p) {
                    if($partido['idPartidos'] == $p['idPartidos'] && $p['idJugadores'] == $id) {
                        $flag = 1;
                        $goles = $p['golesF'];
                        $total += $p['golesF'];
                        $resultado = $p['idResultados'];
                    } 
                    
                }
                if($flag == 1) {
                    $class = 0;
                    switch ($resultado) {
                        case 1:
                            $class = "alert alert-success";
                            break;
                        case 2:
                            $class = "alert alert-warning";
                            break;
                        case 3:
                            $class = "alert alert-danger";
                            break;
                    }
                    ?>
                    <td class="<?=$class?>"><a href="/partidos/resultado/<?=$partido['idPartidos']?>/"><?=$goles?></td>
                <?php
                } else { ?>
                    <td class="btn-danger">A</td>
                <?php
                }
            } ?>
                <td><?=$total?></td>
            </tr>
            <?php
        }
    }
    ?>
</table>