"use strict";

/* ===== Enable Bootstrap Popover (on element  ====== */

var popoverTriggerList = [].slice.call(
  document.querySelectorAll('[data-toggle="popover"]')
);
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl);
});

/* ==== Enable Bootstrap Alert ====== */
var alertList = document.querySelectorAll(".alert");
alertList.forEach(function (alert) {
  new bootstrap.Alert(alert);
});

/* ===== Responsive Sidepanel ====== */
const sidePanelToggler = document.getElementById("sidepanel-toggler");
const sidePanel = document.getElementById("app-sidepanel");
const sidePanelDrop = document.getElementById("sidepanel-drop");
const sidePanelClose = document.getElementById("sidepanel-close");

window.addEventListener("load", function () {
  responsiveSidePanel();
});

window.addEventListener("resize", function () {
  responsiveSidePanel();
});

function responsiveSidePanel() {
  let w = window.innerWidth;
  if (w >= 1200) {
    // if larger
    //console.log('larger');
    sidePanel.classList.remove("sidepanel-hidden");
    sidePanel.classList.add("sidepanel-visible");
  } else {
    // if smaller
    //console.log('smaller');
    sidePanel.classList.remove("sidepanel-visible");
    sidePanel.classList.add("sidepanel-hidden");
  }
}

sidePanelToggler.addEventListener("click", () => {
  if (sidePanel.classList.contains("sidepanel-visible")) {
    console.log("visible");
    sidePanel.classList.remove("sidepanel-visible");
    sidePanel.classList.add("sidepanel-hidden");
  } else {
    console.log("hidden");
    sidePanel.classList.remove("sidepanel-hidden");
    sidePanel.classList.add("sidepanel-visible");
  }
});

sidePanelClose.addEventListener("click", (e) => {
  e.preventDefault();
  sidePanelToggler.click();
});

sidePanelDrop.addEventListener("click", (e) => {
  sidePanelToggler.click();
});

/* ====== Mobile search ======= */
const searchMobileTrigger = document.querySelector(".search-mobile-trigger");
const searchBox = document.querySelector(".app-search-box");

searchMobileTrigger.addEventListener("click", () => {
  searchBox.classList.toggle("is-visible");

  let searchMobileTriggerIcon = document.querySelector(
    ".search-mobile-trigger-icon"
  );

  if (searchMobileTriggerIcon.classList.contains("fa-search")) {
    searchMobileTriggerIcon.classList.remove("fa-search");
    searchMobileTriggerIcon.classList.add("fa-times");
  } else {
    searchMobileTriggerIcon.classList.remove("fa-times");
    searchMobileTriggerIcon.classList.add("fa-search");
  }
});

(($) => {
  $(function () {
    $(".js-btn-product-delete").on("click", function (event) {
      event.preventDefault();
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (!result.isConfirmed) return;
        const id = $(this).data("id");
        fetch(`/admin/products/${id}`, {
          method: "delete",
        })
            .then((res) => res.json())
            .then((ret) => {
              if (ret.error) {
                Swal.fire("Failed!", ret.error, "danger");
              } else {
                Swal.fire(
                    "Deleted!",
                    "Product has been deleted.",
                    "success"
                ).then(() => window.location.reload());
              }
            });
      });
    });
    $(".js-btn-user-delete").on("click", function (event) {
      event.preventDefault();
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (!result.isConfirmed) return;
        const id = $(this).data("id");
        fetch(`/admin/users/${id}`, {
          method: "delete",
        })
          .then((res) => res.json())
          .then((ret) => {
            if (ret.error) {
              Swal.fire("Failed!", ret.error, "danger");
            } else {
              Swal.fire(
                "Deleted!",
                "User has been deleted.",
                "success"
              ).then(() => window.location.reload());
            }
          });
      });
    });
  });
})(jQuery);
