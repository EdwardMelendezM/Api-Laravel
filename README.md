# Api laravel

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## Rutas
- La ruta para notes de forma basica, uso de NoteController
```
Route::resource('/note',NoteController::class);

```

## Controladores
- Obtener todos, hacemos uso de NoteResource para modificar los valores de salida
```
public function index():JsonResource
    {
        // return response()->json(Note::all() ,200);
        return NoteResource::collection(Note::all());
    }
```

- Crear nuevos Note y dar como respuesta un  json
```
public function store(NoteRequest $resquest)
    {
        echo $resquest;
        Note::create($resquest->all());
        return response()->json([
            'ok'=>true
        ], 201);
    }
```

- Mostrar un Note por id, usamos NoteResource para modificar el json de salida
```
public function show($id):JsonResource
    {
        return new NoteResource(Note::find($id));

    }
```

- Actualizar por un id
```
public function update(NoteRequest $request, $id):JsonResponse
    {
       $nota = Note::findOrFail($id);
       $nota->title=$request->title;
       $nota->content=$request->content;
       $note->save();

       return response()->json([
        'ok'=>true,
        $note
       ], 200);
    }
```

- Eliminar note por id
```
public function destroy($id):JsonResponse
    {
        Node::find($id)->delete();
        return response()->json([
            'ok'=>true
        ]);
    }
```

## Modelo
- Aqui establecemos que se ocultaran los campos
````
protected $hidden = ['created_at','updated_at'];
```