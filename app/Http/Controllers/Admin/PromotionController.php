<?php

namespace App\Http\Controllers\Admin;
use App\Models\Promotion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotions = Promotion::all();
        return view("admin.promotions.index", compact("promotions"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.promotions.create', ["promotions" => new Promotion()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'price' => 'required',
            'duration' => 'required',
            'specifics' => 'required',
        ]);

        $newPromotion = new Promotion();
        $newPromotion->fill($data);
        $newPromotion->save();

        return redirect()->route('admin.Promotions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $promotion = Promotion::findOrFail($id);
        return view('admin.promotions.show', compact('promotion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Promotion $promotion )
    {
        return view('admin.promotions.edit', ['promotion' => $promotion ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promotion $promotion)
    {
        $data = $request->validate([
            'price' => 'required',
            'duration' => 'required',
            'specifics' => 'required', 
        ]);
        $promotion->update($data);
        return redirect()->route('admin.promotions.index', $promotion->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promotion $promotion)
    {
        $promotion->delete();
        return redirect()->route('admin.promotions.index')->with('message', "$promotion->id è stato cancellato con successo")->with('alert-type', 'danger');
    }
}