<div class="container" style="width: 45%;">
<div id="navbar">
    <nav class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="navbar-header">
            <button type="button" style="width: 100%;" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navbar-collapse-1">
            <ul class="nav navbar-nav">

                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Categorias<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <?php
                        require_once('../Models/Categoria.php');
                        use Models\Categoria;
                        $obj = new Categoria();
                        $filas = $obj->read();
                        while($row = mysqli_fetch_array($filas)){
                            echo '<li><a href="filtroCategorias.php?idCat='.$row['idCategoria'].'">'.$row['descripcion'].'</a></li>';
                        }
                        ?>
                    </ul>
                </li>

                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Colores<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <?php
                        require_once('../Models/Color.php');
                        use Models\Color;
                        $obj = new Color();
                        $filas = $obj->read();
                        while($row = mysqli_fetch_array($filas)){
                            echo '<li><a href="filtroColores.php?idCol='.$row['idColor'].'">'.$row['descripcionColor'].'</a></li>';
                        }
                        ?>
                    </ul>
                </li>
                <li>
                    <form action="filtroPrecio.php" method="post">
                    <table>
                        <tr>
                            <td><input name="txtDesde" class="form-control" style="margin-top: 5%" type="number" placeholder="DESDE $"/></td>
                            <td><input name="txtHasta" class="form-control" style="margin-top: 5%" type="number" placeholder="HASTA $"/></td>
                            <td><input value="Buscar"  class="form-control" style="margin-top: 15%" type="submit"/></td>
                        </tr>
                    </table>

                    </form>
                </li>


            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</div>
</div>