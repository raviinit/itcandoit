<!DOCTYPE html>
<html lang="en">
<head>
    @include("include.meta")
    @include("include.css")
</head>
<body>
    @include('include.header')
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
            <div class="carousel-item active">
                <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>

                <div class="container">
                <div class="carousel-caption text-start">
                    <h1>Headline</h1>
                    <p>Its a placeholder content for the first slide of the carousel.</p>
                </div>
                </div>
            </div>
            <div class="carousel-item">
                <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>

                <div class="container">
                <div class="carousel-caption">
                    <h1>Another headline</h1>
                    <p>Its a placeholder content for the second slide of the carousel.</p>
                </div>
                </div>
            </div>
            <div class="carousel-item">
                <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>

                <div class="container">
                <div class="carousel-caption text-end">
                    <h1>One more headline</h1>
                    <p>Its a placeholder content for the third slide of this carousel.</p>
                </div>
                </div>
            </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev" style="border: 0px">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next" style="border: 0px">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    <div class="container">

        @if ($csvData)

        <table>
        @foreach(array_chunk((array)$csvData, 4) as $row)
                @foreach($row as $k => $val)
                    <div class="row">
                        @for($i = 0; $i < count($val)-60; $i++) 
                            <div class="col-md-4">
                                <div class="col">
                                <div class="card shadow-sm">
                                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" 
                                        xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" 
                                        preserveAspectRatio="xMidYMid slice" focusable="false">
                                        <title>Placeholder</title>
                                        <rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">
                                            {{$val[$i]->coupontype . ' / Image'}}
                                        </text></svg>

                                    <div class="card-body">
                                    <p class="card-text">{{$val[$i]->titlear}}</p>
                                    <p class="card-text">{{$val[$i]->titleen}}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        {{$val[$i]->clientname}}
                                        <small class="text-muted">{{$val[$i]['appname']}}</small>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <br/>
                            </div>
                        @endfor
                    </div>
                @endforeach
        @endforeach
        </table>
        @endif


    </div>
    @include('include.footer')
</body>
</html>
@include("include.js")
