<?php

namespace App\Http\Controllers;

use App\Models\ClubDeportivo;
use Illuminate\Http\Request;

/**
 * Class ClubDeportivoController
 * @package App\Http\Controllers
 */
class ClubDeportivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clubesDeportivos = ClubDeportivo::paginate();

        return view('club-deportivo.index', compact('clubesDeportivos'))
            ->with('i', (request()->input('page', 1) - 1) * $clubesDeportivos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clubDeportivo = new ClubDeportivo();
        return view('club-deportivo.create', compact('clubDeportivo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ClubDeportivo::$rules);

        $clubDeportivo = ClubDeportivo::create($request->all());

        return redirect()->route('clubes_deportivos.index')
            ->with('success', 'ClubDeportivo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clubDeportivo = ClubDeportivo::find($id);

        return view('club-deportivo.show', compact('clubDeportivo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clubDeportivo = ClubDeportivo::find($id);

        return view('club-deportivo.edit', compact('clubDeportivo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ClubDeportivo $clubDeportivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClubDeportivo $clubDeportivo)
    {
        request()->validate(ClubDeportivo::$rules);

        $clubDeportivo->update($request->all());

        return redirect()->route('clubes_deportivos.index')
            ->with('success', 'ClubDeportivo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $clubDeportivo = ClubDeportivo::find($id)->delete();

        return redirect()->route('clubes_deportivos.index')
            ->with('success', 'ClubDeportivo deleted successfully');
    }
}
