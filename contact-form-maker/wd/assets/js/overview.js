jQuery(document).ready(function () {
  jQuery(".overview_content > div:not(#welcome)").hide();
  jQuery(".overview_tabs li a:not(.not_tab)").on("click", function () {
    jQuery(".overview_tabs li a").removeClass("overview_tab_active");
    jQuery(this).addClass("overview_tab_active");
    jQuery(".overview_content > div").hide();
    var id = jQuery(this).attr("href");
    jQuery(id).show();
    return false;
  });
  jQuery("#wd-copy").on("click", function () {
    var selector = document.querySelector('#wd-site-deatils-textarea');
    selector.select();
    document.execCommand('copy');
    return false;
  });
});