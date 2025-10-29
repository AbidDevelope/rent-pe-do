var csrf = $("meta[name=csrf-token]").attr("content");
var base_url = $("meta[name=base_url]").attr("content");
var curr_url = window.location.origin + window.location.pathname;

// Loader start
$(function () {
  $(".preload").fadeOut(1000, function () {
    $(".for-loader").fadeIn(1000);
  });
});
// Loader end

// login start
jQuery(".form-control")
  .on("blur", function () {
    if (jQuery(this).val().length <= 0) {
      jQuery(this).siblings("label").removeClass("moveUp");
      jQuery(this).removeClass("outline");
    }
  })
  .on("focus", function () {
    if (jQuery(this).val().length >= 0) {
      jQuery(this).siblings("label").addClass("moveUp");
      jQuery(this).addClass("outline");
    }
  });

function copy_function(id) {
  var value = document.getElementById(id).innerHTML;
  var input_temp = document.createElement("input");
  input_temp.value = value;
  document.body.appendChild(input_temp);
  input_temp.select();
  document.execCommand("copy");
  document.body.removeChild(input_temp);
}
