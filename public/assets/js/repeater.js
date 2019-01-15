var repeater = $('.repeater-default').repeater({
    initval: 1,
});


jQuery(".drag").sortable({
    axis: "y",
    cursor: 'pointer',
    opacity: 0.5,
    placeholder: "row-dragging",
    delay: 150,
    update: function(event, ui) {
        console.log('repeaterVal');
        console.log(repeater.repeaterVal());
        console.log('serializeArray');
        console.log(repeater.serializeArray());
    }
    // update: function(event, ui) {
    //     $('.repeater-default').repeater( 'setIndexes' );
    // }

}).disableSelection();

// jQuery(".drag > div").on("dragover", function(event) {
//     event.preventDefault();  
//     event.stopPropagation();
//     $(this).addClass('dragging');
// });

// jQuery(".drag > div").on("dragleave", function(event) {
//     event.preventDefault();  
//     event.stopPropagation();
//     $(this).removeClass('dragging');
// });

// jQuery(".drag > div").on("drop", function(event) {
//     event.preventDefault();  
//     event.stopPropagation();
//     alert("Dropped!");
// });

// jQuery(".ui-sortable-handle")
//     // crucial for the 'drop' event to fire
//     .on('dragover', false) 

//     .on('drop', function (e) {
//         // do something
// console.log('1');
//         return false;
//     });
