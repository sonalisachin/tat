@extends('pages.layout')  
@section('content')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" crossorigin="anonymous" />    
    <style>
        .dropdown-menu .nav-item a { color: #000 !important; }
        .dropdown-toggle:after { content: none; }
        .dropdown-menu .dropdown-menu { margin-left: 0; margin-right: 0; }
        .dropdown-menu li { position: relative }
        .nav-item .submenu { display: none; position: absolute; left: 100%; top: -7px; }
        .dropdown-menu>li:hover { background-color: #f1f1f1; }
        .dropdown-menu>li:hover>.submenu { display: block; }    </style>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <a class="navbar-brand">Laravel</a>
            <ul class="navbar-nav mr-auto">
                @each('menusub', $menulist, 'menu', 'empty')
            </ul>
        </div>
    </nav>
    <div class="row">        
        <h1>{{ $pageData->title }}</h1>
        <p>{{ $pageData->content }}</p>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).on('click', '.dropdown-menu', ($event) => $event.stopPropagation());
        if ($(window).width() < 992) {
            $('.dropdown-menu a').click(($event) => {
                $event.preventDefault();
                if ($(this).next('.submenu').length) {
                    $(this).next('.submenu').toggle();
                }
                $('.dropdown').on('hide.bs.dropdown', () => $(this).find('.submenu').hide());
            });
        }
        
    </script>
@endsection