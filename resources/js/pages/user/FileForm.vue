<template>
  <a-form :form="form" @submit="handleSubmit">
    <a-form-item v-bind="formItemLayout" label="Full name">
      <a-input
        v-decorator="[
          'full-name',
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
    <a-form-item v-bind="formItemLayout" label="File name">
      <a-input
        v-decorator="[
          'file-name',
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
    <a-form-item v-bind="formItemLayout" label="Unit">
      <a-input
        v-decorator="[
          'unit',
          {
            rules: [
              {
                required: true,
                message: 'Please input your unit!',
              },
            ],
          },
        ]"
      />
    </a-form-item>
    <a-form-item v-bind="formItemLayout" label="File type">
      <a-select
        v-decorator="[
          'file-type',
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
        <a-select-option value="1"> Du toan </a-select-option>
        <a-select-option value="2"> Hop dong </a-select-option>
        <a-select-option value="3"> Ho so thanh toan </a-select-option>
        <a-select-option value="4"> Tam ung </a-select-option>
      </a-select>
    </a-form-item>
    <a-form-item v-bind="formItemLayout" label="Time">
      <a-date-picker
        v-decorator="[
          'time',
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
    <a-form-item v-bind="tailFormItemLayout">
      <a-button type="primary" html-type="submit"> Submit </a-button>
    </a-form-item>
  </a-form>
</template>

<script>
export default {
  data() {
    return {
      formItemLayout: {
        labelCol: {
          xs: { span: 24 },
          sm: { span: 4 },
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
            offset: 4,
          },
        },
      },
    };
  },
  beforeCreate() {
    this.form = this.$form.createForm(this, { name: "file" });
  },
  methods: {
    handleSubmit(e) {
      e.preventDefault();
      this.form.validateFieldsAndScroll((err, values) => {
        if (!err) {
          this.$emit("created");
        }
      });
    },
  },
};
</script>

<style></style>
