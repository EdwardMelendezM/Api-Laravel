<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Http\Requests\NoteRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\NoteResource;

class NoteController extends Controller
{
    public function index():JsonResource
    {
        // return response()->json(Note::all() ,200);
        return NoteResource::collection(Note::all());
    }

    public function store(NoteRequest $resquest)
    {
        echo $resquest;
        Note::create($resquest->all());
        return response()->json([
            'ok'=>true
        ], 201);
    }

    public function show($id):JsonResource
    {
        return new NoteResource(Note::find($id));

    }


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

    public function destroy($id):JsonResponse
    {
        Node::find($id)->delete();
        return response()->json([
            'ok'=>true
        ]);
    }
}
