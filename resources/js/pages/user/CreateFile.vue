<template>
  <modal name="create-file"
        height="auto"
        :scrollable="true"
        :click-to-close="true"
        @before-open="beforeOpen"
        @before-close="beforeClose"
  >
    <div class="content">
      <div slot="top-right">
        <a-icon type="close" class="top-right" @click="$modal.hide('create-file')" />
      </div>
      <span class="md-title">{{title}}</span>
      <a-divider />
      <a-form :form="form" @submit="handleSubmit">
        <a-form-item v-bind="formItemLayout" label="Họ tên người thanh toán:">
          <a-input
            v-decorator="[
              'payer_name',
              {
                rules: [
                  {
                    required: true,
                    message: 'Please input your full name!',
                  },
                ],
              },
            ]"
          />
        </a-form-item>
        <a-form-item v-bind="formItemLayout" label="Tên hồ sơ">
          <a-input
            v-decorator="[
              'name',
              {
                rules: [
                  {
                    required: true,
                    message: 'Please input your file name!',
                  },
                ],
              },
            ]"
          />
        </a-form-item>
        <a-form-item v-bind="formItemLayout" label="Đơn vị:">
          <a-select
            v-decorator="[
              'organization_id',
              {
                rules: [
                  {
                    required: true,
                    message: 'Please select a type!',
                  },
                ],
              },
            ]"
          >
            <a-select-option value="1">
              Đại học Công nghệ
            </a-select-option>
            <a-select-option value="2">
              Đại học Ngoại ngữ
            </a-select-option>
          </a-select>
        </a-form-item>
        <a-form-item v-bind="formItemLayout" label="Loại:">
          <a-select
            v-decorator="[
              'file_type_id',
              {
                rules: [
                  {
                    required: true,
                    message: 'Please select a type!',
                  },
                ],
              },
            ]"
          >
            <a-select-option value="1">
              Dự toán
            </a-select-option>
            <a-select-option value="2">
              Hợp đồng, Thanh lý HĐ, BB liên quan
            </a-select-option>
            <a-select-option value="3">
              Tạm ứng
            </a-select-option>
            <a-select-option value="4">
              Hồ sơ thanh toán
            </a-select-option>
          </a-select>
        </a-form-item>
        <a-form-item v-bind="formItemLayout"label="Giá">
          <a-input-number 
           :min="0" 
            v-decorator="[
              'price',
              {
                rules: [
                  {
                    required: true,
                    message: 'Please input price',
                  },
                ],
              },
            ]"
          />
        </a-form-item>
        <!-- <a-form-item v-bind="formItemLayout" label="Ngày nghiệp vụ phát sinh:">
          <a-date-picker
          placeholder="Chọn ngày"
            v-decorator="[
            'created_at',
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
        </a-form-item> -->
        <a-form-item v-bind="tailFormItemLayout">
          <a-button type="primary" html-type="submit">
            Tạo phiếu
          </a-button>
        </a-form-item>
      </a-form>
    </div>
  </modal>
</template>

<script>
import rf from "../../requests/RequestFactory";

export default {
  data() {
    return {
      title: 'Tạo phiếu luân chuyển hồ sơ',
      formItemLayout: {
        labelCol: {
          xs: { span: 24 },
          sm: { span: 8 },
        },
        wrapperCol: {
          xs: { span: 24 },
          sm: { span: 16 },
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
            offset: 4,
          },
        },
      },
    }
  },
  beforeCreate() {
    this.form = this.$form.createForm(this, { name: 'file' });
  },
  methods: {
    handleSubmit(e) {
      e.preventDefault();
      this.form.validateFieldsAndScroll(async (err, values) => {
        if (!err) {
          await rf.getRequest('FileRequest').storeFile(values);
          this.$modal.hide('create-file');
          this.$emit('created');
        }
      });
    },
  }
}
</script>
<style>
  .ant-form-item-label {
    text-align: left !important;
  }
</style>
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
</style>