<?php

namespace App\Http\Controllers;

use App\Models\JuntaVecinos;
use Illuminate\Http\Request;

/**
 * Class JuntaVecinosController
 * @package App\Http\Controllers
 */
class JuntaVecinosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $juntasVecinos = JuntaVecinos::paginate();

        return view('junta-vecinos.index', compact('juntasVecinos'))
            ->with('i', (request()->input('page', 1) - 1) * $juntasVecinos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $juntaVecinos = new JuntaVecinos();
        return view('junta-vecinos.create', compact('juntaVecinos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(JuntaVecinos::$rules);

        $juntaVecinos = JuntaVecinos::create($request->all());

        return redirect()->route('juntas_vecinos.index')
            ->with('success', 'JuntaVecinos created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $juntaVecinos = JuntaVecinos::find($id);

        return view('junta-vecinos.show', compact('juntaVecinos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $juntaVecinos = JuntaVecinos::find($id);

        return view('junta-vecinos.edit', compact('juntaVecinos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  JuntaVecinos $juntaVecinos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JuntaVecinos $juntaVecinos)
    {
        request()->validate(JuntaVecinos::$rules);

        $juntaVecinos->update($request->all());

        return redirect()->route('juntas_vecinos.index')
            ->with('success', 'JuntaVecinos updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $juntaVecinos = JuntaVecinos::find($id)->delete();

        return redirect()->route('juntas_vecinos.index')
            ->with('success', 'JuntaVecinos deleted successfully');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function apiIndex()
    {
        $juntasVecinos = JuntaVecinos::all();

        return $juntasVecinos;
    }
}
