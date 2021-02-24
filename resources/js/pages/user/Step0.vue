<template>
  <div>
    <div class="step-content">
      <a-row class="row-item">
        <a-col :span="8" class="text-bold">Ho va ten:</a-col>
        <a-col :span="8">Huy Nguyen</a-col>
      </a-row>
      <a-row class="row-item">
        <a-col :span="8" class="text-bold">Ten ho so:</a-col>
        <a-col :span="8">ABC</a-col>
      </a-row>
      <a-row class="row-item">
        <a-col :span="8" class="text-bold">Don vi:</a-col>
        <a-col :span="8">UET</a-col>
      </a-row>
      <a-row class="row-item">
        <a-col :span="8" class="text-bold">Loai ho so:</a-col>
        <a-col :span="8">Unknown</a-col>
      </a-row>
      <a-row class="row-item">
        <a-col :span="8" class="text-bold">Thoi gian phat sinh:</a-col>
        <a-col :span="8">2021/01/01</a-col>
      </a-row>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {

    }
  },
  methods:{
    handleSubmit() {
      this.$emit('nextStep')
    }
  }
}
</script>

<style lang="scss" scoped>
  .form-content {
    .row-item {
      margin-bottom: 10px;

      .text-bold {
        font-weight: bold;
      }
    }
  }
</style>
