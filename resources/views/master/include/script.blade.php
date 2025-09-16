    
    
    
    
    @livewireScripts
    <script src="{{asset("assets/js/jquery.min.js")}}"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script src="{{asset("assets/js/owl.carousel.js")}}"></script>
    <script src="{{asset("assets/js/owl.carousel.min.js")}}"></script>
    <script src="{{asset("assets/js/myCarousel.js")}}"></script>
    <script src="{{asset("assets/js/app.js")}}"></script>
    
    </body>
</html>


<script>
    Pusher.logToConsole = true;
    var pusher = new Pusher('44d753a5045d47c90143', {
      cluster: 'eu'
    });
    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      alert(JSON.stringify(data));
    });
</script>