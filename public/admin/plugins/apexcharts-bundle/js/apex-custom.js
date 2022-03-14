$(function () {
	"use strict";
	// chart 1
	var options = {
		series: [{
			name: 'Likes',
			data: [14, 3, 10, 9, 29, 19, 22, 9, 12, 7, 19, 5]
		}],
		chart: {
			foreColor: '#9ba7b2',
			height: 360,
			type: 'line',
			zoom: {
				enabled: false
			},
			toolbar: {
				show: true
			},
			dropShadow: {
				enabled: true,
				top: 3,
				left: 14,
				blur: 4,
				opacity: 0.10,
			}
		},
		stroke: {
			width: 5,
			curve: 'smooth'
		},
		xaxis: {
			//type: 'datetime',
			categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
		},
		title: {
			text: 'Line Chart',
			align: 'left',
			style: {
				fontSize: "16px",
				color: '#666'
			}
		},
		fill: {
			type: 'gradient',
			gradient: {
				shade: 'light',
				gradientToColors: ['#923eb9'],
				shadeIntensity: 1,
				type: 'horizontal',
				opacityFrom: 1,
				opacityTo: 1,
				stops: [0, 100, 100, 100]
			},
		},
		markers: {
			size: 4,
			colors: ["#923eb9"],
			strokeColors: "#fff",
			strokeWidth: 2,
			hover: {
				size: 7,
			}
		},
		colors: ["#923eb9"],
		yaxis: {
			title: {
				text: 'Engagement',
			},
		}
	};
	var chart = new ApexCharts(document.querySelector("#chart1"), options);
	chart.render();


	// chart 2
	var optionsLine = {
		chart: {
			foreColor: '#9ba7b2',
			height: 360,
			type: 'line',
			zoom: {
				enabled: false
			},
			dropShadow: {
				enabled: true,
				top: 3,
				left: 2,
				blur: 4,
				opacity: 0.1,
			}
		},
		stroke: {
			curve: 'smooth',
			width: 5
		},
		colors: ["#923eb9", '#18bb6b'],
		series: [{
			name: "Music",
			data: [1, 15, 56, 20, 33, 27, 15, 56, 20, 56]
		}, {
			name: "Photos",
			data: [30, 33, 21, 42, 30, 33, 21, 42, 19, 32]
		}],
		title: {
			text: 'Multiline Chart',
			align: 'left',
			offsetY: 25,
			offsetX: 20
		},
		subtitle: {
			text: 'Statistics',
			offsetY: 55,
			offsetX: 20
		},
		markers: {
			size: 4,
			strokeWidth: 0,
			hover: {
				size: 7
			}
		},
		grid: {
			show: true,
			padding: {
				bottom: 0
			}
		},
		//labels: ['01/15/2002', '01/16/2002', '01/17/2002', '01/18/2002', '01/19/2002', '01/20/2002'],
		xaxis: {
			//type: 'datetime',
			categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
		},
		legend: {
			position: 'top',
			horizontalAlign: 'right',
			offsetY: -20
		}
	}
	var chartLine = new ApexCharts(document.querySelector('#chart2'), optionsLine);
	chartLine.render();


	// chart 3
	var options = {
		series: [{
			name: 'series1',
			data: [31, 40, 68, 31, 92, 55, 100]
		}, {
			name: 'series2',
			data: [11, 82, 45, 80, 34, 52, 41]
		}],
		chart: {
			foreColor: '#9ba7b2',
			height: 360,
			type: 'area',
			zoom: {
				enabled: false
			},
			toolbar: {
				show: true
			},
		},
		colors: ["#923eb9", '#18bb6b'],
		title: {
			text: 'Area Chart',
			align: 'left',
			style: {
				fontSize: "16px",
				color: '#666'
			}
		},
		dataLabels: {
			enabled: false
		},
		stroke: {
			curve: 'smooth'
		},
		xaxis: {
			type: 'datetime',
			categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
		},
		tooltip: {
			x: {
				format: 'dd/MM/yy HH:mm'
			},
		},
	};
	var chart = new ApexCharts(document.querySelector("#chart3"), options);
	chart.render();

	// chart 4
	var options = {
		series: [{
			name: 'Net Profit',
			data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
		}, {
			name: 'Revenue',
			data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
		}, {
			name: 'Free Cash Flow',
			data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
		}],
		chart: {
			foreColor: '#9ba7b2',
			type: 'bar',
			height: 360
		},
		plotOptions: {
			bar: {
				horizontal: false,
				columnWidth: '55%',
				endingShape: 'rounded'
			},
		},
		dataLabels: {
			enabled: false
		},
		stroke: {
			show: true,
			width: 2,
			colors: ['transparent']
		},
		title: {
			text: 'Column Chart',
			align: 'left',
			style: {
				fontSize: '14px'
			}
		},
		colors: ["#6184ff", '#923eb9', '#c4d1ff'],
		xaxis: {
			categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
		},
		yaxis: {
			title: {
				text: '$ (thousands)'
			}
		},
		fill: {
			opacity: 1
		},
		tooltip: {
			y: {
				formatter: function (val) {
					return "$ " + val + " thousands"
				}
			}
		}
	};
	var chart = new ApexCharts(document.querySelector("#chart4"), options);
	chart.render();


	// chart 5
	var options = {
		series: [{
			data: [400, 430, 448, 470, 540, 580, 690, 610, 800, 980]
		}],
		chart: {
			foreColor: '#9ba7b2',
			type: 'bar',
			height: 350
		},
		colors: ["#f83030"],
		plotOptions: {
			bar: {
				horizontal: true,
				columnWidth: '35%',
				endingShape: 'rounded'
			}
		},
		dataLabels: {
			enabled: false
		},
		xaxis: {
			categories: ['South Korea', 'Canada', 'United Kingdom', 'Netherlands', 'Italy', 'France', 'Japan', 'United States', 'China', 'Germany'],
		}
	};
	var chart = new ApexCharts(document.querySelector("#chart5"), options);
	chart.render();


	// chart 6
	var options = {
		series: [{
			name: 'Website Blog',
			type: 'column',
			data: [440, 505, 414, 671, 227, 413, 201, 352, 752, 320, 257, 160]
		}, {
			name: 'Social Media',
			type: 'line',
			data: [23, 42, 35, 27, 43, 22, 17, 31, 22, 22, 12, 16]
		}],
		chart: {
			foreColor: '#9ba7b2',
			height: 350,
			type: 'line',
			zoom: {
				enabled: false
			},
			toolbar: {
				show: true
			},
		},
		stroke: {
			width: [0, 4]
		},
		plotOptions: {
			bar: {
				//horizontal: true,
				columnWidth: '35%',
				endingShape: 'rounded'
			}
		},
		colors: ["#0d6efd", "#212529"],
		title: {
			text: 'Traffic Sources'
		},
		dataLabels: {
			enabled: true,
			enabledOnSeries: [1]
		},
		labels: ['01 Jan 2001', '02 Jan 2001', '03 Jan 2001', '04 Jan 2001', '05 Jan 2001', '06 Jan 2001', '07 Jan 2001', '08 Jan 2001', '09 Jan 2001', '10 Jan 2001', '11 Jan 2001', '12 Jan 2001'],
		xaxis: {
			type: 'datetime'
		},
		yaxis: [{
			title: {
				text: 'Website Blog',
			},
		}, {
			opposite: true,
			title: {
				text: 'Social Media'
			}
		}]
	};
	var chart = new ApexCharts(document.querySelector("#chart6"), options);
	chart.render();






	// chart 13

	var options = {
          series: [44, 55, 67, 83],
          chart: {
			  foreColor: '#9ba7b2',
          height: 350,
          type: 'radialBar',
        },
        plotOptions: {
          radialBar: {
            dataLabels: {
              name: {
                fontSize: '22px',
              },
              value: {
                fontSize: '16px',
              },
              total: {
                show: true,
                label: 'Total',
                formatter: function (w) {
                  // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                  return 249
                }
              }
            }
          }
        },
		colors: ["#923eb9", "#f73757", "#18bb6b", "#32bfff"],
        labels: ['Apples', 'Oranges', 'Bananas', 'Berries'],
        };

        var chart = new ApexCharts(document.querySelector("#chart13"), options);
        chart.render();




});
