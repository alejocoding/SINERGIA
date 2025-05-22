<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Crear Usuario</title>
    <link rel="stylesheet" href="{{ asset('css/crear.css') }}" />
</head>

<body>
    <form action="{{ url('pacientes') }}" method="POST" enctype="multipart/form-data" class="form-container">
        @csrf

        <label for="tipo_documento_id" class="form-label">Tipo de Documento:</label>
        <select name="tipo_documento_id" id="tipo_documento_id" class="form-select">
            @foreach ($tiposDocumento as $tipo)
                <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
            @endforeach
        </select>

        <label for="numero_documento" class="form-label">Número de Documento:</label>
        <input type="text" name="numero_documento" class="form-input" required />

        <label for="nombre1" class="form-label">Primer Nombre:</label>
        <input type="text" name="nombre1" class="form-input" required />

        <label for="nombre2" class="form-label">Segundo Nombre:</label>
        <input type="text" name="nombre2" class="form-input" />

        <label for="apellido1" class="form-label">Primer Apellido:</label>
        <input type="text" name="apellido1" class="form-input" required />

        <label for="apellido2" class="form-label">Segundo Apellido:</label>
        <input type="text" name="apellido2" class="form-input"  required/>

        <label for="genero_id" class="form-label">Género:</label>
        <select name="genero_id" id="genero_id" class="form-select" required>
            @foreach ($generos as $genero)
                <option value="{{ $genero->id }}">{{ $genero->nombre }}</option>
            @endforeach
        </select>

        <label for="departamento_id" class="form-label">Departamento:</label>
        <select name="departamento_id" id="departamento_id" class="form-select" required>
            <option value="">Seleccione</option>
            @foreach ($departamentos as $dpto)
                <option value="{{ $dpto->id }}">{{ $dpto->nombre }}</option>
            @endforeach
        </select>

        <label for="municipio_id" class="form-label">Municipio:</label>
        <select name="municipio_id" id="municipio_id" class="form-select" required>
            <option value="">Seleccione un municipio</option>
        </select>

        <label for="Foto" class="form-label">Foto:</label>
        <input type="file" name="Foto" class="form-input" />

        <input type="submit" value="Guardar" class="form-submit" />
    </form>

    <button onclick="window.location.href='{{ url('pacientes') }}'" class="btn-back">Volver al inicio</button>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#departamento_id').on('change', function () {
            var departamentoId = $(this).val();

            if (departamentoId) {
                $.ajax({
                    url: '/municipios/' + departamentoId,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $('#municipio_id').empty();
                        $('#municipio_id').append('<option value="">Seleccione un municipio</option>');
                        $.each(data, function (index, municipio) {
                            $('#municipio_id').append('<option value="' + municipio.id + '">' + municipio.nombre + '</option>');
                        });
                    }
                });
            } else {
                $('#municipio_id').empty();
                $('#municipio_id').append('<option value="">Seleccione un municipio</option>');
            }
        });
    </script>
</body>

</html>
