jQuery(document).on("ready", function () {
  jQuery(".permissions").on("click", function () {
    jQuery(".list").toggle();
    return false;
  });
  jQuery(".allow_and_continue").on("click", function () {
    jQuery(this).css("opacity", "0.5");
    jQuery(".wd_loader").css("visibility", "visible");
  });
});