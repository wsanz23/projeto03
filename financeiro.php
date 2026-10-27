<?<php>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<title>Document</title>
</head>
<body>

<script>
const ctx = document.getElementById('financeiroChart').getContext('2d');
const financeiroChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set'],
        datasets: [
            {
                label: 'Faturamento (R$)',
                data: [38000, 41000, 40500, 43000, 44500, 45200],
                backgroundColor: '#18bc9c'
                },
                {
                    label: 'Despesas (R$)',
                    data: [20000, 22000, 19000, 21000, 23000, 20500],
                    backgroundColor: '#e74c3c'
                    }
                    ]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: { beginAtZero: true }
                            }
                            }
                            });
                            </script>  
                            </body>
                            </html>
                            
                            </php>