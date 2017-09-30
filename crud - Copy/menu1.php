<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="vista.php">Unicaes-CRI</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="vista.php">Inicio</a></li>
   <li ><a href="admin.php">Registro de Usuarios </a></li>
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#">Bienvenido <strong><?php echo $_SESSION['user'];?></strong></a></li>
      <li><a href="desconectar.php"><span class="glyphicon glyphicon-log-in"></span> Cerrar Sesion</a></li>
    </ul>
  </div>
</nav>