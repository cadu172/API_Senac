<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produtos;

class ProdutoController extends Controller
{


    /**
     * 
     * https://www.youtube.com/watch?v=p3183c50YOQ
     * 
     * encontrei neste video a solução para o problema de permissão no Cors
     * 
     * 1 - php artisan make:middleware Cors
     * 2 - Incluir no arquivo "\App\Http\Middleware\Cors.php" as seguintes linhas:
     * ------------
     *   public function handle($request, Closure $next)
     *    return $next($request)
     *   ->header("Access-Control-Allow-Origin","*")
     *   ->header("Access-Control-Allow-Methods","GET, POST, PUT, DELETE, OPTIONS")
     *   ->header("Access-Control-Allow-Headers","Accept, Authorization, Content-Type");
     * 
     * 3 - em "\App\Http\Kernel.php", no grupo "protected $middleware", incluir a seguinte linha:
     *  \App\Http\Middleware\Cors::class,    pode ser abaixo da linha "\App\Http\Middleware\TrimStrings::class,"
     * Desta forma o site vai autorizar qq ip fazer acesso a sua API
     */

    public function index()
    {
        //
        return Produtos::all();
    }

    public function store(Request $request)
    {
        //
        Produtos::create($request->all());
    }

    public function show($id)
    {
        //
        return( Produtos::findorfail($id) );
        //$data = Role::where('sku','=',$id)->get();
        //return($data);
    }

    public function update(Request $request, $id)
    {
        //
        $prod = Produtos::findorfail($id);
        $prod->update($request->all());
    }

    public function destroy($id)
    {
        //
        $prod = Produtos::findorfail($id);
        $prod->delete();        
    }
}
