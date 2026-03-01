<?php

namespace App\Livewire\Dashboard\Movies;

use App\Jobs\StreamMovie;
use App\Models\Category;
use App\Models\Movie;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateMovieForm extends Component
{
    use WithFileUploads;

    public $video, $name, $year, $rating, $poster, $image, $description, $category_id;
    public $categories;

    public function rules()
    {
//        return [
//            'video' => 'required|file|mimes:mp4',
//            'name' => 'required|min:2|unique:movies',
//            'year' => 'required|integer',
//            'rating' => 'required|min:0|max:5|numeric',
//            'poster' => 'required|image',
//            'image' => 'required|image',
//            'description' => 'nullable|min:3',
//            'category_id' => 'nullable|in:categories'
//
//        ];
        return [
            'video' => 'required|file|mimes:mp4,webm',  // Ensure the uploaded file is a valid MP4 video
            'name' => 'required|min:2|unique:movies,name',  // Validate the name is unique in the movies table
            'year' => 'required|integer',  // Ensure the year is an integer
            'rating' => 'required|numeric|between:0,5',  // Validate rating is a number between 0 and 5
            'poster' => 'required|image',  // Ensure the poster is a valid image
            'image' => 'required|image',  // Ensure the image is a valid image
            'description' => 'nullable|min:3',  // Description is optional but must be at least 3 characters if provided
            'category_id' => 'nullable|exists:categories,id',  // Validate that the category_id exists in the categories table
        ];

    }

    public function mount()
    {
        $this->categories = Category::active()->get(['id','name']);
    }

    public function submit()
    {
        $data = $this->validate();
        $data['path'] = $this->video->store('movies/videos', 'media');
        $data = Movie::storeImage($data);
        $data = Movie::storeImage($data, 'poster', 'poster_path');
        $movie  = Movie::create($data);

        StreamMovie::dispatch($movie);

        session()->flash('message', 'Video uploaded successfully!');

        return to_route('dashboard.movies.index');
    }

    public function render()
    {
        return view('dashboard.movies.components.create-movie-form');
    }
}
