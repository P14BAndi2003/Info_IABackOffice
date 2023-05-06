<!DOCTYPE html>
<html>
<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Accueil Admin</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/vendors/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/vendors/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/vendors/images/favicon-16x16.png">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- CSS -->
	<link rel="stylesheet" type="text/css" href="assets/vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="assets/vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendors/styles/style.css">
    <link rel="stylesheet" type="text/css" href="assets/src/plugins/datatables/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/src/plugins/datatables/css/responsive.bootstrap4.min.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-119386393-1');
    </script>
</head>
<body>

<div class="header">
    <div class="header-left">
        <div class="menu-icon dw dw-menu"></div>

    </div>
    <div class="header-right">
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">

                    <span class="user-name">@if(session()->has('admin'))
   {{ session('admin')->email }}
@endif</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="{{url('/logoutAdmin')}}"><i class="dw dw-logout"></i> Log Out</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="left-side-bar">
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
            
                <li>
                    <a href="{{url('/liste')}}" class="dropdown-toggle no-arrow">
                        <span class="icon-copy fa fa-newspaper-o" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;<span class="mtext">Aucune option</span>
                    </a>
                </li>
           

            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Tous les articles</h4>
                        </div>

                    </div>

                </div>
            </div>





            <div class="pd-20 card-box mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="text-blue h4">...</h4>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Auteur</th>
                            <th scope="col">Titre</th>
                            <th scope="col">Résumé</th>
                            <th scope="col">Date création</th>
                            <th scope="col">Statut</th>
                            <th scope="col"></th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($articles as $article)
                        <tr>

                            <td>{{ $article->id }}</td>
                            <td>{{ $article->auteur->username }}</td>
                            <td>{{ $article->titre }}</td>
                            <td>{{ $article->description }}</td>
                            <td>{{ $article->datecreation->format('d/m/Y') }}</td>
                           
                            <td>
      @if($article->statut == 0)
      <a href="{{route('articles.validerArticle',['id' => $article->id]) }}"> <button  class="btn btn-info btn-lg btn-block">Valider</button></a>
      @elseif($article->statut == 1)
        Publié
      @endif
    </td>

                           </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
    <div class="footer-wrap pd-20 mb-20 card-box">
    © Copyright 2023
    </div>
</div>
</div>
<!-- js -->

<script src="assets/vendors/scripts/core.js"></script>
    <script src="assets/vendors/scripts/script.min.js"></script>
    <script src="assets/vendors/scripts/process.js"></script>
    <script src="assets/vendors/scripts/layout-settings.js"></script>
</body>
</html>
