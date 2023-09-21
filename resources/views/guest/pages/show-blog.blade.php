  <x-guest-layout>
    <x-slot name='title'>
       blog
    </x-slot>
<!-- Portfolio item 6 modal popup-->
<div class="portfolio-modal" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="d-flex justify-content-end">
                <!-- Update Button -->
                <a href="{{ route('blog.edit',$blog['id']) }}" class="btn btn-primary m-2">
                    Update
                </a>
                <!-- Delete Button -->
                <form action="{{ route('blog.destroy', $blog->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger m-2 me-5">Delete</button>
                </form>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project details-->
                            <h2 class="text-uppercase">{{$blog['id'].'-'.$blog['title']}}</h2>
                            {{-- <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p> --}}
                            <img class="img-fluid d-block mx-auto" src="{{$blog['image']}}"
                                 alt="..." />
                            <p>{{$blog['description']}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-guest-layout>
