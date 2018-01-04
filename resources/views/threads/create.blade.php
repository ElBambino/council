@extends('layouts.app')

@section('header')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create a new thread</div>

                <div class="panel-body">
                    <form method="POST" action="/threads">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="channel_id">Choose a Channel:</label>
                            <select name="channel_id" id="channel_id" class="form-control" required>
                                <option value="">Choose one...</option>
                                @foreach($channels as $channel)
                                    <option value="{{ $channel->id }}" {{ old('channel_id') == $channel->id ? 'selected' : '' }}>
                                      {{ $channel->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                        </div>

                        <div class="form-group">
                            <wysiwyg name="body"></wysiwyg>
                        </div>

                        <div class="form-group">
                            <div class="g-recaptcha" data-sitekey="6LcVLD0UAAAAAAqdtdpqeZ4yQmgMiwNps2xo5359"></div>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Publish</button>
                        </div>

                        @if(count($errors))
                            @foreach($errors->all() as $error)
                                <ul class="alert alert-danger">
                                    <li>{{ $error }}</li>
                                </ul>
                            @endforeach
                        @endif
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
