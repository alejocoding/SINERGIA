<?php

namespace App\Http\Controllers;

use App\Models\departamento;
use App\Models\genero;
use App\Models\municipios;
use App\Models\paciente;
use App\Models\tipos_documento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // VALIDACION SESION
         if (!session()->has('usuario')) {
            return redirect('/login')->withErrors(['error' => 'Debes iniciar sesión']);
        }

        $paciente = paciente::with(['genero', 'departamento', 'tipoDocumento','municipio'])->get();

        return view('pacientes.index',compact('paciente'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        if (!session()->has('usuario')) {
            return redirect('/login')->withErrors(['error' => 'Debes iniciar sesión']);
        }
        
        $tiposDocumento = tipos_documento::all();
        $generos = genero::all();
        $departamentos = departamento::all();
        $municipios = municipios::all();

        return view('pacientes.crearPaciente', compact('tiposDocumento', 'generos', 'departamentos', 'municipios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {



        $paciente = new paciente();
        $paciente->tipo_documento_id = $request->input('tipo_documento_id');
        $paciente->numero_documento = $request->input('numero_documento');
        $paciente->nombre1 = $request->input('nombre1');
        $paciente->nombre2 = $request->input('nombre2');
        $paciente->apellido1 = $request->input('apellido1');
        $paciente->apellido2 = $request->input('apellido2');
        $paciente->genero_id = $request->input('genero_id');
        $paciente->departamento_id = $request->input('departamento_id');
        $paciente->municipio_id = $request->input('municipio_id');

        if ($request->hasFile('Foto')) {
            $path = $request->file('Foto')->store('uploads', 'public');
            $paciente->Foto = $path;
        }

        $paciente->save();
        return redirect('pacientes');

    }

    /**
     * Display the specified resource.
     */
    public function show(paciente $paciente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (!session()->has('usuario')) {
            return redirect('/login')->withErrors(['error' => 'Debes iniciar sesión']);
        }

        $tipos_documentos = tipos_documento::all();
        $generos = genero::all();
        $departamentos = departamento::all();
        $usuario = paciente::find($id);
        $municipios = municipios::where('departamento_id', $usuario->departamento_id)->get();

        return view('pacientes.editarPaciente', compact('tipos_documentos', 'generos', 'departamentos', 'municipios','usuario'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $pacienteData = request()->except('_token','_method');

        if($request->hasFile('Foto')){

            $paciente= paciente::findOrFail($id);
            Storage::delete('public/' . $paciente->Foto);

            $pacienteData['Foto'] =$request->file('Foto')->store('uploads', 'public');
        }

        paciente::where('id', '=', $id)->update($pacienteData);
        return redirect('pacientes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $paciente = paciente::find($id);
        if($paciente){
            paciente::destroy($id);
        }
        return redirect('pacientes');

    }

    public function AJAXMunicipios($departamento_id)
    {
        $municipios = municipios::where('departamento_id', $departamento_id)->get();

        return response()->json($municipios);
    }
}
