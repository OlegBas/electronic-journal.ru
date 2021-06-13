
$(function () {

  $(".buttonBack").on("click", function (e) {
    history.back();
  });
  // console.log('Активная вкладка'+localStorage.getItem('activeTab'));
  $("a[href='"+localStorage.getItem('activeTab')+"']").tab('show');


  $('[data-toggle="tab"]').on('show.bs.tab', function (e) {
    let hrefActiveTab = $(e.target).attr('href'); // активная вкладка
    localStorage.setItem('activeTab',hrefActiveTab);
    console.log('Активирована новая вкладка '+hrefActiveTab);
  });


  let isVersionShow = false;
  $("#version").hide();
  $("#toggleVersion").on("click", function () {
    if (!isVersionShow) {
      $("#version").show();
      isVersionShow = true;
    } else {
      $("#version").hide();
      isVersionShow = false;
    }
  });

  $("#zoomIn").on("click", function () {
    $("#contentPage p,#contentPage  a, td,th").attr("style", "font-size:25px");
  });
  $("#zoomOut").on("click", function () {
    $("#contentPage p,#contentPage  a, td,th").attr("style", "font-size:14px");
  });
  $("#bgWhite").on("click", function () {
    $("body").attr("style", "background-color:#fff");
  });
});
