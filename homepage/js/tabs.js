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
