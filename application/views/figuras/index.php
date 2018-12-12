<div class="text-center"><h3><?=$title?></h3></div>
<div class="col-md-2 col-md-offset-5">
    <table class="table table-striped table-condensed table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($tabla as $t) { 
                if($t['mejor'] > 0) {?>
            <tr>
                <td><a href="/jugador/<?=$t['idJugadores']?>/"><?=$t['apodo']?></a></td>
                <td><?=$t['mejor']?></td>
            </tr>
                <?php } } ?>
        </tbody>
    </table>
</div>