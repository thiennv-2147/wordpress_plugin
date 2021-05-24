function tenweb_free_trial_banner_close() {
  jQuery.ajax( {
    type: "POST",
    url: ajaxurl,
    data: { action:"fm_free_trial_banner" },
    success: function ( response ) {
      if ( response == "True" ) {
        jQuery(".tenweb_free_trial_banner").remove();
      }
    },
  } );
}
/* Hide Banner on fix date */
var current = new Date();
var banner_expiry = new Date("May 28 2021 00:00:00");
if ( current.getTime() > banner_expiry.getTime() ) {
  tenweb_free_trial_banner_close();
}
