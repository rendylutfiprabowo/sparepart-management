"use strict";
!(function () {
    let e,
        o,
        t,
        r,
        s,
        n,
        i,
        a = config.colors_label.primary;
    var l = {
            donut: {
                series1: config.colors.primary,
                series2: "#9055fdb3",
                series3: "#9055fd80",
            },
            donut2: {
                series1: config.colors.success,
                series2: "#56ca00cc",
                series3: "#56ca0099",
                series4: "#56ca0066",
            },
            line: {
                series1: config.colors.warning,
                series2: config.colors.primary,
                series3: "#7367f029",
            },
        },
        c =
            ((i = isDarkStyle
                ? ((e = config.colors_dark.cardColor),
                  (o = config.colors_dark.textMuted),
                  (t = config.colors_dark.headingColor),
                  (r = config.colors_dark.borderColor),
                  (s = config.colors_dark.chartBgColor),
                  (n = config.colors_dark.bodyColor),
                  "dark")
                : ((e = config.colors.cardColor),
                  (o = config.colors.textMuted),
                  (t = config.colors.headingColor),
                  (r = config.colors.borderColor),
                  (s = config.colors.chartBgColor),
                  (n = config.colors.bodyColor),
                  "light")),
            document.querySelector("#totalProfitChart")),
        h = {
            chart: {
                type: "bar",
                height: 260,
                parentHeightOffset: 0,
                stacked: !0,
                toolbar: { show: !1 },
            },
            series: [
                { name: "Revenue", data: [29, 22, 25, 19, 29, 20, 35] },
                { name: "Transactions", data: ["", 16, 11, 16, "", 13, 10] },
                { name: "Total Profit", data: ["", "", "", 14, "", 12, 12] },
            ],
            plotOptions: {
                bar: {
                    horizontal: !1,
                    columnWidth: "35%",
                    borderRadius: 10,
                    startingShape: "rounded",
                    endingShape: "rounded",
                },
            },
            dataLabels: { enabled: !1 },
            stroke: {
                curve: "smooth",
                width: 6,
                lineCap: "round",
                colors: [e],
            },
            legend: { show: !1 },
            colors: [
                config.colors.primary,
                config.colors.success,
                config.colors.secondary,
            ],
            grid: {
                strokeDashArray: 8,
                borderColor: r,
                padding: { top: -10, left: 15, right: -15, bottom: -10 },
            },
            xaxis: {
                categories: [
                    "2015",
                    "2016",
                    "2017",
                    "2018",
                    "2019",
                    "2020",
                    "2021",
                ],
                tickPlacement: "on",
                labels: {
                    show: !0,
                    style: {
                        fontSize: "0.75rem",
                        fontFamily: "Inter",
                        colors: o,
                    },
                },
                axisBorder: { show: !1 },
                axisTicks: { show: !1 },
            },
            yaxis: {
                min: 0,
                max: 60,
                show: !0,
                tickAmount: 6,
                labels: {
                    formatter: function (e) {
                        return parseInt(e) + "K";
                    },
                    style: {
                        fontSize: "0.75rem",
                        fontFamily: "Inter",
                        colors: o,
                    },
                },
            },
            states: {
                hover: { filter: { type: "none" } },
                active: { filter: { type: "none" } },
            },
            responsive: [
                {
                    breakpoint: 1441,
                    options: { plotOptions: { bar: { columnWidth: "50%" } } },
                },
                {
                    breakpoint: 1200,
                    options: { plotOptions: { bar: { columnWidth: "35%" } } },
                },
                {
                    breakpoint: 1025,
                    options: { plotOptions: { bar: { columnWidth: "45%" } } },
                },
                {
                    breakpoint: 767,
                    options: { plotOptions: { bar: { columnWidth: "35%" } } },
                },
                {
                    breakpoint: 555,
                    options: { plotOptions: { bar: { columnWidth: "45%" } } },
                },
                {
                    breakpoint: 450,
                    options: {
                        chart: { height: 200, offsetX: -10 },
                        plotOptions: { bar: { columnWidth: "55%" } },
                        xaxis: { labels: { rotate: 315, rotateAlways: !0 } },
                    },
                },
                {
                    breakpoint: 360,
                    options: { plotOptions: { bar: { columnWidth: "75%" } } },
                },
            ],
        },
        c =
            (null !== c && new ApexCharts(c, h).render(),
            document.querySelector("#totalVisitorsChart")),
        h = {
            chart: { height: 290, parentHeightOffset: 0, type: "donut" },
            labels: ["FR", "UK", "ESP", "USA"],
            series: [13, 25, 12, 50],
            colors: [l.donut.series1, l.donut.series2, l.donut.series3, s],
            stroke: { width: 0 },
            dataLabels: {
                enabled: !1,
                formatter: function (e, o) {
                    return parseInt(e) + "%";
                },
            },
            legend: {
                show: !0,
                position: "bottom",
                offsetY: 7,
                markers: { width: 10, height: 10, offsetX: -3 },
                itemMargin: { horizontal: 10, vertical: 5 },
                fontSize: "13px",
                fontFamily: "Inter",
                fontWeight: 400,
                labels: { colors: t, useSeriesColors: !1 },
            },
            tooltip: { style: { color: config.colors.white } },
            grid: { padding: { top: 15 } },
            plotOptions: {
                pie: {
                    donut: {
                        size: "70%",
                        labels: {
                            show: !0,
                            value: {
                                fontSize: "26px",
                                fontFamily: "Inter",
                                color: t,
                                fontWeight: 500,
                                offsetY: -20,
                                formatter: function (e) {
                                    return parseInt(e) + "%";
                                },
                            },
                            name: {
                                offsetY: 20,
                                fontFamily: "Inter",
                                color: n,
                            },
                            total: {
                                show: !0,
                                fontSize: ".7rem",
                                label: "Weekly Vsits",
                                color: n,
                                formatter: function (e) {
                                    return "100%";
                                },
                            },
                        },
                    },
                },
            },
            responsive: [
                { breakpoint: 420, options: { chart: { height: 300 } } },
            ],
        },
        c =
            (null !== c && new ApexCharts(c, h).render(),
            document.querySelector("#weeklySalesChart")),
        h = {
            chart: {
                height: 250,
                type: "bar",
                parentHeightOffset: 0,
                toolbar: { show: !1 },
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    distributed: !0,
                    columnWidth: "60%",
                    endingShape: "rounded",
                    startingShape: "rounded",
                },
            },
            series: [{ data: [38, 55, 48, 65, 80, 38, 48] }],
            tooltip: { enabled: !1 },
            legend: { show: !1 },
            dataLabels: { enabled: !1 },
            colors: [a, a, a, a, config.colors.primary, a, a],
            grid: { show: !1, padding: { top: -15, left: -7, right: -4 } },
            states: {
                hover: { filter: { type: "none" } },
                active: { filter: { type: "none" } },
            },
            xaxis: {
                axisTicks: { show: !1 },
                axisBorder: { show: !1 },
                categories: ["S", "M", "T", "W", "T", "F", "S"],
                labels: { style: { colors: n } },
            },
            yaxis: { show: !1 },
            responsive: [
                { breakpoint: 1025, options: { chart: { height: 210 } } },
            ],
        },
        c =
            (null !== c && new ApexCharts(c, h).render(),
            document.querySelector("#totalRevenueChart")),
        h = {
            series: [71, 78, 86],
            chart: { height: 274, type: "radialBar" },
            grid: { padding: { top: -10, left: -20, right: -20, bottom: -20 } },
            plotOptions: {
                radialBar: {
                    hollow: { size: "45%" },
                    track: { margin: 10, show: !1 },
                    dataLabels: {
                        name: {
                            offsetY: 25,
                            fontSize: "0.75rem",
                            fontFamily: "Inter",
                            fontWeight: 400,
                            color: n,
                        },
                        value: {
                            offsetY: -12,
                            fontWeight: 500,
                            fontSize: "2.125rem",
                            fontFamily: "Inter",
                            color: t,
                            formatter: function (e) {
                                return parseInt(e) + "K";
                            },
                        },
                        total: {
                            show: !0,
                            label: "2021",
                            fontSize: "0.75rem",
                            fontFamily: "Inter",
                            fontWeight: 400,
                            color: n,
                            formatter: function (e) {
                                return "89K";
                            },
                        },
                    },
                },
            },
            stroke: { lineCap: "round" },
            colors: [
                config.colors.primary,
                config.colors.success,
                config.colors.warning,
            ],
            labels: ["New User", "Returning", "Referrals"],
        },
        c =
            (null !== c && new ApexCharts(c, h).render(),
            document.querySelector("#weeklyOverviewChart")),
        h = {
            chart: {
                type: "bar",
                height: 200,
                offsetY: -9,
                offsetX: -16,
                parentHeightOffset: 0,
                toolbar: { show: !1 },
            },
            series: [{ name: "Sales", data: [32, 55, 45, 75, 55, 35, 70] }],
            colors: [s],
            plotOptions: {
                bar: {
                    borderRadius: 10,
                    columnWidth: "30%",
                    endingShape: "rounded",
                    startingShape: "rounded",
                    colors: {
                        ranges: [
                            { from: 75, to: 80, color: config.colors.primary },
                            { from: 0, to: 73, color: s },
                        ],
                    },
                },
            },
            dataLabels: { enabled: !1 },
            legend: { show: !1 },
            grid: {
                strokeDashArray: 8,
                borderColor: r,
                padding: { bottom: -10 },
            },
            xaxis: {
                categories: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                tickPlacement: "on",
                labels: { show: !1 },
                axisBorder: { show: !1 },
                axisTicks: { show: !1 },
            },
            yaxis: {
                min: 0,
                max: 90,
                show: !0,
                tickAmount: 3,
                labels: {
                    formatter: function (e) {
                        return parseInt(e) + "K";
                    },
                    style: {
                        fontSize: "0.75rem",
                        fontFamily: "Inter",
                        colors: o,
                    },
                },
            },
            states: {
                hover: { filter: { type: "none" } },
                active: { filter: { type: "none" } },
            },
        },
        c =
            (null !== c && new ApexCharts(c, h).render(),
            document.querySelector("#performanceChart")),
        h = {
            chart: {
                height: 310,
                type: "radar",
                offsetY: 10,
                toolbar: { show: !1 },
            },
            legend: {
                show: !0,
                position: "bottom",
                markers: { width: 10, height: 10, offsetX: -2 },
                itemMargin: { horizontal: 10 },
                fontFamily: "Inter",
                fontSize: "12px",
                labels: { colors: n, useSeriesColors: !1 },
            },
            plotOptions: {
                radar: { polygons: { strokeColors: r, connectorColors: r } },
            },
            yaxis: { show: !1 },
            series: [
                { name: "Income", data: [70, 90, 80, 95, 75, 90] },
                { name: "Net Worth", data: [110, 78, 95, 85, 95, 78] },
            ],
            colors: [config.colors.primary, config.colors.info],
            xaxis: {
                categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
                labels: {
                    show: !0,
                    style: {
                        colors: [o, o, o, o, o, o],
                        fontSize: "14px",
                        fontFamily: "Inter",
                        fontWeight: 400,
                    },
                },
            },
            fill: { opacity: [1, 0.9] },
            stroke: { show: !1, width: 0 },
            markers: { size: 0 },
            grid: { show: !1, padding: { bottom: -10 } },
        },
        c =
            (null !== c && new ApexCharts(c, h).render(),
            document.querySelector("#AnalyticsChart")),
        h = {
            chart: {
                type: "bar",
                height: 200,
                parentHeightOffset: 0,
                stacked: !0,
                toolbar: { show: !1 },
            },
            series: [
                {
                    name: "Revenue",
                    data: [16e3, 12e3, 16e3, 18e3, 15e3, 35e3, 16e3],
                },
                {
                    name: "Transactions",
                    data: [1e4, 12e3, 1e4, "", 1e4, 1e4, 1e4],
                },
                {
                    name: "Total Profit",
                    data: ["", 15e3, "", "", 12e3, "", 1e4],
                },
            ],
            plotOptions: {
                bar: {
                    horizontal: !1,
                    columnWidth: "40%",
                    borderRadius: 10,
                    startingShape: "rounded",
                    endingShape: "rounded",
                },
            },
            dataLabels: { enabled: !1 },
            stroke: {
                curve: "smooth",
                width: 6,
                lineCap: "round",
                colors: [e],
            },
            legend: { show: !1 },
            colors: [
                config.colors.success,
                config.colors.secondary,
                config.colors.warning,
            ],
            grid: {
                strokeDashArray: 10,
                borderColor: r,
                padding: { top: -20, left: -4, right: -5, bottom: 5 },
            },
            xaxis: {
                categories: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                labels: { show: !1 },
                axisBorder: { show: !1 },
                axisTicks: { show: !1 },
            },
            yaxis: { show: !1 },
            states: {
                hover: { filter: { type: "none" } },
                active: { filter: { type: "none" } },
            },
            responsive: [
                {
                    breakpoint: 1441,
                    options: { plotOptions: { bar: { columnWidth: "50%" } } },
                },
                {
                    breakpoint: 1200,
                    options: { plotOptions: { bar: { columnWidth: "35%" } } },
                },
                {
                    breakpoint: 992,
                    options: { plotOptions: { bar: { columnWidth: "45%" } } },
                },
                {
                    breakpoint: 768,
                    options: { plotOptions: { bar: { columnWidth: "35%" } } },
                },
                {
                    breakpoint: 500,
                    options: { plotOptions: { bar: { columnWidth: "50%" } } },
                },
            ],
        },
        c =
            (null !== c && new ApexCharts(c, h).render(),
            document.querySelector("#salesStateChart")),
        h = {
            chart: {
                height: 280,
                type: "area",
                parentHeightOffset: 0,
                offsetY: -8,
                toolbar: { show: !1 },
            },
            tooltip: { enabled: !1 },
            dataLabels: { enabled: !1 },
            stroke: { width: 5, curve: "smooth" },
            series: [{ data: [35, 180, 100, 300, 220, 400] }],
            grid: { show: !1, padding: { left: -10, top: -10, right: 0 } },
            fill: {
                type: "gradient",
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.7,
                    opacityTo: 0.9,
                    stops: [0, 100],
                    colorStops: [
                        [
                            {
                                offset: 10,
                                opacity: 0.6,
                                color: config.colors.primary,
                            },
                            { offset: 150, opacity: 0.2, color: e },
                        ],
                    ],
                },
            },
            theme: {
                monochrome: {
                    enabled: !0,
                    shadeTo: "light",
                    shadeIntensity: 1,
                    color: config.colors.primary,
                },
            },
            xaxis: {
                type: "numeric",
                labels: { show: !1 },
                axisTicks: { show: !1 },
                axisBorder: { show: !1 },
            },
            yaxis: { show: !1 },
            markers: {
                size: 1,
                offsetY: 2,
                offsetX: -9,
                strokeWidth: 4,
                strokeOpacity: 1,
                colors: ["transparent"],
                strokeColors: "transparent",
                discrete: [
                    {
                        size: 8,
                        seriesIndex: 0,
                        dataPointIndex: 5,
                        strokeColor: config.colors.primary,
                        fillColor: e,
                    },
                ],
            },
            responsive: [
                { breakpoint: 1200, options: { chart: { height: 255 } } },
            ],
        },
        c =
            (null !== c && new ApexCharts(c, h).render(),
            document.querySelector("#totalProfitRadialBarChart")),
        h = {
            series: [77],
            chart: {
                height: 350,
                type: "radialBar",
                offsetY: -30,
                sparkline: { enabled: !0 },
            },
            plotOptions: {
                radialBar: {
                    hollow: { size: "55%" },
                    startAngle: -90,
                    endAngle: 90,
                    dataLabels: {
                        name: { show: !1 },
                        value: {
                            offsetY: -8,
                            fontSize: "1.25rem",
                            fontWeight: 500,
                            fontFamily: "Inter",
                            color: t,
                            formatter: function (e) {
                                return "28.2k";
                            },
                        },
                    },
                    track: { background: s },
                },
            },
            states: {
                hover: { filter: { type: "none" } },
                active: { filter: { type: "none" } },
            },
            stroke: { dashArray: 6 },
            colors: [config.colors.primary],
            labels: ["New Sales"],
            responsive: [
                { breakpoint: 1600, options: { chart: { height: 250 } } },
                { breakpoint: 1199, options: { chart: { height: 330 } } },
            ],
        },
        c =
            (null !== c && new ApexCharts(c, h).render(),
            document.querySelector("#totalSalesChart")),
        h = {
            chart: {
                type: "line",
                height: 210,
                parentHeightOffset: 0,
                toolbar: { show: !1 },
            },
            series: [{ data: [0, 90, 10, 80, 50, 130] }],
            tooltip: { enabled: !1 },
            stroke: { curve: "smooth", width: 5, lineCap: "round" },
            legend: { show: !1 },
            grid: { show: !1, padding: { top: -15 } },
            colors: [config.colors.success],
            fill: {
                type: "gradient",
                gradient: {
                    shade: "dark",
                    gradientToColors: [e],
                    shadeIntensity: 1,
                    inverseColors: !1,
                    type: "horizontal",
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 100],
                },
            },
            xaxis: {
                categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
                labels: {
                    style: {
                        colors: n,
                        fontFamily: "Inter",
                        fontSize: "0.937rem",
                        fontWeight: 400,
                    },
                },
                axisBorder: { show: !1 },
                axisTicks: { show: !1 },
            },
            yaxis: { show: !1 },
        },
        c =
            (null !== c && new ApexCharts(c, h).render(),
            document.querySelector("#totalVisitsChart")),
        h = {
            chart: {
                height: 200,
                type: "radialBar",
                sparkline: { enabled: !0 },
            },
            plotOptions: {
                radialBar: {
                    hollow: { size: "60%" },
                    startAngle: -180,
                    endAngle: 180,
                    dataLabels: {
                        value: {
                            fontSize: "1.5rem",
                            fontFamily: "Inter",
                            color: t,
                            fontWeight: 500,
                            offsetY: -20,
                            formatter: function (e) {
                                return parseInt(e) + "%";
                            },
                        },
                        name: {
                            offsetY: 20,
                            fontSize: "0.875rem",
                            fontFamily: "Inter",
                            color: n,
                        },
                    },
                    track: { background: s },
                },
            },
            states: {
                hover: { filter: { type: "none" } },
                active: { filter: { type: "none" } },
            },
            stroke: { lineCap: "round" },
            colors: [config.colors.info],
            fill: {
                type: "gradient",
                gradient: {
                    shade: "dark",
                    gradientToColors: [s],
                    shadeIntensity: 1,
                    type: "horizontal",
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 90, 100],
                },
            },
            grid: { padding: { top: -15 } },
            series: [78],
            labels: ["Growth"],
        },
        c =
            (null !== c && new ApexCharts(c, h).render(),
            document.querySelector("#revenueReportChart")),
        h = {
            series: [
                { name: "Earning", data: [7, 10, 18, 16, 7, 3, 10, 14, 4] },
                {
                    name: "Expense",
                    data: [-9, -5, -3, -12, -8, -3, -5, -5, -8],
                },
            ],
            chart: {
                height: 225,
                parentHeightOffset: 0,
                stacked: !0,
                type: "bar",
                toolbar: { show: !1 },
            },
            tooltip: { enabled: !1 },
            legend: {
                show: !0,
                position: "bottom",
                offsetY: 10,
                markers: { width: 10, height: 10, radius: 12, offsetX: -3 },
                itemMargin: { horizontal: 15, vertical: 5 },
                fontSize: "13px",
                fontFamily: "Inter",
                fontWeight: 400,
                labels: { colors: n, useSeriesColors: !1 },
            },
            plotOptions: {
                bar: {
                    horizontal: !1,
                    columnWidth: "30%",
                    borderRadius: 5,
                    startingShape: "rounded",
                    endingShape: "rounded",
                },
            },
            colors: [config.colors.success, config.colors.secondary],
            dataLabels: { enabled: !1 },
            grid: { show: !1, padding: { top: -20, left: -10 } },
            xaxis: {
                labels: { show: !1 },
                axisTicks: { show: !1 },
                axisBorder: { show: !1 },
            },
            yaxis: { labels: { show: !1 } },
            responsive: [
                { breakpoint: 1197, options: { chart: { height: 280 } } },
                { breakpoint: 783, options: { chart: { height: 250 } } },
                {
                    breakpoint: 768,
                    options: { plotOptions: { bar: { columnWidth: "20%" } } },
                },
                { breakpoint: 520, options: { chart: { height: 200 } } },
            ],
            states: {
                hover: { filter: { type: "none" } },
                active: { filter: { type: "none" } },
            },
        },
        c =
            (null !== c && new ApexCharts(c, h).render(),
            document.querySelector("#salesOverviewChart")),
        h = {
            chart: { height: 250, parentHeightOffset: 0, type: "donut" },
            labels: ["Apparel", "Electronics", "FMCG", "Other Sales"],
            series: [12, 25, 13, 50],
            colors: [l.donut.series1, l.donut.series2, l.donut.series3, s],
            stroke: { width: 0 },
            dataLabels: { enabled: !1 },
            legend: { show: !1 },
            tooltip: { style: { color: config.colors.white } },
            grid: { padding: { top: 15 } },
            plotOptions: {
                pie: {
                    donut: {
                        size: "70%",
                        labels: {
                            show: !0,
                            value: {
                                fontSize: "26px",
                                fontFamily: "Inter",
                                color: t,
                                fontWeight: 500,
                                offsetY: -20,
                                formatter: function (e) {
                                    return parseInt(e) + "k";
                                },
                            },
                            name: {
                                offsetY: 20,
                                fontFamily: "Inter",
                                color: n,
                            },
                            total: {
                                show: !0,
                                fontSize: ".7rem",
                                label: "Weekly Vsits",
                                color: n,
                                formatter: function (e) {
                                    return "102k";
                                },
                            },
                        },
                    },
                },
            },
            responsive: [
                { breakpoint: 1399, options: { chart: { height: 200 } } },
                { breakpoint: 420, options: { chart: { height: 300 } } },
            ],
        };
    null !== c && new ApexCharts(c, h).render();
    const d = document.querySelector("#horizontalBarChart"),
        p = {
            chart: { height: 270, type: "bar", toolbar: { show: !1 } },
            plotOptions: {
                bar: {
                    horizontal: !0,
                    barHeight: "70%",
                    distributed: !0,
                    startingShape: "rounded",
                    borderRadius: 7,
                },
            },
            grid: {
                strokeDashArray: 10,
                borderColor: r,
                xaxis: { lines: { show: !0 } },
                yaxis: { lines: { show: !1 } },
                padding: { top: -35, bottom: -12 },
            },
            colors: [
                config.colors.primary,
                config.colors.info,
                config.colors.success,
                config.colors.secondary,
                config.colors.danger,
                config.colors.warning,
            ],
            dataLabels: {
                enabled: !0,
                style: {
                    colors: ["#fff"],
                    fontWeight: 200,
                    fontSize: "13px",
                    fontFamily: "Inter",
                },
                formatter: function (e, o) {
                    return p.labels[o.dataPointIndex];
                },
                offsetX: 0,
                dropShadow: { enabled: !1 },
            },
            labels: [
                "UI Design",
                "UX Design",
                "Music",
                "Animation",
                "React",
                "SEO",
            ],
            series: [{ data: [35, 20, 14, 12, 10, 9] }],
            xaxis: {
                categories: ["6", "5", "4", "3", "2", "1"],
                axisBorder: { show: !1 },
                axisTicks: { show: !1 },
                labels: {
                    style: { colors: o, fontSize: "13px" },
                    formatter: function (e) {
                        return e + "%";
                    },
                },
            },
            yaxis: {
                max: 35,
                labels: {
                    style: {
                        colors: [o],
                        fontFamily: "Inter",
                        fontSize: "13px",
                    },
                },
            },
            tooltip: {
                enabled: !0,
                style: { fontSize: "12px" },
                onDatasetHover: { highlightDataSeries: !1 },
                custom: function ({
                    series: e,
                    seriesIndex: o,
                    dataPointIndex: t,
                }) {
                    return (
                        '<div class="px-3 py-2"><span>' +
                        e[o][t] +
                        "%</span></div>"
                    );
                },
            },
            legend: { show: !1 },
        };
    null !== d && new ApexCharts(d, p).render();
    (c = document.querySelector("#shipmentStatisticsChart")),
        (h = {
            series: [
                {
                    name: "Shipment",
                    type: "column",
                    data: [38, 45, 33, 38, 32, 50, 48, 40, 42, 37],
                },
                {
                    name: "Delivery",
                    type: "line",
                    data: [23, 28, 23, 32, 28, 44, 32, 38, 26, 34],
                },
            ],
            chart: {
                height: 270,
                type: "line",
                stacked: !1,
                parentHeightOffset: 0,
                toolbar: { show: !1 },
                zoom: { enabled: !1 },
            },
            markers: {
                size: 4,
                colors: [config.colors.white],
                strokeColors: l.line.series2,
                hover: { size: 6 },
                borderRadius: 4,
            },
            stroke: { curve: "smooth", width: [0, 3], lineCap: "round" },
            legend: {
                show: !0,
                position: "bottom",
                markers: { width: 8, height: 8, offsetX: -3 },
                height: 40,
                offsetY: 10,
                itemMargin: { horizontal: 10, vertical: 0 },
                fontSize: "15px",
                fontFamily: "Inter",
                fontWeight: 400,
                labels: { colors: t, useSeriesColors: !1 },
                offsetY: 10,
            },
            grid: { strokeDashArray: 8 },
            colors: [l.line.series1, l.line.series2],
            fill: { opacity: [1, 1] },
            plotOptions: {
                bar: {
                    columnWidth: "30%",
                    startingShape: "rounded",
                    endingShape: "rounded",
                    borderRadius: 4,
                },
            },
            dataLabels: { enabled: !1 },
            xaxis: {
                tickAmount: 10,
                categories: [
                    "1 Jan",
                    "2 Jan",
                    "3 Jan",
                    "4 Jan",
                    "5 Jan",
                    "6 Jan",
                    "7 Jan",
                    "8 Jan",
                    "9 Jan",
                    "10 Jan",
                ],
                labels: {
                    style: {
                        colors: o,
                        fontSize: "13px",
                        fontFamily: "Inter",
                        fontWeight: 400,
                    },
                },
                axisBorder: { show: !1 },
                axisTicks: { show: !1 },
            },
            yaxis: {
                tickAmount: 4,
                min: 10,
                max: 50,
                labels: {
                    style: {
                        colors: o,
                        fontSize: "13px",
                        fontFamily: "Inter",
                        fontWeight: 400,
                    },
                    formatter: function (e) {
                        return e + "%";
                    },
                },
            },
            responsive: [
                {
                    breakpoint: 1400,
                    options: {
                        chart: { height: 270 },
                        xaxis: { labels: { style: { fontSize: "10px" } } },
                        legend: {
                            itemMargin: { vertical: 0, horizontal: 10 },
                            fontSize: "13px",
                            offsetY: 12,
                        },
                    },
                },
                {
                    breakpoint: 1025,
                    options: {
                        chart: { height: 415 },
                        plotOptions: { bar: { columnWidth: "50%" } },
                    },
                },
                {
                    breakpoint: 982,
                    options: { plotOptions: { bar: { columnWidth: "30%" } } },
                },
                {
                    breakpoint: 480,
                    options: { chart: { height: 250 }, legend: { offsetY: 7 } },
                },
            ],
        }),
        null !== c && new ApexCharts(c, h).render(),
        (c = document.querySelector("#deliveryExceptionsChart")),
        (h = {
            chart: { height: 420, parentHeightOffset: 0, type: "donut" },
            labels: [
                "Incorrect address",
                "Weather conditions",
                "Federal Holidays",
                "Damage during transit",
            ],
            series: [13, 25, 22, 40],
            colors: [
                l.donut2.series1,
                l.donut2.series2,
                l.donut2.series3,
                l.donut2.series4,
            ],
            stroke: { width: 0 },
            dataLabels: {
                enabled: !1,
                formatter: function (e, o) {
                    return parseInt(e) + "%";
                },
            },
            legend: {
                show: !0,
                position: "bottom",
                offsetY: 10,
                markers: { width: 8, height: 8, offsetX: -3 },
                itemMargin: { horizontal: 15, vertical: 5 },
                fontSize: "13px",
                fontFamily: "Inter",
                fontWeight: 400,
                labels: { colors: t, useSeriesColors: !1 },
            },
            tooltip: { theme: i },
            grid: { padding: { top: 15 } },
            plotOptions: {
                pie: {
                    donut: {
                        size: "75%",
                        labels: {
                            show: !0,
                            value: {
                                fontSize: "26px",
                                fontFamily: "Inter",
                                color: t,
                                fontWeight: 500,
                                offsetY: -30,
                                formatter: function (e) {
                                    return parseInt(e) + "%";
                                },
                            },
                            name: { offsetY: 20, fontFamily: "Inter" },
                            total: {
                                show: !0,
                                fontSize: "0.9rem",
                                label: "AVG. Exceptions",
                                color: o,
                                formatter: function (e) {
                                    return "30%";
                                },
                            },
                        },
                    },
                },
            },
            responsive: [
                { breakpoint: 420, options: { chart: { height: 360 } } },
            ],
        });
    null !== c && new ApexCharts(c, h).render();
})();
