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
            <input type="text" class="form-control" name="nombre" placeholder="Nombre ..." autofocus>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-5 control-label">Apellido</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="apellido" placeholder="Apellido ...">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-5 control-label">Apodo</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="apodo" placeholder="Apodo ...">
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-sm-offset-6">
            <button type="submit" class="btn btn-default">Agregar</button>
        </div>
    </div>
</form>