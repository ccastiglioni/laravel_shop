<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Objcateg = new Categoria();
        $categorias = $Objcateg->get();

       return view('painel.categorias',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('painel.categorias_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome'   => 'required',
        ]);
        $data = $request->all();

        if ( $request->file('imagem') ) {


            $dir ='admin/images/categorias';
            $imageName = cleanfilename($request->file('imagem')->getClientOriginalName());
            $data['imagem']  = $dir .'/'. $imageName;;
            $request->file('imagem')->store($dir);
            $request->file('imagem')->move($dir,$imageName);

        }else
            die('Error');


        if ( !empty($data))  {

            Categoria::create( $data );

           return redirect()->route('categorias.index');
        }else{
            return redirect()->route('categorias.create');
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    public function salvar(Request $request)
    {

        //dd($request);


    }
}
