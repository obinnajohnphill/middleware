@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                        @if(session()->has('message'))
                            <h6 style = "color: green">{{session()->get('message')}}</h6>
                        @endif

                    You are logged in! as <strong>{{ strtoupper(Auth::user()->type) }}</strong>
                <br><br>

                        <div align="left"><a href="{{ url('/') }}/articles">Send API Request</a></div>

                </div><br>

                <form class="form-horizontal" method="post" action="/mail"  enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="name" class="col-lg-2 control-label">
                            Name
                        </label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="name"  name="name" placeholder="Enter the name of addressee">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-lg-2 control-label">
                            To Email
                        </label>
                        <div class="col-lg-10">
                            <input type="email" class="form-control" name="email" placeholder="Enter email address to send to">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subject" class="col-lg-2 control-label">
                           Subject
                        </label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="subject" placeholder="Enter a subject">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message" class="col-lg-2 control-label">
                           Message
                        </label>
                        <div class="col-lg-10">
                            <input type="textarea" class="form-control" id="message" name="message" placeholder="Enter a message" rows="6" cols="10">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="from_email" class="col-lg-2 control-label">
                            From Email
                        </label>
                        <div class="col-lg-10">
                            <input type="email" class="form-control" id="from_email"  name="from_email" placeholder="Enter email address sent from">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-primary">Send</button>

                        </div>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
