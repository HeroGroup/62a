<form id="video-upload-form" action="#" class="uploader">
    <input id="video-upload" type="file" name="videoUpload" accept="video/*" @if(isset($multiple)) multiple @endif />

    <label for="video-upload" id="video-drag">
        <div id="start" class="start">
            <i class="fa fa-download" aria-hidden="true"></i>
            <div>{{$uploadText}}</div>
            <div id="notimage" class="notimage hidden">Please select a Video</div>
        </div>

        <div id="response" class="response hidden">
            <div id="messages" class="messages"></div>
            <progress class="progress" id="file-progress" value="0">
                <span>0</span>%
            </progress>
        </div>

        <div id="videos"></div>
    </label>
</form>

<script>
    var uploadRoute = "{{ $uploadRoute }}", fileSizeLimit = 10; // In MB

    function ekUpload() {
        function Init() {
            var fileSelect = document.getElementById('video-upload'),
                fileDrag = document.getElementById('video-drag');

            fileSelect.addEventListener('change', fileSelectHandler, false);

            // Is XHR available?
            var xhr = new XMLHttpRequest();
            if (xhr.upload) {
                // File Drop
                fileDrag.addEventListener('dragover', fileDragHover, false);
                fileDrag.addEventListener('dragleave', fileDragHover, false);
                fileDrag.addEventListener('drop', fileSelectHandler, false);
            }
        }

        function fileDragHover(e) {
            var fileDrag = document.getElementById('video-drag');

            e.stopPropagation();
            e.preventDefault();

            fileDrag.className = (e.type === 'dragover' ? 'hover' : 'modal-body video-upload');
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
            console.log(msg);
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
            img.setAttribute("src", "/images/blank.jpg");
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

            document.getElementById('videos').appendChild(container);
        }

        function parseFile(file) {
            var fileName = file.name, fileSize = file.size;

            var isGood = (/\.(?=mp4)/gi).test(fileName);
            if (isGood) {
                if (fileSize <= fileSizeLimit * 1024 * 1024) {
                    thumbnailPreview(file);
                } else {
                    document.getElementById('notimage').classList.remove("hidden");
                    document.getElementById('start').classList.remove("hidden");
                    document.getElementById('response').classList.add("hidden");
                    document.getElementById("video-upload-form").reset();
                    output('Please upload a smaller file (< ' + fileSizeLimit + ' MB).');
                }
            } else {
                document.getElementById('notimage').classList.remove("hidden");
                document.getElementById('start').classList.remove("hidden");
                document.getElementById('response').classList.add("hidden");
                document.getElementById("video-upload-form").reset();
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
                pBar = document.getElementById('file-progress');
            if (xhr.upload) {
                // Check if file is less than x MB
                if (file.size <= fileSizeLimit * 1024 * 1024) {
                    pBar.style.display = 'inline';
                    xhr.onreadystatechange = function(e) {
                        if (xhr.readyState === 4) { /**/ }
                    };

                    let formData = new FormData();
                    formData.append('video', file);
                    formData.append('_token', "{{csrf_token()}}");
                    formData.append('temp', "{{$temp}}");

                    // Start upload
                    xhr.open('POST', uploadRoute, true);

                    xhr.addEventListener("load", function() {
                        var response = JSON.parse(xhr.response);
                        if(response.status === 1) {
                            // hide loading button
                            setTimeout(function() {
                                document.getElementById(file.name).style.display = "none";
                            }, 1000);
                        }
                    });

                    xhr.send(formData);
                } else {
                    output('Please upload a smaller file (< ' + fileSizeLimit + ' MB).');
                }
            }
        }

        // Check for the various File API support.
        if (window.File && window.FileList && window.FileReader) {
            Init();
        } else {
            document.getElementById('video-drag').style.display = 'none';
        }
    }
    ekUpload();
</script>
