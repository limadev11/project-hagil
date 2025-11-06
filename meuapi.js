window.onload = function() {
    const meuapi = document.getElementById('btnapi');
  
    meuapi.addEventListener('click', consomeapi);
  }
  
  function consomeapi() {
    var comando = 'http://localhost/gestaodevendas/meuapi.php?';
    var resultado = document.getElementById('resultado');
    fetch(comando)
      .then(response => response.json())
      .then(data => {
        var vendas = data[0].total;
        var despesas = data[1].total;
        if (vendas && despesas) {
  
          var chart = new CanvasJS.Chart("container", {
            title: {
              text: "Vendas e Despesas"
            },
            data: [
              {
                type: "doughnut",
                dataPoints: [
                  { label: "Vendas", y: Number(vendas) },
                  { label: "Despesas", y: Number(despesas) },
                ]
              }
            ]
          });
          chart.render();
        } else {
          document.getElementById('resultado').innerText = data.erro || 'Erro ao buscar cliente';
        }
      })
      .catch(error => {
        resultado.innerText = 'Erro na requisição: ' + error;
      });
  }
  