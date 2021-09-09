var nombres=[];
var valores=[];

$.ajax({
  headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
  url: 'admin/chart',
  method: 'POST',
}).done(function(respuesta){

    var arreglo = JSON.parse(respuesta);

    for (let x = 0; x < arreglo.length; x++) {
      nombres.push(arreglo[x].name);
      valores.push(arreglo[x].quantity);
    }

    generarGraficaBig();
})

$.ajax({
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  url: 'admin/chartUser',
  method: 'POST',
}).done(function(respuesta){

    var arreglo = JSON.parse(respuesta);

    for (let x = 0; x < arreglo.length; x++) {
    }
    
})

var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 16, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

var ctx = document.getElementById('chartventas').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});


const monthDays = [
    '1',
    '2',
    '3',
    '4',
    '5',
    '6',
    '7',
    '8',
    '9',
    '10',
    '11',
    '12',
    '13',
    '14',
    '15',
    '16',
    '17',
    '18',
    '19',
    '20',
    '21',
    '22',
    '23',
    '24',
    '25',
    '26',
    '27',
    '28',
    '29',
    '30',
    '31',
  ]
  
  const lineChartOptions = {
    scales: {
      yAxes: [
        {
          display: false,
        },
      ],
      xAxes: [
        {
          display: false,
        },
      ],
    },
    maintainAspectRatio: false,
    legend: {
      display: false,
    },
    hover: {
      mode: 'nearest',
      intersect: false,
    },
    tooltips: false,
  }

const usersCanvas = document.getElementById('usersChart').getContext('2d')
const usersChart = new Chart(usersCanvas, {
  type: 'line',
  data: {
    labels: monthDays,
    datasets: [
      {
        data: [
          21, 20, 24, 20, 18, 17, 15, 17, 18, 30, 31, 30, 30, 35, 25, 35, 35, 40, 60, 90, 90, 90, 85, 70, 75, 70, 30,
          30, 30, 50, 72,
        ],
        backgroundColor: ['rgba(55, 125, 255, 0)', 'rgba(255, 255, 255, 0)'],
        borderColor: '#377dff',
        borderWidth: 2,
        pointRadius: 0,
        pointHoverRadius: 0,
      },
    ],
  },
  options: lineChartOptions,
})
  

  function generarGraficaBig(){
  const updatingMonthlyCanvas = document.getElementById('updatingMonthlyChart').getContext('2d')
  const updatingMonthlyChart = new Chart(updatingMonthlyCanvas, {
    type: 'bar',
    data: {
      labels: nombres,
      datasets: [
        {
          data: valores,
          backgroundColor: '#377dff',
          hoverBackgroundColor: '#377dff',
          borderColor: '#377dff',
        },
        {
          data: valores,
          backgroundColor: '#e7eaf3',
          borderColor: '#e7eaf3',
        },
      ],
    },
    options: {
      scales: {
        yAxes: [
          {
            gridLines: {
              color: '#e7eaf3',
              drawBorder: false,
              zeroLineColor: '#e7eaf3',
            },
            ticks: {
              beginAtZero: true,
              stepSize: 5,
              fontSize: 12,
              fontColor: '#97a4af',
              fontFamily: 'Open Sans, sans-serif',
              padding: 10,
              postfix: '$',
            },
          },
        ],
        xAxes: [
          {
            gridLines: {
              display: false,
              drawBorder: false,
            },
            ticks: {
              fontSize: 12,
              fontColor: '#97a4af',
              fontFamily: 'Open Sans, sans-serif',
              padding: 5,
            },
            categoryPercentage: 0.5,
            maxBarThickness: '10',
          },
        ],
      },
      cornerRadius: 2,
      maintainAspectRatio: false,
      legend: {
        display: false,
      },
      tooltips: {
        prefix: '$',
        hasIndicator: true,
        mode: 'index',
        intersect: false,
      },
      hover: {
        mode: 'nearest',
        intersect: true,
      },
    },
  })
  }