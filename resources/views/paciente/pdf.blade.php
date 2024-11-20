<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Receta Médica</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
                border-spacing: 10px 5px;
                cellspacing: 2px;
                border: 1px solid #ddd;
            }

            th,
            td {
                padding: 10px;
                text-align: left;
            }

            th {
                background-color: #f2f2f2;
            }

            .text-center {
                text-align: center;
            }

            #cabecera_pdf {
                background-color: #c72573;
                color: rgb(255, 255, 255);
                font-weight: 500;
                padding: 5px;
            }

            .plantilla_pdf {
                width: 100%;
                padding: 20px;
                font-size: 12px;
                font-family: Arial, sans-serif;
            }

            .footer-custom {
                position: fixed;
                bottom: 0;
                width: 100%;
                text-align: center;
            }

            .firma {
                font-style: italic;
                margin-top: 20px;
            }
        </style>
    </head>

    <body>
        <div class="plantilla_pdf">
            <!-- Logo o encabezado -->
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/images/galeria/imagen_8.jpeg'))) }}" width="250px" height="60px">
            <h1 class="text-center">Receta Médica</h1>
            <br>

            <!-- Datos del paciente -->
            <div style="clear:both; position:relative;">
                <div style="position:absolute; left:0pt; width:250pt;">
                    <table>
                        <tr>
                            <td><strong>Paciente:</strong> Henrry Pérez González</td>
                        </tr>
                        <tr>
                            <td><strong>Edad:</strong> 35 años</td>
                        </tr>
                        <tr>
                            <td><strong>Sexo:</strong> Masculino</td>
                        </tr>
                        <tr>
                            <td><strong>Fecha:</strong> 20/11/2024</td>
                        </tr>
                        <tr>
                            <td><strong>Médico:</strong> Dr. Marilyn Cote</td>
                        </tr>
                        <tr>
                            <td><strong>Especialidad:</strong> Medicina General</td>
                        </tr>
                    </table>
                </div>

                <!-- Datos del tratamiento prescrito -->
                <div style="margin-left:350pt;">
                    <table>
                        <tr>
                            <td id="cabecera_pdf" colspan="2">Tratamiento Prescrito</td>
                        </tr>
                        <tr>
                            <td><strong>Diagnóstico:</strong></td>
                            <td><strong>Infección respiratoria alta</strong></td>
                        </tr>
                        <tr>
                            <td><strong>Indicaciones:</strong></td>
                            <td><strong>Reposo absoluto y medicación para aliviar síntomas.</strong></td>
                        </tr>
                    </table>
                </div>
            </div>
            <br><br><br> <br><br><br>

            <!-- Medicamentos -->
            <table>
                <tr>
                    <th id="cabecera_pdf">Medicamento</th>
                    <th id="cabecera_pdf">Dosis</th>
                    <th id="cabecera_pdf">Frecuencia</th>
                    <th id="cabecera_pdf">Duración</th>
                </tr>

                <tr>
                    <td>Amoxicilina 500 mg</td>
                    <td>1 tableta</td>
                    <td>Cada 8 horas</td>
                    <td>7 días</td>
                </tr>
                <tr>
                    <td>Paracetamol 500 mg</td>
                    <td>1 tableta</td>
                    <td>Cada 6 horas</td>
                    <td>5 días</td>
                </tr>
                <tr>
                    <td>Jarabe para tos</td>
                    <td>10 ml</td>
                    <td>Cada 4 horas</td>
                    <td>5 días</td>
                </tr>
            </table>
            <br><br>

            <!-- Comentarios adicionales -->
            <div style="clear:both; position:relative;">
                <div style="position:absolute; left:0pt; width:250pt;">
                    <table>
                        <tr>
                            <td id="cabecera_pdf"><strong>Comentarios Adicionales:</strong></td>
                        </tr>
                        <tr>
                            <td>Es importante que el paciente siga el tratamiento al pie de la letra y realice una consulta de seguimiento en 7 días.</td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- Firma del médico -->
            <div style="margin-left:400pt; text-align: center;">
                <table>
                    <tr>
                        <td id="cabecera_pdf"><strong>Firma del Médico:</strong></td>
                    </tr>
                    <tr>
                        <td class="firma">Dr. Marilyn Cote</td>
                    </tr>
                    <tr>
                        <td class="firma">Médico General</td>
                    </tr>
                </table>
            </div>
            <br><br>

            <!-- Información adicional -->
            <div style="padding-top: 20px; font-size:13px; color: #b0b0b0; margin-top: 20px; text-align: left;">
                <p>Para cualquier duda o comentario, no dude en contactarnos. 
                    <br>
                    Teléfono: (044) 55 1234 5678
                    <br>
                    Email: Marilyn_Cote@clinicamedica.com
                </p>
            </div>
        </div>

        <br>

        <!-- Pie de página -->
        <div class="footer-custom" style="padding-top: 10px; border-top: 1px solid #ddd; font-size:13px; color: #b0b0b0; margin-top: 20px; text-align: left;">
            <p>Atentamente,</p>
            <p>Clínica Médica ABC</p>
            <p style="color:deeppink;">Tu salud, nuestra prioridad</p>
        </div>
    </body>
</html>
