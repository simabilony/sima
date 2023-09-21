<x-guest-layout>

    <x-slot name='title'>
        About
    </x-slot>



    <div class="page-section container mt-5">
        {{-- <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data"> --}}
        <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
         @csrf
         @method('PUT')
            <div class="form-group m-4">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{$blog->title}}">
            </div>

            <div class="form-group m-4">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" >{{$blog->description}}</textarea>
            </div>

            {{-- <div class="form-group m-4">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div> --}}

            <div class="form-group m-4">
                <label for="date_to_publish">Date to Publish</label>
                <input value="{{$blog->date_to_publish}}" name="date_to_publish" id="date_to_publish" class="form-control">
            </div>

            <div class="form-group m-4">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    {{-- <option {{'publish' == $blog['status'] ? 'selected': ''}} value="publish">publish</option> --}}
                    <option @selected('publish' == $blog['status']) value="publish">publish</option>
                    {{-- <option {{'unpublish' == $blog['status'] ? 'selected': ''}} value="unpublish">unpublish</option> --}}
                    <option @selected('unpublish' == $blog['status']) value="unpublish">unpublish</option>
                </select>
            </div>

            <div class="form-group m-4">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" class="form-control">
                    <option selected disabled value="">select the category</option>
                    @foreach ($categories as $category )
                    {{-- <option {{$category['id'] == $blog['category_id'] ? 'selected' : '' }} value="{{$category['id']}}">{{$category['name']}}</option> --}}
                    <option @selected($category['id'] == $blog['category_id'])>{{$category['name']}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary m-4">Update</button>
        </form>
    </div>



</x-guest-layout>
