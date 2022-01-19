<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env('APP_NAME') }}</title>
        
        <!-- Favicons -->
        <link href="{{ asset('img/favicon.png') }}" rel="icon">
        <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 56px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .links svg.icon {
                width: 1rem;
                vertical-align: middle;
                margin-right: 0.25rem;
            }

            .m-b-sm {
                margin-bottom: 10px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .h-2 {
                height: 2rem;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @include('sweetalert::alert')
            
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('admin/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-sm">
                    <svg class="h-2" width="1839.49" height="280" viewBox="0 0 1839.49 280"><rect width="280" height="280" rx="15.61" fill="#ff4800"/><path d="M393.38,217.56a26.61,26.61,0,0,0,7.21-1.66l5,30.78a70.79,70.79,0,0,1-27.73,5.54c-24.67,0-37.43-15-33.55-43.26L367.87,41.75,411.41,37,387.56,207.3C386.45,215.06,388.67,217.56,393.38,217.56Z" transform="translate(-0.26 0)" fill="#333"/><path d="M564.75,111.08l-14.14,94.28a54.5,54.5,0,0,0-.56,6.1c0,6.93,2.78,9.7,7.77,11.65l-12.2,28.28c-16.36-1.39-30-8.6-34.11-24.4-10.26,14.69-24.4,25.23-43.54,25.23-31.89,0-48.25-23-48.25-58.51,0-42.15,22.19-98.16,84.58-98.16A125,125,0,0,1,564.75,111.08ZM464.37,193.43c0,20.8,7.21,26.63,16.91,26.63,10.54,0,19.41-7.77,27.73-20.52l10.54-70.16a45.06,45.06,0,0,0-16.36-2.77C474.35,126.61,464.37,164.87,464.37,193.43Z" transform="translate(-0.26 0)" fill="#333"/><path d="M691.75,98.32l-12.48,42.15c-4.43-1.11-7.76-1.94-12.2-1.94-18.3,0-28.28,17.47-36.32,40.76L621,247.51h-43l20.52-147.25H636l-.55,27.46c10-20.25,26.34-31.62,41.59-31.62A48.29,48.29,0,0,1,691.75,98.32Z" transform="translate(-0.26 0)" fill="#333"/><path d="M757.47,217.28a33.08,33.08,0,0,0,16.63-4.71l11.65,28.84a85.26,85.26,0,0,1-40.49,10.81c-32.44-.28-45.75-19.13-41-53.52l9.71-67.93H693.69l4.16-30.51H720l9.15-32.72,37.16-4.16-5.27,36.88h33.28l-8.6,30.51H756.91l-9.43,67.93C745.54,212.85,748.87,217.28,757.47,217.28Z" transform="translate(-0.26 0)" fill="#333"/><path d="M798.23,247.51l20.52-147.25H862L841.48,247.51ZM873.1,48.69c-1.94,13.58-13.31,23.84-28.29,23.84-15.25,0-24.4-11.37-22.46-25.79a28.16,28.16,0,0,1,28-24.12C865.89,22.62,875,34,873.1,48.69Z" transform="translate(-0.26 0)" fill="#333"/><path d="M997.6,114.41l-19.41,24.4c-9.43-8-22.74-11.93-33.83-11.93-13.59,0-20,4.44-20,11.93,0,7.76,5.82,10.26,28.28,17.47,25,8,38.27,21.35,38.27,44.92,0,27.17-20.24,51-66,51-26.34,0-48.53-10.26-61.28-24.12l22.46-23.3A54.91,54.91,0,0,0,925,220.89c15.81,0,23-6.66,23-14.7,0-9.7-5.83-12.48-29.12-20.52-24.68-8.32-37.43-22.18-37.43-43,0-25,21.62-47.14,62.94-47.14C964.33,95.55,985.13,103,997.6,114.41Z" transform="translate(-0.26 0)" fill="#333"/><path d="M1151.78,111.08l-14.14,94.28a54.5,54.5,0,0,0-.56,6.1c0,6.93,2.77,9.7,7.77,11.65l-12.2,28.28c-16.37-1.39-30-8.6-34.11-24.4-10.26,14.69-24.4,25.23-43.54,25.23-31.89,0-48.25-23-48.25-58.51,0-42.15,22.19-98.16,84.58-98.16A125,125,0,0,1,1151.78,111.08ZM1051.4,193.43c0,20.8,7.21,26.63,16.91,26.63,10.54,0,19.41-7.77,27.73-20.52l10.54-70.16a45.1,45.1,0,0,0-16.36-2.77C1061.38,126.61,1051.4,164.87,1051.4,193.43Z" transform="translate(-0.26 0)" fill="#333"/><path d="M1305.12,140.47l-15,107h-43.26l14.42-97.33c2.49-15.53-2.22-18.86-9.71-18.86-10,0-21.63,14.42-32.16,35.22l-11.37,81h-43l20.52-147.25H1223l-.83,25.79c12.48-18.3,31.89-30.5,49.36-30.5C1296,95.55,1309,112.46,1305.12,140.47Z" transform="translate(-0.26 0)" fill="#333"/><path d="M1366.13,224.49c0,15-12.76,27.73-27.46,27.73-13,0-22.18-10-22.18-22.74,0-14.42,13-27.45,27.73-27.45C1357,202,1366.13,212,1366.13,224.49Z" transform="translate(-0.26 0)" fill="#333"/><path d="M1516.42,247.51h-38.27l.28-21.08c-9.43,14.15-23.85,25.79-43.81,25.79-31.34,0-46.31-22.46-46.31-59.34,0-40.21,18.58-97.33,71.82-97.33a43.13,43.13,0,0,1,32.17,14.14L1502.56,37l42.7,4.71ZM1433,193.16c0,20.8,6.66,26.9,16.36,26.9,12.2,0,22.46-12.48,31.34-27.18l7.76-54.63c-5.27-7.21-11.09-10.81-20.24-10.81C1440.72,127.44,1433,168.76,1433,193.16Z" transform="translate(-0.26 0)" fill="#333"/><path d="M1593.23,194c1.11,19.69,11.92,26.07,26.34,26.07,12.48,0,23.85-4.44,37.44-13.59l15.53,26.06c-16.09,11.65-35.78,19.69-58.51,19.69-43,0-64.06-25-64.06-62.39,0-39.93,21.63-94.28,83.47-94.28,35.77,0,54.35,18,54.35,40.21C1687.79,177.07,1639.54,189.28,1593.23,194Zm51-55.74c0-6.65-3.33-13.58-15-13.58-20.52,0-30.23,21.62-34.11,42.7C1632.05,164.6,1644.25,150.73,1644.25,138.25Z" transform="translate(-0.26 0)" fill="#333"/><path d="M1722.45,247.51l-25.79-147.25H1743l10,114,41.32-114h45.47L1774.3,247.51Z" transform="translate(-0.26 0)" fill="#333"/><path d="M115,165.51c-3,14-4.78,27.17-4.78,38.22,0,17.92,4.78,29.86,17.32,29.86,7.46,0,11.05-3.88,19.41-3.88,5.08,0,6.27,2.09,6.27,7.47,0,14-23,24.78-40,24.78-32.55,0-45.69-25.08-45.69-59.13a162.18,162.18,0,0,1,3-30.75H68.1c-8.66,0-11.94-5.08-11.94-9.56,0-3.58,2.09-6.87,6-6.87l12.54-1.79c17-64.51,62.12-133.49,105.72-133.49C210.85,20.37,224,35,224,55.31,224,92,180.68,146.69,115,165.51ZM166.05,48.44c-9.55,0-30.76,44.8-44.2,90.19,40.92-20.31,56.15-52.26,56.15-72C178,55.91,173.52,48.44,166.05,48.44Z" transform="translate(-0.26 0)" fill="#fff"/></svg>
                    TALL Admin Dashboard Preset
                </div>

                <div class="links">
                    <a href="https://tailwindcss.com/" target="_blank">Tailwind CSS</a>
                    <a href="https://github.com/alpinejs/alpine" target="_blank">Alpine JS</a>
                    <a href="https://laravel.com/" target="_blank">Laravel</a>
                    <a href="https://laravel-livewire.com/" target="_blank">Livewire</a>

                    <a href="https://github.com/lartisan/laravel-preset">
                        GitHub
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>
