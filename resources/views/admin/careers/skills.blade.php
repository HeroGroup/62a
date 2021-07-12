@extends('layouts.admin', ['pageTitle' => 'Skills for '.$career->job_title_en, 'active' => 'careers'])
@section('content')
    <style>
        .empty-error {
            border:3px solid red;
        }
    </style>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>skill description (en)</th>
                <th>skill description (hy)</th>
                <th style="text-align:right;">
                    <button class="btn btn-primary btn-icon-split" onclick="add()">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">new skill</span>
                    </a>
                </th>
            </tr>
        </thead>
        <tbody id="table-body"></tbody>
    </table>
</div>
<div>
    <button class="btn btn-success" onclick="save()">Save Skills</button>
</div>
<script>
    var id=0;
    function add() {
        var row = `
            <tr id='${id}'>
                <td><input name='skill-item-en-${id}' type='text' class='form-control' /></td>
                <td><input name='skill-item-hy-${id}' type='text' class='form-control' /></td>
                <td><button type='button' class='btn btn-danger' style='text-align:right;' onclick='document.getElementById(${id}).remove()'><i class='fa fa-trash'></i></button></td>
            </tr>`;

        $("#table-body").append(row);
        id++;
    }

function save() {
    var error = false, errorMessage="";

    var result = [], count = 0;
    $("#table-body tr").each(function (index) {
        count++;
        $(this).removeClass('empty-error');

        var id = $(this).attr("id"),
            skillItemEn = $(`input[name=skill-item-en-${id}]`).val(),
            skillItemHy = $(`input[name=skill-item-hy-${id}]`).val();

        if (!skillItemEn || !skillItemHy) {
            $(`input[name=${id}]`).addClass('empty-error');
            error = true;
            return;
        }

        result.push({"item_description_en": skillItemEn, "item_description_hy": skillItemHy});
    });

    if (count > 0) {
        if (error) {
            if (errorMessage.length > 0)
                Swal.fire({title:errorMessage, icon:"warning"});
            return;
        } else {
            $.ajax("{{route('admin.careers.skills.store')}}", {
                method: 'post',
                data: {
                    _token: "{{csrf_token()}}",
                    career_id: "{{$career->id}}",
                    data: JSON.stringify(result)
                },
                success: function (response) {
                    if (response.status === 1) {
                        Swal.fire({
                            title: "",
                            text: response.message,
                            icon: "success"
                        }).then(function() {
                            window.location.href = "{{ route('admin.careers.index') }}";
                        });
                    } else {
                        Swal.fire({
                            title: "",
                            text: response.message,
                            icon: "error"
                        });
                    }
                }
            });
        }
    } else {
        Swal.fire({
            title: "no items entered!",
            icon: "warning",
        });
    }
}
</script>
@endsection
