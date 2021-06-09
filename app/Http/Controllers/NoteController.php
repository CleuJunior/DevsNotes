<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    private $array = ['erro' => '', 'result' => []];

    public function all()
    {
        $notes = Note::all();

        foreach ($notes as $note)
        {
            $this->array['result'][] = [
                'id' => $note->id,
                'title' => $note->title
            ];
        }

        return $this->array;
    }

    public function one($id)
    {
        $note = Note::find($id);

        if($note) $this->array['result'] = $note;
        if(!$note) $this->array['erro'] = 'ID nao encontrado';

        return $this->array;
    }

}


