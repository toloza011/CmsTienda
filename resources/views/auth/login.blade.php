<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Login</title>
</head>
<body >
    <div class="container" style="margin-top: 100px;">
         <div class="col-md-12 mt-5" >
             <div class="row">
                 <div class="col-md-5 mt-5">
                      <img src="img/logo_login.svg" class="w-100 h-100 mt-5"  alt="">
                 </div>
                 <div class="col-md-7 mt-5 rounded p-4" style="background: #0a5592">
                    <div class="text-center text-white" >
                        <h2 style="font-weight:500">Administra tu tienda con nosotros</h2>
                    </div>
                   <div class="row mt-5">
                    <div class="col-md-10 offset-1">
                        <form method="post" action="{{ route('login') }}"  class="text-white">
                            @csrf
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
                              <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Ingresa tu contraseña" >
                              @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                               @enderror
                          </div>
                          <div class="form-group">
                              <button type="submit" class="btn btn-block btn-success">Entrar</button>
                          </div>
                          <div class="row">
                              <div class="col-md-7 offset-5 ">
                                  <a href="{{ route('register') }}" class="text-white">Aun no tienes una cuenta? Registrate!</a>
                              </div>
                          </div>
                          <div class="row">
                            @if (Route::has('password.request'))
                            <div class="col-md-6 offset-6">
                            <a class="btn btn-link text-white" href="{{ route('password.request') }}">
                                {{ __('Olvidaste tu contraseña?') }}
                            </a>
                           </div>
                            @endif
                          </div>
                        </form>
                    </div>   
                   </div>
                 </div>
             </div>
         </div>
    </div>
</body>
</html>