<div class="text-center"><h3><?=$title?></h3></div>
<div class="col-md-4 col-md-offset-4">
    <table class="table table-striped table-condensed table-bordered">
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
            foreach($tabla as $t) { 
                if($t['jugados'] > 0) {?>
            <tr>
                <td><a href="/jugador/<?=$t['idJugadores']?>/"><?=$t['apodo']?></a></td>
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