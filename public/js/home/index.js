$(function () {
    var summary = [];
    var label = [];
    var datasetPengunjung = [];
    var datasetPendapatan = [];
    $.ajax({
        url: baseUrl + '/wisata/getSummary',
        method: 'post',
        dataType: 'json',
        success: function (result) {
            var total_pengunjung = [];
            var total_pendapatan = [];
            var backgroundColor = [];

            for (let i = 0; i < result.length; i++) {
                label.push(result[i].tempat_wisata);
                total_pengunjung.push(result[i].total_pengunjung);
                total_pendapatan.push(result[i].total_pendapatan);

                var color = randomRgbColor();
                var strBgColor = "rgb(";
                for (let j = 0; j < color.length; j++) {
                    if (color.length - 1 == j) {
                        strBgColor = strBgColor + color[j] + ")";
                    } else {
                        strBgColor = strBgColor + color[j] + ",";
                    }
                }
                backgroundColor.push(strBgColor);
            }


            datasetPengunjung.push({
                label: "Total Pengunjung",
                data: total_pengunjung,
                backgroundColor: backgroundColor,
                hoverOffset: 4
            })
            datasetPendapatan.push({
                label: "Total Pendapatan",
                data: total_pendapatan,
                backgroundColor: backgroundColor,
                hoverOffset: 4
            })

            const ctx = document.getElementById('totalPengunjung');
            const ctx2 = document.getElementById('totalPendapatan');

            const data = {
                labels: label,
                datasets: datasetPengunjung
            };
            const data2 = {
                labels: label,
                datasets: datasetPendapatan
            };

            const config = {
                type: 'doughnut',
                data: data,
            };
            const config2 = {
                type: 'doughnut',
                data: data2,
            };

            const totalPengunjungChart = new Chart(ctx, config);
            const totalPendapatanChart = new Chart(ctx2, config2);
        }
    });
    function randomRgbColor() {
        let r = randomInteger(255);
        let g = randomInteger(255);
        let b = randomInteger(255);
        return [r, g, b];
    }
    function randomInteger(max) {
        return Math.floor(Math.random() * (max + 1));
    }
});