//  Andy Langton's show/hide/mini-accordion @ http://andylangton.co.uk/jquery-show-hide

// this tells jquery to run the function below once the DOM is ready
$(document).ready(function() {

// choose text for the show/hide link - can contain HTML (e.g. an image)
// var showText='Show';
// var hideText='Hide';

// var aktif = $("h3#showmenu").data("id");
// initialise the visibility check
var is_visible = true;

// append show/hide links to the element directly preceding the element with a class of "toggle"
// $('.toggle').prev().append(' <a href="#" class="toggleLink">'+showText+'</a>');
// $('a.toggleLink').text(showText);
// hide all of the elements with a class of 'toggle'
// $('.toggle').show();
$('#Hide').show();
$('#Show').hide();

// capture clicks on the toggle links
$('a.toggleLink').click(function() {

// switch visibility
is_visible = !is_visible;

$('#Hide').slideUp('slow');

// change the link text depending on whether the element is shown or hidden
if ($(this).text()=='Show') {
    $(this).text('Hide');
    $(this).parent().next('.toggle').slideDown('slow');
}
else {
    $(this).text('Show');
    $(this).parent().next('.toggle').slideUp('slow');
}


// return false so any link destination is not followed
return false;

});

});


