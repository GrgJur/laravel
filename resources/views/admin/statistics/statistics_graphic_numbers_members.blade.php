
<script src="https://code.highcharts.com/highcharts.js"></script>

<script type="text/javascript">

    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Allievi totali iscritti nel {{$anno}}'
        },
        subtitle: {
            text: 'divisione per mesi e categorie'
        },
        xAxis: {
            categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                'October', 'November', 'December'
            ]
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Numero allievi'
            }
        },
        plotOptions: {
            series: {
                pointWidth: 40
            }
        },

        series: 
        [{

            name: 'Iscrizioni allievi',
            data: [
                @if (!empty($allData))
                    <?php $n = 1 ?>
                    @foreach($allData as $value)

                        @for ($i=$n; $i < 13; $i++)
                            
                            @if ($value['period'] == $i)

                                {{ $value['tot'] }},
                                <?php 
                                    $n = $i+1;
                                    $i = 13;
                                ?>
                            
                            @else

                                0,

                            @endif

                        @endfor

                    @endforeach
                @else
                    0,0,0,0,0,0,0,0,0,0,0,0
                @endif
            ]
        }],

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });

</script>