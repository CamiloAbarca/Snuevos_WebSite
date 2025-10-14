<?php
header("Content-Type: application/json");

// Habilita CORS si tu frontend está en un dominio diferente
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// Verifica si la solicitud es de tipo POST y si los datos están presentes
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Método no permitido.']);
    exit();
}

$input = json_decode(file_get_contents('php://input'), true);

if (!$input) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Datos de entrada no válidos.']);
    exit();
}

// Extraer y sanear los datos del formulario
$nombre = filter_var(trim($input['nombre'] ?? ''), FILTER_SANITIZE_STRING);
$apellido = filter_var(trim($input['apellido'] ?? ''), FILTER_SANITIZE_STRING);
$email_remitente = filter_var(trim($input['email'] ?? ''), FILTER_VALIDATE_EMAIL);
$fono = filter_var(trim($input['fono'] ?? ''), FILTER_SANITIZE_STRING);
$mensaje = filter_var(trim($input['mensaje'] ?? ''), FILTER_SANITIZE_STRING);

// Validar que los campos requeridos no estén vacíos
if (empty($nombre) || empty($apellido) || !$email_remitente || empty($fono) || empty($mensaje)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Por favor, completa todos los campos requeridos.']);
    exit();
}

// Configuración del correo
$destinatario = 'camilo.abarca.21@gmail.com'; // Cambia esto por tu correo electrónico
$asunto = 'Mensaje de Contacto desde el sitio web';
$cabeceras = "From: $email_remitente\r\n";
$cabeceras .= "Reply-To: $email_remitente\r\n";
$cabeceras .= "MIME-Version: 1.0\r\n";
$cabeceras .= "Content-Type: text/html; charset=UTF-8\r\n";

// Cuerpo del correo con estilos en línea
$cuerpo_mensaje = "
<html>
<head>
    <title>Nuevo Mensaje de Contacto</title>
</head>
<body style='font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;'>
    <div style='max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);'>
        <h2 style='color: #333333; text-align: center; border-bottom: 2px solid #007bff; padding-bottom: 10px;'>
            Nuevo Mensaje de Contacto
        </h2>
        <table width='100%' cellpadding='0' cellspacing='0' style='color: #555555;'>
            <tr>
                <td style='padding: 8px 0;'><strong>Nombre Completo:</strong></td>
                <td style='padding: 8px 0;'>" . htmlspecialchars($nombre) . " " . htmlspecialchars($apellido) . "</td>
            </tr>
            <tr>
                <td style='padding: 8px 0;'><strong>Email:</strong></td>
                <td style='padding: 8px 0;'>" . htmlspecialchars($email_remitente) . "</td>
            </tr>
            <tr>
                <td style='padding: 8px 0;'><strong>Teléfono:</strong></td>
                <td style='padding: 8px 0;'>" . htmlspecialchars($fono) . "</td>
            </tr>
            <tr>
                <td colspan='2' style='padding-top: 20px;'><strong>Mensaje:</strong></td>
            </tr>
            <tr>
                <td colspan='2' style='padding: 8px 0; border: 1px solid #e0e0e0; padding: 15px; border-radius: 4px; background-color: #f9f9f9;'>
                    " . nl2br(htmlspecialchars($mensaje)) . "
                </td>
            </tr>
        </table>
    </div>
</body>
</html>";


// Enviar el correo
if (mail($destinatario, $asunto, $cuerpo_mensaje, $cabeceras)) {
    echo json_encode(['success' => true, 'message' => 'Correo enviado correctamente.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Fallo al enviar el correo.']);
}