<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\subcategoria;
use Storage;
class ProductosController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
       
      
      // $subcategorias = Categoria::find(3)->subcategorias;
       //dd($subcategorias[0]->descripcion);
       $productos = Producto::all();
       return view('productos.index',compact('productos'));
    }
    /*
      Funcion para agregar un nuevo producto
     */

    public function crearProducto(){
         
        $categorias = Categoria::all();
        return view('productos.crear',compact('categorias'));
    }
    public function guardarProducto(Request $request){
       // dd($request->all());
        $validaciones = $request->validate([
          'nombre'=> ['required','max: 80'],
          'descripcion'=>['required','max: 250'],
          'imagen'=>['required','Image','mimes: jpeg,png,gif,svg','file'],
          'precio' => ['required','min: 0','numeric','max: 9999999'],
          'stock' => ['required','min: 0','numeric','max: 9999999'],
          'tags' => ['required','min:1']
        ]);
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->imagen = $request->imagen;
        $producto->estado = 1;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        $tags = $request->tags;
        
        //Capturar imagen
        $imagen = $request->file('imagen');
        //Obtener nombre de la imagen
        $nombreImagen = time()."_".$imagen->getClientOriginalName();
        Storage::disk('productos')->put($nombreImagen,\File::get($imagen));
        $producto->imagen = $nombreImagen;
        $producto->save();
        //Agregar cateogorias al producto
        foreach($tags as $tag){
            $producto->categorias()->attach($tag);
        }
        return redirect()->route('productos.crear');
    }
    public function editarProducto($id){
        
        $producto = Producto::FindOrFail($id);
        $categorias = Categoria::all();
        $producto_categoria = $producto->categorias;
        //dd($producto_categoria);
        return view('productos.editar',compact('producto','categorias','producto_categoria'));
        
    }
    public function updateProducto(Request $request, $id){

        $producto = Producto::FindOrFail($id);
       
         //Capturar imagen
         $imagen = $request->file('imagenr');
         //Obtener nombre de la imagen
         if(isset($imagen) && $imagen!=null){
            $nombreImagen = time()."_".$imagen->getClientOriginalName();
            Storage::disk('productos')->put($nombreImagen,\File::get($imagen));
            $producto->imagen = $nombreImagen;
         }
         $producto->update($request->all());
        //Actualizar categorias
        $tags = $request->tags;
        //attach  
        //detach 
        //sync
        $producto->categorias()->sync($tags);
        return redirect()->route('productos.index');
      
    }
    public function eliminar($id){
        $producto = Producto::findOrfail($id);
        $producto->delete();
        return redirect()->route('productos.index');
    }

    //Funcion para agregar subcategorias
    public function listaSubcategorias($id){
        
        $categoria = Categoria::findOrFail($id);
      
        //llenar arreglos con todos los id de las subcategorias
        $subs = array();
        foreach($categoria->subcategorias as $sub){
           array_push($subs,$sub->id);
        }
        $subcategorias = subcategoria::FindOrFail($subs);
        return [$subcategorias,$categoria];
        
    }
}
