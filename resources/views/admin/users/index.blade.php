<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <title>Laravel</title>
    </head>
    <body>
    @if(Session::has('usuario_borrado'))
      <p class="bg-danger">{{session('usuario_borrado')}}</p>
    @endif
        <!-- Margin 50 px (De alto, 0 de lado y lado)  -->
        <h1 style="text-align:Center; margin:50px 0">Página de Administración</h1>
        <table width="600" class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Foto</th>
        <th>Role ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Creado</th>
        <th>Actualizado</th>
      </tr>
    </thead>
    <tbody>
    @if($users)
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            @if($user->foto)
            <td><img src="/images/{{$user->foto->ruta_foto}}" width="150"/></td>
            <!-- <td>{{$user->foto->ruta_foto}}</td> -->
            @else
            <td><img src="/images/logotipo_foto.png" width="150" /></td>
            <!-- <td>Sin Foto</td> -->
            @endif
            <td>{{$user->role_id}}</td>
            <td><a href="{{route('users.edit',$user->id)}}">{{$user->name}}</a></td>
            <td>{{$user->email}}</td>
            <td>{{$user->created_at}}</td>
            <td>{{$user->updated_at}}</td>
        </tr>
        @endforeach
    @endif
    </tbody>
  </table>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  </body>
</html>
