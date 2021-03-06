<?php

$type = isset($_GET['type']) ? $_GET['type'] : 'area';
?>
<!doctype html>
<html lang="zh">
    <head>
        <meta charset="UTF-8" />
        <title>上证指数走势</title>
        <script type="text/javascript" src="http://cdn.hcharts.cn/jquery/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="http://cdn.hcharts.cn/highcharts/highcharts.js"></script>
        <script>
            var chart;

            $(function () {
                getData('old-container', 20061201, 20081201, true);
                setTimeout("getData('old-container', 20141110, 20161110, false)",1500);
                //getData('new-container',20141110,20161110);
            });


            function makeChart(containerId, start, end, dates, values, flag) {
                var seriesName = flag ? "上证指数2006~2008" : "证指数2014~2016?";
                console.log(seriesName, flag);
                
                if (chart) {
                    chart.addAxis({categories: dates, opposite: true}, true);
                    chart.addSeries({name: seriesName, data: values, xAxis: 1});
                    console.log(start, end, flag);
                    return true;
                }

                chart = new Highcharts.Chart({
                    credits: {
                        enabled: false
                    },
                    chart: {
                        type: '<?php echo $type;?>',
                        renderTo: containerId
                    },
                    title: {
                        text: '上证指数'
                    },
                    subtitle: {
                        //text: 'Source: thebulletin.metapress.com'
                    },
                    xAxis:[],
                    yAxis: {
                        max: 6500,
                        title: {
                            text: '点数'
                        },
                        labels: {
                            formatter: function () {
                                return this.value / 1000 + 'k';
                            }
                        }
                    },
                    tooltip: {
                        pointFormat: '{series.name} {point.x} 点数 <b>{point.y:,.0f}</b> '
                    },
                    plotOptions: {
                        area: {
                            //pointStart: 1940,
                            marker: {
                                enabled: false,
                                symbol: 'circle',
                                radius: 2,
                                states: {
                                    hover: {
                                        enabled: true
                                    }
                                }
                            }
                        }
                    }
                });
                chart.addAxis({categories: dates}, true);
                chart.addSeries({name: seriesName, data: values, xAxis: 0});
            }


            function getData(containerId, start, end, flag) {
                var url = 'http://q.stock.sohu.com/hisHq?code=zs_000001&start=' + start + '&end=' + end + '&stat=1&order=A&period=d&callback=?&rt=jsonp&r=0.18893369822762907';
                $.getJSON(url, function (ret) {
                    var dates = [];
                    var values = [];
                    $.each(ret[0].hq, function (i, item) {
                        //console.log(i,item);
                        dates.push(item[0]);
                        values.push(item[2] - 0);
                    });

                    while (dates.length < 487) {
                        var d = new Date(dates.slice(-1));
                        d.setDate(d.getDate() + 1);
                        dates.push(d.toISOString().substring(0, 10));
                        values.push(0);
                    }
                    console.log(dates, values);
                    makeChart(containerId, start, end, dates, values, flag);
                });
            }
        </script>
    </head>
    <body>
        <div id="old-container" style="min-width:800px;height:500px"></div>
        <hr>
        <div id="new-container" style="min-width:800px;height:500px"></div>
    </body>
</html>
