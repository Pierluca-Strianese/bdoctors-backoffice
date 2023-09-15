<?php

namespace App\Http\Controllers\Admin;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Promotion;
use App\Models\Specialization;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{

    // Validazioni per validare i dati
    private $validations = [
        'name'              => 'nullable',
        'telephone'         => 'required',
        'curriculum_vitae'  => 'required|file|mimes:pdf,docx',
        'performance'       => 'required',
        'image'             => 'required|image|mimes:jpeg,png,jpg,gif|max:10800',
    ];

    //messaggio che ti esce nel momento in cui il campo non è stato commpilato
    private $validations_messages = [
        'required' => 'il campo :attribute è obbligatorio'
    ];

    public function index()
    {
        $doctors = Doctor::All();

        return view('admin.doctors.index', compact('doctors'));
    }

    public function create()
    {
        $specializations = Specialization::All();
        $promotions = Promotion::All();
        return view('admin.doctors.create', compact('specializations', 'promotions'));
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->validations, $this->validations_messages);
        $data = $request->all();


        $newDoctor = new Doctor();

        $newDoctor->user_id = auth()->user()->id;

        $newDoctor->name = $data['name'];
        $newDoctor->slug = Doctor::slugger($data['name']);
        $newDoctor->telephone = $data['telephone'];

        if ($request->hasFile('curriculum_vitae')) {
            $curriculumVitae = $request->file('curriculum_vitae');
            $curriculumVitaePath = $this->storeFileWithOriginalName($curriculumVitae, 'Profile_IMG');
            $newDoctor->curriculum_vitae = $curriculumVitaePath;
        }

        $newDoctor->performance = $data['performance'];


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $this->storeFileWithOriginalName($image, 'Profile_IMG');
            $newDoctor->image = $imagePath;
        }

        $newDoctor->save();

        return redirect()->route('admin.doctors.show', ['doctor' => $newDoctor]);

    }

    private function storeFileWithOriginalName($file, $directory)
    {
    $originalName = $file->getClientOriginalName();
    $filePath = $file->storeAs($directory, $originalName);
    return $filePath;
    }


    public function show($slug)
    {
        $doctor = Doctor::where('slug', $slug)->firstOrFail();
        return view('admin.doctors.show', compact('doctor'));
    }


    public function edit($slug)
    {

        $doctor = Doctor::where('slug', $slug)->firstOrFail();
        $specializations = Specialization::all();
        $promotions = Promotion::all();
        return view('admin.doctors.edit', compact('doctor', 'specializations', 'promotions'));
    }


    public function update(Request $request, $slug)
    {

        $doctor = Doctor::where('slug', $slug)->firstOrfail();

        $data = $request->validate($this->validations, $this->validations_messages);
        $data = $request->all();

        // $doctor->name = $data['name'];


        if (isset($data['image'])){

            $image = Storage::disk('public')->put('uploads', $data['image']);
            if($doctor->image) {
                Storage::delete($doctor->image);
            }

            $doctor->image = $image;
        }

        if(isset($data['curriculum_vitae'])){

            if($doctor->curriculum_vitae) {
                Storage::delete($doctor->curriculum_vitae);
            }

            $doctor->curriculum_vitae = $data['curriculum_vitae'];

        }

        $doctor->telephone = $data['telephone'];
        $doctor->performance = $data['performance'];

        $doctor->update();

        return to_route('admin.doctors.show', ['doctor' => $doctor]);
    }


    public function destroy($slug)
    {
        $doctor = Doctor::where('slug', $slug)->firstOrFail();

        if ($doctor->file){
            Storage::delete($doctor->file);
        }

        $doctor->promotions()->detach();
        $doctor->forceDelete();



        return to_route('admin.dashboard.index')->with('delete_success', $doctor);
    }


}
