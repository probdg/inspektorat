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
    // root.setThemes([
    //     am5themes_Animated.new(root)
    // ]);

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
            locationX: 0.5,
            locationY: 0.5,
            sprite: am5.Label.new(root, {
                fill: am5.color(0xffffff),
                populateText: true,
                centerX: am5.p50,
                centerY: am5.p50,
                fontSize: 5,
                text: "{value}"
            })
        });
    });

    var colors = {
        SangatSignifikan: am5.color(0xca0101),
        Signifikan: am5.color(0xe17a2d),
        Moderat: am5.color(0xe1d92d),
        Minor: am5.color(0x0b7d03),
        veryMinor: am5.color('#000000')
    };

    // Set data
    // https://www.amcharts.com/docs/v5/charts/xy-chart/#Setting_data
    // 1-25
    var kolom_1 = '';
    var kolom_2 = '';
    var kolom_3 = '';
    var kolom_4 = '';
    var kolom_5 = '';
    var kolom_6 = '';
    var kolom_7 = '';
    var kolom_8 = '';
    var kolom_9 = '';
    var kolom_10 = '';
    var kolom_11 = '';
    var kolom_12 = '';
    var kolom_13 = '';
    var kolom_14 = '';
    var kolom_15 = '';
    var kolom_16 = '';
    var kolom_17 = '';
    var kolom_18 = '';
    var kolom_19 = '';
    var kolom_20 = '';
    var kolom_21 = '';
    var kolom_22 = '';
    var kolom_23 = '';
    var kolom_24 = '';
    var kolom_25 = '';
    var data = [{
            y: "Sangat Signifikan",
            x: "Tidak Signifikan",
            columnSettings: {
                fill: colors.Moderat
            },
            value: kolom_9 //9
        },
        {
            y: "Signifikan",
            x: "Tidak Signifikan",
            columnSettings: {
                fill: colors.Minor
            },
            value: kolom_6 //6
        },
        {
            y: "Moderat",
            x: "Tidak Signifikan",
            columnSettings: {
                fill: colors.Minor
            },
            value: kolom_4 //4 
        },
        {
            y: "Minor",
            x: "Tidak Signifikan",
            columnSettings: {
                fill: colors.veryMinor
            },
            value: kolom_2 //2
        },
        {
            y: "Tidak Signifikan",
            x: "Tidak Signifikan",
            columnSettings: {
                fill: colors.veryMinor
            },
            value: kolom_1 //1
        },
        {
            y: "Sangat Signifikan",
            x: "Minor",
            columnSettings: {
                fill: colors.Signifikan
            },
            value: kolom_16 //
        },
        {
            y: "Signifikan",
            x: "Minor",
            columnSettings: {
                fill: colors.Moderat
            },
            value: kolom_13 //13
        },
        {
            y: "Moderat",
            x: "Minor",
            columnSettings: {
                fill: colors.Moderat
            },
            value: kolom_11 //11
        },
        {
            y: "Minor",
            x: "Minor",
            columnSettings: {
                fill: colors.Minor
            },
            value: kolom_7 //7
        },
        {
            y: "Tidak Signifikan",
            x: "Minor",
            columnSettings: {
                fill: colors.veryMinor
            },
            value: kolom_3 //3
        },
        {
            y: "Sangat Signifikan",
            x: "Moderat",
            columnSettings: {
                fill: colors.Signifikan
            },
            value: kolom_20 //20
        },
        {
            y: "Signifikan",
            x: "Moderat",
            columnSettings: {
                fill: colors.Signifikan
            },
            value: kolom_18 //18
        },
        {
            y: "Moderat",
            x: "Moderat",
            columnSettings: {
                fill: colors.Moderat
            },
            value: kolom_15 //15
        },
        {
            y: "Minor",
            x: "Moderat",
            columnSettings: {
                fill: colors.Moderat
            },
            value: kolom_12 //12
        },
        {
            y: "Tidak Signifikan",
            x: "Moderat",
            columnSettings: {
                fill: colors.Minor
            },
            value: kolom_5 //5
        },
        {
            y: "Sangat Signifikan",
            x: "Signifikan",
            columnSettings: {
                fill: colors.SangatSignifikan
            },
            value: kolom_23 //23
        },
        {
            y: "Signifikan",
            x: "Signifikan",
            columnSettings: {
                fill: colors.Signifikan
            },
            value: kolom_24 //24
        },
        {
            y: "Moderat",
            x: "Signifikan",
            columnSettings: {
                fill: colors.Signifikan
            },
            value: kolom_21 //21
        },
        {
            y: "Minor",
            x: "Signifikan",
            columnSettings: {
                fill: colors.Moderat
            },
            value: kolom_22 //22
        },
        {
            y: "Tidak Signifikan",
            x: "Signifikan",
            columnSettings: {
                fill: colors.Minor
            },
            value: kolom_19 //19
        },
        {
            y: "Sangat Signifikan",
            x: "Sangat Signifikan",
            columnSettings: {
                fill: colors.SangatSignifikan
            },
            value: kolom_25 // 25
        }, {
            y: "Signifikan",
            x: "Sangat Signifikan",
            columnSettings: {
                fill: colors.SangatSignifikan
            },
            value: kolom_24 //24
        }, {
            y: "Moderat",
            x: "Sangat Signifikan",
            columnSettings: {
                fill: colors.Signifikan
            },
            value: kolom_21 //21
        }, {
            y: "Minor",
            x: "Sangat Signifikan",
            columnSettings: {
                fill: colors.Signifikan
            },
            value: kolom_17 //17
        }, {
            y: "Tidak Signifikan",
            x: "Sangat Signifikan",
            columnSettings: {
                fill: colors.Moderat
            },
            value: kolom_10 //10
        }
    ];

    series.data.setAll(data);

    yAxis.data.setAll([{
            category: "Sangat Sering"
        },
        {
            category: "Sering"
        },
        {
            category: "Cukup Sering"
        },
        {
            category: "Jarang"
        },
        {
            category: "Sangat Jarang"
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

    // Update data every second

    function updateData() {

        var tahun = $('[name=tahun]').val();
        var id_opd = $('[name=id]').val();
        var id_rpjmd = $('[name=id_rpjmd]').val();
        var urusan = $('[name=urusan_pemda]').val();
        $.ajax({
            type: "post",
            url: "<?= base_url('form/Form4/json') ?>",
            async: false,
            data: {
                id_opd,
                id_rpjmd,
                tahun,
                urusan
            },
            dataType: "json",
            success: function(data) {
                $.each(data.risk_opd, function(i, v) {
                    $.each(v.detail, function(id, vd) {
                        hitung = parseFloat(vd.skala_kemungkinan) * parseFloat(vd.skala_dampak);
                        if (hitung == isNaN) {

                        }
                        if (hitung == 1) {
                            kolom_1 += vd.kode_risiko + ' ';
                        }
                        if (hitung == 2) {
                            kolom_2 += vd.kode_risiko + ' ';
                        }
                        if (hitung == 3) {
                            kolom_3 += vd.kode_risiko + ' ';
                        }
                        if (hitung == 4) {
                            kolom_4 += vd.kode_risiko + ' ';
                        }
                        if (hitung == 5) {
                            kolom_5 += vd.kode_risiko + ' ';
                        }
                        if (hitung == 6) {
                            kolom_6 += vd.kode_risiko + ' ';
                        }
                        if (hitung == 7) {
                            kolom_7 += vd.kode_risiko + ' ';
                        }
                        if (hitung == 8) {
                            kolom_8 += vd.kode_risiko + ' ';
                        }
                        if (hitung == 9) {
                            kolom_9 += vd.kode_risiko + ' ';
                        }
                        if (hitung == 10) {
                            kolom_10 += vd.kode_risiko + ' ';
                        }
                        if (hitung == 11) {
                            kolom_11 += vd.kode_risiko + ' ';
                        }
                        if (hitung == 12) {
                            kolom_12 += vd.kode_risiko + ' ';
                        }
                        if (hitung == 13) {
                            kolom_13 += vd.kode_risiko + ' ';
                        }
                        if (hitung == 14) {
                            kolom_14 += vd.kode_risiko + ' ';
                        }
                        if (hitung == 15) {
                            kolom_15 += vd.kode_risiko + ' ';
                        }
                        if (hitung == 16) {
                            kolom_16 += vd.kode_risiko + ' ';
                        }
                        if (hitung == 17) {
                            kolom_17 += vd.kode_risiko + ' ';
                        }
                        if (hitung == 18) {
                            kolom_18 += vd.kode_risiko + ' ';
                        }
                        if (hitung == 19) {
                            kolom_19 += vd.kode_risiko + ' ';
                        }
                        if (hitung == 20) {
                            kolom_20 += vd.kode_risiko + ' ';
                        }
                        if (hitung == 21) {
                            kolom_21 += vd.kode_risiko + ' ';
                        }
                        if (hitung == 22) {
                            kolom_22 += vd.kode_risiko + ' ';
                        }
                        if (hitung == 23) {
                            kolom_23 += vd.kode_risiko + ' ';
                        }
                        if (hitung == 24) {
                            kolom_24 += vd.kode_risiko + ' ';
                        }
                        if (hitung == 25) {
                            kolom_25 += vd.kode_risiko + ' ';
                        }

                    });

                });

            }
        });
        series.data.push({
            y: "Sangat Signifikan",
            x: "Tidak Signifikan",
            columnSettings: {
                fill: colors.Moderat
            },
            value: kolom_9 //9
        }, {
            y: "Signifikan",
            x: "Tidak Signifikan",
            columnSettings: {
                fill: colors.Minor
            },
            value: kolom_6 //6
        }, {
            y: "Moderat",
            x: "Tidak Signifikan",
            columnSettings: {
                fill: colors.Minor
            },
            value: kolom_4 //4 
        }, {
            y: "Minor",
            x: "Tidak Signifikan",
            columnSettings: {
                fill: colors.veryMinor
            },
            value: kolom_2 //2
        }, {
            y: "Tidak Signifikan",
            x: "Tidak Signifikan",
            columnSettings: {
                fill: colors.veryMinor
            },
            value: kolom_1 //1
        }, {
            y: "Sangat Signifikan",
            x: "Minor",
            columnSettings: {
                fill: colors.Signifikan
            },
            value: kolom_16 //
        }, {
            y: "Signifikan",
            x: "Minor",
            columnSettings: {
                fill: colors.Moderat
            },
            value: kolom_13 //13
        }, {
            y: "Moderat",
            x: "Minor",
            columnSettings: {
                fill: colors.Moderat
            },
            value: kolom_11 //11
        }, {
            y: "Minor",
            x: "Minor",
            columnSettings: {
                fill: colors.Minor
            },
            value: kolom_7 //7
        }, {
            y: "Tidak Signifikan",
            x: "Minor",
            columnSettings: {
                fill: colors.veryMinor
            },
            value: kolom_3 //3
        }, {
            y: "Sangat Signifikan",
            x: "Moderat",
            columnSettings: {
                fill: colors.Signifikan
            },
            value: kolom_20 //20
        }, {
            y: "Signifikan",
            x: "Moderat",
            columnSettings: {
                fill: colors.Signifikan
            },
            value: kolom_18 //18
        }, {
            y: "Moderat",
            x: "Moderat",
            columnSettings: {
                fill: colors.Moderat
            },
            value: kolom_15 //15
        }, {
            y: "Minor",
            x: "Moderat",
            columnSettings: {
                fill: colors.Moderat
            },
            value: `${kolom_12}` //12
        }, {
            y: "Tidak Signifikan",
            x: "Moderat",
            columnSettings: {
                fill: colors.Minor
            },
            value: kolom_5 //5
        }, {
            y: "Sangat Signifikan",
            x: "Signifikan",
            columnSettings: {
                fill: colors.SangatSignifikan
            },
            value: kolom_23 //23
        }, {
            y: "Signifikan",
            x: "Signifikan",
            columnSettings: {
                fill: colors.Signifikan
            },
            value: kolom_24 //24
        }, {
            y: "Moderat",
            x: "Signifikan",
            columnSettings: {
                fill: colors.Signifikan
            },
            value: kolom_21 //21
        }, {
            y: "Minor",
            x: "Signifikan",
            columnSettings: {
                fill: colors.Moderat
            },
            value: kolom_22 //22
        }, {
            y: "Tidak Signifikan",
            x: "Signifikan",
            columnSettings: {
                fill: colors.Minor
            },
            value: kolom_19 //19
        }, {
            y: "Sangat Signifikan",
            x: "Sangat Signifikan",
            columnSettings: {
                fill: colors.SangatSignifikan
            },
            value: kolom_25 // 25
        }, {
            y: "Signifikan",
            x: "Sangat Signifikan",
            columnSettings: {
                fill: colors.SangatSignifikan
            },
            value: kolom_24 //24
        }, {
            y: "Moderat",
            x: "Sangat Signifikan",
            columnSettings: {
                fill: colors.Signifikan
            },
            value: kolom_21 //21
        }, {
            y: "Minor",
            x: "Sangat Signifikan",
            columnSettings: {
                fill: colors.Signifikan
            },
            value: kolom_17 //17
        }, {
            y: "Tidak Signifikan",
            x: "Sangat Signifikan",
            columnSettings: {
                fill: colors.Moderat
            },
            value: kolom_10 //10
        })
        chart.appear(1000, 100);



    }

    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/#Initial_animation
    chart.appear(1000, 100);
</script>