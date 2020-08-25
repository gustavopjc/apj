<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Endereco;
use App\Produto;
use App\Pedidos;
use App\User;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class FrontController extends Controller
{
    //
    public function index(){
        $produtos=Produto::all();
        return view('front.index',compact('produtos'));
    }
    public function produtos(Request $request){

        $produtos=Produto::get();
        $SemProdutos=Produto::get();
        $categorias=Categoria::all();
        $filtercategorias = null;
        $filternome = null;
        if(request('search')){
            $filternome = request('search');
        }
        if(request('categorias_id')){
            $filtercategorias = request('categorias_id');
        }
        $produtos = Produto::ofFilters()->paginate(20);
        return view('front.loja',compact('produtos','categorias','filternome','filtercategorias','SemProdutos'));
    }
    public function detalhe($id){
        $produto = Produto::findOrFail($id);
        for ($i=1; $i <= 10; $i++) {
            $qtde[$i] = $i;
        }
        return view('front.detalhe',compact('produto','qtde'));
    }
    public function sobre(){
        return view('front.sobre');
    }
}
