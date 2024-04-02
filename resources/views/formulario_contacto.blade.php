<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario | Fundetec</title>
    <link rel="icon" href="https://i.ibb.co/bQ3bc3p/icon.png">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css">
</head>

<body>
    <div class="call-to-action-area-a">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta-content text-center">
                        <h3><span style="color: #00469a;">¿Quieres que te llamemos?</span> <span style="color: #ffcf00;">¡Déjanos tus datos!</span></h3>
                        <br>
                        <form method="post" action="{{ route('formulario.enviar') }}" class="contact-form" id="formulario">

                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre y Apellidos" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico" required>
                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-control" id="celular" name="celular" placeholder="Celular o WhatsApp" required>
                            </div>

                            <div class="form-group">
                                <select class="form-control" id="medioInteres" name="medioInteres" required>
                                    <option value="" disabled selected>Medio por el cual se enteró</option>
                                    <option value="Redes sociales">Redes sociales</option>
                                    <option value="Página Web">Página web</option>
                                    <option value="Evento - Feria">Evento - Feria</option>
                                    <option value="Correo electrónico">Correo electrónico</option>
                                    <option value="Centro de Servicios">Centro de Servicios</option>
                                    <option value="Promotor">Promotor</option>
                                    <option value="Convenio Empresarial">Convenio empresarial</option>
                                    <option value="Visita colegio">Visita colegio</option>
                                    <option value="Avisos - Vallas">Avisos - Vallas</option>
                                    <option value="Volantes">Volantes</option>
                                    <option value="Telemercadeo">Telemercadeo</option>
                                    <option value="Prensa">Prensa</option>
                                    <option value="Buscadores (Google)">Buscadores (Google)</option>
                                    <option value="Radio">Radio</option>
                                    <option value="Directorio telefónico">Directorio telefónico</option>
                                    <option value="WhatsApp">WhatsApp</option>
                                    <option value="Toma barrial">Toma barrial</option>
                                    <option value="Televisión">Televisión</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="programa" name="programa" placeholder="Programa de interés" required>
                            </div>

                            <div class="form-group">
                                <select class="form-control" id="sede" name="sede" required>
                                    <option value="" disabled selected>Sede de interés</option>
                                    <option value="Sincelejo">Sincelejo</option>
                                    <option value="Barranquilla">Barranquilla</option>
                                    <option value="Yopal">Yopal</option>
                                    <option value="Villavicencio">Villavicencio</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Acacias">Acacías</option>
                                    <option value="Granada">Granada</option>
                                </select>
                            </div>

                            <div class="form-group enviarDatosContenedor">
                                <button type="submit" class="btn enviarDatos" style="width: 50%;"><strong>Enviar mis
                                        datos</strong></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#formulario').submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    success: function(response) {

                        $.alert({
                            title: '¡Éxito!',
                            content: '¡Datos enviados correctamente! Pronto alguien de nuestro equipo se comunicará contigo.',
                            type: 'blue',
                            buttons: {
                                OK: function () {
                                    $('#formulario')[0].reset();
                                }
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        // Mostrar cuadro de diálogo de error
                        $.alert({
                            title: 'Error',
                            content: 'Hubo un error al enviar los datos. Por favor, inténtalo de nuevo.',
                            type: 'red'
                        });
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>

</html>