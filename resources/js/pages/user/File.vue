<template>
  <div class="content">
    <div class="md-layout">
      <div class="md-layout md-gutter">
        <div class="md-layout-item md-size-5"></div>
        <div class="md-layout-item md-size-30">
          <md-field>
            <label>Tìm kiếm</label>
            <md-input
              type="text"
              name="text"
              v-model="searchInput"
              @keyup.enter="$refs.datatable.refresh()"
            ></md-input>
            <md-icon>search</md-icon>
          </md-field>
        </div>
        <div class="md-layout-item md-size-35"></div>
        <div class="md-layout-item">
          <md-button class="md-success" @click="createStudent">Thêm</md-button>
          <md-button class="md-info" @click="refresh">Làm mới</md-button>
          <md-button class="md-danger" @click="removeManyStudent()">Xóa</md-button>
        </div>
      </div>
      <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100">
        <md-card>
          <md-card-header data-background-color="green">
            <a-row>
              <a-col :span="20">
                <h3 class="title">Quản lý phiếu luân chuyển hồ sơ</h3>
              </a-col>
              <a-col :span="4">
                Lọc
                <a-select
                  default-value="assign_to_me"
                  style="width: 240px"
                  @change="handleChange"
                >
                  <a-select-option value=""> Tất cả </a-select-option>
                  <a-select-option value="assign_to_me">
                    Được giao cho tôi
                  </a-select-option>
                </a-select>
              </a-col>
            </a-row>
          </md-card-header>
          <md-card-content>
            <data-table :get-data="getData" ref="datatable">
              <th class="col_checkbox">
                <md-checkbox :plain="true" v-model="selectedAll"></md-checkbox>
              </th>
              <th class="col_title_en">Họ tên người thanh toán</th>
              <th class="col_title_jp">Tên hồ sơ</th>
              <th class="col_title_jp">Loại hồ sơ</th>
              <th class="col_summary_en">Đơn vị</th>
              <th class="col_created_at">Ngày nghiệp vụ phát sinh</th>
              <th>Trạng thái</th>
              <th class="col_tools">Công cụ</th>
              <template slot="body" slot-scope="{ item }">
                <tr>
                  <td class="text-center">
                    <md-checkbox
                      v-model="item.selected"
                      @input="listenSelectRow"
                    ></md-checkbox>
                  </td>
                  <td class="text-center" v-html="item.payer_name"></td>
                  <td class="text-center" v-html="item.name"></td>
                  <td class="text-center" v-html="item.file_type.name"></td>
                  <td class="text-center" v-html="item.organization ? item.organization.name : ''"></td>
                  <td class="text-center" v-html="item.created_at"></td>
                  <td v-html="item.current_step.name"></td>
                  <td class="text-center">
                    <md-button
                      class="md-just-icon md-simple md-primary"
                      @click="showFileHistory(item)"
                    >
                      <md-icon>visibility</md-icon>
                      <md-tooltip md-direction="top">Xem</md-tooltip>
                    </md-button>
                    <md-button
                      class="md-just-icon md-simple md-primary"
                      @click="showFileInfo(item)"
                    >
                      <md-icon>edit</md-icon>
                      <md-tooltip md-direction="top">Xử lý</md-tooltip>
                    </md-button>
                  </td>
                </tr>
              </template>
            </data-table>
          </md-card-content>
        </md-card>
      </div>
      <v-dialog />
      <CreateFile @created="refresh"/>
      <Progress />
      <History />
    </div>
  </div>
</template>

<script>
import { SimpleTable } from "@/components";

import rf from "../../requests/RequestFactory";
import StudentModal from "../../modals/Student";
import CreateFile from "./CreateFile";
import Progress from "./Progress";
import History from './History';

export default {
  components: {
    SimpleTable,
    StudentModal,
    CreateFile,
    Progress,
    History
  },
  data() {
    return {
      searchInput: "",
      selectedAll: false,
      selectedStudent: {},
    };
  },
  methods: {
    async showFileInfo(file) {
     const result = await rf.getRequest("FileRequest").getHistories(file.id);
     this.$modal.show("progress", {
       file: file
     });
    },
    async showFileHistory(file) {
     const result = await rf.getRequest("FileRequest").getHistories(file.id);
     console.log(result);
     this.$modal.show("history");
    },
    createStudent() {
      this.$modal.show("create-file", { title: "Thêm file" });
    },
    editStudent(studentId) {
      this.$modal.show("student", {
        title: "Sửa thông tin người học",
        studentId: studentId,
      });
    },
    listenSelectRow() {
      if (!this.$refs.datatable) {
        return true;
      }

      this.selectedAll =
        this.$refs.datatable.rows.filter((row) => row.selected === true).length ===
        this.$refs.datatable.rows.length;
    },
    getData(params) {
      const meta = Object.assign({}, params, {
        search: this.searchInput,
      });
      return rf.getRequest("FileRequest").getFiles(meta);
    },
    refresh() {
      this.isLoading = true;
      this.$refs.datatable.refresh();
      this.$refs.datatable.$on("DataTable:finish", () => {
        this.isLoading = false;
      });
    },
  },
  watch: {
    searchInput() {
      this.$refs.datatable.refresh();
    },
    selectedAll() {
      if (!this.$refs.datatable) {
        return true;
      }
      this.$refs.datatable.rows.forEach((row) => {
        this.$set(row, "selected", this.selectedAll);
      });
    },
  },
  mounted() {},
};
</script>
