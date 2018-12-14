<div class="text-center"><h3><?=$title?></h3></div>
<form class="form-horizontal">
    <div class="form-group">
        <label class="col-sm-6 control-label">Nombre</label>
        <div class="col-sm-6">
            <div class="radio"><?=$jugador['nombre']?></div>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-6 control-label">Apellido</label>
        <div class="col-sm-6">
            <div class="radio"><?=$jugador['apellido']?></div>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-6 control-label">Apodo</label>
        <div class="col-sm-6">
            <div class="radio"><?=$jugador['apodo']?></div>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-6 control-label">Goles a Favor</label>
        <div class="col-sm-6">
            <div class="radio"><?=$golesF['GF']?></div>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-6 control-label">Goles en Contra</label>
        <div class="col-sm-6">
            <div class="radio"><?=$golesC['GC']?></div>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-6 control-label">Figura</label>
        <div class="col-sm-6">
            <div class="radio"><?=$figura['figura']?></div>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-6 control-label">Racha de Goles</label>
        <div class="col-sm-6">
            <div class="radio"><?=$racha['racha']?></div>
        </div>
    </div>
</form>

<div class="row">
    <div class="col-md-2 col-md-offset-4"><b>Ganados (<?=count($ganados)?>)</b><br>
        <?php
        foreach($ganados as $ganado) { ?>
        <a href="/partidos/resultado/<?=$ganado['idPartidos']?>/"><?=$ganado['fecha']?></a><br>
        <?php } ?>
    </div>
    <div class="col-md-2"><b>Empatados (<?=count($empatados)?>)</b><br>
        <?php
        foreach($empatados as $empatado) { ?>
        <a href="/partidos/resultado/<?=$empatado['idPartidos']?>/"><?=$empatado['fecha']?></a><br>
        <?php } ?>
    </div>
    <div class="col-md-2"><b>Perdidos (<?=count($perdidos)?>)</b><br>
        <?php
        foreach($perdidos as $perdido) { ?>
        <a href="/partidos/resultado/<?=$perdido['idPartidos']?>/"><?=$perdido['fecha']?></a><br>
        <?php } ?>
    </div>
</div>
