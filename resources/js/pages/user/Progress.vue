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
        <a-col :span="17" class="form-content">
          <div class="file-info">
            <Step0 />
          </div>
          <div class="btn-submit" v-if="current === 0">
            <a-button type="primary" @click="nextStep">
              Tiep nhan
            </a-button>
          </div>
          <Step1 @toStep2="showConfirm" v-if="current === 1" />
        </a-col>
        <a-col :span="7">
          <a-steps direction="vertical" size="small" :current="current">
            <a-step title="Cho KTV xu ly" />
            <a-step title="KTV tiep nhan ho so" />
            <a-step title="KTV trinh KTT" />
            <a-step title="KTT ky duyet HS" />
            <a-step title="BGH phe duyet" />
            <a-step title="KTV lap phieu chi/UNC" />
            <a-step title="KTT ky duyet phieu" />
            <a-step title="BGH duyet (UNC)" />
            <a-step title="KTV chuyen KB/NH" />
            <a-step title="Ngay thanh toan" />
          </a-steps>
        </a-col>
      </a-row>
    </div>
  </modal>
</template>

<script>
import Step0 from './Step0';
import Step1 from './Step1';
export default {
  components: {
    Step0,
    Step1
  },
  data() {
    return {
      title: 'Thong tin ho so',
      current: 0,
    }
  },
  methods: {
    nextStep() {
      this.current++;
    },
    showConfirm() {
      this.$confirm({
        title: 'Ban co muon chuyen sang buoc tiep theo?',
        content: 'Khi da chuyen sang buoc tiep theo, ban khong the thao tac gi tai cac buoc ve truoc',
        onOk: () => {
          this.nextStep();
        },
        onCancel() {},
        cancelText: 'Huy bo'
      });
    },
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