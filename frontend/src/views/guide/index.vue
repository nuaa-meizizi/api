<template>
  <div class="app-container">
    <p class="warn-content">
      这里看需求 要不要放个那啥的引导
    </p>
    <el-button icon='el-icon-question' type="primary" @click.prevent.stop="guide">{{$t('guide.button')}}</el-button>
  </div>
</template>

<script>
import * as Driver from 'driver.js' // import driver.js
import 'driver.js/dist/driver.min.css' // import driver.js css
import steps from './defineSteps'

export default {
  name: 'guide',
  data() {
    return {
      driver: null
    }
  },
  mounted() {
    this.driver = new Driver()
  },
  methods: {
    guide() {
      this.driver.defineSteps(steps)
      this.driver.start()
    }
  }
}
</script>
