<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Editar Pacientes</title>
    <link rel="stylesheet" href="{{ asset('css/crear.css') }}" />
</head>

<body>

    <form action="{{ url('pacientes/' . $usuario->id) }}" method="POST" enctype="multipart/form-data" class="form-container">
        @csrf
        @method('PUT')

        <label for="tipo_documento_id" class="form-label">Tipo de Documento:</label>
        <select name="tipo_documento_id" id="tipo_documento_id" class="form-select">
            @foreach ($tipos_documentos as $tipo)
                <option value="{{ $tipo->id }}"
                    {{ old('tipo_documento_id', $usuario->tipo_documento_id) == $tipo->id ? 'selected' : '' }}>
                    {{ $tipo->nombre }}
                </option>
            @endforeach
        </select>

        <label for="numero_documento" class="form-label">Número de Documento:</label>
        <input type="text" name="numero_documento" value="{{ old('numero_documento', $usuario->numero_documento) }}" readonly
            class="form-input" />

        <label for="nombre1" class="form-label">Primer Nombre:</label>
        <input type="text" name="nombre1" value="{{ old('nombre1', $usuario->nombre1 ?? '') }}" class="form-input" />

        <label for="nombre2" class="form-label">Segundo Nombre:</label>
        <input type="text" name="nombre2" value="{{ old('nombre2', $usuario->nombre2 ?? '') }}" class="form-input" />

        <label for="apellido1" class="form-label">Primer Apellido:</label>
        <input type="text" name="apellido1" value="{{ old('apellido1', $usuario->apellido1 ?? '') }}" class="form-input" />

        <label for="apellido2" class="form-label">Segundo Apellido:</label>
        <input type="text" name="apellido2" value="{{ old('apellido2', $usuario->apellido2 ?? '') }}" class="form-input" />

        <label for="genero_id" class="form-label">Género:</label>
        <select name="genero_id" id="genero_id" class="form-select">
            @foreach ($generos as $genero)
                <option value="{{ $genero->id }}"
                    {{ old('genero_id', $usuario->genero_id) == $genero->id ? 'selected' : '' }}>
                    {{ $genero->nombre }}
                </option>
            @endforeach
        </select>

        <label for="departamento_id" class="form-label">Departamento:</label>
        <select name="departamento_id" id="departamento_id" class="form-select">
            <option value="">Seleccione</option>
            @foreach ($departamentos as $dpto)
                <option value="{{ $dpto->id }}"
                    {{ old('departamento_id', $usuario->departamento_id) == $dpto->id ? 'selected' : '' }}>
                    {{ $dpto->nombre }}
                </option>
            @endforeach
        </select>

        <label for="municipio_id" class="form-label">Municipio:</label>
        <select name="municipio_id" id="municipio_id" class="form-select">
            <option value="">Seleccione un municipio</option>
            @foreach ($municipios as $municipio)
                <option value="{{ $municipio->id }}"
                    {{ old('municipio_id', $usuario->municipio_id) == $municipio->id ? 'selected' : '' }}>
                    {{ $municipio->nombre }}
                </option>
            @endforeach
        </select>

        <label for="Foto" class="form-label">Foto:</label>
        <input type="file" name="Foto" class="form-input" /><br>

        @if ($usuario->Foto)
            <img src="{{ asset('storage/' . $usuario->Foto) }}" alt="Foto Paciente" width="150" class="user-photo" />
        @endif

        <input type="submit" value="Actualizar" class="form-submit" />
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
