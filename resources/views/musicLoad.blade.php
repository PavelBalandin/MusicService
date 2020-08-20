@extends('layouts.mainapp')

@section('title')Music Load @endsection

@section('content')
    <div class="upload-container">
       <div class="upload">
           <div>
               <p>You can load your music on this page</p>
           </div>
           <div>
               <form action="{{ route('music.upload') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input id="file" type="file" name="music">
                   <label for="file">
                       Choose a Music
                   </label>
                    <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Upload</button>
               </form>
           </div>
           <div>
           @isset($massage)
                <p class="massage">{{$massage}}</p>
           @endisset
           </div>
       </div>
    </div>
@endsection
