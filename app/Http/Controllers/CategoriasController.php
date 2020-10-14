<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
use App\Models\Categoria;
use App\Models\subcategoria;

class CategoriasController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        
        $categorias = Categoria::all();
        return view('categorias.index',compact('categorias'));
    }
    public function crearCategoria(){
        $categorias = Categoria::all();   
        return view('categorias.crear',compact('categorias'));
    }
    public function store(Request $request){
      // dd($request->all());
       $categorias = Categoria::all();  
       if(isset($request->tipo) && $request->tipo == "on"){
        //Es subcategoria
        $subcategoria = new subcategoria;
        $subcategoria->nombre = $request->nombre;
        $subcategoria->descripcion = $request->descripcion;
        $subcategoria->save();
        $Idpadre = $request->categoria;
        $padre = Categoria::FindOrFail($Idpadre);
        $idHijo = $subcategoria->id;
        $padre->subcategorias()->attach($idHijo);
        return redirect()->route('categorias.crear',compact($categorias))->with('alerta_subcategoria','Subcategoria agregada exitosamente!');
       }else{
         $categoria = new Categoria;
         $categoria->nombre= $request->nombre;
         $categoria->descripcion = $request->descripcion;
         $categoria->save();
         return redirect()->route('categorias.crear',compact($categorias))->with('alerta_categoria','Categoria agregada exitosamente!');
       }
      
    }

    public function subcategorias($id){
        $categorias = Categoria::findOrFail($id);
        return view('categorias.subcategorias',compact('categorias'));
    }
    
    public function editarCategoria($id){
        $categoria = Categoria::findOrFail($id);
        return view('categorias.editarCategoria',compact('categoria'));
    }
    public function actualizarCategoria(Request $request,$id){

        $categoria = Categoria::findOrFail($id);
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->save();

        return redirect()->route('categorias.index');

    }
    public function eliminarCategoria($id){
        
        $categoria = Categoria::findOrFail($id);
        //llenar arreglos con todos los id de las subcategorias
        $subs = array();
        foreach($categoria->subcategorias as $sub){
           array_push($subs,$sub->id);
        }
       
        $subcategorias = subcategoria::FindOrFail($subs);
       
        //eliminar todas las subcategorias
        foreach($subcategorias as $sub){
            $sub->delete();
        }
        //eliminar la relaciones entre categorias padre y subcategorias
        $categoria->subcategorias()->detach($subs);
        //eliminar categoria padre
        $categoria->delete();
        
        return redirect()->route('categorias.index');
    }

    public function editarSubcategoria($id){
        $subcategoria = subcategoria::FindOrFail($id);
        return view('categorias.editarSubcategoria',compact('subcategoria'));
    }
    public function actualizarSubcategoria(Request $request,$id){
        $subcategoria = subcategoria::FindOrFail($id);
        $subcategoria->nombre = $request->nombre;
        $subcategoria->descripcion = $request->descripcion;
        $subcategoria->save();
        return redirect()->route('categorias.subcategorias',$subcategoria->categoria[0]->id);
    }
}
