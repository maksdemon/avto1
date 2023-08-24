

// Создаем контекст для третьего графика
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