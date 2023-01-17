<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script>
    /**
     * ---------------------------------------
     * This demo was created using amCharts 5.
     * 
     * For more information visit:
     * https://www.amcharts.com/
     * 
     * Documentation is available at:
     * https://www.amcharts.com/docs/v5/
     * ---------------------------------------
     */

    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("chartdiv");

    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([
        am5themes_Animated.new(root)
    ]);

    // Create chart
    // https://www.amcharts.com/docs/v5/charts/xy-chart/
    var chart = root.container.children.push(
        am5xy.XYChart.new(root, {
            panX: false,
            panY: false,
            wheelX: "none",
            wheelY: "none",
            layout: root.verticalLayout
        })
    );

    // Create axes and their renderers
    var yRenderer = am5xy.AxisRendererY.new(root, {
        visible: false,
        minGridDistance: 20,
        inversed: true
    });

    yRenderer.grid.template.set("visible", false);

    var yAxis = chart.yAxes.push(
        am5xy.CategoryAxis.new(root, {
            renderer: yRenderer,
            categoryField: "category"
        })
    );

    var xRenderer = am5xy.AxisRendererX.new(root, {
        visible: false,
        minGridDistance: 30,
        inversed: true
    });

    xRenderer.grid.template.set("visible", false);

    var xAxis = chart.xAxes.push(
        am5xy.CategoryAxis.new(root, {
            renderer: xRenderer,
            categoryField: "category"
        })
    );

    // Create series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/#Adding_series
    var series = chart.series.push(
        am5xy.ColumnSeries.new(root, {
            calculateAggregates: true,
            stroke: am5.color(0xffffff),
            clustered: false,
            xAxis: xAxis,
            yAxis: yAxis,
            categoryXField: "x",
            categoryYField: "y",
            valueField: "value"
        })
    );

    series.columns.template.setAll({
        tooltipText: "{value}",
        strokeOpacity: 1,
        strokeWidth: 2,
        cornerRadiusTL: 5,
        cornerRadiusTR: 5,
        cornerRadiusBL: 5,
        cornerRadiusBR: 5,
        width: am5.percent(100),
        height: am5.percent(100),
        templateField: "columnSettings"
    });

    var circleTemplate = am5.Template.new({});

    // Add heat rule
    // https://www.amcharts.com/docs/v5/concepts/settings/heat-rules/
    series.set("heatRules", [{
        target: circleTemplate,
        min: 10,
        max: 35,
        dataField: "value",
        key: "radius"
    }]);

    series.bullets.push(function() {
        return am5.Bullet.new(root, {
            sprite: am5.Circle.new(
                root, {
                    fill: am5.color(0x000000),
                    fillOpacity: 0.1,
                    strokeOpacity: 0
                },
                circleTemplate
            )
        });
    });

    series.bullets.push(function() {
        return am5.Bullet.new(root, {
            sprite: am5.Label.new(root, {
                fill: am5.color(0xffffff),
                populateText: true,
                centerX: am5.p50,
                centerY: am5.p50,
                fontSize: 10,
                text: "{value}"
            })
        });
    });

    var colors = {
        SangatSignifikan: am5.color(0xca0101),
        Signifikan: am5.color(0xe17a2d),
        Moderat: am5.color(0xe1d92d),
        Minor: am5.color(0x5dbe24),
        veryMinor: am5.color(0x0b7d03)
    };

    // Set data
    // https://www.amcharts.com/docs/v5/charts/xy-chart/#Setting_data
    var data = [{
            y: "Sangat Signifikan",
            x: "Tidak Signifikan",
            columnSettings: {
                fill: colors.Moderat
            },
            value: 20
        },
        {
            y: "Signifikan",
            x: "Tidak Signifikan",
            columnSettings: {
                fill: colors.Minor
            },
            value: 15
        },
        {
            y: "Moderat",
            x: "Tidak Signifikan",
            columnSettings: {
                fill: colors.Minor
            },
            value: 25
        },
        {
            y: "Minor",
            x: "Tidak Signifikan",
            columnSettings: {
                fill: colors.Minor
            },
            value: 15
        },
        {
            y: "Tidak Signifikan",
            x: "Tidak Signifikan",
            columnSettings: {
                fill: colors.Minor
            },
            value: 12
        },
        {
            y: "Sangat Signifikan",
            x: "Minor",
            columnSettings: {
                fill: colors.Signifikan
            },
            value: 30
        },
        {
            y: "Signifikan",
            x: "Minor",
            columnSettings: {
                fill: colors.Moderat
            },
            value: 24
        },
        {
            y: "Moderat",
            x: "Minor",
            columnSettings: {
                fill: colors.Minor
            },
            value: 25
        },
        {
            y: "Minor",
            x: "Minor",
            columnSettings: {
                fill: colors.Minor
            },
            value: 15
        },
        {
            y: "Tidak Signifikan",
            x: "Minor",
            columnSettings: {
                fill: colors.Minor
            },
            value: 25
        },
        {
            y: "Sangat Signifikan",
            x: "Moderat",
            columnSettings: {
                fill: colors.Signifikan
            },
            value: 33
        },
        {
            y: "Signifikan",
            x: "Moderat",
            columnSettings: {
                fill: colors.Signifikan
            },
            value: 14
        },
        {
            y: "Moderat",
            x: "Moderat",
            columnSettings: {
                fill: colors.Moderat
            },
            value: 20
        },
        {
            y: "Minor",
            x: "Moderat",
            columnSettings: {
                fill: colors.Minor
            },
            value: 19
        },
        {
            y: "Tidak Signifikan",
            x: "Moderat",
            columnSettings: {
                fill: colors.Minor
            },
            value: 25
        },
        {
            y: "Sangat Signifikan",
            x: "Signifikan",
            columnSettings: {
                fill: colors.SangatSignifikan
            },
            value: 31
        },
        {
            y: "Signifikan",
            x: "Signifikan",
            columnSettings: {
                fill: colors.SangatSignifikan
            },
            value: 24
        },
        {
            y: "Moderat",
            x: "Signifikan",
            columnSettings: {
                fill: colors.Signifikan
            },
            value: 25
        },
        {
            y: "Minor",
            x: "Signifikan",
            columnSettings: {
                fill: colors.Moderat
            },
            value: 15
        },
        {
            y: "Tidak Signifikan",
            x: "Signifikan",
            columnSettings: {
                fill: colors.Minor
            },
            value: 15
        },
        {
            y: "Sangat Signifikan",
            x: "Sangat Signifikan",
            columnSettings: {
                fill: colors.SangatSignifikan
            },
            value: 12
        },
        {
            y: "Signifikan",
            x: "Sangat Signifikan",
            columnSettings: {
                fill: colors.SangatSignifikan
            },
            value: 14
        },
        {
            y: "Moderat",
            x: "Sangat Signifikan",
            columnSettings: {
                fill: colors.SangatSignifikan
            },
            value: 15
        },
        {
            y: "Minor",
            x: "Sangat Signifikan",
            columnSettings: {
                fill: colors.Signifikan
            },
            value: 25
        },
        {
            y: "Tidak Signifikan",
            x: "Sangat Signifikan",
            columnSettings: {
                fill: colors.Moderat
            },
            value: 19
        }
    ];

    series.data.setAll(data);

    yAxis.data.setAll([{
            category: "Sangat Signifikan"
        },
        {
            category: "Signifikan"
        },
        {
            category: "Moderat"
        },
        {
            category: "Minor"
        },
        {
            category: "Tidak Signifikan"
        }
    ]);

    xAxis.data.setAll([{
            category: "Sangat Signifikan"
        },
        {
            category: "Signifikan"
        },
        {
            category: "Moderat"
        },
        {
            category: "Minor"
        },
        {
            category: "Tidak Signifikan"
        }
    ]);

    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/#Initial_animation
    chart.appear(1000, 100);
</script>