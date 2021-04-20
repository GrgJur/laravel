
<script src="https://code.highcharts.com/highcharts.js"></script>

<script type="text/javascript">

    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Corsi totali nel {{$anno}}'
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
                text: 'Numero corsi'
            }
        },
        plotOptions: {
            column: {
                pointPadding: 0,
                borderWidth: 0,
                groupPadding: 0,
                shadow: false
            }
        },

        series: 
        [
            @foreach($allData as $corsoId => $data)

            {

                name: '{{ $corsi[$corsoId] }}',
                data: [
                    @if (!empty($data))
                        <?php $n = 1 ?>
                        @foreach($data as $value)
                            
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

            },

            @endforeach
        ],

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