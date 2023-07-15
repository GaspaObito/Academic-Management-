<?php include '../Template/CabeceraAnot.php'; ?>
<main class="ContainerGeneral">
    <h1 id="TitleStart">ACTUALIZAR REGISTRO DEL PROFESOR</h1>
    <?php
    include '../Config/Conexion.php';
    $Id_Profe = $_POST['NumeroModificar'];
    ($consultar = mysqli_query($conexion, "SELECT p.*, i.Nombre_Imagen,i.Id_Imagen FROM profesor p LEFT JOIN imagenes i ON p.Id_Imagen = i.Id_Imagen WHERE Id_Profesor='$Id_Profe'")) or die('ERROR AL TRAER LOS DATOS');
    echo '
    <form action="../Config/Formularios_Admin.php" method="post" class="formulario" enctype="multipart/form-data">
        <fieldset>
            <div class="formulario__campos1">';
                while ($extraido = mysqli_fetch_array($consultar)) {
                echo ' 
                <div>
                    <label>Nombre</label>
                    <div class="setting">
                        <input class="Input_Text" type="text" name="nombre" placeholder="Nombre del Profesor" value="' . $extraido['Nombre'] . '">
                        <svg class="navbar-icon" style="margin:0">
                            <use xlink:href="../Assets/Svg/Setting.svg#Setting-icon">
                        </svg>                                      
                    </div>
                </div>
                <div>
                    <label>Apellido</label>
                    <div class="setting">
                        <input class="Input_Text " type="text" name="Apellido" placeholder="Apellido del Profesor" value="' . $extraido['Apellido'] . '">        
                        <svg class="navbar-icon" style="margin:0">
                            <use xlink:href="../Assets/Svg/Setting.svg#Setting-icon">
                        </svg>   
                    </div>
                </div>
                <div>
                    <label>Numero de Documento</label>
                    <div class="setting">
                        <input class="Input_Text" type="number" name="NumDocumento" placeholder="Numero de documento" value="' . $extraido['Numero_Documento'] . '">                  
                        <svg class="navbar-icon" style="margin:0">
                            <use xlink:href="../Assets/Svg/Setting.svg#Setting-icon">
                        </svg>                    
                    </div>
                </div>
                <div>
                    <label>Teléfono</label>
                    <div class="setting">
                        <input class="Input_Text" type="number" name="Telefono" placeholder="Teléfono del Profesor" value="' . $extraido['Telefono'] . '">                          
                        <svg class="navbar-icon" style="margin:0">
                            <use xlink:href="../Assets/Svg/Setting.svg#Setting-icon">
                        </svg>                             
                    </div>
                </div>
                <div>
                    <label>Fecha Nacimiento</label>
                    <div class="setting">
                        <input class="Input_Text" type="date" name="Fecha_Nacimiento" placeholder="Fecha de Nacimiento del Profesor" value="' . $extraido['Fecha_Nacimiento'] . '">                            
                        <svg class="navbar-icon" style="margin:0">
                            <use xlink:href="../Assets/Svg/Setting.svg#Setting-icon">
                        </svg>   
                    </div>
                </div>
                <div>
                    <label>Asignación Academica</label>
                    <div class="setting">
                        <input class="Input_Text" type="text" name="AsignaturaAca" placeholder="Asignatura Academica del Profesor" value="' . $extraido['Asignacion_Academica'] . '">                            
                        <svg class="navbar-icon" style="margin:0">
                            <use xlink:href="../Assets/Svg/Setting.svg#Setting-icon">
                        </svg>                            
                    </div>
                </div>
                <div>
                    <label>Asignatura</label>
                    <div class="setting">
                        <input class="Input_Text" type="text" name="AsignaturaProfe" placeholder="Asignatura del Profesor" value="' . $extraido['Asignatura'] . '">                      
                        <svg class="navbar-icon" style="margin:0">
                            <use xlink:href="../Assets/Svg/Setting.svg#Setting-icon">
                        </svg>                          
                    </div>
                </div>
                <div>
                    <label>Area</label>
                    <div class="setting">
                        <input class="Input_Text" type="text" name="Area" placeholder="Area del Profesor" value="' . $extraido['Area'] . '">                         
                        <svg class="navbar-icon" style="margin:0">
                            <use xlink:href="../Assets/Svg/Setting.svg#Setting-icon">
                        </svg>                              
                    </div>
                </div>
                <div>
                    <label>Email</label>
                    <div  class="setting">
                        <input class="Input_Text" type="text" name="Correo" placeholder="Correo del Profesor" value="' . $extraido['Email'] . '">    
                        <svg class="navbar-icon" style="margin:0">
                            <use xlink:href="../Assets/Svg/Setting.svg#Setting-icon">
                        </svg>    
                    </div>
                </div>
                <div>
                    <label>Contraseña</label>
                    <div class="setting">
                        <input class="Input_Text" type="text" name="Contrasena" placeholder="Contraseña del Profesor" value="' . $extraido['Contrasena'] . '">                             
                        <svg class="navbar-icon" style="margin:0">
                            <use xlink:href="../Assets/Svg/Setting.svg#Setting-icon">
                        </svg>     
                    </div>
                </div>
                <div>
                    <label>Imagen Usuario Nueva</label>
                    <div class="setting">
                        <input class="Input_Text" type="file" name="Imagen">
                        <svg class="navbar-icon" style="margin:0">
                            <use xlink:href="../Assets/Svg/Upload.svg#Upload-icon">
                        </svg> 
                    </div>
                </div>
                <div>
                    <label>Imagen Usuario Anterior</label>
                    <div class="setting"> 
                        <div class="imagenChange Input_Text">   
                            <img src="../Assets/Photos_Teacher/' . $extraido['Nombre_Imagen'] . '">
                        </div> 
                        <div>
                            <svg class="navbar-icon" style="margin:0;">
                                <use xlink:href="../Assets/Svg/Picture.svg#Picture-icon">
                            </svg> 
                        </div> 
                    </div> 
                </div> 
                    <input type="hidden" name="id_lastImg" value="' . $extraido['Id_Imagen'] . '">
                    <input type="hidden" name="id_profesor" value="' . $extraido['Id_Profesor'] . '">                     
            </div>';
            }echo ' 
            <div class="alinear-boton">
                <button class="boton" type="submit" name="Enviar2">Enviar</button>
            </div>
        </fieldset>
    </form>';
    ?>
</main>
<?php include '../Template/FooterProfe2.php'; ?>