<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
</head>
<body>
    
    <div class="container-fluid">
        <div class="row" >
            <h1 style="margin: 0px auto;" class="CE">Crear Empleado</h1>
        </div>
        <div class="row">
         <div class="col-md-5">
            <form action="empleados.php" method="POST">
                
                <div class="alert alert-primary" role="alert">
                    Los campos con (*) son obligatorios
                </div>
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" name="nombre" placeholder="Nombre completo del empleado">
                    </div>
                    </div>
                <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Correo electronico</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="correo" id="inputEmail3" placeholder="Correo electronico">
                </div>
                </div>
                <fieldset class="form-group">
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Sexo</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexo" id="gridRadios1" value="M" checked>
                            <label class="form-check-label" for="gridRadios1">
                            Masculino
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexo" id="gridRadios2" value="F">
                            <label class="form-check-label" for="gridRadios2">
                            Femenino
                            </label>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="area" class="col-sm-2 col-form-label">Area</label>
                    <div class="col-sm-10">    
                    <select class="form-control" name="areas">
                        <option value="1">Administraccion</option>
                        <option value="2">Ventas</option>
                        <option value="3">Produccion</option>
                        <option value="4">Calidad</option>
                    </select>
                    </div>
                </div>
                </fieldset>
                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Descripcion</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="descripcion" id="exampleFormControlTextarea1" rows="3" placeholder="Descripcion de la experiencia del empleado"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" id="boletin" name="boletin" value="1" type="checkbox" id="gridCheck11">
                            <label class="form-check-label" for="gridCheck11">
                                Desea recibir boletines informativos
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">Roles</div>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="roles" id="gridRadios1" value="1" checked>
                            <label class="form-check-label" for="gridRadios1">
                                Profesional de proyectos / desarrollador
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="roles" id="gridRadios1" value="2" checked>
                            <label class="form-check-label" for="gridRadios1">
                                Gerente estrategico
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="roles" id="gridRadios1" value="3" checked>
                            <label class="form-check-label" for="gridRadios1">
                                Auxiliar administrativo
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" name="guardar" id="guardar" class="btn btn-primary">Guardar</button>
                </div>
                </div>
            </form>
        </div>
        
        <div class="col-md-7">
            
            <table class="table" id="table">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Sexo</th>
                    <th>Area</th>
                    <th>Boletin</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>

                  </tr>
                </thead>
                <tbody id="list">
        
                    <?php //... de lo contrario, lista los datos completos
                            require("Model/class.consulta.php");

                            $consulta = new Consultas();// Creación automática de una nueva clase consulta
                            $stmt = $consulta->select_lista_usuarios();
                          foreach ($stmt as $dato): ?>
                        <tr>
                            <td><strong><?php echo $dato[1]; ?></strong></td>
                            <td><?php echo ucwords($dato['email'])?></td>
                            <td><?php echo ucwords($dato[3]); ?></td>
                            <td><?php echo $dato['nombre'] ?></td>
                            <td><?php echo $dato['boletin']; ?></td>
                            <td><i id="modificar" class="fa fa-pencil" aria-hidden="true"></i></td>
                            <td><a href="empleados.php?del=eliminar&id=<?php echo $dato[0]; ?>" name="eliminar" id="eliminar" value="eliminar"><i  class="fa fa-trash" aria-hidden="true"></i></a></td>
                            
                        </tr>
                    <?php endforeach;
                           ?>

                </tbody>
                
            </table>
            
        </div>
     </div> 

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>   
</body>
</html>