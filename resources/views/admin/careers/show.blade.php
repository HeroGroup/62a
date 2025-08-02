@extends('layouts.admin', ['pageTitle' => 'Job Details', 'active' => 'careers'])
@section('content')
    <div class="card shadow mb-4">
        <a href="#job-details" class="d-block card-header py-3 border-bottom-success" data-toggle="collapse" role="button" aria-expanded="true">
            <h6 class="m-0 font-weight-bold text-primary">Job Details</h6>
        </a>
        <div class="collapse show" id="job-details">
            <div class="card-body">
                <form method="post" action="{{route('admin.careers.update',$career->id)}}">
                    @csrf
                    <input type="hidden" name="_method" value="put" />

                    <div style="margin-bottom:30px;">
                        <span> Inactive </span>
                        <label class="switch">
                            <input type="checkbox" name="is_active" @if($career->is_active) checked @endif >
                            <span class="slider round"></span>
                        </label>
                        <span> Active </span>
                    </div>

                    <div class="form-group row" style="margin-bottom:30px;">
                        <div class="col-md-6">
                            <label for="job_title_en">Job Title (english)</label>
                            <input class="form-control" name="job_title_en" id="job_title_en" value="{{$career->job_title_en}}">
                        </div>
                        <div class="col-md-6">
                            <label for="job_title_hy">Job Title (armenian)</label>
                            <input class="form-control" name="job_title_hy" id="job_title_hy" value="{{$career->job_title_hy}}">
                        </div>
                    </div>

                    <div class="form-group row" style="margin-bottom:30px;">
                        <div class="col-md-6">
                            <label for="job_description_en">Job Description (en)</label>
                            <textarea  class="form-control" name="job_description_en" id="job_description_en" rows="5">{{$career->job_description_en}}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="job_description_hy">Job Description (Armenian)</label>
                            <textarea  class="form-control" name="job_description_hy" id="job_description_hy" rows="5">{{$career->job_description_hy}}</textarea>
                        </div>
                    </div>

                    <div class="form-group row" style="margin-bottom:30px;">
                        <div class="col-md-6">
                            <label for="location_en">Location (english)</label>
                            <input class="form-control" name="location_en" id="location_en" value="{{$career->location_en}}">
                        </div>
                        <div class="col-md-6">
                            <label for="location_hy">Location (armenian)</label>
                            <input class="form-control" name="location_hy" id="location_hy" value="{{$career->location_hy}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <a href="{{route('admin.careers.index')}}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-success">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <a href="#skills" class="d-block card-header py-3 border-bottom-info" data-toggle="collapse" role="button" aria-expanded="true">
            <h6 class="m-0 font-weight-bold text-primary">Qualifications</h6>
        </a>
        <div class="collapse" id="skills">
            <div class="card-body">
                <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#new-skill-modal">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">New Qualification</span>
                </a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Qualification Description (english)</th>
                            <th>Qualification Description (armenian)</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($skills as $skill)
                        <tr id="{{$skill->id}}">
                            <td>{{$skill->item_description_en}}</td>
                            <td>{{$skill->item_description_hy}}</td>
                            <td>
                                <a href="#" class="btn btn-info btn-circle btn-sm" data-toggle="modal" data-target="#edit-skill-modal-{{$skill->id}}" title="Edit">
                                    <i class="fas fa-pen"></i>
                                </a>
                                &nbsp;

                                <!-- Edit Skill Modal -->
                                <div class="modal fade" id="edit-skill-modal-{{$skill->id}}" tabindex="-1" role="dialog" aria-labelledby="editSkillModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editSkillModalLabel">Edit Skill</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="{{route('admin.careers.skills.update',$skill->id)}}">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="PUT">
                                                    <div class="form-group row" style="margin-bottom:30px;">
                                                        <div class="col-md-12">
                                                            <label for="item_description_en">item description (english)</label>
                                                            <input class="form-control" name="item_description_en" value="{{$skill->item_description_en}}" placeholder="Enter skill item (english)" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row" style="margin-bottom:30px;">
                                                        <div class="col-md-12">
                                                            <label for="item_description_hy">Title (armenian)</label>
                                                            <input class="form-control" name="item_description_hy" value="{{$skill->item_description_hy}}" placeholder="Enter skill item (armenian)" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row" style="margin-bottom:30px;">
                                                        <div class="col-md-12" style="text-align:center;">
                                                            <input type="submit" class="btn btn-success" value="Save and close" />
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <a href="#" class="btn btn-danger btn-circle btn-sm" title="Delete" onclick="destroy('{{route('admin.careers.skills.destroy',$skill->id)}}','{{$skill->id}}','{{$skill->id}}')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Create Skill Modal -->
    <div class="modal fade" id="new-skill-modal" tabindex="-1" role="dialog" aria-labelledby="newSkillModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newSkillModalLabel">Add new skill</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('admin.careers.skills.storeSingle')}}">
                        @csrf
                        <input type="hidden" name="career_id" value="{{$career->id}}" />
                        <div class="form-group row" style="margin-bottom:30px;">
                            <div class="col-md-12">
                                <label for="item_description_en">Title (english)</label>
                                <input class="form-control" name="item_description_en" value="{{old('item_description_en')}}" placeholder="Enter skill (english)" required>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-bottom:30px;">
                            <div class="col-md-12">
                                <label for="item_description_hy">Title (armenian)</label>
                                <input class="form-control" name="item_description_hy" value="{{old('item_description_hy')}}" placeholder="Enter skill (armenian)" required>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-bottom:30px;">
                            <div class="col-md-12" style="text-align:center;">
                                <input type="submit" class="btn btn-success" value="Save and close" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

