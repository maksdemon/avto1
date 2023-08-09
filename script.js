// Получите данные из атрибутов data-*
var canvas2 = document.getElementById('myChart2');
var names2 = JSON.parse(canvas2.getAttribute('data-names'));
var prices2 = JSON.parse(canvas2.getAttribute('data-prices'));

// Создайте график
var ctx2 = canvas2.getContext('2d');
var myChart2 = new Chart(ctx2, {
    type: 'bar',
    data: {
        labels: names2,
        datasets: [{
            label: 'Цена',
            data: prices2,
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
            text: 'Цена товаров',
            position: 'top',
            fontSize: 16,
            padding: 20
        },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

// Создаем контекст для третьего графика
var canvas3 = document.getElementById('myChart3');
var avgPrices3 = JSON.parse(canvas3.getAttribute('data-prices3'));
var avgDates3 = JSON.parse(canvas3.getAttribute('data-dates3'));

// Преобразование дат в массив объектов Date
avgDates3 = avgDates3.map(function(dateString) {
    return new Date(dateString);
});

// Создание третьего графика
// Получение данных для графика myChart3
var canvas3 = document.getElementById('myChart3');
var avgPrices3 = JSON.parse(canvas3.getAttribute('data-prices3'));
var avgDates3 = JSON.parse(canvas3.getAttribute('data-dates3'));

// Преобразование дат в массив объектов Date
avgDates3 = avgDates3.map(function(dateString) {
    return new Date(dateString);
});

// Создание третьего графика
var ctx3 = canvas3.getContext('2d');
var myChart3 = new Chart(ctx3, {
    type: 'bar',
    data: {
        labels: avgDates3,
        datasets: [{
            label: 'Средняя цена',
            data: avgPrices3,
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
