@extends('app')

@section('content')

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v11.0" nonce="Q4QGJhO0"></script>

<div class="container">
    <!-- Grid to Order the Layout -->
    <div class="row mb-5">
        <!-- Post, will use PHP to automate from Database -->
        <div class="col-sm-8 col">
            <div class="card-deck">
                <!-- Header of Post -->
                <div class="row">
                    <div class="col text-post">
                        <p class="text text-post mb-3">Recent Post</p>
                    </div>
                    @if (Auth::check() && Auth::user()->role == 'admin')
                    <div class="col col-button">
                        <button type="button" class="btn btn-addpost mb-3 no-change" id="addpost">+</button>
                    </div>
                    @endif
                </div>
                <!-- Add Post Area -->
                @if($errors->any())
                <div id="postform" class="show">
                @else
                <div id="postform" class="">
                @endif
                    <div class="title-container p-3">
                            <p class="text">Add a New Post</p>
                    </div>
                    <!-- Form -->
                    <div class="card p-3 mb-3">
                        <form class="form-signin" method="POST" action="{{ route('insert') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    <label class="font-weight-lighter p-2 ">Name</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" name="name" value="{{old('name')}}" class="mb-2 form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" class="form-control" placeholder="Name of the Post" required autofocus>
                                    @error('name')
                                    <div class="text-danger">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    <label class="font-weight-lighter p-2">Content</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" name="content" value="{{old('content')}}" class="form-control {{ $errors->has('content') ? 'is-invalid' : ''}}" class="form-control" placeholder="Content of the Post">
                                    @error('content')
                                    <div class="text-danger">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    <label class="font-weight-lighter p-2">Link</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" name="link" value="{{old('link')}}" class="form-control {{ $errors->has('link') ? 'is-invalid' : ''}}" class="form-control" placeholder="Link to Refer">
                                    @error('link')
                                    <div class="text-danger">
                                        <strong>
                                            {{$message}}
                                        </strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    <label class="font-weight-lighter p-2">File Upload</label>
                                </div>
                                <div class="col-sm-10">
                                    <div class="custom-file overflow-hidden">
                                        <input type="file" class="{{ $errors->has('upload') ? 'is-invalid' : ''}}" id="upload" name="filename">
                                        <label class="custom-file-label text-muted p-2" id="uploadLabel" for="upload">Upload a file (.jpeg, .png, .pdf)</label>
                                    </div>
                                    @error('upload')
                                        <p class="text-danger text-danger-label">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col col-button">
                                <button class="btn btn-addpost no-change" type="submit">Add Post</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Post -->
                @foreach($Posts as $Post)
                <div class="title-container p-3">
                    <p class="text">{{$Post->name}}</p>
                </div>
                <div class="card post p-4">
                    <!-- There is no file -->
                    @if($Post->filename == NULL)
                        {{$Post->content}}
                        <!-- There is a link -->
                        @if($Post->link != NULL)
                            <a download class="post-link"href="{{$Post->link}}"> {{$Post->link}}</a>
                        @endif
                    @else
                    <!-- There is a file -->
                        @if(str_ends_with(strtolower($Post->filename), '.pdf'))
                            <a class="post-link" href="{{ asset('storage/file/'.$Post->filename) }}"> Download File</a>
                        @else
                            @if($Post->link == NULL)
                                <img src="{{ asset('storage/file/'.$Post->filename) }}">
                            @else
                                <a class="img-container" href="{{$Post->link}}">
                                        <img src="{{ asset('storage/file/'.$Post->filename) }}" class="post-img">
                                </a>
                            @endif
                        @endif
                    @endif
                </div>
                @endforeach
            </div>
        </div>
        <!-- Login/Register Buttons, Social Medias (Should be constant) -->
        <div class="col-sm-4 col">
            <div class="card-deck">
                <!-- Search Box and Button -->
                <form class="form-inline mb-4 input-group">
                    <input type="text" class="form-control search-box no-change" id="search" name="search" placeholder="Search">
                    <button class="btn btn-addpost" id="search">Go</button>
                </form>
                <p class="text mb-4">Social Media</p>
                <div class="card">
                    <a class="twitter-timeline" data-width="300" data-height="400" href="https://twitter.com/rsmakhija?ref_src=twsrc%5Etfw">Tweets by rsmakhija</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
                <div class="card">
                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fincredibleindiaedufair%2F&tabs=timeline&width=300&height=400&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="300" height="400" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                </div>
                <div class="card">
                    <iframe width="300" height="400" src="https://www.youtube.com/embed/+lastest?list=PL3iYMcxA5WEpiHqt2S2Imap4rB-cVLzXf" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<script src="{{ asset('assets/js/animate_form.js') }}"></script>

@endsection

