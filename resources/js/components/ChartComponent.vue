<template>
    <div>
      <div id="chartdiv" style="width: 100%; height: 400px;"></div>
    </div>
  </template>
  
  <script>
  import * as am4core from "@amcharts/amcharts4/core";
  import * as am4charts from "@amcharts/amcharts4/charts";
  import am4themes_animated from "@amcharts/amcharts4/themes/animated";
  
  export default {
    props: ["datos"],
    data() {
      return {
        chart: null,
      };
    },
    mounted() {
        console.log(this.datos);
      am4core.useTheme(am4themes_animated);
  
      // Create chart instance
      let chart = am4core.create("chartdiv", am4charts.XYChart);
  
      // Definir los datos para el gráfico
      chart.data = this.datos;
  
      // Crear ejes y series
      let categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
      categoryAxis.dataFields.category = "tipo";
  
      let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
  
      let series = chart.series.push(new am4charts.ColumnSeries());
      series.dataFields.valueY = "cantidad";
      series.dataFields.categoryX = "tipo";
      series.name = "Casos por Tipo";
      series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
  
      // Configuración adicional del gráfico, como títulos, leyendas, etc.
  
      chart.cursor = new am4charts.XYCursor();
  
      let scrollbarX = new am4charts.XYChartScrollbar();
      chart.scrollbarX = scrollbarX;
  
      this.chart = chart;
    },
  
    beforeDestroy() {
      if (this.chart) {
        this.chart.dispose();
      }
    },
  };
  </script>
  