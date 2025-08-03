// =============== Camembert
const pie_chart = document.getElementById('pieChart');

new Chart(pie_chart, {
    type: 'pie',
    data: {
        labels: ['Légende 1', 'Légende 2', 'Légende 3', 'Légende 4'],
        datasets: [{
            data: [50, 30, 15, 5],
            backgroundColor: ['#add8e6', '#002e84', '#b6f5c5', '#3a0d0d']
        }]
    }
});

// =============== En barre
const bar_chart = document.getElementById('barChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Légende 1', 'Légende 2', 'Légende 3', 'Légende 4'],
        datasets: [{
            data: [50, 30, 15, 5],
            backgroundColor: ['#add8e6', '#002e84', '#b6f5c5', '#3a0d0d']
        }]
    }
});