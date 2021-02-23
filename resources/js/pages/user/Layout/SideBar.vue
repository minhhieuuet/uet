<template>
<a-layout-sider class="sidebar-pc" :style="{ overflow: 'auto', height: '100vh', position: 'fixed', left: 0 }">
    <div class="logo" />
    <a-menu theme="dark"  @click="handleClick">

        <a-menu-item key="1" :class="{'ant-menu-item-selected': currentRouteName == 'File' }">
            <a-icon type="book" />
            <span class="nav-text">Quản lý hồ sơ</span>
        </a-menu-item>
         <a-menu-item key="2" :class="{'ant-menu-item-selected': currentRouteName == 'User' }">
            <a-icon type="book" />
            <span class="nav-text">Quản lý người dùng</span>
        </a-menu-item>
    </a-menu>
</a-layout-sider>
</template>

<script>
export default {
    computed: {
        currentRouteName() {
            return this.$route.name;
        }
    },
    data() {
        return {
            items: [{
                    key: 1,
                    routerName: 'File'
                },
                {
                    key: 2,
                    routerName: 'User'
                }
            ]
        }
    },
    methods: {
        handleClick(e) {
            this.$router.push({
                name: this.items[e.key - 1].routerName
            });
        }
    },
}
</script>

<style lang="scss" scoped>
@media screen and (max-width: 900px) {
    .sidebar-pc {
        display: none;
    }
}
</style>
