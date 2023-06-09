<a href="" class="scrollup">
    <span><i class="fas fa-arrow-up"></i></span>
</a>
<script>
    function openNav() {
        document.getElementById("myNav").style.width = "280px";
    }

    function closeNav() {
        document.getElementById("myNav").style.width = "0";
    }
</script>
<script src="../js/jquery-latest.min.js"></script>
<script>
    $(window).scroll(function() {
        if ($(this).scrollTop() > 600) {
            $(".scrollup").fadeIn();
        } else {
            $(".scrollup").fadeOut();
        }
    })

    $(".scrollup").click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    })
</script>
<script>
    $(document).ready(function() {

        $(".fa-search").click(function() {
            $(".togglesearch").toggle();
            // $("input[type='text']").focus();
        });

    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var lazyloadImages;

        if ("IntersectionObserver" in window) {
            lazyloadImages = document.querySelectorAll(".lazy");
            var imageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        var image = entry.target;
                        image.src = image.dataset.src;
                        image.classList.remove("lazy");
                        imageObserver.unobserve(image);
                    }
                });
            });

            lazyloadImages.forEach(function(image) {
                imageObserver.observe(image);
            });
        } else {
            var lazyloadThrottleTimeout;
            lazyloadImages = document.querySelectorAll(".lazy");

            function lazyload() {
                if (lazyloadThrottleTimeout) {
                    clearTimeout(lazyloadThrottleTimeout);
                }

                lazyloadThrottleTimeout = setTimeout(function() {
                    var scrollTop = window.pageYOffset;
                    lazyloadImages.forEach(function(img) {
                        if (img.offsetTop < (window.innerHeight + scrollTop)) {
                            img.src = img.dataset.src;
                            img.classList.remove('lazy');
                        }
                    });
                    if (lazyloadImages.length == 0) {
                        document.removeEventListener("scroll", lazyload);
                        window.removeEventListener("resize", lazyload);
                        window.removeEventListener("orientationChange", lazyload);
                    }
                }, 20);
            }

            document.addEventListener("scroll", lazyload);
            window.addEventListener("resize", lazyload);
            window.addEventListener("orientationChange", lazyload);
        }
    })
</script>
<script>
    window.onscroll = function() {
        myFunction()
    };

    var navbar = document.getElementById("navbar-sticky");
    var sticky = navbar.offsetTop;

    function myFunction() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    }
</script>