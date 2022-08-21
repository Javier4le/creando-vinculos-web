<?php

namespace App\Http\Controllers;

use App\Models\ClubAdultos;
use Illuminate\Http\Request;

/**
 * Class ClubAdultosController
 * @package App\Http\Controllers
 */
class ClubAdultosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clubesAdultos = ClubAdultos::paginate();

        return view('club-adultos.index', compact('clubesAdultos'))
            ->with('i', (request()->input('page', 1) - 1) * $clubesAdultos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clubAdultos = new ClubAdultos();
        return view('club-adultos.create', compact('clubAdultos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ClubAdultos::$rules);

        $clubAdultos = ClubAdultos::create($request->all());

        return redirect()->route('clubes_adultos.index')
            ->with('success', 'ClubAdultos created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clubAdultos = ClubAdultos::find($id);

        return view('club-adultos.show', compact('clubAdultos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clubAdultos = ClubAdultos::find($id);

        return view('club-adultos.edit', compact('clubAdultos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ClubAdultos $clubAdultos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClubAdultos $clubAdultos)
    {
        request()->validate(ClubAdultos::$rules);

        $clubAdultos->update($request->all());

        return redirect()->route('clubes_adultos.index')
            ->with('success', 'ClubAdultos updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $clubAdultos = ClubAdultos::find($id)->delete();

        return redirect()->route('clubes_adultos.index')
            ->with('success', 'ClubAdultos deleted successfully');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function apiIndex()
    {
        $clubesAdultos = ClubAdultos::all();

        return $clubesAdultos;
    }
}
