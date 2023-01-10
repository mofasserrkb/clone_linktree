<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
        <title>Clone Linktree </title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <!-- bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.3.slim.js" integrity="sha256-DKU1CmJ8kBuEwumaLuh9Tl/6ZB6jzGOBV/5YpNE2BWc=" crossorigin="anonymous"></script>
    </head>
    <body class="font-sans antialiased" style="background-color:{{$user->background_color}} ">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-200">
                  <h2 class="text-center">Profile:  {{$user->username}} </h2>

                            @foreach ($links as $link)
                            <div class="link">
                         <a href="{{$link->link}}" data-link-id="{{$link->id}}" class="user-link d-block p-4 mb-4 rounded h3 text-center"
                            target="_blank"
                            rel="nofollow"
                            style="border: 2px solid {{$user->text_color}}; color:{{$user->text_color}}"
                            >
                            {{$link->name}}
                         </a>
                            </div>
                          @endforeach

                </div>
            </div>
        </div>
    </div>
    <script>

    $('.user-link').click(function(e){
    var linkId=$(this).data('link-id');
    var linkUrl=$(this).attr('href');
//store the visit asynchronously without interrupting the link opening


  axios.post('http://localhost/clonelinktree/public/visit/'+linkId,{
      link:linkUrl
  })
  .then(response=>console.log('response',response))
  .catch(error=>console.error('error', error))
});

    </script>
    </body>
</html>
