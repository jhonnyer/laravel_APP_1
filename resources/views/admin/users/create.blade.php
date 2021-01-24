<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body>
        <h1>Página para agregar usuarios</h1>
        <!-- Conexxion base de datos por medio del controlador -->
        {!!Form::open(['method'=>'POST','action'=>'App\Http\Controllers\AdminUsersController@store', 'files'=>true])!!}
            <table>
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
            {!!Form::label('password','Contraseña: ')!!}
            </td>
            
            <td>
            {!!Form::text('password')!!}
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

            </tr>
            <tr>
            <td>
            <!-- Insertar foto  -->
            {!!Form::label('foto_id','Foto: ')!!}
            </td>
            
            <td>
            {!!Form::file('foto_id')!!}
            </td>
            </tr>
            <tr>

            <td>
            <!-- Enviar datos  -->
            {!!Form::submit('Crear Usuario')!!}
            </td>
            
            <td>
            <!-- Boorar datos del formulario agregados -->
            {!!Form::reset('Borrar')!!}
            </td>
            </tr>
            </table>
            {!!Form::close()!!}
    </body>
</html>
