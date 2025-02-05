document.addEventListener("DOMContentLoaded", function () {
    const dropdowns = [
        {
            id: "dropdownTipe",
            itemClass: "item-tipe-dokumen",
            inputId: "tipeDokumen",
        },
        {
            id: "dropdownJenis",
            itemClass: "item-jenis-dokumen",
            inputId: "jenisDokumen",
        },
        { id: "dropdownStatus", itemClass: "item-status", inputId: "status" },
    ];

    dropdowns.forEach(function (dropdown) {
        const dropdownElement = document.getElementById(dropdown.id);
        const dropdownItems = document.querySelectorAll(
            `.dropdown-item.${dropdown.itemClass}`
        );
        const inputElement = document.getElementById(dropdown.inputId);

        dropdownItems.forEach(function (item) {
            item.addEventListener("click", function (e) {
                e.preventDefault();
                const selectedValue = item.getAttribute("data-value");
                dropdownElement.textContent = selectedValue || "- Pilih -";
                inputElement.value = selectedValue;
            });
        });
    });

    const chartOptions = {
        maintainAspectRatio: false,
        legend: {
            display: false,
        },
        tooltips: {
            enabled: false,
        },
        elements: {
            point: {
                radius: 0
            },
        },
        scales: {
            xAxes: [{
                gridLines: false,
                scaleLabel: false,
                ticks: {
                    display: false
                }
            }],
            yAxes: [{
                gridLines: false,
                scaleLabel: false,
                ticks: {
                    display: false,
                    suggestedMin: 0,
                    suggestedMax: 10
                }
            }]
        }
    };
    //
    var ctx = document.getElementById('chart1').getContext('2d');
    var chart = new Chart(ctx, {
        type: "line",
        data: {
            labels: [1, 2, 1, 3, 5, 4, 7],
            datasets: [
                {
                    backgroundColor: "rgba(101, 116, 205, 0.1)",
                    borderColor: "rgba(101, 116, 205, 0.8)",
                    borderWidth: 2,
                    data: [1, 2, 1, 3, 5, 4, 7],
                },
            ],
        },
        options: chartOptions
    });
});
