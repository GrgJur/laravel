
<script src="https://code.highcharts.com/highcharts.js"></script>

<script type="text/javascript">

    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Allievi totali iscritti nel <?php echo e($anno); ?>'
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
                <?php if(!empty($allData)): ?>
                    <?php $n = 1 ?>
                    <?php $__currentLoopData = $allData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php for($i=$n; $i < 13; $i++): ?>
                            
                            <?php if($value['period'] == $i): ?>

                                <?php echo e($value['tot']); ?>,
                                <?php 
                                    $n = $i+1;
                                    $i = 13;
                                ?>
                            
                            <?php else: ?>

                                0,

                            <?php endif; ?>

                        <?php endfor; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    0,0,0,0,0,0,0,0,0,0,0,0
                <?php endif; ?>
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

</script><?php /**PATH /home/jure/sg8000/resources/views/admin/statistics/statistics_graphic_numbers_members.blade.php ENDPATH**/ ?>