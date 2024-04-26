<template>
    <div v-show="this.msg != null" class="alert alert-primary" role="alert">
        var id = msg->id;
        Добавлена новая статья <strong><a href="article/this.id">{{this.msg}}</a></strong>
    </div>
</template>
<script>
    export default {
    data() { return { msg: null, id} },
        created() {
            window.Echo.channel('my-channel').listen('ArticleEvent', (data) => {
                console.log("data");
                this.msg=data.name;
                this.id=data.id;
            })
        }
    }
</script>
