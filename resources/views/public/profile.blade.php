@extends('public.layout.layout')

@section('content')

{{--    <div id="class" class="">--}}
{{--        <div class="content-wrap">--}}
            <div class="container mt-4">

                <div class="row">

                    <!-- Item 1 -->
                    <div class="col-4 col-sm-4 ">
                        <div class="rs-team-1 mb-5">
                            <div class="media">
                                <img src="/images/{{  $user->user_image }}" alt="user image" class="img-fluid">
                                <div class="sosmed-icon">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>

                                </div>


                            </div>
                            <div class="body">
                                <div class="title"> {{ $user->user_name}}</div>
                                @if($user->user_id == \Illuminate\Support\Facades\Auth::user()->user_id)
                                <form enctype="multipart/form-data" action="{{route('profile.update', $user->user_id)}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div class="text-primary">Update Profile image</div>
                                    <div class="form-group row p-2 d-flex m-0 col-12 justify-content-around">
                                        <div style="cursor: pointer;" class="btn btn-primary col-5">

                                            <span
                                                style="position: absolute; top:50% ; transform:translateY(-50%) ; cursor: pointer;">select file</span>
                                            <input type="file" name="user_image" class="custom-file-input">
                                        </div>

                                        <input type="submit" class="btn btn-primary col-5">
                                    </div>
                                </form>
                                @endif
                            </div>


                        </div>
                    </div>

                    <div class="col-9 col-sm-8 col-lg-8">
                    {{--                    posts --}}
                        @if(count($posts) == 0)
                            <div class="alert alert-info">
                                This user don't have any posts yet
                            </div>
                        @endif
                    @foreach($posts as $post )
                        <div class="single-news" style="padding: 0">
                            <div class="author-box" style="padding: 10px;">
                                <div class="row">
                                    <div class="col-lg-6">

                                        <p style="padding:1rem; color: black">{{ Str::limit($post->post_text, 200) }}
                                            <a
                                                href="/posts/single_page_post/{{$post->post_id}}"
                                                style="color:#F7941E"><br>
                                                Show Post</a></p>
                                        <div class="ml-auto">
                                            <div class="price" style="color: #F7941E"><b>Category: {{$post->post_type}}</b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">

                                        @if($post->post_image != null)
                                            <div class="col-12 pos-relative">

                                                <img height="80%" width="80%" src="/images/{{$post->post_image}}"
                                                     alt=""
                                                     class="img-fluid rounded">

                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                    </div>


                </div>

            </div>
{{--        </div>--}}
{{--    </div>--}}


@endsection
