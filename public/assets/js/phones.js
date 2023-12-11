// JavaScript Document
window.fakeFetch = (time = 1000, func) =>
        new Promise((resolve) => {
          setTimeout(() => {
            resolve(typeof func === 'function' ? func() : false);
          }, time);
        });

      window.showNotification = () => {
        window
          .Toastify({
            text: 'Validation successfully passed!',
            duration: 3000,
            close: true,
            gravity: 'bottom', // `top` or `bottom`
            position: 'left', // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
          })
          .showToast();
      };
//Formatting phone number input
$("input[type='tel']").each(function(){
  $(this).on("change keyup paste", function (e) {
    var output,
      $this = $(this),
      input = $this.val();

    if(e.keyCode != 8) {
      input = input.replace(/[^0-9]/g, '');
      var area = input.substr(0, 3);
      var pre = input.substr(3, 3);
      var tel = input.substr(6, 4);
      if (area.length < 3) {
        output = "(" + area;
      } else if (area.length == 3 && pre.length < 3) {
        output = "(" + area + ")" + " " + pre;
      } else if (area.length == 3 && pre.length == 3) {
        output = "(" + area + ")" + " " + pre + "-" + tel;
      }
      $this.val(output);
    }
  });
});

//formatting ssn