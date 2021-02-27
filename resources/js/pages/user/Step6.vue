<template>
  <div>
    <a-divider orientation="left">
      KTV lập phiếu chi/UNC
    </a-divider>
    <template v-if="role === 'ktv'">
      <a-form :form="form" @submit="handleSubmit" class="form-layout">
        <a-form-item v-bind="formItemLayout" label="Ngày lập:">
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
        <a-form-item v-bind="formItemLayout" label="Ngày trình KTT">
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
          <a-button type="default" class="btn-default" @click="toStep7">
            Chuyển tiếp
          </a-button>
        </a-form-item>
      </a-form>
    </template>
    <template v-else>
      <a-alert message="Dang cho KTV xu ly" banner class="alert-msg" />
    </template>
  </div>
</template>

<script>
export default {
  data() {
    return {
      formItemLayout: {
        labelCol: {
          xs: { span: 24 },
          sm: { span: 8 },
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
            offset: 8,
          },
        },
      },
      role: 'ktv'
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
    toStep7() {
      this.$emit('toStep7');
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

  .alert-msg {
    margin-bottom: 20px;
  }
</style>