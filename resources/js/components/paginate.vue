<template>
    <component
        :is="{template: templateData}"
        v-on:change="load"
        v-on:search="search">
    </component>
</template>
<script>
    export default {
        props: ['template'],
        data: function(){
            return {
                templateData: this.template
            }
        },
        methods: {
            load(url) {
                var self = this;
                axios.get(url).then(response => {
                    history.pushState({}, null, url);
                    self.templateData = response.data;
                })
            },
            search(e){
                this.load(e.target.action + "?" + $(e.target).serialize());
            },
            submit() {
                $('form').submit();
            }
        }
    }
</script>
