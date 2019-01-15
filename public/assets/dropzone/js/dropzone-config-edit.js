        var myId = $("#createtour1").attr('name'); // create a variable of tour_id
        var host = location.protocol + '//' + location.host; // protocal return port of local, host return path host
        var photo_counter = 0;
        //Dropzone all function put here
        Dropzone.options.myDropzone = {
        autoProcessQueue: false, // This will stop processing of dropzone before it submit
        url: host+'/room/'+myId+'/edit/editImg', //this path will have the data
        headers: {
            'X-CSRF-TOKEN': '{!! csrf_token() !!}'
        },
        // this is important as you dont want form to be submitted unless you have clicked the submit button
        uploadMultiple: true,
        parallelUploads: 5,
        maxFiles: 50,
        maxFilesize: 10,
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        dictFileTooBig: 'Image is bigger than 10MB',
        addRemoveLinks: true,
        
        // removedfile: function (file) {
        //     var name = file.name;
        //     /*only spaces*/
        //     $.ajax({
        //         type: 'get',
        //         url: host+'/room/'+myId+'/edit/deleteImg',
        //         headers: {
        //             'X-CSRF-TOKEN': '{!! csrf_token() !!}'
        //         },
        //         data: {imgname: file.name},
        //         dataType: 'html',
        //         success: function (data) {
        //             $("#msg").html(data);
        //         }
        //     });
        //     var _ref;
        //     if (file.previewElement) {
        //         if ((_ref = file.previewElement) != null) {
        //             _ref.parentNode.removeChild(file.previewElement);
        //         }
        //     }
        //     return this._updateMaxFilesReachedClass();
        // },
    // The setting up of the dropzone
    init:function() {
        // Add server images
        var myDropzone = this;
        
        $.get(host+'/server-images/'+myId, function(data) {


            $.each(data.images, function (key, value) {

                var file = { name: value.original, size: value.size };
                myDropzone.options.addedfile.call(myDropzone, file);
                myDropzone.options.thumbnail.call(myDropzone, file, host+'/images/room/' + value.original);       
                myDropzone.emit("complete", file);
                photo_counter++;
                $("#photoCounter").text( "(" + photo_counter + ")");
            });
        });

        $("#sbmtbtn").on('click', function checkabc(e) {
            function checkValidate() {
                    var flag = true;
                    if(document.getElementById('title').value == "") {
                        $("#errorTitle").html("Chưa nhập tên phòng");
                        flag = false;
                    }
                    else
                        $("#errorTitle").empty();

                    if(document.getElementById('description').value == "") {
                        $("#errorDescription").html("Chưa nhập Mô tả");
                        flag = false;
                    }
                    else
                        $("#errorDescription").empty();

                    if(document.getElementById('price').value == "") {
                        $("#errorPrice").html("Chưa nhập giá");
                        flag = false;
                    }
                    else
                        $("#errorPrice").empty();

                    if(document.getElementById('people').value == "") {
                        $("#errorPeople").html("Chưa nhập số người");
                        flag = false;
                    }
                    else
                        $("#errorPeople").empty();

                    if(document.getElementById('acreage').value == "") {
                        $("#errorAcreage").html("Chưa nhập diện tích");
                        flag = false;
                    }
                    else
                        $("#errorAcreage").empty();

                    if(document.getElementById('addr_housenr').value == "") {
                        $("#errorHousenr").html("Chưa nhập số nhà");
                        flag = false;
                    }
                    else
                        $("#errorHousenr").empty();

                    if(document.getElementById('addr_street').value == "") {
                        $("#errorStreet").html("Chưa nhập tên đường");
                        flag = false;
                    }
                    else
                        $("#errorStreet").empty();

                    

                    return flag;
                }
                if (checkValidate()==true) {
                    $("#createtour1").submit();
                    myDropzone.processQueue();
                    return true;
                }
                else{

                    return false;
                }
        });

        // this.on("removedfile", function(file) {

        //     $.ajax({
        //         type: 'post',
        //         headers: {
        //             'X-CSRF-TOKEN': '{!! csrf_token() !!}'
        //         },
        //         url: host+'/tour/edit/'+myId+'/deleteImg',

        //         data: {imgname: file.name},
        //         dataType: 'html',
        //         success: function(data){
        //             var rep = JSON.parse(data);
        //             if(rep.code == 200)
        //             {
        //                 photo_counter--;
        //                 $("#photoCounter").text( "(" + photo_counter + ")");
        //             }

        //         }
        //     });

        // } );
    },
    error: function(file, response) {
        if($.type(response) === "string")
            var message = response; //dropzone sends it's own error messages in string
        else
            var message = response.message;
        file.previewElement.classList.add("dz-error");
        _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
        _results = [];
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i];
            _results.push(node.textContent = message);
        }
        return _results;
    },
    success: function(file,done) {
        photo_counter++;
        $("#photoCounter").text( "(" + photo_counter + ")");
    }
}