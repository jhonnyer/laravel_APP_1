<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body>
        <h1>Pàgina para editar usuarios</h1>
        <!-- Metodo PATCH modificar la informacion que aparece en el formulario  -->
        {!!Form::model($user,['method'=>'PATCH','action'=>['App\Http\Controllers\AdminUsersController@update', $user->id], 'files'=>true])!!}
            <table>

            <!-- <tr>
            @if($user->foto)
            <td><img src="/images/{{$user->foto->ruta_foto}}" width="150"/></td>
            @else
            <td><img src="/images/logotipo_foto.png" width="150" /></td>
            @endif
            </tr> -->
           
            <!-- Operador Ternario  -->
            <tr>
            <img src="/images/{{$user->foto ? $user->foto->ruta_foto: 'logotipo_foto.png'}}" width="150">
            </tr>

            <tr>
            <td colspan="2">
            {!!Form::file('foto_id')!!}
            </td>
            </tr>

            <tr>
            <td>
            <!-- Ingresa un campo a llenar  -->
            {!!Form::label('name','Nombre: ')!!}
            </td>
            
            <td>
            {!!Form::text('name')!!}
            </td>
            </tr>
    
            <tr>
            <td>
            <!-- Ingresa un campo a llenar  -->
            {!!Form::label('email','Dirección de correo: ')!!}
            </td>
            
            <td>
            {!!Form::text('email')!!}
            </td>
            </tr>
            <tr>
            <td>
            <!-- Ingresa un campo a llenar  -->
            {!!Form::label('email_verified_at','Verificar correo: ')!!}
            </td>
            
            <td>
            {!!Form::text('email_verified_at')!!}
            </td>
            </tr>
            <tr>
            <td>
            <!-- Ingresa un campo a llenar  -->
            {!!Form::label('role_id','Role: ')!!}
            </td>
            
            <td>
            {!!Form::text('role_id')!!}
            </td>
            </tr>

            <tr>
            <td>
            <!-- Enviar datos  -->
            {!!Form::submit('Modificar Usuario')!!}
            </td>         
            <td>
            <!-- Boorar datos del formulario agregados -->
            {!!Form::reset('Borrar')!!}
            </td>
            </tr>
            </table>
            {!!Form::close()!!}
            <!-- Formulario eliminar un usuario  -->
            {!!Form::model($user,['method'=>'DELETE','action'=>['App\Http\Controllers\AdminUsersController@destroy', $user->id]])!!}
            {!!Form::submit('Eliminar Usuario')!!}
            {!!Form::close()!!}
    </body>
</html>
