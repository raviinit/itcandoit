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
                Users Upload
            </div>

            <form action='/fileuploadusers' method="post" enctype="multipart/form-data">
            <table style="border: 0 px;">
                <tr>
                <td>File Upload: <input type="file" name="file" class=''  ></td>
                <td><button type="submit">Upload </button></td>
                </tr>
            </table>
            </form>
            <br/><br/>

            @if ($data)
                <table>
                    <tr>
                    <th>ID</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Date created</th>
                    <th>Date updated</th>
                    </tr>
                @foreach($data as $k => $v)
                        <tr>
                            <th>{{$v['id']}}</th>
                            <th>{{$v['firstname']}}</th>
                            <th>{{$v['lastname']}}</th>
                            <th>{{$v['email']}}</th>
                            <th>{{$v['address']}}</th>
                            <th>{{$v['created_at']}}</th>
                            <th>{{$v['updated_at']}}</th>
                        </tr>
                @endforeach
                </table>
                <br/><br/>
            @endif

        @endif

        @if ($csvData)
        <table>
            <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Address</th>
            <th>Date created</th>
            <th>Date updated</th>
            </tr>
        @foreach($csvData as $k => $v)
                <tr>
                    <th>{{$v['id']}}</th>
                    <th>{{$v['userid']}}</th>
                    <th>{{$v['firstname']}}</th>
                    <th>{{$v['lastname']}}</th>
                    <th>{{$v['address']}}</th>
                    <th>{{$v['created_at']}}</th>
                    <th>{{$v['updated_at']}}</th>
                </tr>
        @endforeach
        </table>
        @endif

    </div>
    @include('include.footer')
</body>
</html>
@include("include.js")
