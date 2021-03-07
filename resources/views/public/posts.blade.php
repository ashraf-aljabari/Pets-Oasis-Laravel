@extends('public.layout.layout')

@section('content')
    <!-- CONTENT -->
    <div id="class" class="">
        <div class="content-wrap">
            <div class="container">

                <div class="row">

                    <div class="col-12 col-sm-3 col-md-3col-sm-3 col-md-3">

                        <div class="widget categories">
                            <ul class="category-nav">

                                <li class="{{request()->getRequestUri() == '/posts' ? 'active': ''}}"
                                ><a href="../posts">All Posts</a></li>

                                <li class="{{request()->getRequestUri() == '/posts/question' ? 'active': ''}}"
                                ><a href="../posts/question">Question</a></li>

                                <li class="{{request()->getRequestUri() == '/posts/rescue' ? 'active': ''}}"><a
                                        href="../posts/rescue">Rescue</a></li>

                                <li class="{{request()->getRequestUri() == '/posts/adopte' ? 'active': ''}}"><a
                                        href="../posts/adopte">Adopte</a></li>
                            </ul>
                        </div>

                        {{--                        <div class="widget widget-archive">--}}
                        {{--                            <div class="widget-title">--}}
                        {{--                                Archive--}}
                        {{--                            </div>--}}
                        {{--                            <select class="form-control">--}}
                        {{--                                <option>April 2017</option>--}}
                        {{--                                <option>March 2017</option>--}}
                        {{--                                <option>February 2017</option>--}}
                        {{--                                <option>January 2017</option>--}}
                        {{--                            </select>--}}
                        {{--                        </div>--}}


                    </div>
                    <!-- end sidebar -->

                    <div class="col-12 col-sm-9 col-md-9">

                        @auth
                            @if(request()->getRequestUri() !== '/posts')
                                <div class="leave-comment-box" style="background: RGB(243, 243, 243)">
                                    @if(request()->getRequestUri() == '/posts/adopte')
                                        <h3 class="p-3" style="color: black">Post an animal for adoption</h3>
                                    @elseif(request()->getRequestUri() == '/posts/rescue')
                                        <h3 class="p-3" style="color: black">Recue an animal by posting them</h3>
                                    @else
                                        <h3 class="p-3" style="color: black">Ask professional people for help</h3>
                                    @endif
                                    <form action="{{'/'. Request::path()}}" class="form-comment" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="container p-3">
                                            <div class="col-lg-12" style="margin: 0;">
                                                <label><strong>Post : </strong></label>
                                                <textarea style="background: #fff" type="text" id="post" name="post"
                                                          class="inputtext form-control" rows="2"
                                                          placeholder="Leave Post..."></textarea>

                                            </div>


                                            <div class="col-lg-12">
                                                <label><strong>Image : </strong></label>
                                                <input type="file" name="image" class="form-control">
                                            </div>
                                            <div class="col-lg-12" style="margin: 0; padding:0">
                                                <button style="padding:0.8rem; border-radius:10px" id="post"
                                                        type="submit"
                                                        class="btn btn-primary btn-block">Post
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            @endif
                        @endauth
                        @guest
                            <div class="leave-comment-box" style="background: RGB(243, 243, 243)">
                                <div class="alert alert-info"> Please <a href="/login">log-in</a> to write a
                                    post
                                </div>
                            </div>
                        @endguest
                        @foreach($posts as $post )
                            <div class="single-news" style="padding: 0">
                                <div class="author-box" style="padding: 10px;">
                                    <div class="author-box"
                                         style="padding: 10px;display: flex;justify-items: center;align-items: center;margin-top: 0;background:none">
                                        <div class="media" style="margin-bottom: 0;width:60px">
                                            <img width="200" height="50" src="/images/{{$post->user_image}}" alt=""
                                                 class="img-fluid rounded-circle">
                                        </div>
                                        <div class="body">
                                            <h4 class="media-heading m-1"><a href="/profile/{{$post->user_id}}">{{$post->user_name}}</a></h4>
                                            <div class="meta-date m-0">May 12, 2017</div>
                                        </div>
                                        @if(request()->getRequestUri() == '/posts')
                                            <div class="ml-auto">
                                                <div class="price" style="color: #F7941E"><b>{{$post->post_type}}</b>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">

                                            <p style="padding:1rem; color: black">{{ Str::limit($post->post_text, 200) }}
                                                <a
                                                    href="/posts/single_page_post/{{$post->post_id}}"
                                                    style="color:#F7941E"><br>
                                                    Show more</a></p>
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
                            <!-- end single blog -->

                            @auth
                            <div class="leave-comment-box" style="background: RGB(243, 243, 243)">
                                <form action="/storeComment/{{$post->post_id}}/{{$post->post_type}}"
                                      class="form-comment" method="post">
                                    @csrf
                                    <div
                                        class="row d-flex justify-content-center align-items-center align-content-center mb-0"
                                        style="flex-wrap: wrap">
                                        <div class="container">

                                            <div class="row p-4">
                                                <div class="col-lg-8">
                                                    <input style="background: #fff" type="text" id="comment"
                                                           name="comment"
                                                           class="inputtext form-control" rows="2"
                                                           placeholder="Leave Comments...">
                                                </div>
                                                <div class="col-lg-3">
                                                    <button style="padding:0.8rem; border-radius:10px" id="comment"
                                                            type="submit"
                                                            class="btn btn-primary">Post Comment
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            @endauth
                            <!-- end author box -->



                            <div class="comments-box p-3 pb-0" style="background: RGB(243, 243, 243)">
                                <?php $count = 0 ?>
                                @foreach($commentCount as $comment)
                                    @if($comment->post_id === $post->post_id)
                                        <?php   $count += 1 ?>
                                    @endif
                                @endforeach


                                <h4 class="title-heading mt-0">Comments <span>({{$count++}})</span></h4>
                                @foreach($comments as $comment)
                                    @if($comment->post_id == $post->post_id)
                                        <div class="media comment"
                                             style="background: RGB(243, 243, 243);padding-bottom: 0">
                                            <img class="mr-3 rounded-circle" alt="80x80"
                                                 src="/images/{{$comment->user_image}}"
                                                 style="width: 50px; height:50px;">
                                            <div class="media-body">
                                                <h5 class="media-heading mt-0 mb-1"><a  href="/profile/{{$comment->user_id}}">{{$comment->user_name}}</a><small
                                                        class="date"></small>
                                                </h5>

                                                <div>
                                                    <p style="color:black">{{$comment->comment_text}}</p>
                                                </div>
                                            </div>
                                            @auth
                                                @if(\Illuminate\Support\Facades\Auth::user()->user_id === $comment->user_id)
                                                    <div>
                                                        <a href="/posts/{{$comment->comment_type}}/delete/{{$comment->comment_id}}"><i
                                                                style="color:red">Delete</i></a>
                                                    </div>
                                                @endif
                                            @endauth
                                        </div>
                                        @break
                                    @endif
                                @endforeach
                                <br>
                                <p><a href="/posts/single_page_post/{{$post->post_id}}" style="color:#F7941E">Show  more...</a></p>
                            </div>

                    @endforeach
                    <!-- end leave comment -->


                    </div>

                </div>

            </div>
        </div>
    </div>





@endsection




