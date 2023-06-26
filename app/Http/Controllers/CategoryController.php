<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index',compact(["categories"]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = Category::create($request->all());

        return redirect()->route('categories.index')
        ->with("mensaje", 'Categoria creada correctamente')
        ->with("tipo", 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        $products = $category->products;
        return view('categories.show',compact(['category','products']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit',compact(['category']));
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
        $category = Category::findOrFail($id);
        $category->fill($request->all());
        $category->save();

        return redirect()->route('categories.index')
        ->with("mensaje", 'Categoria editada correctamente')
        ->with("tipo", 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $products = $category->products;
        if(count($products)>0){
            return redirect()->route('categories.index')
            ->with("mensaje", 'La categoria contiene productos que se deben eliminar')
            ->with("tipo", 'danger');
        }else{
            $category->delete();
            return redirect()->route('categories.index')
            ->with("mensaje", 'La categoria se ha eliminado correctamente')
            ->with("tipo", 'success');
        }

    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $products = $category->products;
        if(count($products)>0){
            return redirect()->route('categories.index')
            ->with("mensaje", 'La Categoria contiene productos que se deben eliminar')
            ->with("tipo", 'danger');
        }
        return view('categories.delete',compact(["category"]));
    }
}