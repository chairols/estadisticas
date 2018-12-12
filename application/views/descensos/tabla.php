<div class="text-center"><h3><?=$title?></h3></div>
<div class="col-md-4 col-md-offset-4">
    <table class="table table-condensed table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>PTS</th>
                <th>PJ</th>
                <th>G</th>
                <th>E</th>
                <th>P</th>
                <th>Prom</th>
                <th>GF</th>
                <th>GC</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $tabla2 = array();
            
            foreach($tabla as $key => $value) {
                
                if($value['jugados'] > 15) {
                    $tabla2[] = $value;
                }
            }
            
            $cantidad = count($tabla2);
            
            foreach($tabla2 as $key => $t) { 
                if($t['jugados'] > 0) {?>
            <tr <?=($key > $cantidad-3)?"class='alert-danger'":""?>>
                <td><a href="/jugador/<?=$t['idjugadores']?>/"><?=$t['apodo']?></a></td>
                <td><?=$t['puntos']?></td>
                <td><?=$t['jugados']?></td>
                <td><?=$t['ganados']?></td>
                <td><?=$t['empatados']?></td>
                <td><?=$t['perdidos']?></td>
                <td><?=number_format($t['promedio'], 3)?></td>
                <td><?=$t['golesF']?></td>
                <td><?=$t['golesC']?></td>
            </tr>
                <?php } } ?>
        </tbody>
    </table>
</div>