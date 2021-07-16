@extends('layouts.admin', ['pageTitle' => 'Contact Message', 'active' => 'contactUs'])
@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="card mb-4 py-3 border-bottom-info">
                <div class="card-body">
                    <div>
                        <h3>Name: {{$contact->name}}</h3>
                        <h6 style="color:gray;">Email: {{$contact->email}}</h6>
                        <p>Message: {{$contact->message}}</p>
                    </div>
                    <div style="text-align: right;">
                        <button class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#reply-modal">
                                <span class="icon text-white-50">
                                    <i class="fas fa-reply"></i>
                                </span>
                            <span class="text">Reply</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Reply Modal-->
    <div class="modal fade" id="reply-modal" tabindex="-1" role="dialog" aria-labelledby="replyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="replyModalLabel">Reply to <b>{{$contact->email}}</b></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <form method="post" action="{{route('admin.contactUs.reply')}}">
                    @csrf
                    <input type="hidden" name="email" value="{{$contact->email}}">
                    <div class="modal-body">
                        <textarea name="reply_message" class="form-control" rows="3" placeholder="Message to reply..."></textarea>
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
@endsection
