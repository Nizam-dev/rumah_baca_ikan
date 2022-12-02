    <!-- ========= JS Files =========  -->
    <!-- Bootstrap -->
    <script src="{{asset('public/FINAPP/assets/js/lib/bootstrap.bundle.min.js')}}"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Splide -->
    <script src="{{asset('public/FINAPP/assets/js/plugins/splide/splide.min.js')}}"></script>
    <!-- Base Js File -->
    <script src="{{asset('public/FINAPP/assets/js/base.js')}}"></script>

    <script src="{{asset('public/template/js/axios.min.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        // Add to Home with 2 seconds delay.
        AddtoHome("2000", "once");

        @if(session()->has('success'))
            $("#toast-success .text").html(`{{session()->get('success')}}`)
            toastbox('toast-success', 2000)
        @elseif(session()->has('failed'))
            $("#toast-failed .text").html(`{{session()->get('failed')}}`)
            toastbox('toast-failed', 2000)
        @endif

    </script>


    @stack('js')
