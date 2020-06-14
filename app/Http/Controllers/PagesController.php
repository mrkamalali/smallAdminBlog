<?php

namespace App\Http\Controllers;
use App\Role;
use App\category;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PagesController extends Controller
{
//    this function to make visitors sing in first..
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
// end of function


    public function posts()

    {
        $posts = Post::with('user')->get();
//dd($posts);
        return view('content.posts', compact('posts'));
    }





    public function post(Post $post)

    {
//        $post = Post::find($post);

        return view('content.post', compact('post'));
    }






    public function store(Request $request)
    {
        // validation
        $this->validate(request(),
            [
                'title' => 'required',
                'body' => 'required',

                'image' => 'image|mimes:jpg,jpeg,gif,png|max:2048',
            ]);

//        end validation

        $post = new Post;


        $post->title = request('title');
        $post->body = request('body');
        $post->user_id = request('user_id');

        $post->category_id = request('category_id');
        if($request->image)
        {

            $img_name = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('upload'), $img_name);

        $post->image = $img_name;
        }


        $post->save();



        return redirect('/posts');



//  other ways to insert data at databases

//             Post::Create(request()->all());
//
//
//            Post::create
//               ([
//                     'title' => request('title');
//                      'body' => request('body')
//               ]);

// end other ways to insert data at database

}
    public function category($name)
    {
        $cats = User::all();

        $cat =DB::table('categories')->where('name', $name)->value('id');

        $posts = DB::table('posts')->where('category_id' , $cat)->get();

        return view('content.category',compact('posts'),compact('cats'));

    }

    public function addpost()

    {

        $cats = category::all();

        return view('content.addpost',compact('cats'));
    }



    public function admin()
    {
        $users = User::all();

        return view('content.admin',compact('users'));
    }





    public function addRole(request $request)
    {
        $user = User::where('email',$request['email'])->first();
        $user->roles()->detach();

        if ($request['role_user'])
        {
            $user->roles()->attach(Role::where('name','User')->first());
        }
        if ($request['role_editor'])
        {
            $user->roles()->attach(Role::where('name','Editor')->first());
        }
        if ($request['role_admin'])
        {
            $user->roles()->attach(Role::where('name','Admin')->first());
        }

        return  back();

    }


    public function editor()
    {

        return view('content.editor');
    }


    public function statistics()
    {
        $users = DB::table('users')->count();
        $posts = DB::table('posts')->count();
        $comments = DB::table('comments')->count();

        $most_comments = User::withCount('comments')
            ->orderBy('comments_count','desc')
            ->first();
        $commentname =  $most_comments->name;
        $commentcount = $most_comments->comments_count;

        return view('/content.statistics',compact('users','posts','comments','commentname','commentcount'));
    }


    public function about()
    {
        return view('/about');
    }
//
//    public function edit($id)
//    {
//
//        $cats = category::all();
//        return view('/content/update',compact('cats'));
//
//    }


    public function edit($id)
    {
        $post = Post::find($id);
        $cats = category::all();
        return view('/content/update',compact('cats','post'));

    }




    public function update(Request $request,$id)
    {
//        dd($request->toArray());
        // validation
        $this->validate(request(),
            [
                'title' => 'required',
                'body' => 'required',

                'image' => 'image|mimes:jpg,jpeg,gif,png|max:2048',
            ]);

//        end validation

        $post = Post::find($id);


        $post->title = request('title');
        $post->body = request('body');
        $post->user_id = request('user_id');

        $post->category_id = request('category_id');
        if ($request->image)
        {
            $img_name = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('upload'), $img_name);
            $post->image = $img_name;
        }


        $post->update();


        return redirect('/posts');


    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
        return Redirect('/posts');
    }










}

