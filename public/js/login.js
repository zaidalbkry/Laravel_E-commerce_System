$(document).ready(function () {
    $(window).on("load", function () {
      setTimeout(removeOpacity, 100);
    });
  
    function removeOpacity() {
      $("#loadingDiv").fadeOut(100, function () {
        $("#loadingDiv").remove();
        $("body").removeClass("cover-overflow-y");
      });
    }
  
    var windowWidth = $(window).width();
    if (windowWidth > 768) {
      moveSliderRight = () => {
        document
          .getElementById("overlay")
          .classList.remove("overlay-moveHalfLeft");
        document
          .getElementById("overlayInner")
          .classList.remove("overlayInner-moveHalfRight");
        document.getElementById("signInForm").classList.remove("shiftRight");
  
        document.getElementById("overlay").classList.add("overlay-moveHalfRight");
        document
          .getElementById("overlayInner")
          .classList.add("overlayInner-moveHalfLeft");
        document.getElementById("signUpForm").classList.add("shiftLeft");
      };
      moveSliderLeft = () => {
        document
          .getElementById("overlay")
          .classList.remove("overlay-moveHalfRight");
        document
          .getElementById("overlayInner")
          .classList.remove("overlayInner-moveHalfLeft");
  
        document.getElementById("signUpForm").classList.remove("shiftLeft");
  
  
        document.getElementById("overlay").classList.add("overlay-moveHalfLeft");
        document
          .getElementById("overlayInner")
          .classList.add("overlayInner-moveHalfRight");
        document.getElementById("signInForm").classList.add("shiftRight");
      };  
    } else {
      $("#signUp").hide(); //1
      $("#signIn").fadeIn(); //2
  
      $("#signInForm").fadeIn(); //3
      $("#signUpForm").hide(); //4
  
      $("#signIn button").click(function () {
        $("#signUp").fadeIn(800); //1
        $("#signIn").hide(); //2
  
        $("#signInForm").hide(); //3
        $("#signUpForm").fadeIn(800); //4
      });
  
      $("#signUp button").click(function () {
        $("#signUp").hide(); //1
        $("#signIn").fadeIn(800); //2
  
        $("#signInForm").fadeIn(800); //3
        $("#signUpForm").hide(); //4
      });
  
      moveSliderRight = () => {
        console.log("");
      };
      moveSliderLeft = () => {
        console.log("");
      };
    }
  }); //End ready() ==> End Code JQuery