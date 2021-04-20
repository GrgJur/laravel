
<script src="https://code.highcharts.com/highcharts.js"></script>

<script type="text/javascript">

    Highcharts.chart('container', {
        title: {
            text: 'Corsi totali in un anno'
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
            title: {
                text: 'Numero corsi'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Moto',
            data: [2, 2, 3, 6, 1, 2, 7, 5, 2, 4, 6, 1]
        },
        {
            name: 'Sensibilizzazione',
            data: [5, 7, 1, 1, 2, 5, 4, 8, 6, 2, 4, 3]
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

</script><?php /**PATH /home/jure/sg8000/resources/views/admin/statistics/statistics_graphic_courses_months.blade.php ENDPATH**/ ?>