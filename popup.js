document.addEventListener("DOMContentLoaded", function () {
    const popupLinks = document.querySelectorAll(".popup-link");

    popupLinks.forEach(function (link) {
        link.addEventListener("click", function (e) {
            e.preventDefault();
            const productName = link.getAttribute("data-name");

            // Создание попап-контейнера и контента
            const popupContainer = document.createElement("div");
            popupContainer.classList.add("popup-container");

            const popupContent = document.createElement("div");
            popupContent.classList.add("popup-content");

            // Заголовок попапа
            const heading = document.createElement("h2");
            heading.textContent = "Название товара:";
            popupContent.appendChild(heading);

            // Название товара
            const productNameElement = document.createElement("p");
            productNameElement.textContent = productName;
            productNameElement.style.color = "green"; // Зеленый цвет текста
            productNameElement.style.fontWeight = "bold"; // Жирный шрифт
            popupContent.appendChild(productNameElement);

            // Кнопка закрытия попапа
            const closeButton = document.createElement("span");
            closeButton.classList.add("popup-close");
            closeButton.textContent = "Закрыть";
            closeButton.style.color = "red"; // Красный цвет текста
            closeButton.style.cursor = "pointer";
            closeButton.style.position = "absolute";
            closeButton.style.top = "10px";
            closeButton.style.right = "10px";
            closeButton.style.fontSize = "18px";
            closeButton.addEventListener("click", function () {
                // Скрываем попап при клике на кнопку "Закрыть"
                popupContainer.style.display = "none";
            });
            popupContent.appendChild(closeButton);

            // Добавление контента в попап и попап в body
            popupContainer.appendChild(popupContent);
            document.body.appendChild(popupContainer);

            // Показываем попап
            popupContainer.style.display = "block";
        });
    });
});

/*


//попап тестовый огонь
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
*/