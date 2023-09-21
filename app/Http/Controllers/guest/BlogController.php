<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

use function Ramsey\Uuid\v1;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $blogs = Blog::where('status','=','publish')->get();
        //$blogs = DB::table('blogs')->get();
         //dd($blogs);
        // $blogs = [
        //     [
        //          "id"=>1,
        //         "name" => 'first blog',
        //         "category" =>' blog category'

        //     ],
        //     [
        //         "id"=>2,
        //         "name" => 'second blog',
        //         "category" =>' blog category'

        //     ],
        //     [
        //         "id"=>3,
        //         "name" => 'third blog',
        //         "category" =>' blog category'

        //     ],
        //     [
        //         "id"=>4,
        //         "name" => 'fourth blog',
        //         "category" =>' blog category'

        //     ],
        // ];

      return view('guest.pages.blogs' , compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)  // binding
    {

        //$blog = Blog::where('id','=',$id)->firstOrFail();
       // $blog = Blog::find($id);
       // $blog = Blog::findOrFail($id);
        // return view('guest.pages.show-blog',compact('blog'));
        return view('guest.pages.show-blog',['blog'=>$blog]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $categories = Category::all();
        return view('guest.pages.update-blog',[
            'blog' => $blog,
            'categories'=>$categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $data = $request->validate([
            'title' => ['required','string'],
            'description' => ['required','string'],
            //'image' => ['nullable','image'],
            'date_to_publish' => ['required'],
            'status' => ['required',Rule::in('publish','unpublish')],
            //'category_id' => ['required'],
         ]);
        //  dd($request->all());
         $blog->update($data);
         return redirect('/blog/'.$blog['id']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect('/blog/');
    }
}
