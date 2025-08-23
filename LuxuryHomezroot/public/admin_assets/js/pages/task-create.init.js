$(document).ready(function() {
    "use strict";

    var editors = [];  // Initialize an empty array

    // Assuming you're using a class like 'taskdesc-editor' to target the textareas
    $("textarea[id^='taskdesc-editor-']").each(function() {
        editors.push('#' + $(this).attr('id'));  // Add each unique ID to the editors array
    });

    editors.forEach(function(editor) {
        if ($(editor).length && (typeof tinymce === 'undefined' || !tinymce.get(editor.substring(1)))) {
            tinymce.init({
                selector: editor,
                height: 450,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
                style_formats: [
                    {title: "Bold text", inline: "b"},
                    {title: "Red text", inline: "span", styles: {color: "#ff0000"}},
                    {title: "Red header", block: "h1", styles: {color: "#ff0000"}},
                    {title: "Example 1", inline: "span", classes: "example1"},
                    {title: "Example 2", inline: "span", classes: "example2"},
                    {title: "Table styles"},
                    {title: "Table row 1", selector: "tr", classes: "tablerow1"}
                ]
            });
        }
    });

    window.outerRepeater = $(".outer-repeater").repeater({
        defaultValues: {"text-input": "outer-default"},
        show: function() {
            console.log("outer show");
            $(this).slideDown();
        },
        hide: function(e) {
            console.log("outer delete");
            $(this).slideUp(e);
        },
        repeaters: [{
            selector: ".inner-repeater",
            defaultValues: {"inner-text-input": "inner-default"},
            show: function() {
                console.log("inner show");
                $(this).slideDown();
            },
            hide: function(e) {
                console.log("inner delete");
                $(this).slideUp(e);
            }
        }]
    });
});
