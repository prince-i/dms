
$(document).ready(function () {
  $('.parallax').parallax();
  $('.sidenav').sidenav({});
  $('.tabs').tabs();
  $('.tooltipped').tooltip();
  $('.collapsible').collapsible();
  $('input#input_text, textarea#textarea2').characterCounter();
  $('.modal').modal();
  $('.fixed-action-btn').floatingActionButton({
    hoverEnabled: false,
    direction: "left"

  });

});



