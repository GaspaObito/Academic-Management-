<?php include '../Template/CabeceraAnot.php'; ?>
<main class="ContainerGeneral">
    <h1 id="TitleStart">ACTUALIZAR REGISTRO DEL PROFESOR</h1>
    <?php
    include '../Config/Conexion.php';
    $Id_Profe = $_POST['NumeroModificar'];
    ($consultar = mysqli_query($conexion, "SELECT p.*, i.Nombre_Imagen,i.Id_Imagen FROM profesor p LEFT JOIN imagenes i ON p.Id_Imagen = i.Id_Imagen WHERE Id_Profesor='$Id_Profe'")) or die('ERROR AL TRAER LOS DATOS');
    echo '<form action="../Config/Formularios_Admin.php" method="post" class="formulario" enctype="multipart/form-data">
            <fieldset>
                <div class="formulario__campos1">
                    <div>';
    while ($extraido = mysqli_fetch_array($consultar)) {
        echo ' <label>Nombre</label>
                        <div  class="setting">
                          <input class="Input_Text" type="text" name="nombre" placeholder="Nombre del Profesor" value="' . $extraido['Nombre'] . '">
                            <div>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-settings-check" width="40" height="40"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M11.445 20.913a1.665 1.665 0 0 1 -1.12 -1.23a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.31 .318 1.643 1.79 .997 2.694" />
                                        <path d="M15 19l2 2l4 -4" />
                                        <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                    </svg>                                
                            </div>
                        </div>
                    </div>
                    <div>
                        <label>Apellido</label>
                        <div  class="setting">
                        <input class="Input_Text " type="text" name="Apellido" placeholder="Apellido del Profesor" value="' . $extraido['Apellido'] . '">
                            <div>          
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-settings-check" width="40" height="40"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M11.445 20.913a1.665 1.665 0 0 1 -1.12 -1.23a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.31 .318 1.643 1.79 .997 2.694" />
                                        <path d="M15 19l2 2l4 -4" />
                                        <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                    </svg>    
                            </div>
                        </div>
                    </div>
                    <div>
                        <label>Numero de Documento</label>
                        <div class="setting">
                        <input class="Input_Text" type="number" name="NumDocumento" placeholder="Numero de documento" value="' . $extraido['Numero_Documento'] . '">
                        <div>                        
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-settings-check" width="40" height="40"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M11.445 20.913a1.665 1.665 0 0 1 -1.12 -1.23a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.31 .318 1.643 1.79 .997 2.694" />
                                <path d="M15 19l2 2l4 -4" />
                                <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                            </svg>                  
                    </div>
                    </div>
                    </div>
                    <div>
                        <label>Teléfono</label>
                        <div class="setting">
                        <input class="Input_Text" type="number" name="Telefono" placeholder="Teléfono del Profesor" value="' . $extraido['Telefono'] . '">
                            <div>                           
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-settings-check" width="40" height="40"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M11.445 20.913a1.665 1.665 0 0 1 -1.12 -1.23a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.31 .318 1.643 1.79 .997 2.694" />
                                        <path d="M15 19l2 2l4 -4" />
                                        <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                    </svg>                            
                            </div>
                        </div>
                    </div>
                    <div>
                        <label>Fecha Nacimiento</label>
                        <div class="setting">
                        <input class="Input_Text" type="date" name="Fecha_Nacimiento" placeholder="Fecha de Nacimiento del Profesor" value="' . $extraido['Fecha_Nacimiento'] . '">
                            <div>                                
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-settings-check" width="40" height="40"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M11.445 20.913a1.665 1.665 0 0 1 -1.12 -1.23a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.31 .318 1.643 1.79 .997 2.694" />
                                        <path d="M15 19l2 2l4 -4" />
                                        <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                    </svg>                    
                            </div>
                        </div>
                    </div>
                    <div>
                        <label>Asignación Academica</label>
                        <div class="setting">
                        <input class="Input_Text" type="text" name="AsignaturaAca" placeholder="Asignatura Academica del Profesor" value="' . $extraido['Asignacion_Academica'] . '">
                            <div>                             
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-settings-check" width="40" height="40"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M11.445 20.913a1.665 1.665 0 0 1 -1.12 -1.23a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.31 .318 1.643 1.79 .997 2.694" />
                                        <path d="M15 19l2 2l4 -4" />
                                        <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                    </svg>                          
                            </div>
                        </div>
                    </div>
                    <div>
                        <label>Asignatura</label>
                        <div class="setting">
                        <input class="Input_Text" type="text" name="AsignaturaProfe" placeholder="Asignatura del Profesor" value="' . $extraido['Asignatura'] . '">
                            <div>                            
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-settings-check" width="40" height="40"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M11.445 20.913a1.665 1.665 0 0 1 -1.12 -1.23a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.31 .318 1.643 1.79 .997 2.694" />
                                        <path d="M15 19l2 2l4 -4" />
                                        <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                    </svg>                        
                            </div>
                        </div>
                    </div>
                    <div>
                        <label>Area</label>
                        <div class="setting">
                        <input class="Input_Text" type="text" name="Area" placeholder="Area del Profesor" value="' . $extraido['Area'] . '">
                            <div>                             
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-settings-check" width="40" height="40"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M11.445 20.913a1.665 1.665 0 0 1 -1.12 -1.23a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.31 .318 1.643 1.79 .997 2.694" />
                                        <path d="M15 19l2 2l4 -4" />
                                        <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                    </svg>                             
                            </div>
                        </div>
                    </div>
                    <div>
                        <label>Email</label>
                        <div  class="setting">
                        <input class="Input_Text" type="text" name="Correo" placeholder="Correo del Profesor" value="' . $extraido['Email'] . '">
                            <div>        
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-settings-check" width="40" height="40"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M11.445 20.913a1.665 1.665 0 0 1 -1.12 -1.23a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.31 .318 1.643 1.79 .997 2.694" />
                                        <path d="M15 19l2 2l4 -4" />
                                        <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                    </svg>       
                            </div>
                        </div>
                    </div>
                    <div>
                    <label>Contraseña</label>
                        <div class="setting">
                        <input class="Input_Text" type="text" name="Contrasena" placeholder="Contraseña del Profesor" value="' . $extraido['Contrasena'] . '">
                            <div>                              
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-settings-check" width="40" height="40"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M11.445 20.913a1.665 1.665 0 0 1 -1.12 -1.23a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.31 .318 1.643 1.79 .997 2.694" />
                                        <path d="M15 19l2 2l4 -4" />
                                        <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                    </svg>     
                            </div>
                        </div>
                    </div>
                    <div>
                        <label>Imagen Usuario Nueva</label>
                        <div class="setting">
                        <input class="Input_Text" type="file" name="Imagen">
                            <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="40" height="40" viewBox="0 0 24 24"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg>      
                            </div>
                        </div>
                    </div>
                    <div>
                        <label>Imagen Usuario Anterior</label>
                        <div class="setting" style="display: flex"> 
                            <div class="imagenChange Input_Text">   
                                <img src="../Assets/Photos_Teacher/' . $extraido['Nombre_Imagen'] . '">
                            </div> 
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink"  style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;" version="1.1" width="40" height="40" viewBox="0 0 30 30"  xml:space="preserve"><path d="M3,8l0,16c-0,1.326 0.527,2.598 1.464,3.536c0.938,0.937 2.21,1.464 3.536,1.464c4.439,-0 11.561,0 16,0c1.326,0 2.598,-0.527 3.536,-1.464c0.937,-0.938 1.464,-2.21 1.464,-3.536l-0,-16c0,-1.326 -0.527,-2.598 -1.464,-3.536c-0.938,-0.937 -2.21,-1.464 -3.536,-1.464c-4.439,-0 -11.561,-0 -16,-0c-1.326,-0 -2.598,0.527 -3.536,1.464c-0.937,0.938 -1.464,2.21 -1.464,3.536Zm24,10.745l0,4.64c0,0.977 -0.328,1.917 -0.927,2.608c-0.552,0.636 -1.293,1.007 -2.073,1.007l-16,-0l-0,-0c-0.78,0 -1.521,-0.371 -2.073,-1.007c-0.599,-0.691 -0.927,-1.631 -0.927,-2.608l0,-1.178c0,-0 2.512,-3.727 2.512,-3.727c0.558,-0.828 1.49,-1.324 2.488,-1.324c0.998,0 1.93,0.496 2.488,1.323c-0,0 1.516,2.25 1.516,2.25c0.186,0.276 0.497,0.441 0.829,0.441c0.333,0 0.644,-0.165 0.83,-0.441l3.849,-5.711c0.558,-0.827 1.49,-1.323 2.488,-1.323c0.998,-0 1.93,0.496 2.488,1.323l2.512,3.727Zm0,-3.578l0,-7.167c0,-0.796 -0.316,-1.559 -0.879,-2.121c-0.562,-0.563 -1.325,-0.879 -2.121,-0.879l-16,-0c-0.796,-0 -1.559,0.316 -2.121,0.879c-0.563,0.562 -0.879,1.325 -0.879,2.121l-0,10.628l0.854,-1.266c0.929,-1.379 2.483,-2.206 4.146,-2.206c1.663,0 3.217,0.827 4.146,2.206l0.687,1.019c0,0 3.021,-4.481 3.021,-4.481c0.929,-1.379 2.483,-2.205 4.146,-2.205c1.663,-0 3.217,0.826 4.146,2.205l0.854,1.267Z"/><path d="M14,7c-1.656,0 -3,1.344 -3,3c0,1.656 1.344,3 3,3c1.656,0 3,-1.344 3,-3c0,-1.656 -1.344,-3 -3,-3Zm0,2c0.552,0 1,0.448 1,1c0,0.552 -0.448,1 -1,1c-0.552,0 -1,-0.448 -1,-1c0,-0.552 0.448,-1 1,-1Z"/></svg>
                            </div> 
                        </div> 
                    </div> 
                    <input type="hidden" name="id_lastImg" value="' . $extraido['Id_Imagen'] . '">
                    <input type="hidden" name="id_profesor" value="' . $extraido['Id_Profesor'] . '">                     
                </div>';
    }
    echo ' <div class="alinear-boton">
                    <button class="boton" type="submit" name="Enviar2">Enviar</button>
                    </div>
            </fieldset>
        </form>';
    ?>
</main>
<?php include '../Template/FooterProfe2.php'; ?>