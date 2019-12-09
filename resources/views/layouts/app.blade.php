<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <script type="text/javascript">
    function Encrypt() {
        plaintext = document.getElementById("p").value.toLowerCase().replace(/[^a-z]/g, "");  
        if(plaintext.length < 1){ alert("please enter some plaintext"); return; }    
        var key = document.getElementById("key").value.toLowerCase().replace(/[^a-z]/g, "");  
        var pc = document.getElementById("pc").value.toLowerCase().replace(/[^a-z]/g, "");
        if(pc=="") pc = "x";    
        while(plaintext.length % key.length != 0) plaintext += pc.charAt(0);    
        var colLength = plaintext.length / key.length;
        var chars = "abcdefghijklmnopqrstuvwxyz"; 
        ciphertext = ""; k=0;
        for(i=0; i < key.length; i++){
            while(k<26){
                t = key.indexOf(chars.charAt(k));
                arrkw = key.split(""); arrkw[t] = "_"; key = arrkw.join("");
                if(t >= 0) break;
                else k++;
            }
            for(j=0; j < colLength; j++) ciphertext += plaintext.charAt(j*key.length + t);
        }
        document.getElementById("body").value = ciphertext;
    }

    function Decrypt(f) {
        ciphertext = document.getElementById("c").value.toLowerCase().replace(/[^a-z]/g, "");  
        if(ciphertext.length < 1){ alert("please enter some ciphertext (letters only)"); return; }    
        keyword = document.getElementById("key").value.toLowerCase().replace(/[^a-z]/g, ""); 
        klen = keyword.length;
        if(klen <= 1){ alert("keyword should be at least 2 characters long"); return; }
        if(ciphertext.length % klen != 0){ alert("ciphertext has not been padded, the result may be incorrect (incorrect keyword?)."); }
        // first we put the text into columns based on keyword length
        var cols = new Array(klen);
        var colLength = ciphertext.length / klen;
        for(i=0; i < klen; i++) cols[i] = ciphertext.substr(i*colLength,colLength);
        // now we rearrange the columns so that they are in their unscrambled state
        var newcols = new Array(klen);
        chars="abcdefghijklmnopqrstuvwxyz"; j=0;i=0;
        while(j<klen){
            t=keyword.indexOf(chars.charAt(i));        
            if(t >= 0){
                newcols[t] = cols[j++];
                arrkw = keyword.split(""); arrkw[t] = "_"; keyword = arrkw.join("");
            }else i++;         
        }    
        // now read off the columns row-wise
        plaintext = "";
        for(i=0; i < colLength; i++){
            for(j=0; j < klen; j++) plaintext += newcols[j].charAt(i);
        }            
        document.getElementById("p").value = plaintext;    
    }
 </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->

                    @includeWhen(Auth::user(), 'layouts._admin_menu')

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                @include('flash::message')
            </div>
        </div>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
