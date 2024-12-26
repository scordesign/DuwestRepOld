<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="https://duclient.duwestcolombia.com/public/img/Icono.jpg">
        <title>Duwest</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                    
                        <a href="{{ url('/home') }}"style=" background-color: #199319;
  color: white;
  padding: 15px 25px;
  text-decoration: none;
@media (max-width: 480px) { margin-left: 70%;
    margin-top: -15%;
    position: absolute; } " >Home</a>
                       
                    @else
                   
                        <a href="{{ route('login') }}"style=" background-color: #199319;
  color: white;
  padding: 15px 25px;
  text-decoration: none;
 @media (max-width: 480px) { margin-left: 70%;
    margin-top: -15%;
    position: absolute; }" >Ingresar</a>
                        

                        <!-- @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif 
                        
                        class="btn btn-primary stretched-link"
                        -->
                    @endauth
                </div>
            @endif
            <div class="">
               
                       <!-- <a href="{{ route('login') }}" class="btn btn-primary stretched-link">Ingresar</a>-->
                <h1 style="margin-left:10%;@media (max-width: 480px) { margin-top:15%; }">Duwest Cultivos / Tieto</h1>
                <h2 style="margin-left:10%;@media (max-width: 480px) { margin-top:15%; }">Este es un espacio creado para los Duwestianos de corazón.
Ingresa con tu usuario y crezcamos juntos.</h2>
            </div>
            
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <img style="width: 30%;
    align-items: center;
    text-align: center;
    margin-left: 35%;
    margin-right: 40%;"src= "img/ESLOGAN VERDE.png" >
                    <!-- Footer -->


                </div>
                
                 
            
                          
                            

                            

                    
                </div>
            </div>
        </div>
        <!-- Footer -->
<footer class="page-footer font-small blue">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3"style="position:absolute;bottom:2%;">2022 Copyright:
    <a href="/"> ScorDesign.com</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
    </body>
</html>
