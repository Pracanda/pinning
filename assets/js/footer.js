
    /*-------------------------------------------

/*For Scroll Reveal*/
/*----------------------------------------*/
(function($) {

	'use strict';

	window.sr= new scrollReveal({
	  reset: true,
	  move: '50px',
	  mobile: true
	});

})();

/*-----------------------------*/

/*For Navigation Active Link*/
/*------------------------------------------------------------------------------------------------------*/
$("#home .sidebar-navigation a:contains('Dashboard')").addClass('active');
$("#banner .sidebar-navigation a:contains('Banners')").addClass('active');
$("#banner .sidebar-navigation #banners").addClass('in');
$("#media .sidebar-navigation a:contains('Media')").addClass('active');
$("#pop .sidebar-navigation a:contains('Pop Out News')").addClass('active');
$("#media .sidebar-navigation #medias").addClass('in');
$("#news .sidebar-navigation a:contains('News')").addClass('active');
$("#team .sidebar-navigation a:contains('Members')").addClass('active');
$("#events .sidebar-navigation a:contains('Events')").addClass('active');
$("#pop .sidebar-navigation a:contains('Pop')").addClass('active');
$("#binepal-category .sidebar-navigation a:contains('Best In Nepal')").addClass('active');
$("#binepal-category .sidebar-navigation #binepal").addClass('in');
/*--------------------------------------------------------------------------------------------------*/

/*For Tooltip*/
/*--------------------------------------*/
$(document).ready(function() {
    $(".action a").tooltip();
});
/*-----------------------------------*/


/*For DatePicker*/
/*--------------------------------------------------------------------------*/
$('.startdate').datepicker({
dateFormat:"dd-mm-yy", ///"dd-mm-yy"
//minDate:0, // -5d
// maxDate:'+1m + 10d',
showButtonPanel:true,
showAnim:'show' // fadein show etc
});

$(".duedate").on("focus", function(){
  var startdate = $('.startdate').val();
  if(startdate.trim() == ""){
    alert("please choose starting date.");
    $(".startdate").focus();
  }
  else{
    $(this).datepicker({
    dateFormat:"dd-mm-yy", ///"dd-mm-yy"
    minDate:startdate, // -5d
    // maxDate:'+1m + 10d',
    showButtonPanel:true,
    showAnim:'show' // fadein show etc
    });
  }
});
/*--------------------------------------------------------------------------------*/

/*For Image Change*/
/*---------------------------------------------------------------------------------*/
$("#imagePreview").hide();
$(function() {
    $("#uploadImage").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function(){ // set image data as background of div
            	$("#imagePreview1").hide();
            	$("#imagePreview").show();

                $("#imagePreview").css("background-image", "url("+this.result+")");
            }
        }
    });
});

$("#faviconPreview").hide();
$(function() {
    $("#uploadfavicon").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function(){ // set image data as background of div
              $("#faviconPreview1").hide();
              $("#faviconPreview").show();

                $("#faviconPreview").css("background-image", "url("+this.result+")");
            }
        }
    });
});
/*------------------------------------------------------------------------------------------------------*/

/*Cropper 1*/
/*------------------------------------------------------------------------------------------------------------*/
$(function() {
      var $cropper = $(".cropper"),
          $dataX = $("#dataX"),
          $dataY = $("#dataY"),
          $dataH = $("#dataH"),
          $dataW = $("#dataW"),
          cropper;

      $cropper.cropper({
        aspectRatio: 733 / 383,
        data: {
          x: 97,
          y: 225,
          width: 709,
          height: 236
        },
        preview: ".preview",

        // autoCrop: false,
        // dragCrop: false,
        // modal: false,
        // moveable: false,
        // resizeable: false,

        // maxWidth: 480,
        // maxHeight: 270,
        // minWidth: 160,
        // minHeight: 90,

        done: function(data) {
          $dataX.val(data.x);
          $dataY.val(data.y);
          $dataH.val(data.height);
          $dataW.val(data.width);
        },
        build: function(e) {
          console.log(e.type);
        },
        built: function(e) {
          console.log(e.type);
        },
        dragstart: function(e) {
          console.log(e.type);
        },
        dragmove: function(e) {
          console.log(e.type);
        },
        dragend: function(e) {
          console.log(e.type);
        }
      });

      cropper = $cropper.data("cropper");

      $cropper.on({
        "build.cropper": function(e) {
          console.log(e.type);
          // e.preventDefault();
        },
        "built.cropper": function(e) {
          console.log(e.type);
          // e.preventDefault();
        },
        "dragstart.cropper": function(e) {
          console.log(e.type);
          // e.preventDefault();
        },
        "dragmove.cropper": function(e) {
          console.log(e.type);
          // e.preventDefault();
        },
        "dragend.cropper": function(e) {
          console.log(e.type);
          // e.preventDefault();
        }
      });

  


      $("#setAspectRatio").click(function() {
        $cropper.cropper("setAspectRatio", $("#aspectRatio").val());
      });
      $("#uploadImagecrop").change(function(){
          var p = $("#cropper");
    var _URL = window.URL || window.webkitURL;

        p.fadeOut();
        var ext = $('#uploadImagecrop').val().split('.').pop().toLowerCase();
        if($.inArray(ext, ['png','jpg','jpeg']) == -1) {
            // alert('invalid extension!');
            $("#uploadImagecrop").val("");
        }

        // prepare HTML5 FileReader
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImagecrop").files[0]);

        oFReader.onload = function (oFREvent) {
            // p.attr('src', oFREvent.target.result).fadeIn();
              $cropper.cropper("setImgSrc", oFREvent.target.result);
        };

         });
      $("#getImgInfo").click(function() {
        $("#showInfo").val(JSON.stringify($cropper.cropper("getImgInfo")));
      });

      $("#getData").click(function() {
        $("#showData").val(JSON.stringify($cropper.cropper("getData")));
      });
    });
/*---------------------------------------------------------------------------------------------------*/
var p = $("#cropper");
    var _URL = window.URL || window.webkitURL;

    // prepare instant preview
    $("#uploadImage").change(function(e){
        // fadeOut or hide preview
        var file, img,aw;
        if ((file = this.files[0])) {
            img = new Image();
            img.onload = function () {
                // alert(this.width + " " + this.height);
                aw= (this.width)/700;
                $('#chag_sort').val(aw);
            };
            img.src = _URL.createObjectURL(file);
        }
        p.fadeOut();
        var ext = $('#uploadImage').val().split('.').pop().toLowerCase();
        if($.inArray(ext, ['png','jpg','jpeg']) == -1) {
            // alert('invalid extension!');
            $("#uploadImage").val("");
        }

        // prepare HTML5 FileReader
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

        oFReader.onload = function (oFREvent) {
            p.attr('src', oFREvent.target.result).fadeIn();
        };

    });
    /*----------------------------------------------------------------------------------------------------*/
