<template>
  <div>
    <a-divider orientation="left">
      KTV tiếp nhận hồ sơ
    </a-divider>
    <template v-if="$role === 'ktv'">
      <a-form :form="form" @submit="handleSubmit" class="form-layout">
        <a-form-item v-bind="formItemLayout" label="Ngày nhận 1">
          <a-date-picker
            v-decorator="[
            'time-1',
            {
              rules: [
                { 
                  type: 'object',

                  message: 'Please select time!'
                }
              ]
            }
          ]" />
        </a-form-item>
        <a-form-item v-bind="formItemLayout" label="Ngày nhận 2">
          <a-date-picker
            v-decorator="[
            'time-2',
            {
              rules: [
                { 
                  type: 'object',

                  message: 'Please select time!'
                }
              ]
            }
          ]" />
        </a-form-item>
        <a-form-item v-bind="formItemLayout" label="Ngày nhận 3">
          <a-date-picker
            v-decorator="[
            'time-3',
            {
              rules: [
                { 
                  type: 'object',

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
          <a-button type="default" class="btn-default" @click="toStep3">
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
  props: {
    history: {
      type: Array,
      default: []
    }
  },
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
  },
  created() {
    console.log(this.history);
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
