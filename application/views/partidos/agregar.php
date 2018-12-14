<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <label class="control-label">Agregar Fecha: </label>
        <div class="controls">
            <div id="datepicker" class="input-append">
                <input id="fecha" name="fecha" data-format="yyyy-MM-dd" type="text">
                <span class="add-on">
                    <i data-time-icon="icon-time" data-date-icon="icon-calendar" class="glyphicon glyphicon-calendar"></i>
                </span>
            </div>
        </div>
        <br>
        <button type="button" class="btn btn-primary" id="agregar">Agregar</button>
        <button type="button" class="btn btn-primary" id="agregar_loading" style="display: none;" disabled>Creando Fecha ...</button>
    </div>

</div>

<script type="text/javascript">
    $(function () {
        $('#datepicker').datetimepicker({
            pickTime: false
        });
    });

    $("#agregar").click(function () {
        datos = {
            'fecha': $("#fecha").val()
        };

        $.ajax({
            type: 'POST',
            url: '/partidos/agregar_ajax/',
            data: datos,
            beforeSend: function () {
                $("#agregar").hide();
                $("#agregar_loading").show();
            },
            success: function (data) {
                resultado = $.parseJSON(data);
                if (resultado['status'] == 'error') {
                    $.notify('<strong>' + resultado['data'] + '</strong>',
                            {
                                type: 'danger',
                                allow_dismiss: false
                            });
                    $("#agregar_loading").hide();
                    $("#agregar").show();
                } else if (resultado['status'] == 'ok') {
                    window.location.href = "/partidos/agregar_jugadores/" + resultado['data'] + '/';
                }
            },
            error: function (xhr) { // if error occured
                $.notify('<strong>Ha ocurrido el siguiente error:</strong><br>' + xhr.statusText,
                        {
                            type: 'danger',
                            allow_dismiss: false
                        });
                $("#agregar_loading").hide();
                $("#agregar").show();
            }
        });
    });
</script>