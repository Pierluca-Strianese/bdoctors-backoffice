<?php

namespace App\Http\Controllers\Admin;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::with('user')->where('doctor_id', Auth::user()->id)->latest()->get();
        return view('admin.messages.index', compact('messages'));
    }

    public function user()
    {
    return $this->belongsTo(User::class, 'doctor_id');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

 
    public function show(Message $message)
    {
        return view ('admin.messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    public function destroy(Message $message)
    {   
        if (!$message) {
        return redirect()->route('admin.messages.trashed')->with('error', 'Messaggio non trovato.');
        }
        // Verifica se il messaggio appartiene al dottore loggato
        if ($message->doctor_id === Auth::user()->id) {
            // Sposta il messaggio nel cestino (soft delete)
            $message->delete();

            // Aggiorna il campo "message_id" dei dottori associati al messaggio
            if ($message->doctors) {
                foreach ($message->doctors as $doctor) {
                    $doctor->message_id = 1; // Assumi che 1 rappresenti il cestino
                    $doctor->update();
                }
            }

            return redirect()->route('admin.messages.index')->with('trash_success', $message);
        } else {
            // Il messaggio non appartiene al dottore loggato, gestisci l'errore qui
            return redirect()->back()->with('error', 'Non sei autorizzato a eliminare questo messaggio.');
        }
       
        
    }

    // Redirect to Trashed view
    public function trashed()
    {
        $messages = Message::onlyTrashed()->paginate(4);
        return view('admin.messages.trashed', ['messages' => $messages]);
    }

    public function restore($id)
{
    // Trova il messaggio eliminato
    $message = Message::onlyTrashed()->find($id);

        // Verifica se il messaggio esiste tra quelli eliminati
        if (!$message) {
            return redirect()->route('admin.messages.trashed')->with('error', 'Messaggio nel cestino non trovato.');
        }

        // Verifica se il messaggio appartiene al dottore loggato
        if ($message->doctor_id === Auth::user()->id) {
            // Ripristina il messaggio (annulla il soft delete)
            $message->restore();

            return redirect()->route('admin.messages.trashed')->with('restore_success', 'Messaggio ripristinato con successo.');
        } else {
            // Il messaggio nel cestino non appartiene al dottore loggato, gestisci l'errore qui
            return redirect()->route('admin.messages.trashed')->with('error', 'Non sei autorizzato a ripristinare questo messaggio.');
        }
    }

    public function Harddelete($id)
    {
        // Trova il messaggio nel cestino
        $message = Message::withTrashed()->find($id);

        // Verifica se il messaggio esiste nel cestino
        if (!$message) {
            return redirect()->route('admin.messages.trashed')->with('error', 'Messaggio nel cestino non trovato.');
        }

        // Verifica se il messaggio appartiene al dottore loggato
        if ($message->doctor_id === Auth::user()->id) {
            // Elimina definitivamente il messaggio
            $message->forceDelete();

            return redirect()->route('admin.messages.trashed')->with('delete_success', 'Messaggio eliminato definitivamente.');
        } else {
            // Il messaggio nel cestino non appartiene al dottore loggato, gestisci l'errore qui
            return redirect()->route('admin.messages.trashed')->with('error', 'Non sei autorizzato a eliminare definitivamente questo messaggio.');
        }
    }

}
