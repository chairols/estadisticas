<div class="text-center"><h3><?=$title?></h3></div>

<?php if(strlen(validation_errors()) > 0) { ?>
<div class="text-center alert alert-danger">
<?php echo validation_errors(); ?>
</div>
<?php } ?>
<form class="form-horizontal" method="post">
    <div class="form-group">
        <label class="col-sm-5 control-label">Nombre</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="nombre" placeholder="Nombre ..." value="<?=$jugador['nombre']?>" autofocus>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-5 control-label">Apellido</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="apellido" value="<?=$jugador['apellido']?>" placeholder="Apellido ...">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-5 control-label">Apodo</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="apodo" value="<?=$jugador['apodo']?>" placeholder="Apodo ...">
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-sm-offset-6">
            <button type="submit" class="btn btn-default">Editar</button>
        </div>
    </div>
</form>