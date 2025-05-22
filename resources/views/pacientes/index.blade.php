<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tabla de pacientes</title>
    <style>
        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .table th {
            background-color: #f4f4f4;
        }

        .patient-photo {
            object-fit: cover;
            width: 100px;
            height: 100px;
        }

        .btn {
            padding: 6px 12px;
            border: none;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            margin: 2px;
            border-radius: 3px;
        }

        .btn-warning {
            background-color: #f0ad4e;
            color: white;
        }

        .btn-danger {
            background-color: #d9534f;
            color: white;
        }

        .btn-action {
            display: inline-flex;
            gap: 6px;
            align-items: center;
        }

        .btn-container {
            margin-top: 15px;
            display: flex;
            gap: 10px;
        }
    </style>
</head>

<body>
    <h1 class="page-title">Sistema de Registro de Pacientes</h1>
    @if(session()->has('usuario'))
    <h3 class="page-title">Bienvenido, {{ session('usuario')->name}}</h3>
    @endif
    <h2 class="page-title">Lista de pacientes</h2>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Tipo de documento</th>
                <th>Cedula</th>
                <th>Primer Nombre</th>
                <th>Segundo Nombre</th>
                <th>Primer Apellido</th>
                <th>Segundo Apellido</th>
                <th>Genero</th>
                <th>Departamento</th>
                <th>Municipio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($paciente as $pacientes)
            <tr>
                <td>{{ $pacientes->id }}</td>
                <td>
                    <img src="{{ $pacientes->Foto ? asset('storage').'/'. $pacientes->Foto : asset('storage/default.png')}}" alt="Foto paciente" class="patient-photo" />
                </td>
                <td>{{ $pacientes->tipoDocumento->nombre }}</td>
                <td>{{ $pacientes->numero_documento }}</td>
                <td>{{ $pacientes->nombre1 }}</td>
                <td>{{ $pacientes->nombre2 }}</td>
                <td>{{ $pacientes->apellido1 }}</td>
                <td>{{ $pacientes->apellido2 }}</td>
                <td>{{ $pacientes->genero->nombre }}</td>
                <td>{{ $pacientes->departamento->nombre }}</td>
                <td>{{ $pacientes->municipio->nombre }}</td>
                <td class="btn-action">
                    <a href="{{ url('pacientes/' . $pacientes->id . '/edit') }}" class="btn btn-warning">EDITAR</a>

                    <form action="{{ url('pacientes/' . $pacientes->id) }}" method="POST" class="d-inline">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="BORRAR"
                            class="btn btn-danger" />
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

    <div class="btn-container">
        <button onclick="window.location.href='{{ url('logout') }}'" class="btn btn-danger">
            CERRAR SESION
        </button>
        <button onclick="window.location.href='{{ url('pacientes/create') }}'" class="btn btn-warning">
            Crear Nuevo Paciente
        </button>
    </div>

</body>

</html>
