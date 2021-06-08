<!-- Upload  -->
<form id="file-upload-form" action="#" class="uploader">
    <input type="hidden" name="project_id" value="{{$projectId}}" />
    <input id="file-upload" type="file" name="fileUpload" accept="image/*" multiple />

    <label for="file-upload" id="file-drag">
        <!--<img id="file-image" src="#" alt="Preview" class="file-image hidden">-->

        <div id="start" class="start">
            <i class="fa fa-download" aria-hidden="true"></i>
            <div>Select Project Images from your computer, or drag here</div>
            <div id="notimage" class="notimage hidden">Please select an image</div>
        </div>

        <div id="response" class="response hidden">
            <div id="messages" class="messages"></div>
            <progress class="progress" id="file-progress" value="0">
                <span>0</span>%
            </progress>
        </div>

        <div id="photos"></div>
    </label>
</form>

<script>
    function ekUpload() {
        function Init() {

            var fileSelect = document.getElementById('file-upload'),
                fileDrag = document.getElementById('file-drag');

            fileSelect.addEventListener('change', fileSelectHandler, false);

            // Is XHR2 available?
            var xhr = new XMLHttpRequest();
            if (xhr.upload) {
                // File Drop
                fileDrag.addEventListener('dragover', fileDragHover, false);
                fileDrag.addEventListener('dragleave', fileDragHover, false);
                fileDrag.addEventListener('drop', fileSelectHandler, false);
            }
        }

        function fileDragHover(e) {
            var fileDrag = document.getElementById('file-drag');

            e.stopPropagation();
            e.preventDefault();

            fileDrag.className = (e.type === 'dragover' ? 'hover' : 'modal-body file-upload');
        }

        function fileSelectHandler(e) {
            // Fetch FileList object
            var files = e.target.files || e.dataTransfer.files;

            // Cancel event and hover styling
            fileDragHover(e);

            // Process all File objects
            for (var i = 0, f; f = files[i]; i++) {
                parseFile(f);
                uploadFile(f);
            }
        }

        function output(msg) {
            var m = document.getElementById('messages');
            m.style.color = "red";
            m.innerHTML = msg;
        }

        function clearOutput() {
            var m = document.getElementById('messages');
            m.style.color = "inherit";
            m.innerHTML = "";
        }

        function thumbnailPreview(file) {
            // Thumbnail Preview
            var container  = document.createElement("DIV");
            container.style.display = "inline-block";
            container.style.border = "2px dashed lightgray";
            container.style.borderRadius = "5px";
            container.style.position = "relative";
            container.style.margin = "15px";

            var img = document.createElement("IMG");
            img.setAttribute("src", URL.createObjectURL(file));
            img.setAttribute("alt", file.name);
            img.classList.add("file-image");
            container.appendChild(img);

            var btn = document.createElement("BUTTON");
            btn.id = file.name;
            btn.type = "button";
            btn.innerHTML = "<img src='/images/loading_icon.gif' width='25' height='25'>";
            btn.classList.add("btn","btn-sm","btn-secondary");
            btn.style.position = "absolute";
            btn.style.top = "40%";
            btn.style.left = "40%";
            btn.style.opacity = "0.85";
            container.appendChild(btn);

            document.getElementById('photos').appendChild(container);
        }

        function parseFile(file) {
            var imageName = file.name, imageSize = file.size, fileSizeLimit = 2; // In MB

            var isGood = (/\.(?=gif|jpg|png|jpeg)/gi).test(imageName);
            if (isGood) {
                if (imageSize <= fileSizeLimit * 1024 * 1024) {
                    document.getElementById('start').classList.add("hidden");
                    document.getElementById('response').classList.remove("hidden");
                    document.getElementById('notimage').classList.add("hidden");


                    // document.getElementById('file-image').classList.remove("hidden");
                    // document.getElementById('file-image').src = URL.createObjectURL(file);

                    thumbnailPreview(file);
                }
            }
            else {
                // document.getElementById('file-image').classList.add("hidden");
                document.getElementById('notimage').classList.remove("hidden");
                document.getElementById('start').classList.remove("hidden");
                document.getElementById('response').classList.add("hidden");
                document.getElementById("file-upload-form").reset();
                output("Format not supported.");
            }
        }

        function setProgressMaxValue(e) {
            console.log(e);
            if (e.lengthComputable)
                document.getElementById('file-progress').max = e.total;
        }

        function updateFileProgress(e) {
            console.log(e);
            if (e.lengthComputable)
                document.getElementById('file-progress').value = e.loaded;
        }

        function uploadFile(file) {
            var xhr = new XMLHttpRequest(),
                pBar = document.getElementById('file-progress'),
                fileSizeLimit = 2; // In MB
            if (xhr.upload) {
                // Check if file is less than x MB
                if (file.size <= fileSizeLimit * 1024 * 1024) {
                    pBar.style.display = 'inline';
                    xhr.onreadystatechange = function(e) {
                        if (xhr.readyState === 4) { /**/ }
                    };

                    let formData = new FormData();
                    formData.append('img', file);
                    formData.append('_token', "{{csrf_token()}}");
                    formData.append('project_id', "{{$projectId}}");

                    // Start upload
                    xhr.open('POST', "{{ route('admin.projects.imageUpload') }}", true);

                    xhr.addEventListener("load", function() {
                        // none display loading button
                        setTimeout(function() {
                            document.getElementById(file.name).style.display = "none";
                        }, 1000);
                    });

                    xhr.send(formData);
                } else {
                    output('Please upload a smaller file (< ' + fileSizeLimit + ' MB).');
                }
            }
        }

        function uploadFile2(file) {

            var xhr = new XMLHttpRequest(),
                pBar = document.getElementById('file-progress'),
                fileSizeLimit = 2; // In MB
            if (xhr.upload) {
                if (file.size <= fileSizeLimit * 1024 * 1024) {
                    pBar.style.display = 'inline';
                    xhr.upload.addEventListener('loadstart', setProgressMaxValue, false);
                    xhr.upload.addEventListener('progress', updateFileProgress, false);

                    // File received / failed
                    xhr.onreadystatechange = function (e) { if (xhr.readyState === 4) { /**/ } };

                    let formData = new FormData();
                    formData.append('img', file);
                    formData.append('_token', "{{csrf_token()}}");
                    formData.append('project_id', "{{$projectId}}");
/*
                    $.ajax({
                        xhr: function () {
                            var xhr = new XMLHttpRequest();
                            xhr.upload.addEventListener('loadstart', setProgressMaxValue, false);
                            xhr.upload.addEventListener('progress', updateFileProgress, false);
                            return xhr;
                        },
                        url: "{{ route('admin.projects.imageUpload') }}",
                        method: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                    });
*/
                    xhr.open('POST', "{{ route('admin.projects.imageUpload') }}", true);
                    xhr.setRequestHeader('X-File-Name', file.name);
                    xhr.setRequestHeader('X-File-Size', file.size);
                    // xhr.setRequestHeader('Content-Type', 'multipart/form-data');
                    xhr.send(file);

                } else {
                    output('Please upload a smaller file (< ' + fileSizeLimit + ' MB).');
                }
            }
        }

        // Check for the various File API support.
        if (window.File && window.FileList && window.FileReader) {
            Init();
        } else {
            document.getElementById('file-drag').style.display = 'none';
        }
    }
    ekUpload();
</script>
