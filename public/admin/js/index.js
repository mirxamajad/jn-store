$(function() {



    // chart5
    var ctx = document.getElementById('chart5').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
            datasets: [{
                label: 'Earnings',
                data: [12, 10, 13, 25, 14, 10, 14],
                backgroundColor: [
                    '#923eb9'
                ],
                /* fill: {
                    target: 'origin',
                    above: 'rgb(146 62 185 / 21%)',   // Area will be red above the origin
                    below: 'rgb(146 62 185 / 21%)'    // And blue below the origin
                  }, */
                tension: 0.4,
                borderColor: [
                    '#923eb9'
                ],
                borderWidth: 0,
                borderRadius: 0
            },
            {
                label: 'Orders',
                data: [8, 15, 9, 18, 10, 16, 8],
                backgroundColor: [
                    '#18bb6b'
                ],
                fill: {
                    target: 'origin',
                    above: 'rgb(24 187 107 / 21%)',   // Area will be red above the origin
                    below: 'rgb(24 187 107 / 21%)'    // And blue below the origin
                  },
                tension: 0.4,
                borderColor: [
                    '#18bb6b'
                ],
                borderWidth: 0,
                borderRadius: 0
            }]
        },
        options: {
            maintainAspectRatio: false,
            barPercentage: 0.7,
            categoryPercentage: 0.35,
            plugins: {
                legend: {
                    maxWidth: 20,
                    boxHeight: 20,
                    position:'bottom',
                    display: true,
                }
            },
            scales: {
                x: {
                  stacked: false,
                  beginAtZero: true
                },
                y: {
                  stacked: false,
                  beginAtZero: true
                }
              }
        }
    });




      // chart6
      var ctx = document.getElementById('chart6').getContext('2d');
      var myChart = new Chart(ctx, {
          type: 'pie',
          data: {
              labels: ['New', 'Shipping', 'Delivered','Decline'],
              datasets: [{
                  data: [55, 20, 10,5],
                  backgroundColor: [
                      '#3361ff',
                      '#18bb6b',
                      '#ffab4d',
                      '#f73757'
                  ],
                  borderWidth: 1
              }]
          },
          options: {
             maintainAspectRatio: false,
             cutout: 105,
             plugins: {
                legend: {
                    display: false,
                }
            }

          }
      });







});
