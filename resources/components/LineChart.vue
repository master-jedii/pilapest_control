<template>
    <div>
      <Line :data="chartData" :options="chartOptions" />
    </div>
  </template>
  
  <script>
  import { Line } from 'vue-chartjs';
  import { Chart as ChartJS, Title, Tooltip, Legend, LineElement, CategoryScale, LinearScale } from 'chart.js';
  
  // Register required Chart.js components
  ChartJS.register(Title, Tooltip, Legend, LineElement, CategoryScale, LinearScale);
  
  export default {
    name: 'LineChart',
    components: {
      Line
    },
    props: {
      chartData: Object
    },
    data() {
      return {
        chartOptions: {
          responsive: true,
          plugins: {
            title: {
              display: true,
              text: 'Sales Overview'
            },
          },
          scales: {
            x: {
              beginAtZero: true
            },
            y: {
              beginAtZero: true
            }
          }
        }
      };
    }
  };
  </script>
  