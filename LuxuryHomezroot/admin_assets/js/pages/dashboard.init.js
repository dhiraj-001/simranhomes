// Wait for jQuery and ApexCharts to be available
document.addEventListener('DOMContentLoaded', function() {
    // A utility function to get color arrays from data attributes
    function getChartColorsArray(selector) {
        // Check if the element exists and has a data-colors attribute
        const dataColors = $(selector).attr("data-colors");
        if (dataColors) {
            const colors = JSON.parse(dataColors);
            return colors.map(function(color) {
                color = color.replace(" ", "");
                // If the color is a CSS variable, resolve it
                if (color.indexOf("--") !== -1) {
                    const cssVar = getComputedStyle(document.documentElement).getPropertyValue(color);
                    return cssVar || color; // Return the resolved variable or the original name
                }
                // Otherwise, return the color name/hex
                return color;
            });
        }
        // Return an empty array if no colors are found
        return [];
    }

    // Placeholder function for theme changes
    function ChartColorChange(chart, selector) {
        // Logic to handle theme changes would go here
        // This is a placeholder function to prevent errors
    }

    // Mini Donut Chart 1
    let barchartColors = getChartColorsArray("#mini-chart1");
    if (barchartColors.length > 0) {
        let options = {
            series: [60, 40],
            chart: {
                type: "donut",
                height: 110,
            },
            colors: barchartColors,
            legend: {
                show: false
            },
            dataLabels: {
                enabled: false
            },
        };
        let chart = new ApexCharts(document.querySelector("#mini-chart1"), options);
        chart.render();
        ChartColorChange(chart, "#mini-chart1");
    }

    // Mini Donut Chart 2
    barchartColors = getChartColorsArray("#mini-chart2");
    if (barchartColors.length > 0) {
        let options = {
            series: [30, 55],
            chart: {
                type: "donut",
                height: 110
            },
            colors: barchartColors,
            legend: {
                show: false
            },
            dataLabels: {
                enabled: false
            },
        };
        let chart = new ApexCharts(document.querySelector("#mini-chart2"), options);
        chart.render();
        ChartColorChange(chart, "#mini-chart2");
    }

    // Mini Donut Chart 3
    barchartColors = getChartColorsArray("#mini-chart3");
    if (barchartColors.length > 0) {
        let options = {
            series: [65, 45],
            chart: {
                type: "donut",
                height: 110
            },
            colors: barchartColors,
            legend: {
                show: false
            },
            dataLabels: {
                enabled: false
            },
        };
        let chart = new ApexCharts(document.querySelector("#mini-chart3"), options);
        chart.render();
        ChartColorChange(chart, "#mini-chart3");
    }

    // Mini Donut Chart 4
    barchartColors = getChartColorsArray("#mini-chart4");
    if (barchartColors.length > 0) {
        let options = {
            series: [30, 70],
            chart: {
                type: "donut",
                height: 110
            },
            colors: barchartColors,
            legend: {
                show: false
            },
            dataLabels: {
                enabled: false
            },
        };
        let chart = new ApexCharts(document.querySelector("#mini-chart4"), options);
        chart.render();
        ChartColorChange(chart, "#mini-chart4");
    }

    // Market Overview Bar Chart
    barchartColors = getChartColorsArray("#market-overview");
    if (barchartColors.length > 0) {
        let options = {
            series: [{
                name: "Profit",
                data: [12.45, 16.2, 8.9, 11.42, 12.6, 18.1, 18.2, 14.16, 11.1, 8.09, 16.34, 12.88],
            }, {
                name: "Loss",
                data: [-11.45, -15.42, -7.9, -12.42, -12.6, -18.1, -18.2, -14.16, -11.1, -7.09, -15.34, -11.88, ],
            }, ],
            chart: {
                type: "bar",
                height: 400,
                stacked: true,
                toolbar: {
                    show: false
                },
            },
            plotOptions: {
                bar: {
                    columnWidth: "20%"
                }
            },
            colors: barchartColors,
            fill: {
                opacity: 1
            },
            dataLabels: {
                enabled: false
            },
            legend: {
                show: false
            },
            yaxis: {
                labels: {
                    formatter: function(val) {
                        return val.toFixed(0) + "%";
                    },
                },
            },
            xaxis: {
                categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec", ],
                labels: {
                    rotate: -90
                },
            },
        };
        let chart = new ApexCharts(document.querySelector("#market-overview"), options);
        chart.render();
        ChartColorChange(chart, "#market-overview");
    }

    // Sales by Location Vector Map
    const vectormapColors = getChartColorsArray("#sales-by-locations");
    if (vectormapColors.length > 0) {
        $("#sales-by-locations").vectorMap({
            map: "world_mill_en",
            normalizeFunction: "polynomial",
            hoverOpacity: 0.7,
            hoverColor: false,
            regionStyle: {
                initial: {
                    fill: "#e9e9ef"
                }
            },
            markerStyle: {
                initial: {
                    r: 9,
                    fill: vectormapColors[0], // Use the first color for markers
                    "fill-opacity": 0.9,
                    stroke: "#fff",
                    "stroke-width": 7,
                    "stroke-opacity": 0.4,
                },
                hover: {
                    stroke: "#fff",
                    "fill-opacity": 1,
                    "stroke-width": 1.5
                },
            },
            backgroundColor: "transparent",
            markers: [{
                latLng: [41.9, 12.45],
                name: "USA"
            }, {
                latLng: [12.05, -61.75],
                name: "Russia"
            }, {
                latLng: [1.3, 103.8],
                name: "Australia"
            }, ],
        });
    }
});
