document.addEventListener("DOMContentLoaded", function () {
    const popupLinks = document.querySelectorAll(".popup-link");

    popupLinks.forEach(function (link) {
        link.addEventListener("click", function (e) {
            e.preventDefault();
            const productName = link.getAttribute("data-name");
            alert("Тестовый попап с названием: " + productName);
        });
    });
});
