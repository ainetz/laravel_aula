<?php

namespace App\Http\Controllers;

use App\Models\Agencia;
use App\Models\User;
use Illuminate\Http\Request;

class AgenciaController extends Controller
{
    private $objUser;
    private $objAgencia;

    public function __construct()
    {
        $this->objUser = new User();
        $this->objBanco = new Agencia();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $agencia = $this->objAgencia->all();
        return view('agencia.index', compact('agencia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('agencia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $cadastrou = $this->objAgencia->create([
            'agencia' => $request->agencia,
            'nome_agencia' => $request->nome_agencia,
            'endereco' => $request->endereco,
            'banco_id' => $request->banco_id,
            'fone' => $request->fone,
            'tipo' => $request->tipo,
            'fone1' => $request->fone1,
            'tipo1' => $request->tipo1,
        ]);
        if($cadastrou){
            return redirect('/agencia/index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function update(Request $request, $id)
    {
        $agencia = $this->objAgencia->find($id);
        $users = $this->objUser->all();
        return view('banco.create', compact('agencia', 'users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
