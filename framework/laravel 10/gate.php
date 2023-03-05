<?php

use Illuminate\Support\Facades\Gate;

public function boot()
{
    $this->registerPolicies();

    Gate::define('view-dashboard', function ($user) {
        return $user->hasRole('admin');
    });
}

//////////////////////////////


//Use the gate in your controller or view:

use Illuminate\Support\Facades\Gate;

public function dashboard()
{
    if (Gate::allows('view-dashboard')) {
        return view('dashboard');
    } else {
        abort(403, 'Unauthorized');
    }
}

////////////////////////////////////

use App\Models\Post;

public function show(Post $post)
{
    $this->authorize('view', $post);

    return view('posts.show', compact('post'));
}

////////////////////////////////////

if (Gate::allows('view-post', $post)) {
    return view('posts.show', compact('post'));
} else {
    abort(403, 'Unauthorized');
}

/////////////////////////////////////



@can('view', $post)
    <a href="{{ route('posts.show', $post) }}">View post</a>
@endcan
?>