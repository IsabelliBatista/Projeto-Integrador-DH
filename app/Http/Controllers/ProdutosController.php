<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Produto;
use App\Categoria;
use App\Marca;

class ProdutosController extends Controller
{
        
    protected function pegarCategoriaMarca()
    {
        $marca = Marca::all();
        $categoria = Categoria::all();
        
        return view('produtos.cadastrarProdutos')->with(['marcas' => $marca, 'categorias' => $categoria]);
    }

    protected function create(Request $request)
    {
        $arquivo = $request->file('image');
        dd($arquivo);
        // if (empty($arquivo)) {
        //     $caminhoRelativo = null;
        // } else {
        //     $arquivo->storePublicly('uploads');
        //     $caminhoAbsoluto = public_path()."/storage/uploads";
        //     $nomeArquivo = $arquivo->getClientOriginalName();
        //     $caminhoRelativo = "storage/uploads/$nomeArquivo";
        //     $arquivo->move($caminhoAbsoluto, $nomeArquivo);
        // }

        $produtos = Produto::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image' => $caminhoRelativo,
            'marca_id' => $request->input('marca'),    
            'categoria_id' => $request->input('category')
        ]);
    
        $produtos->save();

        return redirect()->to('/cadastrar/produtos')->with('message', 'Produto cadastrado com sucesso!');

    }
    
    public function update(Request $request)
    {
        $path = $request->file('image')->store('image');

        return $path;
    }
}