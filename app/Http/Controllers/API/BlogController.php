<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $blogs = Blog::all();



        return Response::json([
            'message' => 'This is all blogs',
            'blogs'   => BlogResource::collection($blogs),
        ]);
    }


    public function indexBlogByCategory(Category $category)
    {
        $blogs = $category->blogs;

        return Response::json([
            'message' => 'This is all blogs',
            'blogs'   => BlogResource::collection($blogs),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {

        $data = $request->validated();


        $filePath =  $this->imageStore($request->image_file);


        $blog = Blog::create([
            'title' => $request->title,
            'description' => $request->description,
            'date_to_publish' => $request->date_to_publish,
            'status' => $request->status,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,

            'image' => $filePath,
        ]);


        return response()->json([
            'message' => 'blog is created success',
            'blog' => new BlogResource($blog),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {

        return response()->json([
            'message' => "this is your blog",
            'blog' => new BlogResource($blog),
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $data = $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'date' => ['required'],
            'image_file' => ['nullable', 'image'],
            'status' => ['required', Rule::in('publish', 'unpublish')],
            'category_id' => ['required'],
            'user_id' => ['required'],
        ]);

        $data =  [
            'title' => $request->title,
            'description' => $request->description,
            'date_to_publish' => $request->date,
            'status' => $request->status,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
        ];




        if ($request->hasFile('image_file')) {
            // 1
            $blog->image ? unlink(public_path($blog->image)) : null;


            $filePath =  $this->imageStore($request->image_file);

            $data = array_merge(
                $data,
                [
                    'image' => $filePath
                ]
            );
        }




        $blog->update($data);



        return response()->json([
            'message' => "this is your blog",
            'blog' => new BlogResource($blog),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        $blog->image ? unlink(public_path($blog->image)) : null;

        return Response::json([
            'message' => 'your blog is deleted success',
        ]);
    }





    protected function imageStore($image)
    {
        // 1
        $imageExt = $image->extension();
        $imageName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $fileName = $imageName . '-' . time() . '.' . $imageExt;

        // 2
        $imagePath = 'images/blog/';
        $image->move(public_path($imagePath), $fileName);


        return $imagePath . $fileName;
    }
}
