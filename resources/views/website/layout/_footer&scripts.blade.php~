<footer id="footer" class="py-3 bg-primary text-center text-white">
    <p class="mb-0 text-capitalize">&copy; all copy right reserved for Netflixify 2019</p>
    <div class="social__icons">
        <a href="{{config("facebook.link")}}" target="_blank"  class="text-white mr-2"><i class="fab fa-facebook fa-1x"></i></a>
        <a href="{{config("youtube.link")}}" target="_blank"  class="text-white mr-2"><i class="fab fa-youtube"></i></a>
        <a href="{{config("google.link")}}"  target="_blank" class="text-white mr-2"><i class="fab fa-google"></i></a>
    </div>
</footer>

<!--jquery-->
<script src="{{ asset('website_assets/js/jquery-3.4.0.min.js') }}"></script>

<!--bootstrap-->
<script src="{{ asset('website_assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('website_assets/js/popper.min.js') }}"></script>

<!--vendor js-->
<script src="{{ asset('website_assets/js/vendor.min.js') }}"></script>
<script src="{{ asset('website_assets/js/jquery.easy-autocomplete.min.js') }}"></script>

<!--main scripts-->
<script src="{{ asset('website_assets/js/main.min.js') }}"></script>
<script>
    // Update the favorite count display in the navbar
    window.addEventListener('favoriteCountUpdated', event => {
        let fav_count = event.detail[0].fav_count;

        if (fav_count >= 9){
            $("#nav__fav-count").html("9+");
        }else {
            $("#nav__fav-count").html(fav_count);
        }

    });

    let search_input = $('.form-control[type="search"]');

let options = {

    url: function (search){
        return "/movies?search="+search;
    },

    getValue: "name",

    template:{
        type: 'iconLeft',
        fields:{
            iconSrc: "image_url"
        }
    },

    list:{
        onChooseEvent: function (){
            let movie = search_input.getSelectedItemData();
            let url = window.location.origin + '/movies/' + movie.slug;

            window.location.replace(url)
        }
    }


};

search_input.easyAutocomplete(options);

</script>

@stack('scripts')
