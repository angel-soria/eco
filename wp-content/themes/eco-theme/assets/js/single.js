	$(document).ready(function(e) {
$(".fancybox").fancybox({
    // solves some issues with streamed media
    iframe: {
        preload: false
    },
    // Increase left/right margin for iframe content
    margin: [20, 60, 20, 60]
});
});