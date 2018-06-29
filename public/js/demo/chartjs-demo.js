    $(function () {
        // $b='';
        // $('.nameagency').each(function(index, el) {
        //     $b +=$(this).text()+',';
        // });
        // $b = $b.substring(0, $b.length-1);
        // var array= $b.split(",");console.log($b);
        $.ajax({
            url: '/path/to/file',
            type: 'default GET (Other values: POST)',
            dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
            data: {param1: 'value1'},
            success: function(data){
                var data = JSON.parse(JSON.stringify(data));
                var barData = {
                    labels: ['Tháng 1','Tháng 2','Tháng 3','Tháng 4','Tháng 5','Tháng 6','Tháng 7','Tháng 8','Tháng 9','Tháng 10','Tháng 11','Tháng 12',],
                    datasets: [
                            {
                                label: "Data 1",
                                backgroundColor: 'rgba(220, 220, 220, 0.5)',
                                pointBorderColor: "#fff",
                                data: [65, 59, 80, 81, 56, 55, 40]
                            },
                        {
                            label: "Data 2",
                            backgroundColor: 'rgba(26,179,148,0.5)',
                            borderColor: "rgba(26,179,148,0.7)",
                            pointBackgroundColor: "rgba(26,179,148,1)",
                            pointBorderColor: "#fff",
                            data: [28, 48, 40, 19, 86, 27, 90]
                        }
                    ]
                };

                var barOptions = {
                    responsive: true
                };
                var ctx2 = document.getElementById("barChart").getContext("2d");
                new Chart(ctx2, {type: 'bar', data: barData, options:barOptions});
            }
        })
    });