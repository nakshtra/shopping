<script src="<?php echo base_url('assets/js/jquery-1.8.3.min.js'); ?>" type="text/javascript"></script>

<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/highcharts-3d.js"></script>
<style>
    #container2 {
        height: 400px;
        min-width: 310px;
        max-width: 800px;
        margin: 0 auto;
    }
</style>
<div id="container" style="height: 400px"></div>
<div id="container2"></div>
<?php //echo "hello"; //print_r($category); ?>
<script>
    //    $(function () {
    //        $('#container').highcharts({
    //            chart: {
    //                type: 'pie',
    //                options3d: {
    //                    enabled: true,
    //                    alpha: 45,
    //                    beta: 0,
    //                }
    //            },
    //            plotOptions: {
    //                pie: {
    //                    depth: 25
    //                }
    //            },
    //            series: [{
    //                data: [ <? php foreach($category as $key => $val)
    //                    {
    //                        if ($key == 0) {
    //                            echo $val;
    //                        } else {
    //                            echo ",".$val;
    //                        }
    //                        //    echo $val; 
    //    }
    //            ?> ]
    //                //            data: [2, 4, 6, 1, 3,,4,4,4,4]
    //        }]
    //        });
    //    });

    $(function () {
        $('#container2').highcharts({
            credits: {
                enabled: false
            },
            chart: {
                type: 'column',
                options3d: {
                    enabled: true,
                    alpha: 15,
                    beta: 15,
                    depth: 50
                }
            },
            title: {
                text: 'Monthly Average Rainfall'
            },
            xAxis: {
                categories: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Rainfall (mm)'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Tokyo',
                data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

        }, {
                name: 'New York',
                data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

        }]
        });
    });
</script>


<?php //foreach($category as $key=>$val) // { // if($key==0) // { // echo $val; // } // else // { // echo ",".$val; // } // } ?>
