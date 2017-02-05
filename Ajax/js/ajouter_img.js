

    var fileInput = document.querySelector('#file'),
        progress = document.querySelector('#progress');

    fileInput.addEventListener('change', function() {

        var xhr = new XMLHttpRequest();

        xhr.open('POST', 'upload.html');

        xhr.upload.addEventListener('progress', function(e) {
            progress.value = e.loaded;
            progress.max = e.total;
        }, false);

        xhr.addEventListener('load', function() {
            alert('Upload terminé !');
        }, false);

        var form = new FormData();
        form.append('file', fileInput.files[0]);

        xhr.send(form);

    }, false);
