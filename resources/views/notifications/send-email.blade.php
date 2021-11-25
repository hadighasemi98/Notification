@extends('layouts.layout')

@section('title' , 'Send Email')


@section('content')
<div class="row justify-content-md-center">
    <div class="col-md-8">
        <div class="card">
        @include('messages.show-messages')
            <div class="card-header">
                @lang('notification.send_email')
            </div>
            <form action="{{route('notification.send.email')}}" method="POST" >
                @csrf
                    <div class="form-group ">
                        <label for="user">@lang('notification.users')</label>
                        <select name="user"  class="form-control" id="user">
                            @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email_type">@lang('notification.email_type')</label>
                        <select name="email_type"  class="form-control" id="email_type">
                            @foreach($emailTypes as $key => $emailType)
                            <option value="{{$key}}">{{$emailType}} </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-info">@lang('notification.send')</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection