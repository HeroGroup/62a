@extends('layouts.admin', ['pageTitle' => 'Contact Us Messages', 'active' => 'contactUs'])
@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            @foreach($messages as $message)
                <div class="col-md-4">
                    <div class="card mb-4 py-3 border-left-info">
                        <div class="card-body" style="padding-top:0;padding-bottom:0;">
                            <a href="{{route('admin.contactUs.show',$message->id)}}" style="color:inherit;text-decoration: none;">
                                <h3>{{$message->name}}</h3>
                                <h6 style="color:gray;">{{$message->email}}</h6>
                                <p>{{$message->message}}</p>
                            </a>
                            <div style="text-align: right;">
                                <button class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#reply-modal-{{$message->id}}">
                                <span class="icon text-white-50">
                                    <i class="fas fa-reply"></i>
                                </span>
                                    <span class="text">Reply</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Reply Modal-->
                <div class="modal fade" id="reply-modal-{{$message->id}}" tabindex="-1" role="dialog" aria-labelledby="replyModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="replyModalLabel">Reply to <b>{{$message->email}}</b></h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>

                            <form method="post" action="{{route('admin.contactUs.reply')}}">
                                @csrf
                                <input type="hidden" name="email" value="{{$message->email}}">
                                <div class="modal-body">
                                    <textarea name="reply-message" class="form-control" rows="3" placeholder="Message to reply..."></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-success btn-icon-split" type="submit">
                                <span class="icon text-white-50">
                                    <i class="fas fa-reply"></i>
                                </span>
                                        <span class="text">Send</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
