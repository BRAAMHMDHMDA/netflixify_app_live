@extends('website.layout.master')

@section('content')
    <section class="listing py-5 mt-4">
        <div class="container">
            <div class="row my-5">
                <div class="col-12 d-flex justify-content-between">
                    <h1 class="listing__title text-white fw-300">Favorite Movies</h1>
                </div>
            </div><!-- end of row -->

            <div class="movies row">
                @empty(count($fav_movies))
                    <div class="w-100" >
                        <div class="alert alert-warning py-4">
                            <span class="mr-3">No Favorite Movies Yet..</span>
                            <a href="{{route('home')}}"s>
                                <button class="btn btn-sm bg-dark text-white">Go To Home</button>
                            </a>
                        </div>
                    </div>
                @else
                    @foreach($fav_movies as $k => $movie)
                        <div class="movie col-3 mb-4" id="movie-{{$movie->id}}">
                            <img src="{{$movie->image_url}}" class="img-fluid" alt="">

                            <div class="movie__details text-white">

                                <div class="d-flex justify-content-between">
                                    <p class="mb-0 movie__name">{{$movie->name}}</p>
                                    <p class="mb-0 movie__year align-self-center">{{$movie->year}}</p>
                                </div>

                                <div class="d-flex movie__rating">
                                    <div class="mr-2">
                                        @for ($i = 0; $i < $movie->rating; $i++)
                                            <span class="fas fa-star text-primary mr-1"></span>
                                        @endfor
                                    </div>
                                    <span>{{$movie->rating}}</span>
                                </div>

                                <div class="movie___views">
                                    <p>Views: {{$movie->views}}</p>
                                </div>

                                <div class="d-flex movie__cta justify-content-center align-items-center">
                                    <a href="{{route('movies.show',$movie->slug)}}" class="btn btn-primary text-capitalize flex-fill mr-2">
                                        <i class="fas fa-play"></i>
                                        watch now
                                    </a>
                                    @auth('web')
                                        <livewire:website.favorite-icon :movie="$movie" wire:key="{{$k}}" />
                                    @else
                                        <a href="{{route('login')}}" class="align-self-center text-white">
                                            <i class="far fa-heart fa-1x align-self-center movie__fav-button"></i>
                                        </a>
                                    @endauth
                                </div>

                            </div><!-- end of movie details -->

                        </div><!-- end of col -->
                    @endforeach
                @endempty
            </div><!-- end of row -->
        </div><!-- end of container -->
    </section><!-- end of listing section -->
@endsection
@push('scripts')
    <script>
        // Update the favorite count display in the navbar
        window.addEventListener('favoriteCountUpdated', event => {
            let movieID = event.detail[0].movie_id;
            $(`#movie-${movieID}`).remove();

        });
    </script>
@endpush
