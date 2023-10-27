// CHART PIE
var ctx = document.getElementById("chartSales").getContext("2d");
var myChart = new Chart(ctx, {
    type: "pie",
    data: {
        labels: [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "july",
            "agustus",
            "september",
            "october",
            "novermber",
            "december",
        ],
        datasets: [
            {
                label: "Sales SpareParts",
                data: [12, 19, 3, 5, 2, 3, 8, 9, 10, 11, 4, 5, 6],
                backgroundColor: [
                    "#186F65",
                    "#1F618D",
                    "#F1C40F",
                    "#27AE60",
                    "#884EA0",
                    "#D35400",
                    "#D80032",
                    "#BEADFA",
                    "#FFCC70",
                    "#94A684",
                    "#5C5470",
                    "#ACFADF",
                ],
                borderWidth: 2,
            },
        ],
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
            },
        },
        layout: {
            padding: 20,
        },
    },
});

// CHART LINE
const ctxLines = document.getElementById("chartSalesLine");

new Chart(ctxLines, {
    type: "line",
    data: {
        labels: [
            "Jan",
            "Feb",
            "Mar",
            "Jun",
            "Jul",
            "Aug",
            "sep",
            "Oct",
            "Nov",
            "Des",
        ],
        datasets: [
            {
                label: "Trafo Inquiry",
                data: [12, 19, 3, 5, 2, 3, 9, 1, 5, 6.5],
                borderWidth: 1,
                borderColor: "#22668D",
                backgroundColor: "#22668D",
            },
            {
                label: "SpareParts",
                data: [65, 59, 80, 81, 56, 55, 40],
                fill: false,
                borderColor: "#C70039",
                backgroundColor: "#C70039",
                borderWidth: 1,
            },
            {
                label: "Oil Lab",
                data: [89, 19, 20, 41, 46, 35, 20],
                fill: false,
                borderColor: "#FFC436",
                backgroundColor: "#FFC436",
                borderWidth: 1,
            },
        ],
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
            },
        },
        layout: {
            padding: 20,
        },
    },
});
// TOAST SUCCESS
