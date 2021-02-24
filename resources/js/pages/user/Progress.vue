<template>
  <modal
    name="progress"
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
      <span class="md-title">{{ title }}</span>
      <a-divider />
      <a-row>
        <a-col :span="17" class="form-content">
          <div class="file-info">
            <Step1 />
          </div>
          <div class="btn-submit" v-if="current === 1">
            <a-button type="primary" @click="nextStep"> Tiếp nhận </a-button>
          </div>
          <Step2 @toStep2="showConfirm" v-if="current === 2" />
          <Step3 @toStep3="showConfirm" v-if="current === 3" />
          <Step4 @toStep4="showConfirm" v-if="current === 4" />
          <Step4 @toStep5="showConfirm" v-if="current === 5" />
          <Step4 @toStep6="showConfirm" v-if="current === 6" />
          <Step4 @toStep7="showConfirm" v-if="current === 7" />
          <Step4 @toStep8="showConfirm" v-if="current === 8" />
          <Step4 @toStep9="showConfirm" v-if="current === 9" />
          <Step4 @toStep10="showConfirm" v-if="current === 10" />

        </a-col>
        <a-col :span="7">
          <a-steps direction="vertical" size="small" :current="current">
            <a-step title="Chờ KTV xử lý" />
            <a-step title="KTV tiếp nhận hồ sơ" />
            <a-step title="KTV trình KTT" />
            <a-step title="KTT ký duyệt HS" />
            <a-step title="BGH phê duyệt" />
            <a-step title="KTV lập phiếu chi/UNC" />
            <a-step title="KTT ký duyệt phiếu" />
            <a-step title="BGH duyệt (UNC)" />
            <a-step title="KTV chuyển KB/NH" />
            <a-step title="Thanh toán" />
          </a-steps>
        </a-col>
      </a-row>
    </div>
  </modal>
</template>

<script>
import Step1 from "./Step1";
import Step2 from "./Step2";
import Step3 from "./Step3";
import Step4 from "./Step4";
import Step5 from "./Step5";
import Step6 from "./Step6";
import Step7 from "./Step7";
import Step8 from "./Step8";
import Step9 from "./Step9";
import Step10 from "./Step10";


export default {
  components: {
    Step1,
    Step2,
    Step3,
    Step4,
    Step5,
    Step6,
    Step7,
    Step8,
    Step9,
    Step10,
  },
  data() {
    return {
      title: "Thông tin hồ sơ",
      current: 1,
    };
  },
  methods: {
    nextStep() {
      this.current++;
    },
    showConfirm() {
      this.$confirm({
        title: "Bạn có muốn chuyển sang bước tiếp theo?",
        content: "Khi đã chuyển sang bước kế tiếp, thông tin sẽ không thể sửa đổi",
        onOk: () => {
          this.nextStep();
        },
        onCancel() {},
        cancelText: "Hủy bỏ",
      });
    },
  },
};
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
  padding-right: 10px;

  .file-info {
    padding-left: 30px;
    margin-bottom: 40px;
  }

  .btn-submit {
    padding-left: 30px;
    margin-bottom: 20px;
  }
}
</style>
