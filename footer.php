    <footer class="footer text-center" style="color:white;">&copy; 2021 - Kelompok C3 . All right reserved</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            // $('body').scrollspy({target: "#navbarKu"})

            //toggle theme
            $('#toDarkTheme').click(function(){
                $('#navbar').removeClass("navbar-light");
                $('#navbar').removeClass("bg-light");
                $('#body').removeClass("body-light");
                $('#navbar').addClass("navbar-dark");
                $('#navbar').addClass("bg-dark");
                $('#body').addClass("body-dark");
                $('.menu-card-light').addClass("menu-card-dark");
                $('.menu-card-light').removeClass("menu-card-light");
                $('#toDarkTheme').css("display","none");
                $('#toLightTheme').css("display","block");
            })

            $('#toLightTheme').click(function(){
                $('#navbar').removeClass("navbar-dark");
                $('#navbar').removeClass("bg-dark");
                $('#body').removeClass("body-dark");
                $('#navbar').addClass("navbar-light");
                $('#navbar').addClass("bg-light");
                $('#body').addClass("body-light");
                $('.menu-card-dark').addClass("menu-card-light");
                $('.menu-card-dark').removeClass("menu-card-dark");
                $('#toDarkTheme').css("display","block");
                $('#toLightTheme').css("display","none");
            })
            //------------

            // $(window).scroll(function() {
            //     var windowBottom = $(this).scrollTop() + $(this).innerHeight();
            //     $(".fade-in").each(function() {
            //         var objectBottom = $(this).offset().top + $(this).outerHeight();
                    
            //         if (objectBottom < windowBottom) {
            //             if ($(this).css("opacity") == 0) {
            //                 $(this).fadeTo(500,0.5, function() {
            //                     $(this).css("opacity","1");
            //                     $(this).css("margin-top","0px");
            //                 });
            //             }
            //         }
            //     });
            // }).scroll();
        });
    </script>
    </body>
</html>