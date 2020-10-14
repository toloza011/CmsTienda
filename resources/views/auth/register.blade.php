<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Registro</title>
</head>
<body >
    <div class="container" >
         <div class="col-md-12 mt-5" >
             <div class="row">
                <div class="col-md-7 mt-5 rounded p-4" style="background: #0a5592">
                    <div class="text-center text-white" >
                        <h2 style="font-weight:500">Unete y sacale provecho a tu tienda</h2>
                    </div>
                   <div class="row mt-4">
                    <div class="col-md-10 offset-1">
                        <form method="post" action="{{ route('register') }}"  class="text-white">
                            @csrf
                            <div class="form-group">
                                <label for="nombre">Nombre completo</label>
                                <input type="text" placeholder="Ingrese su nombre" class="form-control @error('nombre') is-invalid @enderror" name="nombre" id="nombre">
                                @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                 @enderror
                            </div>
                          <div class="form-group ">
                              <label for="email">Email</label>
                              <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Ingresa tu email" >
                              @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                               @enderror
                          </div>
                          <div class="form-group">
                              <label for="password">Contraseña: </label>
                              <input id="password" type="password" placeholder="Cree una contraseña" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                              @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                          </div>
                          <div class="form-group">
                              <label for="password_confirmation">Confirmar Contraseña: </label>
                              <input id="password_confirmation" type="password" placeholder="Confirme su contraseña" class="form-control @error('password_confirmation') is-invalid  @enderror" name="password_confirmation" autocomplete="new-password">
                              @error('password_confirmation')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                             </span>
                              @enderror
                            </div>
                          <div class="form-group">
                              <button type="submit" class="btn btn-block btn-success">Registrar</button>
                          </div>
                          <div class="row">
                              <div class="col-md-7 offset-5 ">
                                  <a href="{{ route('login') }}" class="text-white">Ya tienes una cuenta? Entra!</a>
                              </div>
                          </div>
                        </form>
                    </div>   
                   </div>
                 </div>
                 <div class="col-md-5 mt-5">
                      <img src="img/registro.svg" class="w-100 h-100 mt-5"  alt="">
                 </div>
                
             </div>
         </div>
    </div>
</body>
</html>