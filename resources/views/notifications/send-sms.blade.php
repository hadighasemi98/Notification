@extends('layouts.layout')

@section('title' , 'Send SMS')


@section('content')
<div class="row justify-content-md-center">
    <div class="col-md-8">
        <div class="card">
        @include('messages.show-messages')

            <div class="card-header">
                @lang('notification.send-sms')
            </div>

            <form action="{{route('notification.send.sms')}}" method="POST" >
                @csrf
                    <div class="form-group ">
                        <label for="user">@lang('notification.users')</label>
                        <select name="user"  class="form-control" id="user"  >
                            @foreach($users as $user)
                            <option {{ old('user') == $user->id ? 'selected' : ''}} value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="text">@lang('notification.sms_text')</label>
                    <textarea name="text" id="text"  class="form-control" rows="3">{{old('text')}}</textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-info">@lang('notification.send')</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
