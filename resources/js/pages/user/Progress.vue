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
            <div>
              <div class="step-content">
                <a-row class="row-item">
                  <a-col :span="8" class="text-bold">Họ tên người thanh toán:</a-col>
                  <a-col :span="8">{{ file.payer_name }}</a-col>
                </a-row>
                <a-row class="row-item">
                  <a-col :span="8" class="text-bold">Tên hồ sơ:</a-col>
                  <a-col :span="8">{{ file.name }}</a-col>
                </a-row>
                <a-row class="row-item">
                  <a-col :span="8" class="text-bold">Đơn vị:</a-col>
                  <a-col
                    :span="8"
                    v-html="file.organization ? file.organization.name : ''"
                  ></a-col>
                </a-row>
                <a-row class="row-item">
                  <a-col :span="8" class="text-bold">Loại hồ sơ:</a-col>
                  <a-col
                    :span="8"
                    v-html="file.file_type ? file.file_type.name : ''"
                  ></a-col>
                </a-row>
                <a-row class="row-item">
                  <a-col :span="8" class="text-bold">Ngày nghiệp vụ phát sinh:</a-col>
                  <a-col :span="8">{{ file.created_at }}</a-col>
                </a-row>
              </div>
            </div>
          </div>
          <div class="btn-submit" v-show="current == 1">
            <a-button type="primary" @click="nextStep"> Tiếp nhận </a-button>
          </div>

          <Step2 @toStep3="showConfirm" v-if="current === 2" />
          <Step3 @toStep4="showConfirm" v-if="current === 3" />
          <Step4 @toStep5="showConfirm" v-if="current === 4" />
          <Step5 @toStep6="showConfirm" v-if="current === 5" />
          <Step6 @toStep7="showConfirm" v-if="current === 6" />
          <Step7 @toStep8="showConfirm" v-if="current === 7" />
          <Step8 @toStep9="showConfirm" v-if="current === 8" />
          <Step9 @toStep10="showConfirm" v-if="current === 9" />
          <Step10 v-if="current === 10" />
        </a-col>
        <a-col :span="7">
          <a-steps direction="vertical" size="small" :current="current - 1">
            <a-step title="Chờ KTV xử lý" />
            <a-step title="KTV tiếp nhận hồ sơ" />
            <a-step title="KTV trình KTT" />
            <a-step title="KTT ký duyệt HS" />
            <a-step title="BGH phê duyệt" />
            <template v-if="[3, 4].includes(file.file_type_id)">
              <a-step title="KTV lập phiếu chi/UNC" />
              <a-step title="KTT ký duyệt phiếu" />
              <a-step title="BGH duyệt (UNC)" />
              <a-step title="KTV chuyển KB/NH" />
              <a-step title="Thanh toán" />
            </template>
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
      file: {},
    };
  },
  methods: {
    beforeOpen(event) {
      this.file = event.params.file;
      this.current = Number(event.params.file.current_step_id);
      console.log(this.current);
    },
    beforeClose(event) {
      this.file = {};
    },
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
