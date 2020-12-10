window.addEventListener("load", function(){
    var load_screen = document.getElementById("load_screen");
    document.body.removeChild(load_screen);
});
function top_drivers()
{
    var sort_day=$('#top_drivers_drop').val();
    $.ajax({
        url:"router.php",
        type: 'post',
        dataType: "json",
        data: {
            sort_day:sort_day,
            fx: 46
        },
        success:function(data)
        {
            // alert(data)
            $('#top_divers').html('')
            var d_1options1 = {
            chart: {
                height: 350,
                type: 'bar',
                toolbar: {
                    show: false,
                },
                dropShadow: {
                    enabled: true,
                    top: 1,
                    left: 1,
                    blur: 2,
                    color: '#acb0c3',
                    opacity: 0.7,
                }
            },
            colors: ['#ff0000', '#ff00ff'],
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'flat'  
                },
            },
            dataLabels: {
                enabled: false
            },
            legend: {
                    position: 'bottom',
                    horizontalAlign: 'center',
                    fontSize: '14px',
                    markers: {
                    width: 10,
                    height: 10,
                    },
                    itemMargin: {
                    horizontal: 0,
                    vertical: 8
                    }
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            series: [{
                name: 'Orders',
                data: data.data
            }],
            xaxis: {
                categories: data.values,
            },
            fill: {
                type: 'gradient',
                gradient: {
                shade: 'light',
                type: 'vertical',
                shadeIntensity: 0.3,
                inverseColors: false,
                opacityFrom: 1,
                opacityTo: 0.8,
                stops: [0, 100]
                }
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val
                    }
                }
            }
            }

            var d_1C_3 = new ApexCharts(
                document.querySelector("#top_divers"),
                d_1options1
            );
            d_1C_3.render();
        }
        }); 
}

function delivered_orders()
    {
        var sort_day=$('#total_delivered_drop').val();
        $.ajax({
	        url:"router.php",
	        type: 'post',
            dataType: "json",
            data: {
                sort_day:sort_day,
                fx: 45
            },
	        success:function(data)
	        {
                // alert(data)
                $('#delivered_orders').html('')
                var d_1options1 = {
                chart: {
                    height: 350,
                    type: 'bar',
                    toolbar: {
                        show: false,
                    },
                    dropShadow: {
                        enabled: true,
                        top: 1,
                        left: 1,
                        blur: 2,
                        color: '#acb0c3',
                        opacity: 0.7,
                    }
                },
                colors: ['#5c1ac3', '#ffbb44'],
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'flat'  
                    },
                },
                dataLabels: {
                    enabled: false
                },
                legend: {
                        position: 'bottom',
                        horizontalAlign: 'center',
                        fontSize: '14px',
                        markers: {
                        width: 10,
                        height: 10,
                        },
                        itemMargin: {
                        horizontal: 0,
                        vertical: 8
                        }
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                series: [{
                    name: 'Orders',
                    data: data.data
                }],
                xaxis: {
                    categories: data.values,
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                    shade: 'light',
                    type: 'vertical',
                    shadeIntensity: 0.3,
                    inverseColors: false,
                    opacityFrom: 1,
                    opacityTo: 0.8,
                    stops: [0, 100]
                    }
                },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return val
                        }
                    }
                }
                }

                var d_1C_3 = new ApexCharts(
                    document.querySelector("#delivered_orders"),
                    d_1options1
                );
                d_1C_3.render();
	        }
	      }); 
    }

    function todays()
    {
        var sort_day=$('#todays_drop').val();
        $.ajax({
	        url:"router.php",
	        type: 'post',
            dataType: "json",
            data: {
                fx: 48
            },
	        success:function(data)
	        {
                $('#todays').html('')
                var d_1options1 = {
                chart: {
                    height: 350,
                    type: 'bar',
                    toolbar: {
                        show: false,
                    },
                    dropShadow: {
                        enabled: true,
                        top: 1,
                        left: 1,
                        blur: 2,
                        color: '#acb0c3',
                        opacity: 0.7,
                    }
                },
                colors: ['#00cc00', '#00ffff'],
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'flat'  
                    },
                },
                dataLabels: {
                    enabled: false
                },
                legend: {
                        position: 'bottom',
                        horizontalAlign: 'center',
                        fontSize: '14px',
                        markers: {
                        width: 10,
                        height: 10,
                        },
                        itemMargin: {
                        horizontal: 0,
                        vertical: 8
                        }
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                series: [{
                    name: 'Orders',
                    data: data.data
                }],
                xaxis: {
                    categories: data.values,
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                    shade: 'light',
                    type: 'vertical',
                    shadeIntensity: 0.3,
                    inverseColors: false,
                    opacityFrom: 1,
                    opacityTo: 0.8,
                    stops: [0, 100]
                    }
                },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return val
                        }
                    }
                }
                }

                var d_1C_3 = new ApexCharts(
                    document.querySelector("#todays"),
                    d_1options1
                );
                d_1C_3.render();
	        }
	      }); 
    }

    function top_customers()
    {
        var sort_day=$('#top_customers_drop').val();
        $.ajax({
	        url:"router.php",
	        type: 'post',
            dataType: "json",
            data: {
                sort_day:sort_day,
                fx: 47
            },
	        success:function(data)
	        {
                // alert(data)
                $('#top_customers').html('')
                var d_1options1 = {
                chart: {
                    height: 350,
                    type: 'bar',
                    toolbar: {
                        show: false,
                    },
                    dropShadow: {
                        enabled: true,
                        top: 1,
                        left: 1,
                        blur: 2,
                        color: '#acb0c3',
                        opacity: 0.7,
                    }
                },
                colors: ['#990033', '#ff6699'],
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'flat'  
                    },
                },
                dataLabels: {
                    enabled: false
                },
                legend: {
                        position: 'bottom',
                        horizontalAlign: 'center',
                        fontSize: '14px',
                        markers: {
                        width: 10,
                        height: 10,
                        },
                        itemMargin: {
                        horizontal: 0,
                        vertical: 8
                        }
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                series: [{
                    name: 'Orders',
                    data: data.data
                }],
                xaxis: {
                    categories: data.values,
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                    shade: 'light',
                    type: 'vertical',
                    shadeIntensity: 0.3,
                    inverseColors: false,
                    opacityFrom: 1,
                    opacityTo: 0.8,
                    stops: [0, 100]
                    }
                },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return val
                        }
                    }
                }
                }

                var d_1C_3 = new ApexCharts(
                    document.querySelector("#top_customers"),
                    d_1options1
                );
                d_1C_3.render();
	        }
	      }); 
    }