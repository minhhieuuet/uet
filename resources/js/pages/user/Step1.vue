<template>
  <div>
    <div class="step-content">
      <a-row class="row-item">
        <a-col :span="8" class="text-bold">Họ tên người thanh toán:</a-col>
        <a-col :span="8">Huy Nguyen</a-col>
      </a-row>
      <a-row class="row-item">
        <a-col :span="8" class="text-bold">Tên hồ sơ:</a-col>
        <a-col :span="8">ABC</a-col>
      </a-row>
      <a-row class="row-item">
        <a-col :span="8" class="text-bold">Đơn vị:</a-col>
        <a-col :span="8">UET</a-col>
      </a-row>
      <a-row class="row-item">
        <a-col :span="8" class="text-bold">Loại hồ sơ:</a-col>
        <a-col :span="8">Unknown</a-col>
      </a-row>
      <a-row class="row-item">
        <a-col :span="8" class="text-bold">Ngày nghiệp vụ phát sinh:</a-col>
        <a-col :span="8">2021/01/01</a-col>
      </a-row>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {};
  },
  methods: {
    handleSubmit() {
      this.$emit("nextStep");
    },
  },
};
</script>

<style lang="scss" scoped>
.form-content {
  .row-item {
    margin-bottom: 10px;

    .text-bold {
      font-weight: bold;
    }
  }
  
  .form-layout {
    padding-left: 30px;
  }
}
</style>
