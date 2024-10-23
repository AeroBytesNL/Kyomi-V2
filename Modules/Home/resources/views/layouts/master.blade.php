<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('title')</title>

    <meta name="description" content="{{ $description ?? '' }}">
    <meta name="keywords" content="{{ $keywords ?? '' }}">
    <meta name="author" content="{{ $author ?? '' }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @include('home::includes.head')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <link rel="manifest" href="/manifest.json">

    {{-- Vite CSS --}}
    {{-- {{ module_vite('build-home', 'resources/assets/sass/app.scss') }} --}}
  </head>

  <body>
    @include('home::includes.navbar')

    <main>
      @yield('content')

      <!-- Errors -->
      @if ($errors->any())
        <div class="toast-container showposition-fixed bottom-0 end-0 p-3">
          <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
              <img src="/app_media/Kiyomi_logo.png" class="rounded me-2" alt="..." style="max-width: 35px">
              <strong class="me-auto">Fout!</strong>
              <small>Een paar seconden geleden</small>
              <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </div>
          </div>
        </div>

        <script>
            const toastLiveExample = document.getElementById('liveToast')
            const toast = new bootstrap.Toast(toastLiveExample)
            toast.show()
        </script>
      @endif

      @if (session()->has('error'))
        <div class="toast-container showposition-fixed bottom-0 end-0 p-3">
          <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
              <img src="/app_media/Kiyomi_logo.png" class="rounded me-2" alt="..." style="max-width: 35px">
              <strong class="me-auto">Fout!</strong>
              <small>Een paar seconden geleden</small>
              <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
              {{ session('error') }}
            </div>
          </div>
        </div>

        <script>
          const toastLiveExample = document.getElementById('liveToast')
          const toast = new bootstrap.Toast(toastLiveExample)
          toast.show()
        </script>
      @endif

      <!-- Success -->
      @if (session()->has('success'))
        <div class="toast-container showposition-fixed bottom-0 end-0 p-3">
          <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
              <img src="/app_media/Kiyomi_logo.png" class="rounded me-2" alt="..." style="max-width: 35px">
              <strong class="me-auto">Success!</strong>
              <small>Een paar seconden geleden</small>
              <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
              {{ session('success') }}
            </div>
          </div>
        </div>

        <script>
          const toastLiveExample = document.getElementById('liveToast')
          const toast = new bootstrap.Toast(toastLiveExample)
          toast.show()
        </script>
      @endif

      @include('home::includes.footer')
    </main>

    <style>
      body, html {
        background-image: url("/media/images/plane.png");
        background-repeat: no-repeat;
        background-position: center;
        background-size: 60%;
        background-attachment: fixed;

        background-color: #2f3031;
      }    

      @media only screen and (max-width: 900px) {
        body, html {
          background-image: url("/media/images/plane.png");
          background-repeat: no-repeat;
          background-position: center;
          background-size: 100%;
          background-attachment: fixed;

          background-color: #2f3031;
        }
      }
    </style>

    <script>
      function requiredHideViewer(e) {
        if(e.value != ''){
          document.getElementById(e.id + '_required').style.visibility = "hidden";
          return;
        }	
        document.getElementById(e.id + '_required').style.visibility = "visible";
      }
    </script>  

    <!-- Google reCCHAPTA -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    {{-- Vite JS --}}
    {{-- {{ module_vite('build-home', 'resources/assets/js/app.js') }} --}}
  </body>
  <script type="text/javascript">
    // Initialize the service worker
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/serviceworker.js', {
            scope: '.'
        }).then(function (registration) {
            // Registration was successful
            console.log('Laravel PWA: ServiceWorker registration successful with scope: ', registration.scope);
        }, function (err) {
            // registration failed :(
            console.log('Laravel PWA: ServiceWorker registration failed: ', err);
        });
    }
</script>
</html>