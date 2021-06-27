@extends('layouts.admin', ['pageTitle' => 'Categories', 'active' => 'categories'])
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
        </div>
        <div class="card-body">
            <a class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#new-category-modal">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">new category</span>
            </a>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Title (english)</th>
                            <th>Title (armenian)</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr id="{{$category->id}}">
                            <td>{{$category->title_en}}</td>
                            <td>{{$category->title_hy}}</td>
                            <td>
                                <a href="#" class="btn btn-info btn-circle btn-sm" data-toggle="modal" data-target="#edit-category-modal-{{$category->id}}" title="Edit">
                                    <i class="fas fa-pen"></i>
                                </a>
                                &nbsp;

                                <!-- Edit Category Modal -->
                                <div class="modal fade" id="edit-category-modal-{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="{{route('admin.categories.update',$category->id)}}">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="PUT">
                                                    <div class="form-group row" style="margin-bottom:30px;">
                                                        <div class="col-md-12">
                                                            <label for="title_en">Title (english)</label>
                                                            <input class="form-control" name="title_en" value="{{$category->title_en}}" placeholder="Enter category name (english)" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row" style="margin-bottom:30px;">
                                                        <div class="col-md-12">
                                                            <label for="title_hy">Title (armenian)</label>
                                                            <input class="form-control" name="title_hy" value="{{$category->title_hy}}" placeholder="Enter category name (armenian)" required>
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

                                <a href="#" class="btn btn-danger btn-circle btn-sm" title="Delete" onclick="destroy('{{route('admin.categories.destroy',$category->id)}}','{{$category->id}}','{{$category->id}}')">
                                    <i class="fas fa-trash"></i>
                                </a>
                                &nbsp;
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @component('components.newCategory')@endcomponent

@endsection
