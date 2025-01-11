@extends('website.layout.master')

@section('banner')

    <div class="movie" style="padding-top: 200px; padding-bottom: 100px">
        <div class="movie__bg" style="background: linear-gradient(rgba(0,0,0, 0.6), rgba(0,0,0, 0.6)),
         url('{{$movie->poster_url}}') center/cover no-repeat;">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div id="play"></div>
                </div><!-- end of col -->
                <div class="col-md-4 text-white">
                    <h3 class="movie__name fw-300">{{$movie->name}}</h3>

                    <div class="d-flex movie__rating my-1">
                        <div class="d-flex align-items-center mr-2">
                            @for ($i = 0; $i < $movie->rating; $i++)
                                <span class="fas fa-star text-primary mr-2"></span>
                            @endfor
                        </div>
                        <span class="align-self-center">{{$movie->rating}}</span>
                    </div>
                    <div class="d-flex movie__rating my-2">
                        <div class="d-flex align-items-center mr-2">
                           Views:
                        </div>
                        <span class="align-self-center" id="movie__views">{{$movie->views}}</span>
                    </div>
                    <p class="movie__description my-3">{{$movie->description}}</p>
                    @auth('web')
                        <livewire:website.favorite-icon :movie="$movie" />
                    @else
                        <a href="{{route('login')}}" class="btn btn-outline-light text-capitalize">
                            <span class="fas fa-heart"></span>
                            add to favorite
                        </a>
                    @endauth
                </div><!-- end of col -->
            </div><!-- end of row -->
        </div><!-- end of container -->
    </div><!-- end of movie -->
@endsection

@section('content')
    <section class="listing py-2">

        <div class="container">

            <div class="row my-4">
                <div class="col-12 d-flex justify-content-between">
                    <h3 class="listing__title text-white fw-300">{{$movie->category->name}}</h3>
                    <a href="{{route('category',$movie->category->slug)}} " class="align-self-center text-capitalize text-primary">see all</a>
                </div>
            </div><!-- end of row -->

            <div class="movies owl-carousel owl-theme">

                @foreach($related_movies as $k => $related_movie)
                    <div class="movie p-0">
                        <img src="{{$related_movie->image_url}}" class="img-fluid" alt="">

                        <div class="movie__details text-white">

                            <div class="d-flex justify-content-between">
                                <p class="mb-0 movie__name">{{$related_movie->name}}</p>
                                <p class="mb-0 movie__year align-self-center">{{$related_movie->year}}</p>
                            </div>

                            <div class="d-flex movie__rating">
                                <div class="mr-2">
                                    @for ($i = 0; $i < $related_movie->rating; $i++)
                                        <span class="fas fa-star text-primary mr-2"></span>
                                    @endfor
                                </div>
                                <span>{{$related_movie->rating}}</span>
                            </div>

                            <div class="movie___views">
                                <p>Views: {{$related_movie->views}}</p>
                            </div>

                            <div class="d-flex movie__cta justify-content-center align-items-center">
                                <a href="{{route('movies.show',$related_movie->slug)}}" class="btn btn-primary text-capitalize flex-fill mr-2"><i class="fas fa-play"></i> watch now</a>
                                @auth('web')
                                    <livewire:website.favorite-icon :movie="$related_movie" wire:key="{{$k}}"/>
                                @else
                                    <a href="{{route('login')}}" class="align-self-center text-white">
                                        <i class="far fa-heart fa-1x align-self-center movie__fav-button"></i>
                                    </a>
                                @endauth
                            </div>

                        </div><!-- end of movie details -->

                    </div><!-- end of movie -->
                @endforeach

            </div><!-- end of row -->

        </div><!-- end of container -->

    </section><!-- end of listing section -->

@endsection

@push('scripts')
    <script src="{{asset('website_assets/js/playerjs.js')}}" type="text/javascript"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var file =
            "[Auto]{{ Storage::disk('media')->url('movies/'.$movie->name.'/'.$movie->name. '.m3u8') }}," +
            "[360]{{ Storage::disk('media')->url('movies/'.$movie->name.'/'.$movie->name. '_0_250.m3u8') }}," +
            "[480]{{ Storage::disk('media')->url('movies/'.$movie->name.'/'.$movie->name. '_1_500.m3u8') }}," +
            "[720]{{ Storage::disk('media')->url('movies/'.$movie->name.'/'.$movie->name. '_2_1000.m3u8') }}";

        var player = new Playerjs({
            id: "play",
            file: file,
            poster: "{{ $movie->poster_url }}",
            default_quality: "Auto",
        });

        let viewsCounted = false;

        function PlayerjsEvents(event, id, data) {
            if (event == "duration") {
                duration = data;
            }

            if (event == "time") {
                time = data;
            }

            let percent = (time / duration) * 100;

            if (percent > 10 && !viewsCounted) {

                $.ajax({
                    url: "{{ route('movies.increment-views', $movie->id) }}",
                    method: 'POST',
                    success: function () {

                        let views = parseInt($('#movie__views').html());
                        $('#movie__views').html(views + 1);

                    },

                });//end of ajax call

                viewsCounted = true;

            } //end of if

        }//end of player event function

    </script>
    <script>
        $(document).ready(function () {
            $(".listing .movies").owlCarousel({
                loop: false,
                nav: false,
                stagePadding: 50,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    900: {
                        items: 3
                    },
                    1000: {
                        items: 4
                    }
                },
                dots: false,
                margin: 15,
            });
        });
    </script>

@endpush
