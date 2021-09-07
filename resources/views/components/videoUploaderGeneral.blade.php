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
    var uploadVideoRoute = "{{ $uploadRoute }}", videoSizeLimit = 10; // In MB

    function vUpload() {
        function vInit() {
            var fileSelect = document.getElementById('video-upload'),
                fileDrag = document.getElementById('video-drag');

            fileSelect.addEventListener('change', vFileSelectHandler, false);

            // Is XHR available?
            var xhr = new XMLHttpRequest();
            if (xhr.upload) {
                // File Drop
                fileDrag.addEventListener('dragover', vFileDragHover, false);
                fileDrag.addEventListener('dragleave', vFileDragHover, false);
                fileDrag.addEventListener('drop', vFileSelectHandler, false);
            }
        }

        function vFileDragHover(e) {
            var fileDrag = document.getElementById('video-drag');

            e.stopPropagation();
            e.preventDefault();

            fileDrag.className = (e.type === 'dragover' ? 'hover' : 'modal-body video-upload');
        }

        function vFileSelectHandler(e) {
            // Fetch FileList object
            var files = e.target.files || e.dataTransfer.files;

            // Cancel event and hover styling
            vFileDragHover(e);

            // Process all File objects
            for (var i = 0, f; f = files[i]; i++) {
                vParseFile(f);
                vUploadFile(f);
            }
        }

        function vOutput(msg) {
            var m = document.getElementById('messages');
            m.style.color = "red";
            m.innerHTML = msg;
            console.log(msg);
        }

        function vClearOutput() {
            var m = document.getElementById('messages');
            m.style.color = "inherit";
            m.innerHTML = "";
        }

        function vThumbnailPreview(file) {
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

        function vParseFile(file) {
            var fileName = file.name, fileSize = file.size;

            var isGood = (/\.(?=mp4)/gi).test(fileName);
            if (isGood) {
                if (fileSize <= videoSizeLimit * 1024 * 1024) {
                    vThumbnailPreview(file);
                } else {
                    document.getElementById('notimage').classList.remove("hidden");
                    document.getElementById('start').classList.remove("hidden");
                    document.getElementById('response').classList.add("hidden");
                    document.getElementById("video-upload-form").reset();
                    vOutput('Please upload a smaller file (< ' + videoSizeLimit + ' MB).');
                }
            } else {
                document.getElementById('notimage').classList.remove("hidden");
                document.getElementById('start').classList.remove("hidden");
                document.getElementById('response').classList.add("hidden");
                document.getElementById("video-upload-form").reset();
                vOutput("Format not supported.");
            }
        }

        function vUploadFile(file) {
            var xhr = new XMLHttpRequest(),
                pBar = document.getElementById('file-progress');
            if (xhr.upload) {
                // Check if file is less than x MB
                if (file.size <= videoSizeLimit * 1024 * 1024) {
                    pBar.style.display = 'inline';
                    xhr.onreadystatechange = function(e) {
                        if (xhr.readyState === 4) { /**/ }
                    };

                    let formData = new FormData();
                    formData.append('video', file);
                    formData.append('_token', "{{csrf_token()}}");
                    formData.append('temp', "{{$temp}}");

                    // Start upload
                    xhr.open('POST', uploadVideoRoute, true);

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
                    vOutput('Please upload a smaller file (< ' + videoSizeLimit + ' MB).');
                }
            }
        }

        // Check for the various File API support.
        if (window.File && window.FileList && window.FileReader) {
            vInit();
        } else {
            document.getElementById('video-drag').style.display = 'none';
        }
    }
    vUpload();
</script>
