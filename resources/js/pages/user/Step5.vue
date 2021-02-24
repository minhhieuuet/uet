<template>
  <div>
    <a-divider orientation="left">
      BGH phê duyệt
    </a-divider>
    <a-form :form="form" @submit="handleSubmit">
      <a-form-item v-bind="formItemLayout" label="KTV gửi thư ký BGH">
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
      <a-form-item v-bind="formItemLayout" label="Ngày BGH trả">
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
          Lưu
        </a-button>
        <a-button type="default" class="btn-default" @click="toStep6">
          Chuyển tiếp
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
    this.form = this.$form.createForm(this, { name: 'step1' });
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
    toStep6() {
      this.$emit('toStep6');
    }
  }
}
</script>

<style lang="scss" scoped>
  .btn-default {
    margin-left: 10px;
  }
</style>