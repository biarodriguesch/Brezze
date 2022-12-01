<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vendas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $vendas = Vendas::where('id_usuario', $user['id'])->orderBy('id','desc')->paginate(3);

        return view('vendas.index', compact('vendas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();


        $request->validate([
            'produto' => 'required',
            
        ]);


        $request->merge(['id_usuario' => $user['id']]);

        Vendas::create($request->input());

        return redirect()->route('vendas.index')
        ->with('success','Vendas created successfully.');

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
        $vendas = vendas::find($id);
        return view('vendas.edit',compact('vendas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vendas = Vendas::find($id);
        $request->validate([

            'produto' => 'required',
            ]);

            $vendas->fill($request->post())->save();

            return redirect()->route('vendas.index')
            ->with('success','vendas updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vendas = Vendas::find($id);
        $vendas->Delete();
        return redirect()->route('vendas.index')->with('success','Company has been deleted successfully');
    }
}
