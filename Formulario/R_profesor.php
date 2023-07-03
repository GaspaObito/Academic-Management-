<?php include("../Template/CabeceraAnot.php"); ?>
<main class="ContainerGeneral">
    <h1 id="TitleStart">REGISTRO DEL PROFESOR</h1>
    <form action="../Config/Formularios_Todos.php" method="post" class="formulario"  enctype="multipart/form-data">
        <fieldset>
            <div class="formulario__campos1">
                <div>
                    <label>Nombre</label>
                    <input maxlength="30" class="Input_Text" type="text" name="nombre" placeholder="Nombre del Profesor"
                        required>
                </div>
                <div>
                    <label>Apellido</label>
                    <input maxlength="30" class="Input_Text" type="text" name="Apellido"
                        placeholder="Apellido del Profesor" required>
                </div>
                <div>
                    <label>Numero de Documento</label>
                    <input class="Input_Text" type="number" name="NumDocumento" placeholder="Digite Numero de documento"
                        required>
                </div>
                <div>
                    <label>Teléfono</label>
                    <input class="Input_Text" type="number" name="Telefono" placeholder="Teléfono del Profesor"
                        required>
                </div>
                <div>
                    <label>Fecha Nacimiento</label>
                    <input class="Input_Text" type="date" name="Fecha_Nacimiento"
                        placeholder="Fecha de Nacimiento del Profesor" required>
                </div>
                <div>
                    <label>Asignación Academica</label>
                    <input maxlength="20" class="Input_Text" type="text" name="AsignaturaAca"
                        placeholder="Asignatura Academica del Profesor" required>
                </div>
                <div>
                    <label>Asignatura</label>
                    <input maxlength="30" class="Input_Text" type="text" name="AsignaturaProfe"
                        placeholder="Asignatura del Profesor" required>
                </div>
                <div>
                    <label>Area</label>
                    <input maxlength="30" class="Input_Text" type="text" name="Area" placeholder="Area del Profesor">
                </div>
                <div>
                    <label>Email</label>
                    <input maxlength="50" class="Input_Text" type="text" name="Correo"
                        placeholder="Correo del Profesor">
                </div>
                <div>
                    <label>Contraseña</label>
                    <input maxlength="255" class="Input_Text" type="text" name="Contrasena"
                        placeholder="Contraseña del Profesor">
                </div>
                <div>
                    <label>Imagen Usuario Nueva</label>
                    <div class="setting">
                        <input class="Input_Text" type="file" name="Imagen" required>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24">
                                <path
                                    d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="alinear-boton">
                <input class="boton" type="submit" name="Enviar2" value="Enviar">
            </div>
        </fieldset>
    </form>
</main>
</body>

</html>