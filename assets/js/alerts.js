(function($) {
  showSuccessToast = function(notif_text = "") {
    // 'use strict';
    resetToastPosition();
    $.toast({
      heading: 'Success',
      text: notif_text,
      showHideTransition: 'slide',
      icon: 'success',
      loaderBg: '#f96868',
      position: 'bottom-right'
    })
  };
  showInfoToast = function(notif_text = "") {
    // 'use strict';
    resetToastPosition();
    $.toast({
      heading: 'Info',
      text: notif_text,
      showHideTransition: 'slide',
      icon: 'info',
      loaderBg: '#46c35f',
      position: 'bottom-right'
    })
  };
  showWarningToast = function(notif_text = "") {
    // 'use strict';
    resetToastPosition();
    $.toast({
      heading: 'Warning',
      text: notif_text,
      showHideTransition: 'slide',
      icon: 'warning',
      loaderBg: '#57c7d4',
      position: 'bottom-right'
    })
  };
  showDangerToast = function(notif_text = "") {
    // 'use strict';
    resetToastPosition();
    $.toast({
      heading: 'Danger',
      text: notif_text,
      showHideTransition: 'slide',
      icon: 'error',
      loaderBg: '#f2a654',
      position: 'bottom-right'
    })
  };
  showToastPosition = function(position) {
    'use strict';
    resetToastPosition();
    $.toast({
      heading: 'Positioning',
      text: 'Specify the custom position object or use one of the predefined ones',
      position: String(position),
      icon: 'success',
      stack: false,
      loaderBg: '#f96868'
    })
  }
  showToastInCustomPosition = function() {
    'use strict';
    resetToastPosition();
    $.toast({
      heading: 'Custom positioning',
      text: 'Specify the custom position object or use one of the predefined ones',
      icon: 'success',
      position: {
        left: 120,
        top: 120
      },
      stack: false,
      loaderBg: '#f96868'
    })
  }
  resetToastPosition = function() {
    $('.jq-toast-wrap').removeClass('bottom-left bottom-right top-left top-right mid-center'); // to remove previous position class
    $(".jq-toast-wrap").css({
      "top": "",
      "left": "",
      "bottom": "",
      "right": ""
    }); //to remove previous position style
  }
})(jQuery);
