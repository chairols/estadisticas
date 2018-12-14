<div class="text-center"><h3><?=$title?></h3></div>

<div class="col-lg-offset-5 col-lg-2">
    <table class="table table-bordered table-condensed table-striped">
        <tr>
            <th>Jugador</th>
            <th>Apodo</th>
        </tr>
        <?php foreach($jugadores as $jugador) { ?>
        <tr>
            <td><a href="/jugador/editar/<?=$jugador['idJugadores']?>/"><?=$jugador['nombre'].' '.$jugador['apellido']?></a></td>
            <td><a href="/jugador/editar/<?=$jugador['idJugadores']?>/"><?=$jugador['apodo']?></a></td>
        </tr>
        <?php } ?>
    </table>
</div>