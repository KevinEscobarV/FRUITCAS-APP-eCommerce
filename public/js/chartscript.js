function generarGraficaVentas() {
  var ctx = document.getElementById('ChartBarVentas').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['PENDIENTE', 'RECIBIDO', 'ENVIADO', 'ENTREGADO', 'ANULADO'],
      datasets: [{
        label: 'Grfica de Barras de Ventas',
        data: cantVentas,
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(20, 184, 166, 0.5)',
          'rgba(139, 139, 139, 0.5)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(20, 184, 166, 1)',
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

  var ctx = document.getElementById('ChartDoughnutVentas').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ['PENDIENTE', 'RECIBIDO', 'ENVIADO', 'ENTREGADO', 'ANULADO'],
      datasets: [{
        label: 'Grafica Torta de Ventas',
        data: cantVentas,
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(20, 184, 166, 0.5)',
          'rgba(139, 139, 139, 0.5)',
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
}

function generarGraficaProducts() {
  var ctx = document.getElementById('ChartBarProducts').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: nomProducts,
      datasets: [{
        label: 'Grfica de Barras de Productos',
        data: cantProducts,
        backgroundColor: 
          'rgba(0, 219, 216, 0.2)',     
        borderColor: 
          'rgba(0, 219, 216, 1)',
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

}

function generarGraficaFruits() {
  var ctx = document.getElementById('ChartBarFruits').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: nomFruits,
      datasets: [{
        label: 'Grfica de Barras de Materia Prima',
        data: cantFruits,
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(20, 184, 166, 0.5)',
          'rgba(139, 139, 139, 0.5)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(20, 184, 166, 1)',
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

  var ctx = document.getElementById('ProductsBar').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: nomFruits,
      datasets: [{
        label: 'Grfica de Barras de Materia Prima',
        data: cantFruits,
        backgroundColor:
          'rgba(0, 155, 255, 0.2)'
          ,
        borderColor: 
          'rgba(19, 109, 167, 1)',
         
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

  var ctx = document.getElementById('ChartPieFruits').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: nomFruits,
      datasets: [{
        label: 'Grafica Torta de Ventas',
        data: cantFruits,
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(20, 184, 166, 0.5)',
          'rgba(139, 139, 139, 0.5)',
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

}

function generarGraficaBig() {


    var ctx = document.getElementById('updatingMonthlyChart').getContext('2d');
    var myChart = new Chart(ctx, {

          type: 'line',
          data: {
              labels: idorder,
              datasets: [{
                  label: 'Valor Ventas',
                  data: valores,
                  fill: false,
                  borderColor: 'rgb(75, 192, 192)',
                  tension: 0.1,    
                  borderWidth: 2
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

   
}