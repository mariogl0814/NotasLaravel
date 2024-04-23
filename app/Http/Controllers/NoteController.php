<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Models\Note;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class NoteController extends Controller
{
    /*public function index($id)
    {
        return view('note.index', compact('id'));
    }*/

    public function index(): View
    {
        $notes = Note::all();
        return view('note.index', compact('notes'));
    }

    public function create(): View
    {
        return view('note.create');
    }

    public function store(NoteRequest $request): RedirectResponse
    {
        $note = new Note;
        $note->title = $request->title;
        $note->description = $request->description;
        $note->save();

        /*
            Otra forma
            Note::create([
                'title' => $request=>title,
                'description' => $request=> descripcion
            ]);
            Note::create([$request=>all()]);
        */

        return redirect()->route('note.index')->with("success", "Note created");
    }

    public function edit(Note $note): View
    {
        //$myNote = Note::find($note);
        return view('note.edit', compact('note'));

        /*
            La segunda de las formas es anteponer El Modelo
            Note $note, y no necesitar usar find, pasa el objeto completo
        */
    }

    public function update(NoteRequest $request, Note $note): RedirectResponse
    {
        //$note = Note::find($node)//Nos ahorramos esta linea de codigo
        //Si anteponemos el modelo

        $note->update($request->all());
        //$note->update([
        //    'title' => $request.title,
        //    'description' => $request.description
        //])

        //Otra forma
        //$note = Note::find($note);
        //$note->title = $request->title;
        //$note->description = $request->description
        //$note->save();
        return redirect()->route('note.index')->with("success", "Note Updated");
    }

    public function show(Note $note): View
    {
        return view('note.show', compact('note'));
    }

    public function delete(Note $note): RedirectResponse
    {
        //Al ser variación del metodo post tienen un request,
        //En este caso se omite debido a que no se necesitaba
        $note->delete();
        return redirect()->route('note.index')->with("danger","Note Deleted");
    }
}
