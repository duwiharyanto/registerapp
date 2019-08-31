<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/bootstrap.css')}}">
        <title>Tutorial Laravel #21 : CRUD Eloquent Laravel - www.malasngoding.com</title>
    </head>
    <body>

        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">
                    Logo
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/pegawai">Pegawai</a></li>
                        <li><a href="/kontak">Kontak</a></li>
                        <li><a href="/datadiri">Data Diri</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">MORE
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Merchandise</a></li>
                                <li><a href="#">Extras</a></li>
                                <li><a href="#">Media</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>
                    </ul>
                </div>
            </div>
        </nav>               
        <div class="container">
            <div class="row" style="margin-top: 50px">
                <div class="col-sm-12">

                    <div class="card-header text-center">
                        <h2>
                            {{ucwords($config->headline)}}    
                        </h2>
                    </div>
                    @if($msg=Session::get('sukses'))
                        <div class="alert alert-success">
                            <b>Informasi</b>, {{ $msg }}
                        </div>
                    @elseif($msg=Session::get('error'))
                        <div class="alert alert-danger">
                            <b>Perhatian</b>, {{ $msg }}
                        </div>                    
                    @endif                    
                </div>
            </div>
            <div class="row">
                @yield('konten')
            </div>
            
        </div>
    </body>
</html>
<script type="text/javascript" src="{{asset('/assets/js/jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('/assets/js/bootstrap.min.js')}}"></script>