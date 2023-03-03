<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use App\Models\Produto_imagens;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $produtos = Produto::get();
        //dd($produtos);

       return view('painel.produtos',compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('painel.produtos_create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
            'nome' =>'required|min:2|max:180',
            'descricao' =>'min:10',
            'valor' =>'required'
           ],[
            'nome.required' =>'Ops,Vc precisa informar um nome',
            'nome.min' =>'Desculpe,O nome de ter mais de 2 caracteres!',
            'descricao.max' =>'Desculpe,O A Descricao deve ter até 250 Caracteres!',
            'required' =>'Ops,Vc precisa informar um caractere para enviar', // Esse fica como default para todos Required
           ]
    );

       $data = $request->all(); // mesmo que $data = $_REQUEST;
       //dd($data);

       if ( $request->hasFile('imagem') ) {
          $dir ='imagens/produtos';
          $i=0;
          foreach ($request->file('imagem') as $key => $conf_img) {
              $conf_img->store($dir);
              $imageName = $data_prod_img['descricao'] = cleanfilename( rand(10,800). $conf_img->getClientOriginalName());
              $conf_img->move($dir,$imageName);
              $data['imagem'] = $data_prod_img['nome_img'] = $dir .'/'. $imageName;
              if ($i ==0 ) {
                $res_p = Produto::create($data);
                $data_prod_img['produto_id'] = $res_p['id'];
              }
              $res_pd = Produto_imagens::create($data_prod_img);
              $i++;
          }
       }else{

       }
       //return redirect()->route('home');  // nao funciona!
       return redirect('/painel/produtos')->with(['status' => 'Cadastro realizado com sucesso!!']);
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
         $produtos = Produto::find( $id );
          //dd($produtos->attrib)
          //dd($produtos);

        if ( $produtos->getAttributes() ) {
            $produtos->delete();
            $marca = ['status'=>'Success','message'=>"Marca {$id} Deletada com Sucesso"];;
        }else{
            $marca = response()->json(['status'=>'Erro', "message"=>'Id enviado nao foi encontrado para Deletar!'], $status = 404);

        }

        return $marca;

    }
}
