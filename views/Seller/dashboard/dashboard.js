// ---------------------------------- Chart คะแนนความพึงพอใจ ----------------------------------
var options = {
  series: [65],
  chart: {
    height: 350,
    type: "radialBar",
    toolbar: {
      show: true,
    },
  },
  plotOptions: {
    radialBar: {
      startAngle: -135,
      endAngle: 225,
      hollow: {
        margin: 0,
        size: "70%",
        background: "#fff",
        image: undefined,
        imageOffsetX: 0,
        imageOffsetY: 0,
        position: "front",
        dropShadow: {
          enabled: true,
          top: 3,
          left: 0,
          blur: 4,
          opacity: 0.24,
        },
      },
      track: {
        background: "#fff",
        strokeWidth: "67%",
        margin: 0, // margin is in pixels
        dropShadow: {
          enabled: true,
          top: -3,
          left: 0,
          blur: 4,
          opacity: 0.35,
        },
      },

      dataLabels: {
        show: true,
        name: {
          offsetY: -10,
          show: true,
          color: "#888",
          fontSize: "17px",
        },
        value: {
          formatter: function (val) {
            return parseInt(val);
          },
          color: "#111",
          fontSize: "36px",
          show: true,
        },
      },
    },
  },
  fill: {
    type: "gradient",
    gradient: {
      shade: "light",
      type: "horizontal",
      shadeIntensity: 0.5,
      //   color: "#1ab309",
      //   gradientToColors: ["#FF6F6F", "#FF9140", "#1ab309"],
      //   colors: ["#2E93fA", "#66DA26", "#546E7A", "#E91E63", "#FF9800"],
      colorStops: [
        {
          offset: 25,
          color: "#FF6F6F",
          opacity: 1,
        },
        {
          offset: 50,
          color: "#FAD375",
          opacity: 1,
        },
        {
          offset: 75,
          color: "#FFFF35",
          opacity: 1,
        },
        {
          offset: 100,
          color: "#57ab51",
          opacity: 1,
        },
      ],
      inverseColors: true,
      opacityFrom: 1,
      opacityTo: 1,
      stops: [0, 50, 100],
    },
  },
  stroke: {
    lineCap: "round",
  },
  labels: ["คะแนน"],
};

var chart = new ApexCharts(document.querySelector("#star"), options);
chart.render();

// ---------------------------------- Chart Business Insights ----------------------------------
var options = {
  series: [
    {
      name: "ยอดขาย",
      data: [0, 10000, 5000, 15000, 10000, 20000, 15000, 25000, 20000],
    },
  ],
  chart: {
    height: 350,
    type: "area",
  },
  dataLabels: {
    enabled: false,
  },
  stroke: {
    curve: "smooth",
  },
  xaxis: {
    type: "datetime",
    categories: [
      "2021-07-11T00:00:00.000Z",
      "2021-07-11T03:00:00.000Z",
      "2021-07-11T06:00:00.000Z",
      "2021-07-11T09:00:00.000Z",
      "2021-07-11T12:00:00.000Z",
      "2021-07-11T15:00:00.000Z",
      "2021-07-11T18:00:00.000Z",
      "2021-07-11T21:00:00.000Z",
      "2021-07-11T23:59:59.999Z",
    ],
  },
  tooltip: {
    x: {
      format: "dd/MM/yy HH:mm",
    },
  },
};

var chart = new ApexCharts(
  document.querySelector("#Business-Insights"),
  options
);
chart.render();
