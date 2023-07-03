@extends("master.front.master")

@section("body")

<section class="page-title overlay" style="background-image: url({{asset("/")}}website/images/background/page-title.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="text-white font-weight-bold">Blog Single</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{route("home")}}">Home</a>
                    </li>
                    <li>Blog Single</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- blog single -->
<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 py-100">
        <div class="border rounded bg-white">
          <img class="img-fluid w-100 rounded-top" src="{{asset($blog->image)}}" alt="blog-image">
          <div class="p-4">
            <h3>{{$blog->main_title}}</h3>
            <ul class="list-inline d-block pb-4 border-bottom mb-3">
              <li class="list-inline-item text-color">Posted By Admin</li>
              <li class="list-inline-item text-color">On 25 November</li>
              <li class="list-inline-item text-color">Tag: Advice, Fitness</li>
            </ul>
            
            <div class="bg-gray p-5 rounded mb-60">
              {!! $blog->long_description !!}
            </div>
          </div>
        </div>
        <div class="py-4 border-bottom mb-100">
          <div class="row">
            <div class="col-lg-5 mb-4 mb-lg-0">
              <!-- share-icon -->
              <div class="d-flex">
                <span class="font-weight-light mt-2 mr-3">Share:</span>
                <ul class="list-inline d-inline-block">
                  <li class="list-inline-item">
                    <a class="share-icon bg-facebook" href="#">
                      <i class="ti-facebook"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a class="share-icon bg-twitter" href="#">
                      <i class="ti-twitter-alt"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a class="share-icon bg-linkedin" href="#">
                      <i class="ti-linkedin"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a class="share-icon bg-google" href="#">
                      <i class="ti-google"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            
          </div>
        </div>
        <!-- comments -->
        <div>
          <h4 class="mb-20">Comments (6)</h4>
          
          <!-- comment item -->
        
          <div class="d-flex mb-4">
            <div class="mr-3">
              <img class="img-fluid rounded w-100" src="{{asset("/")}}website/images/blog/comment-1.jpg" alt="user-image">
            </div>
            <div class="border rounded py-3 px-4">
              <div class="border-bottom mb-10">
                <h5>Johnathan</h5>
                <h6 class="font-weight-light">Few Hours Ago</h6>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Unde, fugit.</p>
              </div>
              <div class="d-flex justify-content-between">
                <div>
                  <a class="d-inline-block text-dark mr-2" href="#">
                    <i class="mr-1 ti-thumb-up"></i>62</a>
                  <a class="d-inline-block text-dark mr-2" href="#">Reply</a>
                  </div>
              </div>
            </div>
          </div>
          
          
          <div class="mb-50 ml-65">
            <a class="text-color text-underline" href="#">View All Comments</a>
          </div>
          <!-- comment form -->
          <div>
            @if(Session::get('user_id'))
           <h4>Add your comment:</h4> 
            <form action="{{route("comment", ['id' => $blog->id])}}" class="row" method="POST">
              @csrf
              <div class="col-12">
                
                <textarea name="text"  class="form-control mb-30 p-2" placeholder="Your comment here"
                  style="height: 180px;"></textarea>
              </div>
              <div class="col-12">
                <button class="btn btn-sm btn-primary" type="submit" value="send">Submit</button>
              </div>
            </form>
            @else
            <h4>For Comment Please <a href="{{route('user-login', ['id' => $blog->id])}}"> Login </a></h4>
            @endif
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <!-- Sidebar -->
        <div class="bg-white px-4 py-100 sidebar-box-shadow">
          <!-- Search Widget -->
          <div class="mb-50">
            <h4 class="mb-3">Search Here</h4>
            <div class="search-wrapper">
              <input type="text" class="form-control" name="search" placeholder="Type Here...">
            </div>
          </div>
          <!-- categories -->
          <div class="mb-50">
            <h4 class="mb-3">Categories</h4>
            <ul class="pl-0 mb-0">
              @foreach ($categories as $category)
               
              <li class="border-bottom">
                <a href="{{route('blog-category', ['id' => $category->id])}}" class="d-block text-color py-10">
                  {{$category->name}}
                </a>
              </li>
               
              @endforeach
            </ul>
          </div>
          <!-- Widget Recent Post -->
          <div class="mb-50">
           
            
            <div class="newsletter">
              <h4 class="mb-3">Stay Updated</h4>
              <form action="#">
                <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                <button type="submit" class="btn btn-primary btn-sm">Subscribe</button>
              </form>
            </div>
            
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /blog-single -->

@endsection