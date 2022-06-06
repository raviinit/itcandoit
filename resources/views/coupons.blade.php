<!DOCTYPE html>
<html lang="en">
<head>
    @include("include.meta")
    @include("include.css")
</head>
<body>
    @include('include.header')
    <br>
    <div class="container">

    @if (Auth::check())
        <div class="title m-b-md">
            Coupons Upload
        </div>
        
        <form action='/fileuploadcoupons' method="post" enctype="multipart/form-data">
        <table style="border: 0 px;">
            <tr>
            <td>File Upload: <input type="file" name="file" class=''  ></td>
            <td><button type="submit">Upload </button></td>
            </tr>
        </table>
        </form>
        <br/><br/>
        @endif

        @if ($csvData)
        <table>
            <tr>
            <th>ID</th>
            <th>App Name</th>
            <th>Client Name</th>
            <th>Title En</th>
            <th>Title Ar</th>
            <th>Code</th>
            <th>Status</th>
            <th>Coupon Type</th>
            <th>Disc %</th>
            <th>Category</th>
            <th>Tag</th>
            </tr>
        @foreach($csvData as $k => $v)
                <tr>
                    <th>{{$v['id']}}</th>
                    <th>{{$v['appname']}}</th>
                    <th>{{$v['clientname']}}</th>
                    <th>{{$v['titleen']}}</th>
                    <th>{{$v['titlear']}}</th>
                    <th>{{$v['code']}}</th>
                    <th>{{$v['status']}}</th>
                    <th>{{$v['coupontype']}}</th>
                    <th>{{$v['disc_percentage']}}</th>
                    <th>{{$v['category']}}</th>
                    <th>{{$v['tag']}}</th>
                </tr>
        @endforeach
        </table>
        <br/><br/>
        @endif
    
    </div>
    @include('include.footer')
</body>
</html>
@include("include.js")
