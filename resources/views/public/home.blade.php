@extends('public.layout.layout')
@section('content')
    <style>
        .hover {
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            background-blend-mode: multiply,luminosity;
            background-repeat: no-repeat;
        }
        .textCat {
            color: white;
            text-shadow: 3px 3px 10px #333;
        }
        .textCat:hover {

            transition: all 0.8s ease;
        }
        .hover:hover{
            visibility: visible;
            box-shadow: 3px 3px 20px #adb5bd;
            background: #F7941E;
            transition: all 0.8s ease;
            opacity: 0.8;

        }
    </style>
{{--    <div class="container-fluid" style="overflow: hidden">--}}
{{--        <div--}}
{{--            style="height: 76.5vh; background-image: url('https://wallpapercave.com/wp/wp2122158.jpg'); background-repeat: no-repeat  ;"--}}
{{--            class="row">--}}
            {{--            <div style="display: flex; justify-content: center; align-items: center">--}}
            {{--                <div style="position:relative;">--}}
            {{--                    <a href="#"><img height="200vh" width="200vw"--}}
            {{--                                     src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQDE61PJDI4_ryOLZJw7CnLFmGCwrkdDkgYsg&usqp=CAU"--}}
            {{--                                     class="rounded-circle" alt="..."></a>--}}
            {{--                </div>--}}
            {{--                <div style="position:absolute;">--}}
            {{--                    <h4><a href="#">What we provide</a></h4>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            <div style="display: flex; justify-content: center; align-items: center"--}}
            {{--                 onMouseOver="this.style.background-color='orange'" onMouseOut="this.style.background-color='grey'">--}}
            {{--                <div style="position:relative;">--}}
            {{--                    <a href="#"><img height="200" width="200"--}}
            {{--                                     src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQDE61PJDI4_ryOLZJw7CnLFmGCwrkdDkgYsg&usqp=CAU"--}}
            {{--                                     class="rounded-circle" alt="..."></a>--}}
            {{--                </div>--}}
            {{--                <div style="position:absolute;">--}}
            {{--                    <h4><a href="#">What we provide</a></h4>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            <div style="display: flex; justify-content: center; align-items: center;"--}}
            {{--                 onMouseOver="this.style.background-color='orange'" onMouseOut="this.style.background-color='grey'">--}}
            {{--                <div style="position:relative;">--}}
            {{--                    <a href="#"><img height="200" width="200"--}}
            {{--                                     src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQDE61PJDI4_ryOLZJw7CnLFmGCwrkdDkgYsg&usqp=CAU"--}}
            {{--                                     class="rounded-circle" alt="..."></a>--}}
            {{--                </div>--}}
            {{--                <div style="position:absolute;">--}}
            {{--                    <h4><a href="#">What we provide</a></h4>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            <div style="display: flex; justify-content: center; align-items: center"--}}
            {{--                 onMouseOver="this.style.background-color='orange'" onMouseOut="this.style.background-color='grey'">--}}
            {{--                <div style="position:relative;">--}}
            {{--                    <a href="#"><img height="200" width="200"--}}
            {{--                                     src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQDE61PJDI4_ryOLZJw7CnLFmGCwrkdDkgYsg&usqp=CAU"--}}
            {{--                                     class="rounded-circle" alt="..."></a>--}}
            {{--                </div>--}}
            {{--                <div style="position:absolute;">--}}
            {{--                    <h4><a href="#">What we provide</a></h4>--}}
            {{--                </div>--}}
            {{--            </div>--}}


{{--        </div>--}}
{{--    </div>--}}
{{--    <div style="height: 76.5vh" class="container-fluid">--}}
{{--        <div class="row justify-content-center align-items-center">--}}


{{--            <div class="col-6" style="display: flex; justify-content: center; align-items: center; padding: 10%">--}}
{{--                <a class="btn btn-primary rounded-circle" style="color: white; width: 50%; height: 50%; border-radius: 50%;  font-size: 2rem; font-weight: bold">Questions</a>--}}
{{--            </div>--}}
{{--            <div class="col-6" style="display: flex; justify-content: center; align-items: center">--}}
{{--                <a class="btn btn-primary rounded-circle" style="color: white; padding: 12%; font-size: 2rem; font-weight: bold">Shop</a>--}}
{{--            </div>--}}



{{--            <div class="col-6" style="display: flex; justify-content: center; align-items: center">--}}
{{--                <a class="btn btn-primary rounded-circle" style="color: white; padding: 12%; font-size: 2rem; font-weight: bold">Rescue</a>--}}
{{--            </div>--}}
{{--            <div class="col-6" style="display: flex; justify-content: center; align-items: center">--}}
{{--                <a class="btn btn-primary rounded-circle" style="color: white; padding: 12%; font-size: 2rem; font-weight: bold">Adoption</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
<div class="container-fluid">
    <div class="row" style="height: 70vh">
        <div class="col-3 hover" style="background-image: url('https://res.cloudinary.com/dr5is8jar/image/upload/v1614470423/dog-listening_1_ivzhtx.jpg')"><a href="/posts/question"><h2 class="textCat">Question</h2></a></div>
        <div class="col-3 hover" style="background-image: url('https://res.cloudinary.com/dr5is8jar/image/upload/v1614470575/800px_COLOURBOX8236970_1_xuros3.jpg')"><a href="/shop"><h2 class="textCat">Shop</h2></a></div>
        <div class="col-3 hover" style="background-image: url('https://padsdogrescue.com/wp-content/uploads/2017/09/Golden-Retreiver-dog-on-a-white-background-520x800.png')"><a href="/posts/rescue"><h2 class="textCat">Rescue</h2></a></div>
        <div class="col-3 hover" style="background-image: url('https://images.fineartamerica.com/images/artworkimages/mediumlarge/2/dog-waiting-to-walking-vincent-monozlay.jpg')"><a href="/posts/adopte"><h2 class="textCat">Adoption</h2></a></div>
    </div>
</div>
@endsection
