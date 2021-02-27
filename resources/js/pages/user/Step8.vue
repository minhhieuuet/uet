<template>
  <div>
    <a-divider orientation="left"> BGH duyệt (UNC) </a-divider>
    <template v-if="role === 'ktv' || role === 'bgh'">
      <a-form :form="form" @submit="handleSubmit">
        <template v-if="!time_1">
          <a-form-item v-bind="formItemLayout" label="KTV gửi thư ký BGH" class="form-layout">
            <a-date-picker
              v-decorator="[
                'time_1',
                {
                  rules: [
                    {
                      type: 'object',
                      required: role === 'ktv' ? true : false,
                      message: 'Please select time!',
                    },
                  ],
                },
              ]"
              :disabled="role === 'bgh'"
            />
          </a-form-item>
        </template>
        <template v-else>
          <a-alert message="Dang cho BGH xu ly" banner class="alert-msg" />
        </template>
        <a-form-item v-bind="formItemLayout" label="Ngày BGH trả:" v-if="role === 'bgh'" class="form-layout">
          <a-date-picker
            v-decorator="[
              'time-2',
              {
                rules: [
                  {
                    type: 'object',
                    required: true,
                    message: 'Please select time!',
                  },
                ],
              },
            ]"
          />
        </a-form-item>
        <a-form-item v-bind="formItemLayout" label="Ngày nhận 3" v-if="role === 'bgh'" class="form-layout">
          <a-date-picker
            v-decorator="[
              'time-3',
              {
                rules: [
                  {
                    type: 'object',
                    required: true,
                    message: 'Please select time!',
                  },
                ],
              },
            ]"
          />
        </a-form-item>
        <a-form-item v-bind="tailFormItemLayout" class="form-layout">
          <a-button type="primary" html-type="submit" v-if="!time_1"> Lưu </a-button>
          <a-button type="default" class="btn-default" @click="toStep9" v-if="role === 'bgh'">
            Chuyển tiếp
          </a-button>
        </a-form-item>
      </a-form>
    </template>
    <template v-else>
      <a-alert message="Dang cho KTV va BGH xu ly" banner class="alert-msg" />
    </template>
  </div>
</template>

<script>
import moment from 'moment';
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
      role: 'bgh',
      time_1: ''
    };
  },
  beforeCreate() {
    this.form = this.$form.createForm(this, { name: "step1" });
  },
  methods: {
    handleSubmit(e) {
      e.preventDefault();
      this.form.validateFieldsAndScroll((err, values) => {
        if (!err) {
          this.$message.success("Luu thanh cong");
          this.time_1 = values.time_1 ? moment(values.time_1).format('YYYY/MM/DD') : '';
        }
      });
    },
    toStep9() {
      this.$emit("toStep9");
    },
  },
};
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
