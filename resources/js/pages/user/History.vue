<template>
  <div id="history-modal">
    <modal
      name="history"
      width="800"
      height="auto"
      :scrollable="true"
      :click-to-close="true"
      @before-open="beforeOpen"
      @before-close="beforeClose"
    >
      <div class="content">
        <div slot="top-right">
          <a-icon type="close" class="top-right" @click="$modal.hide('history')" />
        </div>
        <span class="md-title">{{ title }}</span>
        <a-divider />
        <div class="history-info">
          <a-descriptions title="KTV tiếp nhận hồ sơ" :column="1" bordered class="item-description">
            <a-descriptions-item label="Ngay nhan 1">
              2021/01/01
            </a-descriptions-item>
            <a-descriptions-item label="Ngay nhan 2">
              2021/01/01
            </a-descriptions-item>
            <a-descriptions-item label="Ngay nhan 3">
              2021/01/01
            </a-descriptions-item>
          </a-descriptions>
          <a-descriptions title="KTV trình KTT" :column="1" bordered class="item-description">
            <a-descriptions-item label="Ngay xu ly xong">
              2021/01/01
            </a-descriptions-item>
            <a-descriptions-item label="Ngay trinh KTT">
              2021/01/01
            </a-descriptions-item>
          </a-descriptions>
          <a-descriptions title="KTT ký duyệt HS" :column="1" bordered class="item-description">
            <a-descriptions-item label="Ngay tra KTV">
              2021/01/01
            </a-descriptions-item>
          </a-descriptions>
          <a-descriptions title="BGH phê duyệt" :column="1" bordered class="item-description">
            <a-descriptions-item label="KTV gui thu ky BGH">
              2021/01/01
            </a-descriptions-item>
            <a-descriptions-item label="Ngay BGH tra">
              2021/01/01
            </a-descriptions-item>
            <a-descriptions-item label="TK BGH ky tra HS">
              2021/01/01
            </a-descriptions-item>
          </a-descriptions>
          <a-descriptions title="KTV lập phiếu chi/UNC" :column="1" bordered class="item-description">
            <a-descriptions-item label="Ngay lap">
              2021/01/01
            </a-descriptions-item>
            <a-descriptions-item label="Ngay trinh KTT">
              2021/01/01
            </a-descriptions-item>
          </a-descriptions>
          <a-descriptions title="KTT ký duyệt phiếu" :column="1" bordered class="item-description">
            <a-descriptions-item label="Ngay tra KTV">
              2021/01/01
            </a-descriptions-item>
            <a-descriptions-item label="Ngay thanh toan (Tien mat)">
              2021/01/01
            </a-descriptions-item>
          </a-descriptions>
          <a-descriptions title="BGH duyệt (UNC)" :column="1" bordered class="item-description">
            <a-descriptions-item label="KTV gui thu ky BGH">
              2021/01/01
            </a-descriptions-item>
            <a-descriptions-item label="Ngay BGH tra">
              2021/01/01
            </a-descriptions-item>
            <a-descriptions-item label="TK BGH ky tra HS">
              2021/01/01
            </a-descriptions-item>
          </a-descriptions>
          <a-descriptions title="KTV chuyển KB/NH" :column="1" bordered class="item-description">
            <a-descriptions-item label="Ngay">
              2021/01/01
            </a-descriptions-item>
          </a-descriptions>
          <a-descriptions title="Thanh toán" :column="1" bordered class="item-description">
            <a-descriptions-item label="Ngay">
              2021/01/01
            </a-descriptions-item>
          </a-descriptions>
        </div>
      </div>
    </modal>
  </div>
</template>

<script>
export default {
  data() {
    return {
      title: 'Lich su ho so'
    }
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
.history-info {
  margin-bottom: 20px;
  max-height: 500px;
  overflow: auto;

  .item-description {
    margin-bottom: 20px;
  }
}
</style>

<style lang="scss">
#history-modal {
  .ant-descriptions-title {
    font-weight: normal !important;
  }
  .ant-descriptions-item-label {
    width: 500px !important;
  }
  .ant-descriptions-view {
    width: 95% !important;
  }
}
</style>