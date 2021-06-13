<x-admin.layout>
    <div id = "chartjs-wrapper-demo">
        <canvas id='barChart'></canvas>
    </div>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.min.js" integrity="sha512-VCHVc5miKoln972iJPvkQrUYYq7XpxXzvqNfiul1H4aZDwGBGC0lq373KNleaB2LpnC2a/iNfE5zoRYmB4TRDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>

        // Highcharts.chart('chart-container',{
        //     title:{
        //         text:'New User Growth'
        //     },
        //     subtitle:{
        //         text:'Source'
        //     }
        //     xaxis:{
        //         categories:['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec']
        //     },
        //     yaxis:{
        //         title:{
        //             text:'number of new users'
        //         }
        //     },
        //     legend:{
        //         layout:'vertical',
        //         align:'right',
        //         verticalAlign:'middle',
        //     },
        //     plotOptions:{
        //         series:{
        //             allowPointSelect:true
        //         }
        //     },
        //     series:{
        //         name:'new user',
        //         data:datas
        //     },
        //     responsive:{
        //         rules:[{
        //             condition:{
        //                 maxWidth:500;
        //             },
        //             chartOptions:{
        //                 legend:{
        //                     layout:'horizontal',
        //                     align:'center',
        //                     verticalAlign:'bottom'
        //                 }
        //             }
        //         }]
        //     }
        // })
        $(function(){
            var datas = <?php echo json_encode($datas); ?>
            var barCanvas = $("#barchart");
            var barChart = new Chart(barCanvas,{
                type = 'bar';
                data:{
                    labels:['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
                    datasets:{
                        label:'New users records',
                        data: datas;
                        background-color: ['red','blue','gray','black','gold','purple','orange','green','indigo','voilet','pink','silver']
                    }
                },
                options:{
                    scales:{
                        yAxes:[{
                            ticks:{
                                beginAtZero:true
                            }
                        }]
                    }
                }
            })
        })
    </script>
</x-admin.layout>