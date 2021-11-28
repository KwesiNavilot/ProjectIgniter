@php
    //variable to hold tooltip info
    $tips = '';

    //THis array creates the sidebar links
    $navs = array("dashboard" => "Dashboard", "storefront" => "Store Front", "products" => "Products", "orders" => "Orders", "reports" => "Reports");

    if(isset($toast)) {
        $title = $toast['title'];
        $message = $toast['message'];
    }
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{ asset('css/izitoast/izitoast.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/fontawesome/fontawesome.min.css') }}">
        <link rel="stylesheet" href="{{asset('css/boxicons/css/boxicons.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/icofont/icofont.min.css')}}">

        @if($trigger ?? '' == 'fotorama')
            <link rel="stylesheet" href="{{asset('fotorama/fotorama.css')}}">
        @endif

        <link rel="stylesheet" href="{{asset('css/viper.css')}}">
        <link rel="stylesheet" href="{{asset('css/shredder.css')}}">

        {{-- Javascript --}}
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('js/iziToast/izitoast.min.js') }}"></script>

        @if($trigger ?? '' == 'fotorama')
            <script src="{{ asset('fotorama/fotorama.js') }}"></script>
        @endif

        <script src="{{ asset('js/viper.js') }}"></script>
    </head>

    <body>
        @include('inc.inside-nav')
        @include('inc.sidebar', ['navs' => $navs])

        <div class="i-content">
            <div class="container marg" style="padding: 2.5rem !important;">
                @include('inc.messages')
                @yield('content')
            </div>

            @include('inc.inside-footer')
        </div>

{{--        @include('inc.outside-footer')--}}

        {{-- Text Editor, only on request --}}
        @if($trigger ?? '' == 'editor')
            <script src="{{asset('ckeditor5/ckeditor.js')}}"></script>
            <script>
                var allEditors = document.querySelectorAll( '#editor' );

                for (var i = 0; i < allEditors.length; i++) {
                    ClassicEditor.create(allEditors[i], {
                        toolbar: {items: ['heading', '|', 'bold', 'italic', 'bulletedList', 'numberedList', '|', "indent", "outdent", "|", 'insertTable', '|', 'undo', 'redo']},
                        table: {contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']}
                    }).then(editor => {
                        console.log(editor);
                    }).catch(error => {
                        console.error(error);
                    });
                }
            </script>
        @endif

        <script>
            $(document).ready(function(){
                $( "#sortable-1" ).sortable();
            });
        </script>

        {{-- IziToast --}}
        <script>

            iziToast.settings({
                layout: 2,
                resetOnHover: true,
                position: 'topCenter',
                progressBar: true,
                transitionIn: 'fadeInDown',
            });

            @if(session('toast') !== null)
                @switch(session('toast')['type'])
                    @case('show')
                        iziToast.show({
                            title: "{{ session('toast')['title'] }}",
                            message: "{{ session('toast')['message'] }}"
                        });
                    @break

                    @case('success')
                        iziToast.success({
                            title: "{{ session('toast')['title'] }}",
                            message: "{{ session('toast')['message'] }}"
                        })
                    @break

                    @case('success')
                        iziToast.warning({
                            title: "{{ session('toast')['title'] }}",
                            message: "{{ session('toast')['message'] }}"
                        })
                    @break
                @endswitch
            @endisset
        </script>
    </body>
</html>
