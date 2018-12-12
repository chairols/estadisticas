<form method="post" action='/partidos/index'>

    <label class="control-label">Fecha: </label>
    <div class="controls">
        <div id="datepicker" class="input-append">
            <input id="fecha" name="fecha" data-format="yyyy-MM-dd" type="text">
            <span class="add-on">
                <i data-time-icon="icon-time" data-date-icon="icon-calendar" class="glyphicon glyphicon-calendar"></i>
            </span>
        </div>
    </div>

    <table class="table table-striped">
        <tr>
            <th>
                Resultado 
                <select name='resultado-e1'>
                    <option value='1'>Ganó</option>
                    <option value='2'>Empató</option>
                    <option value='3'>Perdió</option>
                </select>
            </th>
            <th>
                Resultado 
                <select name='resultado-e2'>
                    <option value='1'>Ganó</option>
                    <option value='2'>Empató</option>
                    <option value='3'>Perdió</option>
                </select>
            </th>
        </tr>
    <?php for($i = 0; $i < 7; $i++) { ?>
        <tr>
            <td>
                <select name="jugador-e1-<?=$i?>">
                <?php
                foreach ($jugadores as $jugador) { ?>
                    <option value="<?=$jugador['idJugadores']?>"><?=$jugador['nombre'].' '.$jugador['apellido']?></option>
                <?php
                }
                ?>
                </select>
                GF: <input name="golesF-e1-<?=$i?>" type="text" value="0" size="2" maxlength="2">
                GC: <input name="golesC-e1-<?=$i?>" type="text" value="0" size="2" maxlength="2">
                Figura: <input name="figura-e1-<?=$i?>" type="checkbox">
            </td>
            <td>
                <select name="jugador-e2-<?=$i?>">
                <?php
                foreach ($jugadores as $jugador) { ?>
                    <option value="<?=$jugador['idJugadores']?>"><?=$jugador['nombre'].' '.$jugador['apellido']?></option>
                <?php
                }
                ?>
                </select>
                GF: <input name="golesF-e2-<?=$i?>" type="text" value="0" size="2" maxlength="2">
                GC: <input name="golesC-e2-<?=$i?>" type="text" value="0" size="2" maxlength="2">
                Figura: <input name="figura-e2-<?=$i?>" type="checkbox">
            </td>
        </tr>
    <?php } ?>
        

    </table>
    <button type="submit" class="btn btn-default">Submit</button>
</form>

<script type="text/javascript">
    $(function() {
        $('#datepicker').datetimepicker({
            pickTime: false
        });
    });
</script>