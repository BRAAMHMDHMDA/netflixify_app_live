<?php

namespace App\Models;

use App\Traits\HasImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\JsonResponse;
use Illuminate\Notifications\Notifiable;
use Yajra\DataTables\Facades\DataTables;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasImage;

    public static string $imageDisk = 'media';
    public static string $imageFolder = '/users';

    protected $fillable = [
        'name',
        'username',
        'email',
        'phone_number',
        'image_path',
        'password',
        'provider',
        'provider_id',
        'provider_token',
    ];
    protected $withCount = 'fav_movies';
    protected $hidden = [
        'password',
        'remember_token',
        'provider_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
//        'provider_token' => 'string',
    ];

    public function setProviderTokenAttribute($value): void
    {
        $this->attributes['provider_token'] = encrypt($value);
    }

    public function getProviderTokenAttribute($value)
    {
        return decrypt($value);
    }

    public function fav_movies(): BelongsToMany
    {
        return $this->belongsToMany(Movie::class, 'wishlists');
    }

    public static function Datatable($query=null): JsonResponse
    {
        if ($query== null){
            $query = User::query();
        }
        return  Datatables::of($query)
            ->addIndexColumn()
            ->editColumn('name', function (User $user) {
                return view('dashboard.users.DT._name-col', compact('user'));
            })
            ->editColumn('status', function (User $user) {
                if ($user->status == 'active'){
                    return sprintf('<div class="badge badge-success fw-bold">%s</div>',  ucwords($user->status) );
                }else return sprintf('<div class="badge badge-secondary fw-bold">%s</div>', ucwords($user->status) );
            })
            ->editColumn('created_at', function (User $user) {
                return $user->created_at->format('d M Y, h:i a');
            })
            ->addColumn('actions',  function (User $user) {
                return view('dashboard.users.DT._actions-col', ['user' => $user])->render();
            })
            ->rawColumns(['actions','name', 'status'])
            ->make(true);
    }


}
