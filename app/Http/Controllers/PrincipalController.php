<?php

namespace App\Http\Controllers;
use App\Models\Actores;
use App\Models\Peliculas;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function index(){ return view('index'); }
    public function verPelicula(Peliculas $pelicula) {
        return view('pelicula', compact('pelicula'));
    }
    
    public function acts(){ 
        $actores = Actores::all();
        return view('acts', compact('actores'));
    }
    public function pelis(){
        $peliculas = Peliculas::all();
        return view('pelis', compact('peliculas'));
    }
    public function agregaracts(){ return view('agregaracts'); }
    public function agregarpelis(){ return view('agregarpelis'); }
    public function editarpelis(Peliculas $pelicula){
        return view('editarpelis',compact('pelicula'));
    }
    public function editaracts(Actores $actor){
        return view('editaracts',compact('actor')); 
    }

    public function guardarpelis(Request $request, Peliculas $pelicula){
        $request->validate([
            'nombre' => 'required|string|max:100',
            'sinopsis' => 'required|string',
            'genero' => 'nullable|in:Acción,Animación,Aventuras,Bélico,Biográfico,
            Ciencia ficción,Comedia,Documental,Drama,Erótico,Espionaje,Fantástico,
            Histórico,Mudo,Musical,Negro,Policíaco,Suspense,Terror,Thriller,Western',
            'duracion' => 'required|integer|min:1',
            'fecha' => 'required|date',
            'link' => 'nullable|url',
            'clasificacion' => 'nullable|in:AA,A,B,B15,C,D',
            'idiomas' => 'nullable|array',
            'idiomas.*' => 'in:Español,Inglés,Francés,Alemán',
            'foto' => 'required|image|mimes:jpg,jpeg,png,gif,webp|max:2048'
        ]);
        $foto = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('fotos_peliculas'), $foto);
        $link = $request->link;
        if ($link) {
            if (preg_match('/youtu\.be\/([a-zA-Z0-9_-]+)/', $link, $matches) || 
                preg_match('/youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/', $link, $matches)) {
                    $link = 'https://www.youtube.com/embed/' . $matches[1];
            }}
        $pelicula->create([
            'nombre' => $request->nombre,
            'sinopsis' => $request->sinopsis,
            'genero' => $request->genero,
            'duracion' => $request->duracion,
            'fecha' => $request->fecha,
            'link' => $link,
            'clasificacion' => $request->clasificacion,
            'idiomas' => implode(',', $request->idiomas ?? []),
            'foto' => $foto
        ]);
    
        return redirect()->route('index')->with('mensaje', 'Película agregada correctamente.');
    }

    public function borrarpelis($pelicula) {
        $pl = Peliculas::find($pelicula);
        $pl->delete();
        return redirect()->route('index')->with('mensaje', 'Película borrada correctamente');
    }

    public function actpelis(Request $request, Peliculas $pelicula) {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'sinopsis' => 'required|string',
            'genero' => 'nullable|in:Acción,Animación,Aventuras,Bélico,Biográfico,
            Ciencia ficción,Comedia,Documental,Drama,Erótico,Espionaje,Fantástico,
            Histórico,Mudo,Musical,Negro,Policíaco,Suspense,Terror,Thriller,Western',
            'duracion' => 'required|integer|min:1',
            'fecha' => 'required|date',
            'link' => ['nullable', 'url', 'regex:/^(https?\:\/\/)?(www\.)?(youtube\.com|youtu\.be)\/.+$/'],
            'clasificacion' => 'nullable|in:AA,A,B,B15,C,D',
            'idiomas' => 'nullable|array',
            'idiomas.*' => 'in:Español,Inglés,Francés,Alemán',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048'
        ], [
            'nombre.required' => 'El campo Nombre es obligatorio.',
            'nombre.max' => 'El campo Nombre no puede superar los 100 caracteres.',
            'sinopsis.required' => 'El campo Sinopsis es obligatorio.',
            'duracion.required' => 'El campo Duración es obligatorio.',
            'duracion.min' => 'La duración debe ser de al menos 1 minuto.',
            'fecha.required' => 'El campo Fecha de estreno es obligatorio.',
            'fecha.date' => 'El campo Fecha de estreno debe ser una fecha válida.',
            'link.url' => 'El campo Link debe ser una URL válida.',
            'foto.image' => 'El archivo debe ser una imagen.',
            'foto.mimes' => 'La imagen debe estar en formato jpg, jpeg, png o gif.',
            'foto.max' => 'La imagen no puede superar los 2MB.',
            'idiomas.*.in' => 'El idioma seleccionado no es válido.'
        ]);
        if ($request->hasFile('foto')) {
            if ($pelicula->foto && file_exists(public_path('fotos_peliculas/' . $pelicula->foto))) {
                unlink(public_path('fotos_peliculas/' . $pelicula->foto));
            }
            $foto = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('fotos_peliculas'), $foto);
            $pelicula->foto = $foto;
        }
        $link = $request->link;
        if ($link) {
            if (preg_match('/youtu\.be\/([a-zA-Z0-9_-]+)/', $link, $matches) || 
            preg_match('/youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/', $link, $matches)) {
                $link = 'https://www.youtube.com/embed/' . $matches[1];
            }}
        $pelicula->update([
            'nombre' => $request->nombre,
            'sinopsis' => $request->sinopsis,
            'genero' => $request->genero,
            'duracion' => $request->duracion,
            'fecha' => $request->fecha,
            'link' => $link,
            'clasificacion' => $request->clasificacion,
            'idiomas' => implode(',', $request->idiomas ?? []),
        ]);
        return redirect()->route('index')->with('mensaje', 'Película actualizada correctamente.');
    }
    
    public function guardaracts(Request $request, Actores $actor) {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'edad' => 'required|integer|min:1',
            'part1' => 'nullable|string|max:255',
            'part2' => 'nullable|string|max:255',
            'part3' => 'nullable|string|max:255',
            'nominaciones' => 'required|integer|min:0',
            'peliculas' => 'required|integer|min:0',
            'foto' => 'required|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ], [
            'nombre.required' => 'El campo Nombre es obligatorio.',
            'nombre.max' => 'El campo Nombre no puede superar los 100 caracteres.',
            'edad.required' => 'El campo Edad es obligatorio.',
            'edad.min' => 'La Edad debe ser de al menos 1 año.',
            'nominaciones.required' => 'El campo Nominaciones es obligatorio.',
            'peliculas.required' => 'El campo Número de películas es obligatorio.',
            'foto.required' => 'El campo Foto es obligatorio.',
            'foto.image' => 'El archivo debe ser una imagen.',
            'foto.mimes' => 'La imagen debe estar en formato jpg, jpeg, png o gif.',
            'foto.max' => 'La imagen no puede superar los 2MB.',
        ]);
        $foto = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('fotos_actores'), $foto);
        $actor->create([
            'nombre' => $request->nombre,
            'edad' => $request->edad,
            'part1' => $request->part1,
            'part2' => $request->part2,
            'part3' => $request->part3,
            'nominaciones' => $request->nominaciones,
            'peliculas' => $request->peliculas,
            'foto' => $foto,
        ]);
        return redirect()->route('index')->with('mensaje', 'Actor agregado correctamente.');
    }
    
    public function borraracts($actor) {
        $ac = Actores::find($actor);
        $ac->delete();
        return redirect()->route('index')->with('mensaje', 'Actor borrado correctamente');
    }
    
    public function actacts(Request $request, Actores $actor) {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'edad' => 'required|integer|min:1',
            'part1' => 'nullable|string|max:255',
            'part2' => 'nullable|string|max:255',
            'part3' => 'nullable|string|max:255',
            'nominaciones' => 'required|integer|min:0',
            'peliculas' => 'required|integer|min:0',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ], [
            'nombre.required' => 'El campo Nombre es obligatorio.',
            'nombre.max' => 'El campo Nombre no puede superar los 100 caracteres.',
            'edad.required' => 'El campo Edad es obligatorio.',
            'edad.min' => 'La Edad debe ser de al menos 1 año.',
            'nominaciones.required' => 'El campo Nominaciones es obligatorio.',
            'peliculas.required' => 'El campo Número de películas es obligatorio.',
            'foto.image' => 'El archivo debe ser una imagen.',
            'foto.mimes' => 'La imagen debe estar en formato jpg, jpeg, png o gif.',
            'foto.max' => 'La imagen no puede superar los 2MB.',
        ]);
        if ($request->hasFile('foto')) {
            if ($actor->foto && file_exists(public_path('fotos_actores/' . $actor->foto))) {
                unlink(public_path('fotos_actores/' . $actor->foto));
            }
            $foto = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('fotos_actores'), $foto);
            $actor->foto = $foto;
        }
        $actor->update([
            'nombre' => $request->nombre,
            'edad' => $request->edad,
            'part1' => $request->part1,
            'part2' => $request->part2,
            'part3' => $request->part3,
            'nominaciones' => $request->nominaciones,
            'peliculas' => $request->peliculas,
        ]);
        return redirect()->route('index')->with('mensaje', 'Actor actualizado correctamente.');
    }
    public function buscar(Request $request) {
        $query = $request->input('query');
        $peliculas = Peliculas::where('nombre', 'LIKE', "%{$query}%")->get();
        $actores = Actores::where('nombre', 'LIKE', "%{$query}%")->get();
        return view('busqueda', compact('peliculas', 'actores', 'query'));
    }
}