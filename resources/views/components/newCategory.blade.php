
    <!-- Create Category Modal -->
    <div class="modal fade" id="new-category-modal" tabindex="-1" role="dialog" aria-labelledby="newCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newCategoryModalLabel">Add new category</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('admin.categories.store')}}">
                        @csrf
                        <div class="form-group row" style="margin-bottom:30px;">
                            <div class="col-md-12">
                                <label for="title_en">Title (english)</label>
                                <input class="form-control" name="title_en" value="{{old('title_en')}}" placeholder="Enter category name (english)" required>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-bottom:30px;">
                            <div class="col-md-12">
                                <label for="title_hy">Title (armenian)</label>
                                <input class="form-control" name="title_hy" value="{{old('title_hy')}}" placeholder="Enter category name (armenian)" required>
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
