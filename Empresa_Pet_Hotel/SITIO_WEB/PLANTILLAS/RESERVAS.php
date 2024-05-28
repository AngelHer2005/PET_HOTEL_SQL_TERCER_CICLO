<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESERVAS - PET HOTEL</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
</head>
<body class="reserva">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Reserva para tu Mascota</h1>
        <form action="../CONTROLADOR/reservaC.php" method="POST" class="p-4 rounded bg-light shadow">
            <div class="mb-3">
                <label for="nombre_dueno" class="form-label">Nombre del Dueño:</label>
                <input type="text" id="nombre_dueno" name="nombre_dueno" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="dni" class="form-label">DNI del Dueño:</label>
                <input type="dni" id="dni" name="dni" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="dir" class="form-label">Dirección:</label>
                <input type="tel" id="dir" name="dir" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="tarifa" class="form-label">Selecciona la tarifa:</label>
                <select id="tarifa" name="tarifa" class="form-select" required>
                    <option value="" selected disabled>Selecciona una opción</option>
                    <option value="HRT">Habitación Raza Miny o Toy (E: S/. 55 - P: S/. 60)</option>
                    <option value="HRP">Habitación Raza Pequeña (E: S/. 70 - P: S/. 75)</option>
                    <option value="HRM">Habitación Raza Mediana (E: S/. 60 - P: S/. 65)</option>
                    <option value="HRG">Habitación Raza Grande (E: S/. 80 - P: S/. 85)</option>
                    <option value="HREG">Habitación Raza Extra Grande (E: S/. 95 - P: S/. 100)</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="habitacion" class="form-label">Seleccione el tipo de habitación:</label>
                <select id="habitacion" name="habitacion" class="form-select" required>
                    <option value="" selected disabled>Selecciona una opción</option>
                    <option value="premium">Premium</option>
                    <option value="estandar">Estándar</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Reservar</button>
            <div class="text-center mt-3">
            <a href="HOME.php" class="btn btn-secondary">Volver a la pantalla principal</a>
        </div>
        </form>
    </div>
</body>
</html>