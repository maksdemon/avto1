document.addEventListener("DOMContentLoaded", function () {
    const popupLinks = document.querySelectorAll(".popup-link[data-popup]");

    popupLinks.forEach(function (link) {
        link.addEventListener("click", function (e) {
            e.preventDefault();
            const productName = link.getAttribute("data-name");
            const avgPrices = JSON.parse(link.getAttribute("data-avgprices"));

            // Создание попап-контейнера и контента
            const popupContainer = document.createElement("div");
            popupContainer.classList.add("popup-container", "larger-popup"); // Добавляем класс для увеличенного размера

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
            closeButton.innerHTML = "&#10006;"; // Используем символ "✖"
            closeButton.style.color = "red"; // Красный цвет текста
            closeButton.style.cursor = "pointer";
            closeButton.style.position = "absolute";
            closeButton.style.top = "10px";
            closeButton.style.right = "10px";
            closeButton.style.fontSize = "18px";
            closeButton.addEventListener("click", function () {
                // Скрываем попап при клике на крестик
                popupContainer.style.display = "none";
            });
            popupContent.appendChild(closeButton);

            // Создание элемента canvas для графика
            const popupChartCanvas = document.createElement("canvas");
            popupChartCanvas.id = "popupChart"; // Присваиваем id для графика

            // Добавляем canvas в контент попапа
            popupContent.appendChild(popupChartCanvas);

            // Добавление контента в попап и попап в body
            popupContainer.appendChild(popupContent);
            document.body.appendChild(popupContainer);

            // Показываем попап
            popupContainer.style.display = "block";

            // Создание графика внутри попапа
            var popupCanvas = document.getElementById('popupChart');
            if (popupCanvas) {
                // Преобразование дат в массив объектов Date
                const avgDates = avgPrices.map(function (priceData) {
                    return new Date(priceData.date_day);
                });

                // Получаем только значения цен из объектов цен
                const avgPricesValues = avgPrices.map(function (priceData) {
                    return priceData.avg_price;
                });

                // Создание графика внутри попапа
                var ctx = popupCanvas.getContext('2d');
                var myPopupChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: avgDates,
                        datasets: [{
                            label: 'Средняя цена',
                            data: avgPricesValues,
                            backgroundColor: 'rgba(75, 192, 192, 0.6)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: 'Средняя цена товара со временем',
                            position: 'top',
                            fontSize: 16,
                            padding: 20
                        },
                        scales: {
                            xAxes: [{
                                type: 'time',
                                time: {
                                    unit: 'day'
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            }
        });
    });
});
console.log(avgPrices);