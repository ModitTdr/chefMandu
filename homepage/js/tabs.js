var tabs = document.querySelectorAll(".tabs li");
var content = document.querySelectorAll(".tabs-data");
tabs.forEach((i, index) => {
  i.addEventListener("click", function () {
    // removes all the active tabs
    tabs.forEach((tab) => {
      tab.classList.remove("active");
    });
    // actives a specific tab
    i.classList.add("active");

    // removes all the active content
    content.forEach((c) => {
      c.classList.remove("active");
    });
    // actives a specific conten
    content[index].classList.add("active");
  });
});
//set a default active
tabs[0].click();

var createRecipe = document.querySelector(".dash-header-infos button");
createRecipe.addEventListener("click", function () {
  tabs.forEach((tab) => {
    tab.classList.remove("active");
  });
  // actives a specific tab
  tabs[1].classList.add("active");

  // removes all the active content
  content.forEach((c) => {
    c.classList.remove("active");
  });
  // actives a specific conten
  content[1].classList.add("active");
});

//for alert message
var alert = document.querySelector(".status");
//add prod
if (alertMsg == "tab2" || alertMsg == "tab2Failed") {
  tabs[1].click();
}
//dashboard - user list alert
if (alertMsg == "tab3" || alertMsg == "tab3Failed") {
  tabs[2].click();
}
//dashboard - product alert
if (alertMsg == "tab4" || alertMsg == "tab4Failed") {
  tabs[tabs.length - 2].click();
}
