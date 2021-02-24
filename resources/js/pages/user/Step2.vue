<template>
  <div>
    <a-divider orientation="left">
      KTV trinh KTT
    </a-divider>
    <a-form :form="form" @submit="handleSubmit" class="form-layout">
      <a-form-item v-bind="formItemLayout" label="Ngay xu ly xong">
        <a-date-picker
          v-decorator="[
          'time-1',
          {
            rules: [
              { 
                type: 'object',
                required: true,
                message: 'Please select time!'
              }
            ]
          }
        ]" />
      </a-form-item>
      <a-form-item v-bind="formItemLayout" label="Ngay trinh KTT">
        <a-date-picker
          v-decorator="[
          'time-2',
          {
            rules: [
              { 
                type: 'object',
                required: true,
                message: 'Please select time!'
              }
            ]
          }
        ]" />
      </a-form-item>
      <a-form-item v-bind="tailFormItemLayout">
        <a-button type="primary" html-type="submit">
          Luu
        </a-button>
        <a-button type="default" class="btn-default" @click="toStep3">
          Chuyen Tiep
        </a-button>
      </a-form-item>
    </a-form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      formItemLayout: {
        labelCol: {
          xs: { span: 24 },
          sm: { span: 6 },
        },
        wrapperCol: {
          xs: { span: 24 },
          sm: { span: 8 },
        },
      },
      tailFormItemLayout: {
        wrapperCol: {
          xs: {
            span: 24,
            offset: 0,
          },
          sm: {
            span: 16,
            offset: 6,
          },
        },
      },
    }
  },
  beforeCreate() {
    this.form = this.$form.createForm(this, { name: 'step2' });
  },
  methods: {
    handleSubmit(e) {
      e.preventDefault();
      this.form.validateFieldsAndScroll((err, values) => {
        if (!err) {
          this.$message.success('Luu thanh cong');
        }
      });
    },
    toStep3() {
      this.$emit('toStep3');
    }
  }
}
</script>

<style lang="scss" scoped>
  .btn-default {
    margin-left: 10px;
  }

  .form-layout {
    padding-left: 30px;
  }
</style>
