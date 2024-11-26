<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cita</title>
    <!-- Incluir Bootstrap desde un CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #f8f9fa; padding: 20px;">
    <div class="container">
        <div class="card mx-auto" style="max-width: 600px;">
            <div class="card-header bg-success text-white">
                <h2>Cita con el Doctor {{$cita->medico->name}}</h2>
            </div>
            <div class="card-body">
                <p class="fw-bold">Hola,</p>
                <p>Te informamos que el doctor <strong>{{$cita->medico->name}}</strong> ha actualizado el estado de tu cita.</p>
                <p><strong>Estado actual de la cita:</strong> 
                    <span class="badge {{ $cita->estado === 'confirmada' ? 'bg-success' : 'bg-danger' }}">
                        {{$cita->estado}}
                    </span>
                </p>
                <p class="mt-4">Si tienes alguna duda, no dudes en contactarnos.</p>
            </div>
            <div class="card-footer text-center text-muted">
                <small>Gracias por confiar en nosotros.</small>
            </div>
        </div>
    </div>
</body>
</html>
