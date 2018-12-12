<!DOCTYPE html>
<html>
  <head>
    <title><?=$title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Bootstrap -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/assets/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link href="/assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <script src="/assets/js/jquery-1.10.2.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/bootstrap-datetimepicker.min.js"></script>
  </head>
  <body>
      <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">Straface.com.ar</a>
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
              <span class="glyphicon glyphicon-chevron-down"></span>
            </button>
        </div>
        
          
          
        <div class="collapse navbar-collapse navHeaderCollapse">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tablas <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/tabla/">Tabla General</a></li>
                        <li><a href="/tabla/2013/">Tabla 2013</a></li>
                        <li><a href="/tabla/2014/">Tabla 2014</a></li>
                        <li><a href="/tabla/2015/">Tabla 2015</a></li>
                        <li><a href="/tabla/2018/">Tabla 2018</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Descensos <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/descensos/">Tabla General</a></li>
                        <li><a href="/descensos/2013/">Tabla 2013</a></li>
                        <li><a href="/descensos/2014/">Tabla 2014</a></li>
                        <li><a href="/descensos/2015/">Tabla 2015</a></li>
                        <li><a href="/descensos/2018/">Tabla 2018</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Goleadores <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/goleadores/">Tabla General</a></li>
                        <li><a href="/goleadores/2013/">Tabla 2013</a></li>
                        <li><a href="/goleadores/2014/">Tabla 2014</a></li>
                        <li><a href="/goleadores/2015/">Tabla 2015</a></li>
                        <li><a href="/goleadores/2018/">Tabla 2018</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Figuras <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/figuras/">Tabla General</a></li>
                        <li><a href="/figuras/2013/">Tabla 2013</a></li>
                        <li><a href="/figuras/2014/">Tabla 2014</a></li>
                        <li><a href="/figuras/2015/">Tabla 2015</a></li>
                        <li><a href="/figuras/2018/">Tabla 2018</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Goles / Asistencias <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/goles/">Tabla General</a></li>
                        <li><a href="/goles/2013/">Tabla 2013</a></li>
                        <li><a href="/goles/2014/">Tabla 2014</a></li>
                        <li><a href="/goles/2015/">Tabla 2015</a></li>
                        <li><a href="/goles/2018/">Tabla 2018</a></li>
                    </ul>
                </li>
                <?php if(isset($session['SID'])) { ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Jugadores <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/jugador/agregar/">Agregar</a></li>
                        <li><a href="/jugador/editar/">Modificar</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/partidos/">Agregar Partido</a>
                </li>
                <?php } ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if(isset($session['SID'])) { ?>
                <li>
                    <a href="/login/logout/">Logout&nbsp;&nbsp;&nbsp;&nbsp;</a>
                </li>
                <?php } else { ?>
                <li>
                    <a href="/login/">Login&nbsp;&nbsp;&nbsp;&nbsp;</a>
                </li>
                <?php } ?>
            </ul>
        </div>
      </nav>
      <br><br><br>
      