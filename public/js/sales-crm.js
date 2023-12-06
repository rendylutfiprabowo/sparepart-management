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

// =============Line Chart==============

var ctx = document.getElementById("chartStatistikLine").getContext("2d");

var monthlyData = {
    labels: ["Month 1", "Month 2", "Month 3", "Month 4", "Month 5", "Month 6"],
    datasets: [
        {
            label: "SpareParts",
            data: [phpLineChartData.totalOrderSP, 0, 0, 0, 0, 0], // Menggunakan nilai yang benar
            borderColor: "rgba(245, 63, 39, 0.8)",
            borderWidth: 1,
        },
        {
            label: "Oil",
            data: [10, 50, 85, 20, 10], // Menggunakan nilai yang benar
            borderColor: "rgba(59, 166, 218, 0.8)",
            borderWidth: 1,
        },
    ],
};

var myLineChart = new Chart(ctx, {
    type: "line",
    data: monthlyData,
    options: {
        scales: {
            x: {
                type: "category",
                labels: monthlyData.labels,
            },
            y: {
                beginAtZero: true,
            },
        },
    },
});
