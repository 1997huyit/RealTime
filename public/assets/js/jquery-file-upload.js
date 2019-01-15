(function($) {
  'use strict';
  if ($("#fileuploader").length) {
    $("#fileuploader").uploadFile({
      url: "#",
      fileName: "myfile"
    });
  }
})(jQuery);