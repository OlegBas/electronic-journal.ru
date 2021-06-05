// $(function () {
//   let addressApp = "http://electronic-journal.ru:81/frontend/";
//   function cutomAjax(stringJson, id, action, func) {
//     $.ajax({
//       type: "GET",
//       url: addressApp + "?r=site/" + action + "&id=" + id,
//       data: stringJson,
//       success: function (response) {
//         func(response);
//       },
//     });
//   }

//   $(".linkAboutPeople").on("click", function (e) {
//     let id = $(this).attr("data-id");
//     let editCeil = false;

//     cutomAjax("{}", id, "people", function (response) {
//       $("#aboutPeople .modal-body").empty();
//       $("#aboutPeople .modal-body").append(response);
//     });
//     e.preventDefault();
//   });

//   $(document).on("click", "#editAboutPeople", function (e) {
//     let id = $(this).attr("data-id");
//     cutomAjax("{}", id, "edit", function (response) {
//       $("#aboutPeople .modal-body").empty();
//       $("#aboutPeople .modal-body").append(response);
//     });
//     e.preventDefault();
//   });

//   $(document).on("click", "#saveForm", function (e) {

//     e.preventDefault();
//   });
// });

$(function () {
  $("#version a").on("click", function () {
    e.preventDefault();
  });

  $("#zoomIn").on("click", function () {
    $("body").attr("style", "font-size:40px");
  });
  $("#zoomOut").on("click", function () {
    $("body").attr("style", "font-size:14px");
  });
  $("#bgBlack").on("click", function () {
    $("body").attr("style", "background-color:#000");
  });
  $("#bgWhite").on("click", function () {
    $("body").attr("style", "background-color:#fff");
  });
});
