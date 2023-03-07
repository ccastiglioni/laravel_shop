<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
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
        $categorias     = new Categoria();
        $arr_categorias = $categorias->get();

        return view('painel.produtos_create',compact('arr_categorias'));
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
       $data['valor'] = str_replace(',', '.', $data['valor']);


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
                $data_prod_img['produto_id'] = $res_p['id_prod'];
              }
              $res_pd = Produto_imagens::create($data_prod_img);
              $i++;
          }
       }else{

       }
       //return redirect()->route('home');  // nao funciona!
       return redirect('/painel/produtos')->with(['status' => 'Cadastro realizado com sucesso!!']);
    }



    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
          //dd($produtos->toArray() );
         //$prodArr =($produtos->toArray() );
         $objprodutos = Produto::find( $id );
        if ( $objprodutos ) {
            Produto::find( $id )->Produto_hasMany_Produto_imagens()->delete();
             Produto::find( $id )->delete();

            $resp_prod = ['status'=>'Success','message'=>"Produto {$id} Deletada com Sucesso"];;
        }else{
            $resp_prod = response()->json(['status'=>'Erro', "message"=>'Id enviado nao foi encontrado para Deletar!'], $status = 404);

        }
        dd($resp_prod);
        return $resp_prod;

    }
}
