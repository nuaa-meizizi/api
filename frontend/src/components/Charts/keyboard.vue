<template>
  <div :class="className" :id="id" :style="{height:height,width:width}"></div>
</template>

<script type="text/javascript"

<script>
import echarts from 'echarts'
import resize from './mixins/resize'
require('echarts/map/js/china')

export default {
  mixins: [resize],
  props: {
    className: {
      type: String,
      default: 'chart'
    },
    id: {
      type: String,
      default: 'chart'
    },
    width: {
      type: String,
      default: '800px'
    },
    height: {
      type: String,
      default: '800px'
    }
  },
  data() {
    return {
      chart: null
    }
  },
  mounted() {
    this.initChart()
  },
  beforeDestroy() {
    if (!this.chart) {
      return
    }
    this.chart.dispose()
    this.chart = null
  },
  methods: {

    initChart() {
      this.chart = echarts.init(document.getElementById(this.id))

      function randomValue() {
        return Math.round(Math.random() * 1000)
      }

      const option = {
        tooltip: {},
        visualMap: {
          min: 0,
          max: 1500,
          left: 'left',
          top: 'bottom',
          text: ['High', 'Low'],
          seriesIndex: [1],
          inRange: {
            color: ['#e0ffff', '#006edd']
          },
          calculable: true
        },
        geo: {
          map: 'china',
          roam: true,
          label: {
            normal: {
              show: true,
              textStyle: {
                color: 'rgba(0,0,0,0.4)'
              }
            }
          },
          itemStyle: {
            normal: {
              borderColor: 'rgba(0, 0, 0, 0.2)'
            },
            emphasis: {
              areaColor: null,
              shadowOffsetX: 0,
              shadowOffsetY: 0,
              shadowBlur: 20,
              borderWidth: 0,
              shadowColor: 'rgba(0, 0, 0, 0.5)'
            }
          }
        },
        series: [
          {
            type: 'scatter',
            coordinateSystem: 'geo',
            data: [],
            symbolSize: 20,
            symbol: 'path://M1705.06,1318.313v-89.254l-319.9-221.799l0.073-208.063c0.521-84.662-26.629-121.796-63.961-121.491c-37.332-0.305-64.482,36.829-63.961,121.491l0.073,208.063l-319.9,221.799v89.254l330.343-157.288l12.238,241.308l-134.449,92.931l0.531,42.034l175.125-42.917l175.125,42.917l0.531-42.034l-134.449-92.931l12.238-241.308L1705.06,1318.313z',
            symbolRotate: 35,
            label: {
              normal: {
                formatter: '{b}',
                position: 'right',
                show: false
              },
              emphasis: {
                show: true
              }
            },
            itemStyle: {
              normal: {
                color: '#F06C00'
              }
            }
          },
          {
            name: '当前在线人数',
            type: 'map',
            geoIndex: 0,
            // tooltip: {show: false},
            data: [
              { name: '北京', value: randomValue() },
              { name: '天津', value: randomValue() },
              { name: '上海', value: randomValue() },
              { name: '重庆', value: randomValue() },
              { name: '河北', value: randomValue() },
              { name: '河南', value: randomValue() },
              { name: '云南', value: randomValue() },
              { name: '辽宁', value: randomValue() },
              { name: '黑龙江', value: randomValue() },
              { name: '湖南', value: randomValue() },
              { name: '安徽', value: randomValue() },
              { name: '山东', value: randomValue() },
              { name: '新疆', value: randomValue() },
              { name: '江苏', value: randomValue() },
              { name: '浙江', value: randomValue() },
              { name: '江西', value: randomValue() },
              { name: '湖北', value: randomValue() },
              { name: '广西', value: randomValue() },
              { name: '甘肃', value: randomValue() },
              { name: '山西', value: randomValue() },
              { name: '内蒙古', value: randomValue() },
              { name: '陕西', value: randomValue() },
              { name: '吉林', value: randomValue() },
              { name: '福建', value: randomValue() },
              { name: '贵州', value: randomValue() },
              { name: '广东', value: randomValue() },
              { name: '青海', value: randomValue() },
              { name: '西藏', value: randomValue() },
              { name: '四川', value: randomValue() },
              { name: '宁夏', value: randomValue() },
              { name: '海南', value: randomValue() },
              { name: '台湾', value: randomValue() },
              { name: '香港', value: randomValue() },
              { name: '澳门', value: randomValue() }
            ]
          }
        ]
      }

      this.chart.setOption(option, true)
    }
  }
}
</script>
