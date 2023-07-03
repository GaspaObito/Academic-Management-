<!DOCTYPE html>
<html>

<head>
    <title>Ejemplo de Redirección con Código QR</title>
</head>

<body>
    <h1>Seleccion de codigo ejecucion para admin profesor</h1>
    <!-- Código QR -->
    <style>
        .container {
            display: flex;
        }
    </style>
    <div class="container">
        <div id="qrcode" style="margin-right: 100px;">
            <a>Codigo QR para Anotaciones de Estudiante</a>
            <button onclick="redireccionar()" style="display: block;">Escanear Código QR</button>
            <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
            <script>
                // Contenido del código QR
                var qrContent = "http://192.168.20.4/Proyectos/ProyectoQuintoSemestre/Login_Users/acudiente.php";

                // Generar el código QR y mostrarlo en la página
                var qrcode = new QRCode(document.getElementById("qrcode"), {
                    text: qrContent,
                    width: 256,
                    height: 256
                });

                // Función para redirigir al escanear el código QR
                function redireccionar() {
                    window.location.href = qrContent;
                }
            </script>
        </div>
        <div id="qrcode2">
            <a>Codigo QR para Profesor y Admin</a>
            <button onclick="redireccionar2()" style="display: block;">Escanear Código QR 2</button>
            <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
            <script>
                // Contenido del código QR
                var qrContent2 = "http://192.168.20.4/Proyectos/ProyectoQuintoSemestre/Login_Users/profesor_y_admin.php";

                // Generar el código QR y mostrarlo en la página
                var qrcode2 = new QRCode(document.getElementById("qrcode2"), {
                    text: qrContent2,
                    width: 256,
                    height: 256
                });

                // Función para redirigir al escanear el código QR
                function redireccionar2() {
                    window.location.href = qrContent2;
                }
            </script>
        </div>
    </div>
    <a href="Admin/Profesor_busc_Admin.php">
        <button onclick="" style="display: block;">Para apartado Admin</button>
    </a>
    <a href="Formulario/Formularios.php">
        <button onclick="" style="display: block;">Ingresar Estudiante</button>
    </a>
</body>

</html>