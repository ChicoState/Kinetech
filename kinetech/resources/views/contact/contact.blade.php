@extends('layout.layout')
@section('contact')
    <form action="contact" method="post" class="row p-4">
        {{ csrf_field() }}
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="senderEmail" placeholder="email@youraddress">
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 form-group">
            <label for="contentTextArea">Name</label>
            <input type="text" class="form-control" name="senderName" placeholder="First name">
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 form-group">
            <label for="contentTextArea">Subject</label>
            <input type="text" class="form-control" name="senderSubject" placeholder="Subject">
        </div>
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <label for="contentTextArea">Message</label>
            <textarea class="form-control" name="senderContent" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
@endsection