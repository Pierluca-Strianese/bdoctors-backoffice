<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Message;
use App\Mail\MailToLead;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    private $validations = [
        'doctor_id'        => 'required|integer',
        'email'            => 'required|email|max:250',
        'text'             => 'required|string',
    ];

    public function index()
    {
        $messages = Message::paginate(100);

        return response()->json([
            'success' => true,
            'results' => $messages,
        ]);
    }

    public function store(Request $request, $slug)
    {
        $data = $request->all();

        $validator = Validator::make($data, $this->validations);

        if ($validator->fails()) {
            return response()->json([
                'success'  => false,
                'errors'   => $validator->errors(),
            ]);
        }

         // Ottenere l'ID del dottore dallo slug
        $doctor = Doctor::where('slug', $slug)->first();

        if (!$doctor) {
            // Gestisci il caso in cui il dottore non esista
            return response()->json([
                'success' => false,
                'error' => 'Il dottore specificato non esiste',
            ], 404);
        }

        // salvare i dati del message nel DB

        $newMessage = new Message();

        $newMessage->doctor_id      = $doctor->id;
        $newMessage->email          = $data['email'];
        $newMessage->text           = $data['text'];

        $newMessage->save();

        // ritornare un valore di successo al frontend

        try {
            // inviare il nuovo messaggio

            Mail::to($newMessage->email)->send(new MailToLead($newMessage, $doctor))->view('admin.messages.index');

            return response()->json([
                'success' => true,
                'message' => 'Messaggio inviato con successo',
                'doctor' => $doctor,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Errore durante l\'invio dell\'email: ' . $e->getMessage(),
            ], 500);
        }
    }
}
