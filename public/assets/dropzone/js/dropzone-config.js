 Dropzone.options.dropzoneJsForm = {

      //prevents Dropzone from uploading dropped files immediately
      autoProcessQueue: false,
      uploadMultiple: true,
      parallelUploads: 25,
      maxFiles: 25,
      addRemoveLinks: true,
      previewsContainer: ".dropzone-previews",


      // The setting up of the dropzone
      init: function() {
        var myDropzone = this;

        // Here's the change from enyo's tutorial...

        $("#submit-all").click(function(e) {
          e.preventDefault();
          e.stopPropagation();
          myDropzone.processQueue();
        });

      }

    };