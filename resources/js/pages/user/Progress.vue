<template>
  <modal name="progress"
        width="800"
        height="auto"
        :scrollable="true"
        :click-to-close="true"
        @before-open="beforeOpen"
        @before-close="beforeClose"
  >
    <div class="content">
      <div slot="top-right">
        <a-icon type="close" class="top-right" @click="$modal.hide('progress')" />
      </div>
      <span class="md-title">{{title}}</span>
      <a-divider />
      <a-row>
        <a-col :span="18" class="form-content">
          <div class="step-content">
            <a-row class="row-item">
              <a-col :span="6" class="text-bold">Full name:</a-col>
              <a-col :span="8">Huy Nguyen</a-col>
            </a-row>
            <a-row class="row-item">
              <a-col :span="6" class="text-bold">File name:</a-col>
              <a-col :span="8">ABC</a-col>
            </a-row>
            <a-row class="row-item">
              <a-col :span="6" class="text-bold">Unit:</a-col>
              <a-col :span="8">UET</a-col>
            </a-row>
            <a-row class="row-item">
              <a-col :span="6" class="text-bold">File type:</a-col>
              <a-col :span="8">Unknown</a-col>
            </a-row>
            <a-row class="row-item">
              <a-col :span="6" class="text-bold">Time:</a-col>
              <a-col :span="8">2021/01/01</a-col>
            </a-row>
          </div>
          <div class="btn-submit">
            <a-button type="primary" @click="nextStep">
              Submit
            </a-button>
          </div>
        </a-col>
        <a-col :span="6">
          <a-steps direction="vertical" size="small" :current="current">
            <a-step title="Waiting" />
            <a-step title="Take file" />
            <a-step title="Next" />
          </a-steps>
        </a-col>
      </a-row>
    </div>
  </modal>
</template>

<script>
export default {
  data() {
    return {
      title: 'File',
      current: 0,
    }
  },
  methods: {
    nextStep() {
      this.current++;
    }
  }
}
</script>

<style lang="scss" scoped>
  .content {
    padding: 30px 30px 10px 30px;
  }
  .md-right {
    float: right;
    padding: 0px 10px 20px;
  }
  .top-right {
    float: right;
    position: relative;
    top: 5px;
  }
  .form-content {
    .row-item {
      margin-bottom: 10px;

      .text-bold {
        font-weight: bold;
      }
    }

    .btn-submit {
      margin-top: 40px;
      margin-bottom: 20px;
    }
  }
</style>