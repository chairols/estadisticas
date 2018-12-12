<div class="text-center"><h3><?=$title?> <?=strftime('%d/%m/%Y', strtotime($partido['fecha']))?></h3></div>

<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <table class="table table-condensed table-striped table-bordered">
            <tr>
                <th>Equipo 1
                <?php
                $goles = 0;
                  foreach($equipo1 as $e1) {
                      $goles+=$e1['golesF'];
                  }  
                  foreach($equipo2 as $e2) {
                      $goles+=$e2['golesC'];
                  }
                ?> (<?=$goles?>)</th>
                <th>Equipo 2
                <?php
                $goles = 0;
                  foreach($equipo2 as $e2) {
                      $goles+=$e2['golesF'];
                  }  
                  foreach($equipo1 as $e1) {
                      $goles+=$e1['golesC'];
                  }
                ?> (<?=$goles?>)</th>
            </tr>
            <tr>
                <td>
                    <?php foreach($equipo1 as $e1) { ?>
                    <?=$e1['jugador']['apodo']?> <?=($e1['golesF']>0)?"(".$e1['golesF'].")":""?> <?=($e1['golesC']>0)?"(-".$e1['golesC'].")":""?><br>
                    <?php } ?>
                </td>
                <td>
                    <?php foreach($equipo2 as $e2) { ?>
                    <?=$e2['jugador']['apodo']?> <?=($e2['golesF']>0)?"(".$e2['golesF'].")":""?> <?=($e2['golesC']>0)?"(-".$e2['golesC'].")":""?><br>
                    <?php } ?>
                </td>
            </tr>
        </table>
        <?php
        $i = 0;
        foreach($equipo1 as $e1) { 
            if($e1['mejor'] == 1)
                $i++;
        }
        foreach($equipo2 as $e2) { 
            if($e2['mejor'] == 1)
                $i++;
        }
        
        if($i > 0) { ?>
        <h4>Jugador del partido</h4>
        <?php
        foreach($equipo1 as $e1) { 
            if($e1['mejor'] == 1)
                echo $e1['jugador']['apodo']."<br>";
        }
        foreach($equipo2 as $e2) { 
            if($e2['mejor'] == 1)
                echo $e2['jugador']['apodo']."<br>";
        }
        } ?>
    </div>
</div>