const chartDashboardSales = document.getElementById("chartStatistik");
var currentDate = new Date();
var year = currentDate.getFullYear();
var month = currentDate.getMonth() + 1;
var date = currentDate.getDate();

var formattedDate =
    year +
    "-" +
    (month < 10 ? "0" + month : month) +
    "-" +
    (date < 10 ? "0" + date : date);

new Chart(chartDashboardSales, {
    type: "bar",
    data: {
        labels: [formattedDate],
        datasets: [
            {
                label: "Customers",
                data: [phpDataChart.customersTotal],
                backgroundColor: ["rgba(255, 87, 87, 0.8)"],
                borderWidth: 1,
            },
            {
                label: "Total",
                data: [phpDataChart.percentageSales],
                backgroundColor: ["rgba(87, 172, 255, 0.8)"],
            },
            {
                label: "Projects",
                data: [phpDataChart.projectsTotal],
                backgroundColor: ["rgba(60,179,113, 0.8)"],
            },
        ],
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
            },
        },
    },
});

// ===========================

const chartAreaStatistik = document.getElementById("chartStatistikArea");

new Chart(chartAreaStatistik, {
    type: "doughnut",
    data: {
        labels: ["Red", "Blue", "Yellow"],
        datasets: [
            {
                label: "My First Dataset",
                data: [300, 50, 100],
                backgroundColor: [
                    "rgb(255, 99, 132)",
                    "rgb(54, 162, 235)",
                    "rgb(255, 205, 86)",
                ],
                hoverOffset: 4,
                weight: 5,
            },
        ],
    },
});
