<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Foto;
use Illuminate\Support\Facades\Session;
class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Pagina principal index.blade.php 
        $users=USer::all();
        return view("admin.users.index",compact('users'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.users.create");
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
        // Verificar informacion si se esta enviando la informacion del formulario 
        // return $request->all();
        //
        // Almacenar informacion del formulario en la base de datos 
        // User::create($request->all());
        // una vez almacenado devolver a la pagina de admin/users
        // return redirect('/admin/users');

        // Entrada almacena toda la informacion del request 
        $entrada=$request->all();
        // Si hay una imagen guardar en la variable archivo. Campo ruta_foto
        if($archivo=$request->file('foto_id')){
        //    Guardar en la variable nombre el nombre del archivo adjunto. Metodo getClientOriginalName  
           $nombre=$archivo->getClientOriginalName();
        //    Movel el nombre del archivo a la carpeta images 
           $archivo->move('images',$nombre); 
        //    Almacenar la imagen en la base de datos fotos, utilizar el modelo FOTO 
           $foto=Foto::create(['ruta_foto'=>$nombre]);
        //    Asignarle un id a la variable de entrada ruta_foto. Va a ser igual al id de la foto 
           $entrada['foto_id']=$foto->id;
        }
        $entrada['password']=bcrypt($request->password);
        User::create($entrada);
        return redirect('/admin/users');
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
        // Buscar el usuario en la base de datos
        $user=User::findOrFail($id);
        // Redirigir hacia la pagina de editar 
        return view('admin.users.edit',compact('user'));
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
        // Busca el usuario en la base de datos de acuerdo al parametro id 
        $user=User::findOrFail($id);
        // Entrada almacena toda la informacion del request 
        $entrada=$request->all();
        // Si hay una imagen guardar en la variable archivo. Campo ruta_foto
        if($archivo=$request->file('foto_id')){
        //    Guardar en la variable nombre el nombre del archivo adjunto. Metodo getClientOriginalName  
           $nombre=$archivo->getClientOriginalName();
        //    Movel el nombre del archivo a la carpeta images 
           $archivo->move('images',$nombre); 
        //    Almacenar la imagen en la base de datos fotos, utilizar el modelo FOTO 
           $foto=Foto::create(['ruta_foto'=>$nombre]);
        //    Asignarle un id a la variable de entrada ruta_foto. Va a ser igual al id de la foto 
           $entrada['foto_id']=$foto->id;
        }
        $user->update($entrada);
        return redirect('/admin/users');
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
        $user=User::findOrFail($id)->delete();
        Session::flash('usuario_borrado', 'El usuario ha sido eliminado con éxito');
        // $user->delete();
        return redirect('/admin/users');
        //
    }
}
