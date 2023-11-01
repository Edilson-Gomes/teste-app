<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produtos::all();
        return view("produtos", compact("produtos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "nome"=> "required",
            "descricao"=> "required",
            "image"=> "required",
            "quantidade"=> "required",
        ], [
            'nome.required' => 'O campo nome é obrigatório',
            'descricao.required' => 'O campo descrição é obrigatório!',
            'image.required'=> 'O campo image é obrigatório!',
            'quantidade.required'=> 'O campo quantidade é obrigatório!',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            $produtos = new Produtos;
            $produtos->nome = $request->nome;
            $produtos->descricao = $request->descricao;
            $produtos->image = ($request->image);
            $produtos->quantidade = ($request->quantidade);

            if ($request->hasFile("image") && $request->file("image")->isValid()) {
                $requestImage = $request->file("image");
                $extension = $requestImage->extension();
                $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
                $requestImage->move(public_path("img/produtos"), $imageName);
                $produtos->image = $imageName;
            }

            $produtos->save();

            return "<script>alert('Produto registrado com sucesso!')</script>" . redirect('/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = Produtos::find($id);
        return view('unidade', compact('produto'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function show(Produtos $produtos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $validator = Validator::make($request->all(), [
        //     "nome"=> "required",
        //     "descricao"=> "required",
        //     "image"=> "required",
        //     "quantidade"=> "required",
        // ], [
        //     'nome.required' => 'O campo nome é obrigatório',
        //     'descricao.required' => 'O campo descrição é obrigatório!',
        //     'image.required'=> 'O campo image é obrigatório!',
        //     'quantidade.required'=> 'O campo quantidade é obrigatório!',
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }else{
        //     $produtos = new Produtos;
        //     $produtos->nome = $request->nome;
        //     $produtos->descricao = $request->descricao;
        //     $produtos->image = ($request->image);
        //     $produtos->quantidade = ($request->quantidade);

        //     if ($request->hasFile("image") && $request->file("image")->isValid()) {
        //         $requestImage = $request->file("image");
        //         $extension = $requestImage->extension();
        //         $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
        //         $requestImage->move(public_path("img/produtos"), $imageName);
        //         $produtos->image = $imageName;
        //     }

        //     $produtos->save();
        //     return "<script>alert('Atualização com sucesso!')</script>". redirect('/');
        // }

        $request->validate([
            "nome"=> "required",
            "descricao"=> "required",
            "image"=> "required",
            "quantidade"=> "required",
        ], [
            'nome.required' => 'O campo nome é obrigatório',
            'descricao.required' => 'O campo descrição é obrigatório!',
            'image.required'=> 'O campo image é obrigatório!',
            'quantidade.required'=> 'O campo quantidade é obrigatório!',
        ]);


        $produtos = Produtos::find($id);
        $produtos->nome = $request->nome;
        $produtos->descricao = $request->descricao;
        // $produtos->image = ($request->image);
        $produtos->quantidade = ($request->quantidade);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->file('image');
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . '.' . $extension;
            $requestImage->move(public_path('img/produtos'), $imageName);
            $produtos->image = $imageName;
        }

        $produtos->save();
        return "<script>alert('Atualização com sucesso!')</script>". redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produtos = Produtos::find($id);
        $produtos->delete();
        return redirect('/');
    }
}
